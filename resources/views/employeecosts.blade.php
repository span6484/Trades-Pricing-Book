@extends('layouts.app')

@section('title', 'Employee Costs')

@section('content')

<!-- Button trigger Employee modal -->
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
        Add Employee
    </button>

    <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
        <label class="btn btn-secondary active">
            <input type="radio" name="options" id="active" autocomplete="off" checked> Active
        </label>
        <label class="btn btn-secondary">
            <input type="radio" name="options" id="archived" autocomplete="off"> Archived
        </label>
    </div>

    <!-- Full Employee Modal -->
    <div class="modal fade" id="fullemployeeModal" tabindex="-1" role="dialog" aria-labelledby="fullemployeeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="fullemployeeModalLabel">Enter employee details</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ url('employeecosts') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="employee_archived" value="0">
                        <input type="hidden" name="employee_type" value="Employee">
                        <input type="hidden" name="employee_cash" value="0">
                        <div class="form-row pb-2">
                            <div class="form-group col-md-6">
                                <label for="input">Employee name</label>
                                <input type="text" class="form-control" id="employeeName" name="employee_name"
                                    placeholder="John Smith">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="input">Base hourly</label>
                                <label class="sr-only" for="inlineFormInputGroup">Base hourly</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup"
                                        name="employee_basehourly" placeholder="0.00">
                                </div>
                            </div>
                        </div>
                        <div class="form-row border-bottom pb-2">
                            <div class="form-group col-md-6">
                                <label for="input">Hours per week</label>
                                <input type="text" class="form-control" id="hoursPerWeek" name="employee_hoursperweek"
                                    placeholder="0">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="input">Weeks per year</label>
                                
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" id="weeksPerYear"
                                        name="employee_weeksperyear" placeholder="0">
                                </div>
                            </div>
                        </div>

                        <h5 class="pt-3 pb-1">Annual expenses</h5>
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="input">Vehicle</label>
                                <label class="sr-only" for="inlineFormInputGroup">Vehicle</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup"
                                        name="employee_vehiclecost" placeholder="0.00" value="0">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="input">Other costs</label>
                                <label class="sr-only" for="inlineFormInputGroup">Other costs</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup"
                                        name="employee_otherweeklycost" placeholder="0.00" value="0">
                                </div>
                            </div>
                        </div>
                        <div class="form-row border-bottom pb-2">
                            <div class="form-group col-md-6">
                                <label for="input">Phone</label>
                                <label class="sr-only" for="inlineFormInputGroup">Phone</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup"
                                        name="employee_phone" placeholder="0.00" value="0">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="input">Workers comp</label>
                                <label class="sr-only" for="inlineFormInputGroup">Workers comp</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup"
                                        name="employee_workercomp" placeholder="0.00" value="0">
                                </div>
                            </div>
                        </div>

                        <h5 class="pt-3 pb-1">Totals</h5>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="employeeweeklypay">Weekly pay</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="text" class="form-control" id="employeeweeklypay" placeholder="0.00"
                                        readonly>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="yearlypay">Yearly pay</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="text" class="form-control" id="yearlypay" placeholder="0.00" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="super">Super</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="text" class="form-control" id="super" placeholder="0.00" readonly>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="totalLessSuper">Total cost less super</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="text" class="form-control" id="totalLessSuper" placeholder="0.00"
                                        readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="totalPackage">Total package cost</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="text" class="form-control" id="totalPackage" placeholder="0.00"
                                        readonly>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="Submit" class="btn btn-primary">Save Employee</button>
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
                        placeholder="Search supplier names">
                </div>
            </div>
        </div>
        <div class='table-responsive'>
    <h3>Full-Time Employees</h3>
    <table id="active_table" class="display table table-hover table-sm mt-1">
            <thead>
                <tr>
                    <th scope="col" onclick="sortActive(0)">Name</th>
                    <th scope="col" onclick="sortActive(1)">Hourly</th>
                    <th scope="col" onclick="sortActive(2)">Weekly</th>
                    <th scope="col" onclick="sortActive(3)">Yearly</th>
                    <th scope="col" onclick="sortActive(4)">Hours per week</th>
                    <th scope="col" onclick="sortActive(5)">Weeks per year</th>
                    <th scope="col" onclick="sortActive(6)">Vehicle</th>
                    <th scope="col" onclick="sortActive(7)">Other Weekly</th>
                    <th scope="col" onclick="sortActive(8)">Phone</th>
                    <th scope="col" onclick="sortActive(9)">Super</th>
                    <th scope="col" onclick="sortActive(10)">Workers Comp</th>
                    <th scope="col" onclick="sortActive(11)">Total Package</th>
                    <th scope="col" onclick="sortActive(12)">Total Cost Less Super</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employeeCosts as $employeeCost)
                @if ($employeeCost->employee_type == 'Employee' && $employeeCost->employee_archived == '0')
                <tr>
                    <td>{{$employeeCost->employee_name}}</td>

                    <td>${{$employeeCost->employee_basehourly}}</td>
                    <td>{{$employeeCost->employee_hoursperweek * $employeeCost->employee_basehourly}}</td>
                    <td>{{$employeeCost->employee_hoursperweek * $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear}}</td>
                    <td>{{$employeeCost->employee_hoursperweek}}</td>
                    <td>{{$employeeCost->employee_weeksperyear}}</td>
                    <td>${{$employeeCost->employee_vehiclecost}}</td>
                    <td>${{$employeeCost->employee_otherweeklycost}}</td>
                    <td>${{$employeeCost->employee_phone}}</td>
                    <td>${{$employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear*0.095}}</td>
                    <td>${{$employeeCost->employee_workercomp}}</td>
                    <td>${{$employeeCost->employee_workercomp + $employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear*0.095 + $employeeCost->employee_phone +$employeeCost->employee_otherweeklycost + $employeeCost->employee_vehiclecost + $employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear}}</td>
                    <td>${{$employeeCost->employee_workercomp + $employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear*0.095 + $employeeCost->employee_phone +$employeeCost->employee_otherweeklycost + $employeeCost->employee_vehiclecost + $employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear - $employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear*0.095}}</td>
                    <td><a href="{{action('EmployeeCostController@edit', $employeeCost['pk_employee_id'])}}">Edit</a></td>
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
                        placeholder="Search customer names">
                </div>
            </div>
        </div>
    <div class='table-responsive'>
    <h3>Archived Full-Time Employees</h3>
    <table id="archived_table" class="display table table-hover table-sm mt-1">
            <thead>
                <tr>
                    <th scope="col" onclick="sortArchived(0)">Name</th>
                    <th scope="col" onclick="sortArchived(1)">Hourly</th>
                    <th scope="col" onclick="sortArchived(2)">Weekly</th>
                    <th scope="col" onclick="sortArchived(3)">Yearly</th>
                    <th scope="col" onclick="sortArchived(4)">Hours per week</th>
                    <th scope="col" onclick="sortArchived(5)">Weeks per year</th>
                    <th scope="col" onclick="sortArchived(6)">Vehicle</th>
                    <th scope="col" onclick="sortArchived(7)">Other Weekly</th>
                    <th scope="col" onclick="sortArchived(8)">Phone</th>
                    <th scope="col" onclick="sortArchived(9)">Super</th>
                    <th scope="col" onclick="sortArchived(10)">Workers Comp</th>
                    <th scope="col" onclick="sortArchived(11)">Total Package</th>
                    <th scope="col" onclick="sortArchived(12)">Total Cost Less Super</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employeeCosts as $employeeCost)
                @if ($employeeCost->employee_type == 'Employee' && $employeeCost->employee_archived == '1')
                <tr>
                    <td>{{$employeeCost->employee_name}}</td>

                    <td>${{$employeeCost->employee_basehourly}}</td>
                    <td>{{$employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly}}</td>
                    <td>{{$employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear}}</td>
                    <td>{{$employeeCost->employee_hoursperweek}}</td>
                    <td>{{$employeeCost->employee_weeksperyear}}</td>
                    <td>${{$employeeCost->employee_vehiclecost}}</td>
                    <td>${{$employeeCost->employee_otherweeklycost}}</td>
                    <td>${{$employeeCost->employee_phone}}</td>
                    <td>${{$employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear*0.095}}</td>
                    <td>${{$employeeCost->employee_workercomp}}</td>
                    <td>${{$employeeCost->employee_workercomp + $employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear*0.095 + $employeeCost->employee_phone +$employeeCost->employee_otherweeklycost + $employeeCost->employee_vehiclecost + $employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear}}</td>
                    <td>${{$employeeCost->employee_workercomp + $employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear*0.095 + $employeeCost->employee_phone +$employeeCost->employee_otherweeklycost + $employeeCost->employee_vehiclecost + $employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear - $employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear*0.095}}</td>
                    <td><a href="{{action('EmployeeCostController@edit', $employeeCost['pk_employee_id'])}}">Edit</a></td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</div>

