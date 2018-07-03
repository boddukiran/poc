<?php
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\VerificationLink;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
 
class CustomerController extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->has('id')) {
            $user_obj = DB::table('customer')->where('id', $request->session()->get('id'))->first();            
            return view('index');
        }
        return redirect('/login');        
    }

    public function logout(Request $request){
        if($request->session()->has('id')){
            $request->session()->forget('id');            
        }
        return redirect('/login');
    }

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $user_data = $request->all();
            $user_obj = DB::table('customer')->select('id', 'email', 'fname', 'lname', 'role', 'status')
                ->where([
                    [ 'email', '=' , $user_data['email'] ],
                    [ 'password', '=' , $user_data['password'] ]
                ])
                ->first();

            if($user_obj){
                $request->session()->put('id', $user_obj->id);
                if($user_obj->role == 1 && $user_obj->status == 1) {
                    return redirect('dashboard');
                }
                if($user_obj->role == 0 && $user_obj->status == 1) {
                    return redirect('/');
                }
                else {
                    return redirect('login');
                }
            }          
        }

        if( $request->session()->has('id') )
            return redirect('/');

        return view('login');
    }

    public function register(Request $request)
    {

        if ($request->isMethod('post')) {
            $data = [
                'fname' => $request->first_name,
                'lname' => $request->last_name,
                'email' => $request->email,
                'gender' => $request->gender,
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'countrycode' => $request->zipcode,
                'address' => $request->address,
                'phone' => $request->mobile,
                'password' => encrypt($request->password),
                'countrycode' => '+91'
            ];
            DB::table('customer')->insert($data);
            $data['email'] = encrypt($data['email']);
            Mail::to($data['email'])->send(new VerificationLink((object)$data));
            return redirect('/login')->with('status', 'Registered Successfully.  Please complete the verification process through your email.');
        }
        return view('register');
    }

    public function verify(){
        return redirect('/login')->with('status', 'Verification Success.  Please login.');
    }

    public function profile(){
        return view('profile');
    }

    public function message(){
        return view('messages');
    }

    public function resetPassword(){
        return view('resetpassword');
    }
}