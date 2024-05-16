@extends('layouts.app')
@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/ui/images/bg_3.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home <i
                                class="ion-ios-arrow-forward"></i></a></span> <span>Services <i
                            class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">Our Services</h1>
            </div>
        </div>
    </div>
</section>
<!-- Our last services Start-->
@include('partials.server')
<!-- Our last services End-->


<!--  -->
<section class="ftco-section ftco-intro" style="background-image: url(/ui/images/bg_3.jpg);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-md-6 heading-section heading-section-white ftco-animate">
                <h2 class="mb-3">Do You Want To Earn With Us? So Don't Be Late.</h2>
                <a href="{{route('user.register')}}" class="btn btn-secondary btn-lg">Become A Driver</a>
            </div>
        </div>
    </div>
</section>
<!-- Footer -->
@include('partials.footer')

@endsection