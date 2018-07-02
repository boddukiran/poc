@extends('layouts.layout')

@section('content')
<div class="container login-content">
  <div class="row justify-content-center">
    <div class="col-4">
            <h1>Admin Login</h1>
            <form id="login-form" method="POST" action="{{action('AdminController@loginAction')}}">
            {{ csrf_field() }}
            <div class="form-group">
                <label>User Name</label>
                <input type="text" class="form-control" id="userName" name="userName" placeholder="Enter user Name">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>            
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
    </div>
  </div>
</div>
 @endsection