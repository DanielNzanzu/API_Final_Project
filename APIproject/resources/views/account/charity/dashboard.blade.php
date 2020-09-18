<div class="col-md-8 col-sm-12 col-lg-8">
    <div class="tab-content">
        <div class="tab-pane fade in active" id="dashboard">
            <div class="dashboard-wrapper brd-rd5">
                <div class="welcome-note yellow-bg brd-rd5">
                    <h4 itemprop="headline">WELCOME TO YOUR CHARITY DASHBOARD</h4>
                    <img src="{{ asset('images/resource/welcome-note-img.png') }}" alt="welcome-note-img.png" itemprop="image">
                    <a class="remove-noti" href="#" title="" itemprop="url"><img src="{{ asset('images/close-icon.png') }}" alt="close-icon.png" itemprop="image"></a>
                </div>

                <div class="dashboard-title">
                    <h4 itemprop="headline">My Charity: <strong>{{ Auth::user()->charity->name }}</strong></h4>
                </div>
            </div>
        </div>
    </div>
</div>