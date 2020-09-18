@extends('layouts.app')

@section('title', 'Register Account | CheapFood')

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
                        <div class="col-md-6 col-sm-12 col-lg-6">
                            <div class="sign-popup-wrapper brd-rd5">
                                <div class="sign-popup-inner brd-rd5">
                                    <div class="sign-popup-title text-center">
                                        <h4 itemprop="headline">REGISTER</h4>
                                    </div>
                                    <span class="popup-seprator text-center"><i class="brd-rd50"><i class="fa fa-heart"></i></i></span>

                                    <form class="sign-form" method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                <label>Firstname <sup>*</sup></label>
                                                <input type="text" class="brd-rd3 red-round @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" placeholder="Enter firstname..." required autocomplete="firstname" autofocus >

                                                @error('firstname')
                                                <span role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                <label>Lastname <sup>*</sup></label>
                                                <input type="text" class="brd-rd3 red-round @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" placeholder="Enter lastname..." required autocomplete="lastname" autofocus >

                                                @error('lastname')
                                                <span role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>

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
                                                <input type="password" class="brd-rd3 @error('password') is-invalid @enderror" name="password" placeholder="Enter password..." required autocomplete="new-password">

                                                @error('password')
                                                <span role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                <label>Confirm Password <sup>*</sup></label>
                                                <input type="password" class="brd-rd3" name="password_confirmation" placeholder="Enter password..." required autocomplete="new-password">
                                            </div>

                                            <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                <button class="red-bg brd-rd3" type="submit">REGISTER</button>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                <a class="sign-btn" href="{{ route('login') }}" title="" itemprop="url">Already have an account? Sign In</a>
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

@section('old-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('Firstname') }}</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>

                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Lastname') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

                                @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
