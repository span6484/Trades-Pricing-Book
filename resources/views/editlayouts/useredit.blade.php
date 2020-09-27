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
        <h3>Edit User</h3>
        <form method="post" action="{{action('UserController@update', $pk_user_id)}}">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="PATCH">
            <div class="form-row">
                <div class="form-group col-sm">
                    <label for="input">User name</label>
                    <input type="text" class="form-control" id="user_name" name="user_name"
                        value="{{$users->user_name}}">
                </div>
                <div class="form-group col-sm">
                    <label for="input">Full name</label>
                    <input type="text" class="form-control" id="user_firstlast" name="user_firstlast"
                        value="{{$users->user_firstlast}}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm">
                    <label for="input">Password</label>
                    <input type="password" class="form-control" id="user_password" name="user_password"
                        value="{{$users->user_password}}">
                </div>
            </div>
                <div class="form-row">
                    <div class="form-group col-sm">
                        <label for="input">User type</label>
                        <select id="user_type" name="user_type" class="form-control">
                        @if($users->user_type == 'Standard')
                            <option value="Standard" selected>Standard</option>
                            <option value="Admin">Admin</option>
                            @else
                            <option value="Standard">Standard</option>
                            <option value="Admin" selected>Admin</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm">
                        <label for="input">Archived</label>
                        <select id="user_archived" name="user_archived" class="form-control">
                            @if ($users->user_archived == 0)
                            <option value="0" selected>No</option>
                            <option value="1">Yes</option>
                            @else
                            <option value="0">No</option>
                            <option value="1" selected>Yes</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <a class="btn btn-secondary" href="{{url('/users')}}">Cancel</a>
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
        </form>
    </div>
</div>
@stop
