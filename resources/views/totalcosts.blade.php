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
                    <td>{{($total/365)*7}}</td>
                    <td>{{$total/12.935705}}</td>
                    <td>{{$total}}</td>
                    <td>{{$total/365}}</td>
                    <td>{{($total/365)/8}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@stop