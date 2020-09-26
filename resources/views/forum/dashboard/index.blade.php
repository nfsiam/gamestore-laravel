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
            <div class="col-md-8">
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
                </div>
            </div>
            <div class="col-md-4">
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
        <!-- action buttons end -->

                <!-- user section -->
                <div class="row">
            <div class="col-md-12 mb-4">
                <!-- Project Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Users Section</h6>
                    </div>
                    <div class="card-body">
                        <!-- Color System -->
                        <div class="row">
                            <div class="col-lg-6 mb-4">
                                <div class="card bg-primary text-white shadow action-card"
                                    data-url="/forum/moderate/all-users">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="mb-1">
                                                    Go to All User List
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold">{{$usercount}}</div>
                                            </div>
                                            <div class="col-auto">
                                                <a href="" class="btn btn-transparent text-white">
                                                    <i class="fas fa-caret-right fa-2x"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="card bg-warning text-white shadow action-card"
                                    data-url="/forum/moderate/marked-users">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="mb-1">
                                                    Go to Marked User List
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold"><%=markedUsers%></div>
                                            </div>
                                            <div class="col-auto">
                                                <a href="" class="btn btn-transparent text-white">
                                                    <i class="fas fa-caret-right fa-2x"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="card bg-danger text-white shadow action-card"
                                    data-url="/forum/moderate/muted-users">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="mb-1">
                                                    Go to Muted User List
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold"><%=mutedUsers%></div>
                                            </div>
                                            <div class="col-auto">
                                                <a href="/forum/moderate/muted-users"
                                                    class="btn btn-transparent text-white">
                                                    <i class="fas fa-caret-right fa-2x"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
        <!-- user section end -->

        <!-- graphs start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Activity Graph</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="myAreaChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- graphs end -->


@endsection

@section('scripts')

    <script>
        const days = [], postcreate = [], report = [], delreq = [], votes = [];
        const issuecount = parseInt("<%=dnut.issuecount%>");
        const reviewcount = parseInt("<%=dnut.reviewcount%>");
        const walkthroughcount = parseInt("<%=dnut.walkthroughcount%>");

    </script>
<!-- 
    <% for (let i=0; i<areaChart.days.length; i++){%>
    <script>
        days.push("<%=areaChart.days[i]%>");
        postcreate.push(parseInt("<%=areaChart.postcreate[i]%>"));
        report.push(parseInt("<%=areaChart.report[i]%>"));
        delreq.push(parseInt("<%=areaChart.delreq[i]%>"));
        votes.push(parseInt("<%=areaChart.votes[i]%>"));
    </script>
    <% } %> -->


    <script>
        //redirect to action-card specific page

        $('.action-card').click(function () {
            window.location.href = $(this).data('url');
        });

        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

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

        var ctx = document.getElementById("myAreaChart");
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: days,
                datasets: [{
                    label: "post activity",
                    lineTension: 0.3,
                    backgroundColor: "rgba(78, 115, 223, 0.05)",
                    borderColor: "rgba(78, 115, 223, 1)",
                    pointRadius: 3,
                    pointBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointBorderColor: "rgba(78, 115, 223, 1)",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: postcreate,
                },
                {
                    label: "Report Activity",
                    lineTension: 0.3,
                    backgroundColor: "rgba(207, 36, 0, 0.05)",
                    borderColor: "rgba(207, 36, 0, 1)",
                    pointRadius: 3,
                    pointBackgroundColor: "rgba(207, 36, 0, 1)",
                    pointBorderColor: "rgba(207, 36, 0, 1)",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(207, 36, 0, 1)",
                    pointHoverBorderColor: "rgba(207, 36, 0, 1)",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: report,
                },
                {
                    label: "Delete Requests",
                    lineTension: 0.3,
                    backgroundColor: "rgba(255, 195, 0 , 0.05)",
                    borderColor: "rgba(255, 195, 0 , 1)",
                    pointRadius: 3,
                    pointBackgroundColor: "rgba(255, 195, 0 , 1)",
                    pointBorderColor: "rgba(255, 195, 0 , 1)",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(255, 195, 0 , 1)",
                    pointHoverBorderColor: "rgba(255, 195, 0 , 1)",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: delreq,
                },
                {
                    label: "Voting Activity",
                    lineTension: 0.3,
                    backgroundColor: "rgba(0, 198, 93, 0.05)",
                    borderColor: "rgba(0, 198, 93, 1)",
                    pointRadius: 3,
                    pointBackgroundColor: "rgba(0, 198, 93, 1)",
                    pointBorderColor: "rgba(0, 198, 93, 1)",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(0, 198, 93, 1)",
                    pointHoverBorderColor: "rgba(0, 198, 93, 1)",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: votes,
                },
                ],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            // maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            // maxTicksLimit: 5,
                            padding: 10,
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: true,
                    position: 'bottom'
                },
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10,
                }
            }
        });
    </script>
@endsection

</body>

</html>