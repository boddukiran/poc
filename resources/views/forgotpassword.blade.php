@extends('layouts.layout')

@section('content')
<div class="container login-content">
  <div class="row justify-content-center">
    <div class="col-4">
            <h2>Forgot Password ?</h2>
            <form id="reset-form" style="margin-top:25px;" method="POST" action="{{ url('forgotpassword') }}">
            {{ csrf_field() }}
            <div class="form-group">               
                <input type="email" class="form-control" name="email" placeholder="Email">                
            </div>             
            <button type="submit" class="btn btn-primary">Submit</button>

            <a  class="register" href="{{ url('/register') }}">Sign up !</a>
            
            </form>

            @if (session('status'))
                <div class="alert alert-success" style="margin-top: 30px;">
                    {{ session('status') }}
                </div>
            @endif
    </div>
  </div>
</div>
 @endsection