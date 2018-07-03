@extends('layouts.layout')

@section('content')
<div class="container login-content">
  <div class="row justify-content-center">
    <div class="col-4">
            <h1>Reset Password</h1>
            <form id="reset-form" method="POST" action="">
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
            
            </form>
    </div>
  </div>
</div>
 @endsection