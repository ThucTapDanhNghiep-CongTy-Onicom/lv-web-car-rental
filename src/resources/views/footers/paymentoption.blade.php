@extends('layouts.app')
@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/ui/images/bg_3.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home <i
                                class="ion-ios-arrow-forward"></i></a></span> <span>Payment Policy <i
                            class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">Payment Policy</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-about">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center"
                style="background-image: url(/ui/images/about.jpg);">
            </div>
            <div class="col-md-6 wrap-about ftco-animate">
                <div class="heading-section heading-section-white pl-md-5">
                    <h2 class="mb-4">Payment Policy</h2>

                    <p>After receiving the car rental consent from the owner, at the last step, you need to make a
                        deposit for Yotrip 30% of the total trip cost. You can choose to make a transfer payment via
                        online bank or use a Visa card.
                    </p>
                    <p>The remaining 70% you can pay directly to the car owner as soon as you receive the car.</p>
                    <p><a href="{{route('car')}}" class="btn btn-light py-3 px-4">Search Vehicle</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-intro" style="background: url(/ui/images/bg_2.jpg) center;">
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


<section class="ftco-section testimony-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Testimonial</span>
                <h2 class="mb-3">Happy Clients</h2>
            </div>
        </div>
        <div class="row ftco-animate">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel ftco-owl">
                    <div class="item">
                        <div class="testimony-wrap rounded text-center py-4 pb-5">
                            <div class="user-img mb-2" style="background-image: url(/ui/images/person_1.jpg)">
                            </div>
                            <div class="text pt-4">
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia
                                    and Consonantia, there live the blind texts.</p>
                                <p class="name">Roger Scott</p>
                                <span class="position">Marketing Manager</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap rounded text-center py-4 pb-5">
                            <div class="user-img mb-2" style="background-image: url(/ui/images/person_2.jpg)">
                            </div>
                            <div class="text pt-4">
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia
                                    and Consonantia, there live the blind texts.</p>
                                <p class="name">Roger Scott</p>
                                <span class="position">Interface Designer</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap rounded text-center py-4 pb-5">
                            <div class="user-img mb-2" style="background-image: url(/ui/images/person_3.jpg)">
                            </div>
                            <div class="text pt-4">
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia
                                    and Consonantia, there live the blind texts.</p>
                                <p class="name">Roger Scott</p>
                                <span class="position">UI Designer</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap rounded text-center py-4 pb-5">
                            <div class="user-img mb-2" style="background-image: url(/ui/images/person_1.jpg)">
                            </div>
                            <div class="text pt-4">
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia
                                    and Consonantia, there live the blind texts.</p>
                                <p class="name">Roger Scott</p>
                                <span class="position">Web Developer</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap rounded text-center py-4 pb-5">
                            <div class="user-img mb-2" style="background-image: url(/ui/images/person_1.jpg)">
                            </div>
                            <div class="text pt-4">
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia
                                    and Consonantia, there live the blind texts.</p>
                                <p class="name">Roger Scott</p>
                                <span class="position">System Analyst</span>
                            </div>
                        </div>
                    </div>
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