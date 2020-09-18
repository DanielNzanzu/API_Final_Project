<div class="col-md-8 col-sm-12 col-lg-8">
    <div class="tab-content">
        <div class="tab-pane fade in active" id="dashboard">
            <div class="dashboard-wrapper brd-rd5">
                <div class="welcome-note yellow-bg brd-rd5">
                    <h4 itemprop="headline">WELCOME TO YOUR RESTAURANT DASHBOARD</h4>
                    <img src="{{ asset('images/resource/welcome-note-img.png') }}" alt="welcome-note-img.png" itemprop="image">
                    <a class="remove-noti" href="#" title="" itemprop="url"><img src="{{ asset('images/close-icon.png') }}" alt="close-icon.png" itemprop="image"></a>
                </div>

                <div class="dashboard-title mb-0">
                    <h4 itemprop="headline">Restaurant: <strong>{{ Auth::user()->restaurants->name }}</strong></h4>
                </div>

                <div class="funfacts mt-0 pt-0">
                    <div class="col-md-4 col-sm-6 col-lg-4">
                        <div class="fact-box">
                            <i class="brd-rd50" style="border: solid 1px #b8c2cc"><img src="{{ asset('images/resource/fact-icon6.png') }}" alt="fact-icon1" itemprop="image"></i>
                            <div class="fact-inner text-center">
                                <strong><span class="counter text-primary">{{ $menuCount ? $menuCount : 0 }}</span></strong>
                                <h5>Food Menu</h5>
                            </div>
                        </div><!-- Fact Box -->
                    </div>
                    <div class="col-md-4 col-sm-6 col-lg-4">
                        <div class="fact-box">
                            <i class="brd-rd50" style="border: solid 1px #b8c2cc"><img src="{{ asset('images/resource/fact-icon5.png') }}" alt="fact-icon2" itemprop="image"></i>
                            <div class="fact-inner text-center">
                                <strong><span class="counter text-primary">{{ $orderCount ? $orderCount : 0 }}</span></strong>
                                <h5>Order Received</h5>
                            </div>
                        </div><!-- Fact Box -->
                    </div>
                    <div class="col-md-4 col-sm-6 col-lg-4">
                        <div class="fact-box text-center">
                            <i class="brd-rd50" style="border: solid 1px #b8c2cc"><img src="{{ asset('images/resource/fact-icon2.png') }}" alt="fact-icon3" itemprop="image"></i>
                            <div class="fact-inner text-center">
                                <strong><span class="counter text-primary">{{ $userServed ? $userServed : 0 }}</span></strong>
                                <h5>People Served</h5>
                            </div>
                        </div><!-- Fact Box -->
                    </div>
                </div><!-- Fun Facts -->
            </div>
        </div>
    </div>
</div>