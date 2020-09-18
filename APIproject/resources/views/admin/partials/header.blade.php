<div class="app-header header-shadow bg-secondary header-text-light">
    <div class="app-header__logo">
        <div class="logo-src" style="{{ asset('images/logo.png') }}">
            <a href="{{ route('admin.dashboard.index') }}">
                <img src="{{ asset('images/logo.png') }}" style="max-height:30px;" alt="">
            </a>
        </div>

        <div class="header__pane ml-auto">
            <div>
                <button
                        type="button"
                        class="hamburger close-sidebar-btn hamburger--elastic"
                        data-class="closed-sidebar"
                >
                <span class="hamburger-box">
                  <span class="hamburger-inner"></span>
                </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button
                    type="button"
                    class="hamburger hamburger--elastic mobile-toggle-nav"
            >
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
          <span>
            <button
                    type="button"
                    class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav"
            >
              <span class="btn-icon-wrapper">
                <i class="fa fa-ellipsis-v fa-w-6"></i>
              </span>
            </button>
          </span>
    </div>
    <div class="app-header__content">
        <div class="app-header-right">
            <div class="header-btn-lg pr-0">
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="btn-group">
                                <a
                                        data-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false"
                                        class="p-0 btn"
                                >
                                    <img
                                            width="42"
                                            class="rounded-circle"
                                            src="{{ asset('images/avatars/1.jpg') }}"
                                            alt=""
                                    />
                                    <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                </a>
                                @auth
                                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                    <h6 tabindex="-1" class="dropdown-header" style="text-transform: uppercase">
                                        {{ Auth::user()->firstname.' '.Auth::user()->lastname }}
                                    </h6>
                                    <div tabindex="-1" class="dropdown-divider"></div>
                                    <a href="#" tabindex="0" class="dropdown-item">
                                        My Profile
                                    </a>
                                    <div tabindex="-1" class="dropdown-divider"></div>
                                    <a tabindex="0" class="dropdown-item" href="{{ route('admin.logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('admin-logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                                @endauth
                            </div>
                        </div>
                        <div class="widget-content-left  ml-3 header-user-info">
                            <div class="widget-heading">
                                Alina Mclourd
                            </div>
                            <div class="widget-subheading">
                                VP People Manager
                            </div>
                        </div>
                        <div class="widget-content-right header-user-info ml-3">
                            <button
                                    type="button"
                                    class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example"
                            >
                                <i class="fa text-white fa-calendar pr-1 pl-1"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>