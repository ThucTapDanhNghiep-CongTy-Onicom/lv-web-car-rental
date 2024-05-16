<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@extends('layouts.app')
@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/ui/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Register agent Yotrip<i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">Register agent Yotrip</h1>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section testimony-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-12  heading-section ftco-animate">
                <span class="subheading">YOTRIP AGENT REGISTRATION</span>
                <span class="subheading">COOPERATE WITH YOTRIP TODAY TO INCREASE REVENUE !</span>
                <p class="md-4">
                    Are you a hotel owner, ticket office, travel service, online travel application, wedding
                    service, event
                    organization company?
                    Are you a business owner or self-employed individual?
                    As long as you have a customer who needs to rent a car (self-drive or with a driver, go
                    to the city or
                    intercity), Mioto welcomes you to COOPERATE with us to bring added value to customers
                    and increase
                    sales. collect for you.
                    Hotline:
                    Or leave information for Yotrip via email contact@yotrip.vn<br>
                <div class="flex-center m-4">
                    <h4>
                        FORM SIGN UP </h4>
                </div>

                <div class="form-regis-agent">
                    <form action="">
                        <div class="form-group">
                            <div class="form-groups">
                                <input type="text" placeholder="Business agent registration" class="form-control text-center">
                            </div>
                            <div class="form-groups">
                                <input type="text" placeholder="Please fill in the information completely and accurately so that Mioto can contact you as soon as possible" class="form-control text-center">
                            </div>
                            <div class="form-groups">
                                <input type="text" placeholder="City of business registration" class="form-control text-center">
                            </div>
                            <div class="d-flex">
                                <input type="text" placeholder="First and last name" class="form-control text-center">
                                <input type="text" placeholder="Mobile number" class="form-control text-center">
                            </div>
                            <div class="form-groups">
                                <input type="text" placeholder="Email address" class="form-control text-center">
                            </div>
                            <div class="form-groups">
                                <input type="text" placeholder="Please provide some information about your business unit so that Yotrip can recommend the most suitable solution" class="form-control text-center">
                            </div>
                            <div class="form-groups">
                                <input type="text" placeholder="Business type" class="form-control text-center">
                            </div>
                            <div class="form-groups">
                                <input type="text" placeholder="Website address" class="form-control text-center">
                            </div>
                        </div>
                    </form>
                </div>
                <p>By continuing, I agree Yotrip is allowed to collect,
                    use and disclose the information provided by me in accordance with Yotrip's <a href="https://www.mioto.vn/regu">Operating Regulations</a> that I have read
                    and
                    understood.</p>
                <br>

                <b>Why cooperate with us?</b> <br>
                1/ Diversity of car services: Full package of car rental services (4-7 seats) with
                self-drive and driver on
                request <br>
                2/ Easy management: Equipped with a quick online car booking support system. Control and
                make detailed
                revenue statistics <br>
                3/ Best price Best rental price from a system of >2000 cars in Ho Chi Minh City, Hanoi, Da
                Nang and big
                cities <br>
                4/ Attractive commission: No registration fee, no sales force. Increase revenue by 20-30%
                per existing
                customer
                </p>

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