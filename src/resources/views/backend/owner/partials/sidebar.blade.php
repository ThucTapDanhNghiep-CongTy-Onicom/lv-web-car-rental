<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="dropdown header-profile">
                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                    @php
                        $res_users = Auth::user();
                    @endphp
                    @if($res_users)
                    <img src="{{$res_users->photo}}" width="20" alt=""/>
                    <div class="header-info ms-3">
                        <span class="font-w600 ">Hi,<b>{{$res_users->name}}</b></span>
                        <small class="text-end font-w400">{{$res_users->email}}</small>
                    </div>
                    @else
                    <img src="{{asset('public/backend/owner/images/ion/man (1).png')}}" width="20" alt=""/>
                    <div class="header-info ms-3">
                        <span class="font-w600 ">Hi,<b>AC</b></span>
                        <small class="text-end font-w400">xyz@gmail.com</small>
                    </div>
                    @endif
                </a>
                
            </li>
            <li><a href="{{url('/vn/bang-dieu-khien')}}" aria-expanded="false">
                    <i class="flaticon-025-dashboard"></i>
                    <span class="nav-text">Bảng điều khiển</span>
                </a>
            </li>
            <li>
                <a href="{{route('index')}}" aria-expanded="false">
                    <i class="flaticon-022-copy"></i>
                    <span class="nav-text">Đăng xe</span>
                </a>
            </li>
            <li>
                <a href="{{route('renders.index')}}" aria-expanded="false">
                    <i class="flaticon-013-checkmark"></i>
                    <span class="nav-text">Hãng xe</span>
                </a>
            </li>
            <li>
                <a href="javascript: void(0);" aria-expanded="false">
                    <i class="flaticon-053-lifebuoy"></i>
                    <span class="nav-text">Đơn đặt</span>
                </a>
            </li>
            {{-- <li>
                <a href="{{route('place.index')}}" aria-expanded="false">
                    <i class="flaticon-007-bulleye"></i>
                    <span class="nav-text">Khu vực</span>
                </a>
            </li> --}}
            <li>
                <a href="javascript: void(0);" aria-expanded="false">
                    <i class="fa fa-comments"></i>
                    <span class="nav-text">Bình luận</span>
                </a>
            </li>
            <li>
                <a href="{{route('review.index')}}" aria-expanded="false">
                    <i class="flaticon-086-star"></i>
                    <span class="nav-text">Đánh giá</span>
                </a>
            </li>
        </ul>
    </div>
</div>