@extends('layouts.app')

@section('title', 'Restaurant Menus - Dashboard')

@section('content')
    @include('partials.header')
    @include('partials.header-resp')

    <div class="bread-crumbs-wrapper">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}" title="Welcome Page" itemprop="url">Home</a></li>
                <li class="breadcrumb-item">Restaurant</li>
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
                            <div class="dashboard-tabs-wrapper">
                                <div class="row">

                                    @include('account.sidebar')

                                    <div class="col-md-8 col-sm-12 col-lg-8">
                                        <div class="tab-content">
                                            <div class="tab-pane fade in active" id="dashboard">
                                                <div class="tabs-wrp brd-rd5">
                                                    <h4 itemprop="headline">MY MENUS</h4>
                                                    <div class="select-wrap-inner">
                                                        <a class="btn brd-rd3 red-bg pull-right" href="{{ route('account.restaurant.menu.create') }}" title="" itemprop="url">New Menu <i class="fa fa-plus-circle"></i></a>
                                                    </div>


                                                    <div class="order-list">
                                                        @forelse($menus as $menu)
                                                        <div class="order-item brd-rd5">
                                                            <div class="order-thumb brd-rd5">
                                                                <a href="{{ route('account.restaurant.menu.show', $menu->slug) }}" title="" itemprop="url"><img src="{{ asset($menu->image ? 'storage/menus/'.$menu->image : 'images/resource/order-img1.jpg') }}" alt="order-img1.jpg" itemprop="image"></a>
                                                                <span class="post-rate yellow-bg brd-rd2"><i class="fa fa-star-o"></i> {{ $menu->ratings }}</span>
                                                            </div>
                                                            <div class="order-info">
                                                                <span class="red-clr">{{ $menu->restaurant->name.' | '.$menu->restaurant->address }}</span>
                                                                <h4 itemprop="headline"><a href="{{ route('account.restaurant.menu.show', $menu->slug) }}" title="" itemprop="url">{{ $menu->name }}</a></h4>

                                                                <span class="price">Ksh {{ $menu->price }}</span>
                                                                <a class="brd-rd2" href="{{ route('account.restaurant.menu.show', $menu->slug) }}" title="" itemprop="url">More Details</a>
                                                            </div>
                                                        </div>
                                                        @empty
                                                            <div class="alert alert-danger mt-5">
                                                                No Menus Found
                                                            </div>
                                                        @endforelse
                                                        {{ $menus->links() }}
                                                    </div>
                                                </div>
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
