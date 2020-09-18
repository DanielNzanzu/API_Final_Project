<header class="stick">
    <div class="topbar">
        <div class="container">
            <div class="select-wrp">
                <div class="social1">
                    <a href="#" title="Facebook" itemprop="url" target="_blank"><i class="fa fa-facebook-square"></i></a>
                    <a href="#" title="Twitter" itemprop="url" target="_blank"><i class="fa fa-twitter"></i></a>
                    <a href="#" title="Google Plus" itemprop="url" target="_blank"><i class="fa fa-google-plus"></i></a>
                </div>
            </div>
            <div class="topbar-register">
                @guest
                <a class="log-popup-btn" href="{{ route('login') }}" title="Login" itemprop="url">LOGIN</a> /
                   @if (Route::has('register'))
                        <a class="sign-popup-btn" href="{{ route('register') }}" title="Register" itemprop="url">REGISTER</a>
                    @endif
                @else
                    <a class="log-popup-btn" href="{{ route('account.index') }}" title="Account" itemprop="url">MY ACCOUNT</a>
                @endguest
            </div>
        </div>
    </div><!-- Topbar -->
    <div class="logo-menu-sec">
        <div class="container">
            <div class="logo"><h1 itemprop="headline"><a href="{{ route('home.index') }}" title="Home" itemprop="url"><img src="{{ asset('images/logo2.png') }}" alt="logo" itemprop="image"></a></h1></div>
            <nav>
                <div class="menu-sec">
                    <ul>
                        <li><a href="#" title="ABOUT US" itemprop="url"><span class="red-clr">KNOW MORE</span>ABOUT US</a></li>
                        <li><a href="{{ route('home.menu.index') }}" title="FOOD MENUS" itemprop="url"><span class="red-clr">REAL FOOD</span>MENUS</a></li>
                        <li class="menu-item-has-children"><a href="#" title="PARTNERS" itemprop="url"><span class="red-clr">INFORMATION</span>PARTNERS</a>
                            <ul class="sub-dropdown">
                                <li><a href="#" title="RESTAURANT 1" itemprop="url">RESTAURANTS</a></li>
                                <li><a href="#" title="RESTAURANT 2" itemprop="url">CHARITIES</a></li>
                            </ul>
                        </li>
                        <li><a href="#" title="CONTACT US" itemprop="url"><span class="red-clr">KNOW MORE</span>CONTACT US</a></li>
                    </ul>
                    <a class="red-bg brd-rd4" href="{{ route('home.cart.index') }}" title="Basket" itemprop="url">FOOD BASKET&nbsp;&nbsp;<span class="fa fa-shopping-basket"></span></a>
                </div>
            </nav><!-- Navigation -->
        </div>
    </div><!-- Logo Menu Section -->
</header><!-- Header -->