@extends('layouts.layout')

@section('content')
<div class="container login-content">
  <div class="row justify-content-center">
    <div class="col-4">
            <h1>Reset Password</h1>
            <form id="resetpassword-form" method="POST" action="{{ url('/resetpassword') }}/{{ $code }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputoldpassword">Old Password</label>
                <input type="password" class="form-control" name="old_password" placeholder="Enter old password">                
            </div>
            <div class="form-group">
                <label for="exampleInputNewPassword1">New Password</label>
                <input type="password" class="form-control" name="new_password" placeholder="Enter new Password">
            </div>
            <div class="form-group">
                <label for="exampleInputConfirmPassword1">Confirm Password</label>
                <input type="password" class="form-control" name="confirm_password" placeholder="Enter confirm Password">
            </div> 
            <button type="submit" class="btn btn-primary">Submit</button>
            <script>
                $("#resetpassword-form").validate({
                    rules: {
                        old_password: {
                            required: true,
                        },
                        new_password: {
                            required: true,
                        },
                        confirm_password: {
                            required: true,
                        }
                    },
                    messages: {
                        old_password: {
                            required: "Please enter old password",
                        },
                        new_password: {
                            required: "Please enter new password",
                        },
                        confirm_password: {
                            required: "Please enter confirm password",
                        }
                    }
                 });
            </script>
            @if (session('status'))
                <div class="alert alert-success" style="margin-top: 30px;">
                    {{ session('status') }}
                </div>
            @endif

            </form>
    </div>
  </div>
</div>
 @endsection