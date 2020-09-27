@extends('layouts.app')

@section('title', 'Discounts')

@section('content')
<div class=" p-3 mb-5 bg-white rounded border">
    <div>
        @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if(\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div>
        @endif
    </div>

    <button type="button" class="btn btn-primary float-right ml-1" data-toggle="modal" data-target="#fullemployeeModal">
        Add Discount
    </button>

    
    <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
        <label class="btn btn-secondary active">
            <input type="radio" name="options" id="active" autocomplete="off" checked> Active
        </label>
        <label class="btn btn-secondary">
            <input type="radio" name="options" id="archived" autocomplete="off"> Archived
        </label>
    </div>

    <!--- companycost table  -->
    <div class="modal fade" id="fullemployeeModal" tabindex="-1" role="dialog" aria-labelledby="fullemployeeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="fullemployeeModalLabel">Add new discount</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ url('discounts') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="discount_archived" value="0">
                        <div class="form-row">
                            <div class="form-group col-sm">
                                <label for="input">Discount Name</label>
                                <input type="text" class="form-control" name="discount_name" placeholder="MATES RATES CATEGORY 2 - 10%">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm">
                                <label for="input">Discount Rate</label>
                                <label class="sr-only" for="inlineFormInputGroup">Discount Rate</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">%</div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup"
                                        name="discount_rate" placeholder="0.10">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="Submit" class="btn btn-primary">Save Discount</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class='table-responsive' id="active_div">
    <h3 class="mb-4 float-left">Discounts</h3>
        <table class="table table-hover table-sm mt-1">
            <thead>
                <tr>
                    <th scope="col">Discount Name</th>
                    <th scope="col">Discount Rate %</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($discounts as $discount)
                @if($discount->discount_archived == '0')
                <tr>
                    <td>{{ $discount->discount_name }}</td>
                    <td>{{ $discount->discount_rate }}</td>
                    <td><a href="{{action('DiscountController@edit', $discount['pk_discount_id'])}}">Edit</a></td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>

    <div class='table-responsive' id="archived_div" style="display: none">
    <h3 class="mb-4 float-left">Archived Discounts</h3>
        <table class="table table-hover table-sm mt-1">
            <thead>
                <tr>
                    <th scope="col">Discount Name</th>
                    <th scope="col">Discount Rate %</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($discounts as $discount)
                @if($discount->discount_archived == '1')
                <tr>
                    <td>{{ $discount->discount_name }}</td>
                    <td>{{ $discount->discount_rate }}</td>
                    <td><a href="{{action('DiscountController@edit', $discount['pk_discount_id'])}}">Edit</a></td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@stop
