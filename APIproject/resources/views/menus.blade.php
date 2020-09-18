@extends('layouts.app')

@section('title', 'Menus | CheapFood')

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
                            <div class="remove-ext">
                                <div class="row">
                                    @forelse($menus as $menu)
                                        <div class="col-md-4 col-sm-6 col-lg-4">
                                            <div class="popular-dish-box style2 wow fadeIn" data-wow-delay="0.2s">
                                                <div class="popular-dish-thumb">
                                                    <a href="{{ route('home.menu.show', $menu->slug) }}" title="" itemprop="url">
                                                        <img src="{{ asset($menu->image ? 'storage/menus/'.$menu->image : 'images/resource/popular-dish-img1.jpg') }}" itemprop="image">
                                                    </a>
                                                    <span class="post-rate yellow-bg brd-rd2"><i class="fa fa-star-o"></i> {{ $menu->ratings }}</span>
                                                </div>
                                                <div class="popular-dish-info">
                                                    <h4 itemprop="headline"><a href="{{ route('home.menu.show', $menu->slug) }}" title="" itemprop="url">{{ $menu->name }}</a></h4>
                                                    <p itemprop="description">{{ \Illuminate\Support\Str::limit($menu->details, 70) }}</p>
                                                    <span class="price">Ksh {{ $menu->price }}</span>
                                                    <a class="brd-rd4 " href="{{ route('home.menu.show', $menu->slug) }}" title="Select Now" itemprop="url">Select Menu</a>
                                                    <div class="restaurant-info">
                                                        <img src="{{ asset('images/resource/restaurant-logo3.png') }}" alt="" itemprop="image">
                                                        <div class="restaurant-info-inner">
                                                            <h6 itemprop="headline"><a href="#" title="" itemprop="url">{{ $menu->restaurant->name }}</a></h6>
                                                            <span class="red-clr">{{ $menu->restaurant->address }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- Popular Dish Box -->
                                        </div>
                                    @empty
                                    </div></div>
                                        <div class="alert alert-danger">
                                            No food menu found
                                        </div>
                                    <div><div>
                                    @endforelse
                                </div>
                            </div>
                            {{ $menus->links() }}<!-- Pagination Wrapper -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer')
@endsection
