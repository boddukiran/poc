@extends('layouts.layout')

 @include('header')

@section('content')
<div class="container login-content">
  <div class="row justify-content-center">
    <div class="col-4">
        <h4>Hi, {{ $user->fname }} {{ $user->lname }}</h4>
    </div>
  </div>
</div>
 @endsection