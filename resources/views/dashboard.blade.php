@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<!-- --------------- -->
<html>

<head>
    <title>Make Google Pie Chart in Laravel</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
        var analytics = <?php echo $companycost_name; ?>;
        var analytics1 = <?php echo $discount_name; ?>;
        google.charts.load('current', {'packages':['corechart']});

        google.charts.setOnLoadCallback(drawChart);
        google.charts.setOnLoadCallback(drawChart1);

        function drawChart() {
            var data = google.visualization.arrayToDataTable(analytics);

            var options = {
                title: 'discount name and discount_cost'
            };

            //Here can change the diagram type
            var chart = new google.visualization.ColumnChart(document.getElementById('pie'));

            chart.draw(data, options);
        }


        function drawChart1() {
            var data = google.visualization.arrayToDataTable(analytics1);

            var options = {
                title: 'discount name and discount_cost'
            };

            //Here can change the diagram type
            var chart = new google.visualization.ColumnChart(document.getElementById('pie1'));

            chart.draw(data, options);
        }
    </script>
</head>

<body>

    <div class="row">
        <div class="col-xl-6">

            <div class="row">
                <div class="col-md-6">

                    @component('common-components.dashboard2-widget')
                    @slot('title') Orders @endslot
                    @slot('total') 1,368 @endslot
                    @slot('chartId') radial-chart-1 @endslot
                    @slot('percentage') 0.8% @endslot
                    @endcomponent
                </div>
                <div class="col-md-6">

                    @component('common-components.dashboard2-widget')
                    @slot('title') Revenue @endslot
                    @slot('total') $ 32,695 @endslot
                    @slot('chartId') radial-chart-2 @endslot
                    @slot('percentage') 0.6% @endslot
                    @endcomponent

                </div>
                <div class="container">
                    <!-- <h3 align="center">Make Google Pie Chart in Laravel</h3><br /> -->

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <!-- <h3 class="panel-title">Percentage of Male and Female Employee</h3> -->
                        </div>
                        <div class="panel-body" align="left">
                            <div id="pie" style="width:750px; height:450px;">
                            </div>
                            <div id="pie1" style="width:750px; height:450px;">
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>


        <!-- 、、、、、、、、、、、、、、、、 -->
</body>

</html>
@endsection
