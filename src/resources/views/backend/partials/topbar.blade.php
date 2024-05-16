<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{route('admin')}}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{asset('/ui/images/Yotrip_logo-website-01.png')}}" alt="" height="35">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('/ui/images/Yotrip_logo-website-01.png')}}" alt="" height="50">
                    </span>
                </a>

                <a href="{{url('/admin')}}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{asset('/ui/images/Yotrip_logo-website-01.png')}}" alt="" height="35">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('/ui/images/Yotrip_logo-website-01.png')}}" alt="" height="50">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button>

            <!-- Tools -->
            <!-- <div class="d-none d-sm-block ms-1">
                <div class="dropdown">
                    <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="mdi mdi-plus-box-multiple"></i>
                        <span class="d-none d-xl-inline-block ms-1">Tools</span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu">
                     
                        <a href="javascript:void(0);" class="dropdown-item">Photoshop</a>
                        <a href="javascript:void(0);" class="dropdown-item">Visual Studio</a>
                        <a href="javascript:void(0);" class="dropdown-item">Sublime Text 3</a>
                        <a href="javascript:void(0);" class="dropdown-item">Phpstorm</a>
                    </div>
                </div>
            </div> -->

            <div class="d-none d-lg-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect" data-bs-target="#search-wrap">
                    <i class="mdi mdi-airplane me-2 font-size-16"></i>Đồng bộ
                </button>
            </div>

        </div>

        <!-- Search input -->
        <div class="search-wrap" id="search-wrap">
            <div class="search-bar">
                <input class="search-input form-control" placeholder="Search" />
                <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                    <i class="mdi mdi-close-circle"></i>
                </a>
            </div>
        </div>

        <div class="d-flex">

            <div class="dropdown d-none d-lg-inline-block">
                <button type="button" class="btn header-item toggle-search noti-icon waves-effect"
                    data-target="#search-wrap">
                    <i class="mdi mdi-magnify"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..."
                                    aria-label="Recipient's username">
                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            

            <!-- Notification -->
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect notification-step"
                    id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="mdi mdi-bell-outline"></i>
                    <span class="badge bg-danger rounded-pill">2</span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <h6 class="m-0">Thông báo (258) </h6>
                    </div>

                    <div data-simplebar style="max-height: 230px;">
                        <a href="" class="text-reset notification-item">
                            <div class="d-flex align-items-start">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                        <i class="mdi mdi-cart-outline"></i>
                                    </span>
                                </div>
                                <div class="flex-1">
                                    <h6 class="mb-1 font-size-15">Đơn hàng của bạn đã được đặt</h6>
                                    <div class="text-muted">
                                        <p class="mb-1 font-size-12">Dummy text of the printing and typesetting
                                            industry.</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="" class="text-reset notification-item">
                            <div class="d-flex align-items-start">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title bg-warning rounded-circle font-size-16">
                                        <i class="mdi mdi-message"></i>
                                    </span>
                                </div>
                                <div class="flex-1">
                                    <h6 class="mb-1 font-size-15">Tin nhắn mới</h6>
                                    <div class="text-muted">
                                        <p class="mb-1 font-size-12">You have 87 unread messages</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="" class="text-reset notification-item">
                            <div class="d-flex align-items-start">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title bg-info rounded-circle font-size-16">
                                        <i class="mdi mdi-help"></i>
                                    </span>
                                </div>
                                <div class="flex-1">
                                    <h6 class="mb-1 font-size-15">Đơn hàng của bạn đã được đặt</h6>
                                    <div class="text-muted">
                                        <p class="mb-1 font-size-12">It is a long established fact that a reader will
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="" class="text-reset notification-item">
                            <div class="d-flex align-items-start">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                        <i class="mdi mdi-cart-outline"></i>
                                    </span>
                                </div>
                                <div class="flex-1">
                                    <h6 class="mb-1 font-size-15">Your order is placed</h6>
                                    <div class="text-muted">
                                        <p class="mb-1 font-size-12">Dummy text of the printing and typesetting
                                            industry.</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="" class="text-reset notification-item">
                            <div class="d-flex align-items-start">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title bg-danger rounded-circle font-size-16">
                                        <i class="mdi mdi-cart-outline"></i>
                                    </span>
                                </div>
                                <div class="flex-1">
                                    <h6 class="mb-1 font-size-15">Your order is placed</h6>
                                    <div class="text-muted">
                                        <p class="mb-1 font-size-12">Dummy text of the printing and typesetting
                                            industry.</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="p-2 border-top d-grid">
                        <a class="btn btn-sm btn-link font-size-14 btn-block text-center" href="javascript:void(0)">
                            <i class="mdi mdi-arrow-right-circle me-1"></i> View all
                        </a>
                    </div>
                </div>
            </div>

            <!-- full-screen -->
            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="mdi mdi-fullscreen"></i>
                </button>
            </div>

            <!-- User -->
            <div class="dropdown d-inline-block">
                @if(Auth::check())
                <button type="button" class="btn header-item waves-effect user-step" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if(Auth()->user()->social_type == "google")
                    <img class="rounded-circle header-profile-user" src="{{Auth()->user()->photo}}" alt="Header Avatar">
                    @else
                        @if(Auth()->user()->photo)
                        <img class="rounded-circle header-profile-user"
                            src="{{Auth()->user()->photo}}" alt="Header Avatar">
                        @else
                        <img class="rounded-circle header-profile-user"
                            src="{{asset('/backend/assets/images/users/user-1.jpg')}}" alt="Header Avatar">
                        @endif
                    @endif
                    <span class="d-none d-xl-inline-block ms-1">{{Auth()->user()->name}}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                @else
                <button type="button" class="btn header-item waves-effect user-step" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user"
                        src="{{asset('/backend/assets/images/users/user-1.jpg')}}" alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1">Yotrip</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                @endif
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="{{route('admin.profile',Auth::user()->id)}}"><i class="dripicons-user d-inline-block text-muted me-2"></i>
                        Hồ sơ</a>
                    <!-- <a class="dropdown-item" href="#"><i class="dripicons-wallet d-inline-block text-muted me-2"></i> My
                        Wallet</a> -->
                    @if(Auth::user()->role == 'admin') 
                        <a class="dropdown-item d-block" href="{{url('/settings')}}"><i
                            class="dripicons-gear d-inline-block text-muted me-2"></i>Cài đặt</a>
                    @endif
                   
                  
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('user.logout')}}"><i
                            class="dripicons-exit d-inline-block text-muted me-2"></i>
                        Đăng xuất</a>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="mdi mdi-spin mdi-cog"></i>
                </button>
            </div>

        </div>
    </div>
</header>