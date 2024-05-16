@extends('layouts.app')
@section('content')
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/ui/images/bg_3.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Payment Guide<i
                                class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread">Payment Guide</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section testimony-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-12 heading-section ftco-animate">
                    <span class="subheading">
                        Payment Guide</span>
                    <ol>
                        <li>
                            <p class="md-4">
                                To complete the booking process, you need to pay a deposit of 30% of the trip value in one
                                of
                                the
                                following forms: <br>
                                <a href="https://www.mioto.vn/paymenthowto#cardMethod">Pay with my card</a> <br>
                                <a href="https://www.mioto.vn/paymenthowto#cardMethod">Direct payment - E-wallet</a> <br>
                                <a href="https://www.mioto.vn/paymenthowto#cardMethod">Payment via ATM card registered for
                                    online
                                    payment</a> <br>
                                <a href="https://www.mioto.vn/paymenthowto#cardMethod">Payment by bank transfer</a> <br>
                                <a href="https://www.mioto.vn/paymenthowto#cardMethod">Pay in cash at a convenience store
                                    near
                                    your home
                                    (Payoo is accepted)</a> <br>
                                Currently, in case many customers book a car at the same time, the system will prioritize
                                customers to
                                pay early, so please make a deposit as soon as possible. <br>
                                WEB APP 
                               
                            </p>
                        </li>
                        <li>
                            <b>Pay with my card</b> <br>
                            You need a Visa credit, Master credit card to pay with this method. The steps are quite
                            simple:
                            Select the credit card you added at My Card or Add card to pay <br>
                            
                        </li>
                        <li>
                            <b>Direct payment - E-wallet</b> <br>
                            You need an account in one of the two e-wallets below to pay with this method. The steps are
                            quite
                            simple:
                            Choose 1 of 2 e-wallets ViettelPay or Momo - Click pay to go to the e-wallet - Enter the
                            account
                            information or scan the payment code. <br>
                            
                        </li>
                        <li>
                            <b>Payment via credit/debit card VISA, Master</b> <br>
                            You need a Visa, Master card to pay with this form. The steps are quite simple:
                            Choose 1 of 2 payment gateways Payoo or VTC Pay - Click pay to go to the payment gateway -
                            Enter
                            the
                            information on the card and complete the payment process. <br>
                            
                        </li>
                        <li>
                            <b>Payment via ATM card registered for online payment</b> <br>
                            Your card must be registered with your bank for an online payment service to make a payment
                            with
                            this
                            method.
                            Choose 1 of 2 payment gateways Payoo or VTC Pay - Click pay to go to the payment gateway -
                            Enter
                            the
                            information on the card and complete the payment process. <br>
                           
                        </li>
                        <li>
                            <b>Pay in cash at a convenience store near your home (Payoo is accepted)</b> <br>
                            First, you need to get the payoo payment code by clicking "Reservation". After that, you
                            just
                            need to
                            take a picture of the code and bring it to a convenience store (payoo is accepted - please
                            see
                            the
                            attached link to see the nearest locations) and proceed to pay. <br>
                            
                        </li>
                        <li>
                            <b>Payment by bank transfer</b> <br>
                            First, you need to click "Reservation" to confirm the form of transfer payment. Then,
                            proceed to
                            transfer via Yotrip's bank account as soon as possible.
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
