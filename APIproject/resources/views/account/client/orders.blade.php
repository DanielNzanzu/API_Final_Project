@extends('layouts.app')

@section('title', 'My Orders - Dashboard | CheapFood')

@section('content')
    @include('partials.header')
    @include('partials.header-resp')

    <div class="bread-crumbs-wrapper">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}" title="Welcome Page" itemprop="url">Home</a></li>
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active">Orders</li>
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

                                    <div class="col-md-8 col-sm-12 col-lg-8 pt-4">
                                        <div class="dashboard-title">
                                            <h4 itemprop="headline">My Initiated Orders</h4>
                                        </div>
                                        @forelse( $orders as $order)
                                            <div class="featured-restaurant-box style3 brd-rd5 wow fadeInUp" data-wow-delay="0.2s">
                                                <div class="featured-restaurant-thumb">
                                                    <img class="brd-rd4" src="{{ asset('images/resource/restaurant-logo1-1.png') }}" alt="" itemprop="image">
                                                </div>
                                                <div class="featured-restaurant-info">
                                                    <span class="">#{{ $order->ref_number }}</span>
                                                    {{--<h5 itemprop="headline"><i class="fa fa-money"></i> Ksh {{ $order->total }}</h5>--}}
                                                    <ul class="post-meta">
                                                        <li><span class="alert alert-info pt-1 pb-1"> {{ $order->is_donation === 1 ? 'Donation' : 'Oneself' }} </span></li>
                                                        @if($order->is_donation === 1)
                                                            <li><i class="fa fa-map-marker"></i> {{ $order->donation->charity->name }}</li>
                                                        @else
                                                            <li><i class="fa fa-map-marker"></i> Delivered to me</li>
                                                        @endif
                                                    </ul>
                                                </div>
                                                <div class="view-menu-liks">
                                                    <span class="red-bg brd-rd4 post-likes"><i class="fa fa-money"></i> Ksh {{ $order->total }}</span>
                                                    <a class="brd-rd3" href="{{ route('account.client.order.show', $order->ref_number) }}" title="" itemprop="url">View</a>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="alert-warning p-5" style="margin-top: 50px">
                                                You do not have any orders! View <a class="red-clr" href="{{ route('home.menu.index') }}">Menus</a> and get yourself something tasteful
                                            </div>
                                        @endforelse
                                        {{ $orders->links() }}
                                        <ul class="ordr-lst brd-rd5 mt-5"><hr class="mb-0">
                                            <li class="lst-hed">Combined Total <span>Ksh {{ $total }}</span></li>
                                        </ul>
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
