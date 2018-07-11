@extends('layouts.layout')

@include('admin.header')

@section('content')
<br/>
<h3 style="text-align: center;">List of Customers</h3>
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
      <th scope="col">Role</th>
      <th scope="col">Status</th>
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
            <td>{{$dataVal->countrycode}}- {{ $dataVal->phone }}</td>
            <td>
                @if($dataVal->gender == 1)
                    Male
                @elseif ($dataVal->gender == 0)
                    Female
                @endif
            </td>            
            <td>                
                {{ ucfirst(trans($dataVal->country)) }}
            </td>
            <td>@if($dataVal->role == 1) Admin @endif</td>
            <td>
                @if($dataVal->status == 1)
                    Registered
                @elseif ($dataVal->status == 0)
                    Pending Verification
                @endif
            </td>
            <td><a href="customer/{{ $dataVal->id }}">Edit</a> 
                @if($dataVal->role != 1) 
                | <a href="deletecustomer/{{ $dataVal->id }}" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                @endif
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