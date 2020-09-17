@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<!-- --------------- -->
<div class="row">
    <div class="col-xl-6">

        <div class="row">
            <div class="col-md-6">

     @component('common-components.dashboard2-widget')
         @slot('title') Orders  @endslot
         @slot('total') 1,368 @endslot
         @slot('chartId') radial-chart-1 @endslot
         @slot('percentage') 0.8% @endslot
     @endcomponent
            </div>
            <div class="col-md-6">

     @component('common-components.dashboard2-widget')
         @slot('title') Revenue  @endslot
         @slot('total') $ 32,695 @endslot
         @slot('chartId') radial-chart-2 @endslot
         @slot('percentage') 0.6% @endslot
     @endcomponent

            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Company Report</h4>
                <div class="row">
                    <div class="col-sm-7">
                        <div>
                            <p class="mb-2">01 Jan - 31 Jan, 2020</p>
                            <h4>$ 27, 253</h4>

                            <p class="mt-4 mb-0"><span class="badge badge-soft-success mr-2"> 0.6% <i class="mdi mdi-arrow-up"></i> </span> From previous period</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mt-4 mt-sm-0">
                            <div id="sales-report-chart" class="apex-charts"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <div class="float-right">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Week</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Month</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Year</a>
                        </li>
                    </ul>
                </div>
                <h4 class="card-title mb-4">**Cost</h4>

                <div id="mixed-chart" class="apex-charts"></div>
            </div>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-xl-3">

     @component('common-components.dashboard2-revenue-widget')
         @slot('title') Employee Cost  @endslot
         @slot('total') 3,524  @endslot
         @slot('percentage') 2.06 %  @endslot
         @slot('pClass') progress-bar bg-purple  @endslot
         @slot('pValue') 62 @endslot
     @endcomponent

     @component('common-components.dashboard2-revenue-widget')
         @slot('title') Material Cost  @endslot
         @slot('total') 5,362  @endslot
         @slot('percentage') 3.12 %  @endslot
         @slot('pClass') progress-bar bg-warning  @endslot
         @slot('pValue') 78 @endslot
     @endcomponent


     @component('common-components.dashboard2-revenue-widget')
         @slot('title') Company Cost  @endslot
         @slot('total') 6,245 @endslot
         @slot('percentage') 2.12 %  @endslot
         @slot('pClass') progress-bar bg-success  @endslot
         @slot('pValue') 75 @endslot
     @endcomponent

    </div>

    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Earning</h4>

                <div class="row">
                    <div class="col-lg-6">
                        <div>
                            <p>1 Jan - 31 Jan, 2020</p>
                            <p class="mb-2">Total Earning</p>
                            <h4>$ 12,362</h4>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mt-3">
                                    <p class="mb-2 text-truncate">This Month</p>
                                    <h5 class="d-inline-block align-middle mb-0">$ 9,245</h5> <span class="badge badge-soft-success">+ 1.5 %</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mt-3">
                                    <p class="mb-2 text-truncate">Last Month</p>
                                    <h5>$ 8,234</h5>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="#" class="btn btn-primary btn-sm">View more</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div>
                            <div id="bar-chart" class="apex-charts"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Company cost hourly rate</h4>

                <div id="radar-chart" class="apex-charts"></div>

            </div>
        </div>
    </div>

</div>

<div class="row">


    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Popular Service</h4>
                <div class="text-center">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="pt-4">
                                <div class="avatar-sm mx-auto font-size-16">
                                    <span class="avatar-title bg-soft-primary text-primary rounded-circle">
                                        <i class="mdi mdi-monitor"></i>
                                    </span>
                                </div>
                                <div class="mt-3">
                                    <h5 class="mb-1">After Hours Labour</h5>
                                    <p class="text-truncate">45 times</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="pt-4">
                                <div class="avatar-sm mx-auto font-size-16">
                                    <span class="avatar-title bg-soft-primary text-primary rounded-circle">
                                        <i class="mdi mdi-laptop"></i>
                                    </span>
                                </div>
                                <div class="mt-3">
                                    <h5 class="mb-1">Emergency Call Out</h5>
                                    <p class="text-truncate">57 times</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="pt-4">
                                <div class="avatar-sm mx-auto font-size-16">
                                    <span class="avatar-title bg-soft-primary text-primary rounded-circle">
                                        <i class="mdi mdi-tablet-android"></i>
                                    </span>
                                </div>
                                <div class="mt-3">
                                    <h5 class="mb-1">Installation Job</h5>
                                    <p class="text-truncate">31 times</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="pt-4">
                                <div class="avatar-sm mx-auto font-size-16">
                                    <span class="avatar-title bg-soft-primary text-primary rounded-circle">
                                        <i class="mdi mdi-cellphone-android"></i>
                                    </span>
                                </div>
                                <div class="mt-3">
                                    <h5 class="mb-1">Service Call</h5>
                                    <p class="text-truncate">62 times</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="float-right">
                    <div class="input-group input-group-sm">
                        <select class="custom-select custom-select-sm">
                            <option selected>Jan</option>
                            <option value="1">Dec</option>
                            <option value="2">Nov</option>
                            <option value="3">Oct</option>
                        </select>
                        <div class="input-group-append">
                            <label class="input-group-text">Month</label>
                        </div>
                    </div>
                </div>
                <h4 class="card-title mb-4">Social source</h4>

                <div class="media">
                    <div class="media-body">
                        <p class="mb-2">Total Social source</p>
                        <h4>$ 8,974</h4>
                        <p class="mb-0"><span class="badge badge-soft-success mr-2"> 0.6% <i class="mdi mdi-arrow-up"></i> </span> From previous period</p>
                    </div>
                </div>

                <div class="mt-3 social-source">
                    <div class="media align-items-center social-source-list">
                        <div class="avatar-xs mr-4">
                            <span class="avatar-title rounded-circle">
                                <i class="mdi mdi-facebook"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <p class="mb-1">Facebook</p>
                            <h5 class="mb-0">$ 2,352</h5>
                        </div>
                        <div>
                            2.06 % <i class="mdi mdi-arrow-up text-success ml-1"></i>
                        </div>
                    </div>

                    <div class="media align-items-center social-source-list">
                        <div class="avatar-xs mr-4">
                            <span class="avatar-title rounded-circle bg-info">
                                <i class="mdi mdi-twitter"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <p class="mb-1">Twitter</p>
                            <h5 class="mb-0">$ 1,925</h5>
                        </div>
                        <div>
                            1.28 % <i class="mdi mdi-arrow-up text-success ml-1"></i>
                        </div>
                    </div>

                    <div class="media align-items-center social-source-list">
                        <div class="avatar-xs mr-4">
                            <span class="avatar-title rounded-circle bg-pink">
                                <i class="mdi mdi-instagram"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <p class="mb-1">Instagram</p>
                            <h5 class="mb-0">$ 1,846</h5>
                        </div>
                        <div>
                            1.04 % <i class="mdi mdi-arrow-up text-success ml-1"></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
 <!-- 、、、、、、、、、、、、、、、、 -->
@endsection

@section('script')
<!-- apexcharts -->
<script src="{{URL::asset('/libs/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{URL::asset('/js/pages/dashboard-2.init.js')}}"></script>
@endsection