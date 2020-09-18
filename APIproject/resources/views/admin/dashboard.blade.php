@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
    @include('admin.partials.header')

    <div class="app-main">
        @include('admin.partials.sidebar', ['active' => 'dashboard'])

        <div class="app-main__outer">
            <div class="app-main__inner">
                <div class="app-page-title">
                    <div class="page-title-wrapper">
                        <div class="page-title-heading">
                            <div class="page-title-icon">
                                <i class="pe-7s-monitor icon-gradient bg-mean-fruit"> </i>
                            </div>
                            <div>
                                Dashboard - Home
                                <div class="page-title-subheading">
                                    View and manage activities on the platform.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-xl-4">
                        <div class="card mb-3 widget-content bg-midnight-bloom">
                            <div class="widget-content-wrapper text-white">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Restaurants</div>
                                    <div class="widget-subheading">Total registered restaurants</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-white">
                                        <span>{{ $countRestaurants }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="card mb-3 widget-content bg-arielle-smile">
                            <div class="widget-content-wrapper text-white">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Charities</div>
                                    <div class="widget-subheading">Total number of Charities</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-white">
                                        <span>{{ $countCharities }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-4">
                        <div class="card mb-3 widget-content bg-grow-early">
                            <div class="widget-content-wrapper text-white">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Orders</div>
                                    <div class="widget-subheading">Total number of orders</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-white">
                                        <span>{{ $countOrders }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
                        <div class="card mb-3 widget-content bg-premium-dark">
                            <div class="widget-content-wrapper text-white">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Donations</div>
                                    <div class="widget-subheading">Total food value given</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-warning">
                                        <small>Ksh</small><span> {{ $donationTotal }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="main-card mb-3 card">
                            <div class="card-header">
                                Resume Information
                            </div>
                        </div>

                        <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav mt-0 pt-0">
                            <li class="nav-item">
                                <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                                    <span>Users Charts</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#tab-content-1">
                                    <span>Order & Donations</span>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body">
                                                <h5 class="card-title">Overview of users registration</h5>
                                                <canvas id="usersChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body">
                                                <h5 class="card-title">Ratio of Users registration</h5>
                                                <canvas id="userPie"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane tabs-animation fade" id="tab-content-1" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body">
                                                <h5 class="card-title">Overview of Orders</h5>
                                                <canvas id="orderBarChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body">
                                                <h5 class="card-title">Overview of Donations</h5>
                                                <canvas id="donationBarChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body">
                                                <h5 class="card-title">COMPARISON ORDERS & DONATIONS</h5>
                                                <div style="">
                                                    <canvas id="orderDonationLineChart"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="main-card mb-3 card">
                            <div class="card-header">
                                Latest Applications
                                <div class="btn-actions-pane-right">
                                    <div role="group" class="btn-group-sm btn-group">
                                        <button class="active btn btn-focus">All Pending</button>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Name</th>
                                        <th>Contact</th>
                                        <th class="text-center">Entity</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($restaurantApplications as $restApplication)
                                    <tr>
                                        <td class="text-center text-muted">#{{ $restApplication->ref_number }}</td>
                                        <td>
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <div class="widget-content-left">
                                                            <img
                                                                    width="40"
                                                                    class="rounded-circle"
                                                                    src="{{ asset('images/avatars/icon_restaurant.png') }}"
                                                                    alt=""
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="widget-content-left flex2">
                                                        <div class="widget-heading">{{ $restApplication->name }}</div>
                                                        <div class="widget-subheading opacity-7">
                                                            {{ $restApplication->address }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $restApplication->website }} <br/> {{ $restApplication->email }}</td>
                                        <td class="text-center">
                                            <div class="badge badge-warning">Restaurant</div>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.restaurant.application.show', $restApplication->ref_number) }}" type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">
                                                Details
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach

                                    @foreach($charityApplications as $charityAppl)
                                    <tr>
                                        <td class="text-center text-muted">#{{ $charityAppl->ref_number }}</td>
                                        <td>
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <div class="widget-content-left">
                                                            <img width="40" class="rounded-circle" src="{{ asset('images/avatars/icon_charity.jpg') }}" alt=""/>
                                                        </div>
                                                    </div>
                                                    <div class="widget-content-left flex2">
                                                        <div class="widget-heading">
                                                            {{ $charityAppl->name }}
                                                        </div>
                                                        <div class="widget-subheading opacity-7">
                                                            {{ $charityAppl->address }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $charityAppl->website }} <br/> {{ $charityAppl->email }}</td>
                                        <td class="text-center">
                                            <div class="badge badge-secondary">&nbsp;&nbsp;&nbsp; Charity &nbsp;&nbsp;&nbsp;</div>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.charity.application.show', $charityAppl->ref_number) }}" type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">
                                                Details
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>

                            <div class="d-block text-right card-footer">
                                <div class="d-inline-block dropdown">
                                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-success">
                                      <span class="btn-icon-wrapper pr-2 opacity-7">
                                        <i class="fa fa-arrow-right"></i>
                                      </span>
                                        View All
                                    </button>
                                    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a href="{{ route('admin.restaurant.application.index') }}" class="nav-link">
                                                    <span>Restaurants</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('admin.charity.application.index') }}" class="nav-link">
                                                    <span>Charities</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('admin.partials.footer')
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        const userChartUrl = "{{ route('admin.dashboard.user.chart') }}",
            orderChartUrl = "{{ route('admin.dashboard.order.chart') }}";

        var orderMonths = new Array(),
            orderCount = new Array(),
            userMonths = new Array(),
            userCount = new Array(),
            donationMonths = new Array(),
            donationCount = new Array();

        const monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];

        $(document).ready(function() {
            //user chart | ajax data
            $.get(userChartUrl, function (response) {
                response.forEach(function (data) {
                    userMonths.push(monthNames[data.month]);
                    userCount.push(data.userCount);
                });

                var userBarChart = document.getElementById('usersChart').getContext('2d');
                var userBar = new Chart(userBarChart, {
                    type: 'bar',
                    data: {
                        labels: userMonths,
                        datasets: [{
                            label: '# of users',
                            data: userCount,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });

                var userPieChart = document.getElementById('userPie');
                var userPie = new Chart(userPieChart, {
                    type: 'pie',
                    data: {
                        datasets: [{
                            data: userCount,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                        }],
                        labels: userMonths,
                    }
                });
            });


            //order & donation chart | ajax data
            $.get(orderChartUrl, function (response) {

                // order bar chart
                response.orders.forEach(function (order) {
                    orderMonths.push(monthNames[order.month]);
                    orderCount.push(order.orderCount);
                });

                var orderBarChart = document.getElementById('orderBarChart').getContext('2d');
                var orderBar = new Chart(orderBarChart, {
                    type: 'bar',
                    data: {
                        labels: orderMonths,
                        datasets: [{
                            label: '# of orders',
                            data: orderCount,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });

                //donation bar chart
                response.donations.forEach(function (donation) {
                    donationMonths.push(monthNames[donation.month]);
                    donationCount.push(donation.donationCount);
                });

                var donationBarChart = document.getElementById('donationBarChart').getContext('2d');
                var donationBar = new Chart(donationBarChart, {
                    type: 'bar',
                    data: {
                        labels: donationMonths,
                        datasets: [{
                            label: '# of donations',
                            data: donationCount,
                            backgroundColor: [
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                            ],
                            borderColor: [
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });

                //order|donation line graph
                var orderDonationChart = document.getElementById('orderDonationLineChart').getContext('2d');
                var donationBar = new Chart(orderDonationChart, {
                    type: 'line',
                    data: {
                        labels: orderMonths,
                        datasets: [{
                            label: '# of donations',
                            data: orderCount,
                            backgroundColor: [
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                            ],
                            borderColor: [
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                            ],
                            borderWidth: 1
                        },{
                            label: '# of orders',
                            data: donationCount,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        title: {
                            display: true,
                            text: 'Ratio of Orders and Donations'
                        },
                        legend: {
                            display: true,
                            position: "bottom"
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            });

        });
    </script>
@endsection