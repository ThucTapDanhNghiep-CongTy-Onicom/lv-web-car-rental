@extends('layouts.app')
@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/ui/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Register car owner Yotrip<i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">Register car owner Yotrip</h1>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section testimony-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-12 heading-section ftco-animate">
                <span class="subheading title-subheading">Register for rental on Yotrip now to increase attractive income!</span>
                <p class="md-4">
                    Hotline: 1900 9217 (T2-S7 9AM-9PM)
                    Or leave a message for Yotrip via <a href="https://www.facebook.com/mioto.vn">Fanpage</a>
                    Mioto does not charge you when you register your vehicle. We only charge the operating
                    fee when there is
                    a transaction.<br>
                <div class="flex-center">
                    <h4>
                        FORM SIGN UP </h4>
                </div>

                <div class="form-regis-owner">
                    <form action="">
                        <div class="form-group">
                            <div class="form-groups">
                                <input type="text" placeholder="Car registration consultation now" class="form-control text-center">
                            </div>
                            <div class="form-groups">
                                <input type="text" placeholder="Please fill in the information completely and accurately so that Mioto can contact you as soon as possible" class="form-control text-center">
                            </div>
                            <div class="form-groups">
                                <input type="text" placeholder="Active City Yotrip" class="form-control text-center">
                            </div>
                            <div class="d-flex">
                                <input type="text" placeholder="First and last name" class="form-control text-center">
                                <input type="text" placeholder="Mobile number" class="form-control text-center">
                            </div>
                            <div class="form-groups">
                                <input type="text" placeholder="Email address" class="form-control text-center">
                            </div>
                            <div class="form-groups">
                                <input type="text" placeholder="Car rental registration" class="form-control text-center">
                            </div>
                            <div class="form-groups">
                                <input type="text" placeholder="Rental service" class="form-control text-center">
                            </div>
                            <div class="form-groups">
                                <input type="text" placeholder="Do you have a car rental experience?" class="form-control text-center">
                            </div>
                            <div class="d-flex">
                                <input type="text" placeholder="Used to" class="form-control text-center">
                                <input type="text" placeholder="Not yet" class="form-control text-center">
                            </div>
                        </div>
                    </form>
                </div>
                <p>By continuing, I agree Yotrip is allowed to collect,
                    use and disclose the information provided by me in accordance with Yotrip's
                    <a href="https://www.mioto.vn/regu">Operating Regulations</a> that I have
                    read and
                    understood.
                </p>


                <b>Register for rental on Yotrip in 3 steps</b> <br>
                <b>Step 1 :</b> <br>
                <b>Method 1:</b>Directly download the Yotrip application and register the car at "My car"
                <br>
                <b>Method 2:</b>Register full information so that Yotrip can help you register your car <br>
                <b>Step 2:</b>Yotrip staff will check the information, contact the car owner to advise on
                car rental procedures and processes <br>
                <b>Step 3:</b>Start renting on Yotrip as soon as you receive the approved vehicle
                notification from Yotrip<br>
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