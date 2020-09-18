@extends('layouts.app')

@section('title', 'Donations - Dashboard | CheapFood')

@section('content')
    @include('partials.header')
    @include('partials.header-resp')

    <div class="bread-crumbs-wrapper">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}" title="Welcome Page" itemprop="url">Home</a></li>
                <li class="breadcrumb-item">Charity {{ Auth::user()->charity->name }}</li>
                <li class="breadcrumb-item active">Donations</li>
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
                                        <div class="dashboard-title pl-0 mb-3">
                                            <h4 itemprop="headline">Donations Received</h4>
                                        </div>
                                        {{--@forelse( Auth::user()->charity->donations as $donation)--}}
                                        @forelse( $donations as $donation)
                                            <div class="featured-restaurant-box style3 brd-rd5 wow fadeInUp" data-wow-delay="0.2s">
                                                <div class="featured-restaurant-thumb">
                                                    <a href="{{ route('account.charity.donation.show', $donation->ref_number) }}" title="" itemprop="url">
                                                        {{--<img src="{{ asset($menu->image ? 'storage/menus/'.$menu->image : 'images/resource/restaurant-logo1-1.png') }}" alt="restaurant-logo1-1.png" itemprop="image">--}}
                                                        <img src="{{ asset('images/resource/restaurant-logo1-1.png') }}" alt="restaurant-logo1-1.png" itemprop="image">
                                                    </a>
                                                </div>
                                                <div class="featured-restaurant-info">
                                                    <span class="">Donated by: <label for="" class="red-clr">{{ $donation->user->firstname.' '.$donation->user->lastname }}</label></span>
                                                    <h5 itemprop="headline"><i class="fa fa-money"></i> Ksh {{ $donation->order->total ? $donation->order->total : ''}}</h5>
                                                    <ul class="post-meta">
                                                        <li><i class="fa fa-hashtag"></i><strong>{{ $donation->ref_number }}</strong></li>
                                                        <li><span class="alert alert-info pt-1 pb-1"> {{ $donation->status }} </span></li>
                                                    </ul>
                                                </div>
                                                <div class="view-menu-liks">
                                                    {{--<span class="red-bg brd-rd4 post-likes"><i class="fa fa-money"></i> Ksh {{ $menu->price }}</span>--}}
                                                    <a class="brd-rd3" href="{{ route('account.charity.donation.show', $donation->ref_number) }}" title="" itemprop="url">View</a>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="alert alert-warning">
                                                You do not have any donations
                                            </div>
                                        @endforelse
                                        {{ $donations->links() }}
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
