@extends('layouts.layout')

@include('admin.header')

@section('content')
<br/>
<h3 style="text-align: center;">Customer Messages</h3>
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
            <td colspan="4" style="text-align: center"> No Records </td>
        </tr>
        @endforelse
  </tbody>
</table>
</form>
 @endsection