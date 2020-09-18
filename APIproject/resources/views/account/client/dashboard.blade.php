<div class="col-md-8 col-sm-12 col-lg-8">
    <div class="tab-content">
        <div class="tab-pane fade in active" id="dashboard">
            <div class="dashboard-wrapper brd-rd5">
                <div class="welcome-note yellow-bg brd-rd5">
                    <h4 itemprop="headline">WELCOME TO YOUR ACCOUNT DASHBOARD</h4>
                    <p itemprop="description">From your account dashbaord you can manage your profile details, view your orders,
                        and further if you operate a restaurant on the platform; manage activities related to the restaurant.
                        Would it come that you would like to have your restaurant or charity organization listed on the site, register it
                        through the application form below.</p>
                    <img src="{{ asset('images/resource/welcome-note-img.png') }}" alt="welcome-note-img.png" itemprop="image">
                    <a class="remove-noti" href="#" title="" itemprop="url"><img src="{{ asset('images/close-icon.png') }}" alt="close-icon.png" itemprop="image"></a>
                </div>

                <div class="dashboard-title pl-0">
                    <h4 itemprop="headline">Top Menus</h4>
                </div>

                <div class="restaurants-list pl-0 pr-0">
                    @forelse($menus as $menu)
                        <div class="featured-restaurant-box style3 brd-rd5 wow fadeInUp" data-wow-delay="0.2s">
                            <div class="featured-restaurant-thumb">
                                <a href="#" title="" itemprop="url">
                                    <img src="{{ asset($menu->image ? 'storage/menus/'.$menu->image : 'images/resource/restaurant-logo1-1.png') }}" alt="restaurant-logo1-1.png" itemprop="image">
                                </a>
                            </div>
                            <div class="featured-restaurant-info">
                                <span class="red-clr">{{ $menu->restaurant->name }}</span>
                                <h4 itemprop="headline"><a href="{{ route('home.menu.show', $menu->slug) }}" title="" itemprop="url">{{ $menu->name }}</a></h4>
                                <ul class="post-meta">
                                    <li><i class="fa fa-map-marker"></i> {{ $menu->restaurant->address }}</li>
                                    <li><i class="flaticon-transport"></i> 30min</li>
                                </ul>
                            </div>
                            <div class="view-menu-liks">
                                <span class="red-bg brd-rd4 post-likes"><i class="fa fa-money"></i> Ksh {{ $menu->price }}</span>
                                <a class="brd-rd3" href="{{ route('home.menu.show', $menu->slug) }}" title="" itemprop="url">View Menu</a>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-danger">No Menus Found</div>
                    @endforelse

                    {{ $menus->links() }}
                </div>
            </div>
        </div>
    </div>
</div>