@extends('layouts.app')

@section('title', 'Total Business & Employee Costs')

@section('content')
<div class=" p-3 mb-5 bg-white rounded border">
    <h3 class="mb-4 float-left">Business & Employee Costs</h3>
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
                @php
                $total += $companyCost->companycost_yearly;
                @endphp
                @endforeach
                <tr>
                    <td>Running Costs without Wages</td>
                    <td>${{round(($total/365)*7,2)}}</td>
                    <td>${{round($total/12.935705,2)}}</td>
                    <td>${{round($total,2)}}</td>
                    <td>${{round($total/365,2)}}</td>
                    <td>${{round(($total/365)/8,2)}}</td>
                </tr>
                @php
                $NonChargeableOfficeStaffWages = 33244.20;
                @endphp
                <tr>
                    <td>Non Chargeable Office  Staff Wages</td>
                    <td>${{round(($NonChargeableOfficeStaffWages/365)*7,2)}}</td>
                    <td>${{round($NonChargeableOfficeStaffWages/12.935705,2)}}</td>
                    <td>${{round($NonChargeableOfficeStaffWages,2)}}</td>
                    <td>${{round($NonChargeableOfficeStaffWages/365,2)}}</td>
                    <td>${{round(($NonChargeableOfficeStaffWages/365)/8,2)}}</td>
                </tr>
                @php
                $highestPaid = 65000;
                @endphp
                <tr>
                    <td>Highest Paid Employee</td>
                    <td>${{round($highestPaid/52,2)}}</td>
                    <td>${{round($highestPaid/12,2)}}</td>
                    <td>${{round($highestPaid,2)}}</td>
                    <td>${{round($highestPaid/365,2)}}</td>
                    <td>${{round(($highestPaid/365)/8,2)}}</td>
                </tr>
                <tr>
                    <td>Second Highest Paid Employee</td>
                    <td>${{round($highestPaid/52,2)}}</td>
                    <td>${{round($highestPaid/12,2)}}</td>
                    <td>${{round($highestPaid,2)}}</td>
                    <td>${{round($highestPaid/365,2)}}</td>
                    <td>${{round(($highestPaid/365)/8,2)}}</td>
                </tr>
                @php
                $highestPaidApprentice = 36941.6;
                @endphp
                <tr>
                    <td>Highest Paid Apprentice</td>
                    <td>${{round($highestPaidApprentice/52,2)}}</td>
                    <td>${{round($highestPaidApprentice/12,2)}}</td>
                    <td>${{round($highestPaidApprentice,2)}}</td>
                    <td>${{round($highestPaidApprentice/365,2)}}</td>
                    <td>${{round(($highestPaidApprentice/365)/8,2)}}</td>
                </tr>
                @php
                $SecondHighestPaidApprentice = 0;
                @endphp
                @foreach($employeeCosts as $employeeCost)
                @php
                if ($employeeCost->employee_type == 'Employee'){
                if ($SecondHighestPaidApprentice < $employeeCost->employee_workercomp + $employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear*0.095 + $employeeCost->employee_phone +$employeeCost->employee_otherweeklycost + $employeeCost->employee_vehiclecost + $employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear){
                    $SecondHighestPaidApprentice = $employeeCost->employee_workercomp + $employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear*0.095 + $employeeCost->employee_phone +$employeeCost->employee_otherweeklycost + $employeeCost->employee_vehiclecost + $employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear;
                }}
                @endphp
                @endforeach
                <tr>
                    <td>Second Highest Paid Apprentice</td>
                    <td>${{round($SecondHighestPaidApprentice/52,2)}}</td>
                    <td>${{round($SecondHighestPaidApprentice/12,2)}}</td>
                    <td>${{round($SecondHighestPaidApprentice,2)}}</td>
                    <td>${{round($SecondHighestPaidApprentice/365,2)}}</td>
                    <td>${{round(($SecondHighestPaidApprentice/365)/8,2)}}</td>
                </tr>
                @php
                $HighestPaidSubContractor = 0;
                @endphp
                @foreach($employeeCosts as $employeeCost)
                @php
                if ($employeeCost->employee_type == 'Sub-Contractor'){
                if ($HighestPaidSubContractor <$employeeCost->employee_workercomp + $employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear*0.095 + $employeeCost->employee_phone +$employeeCost->employee_otherweeklycost + $employeeCost->employee_vehiclecost + $employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear){
                    $HighestPaidSubContractor = $employeeCost->employee_workercomp + $employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear*0.095 + $employeeCost->employee_phone +$employeeCost->employee_otherweeklycost + $employeeCost->employee_vehiclecost + $employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear;
                }}
                @endphp
                @endforeach
                <tr>
                    <td>Highest Paid Sub Contractor</td>
                    <td>${{round($HighestPaidSubContractor/52,2)}}</td>
                    <td>${{round($HighestPaidSubContractor/12,2)}}</td>
                    <td>${{round($HighestPaidSubContractor,2)}}</td>
                    <td>${{round($HighestPaidSubContractor/365,2)}}</td>
                    <td>${{round(($HighestPaidSubContractor/365)/8,2)}}</td>
                </tr>

                @php
                $SecondPaidSubContractor = 0;
                @endphp
                @foreach($employeeCosts as $employeeCost)
                @php
                if ($employeeCost->employee_type == 'Sub-Contractor'){
                if ($SecondPaidSubContractor != $HighestPaidSubContractor &&$SecondPaidSubContractor <$employeeCost->employee_workercomp + $employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear*0.095 + $employeeCost->employee_phone +$employeeCost->employee_otherweeklycost + $employeeCost->employee_vehiclecost + $employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear){
                    $SecondPaidSubContractor = $employeeCost->employee_workercomp + $employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear*0.095 + $employeeCost->employee_phone +$employeeCost->employee_otherweeklycost + $employeeCost->employee_vehiclecost + $employeeCost->employee_hoursperweek* $employeeCost->employee_basehourly * $employeeCost->employee_weeksperyear;
                    if($SecondPaidSubContractor == $HighestPaidSubContractor)
                    {
                        $SecondPaidSubContractor=0;
                    }
                }}
                @endphp
                @endforeach
                <tr>
                    <td>Second Highest Paid Sub Contractor</td>
                    <td>${{round($SecondPaidSubContractor/52,2)}}</td>
                    <td>${{round($SecondPaidSubContractor/12,2)}}</td>
                    <td>${{round($SecondPaidSubContractor,2)}}</td>
                    <td>${{round($SecondPaidSubContractor/365,2)}}</td>
                    <td>${{round(($SecondPaidSubContractor/365)/8,2)}}</td>
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
                    <td>${{round(($total/365)*7+($NonChargeableOfficeStaffWages/365)*7+$highestPaid/52+$highestPaid/52+$highestPaidApprentice/52+$SecondHighestPaidApprentice/52+$HighestPaidSubContractor/52+$SecondPaidSubContractor/52,2)}}</td>
                    <td>${{round($total/12.935705 + $NonChargeableOfficeStaffWages/12.935705+$highestPaid/12+$highestPaid/12+$highestPaidApprentice/12+$SecondHighestPaidApprentice/12+$HighestPaidSubContractor/12+$SecondPaidSubContractor/12,2)}}</td>
                    <td>${{round($total+$NonChargeableOfficeStaffWages+$highestPaid+$highestPaid+$highestPaidApprentice+$SecondHighestPaidApprentice+$HighestPaidSubContractor+$SecondPaidSubContractor,2)}}</td>
                    <td>${{round($total/365 + $NonChargeableOfficeStaffWages/365 + $highestPaid/365 + $highestPaid/365 + $highestPaidApprentice/365 + $SecondHighestPaidApprentice/365 + $HighestPaidSubContractor/365 + $SecondPaidSubContractor/365 + 0/365,2)}}</td>
                    <td>${{round($total/365/8 + $NonChargeableOfficeStaffWages/365/8 + $highestPaid/365/8 + $highestPaid/365/8 + $highestPaidApprentice/365/8 + $SecondHighestPaidApprentice/365/8 + $HighestPaidSubContractor/365/8 + $SecondPaidSubContractor/365/8 + 0/365/8,2)}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@stop