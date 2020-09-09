@extends('layouts.app')

@section('title', 'Total Business Costs')

@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#customerModal">
    Add Customer
</button>

<!-- Modal -->
<div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="customerModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="customerModalLabel">Enter customer details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <!-- <label for="input">Name</label> -->
                            <input type="text" class="form-control" id="inputName" placeholder="Customer name">
                        </div>
                        <div class="form-group col-md-6">
                            <!-- <label for="inputEmail4">Email</label> -->
                            <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <!-- <label for="inputAddress">Phone</label> -->
                        <input type="text" class="form-control" id="inputPhone" placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <!-- <label for="inputAddress2">Address </label> -->
                        <input type="text" class="form-control" id="inputAddress" placeholder="Address">
                    </div>
                    <div class="form-group">
                        <select id="inputDiscount" class="form-control">
                            <option selected>NORMAL PRICING - NO DISCOUNT</option>
                            <option>MATES RATES CATEGORY 1</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save Customer</button>
            </div>
        </div>
    </div>
</div>

<div class='table-responsive'>
    <table class="table table-hover table-sm mt-1">
        <thead>
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
            <!-- @foreach($customers as $customer)
            <tr>
                <td>{{$customer->customer_name}}</td>
                <td>{{$customer->customer_company}}</td>
                <td>{{$customer->customer_phone}}</td>
                <td>{{$customer->customer_email}}</td>
                <td>{{$customer->customer_address}}</td>
                <td>{{$customer->fk_discount_id}}</td>
            </tr>
            @endforeach -->
        </tbody>
    </table>
</div>
@stop