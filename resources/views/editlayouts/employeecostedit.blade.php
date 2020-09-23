@extends('layouts.app')

@section('title', 'Customers')

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
        <h3>Edit Employee Cost</h3>
        <form method="post" action="{{action('CostController@update', $pk_employee_id)}}">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="PATCH">
            <div class="form-row">
                <div class="form-group col-sm">
                    <label for="input">Employee name</label>
                    <input type="text" class="form-control" id="employee_name" name="employee_name"
                        value="{{$employeeCosts->employee_name}}">
                </div>
                <div class="form-group col-sm">
                    <label for="input">Base hourly</label>
                    <input type="text" class="form-control" id="employee_basehourly" name="employee_basehourly"
                        value="{{$employeeCosts->employee_basehourly}}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm">
                    <label for="input">Vehicle</label>
                    <input type="text" class="form-control" id="employee_vehiclecost" name="employee_vehiclecost"
                        value="{{$employeeCosts->employee_vehiclecost}}">
                </div>
                <div class="form-group col-sm">
                    <label for="input">Other costs</label>
                    <input type="email" class="form-control" id="inputEmail" name="employee_otherweeklycost"
                        value="{{$employeeCosts->employee_otherweeklycost}}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm">
                    <label for="input">Phone</label>
                    <input type="text" class="form-control" id="inputAddress" name="employee_phone"
                        value="{{$employeeCosts->employee_phone}}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm">
                    <label for="input">Workers comp</label>
                    <input type="text" class="form-control" id="inputAddress" name="employee_workercomp"
                        value="{{$employeeCosts->employee_workercomp}}">
                </div>
            </div>
            @if ($employeeCost->employee_type == 'Sub-Contractor')
            <div class="form-row">
                <div class="form-group col-sm">
                    <label for="input">Cash</label>
                    <input type="text" class="form-control" id="inputAddress" name="employee_cash"
                        value="{{$employeeCosts->employee_cash}}">
                </div>
            </div>
            @endif
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Save">
            </div>
        </form>
    </div>
</div>
@stop
