<?php
namespace App\Http\Controllers;
 
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 
class AdminController extends Controller
{
    public function index(Request $request) {
        if ($request->session()->has('admin_id')) {
            $query = DB::table('customer')->get();
            return view('admin.index', ['customerData' => $query]);
        }
        return redirect('login');
    }

    public function logout(Request $request){
        if($request->session()->has('admin_id')){
            $request->session()->forget('admin_id');            
        }
        return redirect('/login');
    }

    public function deleteCustomer(Request $request) {
        if ($request->session()->has('admin_id')) {

            $id = $request->cid;
            DB::delete('delete from customer where id = ?',[$id]);
            return back();
        }
        return redirect('/login');
    }

    public function getCustomerInfo(Request $request) {
        if ($request->session()->has('admin_id')) {

            $id = $request->cid;
            $customerInfo = DB::table('customer')->where('id', $id)->first();
            $countries = DB::table('country')->select('nicename','phonecode')->get();
            return view('admin.customerinfo',['customerInfo'=>$customerInfo, 'countries'=> $countries]);
        }
        return redirect('/login');

    }

    public function updateCustomerInfo(Request $request) {
        if ($request->session()->has('admin_id')) {
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
            return redirect('dashboard');
        }
        return redirect('/login');
    }

    public function getMessages(Request $request) {
        if ($request->session()->has('admin_id')) {
            $query = DB::table('messages')->get();
            return view('admin.message', ['messages' => $query]);
        }
        return redirect('/login');
    }

}