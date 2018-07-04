@extends('layouts.layout')

@section('navbar')
    <ul class="nav justify-content-end demo-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('profile') }}">Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ url('/message') }}">Message</a>
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
        <h4>Hi, {{ $user->fname }} {{ $user->lname }}</h4>
    </div>
  </div>
</div>
 @endsection