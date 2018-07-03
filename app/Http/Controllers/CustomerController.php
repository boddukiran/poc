<?php
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\VerificationLink;
use Illuminate\Support\Facades\Mail;
 
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
            $user_obj = DB::table('customer')->select('id', 'email', 'fname', 'lname')
                ->where([
                    [ 'email', '=' , $user_data['email'] ],
                    [ 'password', '=' , $user_data['password'] ]
                ])
                ->first();
            if($user_obj){
                $request->session()->put('id', $user_obj->id);
                return redirect('/');
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
                'mobile' => $request->mobile,
                'password' => $request->password
            ];
            DB::table('customer')->insert($data);
            Mail::to($data['email'])->send(new VerificationLink(object($data)));
            return redirect('/login')->with('status', 'Registered Successfully.  Please complete the verification process through your email.');
        }
        return view('register');
    }

    public function profile(){
        return view('profile');
    }

    public function message(){
        return view('messages');
    }
}