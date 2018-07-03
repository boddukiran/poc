@extends('layouts.layout')

@section('content')
<div class="container login-content">
  <div class="row justify-content-center">
    <div class="col-4">
            <h1>Login</h1>
            <form id="login-form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" placeholder="Enter email">                
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>            
            <button type="submit" class="btn btn-primary">Submit</button>
            
            <a  class="register" href="{{ url('/register') }}">Sign up</a>
            
            </form>
    </div>
  </div>
</div>
 @endsection