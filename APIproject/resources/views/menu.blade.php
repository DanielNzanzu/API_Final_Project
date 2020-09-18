@extends('layouts.app')

@section('title')
    Menu - {{ $menu->name }} | CheapFood
@endsection

@section('content')
    @include('partials.header')
    @include('partials.header-resp')

    <div class="bread-crumbs-wrapper">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}" title="Welcome Page" itemprop="url">Home</a></li>
                <li class="breadcrumb-item">Menu</li>
                <li class="breadcrumb-item active">{{ $menu->name }}</li>
            </ol>
        </div>
    </div>

    <section>
        <div class="block less-spacing gray-bg top-padd30">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="sec-box">
                            <div class="sec-wrapper">

                                @include('partials.message')

                                <div class="col-md-8 col-sm-12 col-lg-8">

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
                                                    <span><a href="#" title="" itemprop="url">Details</a></span>
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

                                                <form action="{{ route('home.cart.store', $menu->slug) }}" method="post">
                                                    @csrf
                                                    <span class="price mt-3">Ksh {{ $menu->price }}</span>

                                                    <div class="qty-wrap">
                                                        <input class="qty" type="text" name="qty" pattern="[0-9]*" value="1">
                                                    </div>
                                                    <p itemprop="description">{{ $menu->details }}</p>

                                                    <input type="hidden" name="id" value="{{ $menu->id }}">
                                                    <input type="hidden" name="name" value="{{ $menu->name }}">
                                                    <input type="hidden" name="price" value="{{ $menu->price }}">
                                                    <div class="step-buttons text-left mt-0">
                                                        <button type="submit" class="brd-rd3 red-bg" itemprop="url">Add to Basket <i class="fa fa-arrow-right"></i></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-4 col-sm-12 col-lg-4">
                                    <div class="order-wrapper">
                                        <div class="order-inner gradient-brd">
                                            <h4 itemprop="headline">Your Basket ({{ Cart::instance('default')->count() }})</h4>
                                            <div class="order-list-wrapper">
                                                @if(Cart::instance('default')->count() > 0)
                                                    <ul class="order-list-inner">
                                                        @foreach(Cart::content() as $item)
                                                        <li>
                                                            <div class="dish-name">
                                                                <i>*</i> <h6 itemprop="headline">{{ \Illuminate\Support\Str::limit($item->name, 15) }}</h6> <span class="price">Ksh {{ $item->subtotal }}</span>
                                                            </div>
                                                            <div class="dish-ingredients">
                                                                <span class="check-box"><label><span>Qty</span> <i>{{ $item->qty.' x '.$item->model->price }}</i></label></span>
                                                            </div>
                                                            <div class="mor-ingredients">
                                                                <form action="{{ route('home.cart.remove', $item->rowId) }}" method="post">
                                                                    @csrf
                                                                    {{ method_field('DELETE') }}
                                                                    <button type="submit" class="red-clr">Remove</button>
                                                                </form>
                                                            </div>
                                                        </li>
                                                        @endforeach
                                                    </ul>

                                                    <ul class="order-total">
                                                        <li><span>SubTotal</span> <i>Ksh {{ Cart::instance('default')->subtotal() }}</i></li>
                                                        <li><span>Delivery fee</span> <i>Ksh 0</i></li>
                                                    </ul>
                                                    <ul class="order-method brd-rd2 red-bg">
                                                        <li><span>Total</span> <span class="price">Ksh {{ Cart::instance('default')->total() }}</span></li>
                                                        <li><a class="btn btn-warning btn-sm brd-rd2" href="{{ route('home.menu.index') }}" itemprop="url">BACK TO MENUS</a></li>
                                                        <li><a class="btn btn-primary brd-rd2" href="{{ route('home.checkout.index') }}" title="" itemprop="url">ORDER CHECKOUT</a></li>
                                                    </ul>
                                                @else
                                                    <div class="alert alert-warning text-center ml-4 mr-4 mb-5">
                                                        You do not have any menu items in your basket! <hr>
                                                        Add food items to your basket and donate to a charity or checkout normally
                                                    </div><br>
                                                    <ul class="order-method brd-rd2 red-bg">
                                                        <li><span>Total</span> <span class="price">Ksh 0.00</span></li>
                                                        <li><a class="btn btn-warning btn-sm brd-rd2" href="{{ route('home.menu.index') }}" itemprop="url">BACK TO MENUS</a></li>
                                                    </ul>
                                                @endif
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
