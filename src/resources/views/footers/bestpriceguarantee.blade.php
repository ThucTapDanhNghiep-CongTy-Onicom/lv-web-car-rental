@extends('layouts.app')
@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/ui/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}"><lam data-i18n="breakscrum.home"></lam> <i class="ion-ios-arrow-forward"></i></a></span> <span><lam data-i18n="breakscrum.bestPrice"></lam><i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread" data-i18n="breakscrum.bestPrice"></h1>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section testimony-section bg-light">
    <div class="container">
        <div class="row no-gutters mb-4">
            <div class="col-md-12 wrap-about ftco-animate">
                <div class="heading-section heading-section-dark text-center">
                    <h2 class="mb-4" data-i18n="bestPrice.title"></h2>
                </div>
            </div>
        </div>
        <!-- Content of Term and Conditions -->
        <div class="term_condition">
            <div class="group_condition">
                <div class="title" data-i18n="bestPrice.hHire"></div>
                <div class="sub_content">
                    <ul>
                        <li><b data-i18n="bestPrice.h1s1"></b> <lam data-i18n="bestPrice.h1d1"></lam></li>
                        <li><b data-i18n="bestPrice.h1s2"></b> <lam data-i18n="bestPrice.h1d2"></lam></li>
                        <li><b data-i18n="bestPrice.h1s3"></b> <lam data-i18n="bestPrice.h1d3"></lam></li>
                        <li><b data-i18n="bestPrice.h1s4"></b> <lam data-i18n="bestPrice.h1d4"></lam></li>
                        <li><b data-i18n="bestPrice.h1s5"></b> <lam data-i18n="bestPrice.h1d5"></lam></li>
                        </li>
                        <li><b data-i18n="bestPrice.h1s6"></b>
                            <ul>
                                <li><b data-i18n="bestPrice.h1s6n1"></b> <lam data-i18n="bestPrice.h1s6d1"></lam></li>
                                <li><b data-i18n="bestPrice.h1s6n2"></b> <lam data-i18n="bestPrice.h1s6d2"></lam></li>
                                <li><b data-i18n="bestPrice.h1s6n3"></b> <lam data-i18n="bestPrice.h1s6d3"></lam></li>
                                <li><b data-i18n="bestPrice.h1s6n4"></b> <lam data-i18n="bestPrice.h1s6d4"></lam></li>
                                <li><b data-i18n="bestPrice.h1s6n5"></b> <lam data-i18n="bestPrice.h1s6d5"></lam></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="group_condition">
                <div class="title" data-i18n="bestPrice.hOwner"></div>
                <div class="sub_content">
                    <ul>
                        <li data-i18n="bestPrice.h2n1"></li>
                        <li data-i18n="bestPrice.h2n2"></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Total Start -->
@include('partials.total')
<!-- Total Start -->

<!-- Footer -->
@include('partials.footer')

@endsection