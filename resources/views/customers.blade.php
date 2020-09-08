@extends('layouts.app')

@section('title', 'Customers')

@section('content')

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#customerModal">
    Add Customer
</button>

<!-- Modal -->
<div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class='table-responsive'>
<table class="table table-hover table-sm mt-1">
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
        <td>{{$customer->customer_name}}</td>
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
