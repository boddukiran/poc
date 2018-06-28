@extends('layouts.layout')

@section('navbar')
    <ul class="nav justify-content-end demo-nav">
        <li class="nav-item">
            <a class="nav-link active" href="#">Message</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Profile</a>
        </li>  
        <li class="nav-item">
            <a class="nav-link" href="#">Logout</a>
        </li>        
    </ul>
@endsection

@section('content')
<div class="container login-content">
  <div class="row justify-content-center">
    <div class="col-4">
        hello customer...
    </div>
  </div>
</div>
 @endsection