<div class=" p-3 mb-5 bg-white rounded border">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary float-right ml-2" data-toggle="modal" data-target="#subcontractorModal">
        Add Sub-Contractor
    </button>

    <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
        <label class="btn btn-secondary active">
            <input type="radio" name="options" id="active2" autocomplete="off" checked> Active
        </label>
        <label class="btn btn-secondary">
            <input type="radio" name="options" id="archived2" autocomplete="off"> Archived
        </label>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="subcontractorModal" tabindex="-1" role="dialog"
        aria-labelledby="subcontractorModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="subcontractorModalLabel">Enter sub-contracator details</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method="post" action="{{ url('employeecosts') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="employee_type" value="Sub-Contractor">
                        <div class="form-row pb-2">
                            <div class="form-group col-md-6">
                                <label for="input">Sub-contractor name</label>
                                <input type="text" class="form-control" id="subcontractorName" name="employee_name"
                                    placeholder="John Smith">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="input">Hourly rate</label>
                                <label class="sr-only" for="inlineFormInputGroup">Hourly rate</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup"
                                        name="employee_basehourly" placeholder="0.00">
                                </div>
                            </div>
                        </div>

                        <div class="form-row border-bottom pb-2">
                            <div class="form-group col-md-6">
                                <label for="input">Hours per week</label>
                                <input type="text" class="form-control" id="hoursPerWeek" name="employee_hoursperweek"
                                    placeholder="0">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="input">Weeks per year</label>                            
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" id="weeksPerYear"
                                        name="employee_weeksperyear" placeholder="0">
                                </div>
                            </div>
                        </div>

                        <h5 class="pt-3 pb-1">Annual expenses</h5>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="input">Vehicle</label>
                                <label class="sr-only" for="inlineFormInputGroup">Vehicle</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup"
                                        name="employee_vehiclecost" placeholder="Vehicle" value="0">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="input">Other costs</label>
                                <label class="sr-only" for="inlineFormInputGroup">Other costs</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup"
                                        name="employee_otherweeklycost" placeholder="eTag, etc" value="0">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="input">Phone</label>
                                <label class="sr-only" for="inlineFormInputGroup">Phone</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup"
                                        name="employee_phone" placeholder="Phone" value="0">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="input">Workers comp</label>
                                <label class="sr-only" for="inlineFormInputGroup">Workers comp</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup"
                                        name="employee_workercomp" placeholder="Workers Comp" value="0">
                                </div>
                            </div>
                        </div>
                        <div class="form-row border-bottom pb-2">
                            <div class="form-group col-md-6">
                                <label for="input">Cash</label>
                                <label class="sr-only" for="inlineFormInputGroup">Cash</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup" name="employee_cash" placeholder="Cash"
                                        value="0">
                                </div>
                            </div>

                        </div>

                        <h5 class="pt-3 pb-1">Totals</h5>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="subcontractorweeklyrate">Weekly rate</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="text" class="form-control" id="subcontractorweeklyrate"
                                        placeholder="0.00" readonly>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="subcontractoryearlyrate">Yearly rate</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="text" class="form-control" id="subcontractoryearlyrate"
                                        placeholder="0.00" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="subcontractorsuper">Super</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="text" class="form-control" id="subcontractorsuper" placeholder="0.00"
                                        readonly>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="subcontractortotalLessSuper">Total cost less super</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="text" class="form-control" id="subcontractortotalLessSuper"
                                        placeholder="0.00" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="subcontractorGst">GST</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="text" class="form-control" id="subcontractorGst" placeholder="0.00"
                                        readonly>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="subcontractorTotalIncGst">Total including GST</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="text" class="form-control" id="subcontractorTotalIncGst"
                                        placeholder="0.00" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="subcontractortotalPackage">Total package cost</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="text" class="form-control" id="subcontractortotalPackage"
                                        placeholder="0.00" readonly>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Sub-Contractor</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div id="active_div2">
        <div class="container float-left mb-3">
            <div class="row">
                <div class="col-4">
                    <input type="text" class="form-control float-left" id="active_input2" onkeyup="activeFunction2()"
                        placeholder="Search supplier names">
                </div>
            </div>
        </div>
    <div class='table-responsive'>
    <h3>Sub-Contractors</h3>
    <table id="active_table2" class="display table table-hover table-sm mt-1">
            <thead>
                <tr>
                    <th scope="col" onclick="sortActive2(0)">Name</th>
                    <th scope="col" onclick="sortActive2(1)">Hourly</th>
                    <th scope="col" onclick="sortActive2(2)">Weekly</th>
                    <th scope="col" onclick="sortActive2(3)">Yearly</th>
                    <th scope="col" onclick="sortActive2(4)">Hours per week</th>
                    <th scope="col" onclick="sortActive2(5)">Weeks per year</th>
                    <th scope="col" onclick="sortActive2(6)">Vehicle</th>
                    <th scope="col" onclick="sortActive2(7)">Other Weekly</th>
                    <th scope="col" onclick="sortActive2(8)">Cash</th>
                    <th scope="col" onclick="sortActive2(9)">Phone</th>
                    <th scope="col" onclick="sortActive2(10)">Super</th>
                    <th scope="col" onclick="sortActive2(11)">Workers Comp</th>
                    <th scope="col" onclick="sortActive2(12)">Total Package</th>
                    <th scope="col" onclick="sortActive2(13)">GST</th>
                    <th scope="col" onclick="sortActive2(14)">Total Inc GST</th>
                    <th scope="col" onclick="sortActive2(15)">Total Cost Less Super</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employeeCosts as $employeeCost)
                @if ($employeeCost->employee_type == 'Sub-Contractor' && $employeeCost->employee_archived == '0')
                <tr>
                <td>{{$employeeCost->employee_name}}</td>
                    <td>${{$employeeCost->employee_basehourly}}</td>
                    <td>{{$employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly}}</td>
                    <td>{{$employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear}}</td>
                    <td>{{$employeeCost->employee_hoursperweek}}</td>
                    <td>{{$employeeCost->employee_weeksperyear}}</td>
                    <td>${{$employeeCost->employee_vehiclecost}}</td>
                    <td>${{$employeeCost->employee_otherweeklycost}}</td>
                    <td>${{$employeeCost->employee_cash}}</td>
                    <td>${{$employeeCost->employee_phone}}</td>
                    <td>${{$employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear*0.095}}</td>
                    <td>${{$employeeCost->employee_workercomp}}</td>
                    <td>${{$employeeCost->employee_workercomp + $employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear*0.095 + $employeeCost->employee_phone +$employeeCost->employee_otherweeklycost + $employeeCost->employee_vehiclecost + $employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear}}</td>
                    <td>${{($employeeCost->employee_workercomp + $employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear*0.095 + $employeeCost->employee_phone +$employeeCost->employee_otherweeklycost + $employeeCost->employee_vehiclecost + $employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear)*10/100}}</td>
                    <td>${{$employeeCost->employee_workercomp + $employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear*0.095 + $employeeCost->employee_phone +$employeeCost->employee_otherweeklycost + $employeeCost->employee_vehiclecost + $employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear}}</td>
                    <td>${{($employeeCost->employee_workercomp + $employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear*0.095 + $employeeCost->employee_phone +$employeeCost->employee_otherweeklycost + $employeeCost->employee_vehiclecost + $employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear)-($employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear*0.095)}}</td>
                    <td><a href="{{action('EmployeeCostController@edit', $employeeCost['pk_employee_id'])}}">Edit</a></td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
    <div id="archived_div2" style="display: none">
        <div class="container float-left mb-3">
            <div class="row">
                <div class="col-4">
                    <input type="text" class="form-control float-left" id="archived_input2" onkeyup="archivedFunction2()"
                        placeholder="Search customer names">
                </div>
            </div>
        </div>
        <div class='table-responsive'>
        <h3>Archived Sub-Contractors</h3>
        <table id="archived_table2" class="display table table-hover table-sm mt-1">
            <thead>
                <tr>
                    <th scope="col" onclick="sortArchived2(0)">Name</th>
                    <th scope="col" onclick="sortArchived2(1)">Hourly</th>
                    <th scope="col" onclick="sortArchived2(2)">Weekly</th>
                    <th scope="col" onclick="sortArchived2(3)">Yearly</th>
                    <th scope="col" onclick="sortArchived2(4)">Hours per week</th>
                    <th scope="col" onclick="sortArchived2(5)">Weeks per year</th>
                    <th scope="col" onclick="sortArchived2(6)">Vehicle</th>
                    <th scope="col" onclick="sortArchived2(7)">Other Weekly</th>
                    <th scope="col" onclick="sortArchived2(8)">Cash</th>
                    <th scope="col" onclick="sortArchived2(9)">Phone</th>
                    <th scope="col" onclick="sortArchived2(10)">Super</th>
                    <th scope="col" onclick="sortArchived2(11)">Workers Comp</th>
                    <th scope="col" onclick="sortArchived2(12)">Total Package</th>
                    <th scope="col" onclick="sortArchived2(13)">GST</th>
                    <th scope="col" onclick="sortArchived2(14)">Total Inc GST</th>
                    <th scope="col" onclick="sortArchived2(15)">Total Cost Less Super</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employeeCosts as $employeeCost)
                @if ($employeeCost->employee_type == 'Sub-Contractor' && $employeeCost->employee_archived == '1')
                <tr>
                    <td>{{$employeeCost->employee_name}}</td>
                    <td>${{$employeeCost->employee_basehourly}}</td>
                    <td>{{$employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly}}</td>
                    <td>{{$employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear}}</td>
                    <td>{{$employeeCost->employee_hoursperweek}}</td>
                    <td>{{$employeeCost->employee_weeksperyear}}</td>
                    <td>${{$employeeCost->employee_vehiclecost}}</td>
                    <td>${{$employeeCost->employee_otherweeklycost}}</td>
                    <td>${{$employeeCost->employee_cash}}</td>
                    <td>${{$employeeCost->employee_phone}}</td>
                    <td>${{$employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear*0.095}}</td>
                    <td>${{$employeeCost->employee_workercomp}}</td>
                    <td>${{$employeeCost->employee_workercomp + $employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear*0.095 + $employeeCost->employee_phone +$employeeCost->employee_otherweeklycost + $employeeCost->employee_vehiclecost + $employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear}}</td>
                    <td>${{($employeeCost->employee_workercomp + $employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear*0.095 + $employeeCost->employee_phone +$employeeCost->employee_otherweeklycost + $employeeCost->employee_vehiclecost + $employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear)*10/100}}</td>
                    <td>${{$employeeCost->employee_workercomp + $employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear*0.095 + $employeeCost->employee_phone +$employeeCost->employee_otherweeklycost + $employeeCost->employee_vehiclecost + $employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear}}</td>
                    <td>${{($employeeCost->employee_workercomp + $employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear*0.095 + $employeeCost->employee_phone +$employeeCost->employee_otherweeklycost + $employeeCost->employee_vehiclecost + $employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear)-($employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear*0.095)}}</td>
                    <td><a href="{{action('EmployeeCostController@edit', $employeeCost['pk_employee_id'])}}">Edit</a></td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</div>

@stop
