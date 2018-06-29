<?php
namespace App\Http\Controllers;
 
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 
class AdminController extends Controller
{
    public function index()
    {
        $query = DB::table('customer')->get();
        return view('admin.index', ['customerData'=>$query]);
    }

    public function login() {
        return view('admin.login');
    }

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

    public function getMessages() {
        $query = DB::table('messages')->get();
        return view('admin.message',['messages' => $query]);
    }
}