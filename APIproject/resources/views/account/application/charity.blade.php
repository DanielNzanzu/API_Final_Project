@extends('layouts.app')

@section('title', 'Application - Restaurant | CheapFood')

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
                                            <div class="tab-pane fade in active" id="application-restaurant">
                                                <div class="dashboard-wrapper brd-rd5">

                                                    <div class="dashboard-title">
                                                        <h4 itemprop="headline">MY APPLICATION - RESTAURANT #{{ $charity->ref_number }}</h4>
                                                    </div>

                                                    @include('partials.message')

                                                    <div class="toggle-wrapper text-center bottom-padd80">
                                                        <div id="toggle" class="toggle">
                                                            <div class="toggle-item">
                                                                <h4><i class="fa fa-angle-right brd-rd50"></i> Preview Application Details</h4>
                                                                <div class="content">
                                                                    <div class="featured-restaurant-box style2 brd-rd12 wow fadeIn" data-wow-delay="0.2s">
                                                                        <div class="featured-restaurant-thumb">
                                                                            <a href="#" title="" itemprop="url"><img src="{{ asset('images/resource/most-popular-img1-2.png') }}" alt="most-popular-img1-2.png" itemprop="image"></a>
                                                                        </div>

                                                                        <div class="featured-restaurant-info">
                                                                            <h4 itemprop="headline">{{ $charity->name }}</h4>
                                                                            <span class="red-clr"><u>Address</u>: {{ $charity->address }}</span>
                                                                            <ul class="post-meta">
                                                                                <li><i class="fa fa-envelope"></i> {{ $charity->email }}</li>
                                                                                <li><i class="fa fa-phone"></i> {{ $charity->phone }}</li>
                                                                                <li><i class="fa fa-globe"></i> <a href="http://{{ $charity->website }}" target="_blank">{{ $charity->website }}</a></li>
                                                                                <li><i class="fa fa-list"></i> {{ $charity->details }}</li>
                                                                                <hr>
                                                                                <li>
                                                                                    <span class="btn btn-warning"> <i class="fa fa-spinner"></i> &nbsp; {{ $charity->status }}</span>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="toggle-item">
                                                                <h4><i class="fa fa-angle-right brd-rd50"></i> Edit Application</h4>
                                                                <div class="content">
                                                                    <form method="post" action="{{ route('account.corporate.charity.update', $charity->ref_number) }}" class="restaurant-info-form brd-rd5 p-0 pt-5">
                                                                        @csrf
                                                                        <div class="row">
                                                                            <div class="col-md-6 col-sm-12 col-lg-6">
                                                                                <label>Restaurant name <sup>*</sup></label>
                                                                                <input name="charity_name" class="brd-rd3" value="{{ $charity->name }}" type="text" required>
                                                                            </div>
                                                                            <div class="col-md-6 col-sm-12 col-lg-6">
                                                                                <label>Contact phone <sup>*</sup></label>
                                                                                <input name="charity_phone" class="brd-rd3" type="text" value="{{ $charity->phone }}" required>
                                                                            </div>
                                                                            <div class="col-md-6 col-sm-12 col-lg-6">
                                                                                <label>Contact Email <sup>*</sup></label>
                                                                                <input name="charity_email" class="brd-rd3" type="email" value="{{ $charity->email }}">
                                                                            </div>
                                                                            <div class="col-md-6 col-sm-12 col-lg-6">
                                                                                <label>Website <sup>*</sup></label>
                                                                                <input name="charity_website" class="brd-rd3" type="text" value="{{ $charity->website }}">
                                                                            </div>
                                                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                                                <label>Address <sup>*</sup></label>
                                                                                <input name="charity_address" class="brd-rd3" type="text" value="{{ $charity->address }}">
                                                                            </div>
                                                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                                                <label>Details <sup>*</sup></label>
                                                                                <textarea name="charity_details" class="brd-rd3" required>{{ $charity->details }}</textarea>
                                                                            </div>
                                                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                                                <div class="step-buttons text-left mt-0">
                                                                                    <button class="brd-rd3 red-bg" type="submit">Update Application</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <div class="toggle-item">
                                                                <h4><i class="fa fa-angle-right brd-rd50"></i> Delete Application</h4>
                                                                <div class="content">
                                                                    <p>Would you like to delete the application? Click Below to delete</p>
                                                                </div>
                                                            </div>
                                                        </div><!-- Accordions -->
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