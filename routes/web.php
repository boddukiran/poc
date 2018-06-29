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
Route::get('adminlogin', 'AdminController@login');
Route::get('customerinfo/{cid}', 'AdminController@getCustomerInfo');
Route::post('updatecustomerinfo','AdminController@updateCustomerInfo');
Route::get('messages','AdminController@getMessages');
Route::get('/', 'CustomerController@index');
Route::get('login', 'CustomerController@login');
Route::get('logout', 'CustomerController@logout');
Route::get('profile', 'CustomerController@profile');
Route::get('message', 'CustomerController@message');
Route::post('login', 'CustomerController@login');
Route::get('register', 'CustomerController@register');
Route::get('deletecustomerinfo/{cid}','AdminController@deleteCustomer');