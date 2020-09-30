@extends('layouts.app')

@section('title', 'Total Business & Employee Costs')

@section('content')
@if (Auth::user() && Auth::user()->role != 'admin')
<div class="mx-auto mt-5" style="width: 200px;">
    <h2>
        Access denied
    </h2>
</div>

@elseif (Auth::user() && Auth::user()->role == 'admin')
<div class=" p-3 mb-5 bg-white number_formated border">
    <h2 class="mb-4 float-left">Total Business & Employee Costs</h2>
    <div class='table-responsive'>
        <table class="table table-hover table-sm mt-1">
            <thead>
                <tr>
                    <th scope="col">Category</th>
                    <th scope="col">Weekly Cost</th>
                    <th scope="col">Monthly Cost</th>
                    <th scope="col">Yearly Cost</th>
                    <th scope="col">Daily Cost</th>
                    <th scope="col">Hourly Cost</th>
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
                <tr>
                    <td>Running Costs without Wages</td>
                    <td>${{number_format(($total/365)*7,2)}}</td>
                    <td>${{number_format($total/12.935705,2)}}</td>
                    <td>${{number_format($total,2)}}</td>
                    <td>${{number_format($total/365,2)}}</td>
                    <td>${{number_format(($total/365)/8,2)}}</td>
                </tr>
                @php
                $NonChargeableOfficeStaffWages =0;
                @endphp
                <tr>
                    <td>Non Chargeable Office Staff Wages</td>
                    <td>${{number_format(($NonChargeableOfficeStaffWages/365)*7,2)}}</td>
                    <td>${{number_format($NonChargeableOfficeStaffWages/12.935705,2)}}</td>
                    <td>${{number_format($NonChargeableOfficeStaffWages,2)}}</td>
                    <td>${{number_format($NonChargeableOfficeStaffWages/365,2)}}</td>
                    <td>${{number_format(($NonChargeableOfficeStaffWages/365)/8,2)}}</td>
                </tr>
                @php
                $highestPaid = 0;
                @endphp
                <tr>
                    <td>Highest Paid Employee</td>
                    <td>${{number_format($highestPaid/52,2)}}</td>
                    <td>${{number_format($highestPaid/12,2)}}</td>
                    <td>${{number_format($highestPaid,2)}}</td>
                    <td>${{number_format($highestPaid/365,2)}}</td>
                    <td>${{number_format(($highestPaid/365)/8,2)}}</td>
                </tr>
                <tr>
                    <td>Second Highest Paid Employee</td>
                    <td>${{number_format($highestPaid/52,2)}}</td>
                    <td>${{number_format($highestPaid/12,2)}}</td>
                    <td>${{number_format($highestPaid,2)}}</td>
                    <td>${{number_format($highestPaid/365,2)}}</td>
                    <td>${{number_format(($highestPaid/365)/8,2)}}</td>
                </tr>

                @php
                $highestPaidApprentice = 0;
                $SecondHighestPaidApprentice = 0;
                @endphp
                @foreach($employeeCosts as $employeeCost)
                @php
                if ($employeeCost->employee_type == 'Employee' && $employeeCost->employee_archived == '0'){
                $val = $employeeCost->employee_workercomp + $employeeCost->employee_hoursperweek*
                $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear*0.095 +
                $employeeCost->employee_phone +$employeeCost->employee_otherweeklycost +
                $employeeCost->employee_vehiclecost + $employeeCost->employee_hoursperweek*
                $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear;
                if ($highestPaidApprentice <$val){ $SecondHighestPaidApprentice=$highestPaidApprentice;
                    $highestPaidApprentice=$val; } elseif (($SecondHighestPaidApprentice < $val) &&
                    ($highestPaidApprentice!=$val)) { $SecondHighestPaidApprentice=$val; } } @endphp @endforeach <tr>
                    <td>Highest Paid Apprentice</td>
                    <td>${{number_format($highestPaidApprentice/52,2)}}</td>
                    <td>${{number_format($highestPaidApprentice/12,2)}}</td>
                    <td>${{number_format($highestPaidApprentice,2)}}</td>
                    <td>${{number_format($highestPaidApprentice/365,2)}}</td>
                    <td>${{number_format(($highestPaidApprentice/365)/8,2)}}</td>
                    </tr>

                    <tr>
                        <td>Second Highest Paid Apprentice</td>
                        <td>${{number_format($SecondHighestPaidApprentice/52,2)}}</td>
                        <td>${{number_format($SecondHighestPaidApprentice/12,2)}}</td>
                        <td>${{number_format($SecondHighestPaidApprentice,2)}}</td>
                        <td>${{number_format($SecondHighestPaidApprentice/365,2)}}</td>
                        <td>${{number_format(($SecondHighestPaidApprentice/365)/8,2)}}</td>
                    </tr>
                    @php
                    $HighestPaidSubContractor = 0;
                    $SecondPaidSubContractor = 0;
                    @endphp
                    @foreach($employeeCosts as $employeeCost)
                    @php
                    if ($employeeCost->employee_type == 'Sub-Contractor' && $employeeCost->employee_archived == '0'){
                    $val = $employeeCost->employee_workercomp + $employeeCost->employee_hoursperweek*
                    $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear*0.095 +
                    $employeeCost->employee_phone +$employeeCost->employee_otherweeklycost +
                    $employeeCost->employee_vehiclecost + $employeeCost->employee_hoursperweek*
                    $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear;
                    if ($HighestPaidSubContractor <$val){ $SecondPaidSubContractor=$HighestPaidSubContractor;
                        $HighestPaidSubContractor=$val; } elseif (($SecondPaidSubContractor < $val) &&
                        ($HighestPaidSubContractor!=$val)) { $SecondPaidSubContractor=$val; } } @endphp @endforeach <tr>
                        <td>Highest Paid Sub Contractor</td>
                        <td>${{number_format($HighestPaidSubContractor/52,2)}}</td>
                        <td>${{number_format($HighestPaidSubContractor/12,2)}}</td>
                        <td>${{number_format($HighestPaidSubContractor,2)}}</td>
                        <td>${{number_format($HighestPaidSubContractor/365,2)}}</td>
                        <td>${{number_format(($HighestPaidSubContractor/365)/8,2)}}</td>
                        </tr>

                        <tr>
                            <td>Second Highest Paid Sub Contractor</td>
                            <td>${{number_format($SecondPaidSubContractor/52,2)}}</td>
                            <td>${{number_format($SecondPaidSubContractor/12,2)}}</td>
                            <td>${{number_format($SecondPaidSubContractor,2)}}</td>
                            <td>${{number_format($SecondPaidSubContractor/365,2)}}</td>
                            <td>${{number_format(($SecondPaidSubContractor/365)/8,2)}}</td>
                        </tr>
                        <tr>
                            <td>Other business costs</td>
                            <td>${{0/52}}</td>
                            <td>${{0/12}}</td>
                            <td>${{0}}</td>
                            <td>${{0/365}}</td>
                            <td>${{(0/365)/8}}</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>${{number_format(($total/365)*7+$highestPaidApprentice/52+$SecondHighestPaidApprentice/52+$HighestPaidSubContractor/52+$SecondPaidSubContractor/52,2)}}
                            </td>
                            <td>${{number_format($total/12.935705+$highestPaidApprentice/12+$SecondHighestPaidApprentice/12+$HighestPaidSubContractor/12+$SecondPaidSubContractor/12,2)}}
                            </td>
                            <td>${{number_format($total+$highestPaidApprentice+$SecondHighestPaidApprentice+$HighestPaidSubContractor+$SecondPaidSubContractor,2)}}
                            </td>
                            <td>${{number_format($total/365 +$highestPaidApprentice/365 + $SecondHighestPaidApprentice/365 + $HighestPaidSubContractor/365 + $SecondPaidSubContractor/365 + 0/365,2)}}
                            </td>
                            <td>${{number_format($total/365/8 + $highestPaidApprentice/365/8 + $SecondHighestPaidApprentice/365/8 + $HighestPaidSubContractor/365/8 + $SecondPaidSubContractor/365/8 + 0/365/8,2)}}
                            </td>
                        </tr>
            </tbody>
        </table>
    </div>
</div>
@endif
@stop
