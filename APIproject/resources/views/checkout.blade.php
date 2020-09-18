@extends('layouts.app')

@section('title', 'Checkout | CheapFood')

@section('content')
    @include('partials.header')
    @include('partials.header-resp')

    <div class="bread-crumbs-wrapper">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}" title="Welcome Page" itemprop="url">Home</a></li>
                <li class="breadcrumb-item">Cart</li>
                <li class="breadcrumb-item active">Checkout</li>
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

                                        <h4 itemprop="headline">COMPLETE FOOD ORDER</h4>

                                        <form method="post" action="{{ route('home.checkout.store') }}" class="restaurant-info-form brd-rd5 pl-5 pr-5">
                                        @csrf
                                            <div class="row mrg20">
                                                <div class="col-md-6 col-sm-6 col-lg-6">
                                                    <label>Firstname <sup>*</sup></label>
                                                    <input class="brd-rd3" type="text" name="firstname" value="{{ Auth::user() ? Auth::user()->firstname : '' }}">
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-lg-6">
                                                    <label>Lastname <sup>*</sup></label>
                                                    <input class="brd-rd3" type="text" name="lastname" value="{{ Auth::user() ? Auth::user()->lastname : '' }}">
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                    <label>Contact Email <sup>*</sup></label>
                                                    <input class="brd-rd3" type="email" name="email" value="{{ Auth::user() ? Auth::user()->email : '' }}">
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                    <label>Contact Mobile <sup>*</sup></label>
                                                    <input class="brd-rd3" type="tel" name="mobile" value="{{ Auth::user()->mobile ? Auth::user()->mobile : '' }}">
                                                </div>

                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                    <h4 itemprop="headline">DELIVERY OPTION</h4>
                                                </div>

                                                <div class="pay-mnt">
                                                    <span class="radio-box">
                                                        <input type="radio" name="donate" id="mthd1" value="charity">
                                                        <label for="mthd1">Donate to charity</label>
                                                    </span>

                                                    <span class="radio-box">
                                                        <input type="radio" name="donate" id="mthd2" value="myself">
                                                        <label for="mthd2">Deliver to myself</label>
                                                    </span>
                                                </div>

                                                <div class="col-md-12 col-sm-12 col-lg-12" id="donate_div" style="display: none">
                                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                                        <h4 itemprop="headline">SELECT CHARITY</h4>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                                        <label>Charities <sup>*</sup></label>
                                                        <div class="select-wrp">
                                                            <select name="charity">
                                                                <option value="0" selected></option>
                                                                @foreach($charities as $charity)
                                                                    <option value="{{ $charity->id }}">{{ $charity->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                    <div class="check-box"><hr>
                                                        <input type="checkbox" name="conditions" id="agrement" required />
                                                        <label for="agrement">Accept Terms and conditions | Payment on delivery</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                    <div class="step-buttons text-left">
                                                        <a href="{{ route('home.cart.index') }}" class="brd-rd3 red-bg" itemprop="url"><span class="fa fa-arrow-left"></span> BACK TO BASKET</a>
                                                        <button type="submit" class="brd-rd3 red-bg" itemprop="url"
                                                                onclick="return confirm('Confirm the processing of the order')">COMPLETER ORDER <span class="fa fa-arrow-right"></span></button>

                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12 col-lg-4">
                                    <div class="order-wrapper">
                                        <div class="order-inner gradient-brd">
                                            <h4 itemprop="headline">Basket Resumé</h4>
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
                                                        </li>
                                                    @endforeach
                                                    </ul>

                                                    <ul class="order-total">
                                                        <li><span>SubTotal</span> <i>Ksh {{ Cart::instance('default')->subtotal() }}</i></li>
                                                        <li><span>Delivery fee</span> <i>Ksh 0</i></li>
                                                    </ul>
                                                    <ul class="order-method brd-rd2 red-bg" style="top: 85%; max-height: 90px;">
                                                        <li><span>Total</span> <span class="price">Ksh {{ Cart::instance('default')->total() }}</span></li>
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

@section('scripts')
    <script>
        $(document).ready(function() {
            $('input[type="radio"]').click(function() {
                if($(this).attr('id') == 'mthd1') {
                    $('#donate_div').show();
                }

                else {
                    $('#donate_div').hide();
                }
            });
        });
    </script>
@endsection
