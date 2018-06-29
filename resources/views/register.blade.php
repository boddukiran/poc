@extends('layouts.layout')

@section('content')
<div class="container login-content">
  <div class="row justify-content-center">
    <div class="col-4">
            <h1>Register</h1>
            <form id="register-form">

             <div class="form-group">                
                <input type="text" name="first_name" class="form-control" placeholder="First Name">                
            </div>
            <div class="form-group">                
                <input type="text" name="last_name" class="form-control" placeholder="Last Name">                
            </div>            
            <div class="form-group">               
                <input type="email" class="form-control" placeholder="Email" name="email">                
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" name="password">
            </div>          
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" value="1">
                <label class="form-check-label" style="width:70px;margin-bottom:15px;" >
                    Male
                </label>
                <input class="form-check-input" type="radio" name="gender" value="0">
                <label class="form-check-label" >
                    Female
                </label>
            </div>
            
            <div class="form-group"> 
                               
                <input type="text" name="dob" class="form-control" placeholder="mm/dd/yyyy">                
            </div>              
            <div class="form-group">                
                <input type="text" name="country" class="form-control" placeholder="Country">                
            </div>
            <div class="form-group">                
                <input type="text" name="state" class="form-control" placeholder="State">                
            </div>
            <div class="form-group">                
                <input type="text" name="city" class="form-control" placeholder="City">                
            </div> 
            <div class="form-group">                
                <input type="text" name="address" class="form-control" placeholder="Address">                
            </div>
            <div class="form-group">                
                <input type="text" name="mobile" class="form-control" placeholder="mobile">                
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
    </div>
  </div>
</div>
 @endsection