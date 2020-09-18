@extends('layouts.app')

@section('title', 'Create Menu | Dashboard Cheap Food')

@section('content')
    @include('partials.header')
    @include('partials.header-resp')

    <div class="bread-crumbs-wrapper">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}" title="Welcome Page" itemprop="url">Home</a></li>
                <li class="breadcrumb-item active">Restaurant - Create Menu</li>
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
                                                    <h4 itemprop="headline">NEW MENU</h4>
                                                    <div class="select-wrap-inner">
                                                        <a class="btn btn-primary pull-right" href="{{ route('account.restaurant.menu.index') }}" title="" itemprop="url">All Menus</a>
                                                    </div>

                                                    @include('partials.message')

                                                    <form method="post" action="{{ route('account.restaurant.menu.store') }}" class="restaurant-info-form brd-rd5" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12 col-lg-6">
                                                                <label>Menu name <sup>*</sup></label>
                                                                <input name="menu_name" class="brd-rd3" type="text" required>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12 col-lg-6">
                                                                <label>Price <sup>*</sup></label>
                                                                <input name="menu_price" class="brd-rd3" type="text" required>
                                                            </div>
                                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                                <label>Image </label>
                                                                <input name="menu_image" class="brd-rd3" type="file">
                                                            </div>
                                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                                <label>Details</label>
                                                                <textarea name="menu_details" class="brd-rd3" required></textarea>
                                                            </div>
                                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                                <div class="step-buttons mt-4">
                                                                    <button class="brd-rd3 red-bg pull-right" type="submit">Create Menu</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
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
