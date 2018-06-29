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
        <a class="nav-link" href="#">Logout</a>
    </li>     
</ul>
@endsection
@section('content')
<br/>
<h3 style="text-align: center; color: blue">Admin DashBoard</h3>
<br/>
<form>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Gender</th>
      <th scope="col">Country</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
        @forelse($customerData as $key=>$dataVal)
        <tr> 
            <th scope="row">{{ $key+1 }}</th>
            <td>{{ ucfirst(trans($dataVal->fname)) }}</td>
            <td>{{ $dataVal->lname }}</td>
            <td>{{ $dataVal->email }}</td>
            <td>{{ $dataVal->mobile }}</td>
            <td>
                @if($dataVal->gender == 1)
                    Male
                @elseif ($dataVal->gender == 0)
                    Female
                @endif
            </td>
            <td>{{ ucfirst(trans($dataVal->country)) }}</td>
            <td><a href="customerinfo/{{ $dataVal->id }}">Edit</a> |
                <a href="deletecustomerinfo/{{ $dataVal->id }}" onclick="return confirm('Are you sure you want to delet?')">Delete</a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="8" style="text-align: center">No Records Found</td>
        </tr>
        @endforelse
  </tbody>
</table>
</form>
 @endsection