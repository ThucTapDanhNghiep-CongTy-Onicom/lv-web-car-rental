@extends('layouts.app')
@section('content')
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/ui/images/bg_3.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>General Guidance<i
                                class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread">General Guidance</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section testimony-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-12  heading-section ftco-animate">
                    <span class="subheading">
                        CAR RENTAL CUSTOMERS</span>
                    <ol>
                        <li>
                            <p class="md-4">
                                <b>Login</b> <br>
                                Log in to Yotrip via Facebook, Google, your phone number or email. We need you to verify
                                your phone
                                number before booking a car. <br>

                            </p>
                        </li>
                        <li>
                            <b>Find a Vehicle</b> <br>
                            You can find the car you want quickly at the place you want to find, the time, the car
                            company, and the
                            quick booking <br>

                        </li>
                        <li>
                            <b>Place a Car</b> <br>
                            Select the vehicle you like and send a Vehicle Request to the Owner. Then the car owner will
                            quickly
                            respond to you in the fastest time.
                            If you don't want to spend a lot of time waiting, you can choose another car with Quick
                            Booking feature
                            to book a car directly without feedback from the owner. <br>

                        </li>
                        <li>
                            <b> Deposit</b> <br>
                            After receiving the consent from the car owner, customers can deposit by 3 methods of
                            transfer, e-wallet
                            or cash. <br>

                        </li>
                        <li>
                            <b>Pick up the car</b> <br>
                            You and the car owner contact to meet to receive the car. At Yotrip, there are many car
                            owners willing
                            to bring their cars to your place.
                            Check the vehicle's condition and documents, present the original documents, sign the
                            delivery receipt,
                            get the keys and start your journey <br>

                        </li>
                        <li>
                            <b>Return the car</b> <br>
                            At the end of the rental period, you return the vehicle in its original condition and
                            agreement. Sign
                            the handover certificate, get the documents back to complete your wonderful trip.
                            Don't forget to give your rating and comments to the car owner to improve the service
                            quality for the
                            upcoming journeys! <br>
                        </li>
                    </ol>
                    <span class="subheading">
                        CAR OWNER</span>
                    <ol>
                        <li>
                            <p class="md-4">
                                <b>Login</b> <br>
                                Log in to Yotrip via Facebook, Google, your phone number or email. <br>

                            </p>
                        </li>
                        <li>
                            <b>Vehicle Registration</b> <br>
                            You just need to put your car information, description, pictures on the system. Update your
                            desired
                            times, rates, and other requirements for tenants. Or you can register your car owner here
                            <br>

                        </li>
                        <li>
                            <b>Browse Cars</b> <br>
                            You just need to wait for a few minutes, the system will check whether your car meets the
                            rental
                            requirements or not. Yotrip will proactively contact you in case any problems arise. <br>

                        </li>
                        <li>
                            <b>Receive And Feedback</b> <br>
                            When a customer sends a request to rent a car, you will receive a notification from Yotrip.
                            Check the
                            guest's personal information and confirm the rental as soon as possible.
                            Once you have the rental agreement from you, the tenant will transfer the deposit to
                            complete the car
                            reservation. <br>

                        </li>
                        <li>
                            <b>Car Handover</b> <br>
                            You and the tenant contact to meet to hand over the car.
                            Check the guest's driver's license, related documents and deposit property.
                            Inspect the car, sign the delivery note and give your car keys to a trusted customer. <br>

                        </li>
                        <li>
                            <b>Receive Car</b> <br>
                            After the rental period is over, meet the tenant, check the car, sign the handover record
                            and get your
                            car back as originally agreed.
                            Don't forget to rate your tenants and suggest them to you on the Yotrip app. This will
                            increase your
                            reputation in the Yotrip self-driving car rental community
                        </li>
                    </ol>
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
