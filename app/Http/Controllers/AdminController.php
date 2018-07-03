<?php
namespace App\Http\Controllers;
 
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 
class AdminController extends Controller
{
    public function index(Request $request) {
        if ($request->session()->has('id')) {
            $query = DB::table('customer')
                            ->WHERE([
                                ['role', '!=', 1],
                                ['status', '=', 1]
                            ])->get();
            return view('admin.index', ['customerData' => $query]);
        }
        return redirect('login');
    }

//    public function login() {
//        return view('admin.login');
//    }
//
//    public function loginAction(Request $request) {
//        if ($request->isMethod('post')) {
//            $user_data = $request->all();
//            $user_obj = DB::table('admin')->select('id', 'username')
//                    ->where([
//                        [ 'username', '=', $user_data['userName']],
//                        [ 'password', '=', $user_data['password']]
//                    ])
//                    ->first();
//            if ($user_obj) {
//                $request->session()->put('id', $user_obj->id);
//                return redirect('dashboard');
//            }
//        }
//
//        if ($request->session()->has('id')) {
//            return redirect('dashboard');
//        } else {
//            return redirect('adminlogin');
//        }
//    }

    public function deleteCustomer(Request $request) {
        $id = $request->cid;
        DB::delete('delete from customer where id = ?',[$id]);
        return back();
    }

    public function getCustomerInfo(Request $request) {
        $id = $request->cid;
        $customerInfo = DB::table('customer')->where('id', $id)->first();
        return view('admin.customerinfo',['customerInfo'=>$customerInfo]);
    }

    public function updateCustomerInfo(Request $request) {
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
        ];
        DB::table('customer')
                ->where('id', $request->cid)
                ->update($data);
        return redirect('dashboard');
    }

    public function getMessages(Request $request) {
        if ($request->session()->has('id')) {
            $query = DB::table('messages')->get();
            return view('admin.message', ['messages' => $query]);
        }
        return redirect('/login');
    }

//    public function logout(Request $request){
//        if($request->session()->has('id')){
//            $request->session()->forget('id');  
//        }
//        return redirect('/adminlogin');
//    }
}