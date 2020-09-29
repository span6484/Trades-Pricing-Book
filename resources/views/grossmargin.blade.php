@extends('layouts.app')

@section('title', 'Gross Margin')

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
    <h3 class="mb-4 float-left">Global GM Rate</h3>
    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addGmModal">
        Add Gross Margin
    </button>

        <!-- Add Modal -->
        <div class="modal fade" id="addGmModal" tabindex="-1" role="dialog" aria-labelledby="addGmModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addGmModalLabel">Edit GM rate</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ url('grossmargin') }}">
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="form-group col-sm">
                                <label for="input">Gross margin rate</label>
                                <label class="sr-only" for="inlineFormInputGroup">Gross margin rate</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">%</div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup" name="add_gm_rate" 
                                        placeholder="Gross margin rate">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="Submit" class="btn btn-primary">Add GM rate</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="gmModal" tabindex="-1" role="dialog" aria-labelledby="gmModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="gmModalLabel">Edit GM rate</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{action('GrossMarginController@update', 'gm_rate')}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PATCH">
                        <div class="form-row">
                            <div class="form-group col-sm">
                                <label for="input">Gross margin rate</label>
                                <label class="sr-only" for="inlineFormInputGroup">Gross margin rate</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">%</div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup" name="gm_rate" 
                                        placeholder="Gross margin rate">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="Submit" class="btn btn-primary">Update GM rate</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class='table-responsive'>
        <table class="table table-hover table-sm mt-1">
            <thead>
                <tr>
                    <th scope="col">Gross Margin</th>
                    <th scope="col">New Charge Rate</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
                @php
                $total = 0;
                @endphp
                @foreach($companyCosts as $companyCost)
                @if($companyCost->companycost_archived == '0')
                @php
                $total += $companyCost->companycost_yearly;
                @endphp
                @endif
                @endforeach

                @php
                $NonChargeableOfficeStaffWages = 33244.20;
                @endphp

                @php
                $highestPaid = 65000;
                @endphp

                @php
                $highestPaidApprentice = 0;
                $SecondHighestPaidApprentice = 0;
                @endphp
                @foreach($employeeCosts as $employeeCost)
                @php
                if ($employeeCost->employee_type == 'Employee' && $employeeCost->employee_archived == '0'){
                    $val = $employeeCost->employee_workercomp + $employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear*0.095 + $employeeCost->employee_phone +$employeeCost->employee_otherweeklycost + $employeeCost->employee_vehiclecost + $employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear;
                if ($highestPaidApprentice <$val){
                    $SecondHighestPaidApprentice = $highestPaidApprentice;
                    $highestPaidApprentice = $val;
                }

                elseif (($SecondHighestPaidApprentice < $val) && ($highestPaidApprentice!=$val)) {
                $SecondHighestPaidApprentice = $val;
             }
            
            }
                @endphp
                @endforeach



                @php
                $HighestPaidSubContractor = 0;
                $SecondPaidSubContractor = 0;
                @endphp
                @foreach($employeeCosts as $employeeCost)
                @php
                if ($employeeCost->employee_type == 'Sub-Contractor' && $employeeCost->employee_archived == '0'){
                    $val = $employeeCost->employee_workercomp + $employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear*0.095 + $employeeCost->employee_phone +$employeeCost->employee_otherweeklycost + $employeeCost->employee_vehiclecost + $employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear;
                if ($HighestPaidSubContractor <$val){
                    $SecondPaidSubContractor = $HighestPaidSubContractor;
                    $HighestPaidSubContractor = $val;
                }

                elseif (($SecondPaidSubContractor < $val) && ($HighestPaidSubContractor!=$val)) {
                $SecondPaidSubContractor = $val;
            }
            
            }
                @endphp
                @endforeach


                @foreach($grossmargin as $grossmargin)
                <tr>
                    <td>{{$grossmargin->gm_rate}}</td>
                    <td>${{number_format($grossmargin->gm_rate*($total/365/8 + $NonChargeableOfficeStaffWages/365/8 + $highestPaid/365/8 + $highestPaid/365/8 + $highestPaidApprentice/365/8 + $SecondHighestPaidApprentice/365/8 + $HighestPaidSubContractor/365/8 + $SecondPaidSubContractor/365/8 + 0/365/8),2)}}</td>
                    <td><a href="{{action('GrossMarginController@edit', $grossmargin['pk_gm_id'])}}">Edit</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class=" p-3 mb-5 bg-white rounded border">
    
    <h3 class="mb-4 float-left">DROPDOWN MENU</h3>


    <div class='table-responsive'>
        <table class="table table-hover table-sm mt-1">
            <thead>
                <tr>
                    <th scope="col">G.M Rate</th>
                    <th scope="col">Value</th>
                </tr>
            </thead>
            <tbody>
                @php
                $grossMargin=array(10,12.5,15,20,22.5,25,27.5,30,32,5,33,35,37.5,40,42.5,45,47.5,50,52.5,55,57.5,60,62.5,65,67.5,70,75,80,85);
                @endphp
                @foreach ($grossMargin as &$grossMargins)
                <tr>
                    <td>{{$grossMargins}}</td>
                    <td>{{number_format($grossMargins*($total/365/8 + $NonChargeableOfficeStaffWages/365/8 + $highestPaid/365/8 + $highestPaid/365/8 + $highestPaidApprentice/365/8 + $SecondHighestPaidApprentice/365/8 + $HighestPaidSubContractor/365/8 + $SecondPaidSubContractor/365/8 + 0/365/8),2)}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
