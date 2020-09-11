@extends('layouts.app')

@section('title', 'Company Costs')

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
    <h3 class="mb-4 float-left">Company Costs</h3>
    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#fullemployeeModal">
        Add Employee
    </button>

    <!-- companycost table -->
    <div class="modal fade" id="fullemployeeModal" tabindex="-1" role="dialog" aria-labelledby="fullemployeeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="fullemployeeModalLabel">Add New CompanyCosts</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ url('companycosts') }}">
                        {{ csrf_field() }}
                        <div class="form-row border-bottom pb-2">
                            <div class="form-group col-md-6">
                                <label for="input">Companycost Name</label>
                                <input type="text" class="form-control"  name="companycost_name"
                                    placeholder="companycost_name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="input">Companycost Yearly</label>
                                <label class="sr-only" for="inlineFormInputGroup">Companycost Yearly</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup"
                                        name="companycost_yearly" placeholder="Companycost Yearly">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="input">Companycost Archived</label>
                                <label class="sr-only" for="inlineFormInputGroup">Companycost Archived</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup"
                                        name="companycost_archived" placeholder="companycost_archived">
                                </div>
                            </div>
                        </div>
                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="Submit" class="btn btn-primary">Save Company Cost</button>
                        </div>
                </form>
            </div>
        </div>
    </div>

    <div class='table-responsive'>
        <table class="table table-hover table-sm mt-1">
            <thead>
                <tr>
                    <th scope="col">Companycost Name</th>
                    <th scope="col">Yearly</th>
                    <th scope="col">Companycost Archived</th>
                </tr>
            </thead>
            <tbody>
                @foreach($companycosts as $companyCost)
                <tr>
                    <td>{{$companyCost->companycost_name}}</td>
                    <td>{{$companyCost->companycost_yearly}}</td>

                    <td>{{$companyCost->companycost_archived}}</td>


                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
