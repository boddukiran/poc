@extends('layouts.layout')

@section('navbar')
    <ul class="nav justify-content-end demo-nav">
    <li class="nav-item">
            <a class="nav-link active" href="#">Messages</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="#">Users</a>
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
<br/>
<h3 style="text-align: center; color: blue">Admin DashBoard</h3>
<br/>
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
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>mark@gmail.com</td>
      <td>9000530158</td>
      <td>F</td>
      <td>India</td>
      <td>Edit | Delete</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
      <td>9000530158</td>
      <td>F</td>
      <td>India</td>
      <td>Edit | Delete</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
      <td>9000530158</td>
      <td>F</td>
      <td>India</td>
      <td>Edit | Delete</td>
    </tr>
  </tbody>
</table>
 @endsection