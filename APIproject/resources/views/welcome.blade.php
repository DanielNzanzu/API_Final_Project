@extends('layouts.app')

@section('title', 'CheapFood | Welcome')

@section('content')
    @include('partials.header')
    @include('partials.header-resp')

    <section>
        <div class="block">
            <div style="background-image: url('{{asset('images/topbg.jpg')}}');" class="fixed-bg"></div>
            <div class="restaurant-searching text-center">
                <div class="restaurant-searching-inner">
                    <h2 itemprop="headline">Order <span>Food Online From</span> the Best Restaurants</h2>
                    <form class="restaurant-search-form brd-rd2">
                        <div class="row mrg10">
                            <div class="col-md-6 col-sm-5 col-lg-5 col-xs-12">
                                <div class="input-field brd-rd2"><input class="brd-rd2" type="text" placeholder="Restaurant Name"></div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-lg-4 col-xs-12">
                                <div class="input-field brd-rd2"><i class="fa fa-map-marker"></i><input class="brd-rd2" type="text" placeholder="Search Location"><i class="fa fa-location-arrow"></i></div>
                            </div>
                            <div class="col-md-2 col-sm-3 col-lg-3 col-xs-12">
                                <button class="brd-rd2 red-bg" type="submit">SEARCH</button>
                            </div>
                        </div>
                    </form>
                    <div class="funfacts">
                        <div class="col-md-3 col-sm-6 col-lg-3">
                            <div class="fact-box">
                                <i class="brd-rd50"><img src="{{ asset('images/resource/fact-icon1.png') }}" alt="fact-icon1" itemprop="image"></i>
                                <div class="fact-inner">
                                    <strong><span class="counter">137</span></strong>
                                    <h5>Restaurant</h5>
                                </div>
                            </div><!-- Fact Box -->
                        </div>
                        <div class="col-md-3 col-sm-6 col-lg-3">
                            <div class="fact-box">
                                <i class="brd-rd50"><img src="{{ asset('images/resource/fact-icon2.png') }}" alt="fact-icon2" itemprop="image"></i>
                                <div class="fact-inner">
                                    <strong><span class="counter">158</span></strong>
                                    <h5>People Served</h5>
                                </div>
                            </div><!-- Fact Box -->
                        </div>
                        <div class="col-md-3 col-sm-6 col-lg-3">
                            <div class="fact-box">
                                <i class="brd-rd50"><img src="{{ asset('images/resource/fact-icon3.png') }}" alt="fact-icon3" itemprop="image"></i>
                                <div class="fact-inner">
                                    <strong><span class="counter">659</span>K</strong>
                                    <h5>Happy Service</h5>
                                </div>
                            </div><!-- Fact Box -->
                        </div>
                        <div class="col-md-3 col-sm-6 col-lg-3">
                            <div class="fact-box">
                                <i class="brd-rd50"><img src="{{ asset('images/resource/fact-icon4.png') }}" alt="fact-icon4" itemprop="image"></i>
                                <div class="fact-inner">
                                    <strong><span class="counter">235</span></strong>
                                    <h5>Regular users</h5>
                                </div>
                            </div><!-- Fact Box -->
                        </div>
                    </div><!-- Fun Facts -->
                </div>
                <img class="left-scooty-mockup" src="{{ asset('images/resource/restaurant-mockup1.png') }}" alt="restaurant-mockup1.png" itemprop="image">
                <img class="bottom-clouds-mockup" src="{{ asset('images/resource/clouds.png') }}" alt="clouds.png" itemprop="image">
            </div><!-- Restaurant Searching -->
        </div>
    </section>

    <section>
        <div class="block">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="title1-wrapper text-center">
                            <div class="title1-inner">
                                <span>Website for Restaurant and Cafe</span>
                                <h2 itemprop="headline">Top Restaurants</h2>
                                <p itemprop="description">Things that get tricky are things like burgers and fries, or things that are deep-fried. We do have a couple of burger restaurants that are capable of doing a good job transporting but it's  Fries are almost impossible.</p>
                            </div>
                        </div>
                        <div class="top-restaurants-wrapper">
                            <ul class="restaurants-wrapper style2">
                                <li class="wow bounceIn" data-wow-delay="0.2s"><div class="top-restaurant"><a class="brd-rd50" href="#" title="Restaurant 1" itemprop="url"><img src="{{ asset('images/resource/top-restaurant1.png') }}" alt="top-restaurant1" itemprop="image"></a></div></li>
                                <li class="wow bounceIn" data-wow-delay="0.4s"><div class="top-restaurant"><a class="brd-rd50" href="#" title="Restaurant 2" itemprop="url"><img src="{{ asset('images/resource/top-restaurant2.png') }}" alt="top-restaurant2" itemprop="image"></a></div></li>
                                <li class="wow bounceIn" data-wow-delay="0.6s"><div class="top-restaurant"><a class="brd-rd50" href="#" title="Restaurant 3" itemprop="url"><img src="{{ asset('images/resource/top-restaurant3.png') }}" alt="top-restaurant3" itemprop="image"></a></div></li>
                                <li class="wow bounceIn" data-wow-delay="0.8s"><div class="top-restaurant"><a class="brd-rd50" href="#" title="Restaurant 4" itemprop="url"><img src="{{ asset('images/resource/top-restaurant4.png') }}" alt="top-restaurant4" itemprop="image"></a></div></li>
                                <li class="wow bounceIn" data-wow-delay="1s"><div class="top-restaurant"><a class="brd-rd50" href="#" title="Restaurant 5" itemprop="url"><img src="{{ asset('images/resource/top-restaurant5.png') }}" alt="top-restaurant5" itemprop="image"></a></div></li>
                                <li class="wow bounceIn" data-wow-delay="1.2s"><div class="top-restaurant"><a class="brd-rd50" href="#" title="Restaurant 5" itemprop="url"><img src="{{ asset('images/resource/top-restaurant6.png') }}" alt="top-restaurant6" itemprop="image"></a></div></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- top resturents -->


    <section>
        <div class="block blackish low-opacity">
            <div class="fixed-bg" style="background-image: url({{ asset('images/parallax1.jpg') }});"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="title1-wrapper text-center">
                            <div class="title1-inner">
                                <span>Website for Restaurant and Cafe</span>
                                <h2 class="text-white" itemprop="headline">easy order in 3 steps</h2>
                            </div>
                        </div>
                        <div class="remove-ext text-center">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-lg-4">
                                    <div class="step-box wow fadeIn" data-wow-delay="0.2s">
                                        <i><img src="{{ asset('images/resource/setp-img1.png') }}" alt="setp-img1.png" itemprop="image"> <span class="brd-rd50 red-bg">1</span></i>
                                        <div class="setp-box-inner">
                                            <h4 itemprop="headline">Explore Restaurants</h4>
                                            <p itemprop="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                        </div>
                                    </div><!-- Step Box -->
                                </div>
                                <div class="col-md-4 col-sm-4 col-lg-4">
                                    <div class="step-box wow fadeIn" data-wow-delay="0.4s">
                                        <i><img src="{{ asset('images/resource/setp-img2.png') }}" alt="setp-img2.png" itemprop="image"> <span class="brd-rd50 red-bg">2</span></i>
                                        <div class="setp-box-inner">
                                            <h4 itemprop="headline">Choose a Tasty Dish</h4>
                                            <p itemprop="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                        </div>
                                    </div><!-- Step Box -->
                                </div>
                                <div class="col-md-4 col-sm-4 col-lg-4">
                                    <div class="step-box wow fadeIn" data-wow-delay="0.6s">
                                        <i><img src="{{ asset('images/resource/setp-img3.png') }}" alt="setp-img3.png" itemprop="image"> <span class="brd-rd50 red-bg">3</span></i>
                                        <div class="setp-box-inner">
                                            <h4 itemprop="headline">Follow The Status</h4>
                                            <p itemprop="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                        </div>
                                    </div><!-- Step Box -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="block">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="title1-wrapper text-center">
                            <div class="title1-inner">
                                <span>Your Favourite Food</span>
                                <h2 itemprop="headline">Choose & Enjoy</h2>
                            </div>
                        </div>
                        <div class="row remove-ext5">
                            <div class="col-md-4 col-sm-6 col-lg-4">
                                <div class="popular-dish-box wow fadeIn" data-wow-delay="0.2s">
                                    <div class="popular-dish-thumb">
                                        <a href="#" title="" itemprop="url"><img src="{{ asset('images/resource/popular-dish-img1.jpg') }}" alt="popular-dish-img1.jpg" itemprop="image"></a>
                                        <span class="post-rate yellow-bg brd-rd2"><i class="fa fa-star-o"></i> 4.25</span>
                                        <span class="post-likes brd-rd4"><i class="fa fa-heart-o"></i> 12</span>
                                    </div>
                                    <div class="popular-dish-info">
                                        <h4 itemprop="headline"><a href="#" title="" itemprop="url">
                                                Maenaam Thai Restaurant</a>
                                        </h4>
                                        <p itemprop="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                        <span class="price">$85.00</span>
                                        <a class="brd-rd2" href="#" title="Order Now" itemprop="url">Order Now</a>
                                        <div class="restaurant-info">
                                            <img src="{{ asset('images/resource/restaurant-logo1.png') }}" alt="restaurant-logo1" itemprop="image">
                                            <div class="restaurant-info-inner">
                                                <h6 itemprop="headline"><a href="#" title="" itemprop="url">Fabio al Porto Ristorante</a></h6>
                                                <span class="red-clr">5th Avenue New York 68</span>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- Popular Dish Box -->
                            </div>
                            <div class="col-md-4 col-sm-6 col-lg-4">
                                <div class="popular-dish-box wow fadeIn" data-wow-delay="0.4s">
                                    <div class="popular-dish-thumb">
                                        <a href="#" title="" itemprop="url"><img src="{{ asset('images/resource/popular-dish-img2.jpg') }}" alt="popular-dish-img2.jpg" itemprop="image"></a>
                                        <span class="post-rate yellow-bg brd-rd2"><i class="fa fa-star-o"></i> 3.25</span>
                                        <span class="post-likes brd-rd4"><i class="fa fa-heart-o"></i> 10</span>
                                    </div>
                                    <div class="popular-dish-info">
                                        <h4 itemprop="headline"><a href="#" title="" itemprop="url">
                                                Champignon somen Noodles</a>
                                        </h4>
                                        <p itemprop="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                        <span class="price">$70.00</span>
                                        <a class="brd-rd2" href="#" title="Order Now" itemprop="url">Order Now</a>
                                        <div class="restaurant-info">
                                            <img src="{{ asset('images/resource/restaurant-logo1.png') }}" alt="restaurant-logo2.png" itemprop="image">
                                            <div class="restaurant-info-inner">
                                                <h6 itemprop="headline"><a href="#" title="" itemprop="url">Fabio al Porto Ristorante</a></h6>
                                                <span class="red-clr">5th Avenue New York 68</span>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- Popular Dish Box -->
                            </div>
                            <div class="col-md-4 col-sm-6 col-lg-4">
                                <div class="popular-dish-box wow fadeIn" data-wow-delay="0.6s">
                                    <div class="popular-dish-thumb">
                                        <a href="#" title="" itemprop="url"><img src="{{ asset('images/resource/popular-dish-img3.jpg') }}" alt="popular-dish-img3.jpg" itemprop="image"></a>
                                        <span class="post-rate yellow-bg brd-rd2"><i class="fa fa-star-o"></i> 5.00</span>
                                        <span class="post-likes brd-rd4"><i class="fa fa-heart-o"></i> 15</span>
                                    </div>
                                    <div class="popular-dish-info">
                                        <h4 itemprop="headline"><a href="#" title="" itemprop="url">
                                                Tomatoes & Clams Pasta</a></h4>
                                        <p itemprop="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                        <span class="price">$99.00</span>
                                        <a class="brd-rd2" href="#" title="Order Now" itemprop="url">Order Now</a>
                                        <div class="restaurant-info">
                                            <img src="{{ asset('images/resource/restaurant-logo1.png') }}" alt="restaurant-logo3.png" itemprop="image">
                                            <div class="restaurant-info-inner">
                                                <h6 itemprop="headline"><a href="#" title="" itemprop="url">Fabio al Porto Ristorante</a></h6>
                                                <span class="red-clr">5th Avenue New York 68</span>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- Popular Dish Box -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- choose and enjoy meal -->

    @include('partials.footer')
@endsection
