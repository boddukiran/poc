<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('dashboard', 'AdminController@index');
//Route::get('adminlogin', 'AdminController@login');
Route::post('loginaction', 'AdminController@loginAction');
Route::get('customerinfo/{cid}', 'AdminController@getCustomerInfo');
Route::post('updatecustomerinfo','AdminController@updateCustomerInfo');
Route::get('messages','AdminController@getMessages');
Route::get('adminlogout', 'AdminController@logout');
Route::get('/', 'CustomerController@index');
Route::get('login', 'CustomerController@login');
Route::get('logout', 'CustomerController@logout');
Route::get('profile', 'CustomerController@profile');
Route::get('message', 'CustomerController@message');
Route::post('login', 'CustomerController@login');
Route::get('register', 'CustomerController@register');
Route::get('forgotpassword', 'CustomerController@forgotpassword');
Route::post('forgotpassword', 'CustomerController@forgotpassword');
Route::post('register', 'CustomerController@register');
Route::get('verify/{code}', 'CustomerController@verify');
Route::get('deletecustomerinfo/{cid}','AdminController@deleteCustomer');
Route::post('updateuserprofile','CustomerController@updateCustomerInfo');
Route::post('savemessage', 'CustomerController@saveMessage');
Route::get('resetpassword/{code}', 'CustomerController@resetpassword');
Route::post('resetpassword/{code}', 'CustomerController@resetpassword');