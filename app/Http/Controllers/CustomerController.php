<?php
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
 
class CustomerController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }
}