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
                <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter new Password">
            </div>
            <div class="form-group">
                <label for="exampleInputConfirmPassword1">Confirm Password</label>
                <input type="password" class="form-control" name="confirm_password" placeholder="Enter confirm Password">
            </div> 
            <button type="submit" class="btn btn-primary">Submit</button>
            <script>
                $("#resetpassword-form").validate({
                    normalizer: function(value) {
                        return $.trim(value);
                    },
                    rules: {
                        old_password: {
                            required: true,
                            minlength: 3,
                        },
                        new_password: {
                            required: true,
                            minlength: 3,
                        },
                        confirm_password: {
                            required: true,
                            equalTo: "#new_password",
                            minlength: 3,
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
                            equalTo: "Passwords doesnot match"
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