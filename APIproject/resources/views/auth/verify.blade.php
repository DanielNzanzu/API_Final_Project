@extends('layouts.app')

@section('title', 'Login - Verify Email | CheapFood')

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
                                    <div class="sign-popup-title text-center">
                                        <h5 itemprop="headline">VERIFY EMAIL ADDRESS</h5>
                                    </div>
                                    <span class="popup-seprator text-center"><i class="brd-rd50"><i class="fa fa-heart"></i></i></span>

                                    @if (session('resent'))
                                        <div class="alert alert-success" role="alert">
                                            {{ __('A fresh verification link has been sent to your email address.') }}
                                        </div>
                                    @endif

                                    {{ __('Before proceeding, please check your email for a verification link.') }}
                                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}"><span style="color: #3f9ae5">{{ __('click here to request another') }}</span></a>.

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
@endsection
