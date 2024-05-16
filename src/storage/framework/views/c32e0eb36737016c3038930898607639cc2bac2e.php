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
                    <a href="/dashboard/wallet">
                        <i class="icon-wallet"></i>
                        <span> Wallet </span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="icon-lock"></i>
                        <span> Withdrawal Rule </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level nav collapse" aria-expanded="false" style="">
                        <li class="">
                            <a href="/dashboard/withdrawalrule">List All</a>
                        </li>
                        <li class="">
                            <a href="/dashboard/withdrawalrule/add">Add new</a>
                        </li>
                    </ul>
                </li>
                <!--li>
                    <a href="javascript: void(0);">
                       <i class="icon-cursor"></i>
                        <span> Transfer </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level nav collapse" aria-expanded="false" style="">
                        <li class="">
                            <a href="/dashboard/transfer">Danh sách</a>
                        </li>
						<li class="">
                            <a href="/dashboard/transfer/list">Transactions</a>
                        </li>
                    </ul>
                </li-->
				<li>
                    <a href="javascript: void(0);">
                       <i class="ti-calendar"></i>
                        <span> Phase </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level nav collapse" aria-expanded="false" style="">
                        <li class="">
                            <a href="/dashboard/phase">Danh sách</a>
                        </li>
						<li class="">
                            <a href="/dashboard/phase/add">Thêm mới</a>
                        </li>
                    </ul>
                </li>
				<!--li>
                    <a href="javascript: void(0);">
                        <i class="icon-shuffle"></i>
                        <span> Rate </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level nav collapse" aria-expanded="false" style="">
                        <li class="">
                            <a href="/dashboard/rate">Danh sách</a>
                        </li>
						<li class="">
                            <a href="/dashboard/rate/add">Thêm mới</a>
                        </li>
                    </ul>
                </li-->
                <li>
                    <a href="/dashboard/orders">
                        <i class="icon-bag"></i>
                        <span> Orders </span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="icon-people"></i>
                        <span> Users Ref</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level nav collapse" aria-expanded="false" style="">
                        <li class="">
                            <a href="/dashboard/referral">List All</a>
                        </li>
                        <li class="">
						    <a href="/dashboard/referral/transfer">List stransfer</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="icon-user-following"></i>
                        <span> Users KYC</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level nav collapse" aria-expanded="false" style="">
                        <li class="">
                            <a href="/dashboard/kyc">List All</a>
                        </li>
                        <li class="">
						    <a href="/dashboard/kyc/transfer">List stransfer</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="/dashboard/users">
                        <i class="ti-user"></i>
                        <span> Users </span>
                    </a>
                </li>
                <li>
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
                        <!--li>
                            <a href="/dashboard/smartcontract/frozen">Đóng băng</a>
                        </li>
                        <li>
                            <a href="/dashboard/smartcontract/transaction">Transactions</a>
                        </li-->
                    </ul>
                </li>
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
                        <li>
                            <a href="/dashboard/config/ico">Cài đặt ICO</a>
                        </li>
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
</div><?php /**PATH /home/wallet_wta_finance/public_html/app/Modules/Dashboard/Views/inc/sidebar.blade.php ENDPATH**/ ?>