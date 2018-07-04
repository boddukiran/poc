@extends('layouts.layout')

@section('content')
<div class="container login-content">
  <div class="row justify-content-center">
    <div class="col-4">
            <h1>Register</h1>
            <form id="register-form" method="POST" action="{{ url('/register') }}">
            {{ csrf_field() }}
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
                <select class="form-control" name="country_alias">
                <option Selected>Select Country</option>
                @foreach($countries as $key => $country)
                    <option value="{{ $country->phonecode }}">{{ $country->nicename }}</option>                
                @endforeach
                </select>
                <input type="hidden" name="country" />
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
                <div class="row">
                    <div class="col-4">
                        <input type="text" name="phonecode" class="form-control" placeholder="Code" readonly>
                    </div>
                    <div class="col-8">
                        <input type="text" name="mobile" class="form-control" placeholder="mobile">    
                    </div>
                </div>             
                                
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a  class="register" href="{{ url('/login') }}">Sign in</a>
            </form>
    </div>
  </div>
</div>
 @endsection

 <script type="text/javascript">
    document.addEventListener('DOMContentLoaded',function() {
        document.querySelector('select[name=country_alias]').onchange=changeEventHandler;
    },false);

    function changeEventHandler(event) {                    
        document.querySelector('input[name=phonecode]').value = '+'+event.target.value;
        document.querySelector('input[name=country]').value = event.target.options[event.target.selectedIndex].text;
    }
 </script>