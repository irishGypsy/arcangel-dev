@extends('admin.app')
@section('title') Dashboard @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary coloured-icon">
                <i class="icon fa fa-shopping-cart fa-3x"></i>
                <div class="info text-center">
                    <h4>Total Orders</h4>
                    <br>
                    <h3><b>108</b></h3>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small info coloured-icon">
                <i class="icon fa fa-credit-card fa-3x"></i>
                <div class="info text-center">
                    <h4>Total Sales</h4>
                    <br>
                    <h3><b>$105,797.15</b></h3>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon">
                <i class="icon fa fa-user fa-3x"></i>
                <div class="info text-center">
                    <h4>Customers</h4>
                    <br>
                    <h3><b>65</b></h3>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small danger coloured-icon">
                <i class="icon fa fa-user fa-3x"></i>
                <div class="info text-center">
                    <h4>Visitors</h4>
                    <br>
                    <h3><b>59907</b></h3>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row-cols-sm-3">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-title">
                    <h3 class="panel-title">
                        <i class="fa fa-bar-chart-o"></i>
                        Sales Analytics (2021)
                    </h3>
                        <div class="embed-responsive embed-responsive-16by9">
                            <canvas class="embed-responsive-item" id="salesBarChart"></canvas>
                        </div>
                    <h3 class="text-center">Sales by Month</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

    <!-- Page specific javascripts-->
    <script type="text/javascript" src="{{asset('backend/js/plugins/chart.js')}}"></script>

    <script type="text/javascript">
        var data = {
            labels: ["Jan", "Feb", "March", "April", "May","June","July","Aug","Sept","Oct","Nov","Dec"],
            datasets: [
                {
                    label: "Sales",
                    fillColor: "rgba(25,193,193,0.2)",
                    strokeColor: "rgb(10,47,168,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [1,0,2,0,0,1,2,1,0,0,0,0]
                }
            ]
        };

        var ctxb = $("#salesBarChart").get(0).getContext("2d");
        var barChart = new Chart(ctxb).Bar(data);

    </script>

@endpush
