@extends('layouts.app')
@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/ui/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Term And Conditions <i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">Term And Conditions</h1>
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
                    <h2 class="subheading">Responsibilities of car hires and car owners in self-driving car rental
                        transactions</h2><br>
                    <p>Yotrip's long-term aim is to build a civilized and prestigious car-sharing community in Vietnam.
                    </p>

                    <p>Therefore, in order to ensure that car hire transactions in the community are conducted smoothly
                        and successfully, it is important to regulate the responsibilities of the parties in compliance
                        with Yotrip's policies and the terms of commitment.</p>
                    <p><a href="{{route('car')}}" class="btn btn-light py-3 px-4">Search Vehicle</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section testimony-section bg-light">
    <div class="container">
        <div class="row no-gutters mb-4">
            <div class="col-md-12 wrap-about ftco-animate">
                <div class="heading-section heading-section-dark text-center">
                    <h2 class="mb-4">Term And Conditions</h2>
                </div>
            </div>
        </div>
        <!-- Content term and conditions -->
        <div class="term_condition">
            <div class="group_condition">
                <div class="title">
                    THE RESPONSIBILITY OF THE CAR OWNER
                </div>
                <div class="sub_content">
                    <ul>
                        <li>Deliver the car and all documents related to the vehicle on time and in a safe and clean state to ensure the quality of service.</li>
                        <li>The relevant vehicle documents include: vehicle registration paper (notarized photocopy), inspection paper, vehicle insurance paper (notarized or original photocopy).</li>
                        <li>Legal responsibility for the origin and ownership of the vehicle.</li>
                    </ul>
                </div>
            </div>
            <div class="group_condition">
                <div class="title">
                    CAR HIRE RESPONSIBILITIES
                </div>
                <div class="sub_content">
                    <ul>
                        <li>Check the car thoroughly before receiving and before returning the car. Sign a written record of handover of the vehicle status upon receipt and when returning.</li>
                        <li>Pay the car rental in full to the car owner when receiving the car.</li>
                        <li>Present all relevant documents to the vehicle owner: ID card, GPLX, Household Registration or KT3. Household registration/KT3 deposit, cash (VND 15 million or depending on the agreement with the vehicle owner) or equivalent assets (motorcycles and car parrots) before receiving the car.</li>
                        <li>Comply with the regulations and the time of return as agreed upon by the two parties.</li>
                        <li>Responsible for compensating for any losses in parts and accessories of the car, 100% compensation according to the genuine parts price if the part is found to be swapped, 100% of the cost of repairing the car if there is a damage depending on the extent of damage of the car, the cost of the car holidays cannot run due to the fault of the car tenant (the price is calculated by the rent in the car. contract) and vehicle cleaning charges if any.</li>
                    </ul>
                </div>
            </div>
            <div class="group_condition">
                <div class="title">
                YOTRIP'S RESPONSIBILITIES AND RECOMMENDATIONS
                </div>
                <div class="sub_content">
                    <ul>
                        <li>Yotrip recommends that car owners and car tenants should make written conclusions "Self-driving car rental contracts" as well as sign "Vehicle handover minutes" to ensure the rights of both parties in case of disputes.</li>
                        <li>Car owners can refer to yotrip's "Self-driving car lease contract" and "Car Handover Record" (please provide an email to Yotrip's customer service department to receive information).</li>
                        <li>Car owners and car tenants shall assume all civil and criminal liability if there is a dispute between the two parties if any. Yotrip only serves as a support to the two parties to settle matters in the best possible way, in accordance with the terms, policies and operating regulations both parties have committed to Yotrip.</li>
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