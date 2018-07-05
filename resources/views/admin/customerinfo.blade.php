@extends('layouts.layout')

@section('navbar')
<ul class="nav justify-content-end demo-nav">
    <li class="nav-item">
        <a class="nav-link active" href="/dashboard">Dashboard</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="/messages">Messages</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/logout') }}">Logout</a>
    </li>
</ul>
@endsection

@section('content')
<div class="container login-content">
    <div class="row justify-content-center">
        <div class="col-4">
            <h4>Edit Customer Profile</h4>
            <form id="register-form" method="post" action="{{action('AdminController@updateCustomerInfo')}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="cid" id="cid" value="{{ $customerInfo->id }}">
                <div class="form-group">
                    <input type="text" name="first_name" class="form-control" placeholder="First Name" value="{{$customerInfo->fname}}">
                </div>
                <div class="form-group">
                    <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{$customerInfo->lname}}">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email" name="email" value="{{$customerInfo->email}}">
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="1" <?= ($customerInfo->gender == 1) ? 'checked="checked"' : '' ?>>
                    <label class="form-check-label" style="width:70px;margin-bottom:15px;">
                        Male
                    </label>
                    <input class="form-check-input" type="radio" name="gender" value="0" <?= ($customerInfo->gender == 0) ? 'checked="checked"' : '' ?>>
                    <label class="form-check-label" >
                        Female
                    </label>
                </div>
                <div class="form-group">                
                    <select class="form-control" name="country" required>
                    <option value=''>Select Country</option>
                    @foreach($countries as $key => $country)
                        <option  @if($customerInfo->country == $country->nicename) Selected @endif value="{{ $country->nicename }}">{{ $country->nicename }}</option>                
                    @endforeach
                    </select>
                </div>                
                <div class="form-group">
                    <input type="text" name="state" class="form-control" placeholder="State" value="{{$customerInfo->state}}">
                </div>
                <div class="form-group">
                    <input type="text" name="city" class="form-control" placeholder="City" value="{{$customerInfo->city}}">
                </div>                
                <div class="form-group">
                    <input type="text" name="address" class="form-control" placeholder="Address" value="{{$customerInfo->address}}">
                </div>

                <div class="form-group">   
                    <div class="row">
                        <div class="col-4">
                            <input type="text" name="zipcode" class="form-control" placeholder="Phone Code" value="{{$customerInfo->countrycode}}">
                        </div>
                        <div class="col-8">
                        <input type="text" name="mobile" class="form-control" placeholder="mobile" value="{{$customerInfo->phone}}">
                        </div>
                    </div>                                             
                </div>                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <script>
        $("#register-form").validate({
            normalizer: function(value) {
                return $.trim(value);
            },
           rules: {
            first_name: {
                required: true
            },
            last_name: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            gender: {
                required: true
            },
            country: {
                required: true
            },
            state: {
                required: true
            },
            city: {
                required: true
            },
            address: {
                required: true
            },
            mobile: {
                required: true,
                number: true
            }
        },
        messages: {
            first_name: {
                required: "Please enter first name"
            },
            last_name: {
                required: "Please enter last name"
            },
            email: {
                required: "Please enter email address",
                email: "Please enter valid email address"
            },
            gender: {
                required: "Please select gender"
            },
            country: {
                required: "Please select country"
            },
            state: {
                required: "Please enter state"
            },
            city: {
                required: "Please enter city"
            },
            address: {
                required: "Please enter address"
            },
            mobile: {
                required: "Please enter mobile number",
                number: 'Please enter a valid mobile number'
            }
        }
    });
            </script>
        </div>
    </div>
</div>
@endsection