@extends('layouts.app')

@section('title', 'Employee Costs')

@section('content')

<!-- Button trigger Employee modal -->
<div class=" p-3 mb-5 bg-white rounded border">
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
                    <h4 class="modal-title" id="fullemployeeModalLabel">Add New Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>

                        <div class="form-row border-bottom pb-2" >
                            <div class="form-group col-md-6">
                                <label for="input">Employee Name</label>
                                <input type="text" class="form-control" id="employeeName" placeholder="Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="input">Base Hourly</label>
                                <label class="sr-only" for="inlineFormInputGroup">Base Hourly</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup"
                                        placeholder="Base Hourly">
                                </div>
                            </div>
                        </div>

                        <h5 class="pt-3">Annual Expenses</h5>
                        <div class="form-row">
                            
                            <div class="form-group col-md-6">
                                <label for="input">Vehicle</label>
                                <label class="sr-only" for="inlineFormInputGroup">Vehicle</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup"
                                        placeholder="Vehicle">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="input">Other Costs</label>
                                <label class="sr-only" for="inlineFormInputGroup">Other Costs</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup"
                                        placeholder="eTag, etc">
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
                                        placeholder="Phone">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="input">Workers Comp</label>
                                <label class="sr-only" for="inlineFormInputGroup">Workers Comp</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup"
                                        placeholder="Workers Comp">
                                </div>
                            </div>
                        </div>

                        <h5 class="pt-3">Totals</h5>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="employeeweeklypay">Weekly Pay</label>
                                <input type="text" class="form-control" id="employeeweeklypay" placeholder="$" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="yearlypay">Yearly Pay</label>
                                <input type="text" class="form-control" id="yearlypay" placeholder="$" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="super">Super</label>
                                <input type="text" class="form-control" id="super" placeholder="$" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="totalLessSuper">Total Cost Less Super</label>
                                <input type="text" class="form-control" id="totalLessSuper" placeholder="$" readonly>
                            </div>                            
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-12">
                                <label for="totalPackage">Total Package Cost</label>
                                <input type="text" class="form-control" id="totalPackage" placeholder="$" readonly>
                            </div>
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
    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#subcontractorModal">
        Add Sub-Contractor
    </button>

    <!-- Modal -->
    <div class="modal fade" id="subcontractorModal" tabindex="-1" role="dialog" aria-labelledby="subcontractorModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title" id="subcontractorModalLabel">Add New Sub-Contracator</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>

                        <div class="form-row border-bottom pb-2" >
                            <div class="form-group col-md-6">
                                <label for="input">Sub-Contractor Name</label>
                                <input type="text" class="form-control" id="subcontractorName" placeholder="Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="input">Hourly Rate</label>
                                <label class="sr-only" for="inlineFormInputGroup">Hourly Rate</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup"
                                        placeholder="Hourly Rate">
                                </div>
                            </div>
                        </div>

                        <h5 class="pt-3">Annual Expenses</h5>
                        <div class="form-row">
                            
                            <div class="form-group col-md-6">
                                <label for="input">Vehicle</label>
                                <label class="sr-only" for="inlineFormInputGroup">Vehicle</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup"
                                        placeholder="Vehicle">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="input">Other Costs</label>
                                <label class="sr-only" for="inlineFormInputGroup">Other Costs</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup"
                                        placeholder="eTag, etc">
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
                                        placeholder="Phone">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="input">Workers Comp</label>
                                <label class="sr-only" for="inlineFormInputGroup">Workers Comp</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup"
                                        placeholder="Workers Comp">
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
                                    <input type="text" class="form-control" id="inlineFormInputGroup"
                                        placeholder="Cash">
                                </div>
                            </div>
                            
                        </div>

                        <h5 class="pt-3">Totals</h5>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="subcontractorweeklyrate">Weekly Rate</label>
                                <input type="text" class="form-control" id="subcontractorweeklyrate" placeholder="$" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="subcontractoryearlyrate">Yearly Rate</label>
                                <input type="text" class="form-control" id="subcontractoryearlyrate" placeholder="$" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="subcontractorsuper">Super</label>
                                <input type="text" class="form-control" id="subcontractorsuper" placeholder="$" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="subcontractortotalLessSuper">Total Cost Less Super</label>
                                <input type="text" class="form-control" id="subcontractortotalLessSuper" placeholder="$" readonly>
                            </div>                            
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="subcontractorGst">GST</label>
                                <input type="text" class="form-control" id="subcontractorGst" placeholder="$" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="subcontractorTotalIncGst">Total Including GST</label>
                                <input type="text" class="form-control" id="subcontractorTotalIncGst" placeholder="$" readonly>
                            </div>                            
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-12">
                                <label for="subcontractortotalPackage">Total Package Cost</label>
                                <input type="text" class="form-control" id="subcontractortotalPackage" placeholder="$" readonly>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Save Sub-Contractor</button>
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
