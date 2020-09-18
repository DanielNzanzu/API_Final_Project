@extends('layouts.app')

@section('title', 'Thank You - Checkout Complete | CheapFood')

@section('content')
    @include('partials.header')
    @include('partials.header-resp')

    <div class="bread-crumbs-wrapper">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}" title="Welcome Page" itemprop="url">Home</a></li>
                <li class="breadcrumb-item">Checkout</li>
                <li class="breadcrumb-item active">Complete</li>
            </ol>
        </div>
    </div>

    <section>
        <div class="block less-spacing gray-bg top-padd30">
            <div class="container">
                <div class="sec-box">
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-sm-12 col-lg-8">

                            <h3 class="mb-5 text-center">Thank You for your {{ $order->is_donation === 1 ? 'donation' : 'order'  }}</h3>

                            <div class="author-info-wrapper mt-2">
                                <h4 itemprop="headline">About the donation</h4>
                                <div class="author-box pb-2 mb-5">
                                    <img class="brd-rd50" src="{{ asset('images/resource/donation.png') }}" alt="" itemprop="image">
                                    <div class="author-info">
                                        <h4 itemprop="headline">#{{ $donation->ref_number }}</h4>
                                        <p itemprop="description">
                                            <i class="fa fa-clock-o"></i> {{ $order->created_at->diffForHumans() }} <br/>
                                            <i class="fa fa-user"></i> {{ $order->user->firstname.' '.$order->user->lastname }} <br/>
                                            <i class="fa fa-envelope"></i> {{ $order->user->email }}</p>
                                    </div>
                                </div>

                                <h4 itemprop="headline">Delivery</h4>
                                <div class="author-box pb-2 mb-5">
                                    <img class="brd-rd50" src="{{ asset('images/resource/delivery_02.png') }}" alt="" itemprop="image">
                                    <div class="author-info">
                                        @if($order->is_donation === 1)
                                            <h4 itemprop="headline">To: Charity - {{ $order->donation->charity->name }}</h4>
                                            <p itemprop="description">
                                                <i class="fa fa-map-marker"></i> {{ $order->donation->charity->address }}<br/>
                                                <i class="fa fa-phone"></i> {{ $order->donation->charity->phone }} <br/>
                                                <i class="fa fa-envelope"></i> {{ $order->donation->charity->email ? $order->donation->charity->email : '' }}</p>
                                        @else
                                            <h4 itemprop="headline">To: {{ $order->user->firstname.' '.$order->user->lastname }}</h4>
                                            <p itemprop="description">
                                                <i class="fa fa-envelope"></i> {{ $order->user->email }} <br/>
                                                <i class="fa fa-phone"></i> {{ $order->user->mobile ? $order->user->mobile : '' }}</p>
                                        @endif
                                    </div>
                                </div>

                                <h4 itemprop="headline">In the basket</h4>
                                @foreach($order->menus as $menu)
                                    <div class="featured-restaurant-box style3 brd-rd5 wow fadeInUp p-0" data-wow-delay="0.2s">
                                        <div class="featured-restaurant-thumb">
                                            <img class="brd-rd5" src="{{ asset($menu->image ? 'storage/menus/'.$menu->image : 'images/resource/restaurant-logo1-1.png') }}" alt="" itemprop="image">
                                        </div>
                                        <div class="featured-restaurant-info">
                                            <span class=""><i class="fa fa-coffee"></i> <label for="" class="red-clr">{{ $menu->name }}</label></span>
                                            <p><i class="fa fa-info-circle"></i> {{ \Illuminate\Support\Str::limit($menu->details, 35) }} </p>
                                            <ul class="post-meta">
                                                <li><i class="fa fa-map-marker"></i>{{ $menu->restaurant->name }}</li>
                                                <li><i class="fa fa-phone"></i>{{ $menu->restaurant->phone }}</li>
                                            </ul>
                                        </div>
                                        <div class="view-menu-liks">
                                            <span class="red-bg brd-rd4 post-likes"><i class="fa fa-money"></i> Ksh {{ $menu->price }} x {{ $menu->pivot->quantity }}</span>
                                            {{--<a class="brd-rd3" href="#" title="" itemprop="url">View</a>--}}
                                        </div>
                                    </div>
                                @endforeach
                                <ul class="ordr-lst brd-rd5 mt-5"><hr class="mb-0">
                                    <li>Subtotal <span>Ksh {{ $order->subtotal }}</span></li>
                                    <li>Delivery <span>Ksh 0.00</span></li>
                                    <li class="lst-hed">Total <span>Ksh {{ $order->total }}</span></li>
                                </ul>
                            </div>

                            <div class="step-buttons text-right mt-0">
                                <a href="{{ route('home.menu.index') }}" class="brd-rd3 red-bg"><i class="fa fa-arrow-left"></i> Back To Menus</a>
                                <a href="{{ route('account.index') }}" class="brd-rd3 red-bg">View Dashboard <i class="fa fa-arrow-right"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer')
@endsection
