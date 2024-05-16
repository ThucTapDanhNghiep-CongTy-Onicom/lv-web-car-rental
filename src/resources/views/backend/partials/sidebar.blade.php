<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Chủ yếu</li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="mdi mdi-bus-multiple"></i>
                        <span class="badge rounded-pill bg-danger float-end">9+</span>
                        <span>Trang tổng quan</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('main-content.index')}}">Ô tô</a></li>
                    </ul>
                </li>



                <!-- Calender -->



                <li class="menu-title">Các thành phần</li>

                <!-- Table -->
                @if(Auth::user()->role == 'admin')
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-format-list-bulleted-type"></i>
                        <span>Bảng</span>
                    </a>

                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('reder.index')}}">Hãng xe</a></li>

                        <li><a href="{{route('category.index')}}">Thể loại</a></li>

                    </ul>
                </li>
                @endif
                <!-- Banner -->
                @if(Auth::user()->role == 'admin')
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="mdi mdi-atom-variant"></i>

                        <span>Màn hình</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">

                        <li><a href="{{route('banner.index')}}">Banners</a></li>
                    </ul>
                </li>
                @endif
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-format-list-bulleted-type"></i>
                        <span>Khu vực</span>
                    </a>

                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('location.index')}}">Địa điểm</a></li>

                    </ul>
                </li>
                <!-- Users -->
                @if(Auth::user()->role == 'admin')
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="mdi mdi-account-supervisor-circle"></i>

                        <span>Người dùng</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">

                        <li><a href="{{route('user.index')}}">Người dùng</a></li>
                    </ul>
                </li>
                @endif
                @if(Auth::user()->role == 'admin')
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-map"></i>
                        <span>Khuyến mãi</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('sale.index')}}">Mã khuyến mãi</a></li>
                        <li><a href="{{route('sale.create')}}">Thêm mã khuyến mãi</a></li>

                    </ul>
                </li>
                @endif

                <li class="menu-title">Hơn</li>




                <!-- Pages -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-format-list-bulleted-type"></i>
                        <span>Khách hàng</span>
                    </a>

                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('review.index')}}">Đánh giá</a></li>

                        <li><a href="{{route('wishlist.index')}}">Yêu thích</a></li>

                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-briefcase"></i>
                        <span>Đặt xe</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('booking.index')}}">Đặt xe</a></li>

                    </ul>
                </li>
                @if(Auth::user()->role == 'admin')
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-drupal"></i>
                        <span>Yêu thích</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('wishlist.index')}}">Yêu thích</a></li>

                    </ul>
                </li>
                @endif
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="mdi mdi-checkbox-multiple-blank-outline"></i>
                        <span class="badge bg-success float-end">Nóng</span>
                        <span>Các trang</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <!-- <li><a href="page-tour.html">Settings</a></li> -->
                        <li><a href="{{route('oder.index')}}">Hóa đơn</a></li>
                        <li><a href="{{route('comment.index')}}">Bình luận</a></li>
                        <li><a href="{{route('history.index')}}">Lịch sử</a></li>
                        @if(Auth::user()->role == 'admin')
                        <li><a href="{{route('contact.index')}}">Liên hệ</a></li>
                        @endif
                    </ul>
                </li>





            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->