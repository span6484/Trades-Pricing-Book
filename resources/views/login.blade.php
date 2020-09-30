@extends('layouts.app')

@section('title', 'Login')

@section('content')

<!-- Button trigger modal -->
<div class=" p-3 mb-5 bg-white rounded border">
    <div>

        @if(isset(Auth::user()->user_name))
            <script>window.location="/main/successlogin";</script>
        @endif
        @if($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif

        @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

    <div class="row">
        <div class="col-sm">
            <h3>Login</h3>
            <form method="post" action="{{ url('/main/checklogin') }}">
                {{csrf_field()}}
                <div class="form-row">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="user_name" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="user_password" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Login">
                </div>
            </form>
        </div>
    </div>
</div>

@stop
