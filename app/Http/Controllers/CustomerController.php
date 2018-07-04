<?php
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\VerificationLink;
use App\Mail\ResetPasswordLink;
use App\Mail\NotifyAdmin;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
 
class CustomerController extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->has('id')) {
            $user_obj = DB::table('customer')->where('id', $request->session()->get('id'))->first();            
            return view('index', ['user' => $user_obj]);
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
            $user_obj = DB::table('customer')->select('id', 'password' ,'email', 'fname', 'lname', 'role', 'status')
                ->where([
                    [ 'email', '=' , $user_data['email'] ]
                ])
                ->first();
            if($user_obj && decrypt($user_obj->password) == $user_data['password'] ){                                
                if($user_obj->role == 1 && $user_obj->status == 1) {
                    $request->session()->put('id', $user_obj->id);
                    return redirect('dashboard');
                }
                if($user_obj->role == 0 && $user_obj->status == 1) {
                    $request->session()->put('id', $user_obj->id);
                    return redirect('/');
                }
                else {
                    return redirect('login')->with('status', 'Please complete the verification process through your email.');
                }
            } else {
                return redirect('login')->with('status', 'Email or Password incorrect.');
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
                'countrycode' => $request->phonecode,
                'role' => 0,
                'status' => 0
            ];
            DB::table('customer')->insert($data);
            $data['code'] = encrypt($data['email']);
            Mail::to($data['email'])->send(new VerificationLink((object)$data));
            return redirect('/login')->with('status', 'Registered Successfully.  Please complete the verification process through your email.');
        }

        $countries = DB::table('country')->select('nicename','phonecode')->get();
        return view('register', ['countries' => $countries]);
    }

    public function verify(Request $request, $code){
        if($code){
            $email = decrypt($code);
            $user_obj = DB::table('customer')->select('id', 'email', 'fname', 'lname', 'role', 'status')
                ->where([
                    [ 'email', '=' , $email ]
                ])
                ->first();
            if($user_obj){       
                DB::table('customer')
                ->where('email', $email)
                ->update(array('status' => 1));    
                $admin_obj = DB::table('customer')->select('email')->where([ ['status', '=', 1],['role', '=', 1] ])->first();
                if($admin_obj)
                    Mail::to($admin_obj->email)->send(new NotifyAdmin($user_obj));
                return redirect('/login')->with('status', 'Verification Success.  Please login.');
            }            
            return redirect('/login')->with('status', 'Unable to verify. Please contact admin@demoapp.com');
        }
        
    }

    public function profile(Request $request) {
        if ($request->session()->has('id')) {
            $user_obj = DB::table('customer')->where('id', $request->session()->get('id'))->first();
            return view('profile', ['userDetails' => $user_obj]);
        }
        return redirect('/login');
    }

    public function message(Request $request){

        if( !$request->session()->has('id') )
            return redirect('/login');

        return view('messages');
    }

    public function forgotpassword(Request $request){
        if ($request->isMethod('post')) {
            $email = $request->email;
            $user_obj = DB::table('customer')->select('id', 'email', 'fname', 'lname', 'role', 'status')
                ->where([
                    [ 'email', '=' , $email ]
                ])
                ->first();
            if($user_obj){
                $user_obj->code = encrypt($user_obj->email);
                Mail::to($email)->send(new ResetPasswordLink($user_obj));
                return redirect('/forgotpassword')->with('status', 'Reset Password Link Sent to your registered email.');
            }
            return redirect('/forgotpassword')->with('status', 'No registered email found.');
        }
        return view('forgotpassword');
    }

    public function resetpassword(Request $request, $code){
        if ($request->isMethod('post')) {
            $email = decrypt($code);
            $user_obj = DB::table('customer')->select('id', 'password','email', 'fname', 'lname', 'role', 'status')
                ->where([
                    [ 'email', '=' , $email ]
                ])
                ->first();
            if($user_obj && decrypt($user_obj->password) == $request->old_password){
                DB::table('customer')
                ->where('email', $email)
                ->update(array('password' => encrypt($request->new_password)));
                return redirect('/login')->with('status', 'Reset Password Success.');
            } else {
                return redirect('/resetpassword/'.$code)->with('status', 'Unable to Reset Password Try Again.');
            }
            
        }        
        return view('resetpassword', ['code' => $code]);
    }

    public function saveMessage(Request $request) {

        if(!$request->session()->has('id')){
            return redirect('/login');
        }

        if($request->isMethod('post')) {
            $data = [
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message,
                'customerID' => $request->session()->has('id')
            ];
            DB::table('messages')->insert($data);
            return redirect('/');
        }
    }


    public function updateCustomerInfo(Request $request) {

        if(!$request->session()->has('id')){
            return redirect('/login');
        }

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
        ];
        DB::table('customer')
                ->where('id', $request->cid)
                ->update($data);
        return redirect('/');
    }
}