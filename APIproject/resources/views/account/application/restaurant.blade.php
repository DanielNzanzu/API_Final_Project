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
                                                        <h4 itemprop="headline">MY APPLICATION - RESTAURANT #{{ $restaurant->id }}</h4>
                                                    </div>

                                                    @if (session('success'))
                                                        <div class="alert alert-success text-center mt-5" role="alert">
                                                            {{session('success')}}
                                                        </div>
                                                    @endif

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
                                                                            <h4 itemprop="headline">{{ $restaurant->name }}</h4>
                                                                            <span class="red-clr"><u>Address</u>: {{ $restaurant->address }}</span>
                                                                            <ul class="post-meta">
                                                                                <li><i class="fa fa-envelope"></i> {{ $restaurant->email }}</li>
                                                                                <li><i class="fa fa-phone"></i> {{ $restaurant->phone }}</li>
                                                                                <li><i class="fa fa-globe"></i> <a href="{{ $restaurant->website }}" target="_blank">{{ $restaurant->website }}</a></li>
                                                                            </ul>
                                                                            <br />
                                                                            <span class="post-rate yellow-bg brd-rd2"><i class="fa fa-spinner"></i> &nbsp;{{ $restaurant->status }}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="toggle-item">
                                                                <h4><i class="fa fa-angle-right brd-rd50"></i> Edit Application</h4>
                                                                <div class="content">
                                                                    <form method="post" action="{{ route('account.corporate.restaurant.update', $restaurant->id) }}" class="restaurant-info-form brd-rd5">
                                                                        @csrf
                                                                        <div class="row">
                                                                            <div class="col-md-6 col-sm-12 col-lg-6">
                                                                                <label>Restaurant name <sup>*</sup></label>
                                                                                <input name="restaurant_name" class="brd-rd3" value="{{ $restaurant->name }}" type="text" required>
                                                                            </div>
                                                                            <div class="col-md-6 col-sm-12 col-lg-6">
                                                                                <label>Contact phone <sup>*</sup></label>
                                                                                <input name="restaurant_phone" class="brd-rd3" type="text" value="{{ $restaurant->phone }}" required>
                                                                            </div>
                                                                            <div class="col-md-6 col-sm-12 col-lg-6">
                                                                                <label>Contact Email</label>
                                                                                <input name="restaurant_email" class="brd-rd3" type="email" value="{{ $restaurant->email }}">
                                                                            </div>
                                                                            <div class="col-md-6 col-sm-12 col-lg-6">
                                                                                <label>Website</label>
                                                                                <input name="restaurant_website" class="brd-rd3" type="text" value="{{ $restaurant->website }}">
                                                                            </div>
                                                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                                                <label>Address</label>
                                                                                <textarea name="restaurant_address" class="brd-rd3" required>{{ $restaurant->address }}</textarea>
                                                                            </div>
                                                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                                                <div class="step-buttons">
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