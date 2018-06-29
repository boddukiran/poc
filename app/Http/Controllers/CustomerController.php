<?php
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 
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

    public function register()
    {
        return view('register');
    }

    public function profile(){
        return view('profile');
    }

    public function message(){
        return view('message');
    }
}