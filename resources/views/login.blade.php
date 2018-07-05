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
            
            <a  class="register" href="{{ url('/register') }}">Sign up !</a>
            <a  class="register" style="margin-right:10px;"  href="{{ url('/forgotpassword') }}">Forgot Password ?</a>
            
            </form>

            <script>            

                $("#login-form").validate({
                    rules: {
                        email: {
                            required: true,
                            email: true
                        },
                        password: {
                            required: true,
                            minlength: 3,
                        }
                    },
                    messages: {
                        email: {
                            required: "Please enter email address",
                            email: "Please enter valid email address"
                        },
                        password: {
                            required: "Please enter password"
                        }
                    }

                });                               
            </script>

            @if (session('status'))
                <div class="alert alert-success" style="margin-top: 30px;">
                    {{ session('status') }}
                </div>
            @endif


    </div>
  </div>
</div>
 @endsection