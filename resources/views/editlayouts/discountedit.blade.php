@extends('layouts.app')

@section('title', 'Discounts')

@section('content')
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
<div class="row">
    <div class="col-sm">
        <h3>Edit Customer</h3>
        <form method="post" action="{{action('DiscountController@update', $pk_discount_id)}}">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="PATCH">
            <div class="form-row">
                <div class="form-group col-sm">
                    <label for="input">Discount name</label>
                    <input type="text" class="form-control" id="discount_name" name="discount_name"
                        value="{{$discounts->discount_name}}">
                </div>
                <div class="form-group col-sm">
                    <label for="input">Discount Rate %</label>
                    <input type="text" class="form-control" id="discount_rate" name="discount_rate"
                        value="{{$discounts->discount_rate}}">
                </div>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Save">
            </div>
        </form>
    </div>
</div>
@stop
