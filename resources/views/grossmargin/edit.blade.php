@extends('layouts.app')

@section('title', 'Gross Margin')

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
        <h3>Edit Gross Margin</h3>
        <form method="post" action="{{action('GrossMarginController@update', $pk_gm_id)}}">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="PATCH">
            <div class="form-group">
                <input type="text" name="gm_rate" class="form-control" value="{{$grossmargin->gm_rate}}"
                    placeholder="0.00">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Edit">
            </div>
        </form>
    </div>
</div>
@stop
