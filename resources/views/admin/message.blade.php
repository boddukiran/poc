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
        <a class="nav-link" href="{{ url('/adminlogout') }}">Logout</a>
    </li>
</ul>
@endsection
@section('content')
<br/>
<h3 style="text-align: center; color: blue">Query</h3>
<br/>
<form>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Email</th>
      <th scope="col">Subject</th>
      <th scope="col">Message</th>
    </tr>
  </thead>
  <tbody>
        @forelse($messages as $messKey=>$messVal)
        <tr> 
            <th scope="row">{{ $messKey+1 }}</th>
            <td>{{ $messVal->email }}</td>
            <td>{{ $messVal->subject }}</td>
            <td>{{ $messVal->message }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="4"> No Records </td>
        </tr>
        @endforelse
  </tbody>
</table>
</form>
 @endsection