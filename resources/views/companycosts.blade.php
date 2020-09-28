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
    <button type="button" class="btn btn-primary float-right ml-1" data-toggle="modal" data-target="#fullemployeeModal">
        Add Expense
    </button>

    <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
        <label class="btn btn-secondary active">
            <input type="radio" name="options" id="active" autocomplete="off" checked> Active
        </label>
        <label class="btn btn-secondary">
            <input type="radio" name="options" id="archived" autocomplete="off"> Archived
        </label>
    </div>

    <!-- companycost table -->
    <div class="modal fade" id="fullemployeeModal" tabindex="-1" role="dialog" aria-labelledby="fullemployeeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="fullemployeeModalLabel">Add new expense</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ url('companycosts') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="companycost_archived" value="0">
                        <div class="form-row">
                            <div class="form-group col-sm">
                                <label for="input">Expense name</label>
                                <input type="text" class="form-control" name="companycost_name"
                                    placeholder="Warehouse rental">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm">
                                <label for="input">Yearly Cost</label>
                                <label class="sr-only" for="inlineFormInputGroup">Yearly cost</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup"
                                        name="companycost_yearly" placeholder="0.00">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="Submit" class="btn btn-primary">Save Expense</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div id="active_div">
        <div class="container float-left mb-3">
            <div class="row">
                <div class="col-4">
                    <input type="text" class="form-control float-left" id="active_input" onkeyup="activeFunction()"
                        placeholder="Search company costs">
                </div>
            </div>
        </div>

    <div class='table-responsive'>
    <h3>Company Costs</h3>
    <table id="active_table" class="display table table-hover table-sm mt-1">
            <thead>
                <tr>
                    <th scope="col" onclick="sortActive(0)">Expense Name</th>
                    <th scope="col" onclick="sortActive(1)">Yearly Cost</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($companyCosts as $companyCost)
                @if($companyCost->companycost_archived == '0')
                <tr>
                    <td>{{$companyCost->companycost_name}}</td>
                    <td>${{$companyCost->companycost_yearly}}</td>
                    <td><a href="{{action('CompanyCostController@edit', $companyCost['pk_companycost_id'])}}">Edit</a>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
    </div>

    <div id="archived_div" style="display: none">
        <div class="container float-left mb-3">
            <div class="row">
                <div class="col-4">
                    <input type="text" class="form-control float-left" id="archived_input" onkeyup="archivedFunction()"
                        placeholder="Search company costs">
                </div>
            </div>
        </div>
    <div class='table-responsive'>
    <h3>Archived Company Costs</h3>
    <table id="archived_table" class="display table table-hover table-sm mt-1">
            <thead>
                <tr>
                    <th scope="col" onclick="sortArchived(0)">Expense Name</th>
                    <th scope="col" onclick="sortArchived(1)">Yearly Cost</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($companyCosts as $companyCost)
                @if($companyCost->companycost_archived == '1')
                <tr>
                    <td>{{$companyCost->companycost_name}}</td>
                    <td>${{$companyCost->companycost_yearly}}</td>
                    <td><a href="{{action('CompanyCostController@edit', $companyCost['pk_companycost_id'])}}">Edit</a>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</div>
@stop
