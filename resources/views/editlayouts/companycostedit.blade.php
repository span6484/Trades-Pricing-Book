@extends('layouts.app')

@section('title', 'Company Costs')

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
        <form method="post" action="{{action('CompanyCostController@update', $pk_companycost_id)}}">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="PATCH">
            <div class="form-row">
                <div class="form-group col-sm">
                    <label for="input">Expense name</label>
                    <input type="text" class="form-control" id="companycost_name" name="companycost_name"
                        value="{{$companyCosts->companycost_name}}">
                </div>
                <div class="form-group col-sm">
                    <label for="input">Yearly cost</label>
                    <input type="text" class="form-control" id="companycost_yearly" name="companycost_yearly"
                        value="{{$companyCosts->companycost_yearly}}">
                </div>
            </div>
            <div class="form-group">
                <a class="btn btn-secondary" href="{{url('/companycosts')}}">Cancel</a>
                <input type="submit" class="btn btn-primary" value="Save">
            </div>
        </form>
    </div>
</div>
@stop
