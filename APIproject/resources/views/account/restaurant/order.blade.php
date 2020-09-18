@extends('layouts.app')

@section('title', 'Order Details | Dashboard - CheapFood')

@section('content')
    @include('partials.header')
    @include('partials.header-resp')

    <div class="bread-crumbs-wrapper">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}" title="Welcome Page" itemprop="url">Home</a></li>
                <li class="breadcrumb-item">Restaurant {{ Auth::user()->restaurants->name }}</li>
                <li class="breadcrumb-item active">Order #{{ $order->ref_number }}</li>
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
                                            <h4 class="title4" itemprop="headline"><span class="sudo-bottom sudo-bg-red">Order</span> #{{ $order->ref_number }}</h4>
                                        </div>

                                        @if (session('success'))
                                            <div class="alert alert-success text-center mt-5 pb-5" role="alert">
                                                {{ session('success') }}
                                            </div>
                                        @endif

                                        <div class="author-info-wrapper mt-0">
                                            <h4 itemprop="headline">About the Order</h4>
                                            <div class="author-box pb-2 mb-5">
                                                <img class="brd-rd50" src="{{ asset('images/resource/order.png') }}" alt="" itemprop="image">
                                                <div class="author-info">
                                                    <h4 itemprop="headline">#{{ $order->ref_number }}</h4>
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
                                                        <h4 itemprop="headline">To: Charity - {{ $order->donation->charity->name ? $order->donation->charity->name : '' }}</h4>
                                                        <p itemprop="description">
                                                            <i class="fa fa-map-marker"></i> {{ $order->donation->charity->address ? $order->donation->charity->address : '' }} <br/>
                                                            <i class="fa fa-phone"></i> {{ $order->donation->charity->phone ? $order->donation->charity->phone : '' }} <br/>
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

                                        <h4 itemprop="headline">Update Order Status</h4>
                                        <form action="{{ route('account.restaurant.order.update', $order->ref_number) }}" method="post" class="restaurant-info-form brd-rd5 p-3">
                                            @csrf
                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                <label>Status of the Order</label>
                                                <div class="select-wrp">
                                                    <select name="status">
                                                        <option value=""></option>
                                                        <option value="awaiting" {{ $order->status === 'awaiting' ? 'selected' : '' }}>Awaiting</option>
                                                        <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>Processing</option>
                                                        <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                                        <option value="canceled" {{ $order->status === 'canceled' ? 'selected' : '' }}>Canceled <sup>*</sup></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                <div class="step-buttons text-left mt-0">
                                                    <button type="submit" class="brd-rd3 red-bg" itemprop="url"
                                                            onclick="return confirm('Confirm the update of the order')">UPDATE ORDER <span class="fa fa-arrow-right"></span></button>

                                                </div>
                                            </div>
                                        </form>

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
