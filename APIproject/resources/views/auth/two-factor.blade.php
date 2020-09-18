@extends('layouts.app')

@section('title', 'Two Factor - Authentication | CheapFood')

@section('content')

    <section>
        <div class="block">
            <div class="fixed-bg" style="background-image: url({{ asset('images/topbg.jpg') }});"></div>

            <div class="container">
                <div class="row justify-content-center mb-5" style="margin-top: -5%">
                    <h1 itemprop="headline"><a href="{{ url('/') }}" title="Home" itemprop="url">
                            <img src="{{ asset('images/logo.png') }}" alt="logo.png" itemprop="image"></a>
                    </h1>
                </div>
            </div>

            <div class="container">
                <div class="login-register-wrapper">
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-sm-12 col-lg-8">
                            <div class="sign-popup-wrapper brd-rd5">
                                <div class="sign-popup-inner brd-rd5">
                                    <div class="sign-popup-title text-center mb-0">
                                        <h5 itemprop="headline">{{ $title }}</h5>
                                        <div class="alert alert-info mt-5" role="alert">
                                            Enter the verification code you received on your Email
                                        </div>
                                    </div>
                                    <span class="popup-seprator text-center"><i class="brd-rd50"><i class="fa fa-heart"></i></i></span>

                                    <form class="sign-form" method="POST" action="{{ route($verify2faRoute) }}" autocomplete="off">
                                    @csrf

                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                <label>Verification Code <sup>*</sup></label>
                                                <input id="2fa" type="text" class="brd-rd3 @error('2fa') is-invalid @enderror" name="2fa" value="{{ old('code') }}" placeholder="Enter verification code..." required autofocus >

                                                @error('2fa')
                                                <span role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                <button class="red-bg brd-rd3" type="submit">VERIFY IDENTITY</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
@endsection
