@extends('layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('ui/css/profile.css') }}">
@endpush
@section('content')
    <section class="body">
        <div class="cover-profile new-profile"
            style="background-image: url('/backend/uploads/images/banners/5a258b3cb41d7a43230c.jpg')">
        </div>
        <div class="profile__sect">
            <div class="content-profile--new">
                <div class="desc-profile desc-account">
                    <div class="avatar-box">
                        <div class="avatar avatar--xl has-edit">
                            @if ($user->social_type == 'google' || $user->social_type == 'facebook')
                                <div class="avatar-img" style="background-image: url({{ $user->photo }}"></div>
                            @elseif (empty($user->photo))
                                <div class="avatar-img"
                                    style="background-image: url(https://n1-cstg.mioto.vn/m/avatars/t.jpg);"></div>
                            @else
                                <div class="avatar-img" style="background-image: url({{ $user['photo'] }});"  data-target="#dialog1"></div>
                            @endif

                        </div>
                    </div>
                    <div class="snippet">
                        <div class="profile-info">
                            <div class="item-content">
                                <div class="item-title">
                                    <p>{{ $user['name'] }}</p>
                                    <a href="#" class="func-edit" title="update">
                                        <i class="ic ic-edit"></i>
                                    </a>
                                </div>
                                <div class="d-flex">
                                    @if (empty($user->created_at))
                                        <span class="join">Tham gia: 01/01/1970</span>
                                    @else
                                        <span class="join">Tham gia:
                                            {{ date_format($user->created_at, 'd/m/Y') }}</span>
                                    @endif

                                    <div class="bar-line"></div>
                                    <span class="sum-trips">Chưa có chuyến</span>
                                </div>
                            </div>
                            <div class="item-points">
                                <svg class="icsvg icsvg-mipoint" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle r="11" transform="matrix(-1 0 0 1 11 11)" fill="#E85626"></circle>
                                    <path
                                        d="M10.022 5.51l-.947 2.738c-.128.37-.496.62-.91.62H5.101c-.928 0-1.313 1.115-.563 1.627l2.48 1.692a.87.87 0 01.347 1.005l-.947 2.738c-.286.828.722 1.517 1.472 1.005l2.48-1.692c.335-.229.79-.229 1.125 0l2.479 1.692c.75.512 1.759-.176 1.472-1.005l-.947-2.738a.87.87 0 01.348-1.005l2.479-1.692c.75-.512.365-1.626-.562-1.626h-3.065c-.415 0-.782-.251-.91-.621l-.947-2.738c-.287-.828-1.534-.828-1.82 0z"
                                        fill="#fff"></path>
                                </svg>
                                @if ($total)
                                    <span>{{ $total }} điểm</span>
                                @else
                                    <span>0 điểm</span>
                                @endif
                                <div class="tooltips">
                                    <i class="fa fa-question-circle" aria-hidden="true"></i>
                                    <div class="tooltip-text">
                                        Điểm thưởng dùng để đổi quà trong mục Quà tặng
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="line-info">
                            <div class="d-flex">
                                <div class="info">
                                    <span class="label">Ngày sinh</span>
                                    @if (empty($user->birthday))
                                        <span class="ctn">01/01/1970</span>
                                    @else
                                        <span
                                            class="ctn">{{ date('d/m/Y', strtotime($user->birthday)) }}</span>
                                    @endif
                                </div>
                                <div class="info">
                                    <span class="label">Giới tính</span>
                                    @if (empty($user->gender))
                                        <span class="ctn">Nam</span>
                                    @else
                                        <span class="ctn">{{ $user->gender }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="desc-profile">
                    <div class="information information--acc">
                        <div class="inside">
                            <ul>
                                <li>
                                    <span class="label">Điện thoại</span>
                                    <span class="ctn">
                                        @if (empty($user->phone))
                                            <span></span>
                                        @else
                                            <span>{{ $user->phone }}</span>
                                        @endif
                                        <a class="func-edit" title="Edit">
                                            <i class="ic ic-edit"></i>
                                        </a>
                                    </span>
                                </li>
                                <li>
                                    <span class="label">GPLX</span>
                                    <span class="ctn">
                                        <span><i class="ic ic-error"></i></span>
                                        <a class="verify btn btn--s prevent-click">Chưa xác thực GPLX</a>
                                        <a class="func-edit" title="Edit">
                                            <i class="ic ic-edit"></i>
                                        </a>
                                    </span>
                                </li>
                                <li>
                                    <span class="label">Email</span>
                                    <span class="ctn">
                                        <span>
                                            @if ($user->status == 'active')
                                                <i class="ic ic-verify"></i>
                                            @else
                                                <i class="ic ic-error"></i>
                                            @endif
                                            {{ $user->email }}
                                        </span>
                                        <a class="func-edit" title="Edit">
                                            <i class="ic ic-edit"></i>
                                        </a>
                                    </span>
                                </li>
                                <li>
                                    <span class="label">Facebook</span>
                                    <span class="ctn">
                                        <span>
                                            @if ($user->social_type == 'facebook')
                                                {{ $user->name }}
                                            @endif
                                            <span>
                                                <a class="func-edit">
                                                    <i class="ic ic-remove"></i>
                                                </a>
                                            </span>
                                        </span>
                                    </span>
                                </li>
                                <li>
                                    <span class="label">Google</span>
                                    <span class="ctn">
                                        <span>
                                            @if ($user->social_type == 'google')
                                                {{ $user->name }}
                                            @endif
                                            <span>
                                                <a class="func-edit">
                                                    <i class="ic ic-remove"></i>
                                                </a>
                                            </span>
                                        </span>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="profile__wrap">
                <div class="review__sect">
                    <div class="review-container"></div>
                </div>
            </div>
          
    </section>
   
    @include('partials.footer')
   
@endsection


