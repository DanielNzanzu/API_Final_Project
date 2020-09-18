@extends('layouts.app')

@section('title', 'Login - Authentication | CheapFood')

@section('content')
    <section>
        <div class="block">
            <div class="fixed-bg" style="background-image: url({{ asset('images/topbg.jpg') }});"></div>

            <div class="container">
                <div class="row justify-content-center mb-5" style="margin-top: -5%">
                    <h1 itemprop="headline"><a href="{{ route($homeRoute) }}" title="Home" itemprop="url">
                            <img src="{{ asset('images/logo.png') }}" alt="logo" itemprop="image"></a>
                    </h1>
                </div>
            </div>

            <div class="container">
                <div class="login-register-wrapper">
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-sm-12 col-lg-6">
                            <div class="sign-popup-wrapper brd-rd5">
                                <div class="sign-popup-inner brd-rd5">
                                    <div class="sign-popup-title text-center">
                                        <h4 itemprop="headline">{{ $title }}</h4>
                                    </div>
                                    <span class="popup-seprator text-center"><i class="brd-rd50"><i class="fa fa-heart"></i></i></span>
                                    <form class="sign-form" method="POST" action="{{ route($loginRoute) }}">
                                        @csrf

                                        @if(session('error'))
                                        <div class="alert alert-danger text-center">
                                            <strong>Whoops!</strong><br><br>
                                            {{ session('error') }}
                                        </div>
                                        @endif

                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                <label>Email Address <sup>*</sup></label>
                                                <input type="email" class="brd-rd3 red-round @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter email..." required autocomplete="email" autofocus >

                                                @error('email')
                                                    <span role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                <label>Password <sup>*</sup></label>
                                                <input type="password" class="brd-rd3 @error('password') is-invalid @enderror" name="password" placeholder="Enter password..." required autocomplete="current-password">

                                                @error('password')
                                                    <span role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 mb-4">
                                                <div class="check-box">
                                                    <input type="checkbox" name="remember" id="agrement" {{ old('remember') ? 'checked' : '' }} />
                                                    <label for="agrement">Remember Me</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                <button class="red-bg brd-rd3" type="submit">SIGN IN</button>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                <a class="sign-btn" href="{{ route('register') }}" title="" itemprop="url">Not a member? Sign up</a>
                                                @if (Route::has('password.request'))
                                                    <a class="recover-btn" href="{{ route($forgotPasswordRoute) }}" title="" itemprop="url">Recover my password</a>
                                                @endif
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