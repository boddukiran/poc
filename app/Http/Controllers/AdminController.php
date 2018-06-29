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
}