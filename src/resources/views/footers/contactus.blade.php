@extends('layouts.app')
@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/ui/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contact Us <i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">Contact Us</h1>
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
                    <span class="subheading">Contact Us</span>
                    <h2 class="mb-4">Complaint settlement process</h2>

                    <p>The Company and the Vehicle Owner are responsible for receiving complaints and supporting the
                        Customer regarding the transactions connected through the Exchange.</p>
                    <p>Complaints related to the provision and use of car rental services on the Exchange are
                        independently resolved by the Company on the basis of the provisions of the law, Terms and
                        Conditions of Service, and notices and regulations announced to Members (Customers and Owners).
                        When a dispute arises, the Company promotes the solution of negotiation and conciliation between
                        the parties in order to maintain the confidence of the Member in the service quality of the
                        Exchange. Customers can follow these steps: </p>
                    <p><a href="{{route('car')}}" class="btn btn-light py-3 px-4">Search Vehicle</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section testimony-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <h2>Complaint settlement process</h2>
            </div>
        </div>
        <div class="term_condition">
            <div class="group_condition">
                <!-- <div class="title">
                    SCOPE OF USE OF INFORMATION
                </div> -->
                <div class="sub_content">
                    <ul class="list_decimal">
                        <li>Customers complain about the service via phone number 1900 9217 or email Customer Care Department at support@yotrip.vn. Time for the Company to receive complaints is 3 days from the date of using the service or from the date of the incident.</li>
                        <div class="w-100 p-3"></div>
                        <li>Within (3) working days from the date of receipt of the Customer's complaint information, the Customer Care Department will confirm the complaint information, classify the information and notify the Customer:
                            <div class="w-100 p-2"></div>
                            <ul class="list_circle">
                                <li>Record inquiries and complaints related to the Company and within the time limit for complaints.</li>
                                <li>Reject requests, complaints unrelated to the Company and the expiration of the time limit for complaints.
                                </li>
                            </ul>
                            <div class="w-100 p-3"></div>
                        </li>
                        <li>Problem solving: The Customer Care Department will verify, verify and analyze the nature and extent of the complaint, the scope of the complaint and the handling responsibility to coordinate with the Vehicle Owner and the third service provider. 3 provide specific measures to assist the Customer in resolving such dispute:
                            <div class="w-100 p-2"></div>
                            <ul class="list_circle">
                                <li>Transfer the issues directly related to the Company for the relevant Departments to check and compare.</li>
                                <li>Transfer relevant issues to the Vehicle Owner for resolution.
                                </li>
                            </ul>
                            <div class="w-100 p-3"></div>
                        </li>
                        <li>Close the complaint:
                            <div class="w-100 p-2"></div>
                            <ul class="list_circle">
                                <li>Customer agrees to Customer Care responses -> Complaint closure. Customer does not agree -> Go back to step 3.</li>
                                <li>Follow up the complaint settlement of the Car Owner -> End the complaint when the Customer and the Car Owner have reached an agreement.
                                </li>
                            </ul>
                            <div class="w-100 p-3"></div>
                        </li>
                        When receiving a notice of handling measures from the Vehicle Owner but the Customer does not agree, the Company will preside over the negotiation and conciliation between the Customer and the Vehicle Owner to come to a settlement that is suitable for both parties. . In case the Customer and the Vehicle Owner do not come to a mutual agreement or the Customer does not agree with the final solutions of the Owner and/or is beyond the ability and authority of the Company, the Customer or the Owner may ask the competent State agency to intervene and settle according to the law to ensure the legitimate interests of the parties.
                        <div class="w-100 p-3"></div>
                        The company respects and strictly implements the provisions of the Law on Protection of the rights of users. The Company recommends that Customers and Owners provide accurate, honest and detailed personal information and service-related postings. We also suggest that Car Owners need to strictly comply with the provisions of the Law, as well as have appropriate behaviors towards Customers. All acts of fraud, fraud in business, causing harm to others are condemned and must be fully responsible before the law. The parties including the Customer and the Vehicle Owner will have an active responsibility in resolving the complaint. The vehicle owner needs to be responsible for proactively handling and providing documents certifying information related to the complaint or dispute with the Customer. The Company only plays the role of supporting and coordinating the negotiation, conciliation and settlement of complaints between the Customer and the Vehicle Owner. The Company is also responsible for providing information related to the Customer and the Vehicle Owner if requested by the Owner or Customer or a competent Legal Authority.
                        <div class="w-100 p-3"></div>
                        After the Customer and the Vehicle Owner have resolved the dispute, it is necessary to report back to the Company to update the situation. In the event that the transaction arises in conflict and the fault belongs to the Vehicle Owner: The Company will apply corresponding violation handling measures including but not limited to: warning, account lock or transfer to the Legal Authority authority depending on the severity of the offence. The Company will terminate and remove all news articles about that Car Owner's products and services on the Trading Platform and at the same time request the Car Owner to adequately reimburse the Customer on the basis of an agreement with the Customer.
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