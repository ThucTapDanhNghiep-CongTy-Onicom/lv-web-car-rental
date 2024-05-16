@extends('layouts.app')
@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/ui/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Booking Tips <i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">Booking Tips</h1>
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


<section class="ftco-section testimony-section bg-light">
    <div class="container">
        <!-- <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <h2>CAR OWNER</h2>
            </div>
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Login</span>
                <p class="mb-4">Sign in to Yotrip via Facebook, Google, your phone number, or email.
                </p>
                <span class="subheading">Vehicle Registration</span>
                <p class="mb-4">You just need to put information, descriptions, pictures of your car on the system.
                    Update your time, desired price and other requirements for tenants. Or you can register the owner
                    <a href="https://www.mioto.vn/owner/register">here</a>.
                </p>
                <span class="subheading">Browse Car</span>
                <p class="mb-4">You just need to wait for a few minutes, the system will censor whether or not your car
                    meets the rental requirements. Yotrip will actively contact you in case problems arise.
                </p>
                <span class="subheading">Get and Respond</span>
                <p class="mb-4">
                    When a customer submits a request for a rental car, you will receive a notification from Yotrip.
                    Check the guest's personal information and confirm the rental as soon as possible.
                </p>
                <p class="mb-4">
                    When there is a rental consent from you, the tenant will transfer the deposit to complete the
                    booking.
                </p>
                <span class="subheading">Car Handover</span>
                <p class="mb-4">You and the tenants contact each other to hand over the car.
                </p>
                <p class="mb-4"> Check your driver's license, relevant documents, and your deposit assets.
                </p>
                <p class="mb-4"> Check the car, sign the handover record and send your car keys to the trusted guest.
                </p>
                <span class="subheading">Get Car</span>
                <p class="mb-4">After the time is up, meet the tenant, check the car, sign the handover record and
                    receive your car as originally agreed.
                </p>
                <p class="mb-4">Don't forget to give tenants ratings and suggest them score you on the Yotrip app. This
                    will increase your credibility in the Yotrip self-driving car rental community.
                </p>
            </div>
        </div> -->
        <div class="row no-gutters mb-4">
            <div class="col-md-12 wrap-about ftco-animate">
                <div class="heading-section heading-section-dark text-center pl-md-5">
                    <h2 class="mb-4">Car Owner</h2>
                </div>
            </div>
        </div>
        <!-- Page How it work - timeline -->
        <div class="timeline">
            <div class="container_custom left">
                <div class="date"> <span>Step</span> 1</div>
                <i class="icon fa fa-user"></i>
                <div class="content">
                    <h2>Login</h2>
                    <p>
                        Sign in to Yotrip via Facebook, Google, your phone number, or email.
                    </p>
                </div>
            </div>
            <div class="container_custom right">
                <div class="date"> <span>Step</span> 2</div>
                <i class="icon fa fa-car"></i>
                <div class="content">
                    <h2>VEHICLE REGISTRATION</h2>
                    <p>
                        You just need to put information, descriptions, pictures of your car on the system. Update your time, desired price and other requirements for tenants. Or you can register the owner <a href="https://www.mioto.vn/owner/register">here</a>.
                    </p>
                </div>
            </div>
            <div class="container_custom left">
                <div class="date"> <span>Step</span> 3</div>
                <i class="icon fa fa-book"></i>
                <div class="content">
                    <h2>BROWSE CAR</h2>
                    <p>
                        You just need to wait for a few minutes, the system will censor whether or not your car meets the rental requirements. Yotrip will actively contact you in case problems arise.
                    </p>
                </div>
            </div>
            <div class="container_custom right">
                <div class="date"> <span>Step</span> 4</div>
                <i class="icon fa fa-money"></i>
                <div class="content">
                    <h2>GET AND RESPOND</h2>
                    <p>
                        When a customer submits a request for a rental car, you will receive a notification from Yotrip.
                        <span>Check the guest's personal information and confirm the rental as soon as possible.
                            When there is a rental consent from you, the tenant will transfer the deposit to complete the booking.</span>
                    </p>
                </div>
            </div>
            <div class="container_custom left">
                <div class="date"> <span>Step</span> 5</div>
                <i class="icon fa fa-cog"></i>
                <div class="content">
                    <h2>CAR HANDOVER</h2>
                    <p>
                        You and the tenants contact each other to hand over the car.
                        <span>Check your driver's license, relevant documents, and your deposit assets.
                        Check the car, sign the handover record and send your car keys to the trusted guest.</span>
                    </p>
                </div>
            </div>
            <div class="container_custom right">
                <div class="date"> <span>Step</span> 6</div>
                <i class="icon fa fa-certificate"></i>
                <div class="content">
                    <h2>GET CAR</h2>
                    <p>
                        After the time is up, meet the tenant, check the car, sign the handover record and receive your car as originally agreed.
                        <span>Don't forget to give tenants ratings and suggest them score you on the Yotrip app. This will increase your credibility in the Yotrip self-driving car rental community.</span>
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