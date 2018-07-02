@extends('layouts.layout')

@section('navbar')
    <ul class="nav justify-content-end demo-nav">
        <li class="nav-item">
            <a class="nav-link" href="/profile">Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="/message">Messages</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/logout">Logout</a>
        </li>
    </ul>
@endsection

@section('content')
<div class="container login-content">
  <div class="row justify-content-center">
    <div class="col-4">
            <h1> Messages </h1>
            <form id="login-form" method="POST" action="{{ action('CustomerController@saveMessage') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleInputSubject1">Subject</label>
                <input type="text" class="form-control" name="subject" placeholder="Subject">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Example textarea</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
    </div>
  </div>
</div>
 @endsection