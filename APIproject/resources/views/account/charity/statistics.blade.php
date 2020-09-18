@extends('layouts.app')

@section('title', 'Charity Stats | Dashboard - CheapFood')

@section('content')
    @include('partials.header')
    @include('partials.header-resp')

    <div class="bread-crumbs-wrapper">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}" title="Welcome Page" itemprop="url">Home</a></li>
                <li class="breadcrumb-item active">Charity {{ Auth::user()->charity->name }}</li>
            </ol>
        </div>
    </div>

    <section>
        <div class="block less-spacing gray-bg top-padd30">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="sec-box">
                            <div class="dashboard-tabs-wrapper">
                                <div class="row">

                                    @include('account.sidebar')

                                    <div class="col-md-8 col-sm-12 col-lg-8 pt-4 mb-0">
                                        <div class="dashboard-title pl-0 mb-3">
                                            <h4 class="title4" itemprop="headline"><span class="sudo-bottom sudo-bg-red">Statistic</span>al Report </h4>
                                        </div>

                                        <div class="review-list">
                                            <div class="review-box brd-rd5 pt-3 pl-5">
                                                <h4 itemprop="headline">CHARITY DONATIONS</h4>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <canvas id="donationChart"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                </div>
                            </div>
                        </div><!-- Section Box -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer')
@endsection

@section('scripts')
    <script>
        const donationChartUrl = "{{ route('account.charity.statistic.donationChart') }}";

        var donationMonths = new Array(),
            donationCount = new Array();

        const monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];

        $(document).ready(function() {
            //donation chart | ajax data
            $.get(donationChartUrl, function (response) {
                // console.log(response)
                response.forEach(function (data) {
                    donationMonths.push(monthNames[data.month]);
                    donationCount.push(data.donationCount);
                });

                var ctx = document.getElementById('donationChart');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: donationMonths,
                        datasets: [{
                            label: '# of Donations',
                            data: donationCount,
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

            });

        });
    </script>
@endsection
