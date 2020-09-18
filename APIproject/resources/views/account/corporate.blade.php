@extends('layouts.app')

@section('title', 'Account - Corporate Application')

@section('content')
    @include('partials.header')
    @include('partials.header-resp')

    <div class="bread-crumbs-wrapper">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}" title="Welcome Page" itemprop="url">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
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

                                    <div class="col-md-8 col-sm-12 col-lg-8">
                                        <div class="tab-content">
                                            <div class="tab-pane fade in active" id="corporate">
                                                <div class="dashboard-wrapper brd-rd5">

                                                    @include('partials.message')
                                                    @if (!session('success'))
                                                    <div class="dashboard-title">
                                                        <h4 itemprop="headline">APPLICATION FORM</h4>
                                                        <span>Fill in the required details and submit your application. Upon successful
                                                            review your application would be validated</span>
                                                    </div>
                                                    @endif

                                                    <div class="restaurant-detail-tabs">
                                                        <ul class="nav nav-tabs">
                                                            <li class="active"><a href="#tab1-1" data-toggle="tab"><i class="fa fa-cutlery"></i> Restaurant</a></li>
                                                            <li><a href="#tab1-2" data-toggle="tab"><i class="fa fa-ambulance"></i> Charity</a></li>
                                                            <li><a href="#tab1-3" data-toggle="tab"><i class="fa fa-list"></i> My Applications</a></li>
                                                        </ul>
                                                        <div class="tab-content">
                                                            <div class="tab-pane fade in active" id="tab1-1">
                                                                <form method="post" action="{{ route('account.corporate.application.store') }}" class="restaurant-info-form brd-rd5 p-0 pt-5">
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-md-6 col-sm-12 col-lg-6">
                                                                            <label>Restaurant name <sup>*</sup></label>
                                                                            <input name="restaurant_name" class="brd-rd3" type="text" required>
                                                                        </div>
                                                                        <div class="col-md-6 col-sm-12 col-lg-6">
                                                                            <label>Contact phone <sup>*</sup></label>
                                                                            <input name="restaurant_phone" class="brd-rd3" type="text" required>
                                                                        </div>
                                                                        <div class="col-md-6 col-sm-12 col-lg-6">
                                                                            <label>Contact Email</label>
                                                                            <input name="restaurant_email" class="brd-rd3" type="email">
                                                                        </div>
                                                                        <div class="col-md-6 col-sm-12 col-lg-6">
                                                                            <label>Website</label>
                                                                            <input name="restaurant_website" class="brd-rd3" type="text">
                                                                        </div>
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <label>Address</label>
                                                                            <textarea name="restaurant_address" class="brd-rd3" required></textarea>
                                                                        </div>
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <div class="step-buttons text-left mt-2">
                                                                                <button name="restaurant_application" class="brd-rd3 red-bg" type="submit">Submit Application</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>

                                                            <div class="tab-pane fade" id="tab1-2">
                                                                <form method="post" action="{{ route('account.corporate.application.store') }}" class="restaurant-info-form brd-rd5 p-0 pt-5">
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-md-6 col-sm-12 col-lg-6">
                                                                            <label>Charity name <sup>*</sup></label>
                                                                            <input name="charity_name" class="brd-rd3" type="text" required>
                                                                        </div>
                                                                        <div class="col-md-6 col-sm-12 col-lg-6">
                                                                            <label>Contact phone <sup>*</sup></label>
                                                                            <input name="charity_phone" class="brd-rd3" type="text" required>
                                                                        </div>
                                                                        <div class="col-md-6 col-sm-12 col-lg-6">
                                                                            <label>Contact Email</label>
                                                                            <input name="charity_email" class="brd-rd3" type="email">
                                                                        </div>
                                                                        <div class="col-md-6 col-sm-12 col-lg-6">
                                                                            <label>Website</label>
                                                                            <input name="charity_website" class="brd-rd3" type="text">
                                                                        </div>
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <label>Address</label>
                                                                            <input name="charity_address" class="brd-rd3" type="text">
                                                                        </div>
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <label>Details</label>
                                                                            <textarea name="charity_details" class="brd-rd3" placeholder="E.g. A girls home that seeks to promote..."></textarea>
                                                                        </div>
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <div class="step-buttons text-left mt-2">
                                                                                <button name="charity_application" class="brd-rd3 red-bg" type="submit">Submit Application</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="tab-pane fade" id="tab1-3">
                                                                <div class="restaurant-gallery">
                                                                    <h4 class="title3" itemprop="headline"><span class="sudo-bottom sudo-bg-red">Rest</span>aurant</h4>
                                                                    <div class="row">
                                                                        <div class="restaurants-list">
                                                                            @if(Auth::user()->restaurants)
                                                                            <div class="featured-restaurant-box style3 brd-rd5">
                                                                                <div class="featured-restaurant-thumb"><a href="#" title="" itemprop="url"><img src="{{ asset('images/resource/restaurant-logo1-2.png') }}" alt="restaurant-logo1-2.png" itemprop="image"></a></div>
                                                                                <div class="featured-restaurant-info">
                                                                                    <span class="red-clr">{{ Auth::user()->restaurants->address }}</span>
                                                                                    <h4 itemprop="headline"><a href="{{ route('account.corporate.restaurant.application', Auth::user()->restaurants->id) }}" title="" itemprop="url">{{ Auth::user()->restaurants->name }}</a></h4>
                                                                                    <ul class="post-meta">
                                                                                        <li><i class="fa fa-envelope"></i> {{ Auth::user()->restaurants->email }}</li>
                                                                                        <li><i class="fa fa-phone"></i> {{ Auth::user()->restaurants->phone }}</li>
                                                                                    </ul>
                                                                                </div>
                                                                                <div class="view-menu-liks">
                                                                                    <div class="order-info">
                                                                                        <span class="processing brd-rd3" style="padding: 10px 25px; text-transform: uppercase;">{{ Auth::user()->restaurants->status }}</span>
                                                                                    </div>
                                                                                    <a class="brd-rd3" href="{{ route('account.corporate.restaurant.application', Auth::user()->restaurants->id) }}" title="" itemprop="url">Quick View</a>
                                                                                </div>
                                                                            </div>
                                                                            @else
                                                                                You do not have any application for registration of a restaurant
                                                                            @endif
                                                                        </div>
                                                                    </div>

                                                                    <h4 class="title3" itemprop="headline"><span class="sudo-bottom sudo-bg-red">Cha</span>rity</h4>
                                                                    <div class="row">
                                                                        <div class="restaurants-list">
                                                                            @if(Auth::user()->charity)
                                                                                <div class="featured-restaurant-box style3 brd-rd5">
                                                                                    <div class="featured-restaurant-thumb"><a href="#" title="" itemprop="url"><img src="{{ asset('images/resource/charity-logo-1.jpg') }}" alt="restaurant-logo1-2.png" itemprop="image"></a></div>
                                                                                    <div class="featured-restaurant-info">
                                                                                        <span class="red-clr">{{ Auth::user()->charity->address }}</span>
                                                                                        <h4 itemprop="headline"><a href="{{ route('account.corporate.charity.application', Auth::user()->charity->ref_number) }}" title="" itemprop="url">{{ Auth::user()->charity->name }}</a></h4>
                                                                                        <ul class="post-meta">
                                                                                            <li> {{ Auth::user()->charity->email }}</li>
                                                                                            <li><i class="fa fa-phone"></i> {{ Auth::user()->charity->phone }}</li>
                                                                                        </ul>
                                                                                    </div>
                                                                                    <div class="view-menu-liks">
                                                                                        <div class="order-info">
                                                                                            <span class="processing brd-rd3" style="padding: 10px 25px; text-transform: uppercase;">{{ Auth::user()->charity->status }}</span>
                                                                                        </div>
                                                                                        <a class="brd-rd3" href="{{ route('account.corporate.charity.application', Auth::user()->charity->ref_number) }}" title="" itemprop="url">Quick View</a>
                                                                                    </div>
                                                                                </div>
                                                                            @else
                                                                                No Charity registration application was found under your account
                                                                            @endif
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
