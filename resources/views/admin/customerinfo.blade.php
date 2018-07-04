@extends('layouts.layout')

@section('navbar')
<ul class="nav justify-content-end demo-nav">
    <li class="nav-item">
        <a class="nav-link active" href="/dashboard">DashBoard</a>
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
            <h1>Customer Details</h1>
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
                    <input type="text" name="country" class="form-control" placeholder="Country" value="{{$customerInfo->country}}">
                </div>
                <div class="form-group">
                    <input type="text" name="state" class="form-control" placeholder="State" value="{{$customerInfo->state}}">
                </div>
                <div class="form-group">
                    <input type="text" name="city" class="form-control" placeholder="City" value="{{$customerInfo->city}}">
                </div>
                <div class="form-group">
                    <input type="text" name="zipcode" class="form-control" placeholder="zipcode" value="{{$customerInfo->countrycode}}">
                </div>
                <div class="form-group">
                    <input type="text" name="address" class="form-control" placeholder="Address" value="{{$customerInfo->address}}">
                </div>
                <div class="form-group">
                    <input type="text" name="mobile" class="form-control" placeholder="mobile" value="{{$customerInfo->phone}}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection