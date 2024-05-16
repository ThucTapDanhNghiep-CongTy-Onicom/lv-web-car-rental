@extends('layouts.app')
@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/ui/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>How It Works <i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">How It Works </h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-about">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(/ui/images/about.jpg);">
            </div>
            <div class="col-md-6 wrap-about ftco-animate">
                <div class="heading-section heading-section-white pl-md-5">
                    <span class="subheading">About us</span>
                    <h2 class="mb-4">Welcome to Carbook</h2>

                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It
                        is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                    <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it
                        would have been rewritten a thousand times and everything that was left from its origin would be
                        the word "and" and the Little Blind Text should turn around and return to its own, safe country.
                        A small river named Duden flows by their place and supplies it with the necessary regelialia. It
                        is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                    <p><a href="{{route('car')}}" class="btn btn-light py-3 px-4">Search Vehicle</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <section class="ftco-section ftco-intro" style="background: url(/ui/images/bg_2.jpg) center;">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-md-6 heading-section heading-section-white ftco-animate">
                <h2 class="mb-3">Do You Want To Earn With Us? So Don't Be Late.</h2>
                <a href="{{route('user.register')}}" class="btn btn-secondary btn-lg">Become A Driver</a>
            </div>
        </div>
    </div>
</section> -->


<section class="ftco-section testimony-section bg-light">
    <div class="container">
        <div class="row no-gutters mb-4">
            <div class="col-md-12 wrap-about ftco-animate">
                <div class="heading-section heading-section-dark text-center pl-md-5">
                    <h2 class="mb-4">How to book a car with Yotrip</h2>
                </div>
            </div>
        </div>
        <!-- <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <h2>How to book a car with Yotrip</h2>
            </div>
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Login</span>
                <p class="mb-4">Sign in toYotrip via Facebook, Google, your phone number, or email. We need you to
                    authenticate your phone number before booking your car.
                </p>
                <span class="subheading">Find Car</span>
                <p class="mb-4">You can find your car quickly where you want to find, time, company, book a car quickly.
                </p>
                <span class="subheading">Book a Car</span>
                <p class="mb-4">Select the car you want and send a Request to the Owner. Then the owner of the car will
                    quickly respond to you in the fastest time.</p>
                <p class="mb-4">If you don't want to spend a lot of time waiting, you can choose another car with a
                    "Quick Booking" feature to book the car directly without the need for feedback from the owner.</p>
                <span class="subheading">Deposit</span>
                <p class="mb-4">After receiving consent from the car owner, customers can make a deposit in 3 forms of
                    transfer, e-wallet or cash.</p>

                <span class="subheading">Get a car</span>
                <p class="mb-4">You and the owner of the car meet to get the car. In Yotrip there are many car owners
                    who are willing to bring the car to your place.</p>
                <p class="mb-4">Check your status and vehicle documents, present the original documents, sign a vehicle
                    delivery record, pick up your keys, and start your journey.</p>
                <span class="subheading">Return the car</span>
                <p class="mb-4">After the lease period expires, you return the car in the same way as the original
                    status and agreement. Sign the handover minutes, get your papers back to complete your amazing
                    trip.</p>
                <p class="mb-4">Do not forget to give your ratings and comments to the car owner to improve the quality
                    of service for the upcoming journeys!</p>
            </div>
        </div> -->
        <!-- Page How it work - timeline -->
        <div class="timeline">
            <div class="container_custom left">
                <div class="date"> <span>Step</span> 1</div>
                <i class="icon fa fa-user"></i>
                <div class="content">
                    <h2>Login</h2>
                    <p>
                        Sign in toYotrip via Facebook, Google, your phone number, or email. We need you to authenticate your phone number before booking your car.
                    </p>
                </div>
            </div>
            <div class="container_custom right">
                <div class="date"> <span>Step</span> 2</div>
                <i class="icon fa fa-car"></i>
                <div class="content">
                    <h2>FIND CAR</h2>
                    <p>
                        You can find your car quickly where you want to find, time, company, book a car quickly.
                    </p>
                </div>
            </div>
            <div class="container_custom left">
                <div class="date"> <span>Step</span> 3</div>
                <i class="icon fa fa-book"></i>
                <div class="content">
                    <h2>BOOK A CAR</h2>
                    <p>
                        Select the car you want and send a Request to the Owner. Then the owner of the car will quickly respond to you in the fastest time.
                        <!-- Div span will hidden when move screen mobile -->
                        <span> If you don't want to spend a lot of time waiting, you can choose another car with a "Quick Booking" feature to book the car directly without the need for feedback from the owner.</span>
                    </p>
                </div>
            </div>
            <div class="container_custom right">
                <div class="date"> <span>Step</span> 4</div>
                <i class="icon fa fa-money"></i>
                <div class="content">
                    <h2>DEPOSIT</h2>
                    <p>
                        After receiving consent from the car owner, customers can make a deposit in 3 forms of transfer, e-wallet or cash.
                    </p>
                </div>
            </div>
            <div class="container_custom left">
                <div class="date"> <span>Step</span> 5</div>
                <i class="icon fa fa-cog"></i>
                <div class="content">
                    <h2>GET A CAR</h2>
                    <p>
                        You and the owner of the car meet to get the car. In Yotrip there are many car owners who are willing to bring the car to your place.
                        <!-- Div span will hidden when move screen mobile -->
                        <span>
                            Check your status and vehicle documents, present the original documents, sign a vehicle delivery record, pick up your keys, and start your journey.
                        </span>
                    </p>
                </div>
            </div>
            <div class="container_custom right">
                <div class="date"> <span>Step</span> 6</div>
                <i class="icon fa fa-certificate"></i>
                <div class="content">
                    <h2>RETURN THE CAR</h2>
                    <p>
                        After the lease period expires, you return the car in the same way as the original status and agreement. Sign the handover minutes, get your papers back to complete your amazing trip.
                    </p>
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