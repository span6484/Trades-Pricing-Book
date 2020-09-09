@extends('layouts.app')

@section('title', 'Employee Costs')

@section('content')

<!-- Button trigger modal -->
<div class=" p-3 mb-5 bg-white rounded border">
<h3 class="mb-4 float-left">Full-Time Employees</h3>
<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#fullemployeeModal">
    Add Employee
</button>

<!-- Modal -->
<div class="modal fade" id="fullemployeeModal" tabindex="-1" role="dialog" aria-labelledby="fullemployeeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fullemployeeModalLabel">Enter employee details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="input">Employee Name</label>
                            <input type="text" class="form-control" id="employeeName" placeholder="Employee Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="baseHourly">Base Hourly</label>
                            <input type="email" class="form-control" id="baseHourly" placeholder="$">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="vehicle">Vehicle</label>
                        <input type="text" class="form-control" id="vehicle" placeholder="$">
                    </div>
                    <div class="form-group">
                        <label for="otherWeekly">Other Weekly Cost</label>
                        <input type="text" class="form-control" id="otherWeekly" placeholder="$">
                    </div>
                    <div class="form-group">
                        <label for="phoneutAddress2">Phone</label>
                        <input type="text" class="form-control" id="phone" placeholder="$">
                    </div>
                    <div class="form-group">
                        <label for="workersComp">Workers Comp</label>
                        <input type="text" class="form-control" id="workersComp" placeholder="$">
                    </div>
                    <div class="form-group">
                        <label for="super">Super</label>
                        <input type="text" class="form-control" id="super" placeholder="$" readonly>
                    </div>
                    <div class="form-group">
                        <label for="totalPackage">Total Package Cost</label>
                        <input type="text" class="form-control" id="totalPackage" placeholder="$" readonly>
                    </div>
                    <div class="form-group">
                        <label for="totalLessSuper">Total Cost Less Super</label>
                        <input type="text" class="form-control" id="totalLessSuper" placeholder="$" readonly>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save Employee</button>
            </div>
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
                <th scope="col">Vehicle</th>
                <th scope="col">Other Weekly</th>
                <th scope="col">Phone</th>
                <th scope="col">Super</th>
                <th scope="col">Workers Comp</th>
                <th scope="col">Total Package</th>
                <th scope="col">Total Cost Less Super</th>
                			 

            </tr>
        </thead>
        <tbody>
            @foreach($employeeCosts as $employeeCost)
            <tr>
                <td>{{$employeeCost->employee_name}}</td>
                <td>{{$employeeCost->employee_basehourly}}</td>
                <td>Weekly</td>
                <td>Yearly</td>
                <td>{{$employeeCost->employee_vehiclecost}}</td>
                <td>{{$employeeCost->employee_otherweeklycost}}</td>
                <td>{{$employeeCost->employee_phone}}</td>
                <td>Super</td>
                <td>{{$employeeCost->employee_workercomp}}</td>
                <td>Total Package</td>
                <td>Total Cost Less Super</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>

<!-- Button trigger modal -->
<div class=" p-3 mb-5 bg-white rounded border">
<h3 class="mb-4 float-left">Sub-Contractors</h3>
<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#fullemployeeModal">
    Add Sub-Contractor
</button>

<!-- Modal -->
<div class="modal fade" id="fullemployeeModal" tabindex="-1" role="dialog" aria-labelledby="fullemployeeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fullemployeeModalLabel">Enter customer details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <!-- <label for="input">Name</label> -->
                            <input type="text" class="form-control" id="inputName" placeholder="Customer name">
                        </div>
                        <div class="form-group col-md-6">
                            <!-- <label for="inputEmail4">Email</label> -->
                            <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <!-- <label for="inputAddress">Phone</label> -->
                        <input type="text" class="form-control" id="inputPhone" placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <!-- <label for="inputAddress2">Address </label> -->
                        <input type="text" class="form-control" id="inputAddress" placeholder="Address">
                    </div>
                    <div class="form-group">
                        <select id="inputDiscount" class="form-control">
                            <option selected>NORMAL PRICING - NO DISCOUNT</option>
                            <option>MATES RATES CATEGORY 1</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save Customer</button>
            </div>
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
                			 

            </tr>
        </thead>
        <tbody>
            @foreach($employeeCosts as $employeeCost)
            <tr>
                <td>{{$employeeCost->employee_name}}</td>
                <td>${{$employeeCost->employee_basehourly}}</td>
                <td>Weekly</td>
                <td>Yearly</td>
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
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>

@stop