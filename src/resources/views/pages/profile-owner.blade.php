@extends('layouts.app')
@section('content')

<section class="hero-wrap hero-wrap-4 js-fullheight" style="background-image: url('/ui/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters js-fullheight-4 align-items-end justify-content-center">
            <div class="profile-owner col-md-9 ftco-animate pb-5 text-center">
                <div class="flex-center transform-center">
                    <img src="{{asset('/ui/images/person_2.jpg')}}" alt="">
                    <div class="box-info">
                        <div class="name">Lam Dubai</div>
                        <div class="enjoy">Enjoy: 30/11/2019 <div class="line"></div> <strong>93 chuyến</strong></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="parent-owner-profile">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-12">
                <div class="info-left">
                    <div class="group-info">
                        <div class="word-left">Response rate</div>
                        <div class="word-right">0,2%</div>
                    </div>
                    <div class="group-info">
                        <div class="word-left">Response time</div>
                        <div class="word-right">0.4 tiếng</div>
                    </div>
                    <div class="group-info">
                        <div class="word-left">Agree rate</div>
                        <div class="word-right">0,2%</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-12">
                <div class="info-right">
                    <div class="group-check">
                        <div class="title">Phone number</div>
                        <div class="accuracy"><i class='bx bxs-message-alt-x'></i> Not linked yet</div>
                    </div>
                    <div class="group-check">
                        <div class="title">GPLX</div>
                        <div class="accuracy"><i class='bx bxs-message-alt-x'></i> Not linked yet</div>
                    </div>
                    <div class="group-check">
                        <div class="title">Email</div>
                        <div class="accuracy"><i class='bx bxs-message-alt-x'></i> Not linked yet</div>
                    </div>
                    <div class="group-check">
                        <div class="title">Facebook</div>
                        <div class="accuracy"><i class='bx bxs-message-alt-x'></i> Not linked yet</div>
                    </div>
                    <div class="group-check">
                        <div class="title">Google</div>
                        <div class="accuracy right"><i class='bx bxs-check-circle'></i> Linked yet</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Comment from owner -->
        <div class="comment-owner">
            <div class="top-comment">
                <div class="title">Reviews from car owners</div>
                <div class="rating">
                    <div class="wrapper" style="margin-top: 20px;">
                        <i class="ion-ios-star active"></i>
                        <i class="ion-ios-star active"></i>
                        <i class="ion-ios-star active"></i>
                        <i class="ion-ios-star"></i>
                        <i class="ion-ios-star"></i>
                    </div>
                    <div class="border-cmt"></div> 2 comment
                </div>
            </div>
            <div class="bottom-comment">
                <div class="row">
                    <div class="col-2">
                        <img src="{{asset('/ui/images/person_2.jpg')}}" alt="">
                    </div>
                    <div class="col-10" style="padding-right: 30px;">
                        <div class="name-cmt">Mr Hoa</div>
                        <div class="row">
                            <div class="col-6">
                                <div class="wrapper" style="margin-top: 20px;">
                                    <i class="ion-ios-star active"></i>
                                    <i class="ion-ios-star active"></i>
                                    <i class="ion-ios-star active"></i>
                                    <i class="ion-ios-star"></i>
                                    <i class="ion-ios-star"></i>
                                </div>
                            </div>
                            <div class="col-6 text-right" style="font-size: .7rem;color: #000;">
                                2 years ago
                            </div>
                        </div>
                        <div class="content-cmt">Very fun, thank you</div>
                        <div class="status">Self-driving</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Comment from user -->
        <div class="comment-owner">
            <div class="top-comment">
                <div class="title">Reviews from car user</div>
                <div class="rating">
                    <div class="wrapper" style="margin-top: 20px;">
                        <i class="ion-ios-star active"></i>
                        <i class="ion-ios-star active"></i>
                        <i class="ion-ios-star active"></i>
                        <i class="ion-ios-star"></i>
                        <i class="ion-ios-star"></i>
                    </div>
                    <div class="border-cmt"></div> 99 comments
                </div>
            </div>
            <div class="bottom-comment">
                <div class="row">
                    <div class="col-2">
                        <img src="{{asset('/ui/images/person_1.jpg')}}" alt="">
                    </div>
                    <div class="col-10" style="padding-right: 30px;">
                        <div class="name-cmt">Mr Hoa</div>
                        <div class="row">
                            <div class="col-6">
                                <div class="wrapper" style="margin-top: 20px;">
                                    <i class="ion-ios-star active"></i>
                                    <i class="ion-ios-star active"></i>
                                    <i class="ion-ios-star active"></i>
                                    <i class="ion-ios-star"></i>
                                    <i class="ion-ios-star"></i>
                                </div>
                            </div>
                            <div class="col-6 text-right" style="font-size: .7rem;color: #000;">
                                2 years ago
                            </div>
                        </div>
                        <div class="content-cmt">Very fun, thank you</div>
                        <div class="status">Self-driving</div>
                    </div>
                </div>
            </div>
            <div class="bottom-comment">
                <div class="row">
                    <div class="col-2">
                        <img src="{{asset('/ui/images/person_2.jpg')}}" alt="">
                    </div>
                    <div class="col-10" style="padding-right: 30px;">
                        <div class="name-cmt">Mr Hoa</div>
                        <div class="row">
                            <div class="col-6">
                                <div class="wrapper" style="margin-top: 20px;">
                                    <i class="ion-ios-star active"></i>
                                    <i class="ion-ios-star active"></i>
                                    <i class="ion-ios-star active"></i>
                                    <i class="ion-ios-star"></i>
                                    <i class="ion-ios-star"></i>
                                </div>
                            </div>
                            <div class="col-6 text-right" style="font-size: .7rem;color: #000;">
                                2 years ago
                            </div>
                        </div>
                        <div class="content-cmt">Very fun, thank you</div>
                        <div class="status">Self-driving</div>
                    </div>
                </div>
            </div>
            <div class="bottom-comment">
                <div class="row">
                    <div class="col-2">
                        <img src="{{asset('/ui/images/person_2.jpg')}}" alt="">
                    </div>
                    <div class="col-10" style="padding-right: 30px;">
                        <div class="name-cmt">Mr Hoa</div>
                        <div class="row">
                            <div class="col-6">
                                <div class="wrapper" style="margin-top: 20px;">
                                    <i class="ion-ios-star active"></i>
                                    <i class="ion-ios-star active"></i>
                                    <i class="ion-ios-star active"></i>
                                    <i class="ion-ios-star"></i>
                                    <i class="ion-ios-star"></i>
                                </div>
                            </div>
                            <div class="col-6 text-right" style="font-size: .7rem;color: #000;">
                                2 years ago
                            </div>
                        </div>
                        <div class="content-cmt">Very fun, thank you</div>
                        <div class="status">Self-driving</div>
                    </div>
                </div>
            </div>
            <div class="bottom-comment">
                <div class="row">
                    <div class="col-2">
                        <img src="{{asset('/ui/images/person_2.jpg')}}" alt="">
                    </div>
                    <div class="col-10" style="padding-right: 30px;">
                        <div class="name-cmt">Mr Hoa</div>
                        <div class="row">
                            <div class="col-6">
                                <div class="wrapper" style="margin-top: 20px;">
                                    <i class="ion-ios-star active"></i>
                                    <i class="ion-ios-star active"></i>
                                    <i class="ion-ios-star active"></i>
                                    <i class="ion-ios-star"></i>
                                    <i class="ion-ios-star"></i>
                                </div>
                            </div>
                            <div class="col-6 text-right" style="font-size: .7rem;color: #000;">
                                2 years ago
                            </div>
                        </div>
                        <div class="content-cmt">Very fun, thank you</div>
                        <div class="status">Self-driving</div>
                    </div>
                </div>
            </div>
            <!-- Button load more -->
            <div class="btn-loadmore">
                <div class="content">
                    Load more <i class='bx bx-chevron-up'></i>
                </div>
            </div>
        </div>
        <!-- Car of owner -->
        <div class="comment-owner">
            <div class="top-comment mb-4">
                <div class="title">Cars of Lam Dubai (4 cars)</div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="carousel-car owl-carousel">
                        <div class="item">
                            <div class="car-wrap rounded ftco-animate">
                                <div class="img rounded d-flex align-items-end" style="background-image: url('/ui/images/car-7.jpg');">
                                </div>
                                <div class="text">
                                    <h2 class="mb-0"><a href="">VINFAST FADIL 2020</a></h2>
                                    <div class="d-flex mb-3">
                                        <span class="cat">VINFAST</span>
                                        <p class="price ml-auto">600.000 VNĐ<span>/day</span></p>
                                    </div>
                                    <div class="d-flex">
                                        <div class="wrapper w-50" style="margin-top: 0px;">
                                            <i class="ion-ios-star active"></i>
                                            <i class="ion-ios-star active"></i>
                                            <i class="ion-ios-star active"></i>
                                            <i class="ion-ios-star"></i>
                                            <i class="ion-ios-star"></i>
                                        </div>
                                        <div class="w-50" style="display: flex;justify-content: end;transform:translateY(-10px)">
                                            01 chuyến đi
                                        </div>
                                    </div>
                                    <div class="location">
                                        <div class=located>
                                            <i class="fa fa-map-marker" aria-hidden="true"></i> Quận Thủ Đức, Hồ Chí Minh
                                        </div>
                                    </div>
                                    <p class="d-flex mb-0 d-block"><a href="" class="btn btn-orange py-2 mr-1">Rent
                                            now</a> <a href="" class="btn btn-gray py-2 ml-1">Details</a></p>
                                    <div class="regis-partner-car" style="margin-top: 10px;padding-bottom: 10px;">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="car-wrap rounded ftco-animate">
                                <div class="img rounded d-flex align-items-end" style="background-image: url('/ui/images/car-6.jpg');">
                                </div>
                                <div class="text">
                                    <h2 class="mb-0"><a href="">VINFAST FADIL 2020</a></h2>
                                    <div class="d-flex mb-3">
                                        <span class="cat">VINFAST</span>
                                        <p class="price ml-auto">600.000 VNĐ<span>/day</span></p>
                                    </div>
                                    <div class="d-flex">
                                        <div class="wrapper w-50" style="margin-top: 0px;">
                                            <i class="ion-ios-star active"></i>
                                            <i class="ion-ios-star active"></i>
                                            <i class="ion-ios-star active"></i>
                                            <i class="ion-ios-star"></i>
                                            <i class="ion-ios-star"></i>
                                        </div>
                                        <div class="w-50" style="display: flex;justify-content: end;transform:translateY(-10px)">
                                            01 chuyến đi
                                        </div>
                                    </div>
                                    <div class="location">
                                        <div class=located>
                                            <i class="fa fa-map-marker" aria-hidden="true"></i> Quận Thủ Đức, Hồ Chí Minh
                                        </div>
                                    </div>
                                    <p class="d-flex mb-0 d-block"><a href="" class="btn btn-orange py-2 mr-1">Rent
                                            now</a> <a href="" class="btn btn-gray py-2 ml-1">Details</a></p>
                                    <div class="regis-partner-car" style="margin-top: 10px;padding-bottom: 10px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="car-wrap rounded ftco-animate">
                                <div class="img rounded d-flex align-items-end" style="background-image: url('/ui/images/car-2.jpg');">
                                </div>
                                <div class="text">
                                    <h2 class="mb-0"><a href="">VINFAST FADIL 2020</a></h2>
                                    <div class="d-flex mb-3">
                                        <span class="cat">VINFAST</span>
                                        <p class="price ml-auto">600.000 VNĐ<span>/day</span></p>
                                    </div>
                                    <div class="d-flex">
                                        <div class="wrapper w-50" style="margin-top: 0px;">
                                            <i class="ion-ios-star active"></i>
                                            <i class="ion-ios-star active"></i>
                                            <i class="ion-ios-star active"></i>
                                            <i class="ion-ios-star"></i>
                                            <i class="ion-ios-star"></i>
                                        </div>
                                        <div class="w-50" style="display: flex;justify-content: end;transform:translateY(-10px)">
                                            01 chuyến đi
                                        </div>
                                    </div>
                                    <div class="location">
                                        <div class=located>
                                            <i class="fa fa-map-marker" aria-hidden="true"></i> Quận Thủ Đức, Hồ Chí Minh
                                        </div>
                                    </div>
                                    <p class="d-flex mb-0 d-block"><a href="" class="btn btn-orange py-2 mr-1">Rent
                                            now</a> <a href="" class="btn btn-gray py-2 ml-1">Details</a></p>
                                    <div class="regis-partner-car" style="margin-top: 10px;padding-bottom: 10px;">
 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="car-wrap rounded ftco-animate">
                                <div class="img rounded d-flex align-items-end" style="background-image: url('/ui/images/car-4.jpg');">
                                </div>
                                <div class="text">
                                    <h2 class="mb-0"><a href="">VINFAST FADIL 2020</a></h2>
                                    <div class="d-flex mb-3">
                                        <span class="cat">VINFAST</span>
                                        <p class="price ml-auto">600.000 VNĐ<span>/day</span></p>
                                    </div>
                                    <div class="d-flex">
                                        <div class="wrapper w-50" style="margin-top: 0px;">
                                            <i class="ion-ios-star active"></i>
                                            <i class="ion-ios-star active"></i>
                                            <i class="ion-ios-star active"></i>
                                            <i class="ion-ios-star"></i>
                                            <i class="ion-ios-star"></i>
                                        </div>
                                        <div class="w-50" style="display: flex;justify-content: end;transform:translateY(-10px)">
                                            01 chuyến đi
                                        </div>
                                    </div>
                                    <div class="location">
                                        <div class=located>
                                            <i class="fa fa-map-marker" aria-hidden="true"></i> Quận Thủ Đức, Hồ Chí Minh
                                        </div>
                                    </div>
                                    <p class="d-flex mb-0 d-block"><a href="" class="btn btn-orange py-2 mr-1">Rent
                                            now</a> <a href="" class="btn btn-gray py-2 ml-1">Details</a></p>
                                    <div class="regis-partner-car" style="margin-top: 10px;padding-bottom: 10px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .car-wrap .located {
        position: relative;
        font-size: .8125rem;
        top: -12px;
        bottom: 0;
        left: -2px;
        right: 0;
    }

    .car-wrap .located i {
        width: 20px;
        height: 20px;
        border: 1px solid;
        text-align: center;
        padding: 3px;
        margin-left: 1px;
        border-radius: 50px;
    }

    .car-wrap .located i:before {
        color: black;
    }

    /* tổng rate */
    .car-wrap .wrapper .active {
        color: #FFC107 !important;
        position: relative;
    }

    .car-wrap .wrapper {
        position: relative;
        bottom: 15px;
        left: 0;
        right: 0;
        display: inline-block;
        border: none;
        font-size: 18px;
        padding-top: -74px;
        margin-left: -2px;
    }
    .btn-loadmore .content i{
        transform: rotateX(180deg);
    }
</style>
<!-- Total Start -->
@include('partials.total')
<!-- Total Start -->

<!-- Footer -->
@include('partials.footer')

@endsection