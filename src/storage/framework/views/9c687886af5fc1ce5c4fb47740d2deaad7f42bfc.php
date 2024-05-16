<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">
    <div class="slimscroll-menu">
        <div id="sidebar-menu">
            <ul class="metismenu" id="side-menu">
                <?php if(Gate::allows('view', 'Dashboard')): ?>
                <li>
                    <a href="/dashboard"><i class="fe-airplay"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if(Gate::allows('view', 'Blog')): ?>
                <!--li>
                    <a href="javascript: void(0);">
                        <i class="fe-file-text"></i>
                        <span> Blog </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level nav collapse" aria-expanded="false" style="">
                        <li class="">
                            <a href="/dashboard/blog">Bài viết</a>
                        </li>
                        <li class="">
                            <a href="/dashboard/blog-category">Chuyên mục</a>
                        </li>
                    </ul>
                </li-->
                <?php endif; ?>
                <li>
                    <a href="javascript: void(0);">
                    <i class="icon-list"></i>
                        <span> Category </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level nav collapse" aria-expanded="false" style="">
                        <li class="">
                            <a href="/dashboard/category/en">Category - EN</a>
                        </li>
                        <li class="">
                            <a href="/dashboard/category/vi">Category - VI</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);">
                    <i class="icon-doc"></i>
                        <span> Bài viết </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level nav collapse" aria-expanded="false" style="">
                        <li class="">
                            <a href="/dashboard/post/en">Bài viết - EN</a>
                        </li>
                        <li class="">
                            <a href="/dashboard/post/vi">Bài viết - VI</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="icon-book-open"></i>
                        <span> Hot news </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level nav collapse" aria-expanded="false" style="">
                        <li class="">
                            <a href="/dashboard/news/en">English</a>
                        </li>
                        <li class="">
                            <a href="/dashboard/news/vi">Tiếng việt</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="icon-location-pin"></i>
                        <span> Top place </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level nav collapse" aria-expanded="false" style="">
                        <li class="">
                            <a href="/dashboard/topplace/en">English</a>
                        </li>
                        <li class="">
                            <a href="/dashboard/topplace/vi">Tiếng việt</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="icon-location-pin"></i>
                        <span> Top popular </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level nav collapse" aria-expanded="false" style="">
                        <li class="">
                            <a href="/dashboard/toppopular/en">English</a>
                        </li>
                        <li class="">
                            <a href="/dashboard/toppopular/vi">Tiếng việt</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="icon-picture"></i>
                        <span> Slider </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level nav collapse" aria-expanded="false" style="">
                        <li class="">
                            <a href="/dashboard/sliders/en">English</a>
                        </li>
                        <li class="">
                            <a href="/dashboard/sliders/vi">Tiếng việt</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="icon-briefcase"></i>
                        <span> Tips </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level nav collapse" aria-expanded="false" style="">
                        <li class="">
                            <a href="/dashboard/tips/en">English</a>
                        </li>
                        <li class="">
                            <a href="/dashboard/tips/vi">Tiếng việt</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="/dashboard/ask">
                        <i class="icon-question"></i>
                        <span> Ask </span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="icon-info"></i>
                        <span> About Us </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level nav collapse" aria-expanded="false" style="">
                        <li class="">
                            <a href="/dashboard/aboutus/en">English</a>
                        </li>
                        <li class="">
                            <a href="/dashboard/aboutus/vi">Tiếng việt</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="icon-directions"></i>
                        <span> Visa </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level nav collapse" aria-expanded="false" style="">
                        <li class="">
                            <a href="/dashboard/visa/en">English</a>
                        </li>
                        <li class="">
                            <a href="/dashboard/visa/vi">Tiếng việt</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="icon-directions"></i>
                        <span> Safety </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level nav collapse" aria-expanded="false" style="">
                        <li class="">
                            <a href="/dashboard/safety/en">English</a>
                        </li>
                        <li class="">
                            <a href="/dashboard/safety/vi">Tiếng việt</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="icon-directions"></i>
                        <span> Emergency </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level nav collapse" aria-expanded="false" style="">
                        <li class="">
                            <a href="/dashboard/emergency/en">English</a>
                        </li>
                        <li class="">
                            <a href="/dashboard/emergency/vi">Tiếng việt</a>
                        </li>
                    </ul>
                </li>
                
                <!--li>
                    <a href="javascript: void(0);">
                        <i class="icon-directions"></i>
                        <span> Embassy </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level nav collapse" aria-expanded="false" style="">
                        <li class="">
                            <a href="/dashboard/embassy/en">English</a>
                        </li>
                        <li class="">
                            <a href="/dashboard/embassy/vi">Tiếng việt</a>
                        </li>
                    </ul>
                </li-->
                <li>
                    <a href="javascript: void(0);">
                        <i class="icon-directions"></i>
                        <span> Embassy </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level nav collapse" aria-expanded="false" style="">
                        <li class="">
                            <a href="/dashboard/embassy/en">English</a>
                        </li>
                        <li class="">
                            <a href="/dashboard/embassy/vi">Tiếng việt</a>
                        </li>
                    </ul>
                </li>
                <!--li>
                    <a href="/dashboard/users">
                        <i class="ti-user"></i>
                        <span> Users </span>
                    </a>
                </li-->
                <!--li>
                    <a href="/dashboard/maintain">
                        <i class="ti-user"></i>
                        <span> Users Maintain</span>
                    </a>
                </li>
                <li class="menu-title mt-2">Smart Contract</li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="icon-notebook"></i>
                        <span> Smart Contract </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="/dashboard/smartcontract">Thông tin</a>
                        </li>
                        <li>
                            <a href="/dashboard/smartcontract/frozen">Đóng băng</a>
                        </li>
                        <li>
                            <a href="/dashboard/smartcontract/transaction">Transactions</a>
                        </li>
                    </ul>
                </li-->
                <li class="menu-title mt-2">Setting</li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-settings"></i>
                        <span> Cấu hình </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="/dashboard/config">Cài đặt chung</a>
                        </li>
                        <!--li>
                            <a href="/dashboard/config/ico">Cài đặt ICO</a>
                        </li-->
                        <!--li>
                            <a href="/dashboard/config/social">Mạng xã hội</a>
                        </li>
                        <li>
                            <a href="/dashboard/config/seo">SEO</a>
                        </li-->
                    </ul>
                </li>
                <?php /*
                
                @if($value->class=="Service" && $value->status)
                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-grid"></i>
                        <span> Dịch vụ </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level nav collapse" aria-expanded="false" style="">
                        <li class="">
                            <a href="/admin/service/add">Thêm mới</a>
                        </li>
                        <li class="">
                            <a href="/admin/service">Danh sách</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if($value->class=="Orders" && $value->status)
                <li>
                    <a href="/admin/orders"><i class="mdi mdi-cart-outline"></i>
                        <span>Đơn hàng</span>
                    </a>
                </li>
                @endif
                @if($value->class=="Product" && $value->status)
                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-box"></i>
                        <span> Sản phẩm </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level nav collapse" aria-expanded="false" style="">
                        <li class="">
                            <a href="/admin/product-category">Chuyên mục</a>
                        </li>
                        <li class="">
                            <a href="/admin/product">Sản phẩm</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if($value->class=="Blog" && $value->status)
                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-file-text"></i>
                        <span> Blog </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level nav collapse" aria-expanded="false" style="">
                        <li class="">
                            <a href="/admin/blog-category">Chuyên mục</a>
                        </li>
                        <li class="">
                            <a href="/admin/blog">Bài viết</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if($value->class=="Contact" && $value->status)
                <li>
                    <a href="/admin/contact">
                        <i class="mdi mdi-contact-mail"></i>
                        <span> Liên hệ </span>
                    </a>
                </li>
                @endif
                @if($value->class=="Slide" && $value->status)
                <li>
                    <a href="javascript: void(0);">
                        <i class="fas fa-images"></i>
                        <span> Slide </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="/admin/slide/add">Thêm mới</a>
                        </li>
                        <li>
                            <a href="/admin/slide">Danh sách</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if($value->class=="Project" && $value->status)
                <li>
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-projector-screen"></i>
                        <span> Dự án </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="/admin/project/add">Thêm mới</a>
                        </li>
                        <li>
                            <a href="/admin/project">Danh sách</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if($value->class=="Brand" && $value->status)
                <li>
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-file-image"></i>
                        <span> Thương hiệu </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="/admin/brand/add">Thêm mới</a>
                        </li>
                        <li>
                            <a href="/admin/brand">Danh sách</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if($value->class=="Region" && $value->status)
                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-map-pin"></i>
                        <span> Khu vực </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="/admin/region">Danh sách</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if($value->class=="Configuration" && $value->status)
                <li class="menu-title mt-2">Cài đặt</li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-settings"></i>
                        <span> Cấu hình </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="/admin/config">Cài đặt chung</a>
                        </li>
                        <li>
                            <a href="/admin/config/social">Mạng xã hội</a>
                        </li>
                        <li>
                            <a href="/admin/config/seo">SEO</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if($value->class=="Users" && $value->status)
                <li class="menu-title mt-2">Hệ thống</li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-user"></i>
                        <span> Quản trị viên </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="/admin/users/add">Thêm mới</a>
                        </li>
                        <li>
                            <a href="/admin/users">Danh sách</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if($value->class=="Rules" && $value->status)
                <li>
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-shield-account"></i>
                        <span> Quyền truy cập</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="/admin/rules">Danh sách</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if($value->class=="Setting" && $value->status)
                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-settings"></i>
                        <span> {{$value->title}}</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="/admin/setting/thumb">Hình thumb</a>
                        </li>
                    </ul>
                </li>
                @endif

                @endforeach
                */ ?>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div><?php /**PATH /home/hcm_tourism/public_html/app/Modules/Dashboard/Views/inc/sidebar.blade.php ENDPATH**/ ?>