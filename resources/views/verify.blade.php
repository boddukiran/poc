@extends('layouts.layout')

@section('content')
<div class="container login-content">
  <div class="row justify-content-center">
    <div class="col-4">
            <h5>Thank you for the email verification. <a href="{{ url('/login') }}">Click Here</a> for login.</h5>            
    </div>
  </div>
</div>
 @endsection