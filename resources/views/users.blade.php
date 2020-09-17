@extends('layouts.app')

@section('title', 'Users')

@section('content')

<!-- Button trigger modal -->
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

<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#userModal">
    Add User
</button>

<!-- Modal -->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel">Enter user details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{ url('users') }}">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-sm">
                            <input type="text" class="form-control" id="inputName" name="user_name"
                                placeholder="Username">
                        </div>
                        <div class="form-group col-sm">
                            <input type="text" class="form-control" id="inputCompany" name="user_fullname"
                                placeholder="Full Name">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm">
                            <input type="password" class="form-control" id="inputPhone" name="user_password"
                                placeholder="Password">
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Save User</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class='table-responsive'>
    <table class="table table-hover table-sm mt-1">
        <thead>
            <tr>
                <th scope="col">Username</th>
                <th scope="col">Full Name</th>
                <th scope="col">Password</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->user_name }}</td>
                <td>{{ $user->user_firstlast }}</td>
                <td>{{ $user->user_password }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>

@stop
