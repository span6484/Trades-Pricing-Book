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
    <h3 class="mb-4 float-left">Full-Time Employees</h3>
    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#fullemployeeModal">
        Add Employee
    </button>

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

    <div class='table-responsive'>
        <table class="table table-hover table-sm mt-1">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Hourly</th>
                    <th scope="col">Weekly</th>
                    <th scope="col">Yearly</th>
                    <th scope="col">Hours per week</th>
                    <th scope="col">Weeks per year</th>
                    <th scope="col">Vehicle</th>
                    <th scope="col">Other Weekly</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Super</th>
                    <th scope="col">Workers Comp</th>
                    <th scope="col">Total Package</th>
                    <th scope="col">Total Cost Less Super</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employeeCosts as $employeeCost)
                @if ($employeeCost->employee_type == 'Employee')
                <tr>
                    <td>{{$employeeCost->employee_name}}</td>

                    <td>${{$employeeCost->employee_basehourly}}</td>
                    <td>$Weekly</td>
                    <td>$Yearly</td>
                    <td>{{$employeeCost->employee_hoursperweek}}</td>
                    <td>{{$employeeCost->employee_weeksperyear}}</td>
                    <td>${{$employeeCost->employee_vehiclecost}}</td>
                    <td>${{$employeeCost->employee_otherweeklycost}}</td>
                    <td>${{$employeeCost->employee_phone}}</td>
                    <td>$Super</td>
                    <td>${{$employeeCost->employee_workercomp}}</td>
                    <td>$Total Package</td>
                    <td>$Total Cost Less Super</td>
                    <td><a href="{{action('CostController@edit', $employeeCost['pk_employee_id'])}}">Edit</a></td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class=" p-3 mb-5 bg-white rounded border">
    <h3 class="mb-4 float-left">Sub-Contractors</h3>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#subcontractorModal">
        Add Sub-Contractor
    </button>

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

    <div class='table-responsive'>
        <table class="table table-hover table-sm mt-1">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Hourly</th>
                    <th scope="col">Weekly</th>
                    <th scope="col">Yearly</th>
                    <th scope="col">Hours per week</th>
                    <th scope="col">Weeks per year</th>
                    <th scope="col">Vehicle</th>
                    <th scope="col">Other Weekly</th>
                    <th scope="col">Cash</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Super</th>
                    <th scope="col">Workers Comp</th>
                    <th scope="col">Total Package</th>
                    <th scope="col">GST</th>
                    <th scope="col">Total Inc GST</th>
                    <th scope="col">Total Cost Less Super</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employeeCosts as $employeeCost)
                @if ($employeeCost->employee_type == 'Sub-Contractor')
                <tr>
                    <td>{{$employeeCost->employee_name}}</td>
                    <td>${{$employeeCost->employee_basehourly}}</td>
                    <td>Weekly</td>
                    <td>Yearly</td>
                    <td>{{$employeeCost->employee_hoursperweek}}</td>
                    <td>{{$employeeCost->employee_weeksperyear}}</td>
                    <td>${{$employeeCost->employee_vehiclecost}}</td>
                    <td>${{$employeeCost->employee_otherweeklycost}}</td>
                    <td>${{$employeeCost->employee_cash}}</td>
                    <td>${{$employeeCost->employee_phone}}</td>
                    <td>$Super</td>
                    <td>${{$employeeCost->employee_workercomp}}</td>
                    <td>$Total Package</td>
                    <td>$GST</td>
                    <td>$Total Inc GST</td>
                    <td>$Total Cost Less Super</td>
                    <td><a href="{{action('CostController@edit', $employeeCost['pk_employee_id'])}}">Edit</a></td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop
