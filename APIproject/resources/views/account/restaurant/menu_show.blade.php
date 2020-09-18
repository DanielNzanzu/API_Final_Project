@extends('layouts.app')

@section('title', 'Restaurant Menu - Dashboard')

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
                                            <div class="tab-pane fade in active" id="dashboard">
                                                <div class="tabs-wrp brd-rd5 pt-4 pl-0 pr-5 pb-0">

                                                    <div class="restaurant-detail-wrapper mt-0">
                                                        <div class="restaurant-detail-info">
                                                            <div class="restaurant-detail-thumb">
                                                                <ul class="restaurant-detail-img-carousel">
                                                                    <li><img class="brd-rd3"
                                                                             src="{{ asset( $menu->image ? 'storage/menus/'.$menu->image : 'images/resource/restaurant-detail-big-img1-1.jpg') }}" itemprop="image">
                                                                    </li>
                                                                </ul>
                                                                <ul class="restaurant-detail-thumb-carousel">
                                                                    <li><img class="brd-rd3" src="{{ asset('images/resource/restaurant-detail-small-img1-1.jpg') }}" itemprop="image"></li>
                                                                </ul>
                                                            </div>
                                                            <div class="restaurant-detail-title">
                                                                <h1 itemprop="headline">{{ $menu->name }}</h1>
                                                                <div class="info-meta">
                                                                    <span>From: <strong>{{ $menu->restaurant->name }}</strong></span>
                                                                    <span><a href="{{ route('account.restaurant.details.index') }}" title="" itemprop="url">Details</a></span>
                                                                </div>
                                                                <div class="rating-wrapper">
                                                                    <a class="gradient-brd brd-rd2" href="#" title="" itemprop="url"><i class="fa fa-star"></i> Rate <i>{{ $menu->ratings }}</i></a>
                                                                    <div class="rate-share brd-rd5">
                                                                        <div class="rating-box-wrapper">
                                                                            <span>Rate</span>
                                                                            <div class="rating-box">
                                                                                <span class="brd-rd2 clr1 on"></span>
                                                                                <span class="brd-rd2 clr2 on"></span>
                                                                                <span class="brd-rd2 clr3 on"></span>
                                                                                <span class="brd-rd2 clr4 on"></span>
                                                                                <span class="brd-rd2 clr5 on"></span>
                                                                                <span class="brd-rd2 clr6 on"></span>
                                                                                <span class="brd-rd2 clr7 off"></span>
                                                                                <span class="brd-rd2 clr8 off"></span>
                                                                                <i>{{ $menu->ratings }}</i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <span class="price">Ksh {{ $menu->price }}</span>
                                                                <p itemprop="description">{{ $menu->details }}</p>
                                                                <a class="brd-rd3" href="#" title="" itemprop="url">Edit Menu</a>
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
