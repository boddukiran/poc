<?php
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
 
class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function login()
    {
        return view('admin.login');
    }
}