@extends('layouts.base')

@section('css')
    <style>
        .action-card {
            cursor: pointer;
            /* color:#007a62; */
        }
    </style>
@endsection
       
@section('content')
        <!-- action buttons -->
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <!-- post approval -->
                    <div class="col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2 action-card"
                            data-url="{{route('forum.dashboard.pendingposts')}}">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Post
                                            Approval
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$pendingcount}}</div>
                                    </div>
                                    <div class="col-auto">
                                        <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                                        <i class="fas fa-user-check fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- post approval end -->
                    <!-- reported post -->
                    <div class="col-md-6 mb-4">
                        <div class="card border-left-danger shadow h-100 py-2 action-card"
                            data-url="{{route('forum.dashboard.reportedposts')}}">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Reported
                                            Post
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$postreportcount}}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user-shield fa-2x text-gray-300"></i>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- reported post end -->
                    <!--  post delete request -->
                    <div class="col-md-6 mb-4 ">
                        <div class="card border-left-secondary shadow h-100 py-2 action-card"
                            data-url="{{route('forum.dashboard.postdeletereqs')}}">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Post
                                            Delete
                                            Request
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$postdelreqcount}}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-trash fa-2x text-gray-300"></i>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- post delete request end -->
                    <!--  post delete request -->
                    <div class="col-md-6 mb-4 ">
                        <div class="card border-left-secondary shadow h-100 py-2 action-card"
                            data-url="{{route('forum.dashboard.allusers')}}">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            All Users
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$usercount}}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-users fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- post delete request end -->
                </div>
            </div>
            
        </div>
        <!-- action buttons end -->

        <div class="row mb-3">
        <div class="col-md-6 mb-4">
                                <div class="card bg-danger text-white shadow action-card"
                                    data-url="/forum/dashboard/report">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="mb-1">
                                                    Generate Report as PDF
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <a href="/forum/dashboard/report" class="btn btn-transparent text-white">
                                                <i class="fas fa-file-pdf fa-2x"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <div class="col-md-6 mb-4">
                                <div class="card bg-success text-white shadow action-card"
                                    data-url="/forum/dashboard/report-csv">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="mb-1">
                                                    Generate Report as Excel
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <a href="/forum/dashboard/report-csv" class="btn btn-transparent text-white">
                                                <i class="fas fa-file-csv fa-2x"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
        </div>

                <!-- user section -->
                <div class="row">
                <div class="col-md-12">
                <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <!-- <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Donut Chart</h6>
                        </div> -->
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-pie pt-4">
                                <canvas id="myPieChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <!-- user section end -->



@endsection

@section('scripts')



<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

    <script>
        //redirect to action-card specific page

        $('.action-card').click(function () {
            window.location.href = $(this).data('url');
        });

        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        let issuecount = "{{$issuecount}}";
        let reviewcount = "{{$reviewcount}}";
        let walkthroughcount = "{{$walkthroughcount}}";

        // Pie Chart Example
        var ctx = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: [`${issuecount} Issues`, `${reviewcount} Reviews`, `${walkthroughcount} Walkthroughs`],
                datasets: [{
                    data: [issuecount, reviewcount, walkthroughcount],
                    backgroundColor: ['#f6c23e', '#36b9cc', '#1cc88a'],
                    hoverBackgroundColor: ['#e74a3b', '#4e73df', '#007a62'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: true,
                    caretPadding: 15,
                },
                legend: {
                    display: true,
                    position: 'bottom'
                },
                plugins: {
                    datalabels: {
                        formatter: (value, ctx) => {

                            let sum = 0;
                            let dataArr = ctx.chart.data.datasets[0].data;
                            dataArr.map(data => {
                                sum += data;
                            });
                            let percentage = (value * 100 / sum).toFixed(2) + "%";
                            return percentage;


                        },
                        color: '#fff',
                    }
                },
                cutoutPercentage: 80,
            },
        });

    </script>
@endsection

</body>

</html>