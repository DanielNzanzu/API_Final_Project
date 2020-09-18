@extends('layouts.app')

@section('title', 'Cart | CheapFood')

@section('content')
    @include('partials.header')
    @include('partials.header-resp')

    <div class="bread-crumbs-wrapper">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}" title="Welcome Page" itemprop="url">Home</a></li>
                <li class="breadcrumb-item active">Menus</li>
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

                                <div class="col-md-8 col-sm-12 col-lg-8">

                                    <div class="tabs-wrp brd-rd5 p-0">
                                        @include('partials.message')

                                        <h4 itemprop="headline">MY FOOD BASKET</h4>

                                        @if(Cart::instance('default')->count() > 0)
                                            @foreach(Cart::content() as $item)
                                            <div class="restaurants-list">
                                                <div class="featured-restaurant-box style3 brd-rd5">
                                                    <div class="featured-restaurant-thumb"><a href="#" title="" itemprop="url"><img src="{{ asset($item->model->image ? 'storage/menus/'.$item->model->image : 'images/resource/restaurant-logo1-2.png') }}" alt="" itemprop="image"></a></div>
                                                    <div class="featured-restaurant-info">
                                                        <span class="red-clr">From: {{ $item->model->restaurant->name }}</span>
                                                        <h4 itemprop="headline"><a href="{{ route('home.menu.show', $item->model->slug) }}" title="" itemprop="url">{{ $item->name }}</a></h4>
                                                        <ul class="post-meta">
                                                            <li><i class="fa fa-shopping-basket"></i><strong> {{ $item->qty .' x Ksh'.$item->price }}</strong></li>
                                                            <li><i class="flaticon-money"></i> <strong>Ksh {{ $item->subtotal }}</strong></li>
                                                        </ul>
                                                    </div>
                                                    <div class="view-menu-liks">
                                                        <form action="{{ route('home.cart.remove', $item->rowId) }}" method="post">
                                                            @csrf
                                                            {{ method_field('DELETE') }}
                                                            <button type="submit" class="btn btn-default btn-sm red-clr">Remove</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        @else
                                            <div class="alert alert-warning text-center mt-5">
                                                You do not have any menu items in your basket! <hr>
                                                Add food items to your basket and donate to a charity or checkout normally
                                                <a class="btn btn-default mt-4" href="{{ route('home.menu.index') }}" itemprop="url">BACK TO MENUS</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12 col-lg-4">
                                    <div class="order-wrapper">
                                        <div class="order-inner gradient-brd">
                                            <h4 itemprop="headline">Basket Resumé</h4>
                                            <div class="order-list-wrapper">
                                                @if(Cart::instance('default')->count() > 0)
                                                    <ul class="order-list-inner">
                                                        <li><hr style="border: dotted 1px #cccccc">
                                                            <div class="dish-name">
                                                                <h6 itemprop="headline">Total food items:</h6> <span class="price">{{ Cart::instance('default')->count() }}</span>
                                                            </div><hr style="border: dotted 1px #cccccc">
                                                        </li>
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
                                                        You basket is empty!
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
