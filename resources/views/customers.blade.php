@extends('layouts.app')

@section('title', 'Customers')

@section('content')

<div class='table-responsive'>
<table class="table table-hover table-sm">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Company</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
      <th scope="col">Discount</th>
    </tr>
  </thead>
  <tbody>
    @foreach($customers as $customer)
        <tr>
        <th>{{$customer->customer_name}}</th>
        <td>{{$customer->customer_company}}</td>
        <td>{{$customer->customer_phone}}</td>
        <td>{{$customer->customer_email}}</td>
        <td>{{$customer->customer_address}}</td>
        <td>{{$customer->fk_discount_id}}</td>
        </tr>
    @endforeach
  </tbody>
</table>
</div>
    
@stop
