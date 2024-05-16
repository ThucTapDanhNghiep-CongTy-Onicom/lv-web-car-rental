@extends('layouts.app')
@section('content')
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/ui/images/bg_3.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Booking Instructions<i
                                class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread">Booking Instructions</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section testimony-section bg-light">
        <div class="container">

            <div class="row justify-content-center ">
                <div class="col-md-12 heading-section ftco-animate">
                    <span class="subheading">
                        Booking Instructions</span>
                </div>
                <ol>
                    <li>
                        <p class="md-4">
                            <b>Tenants</b> <br>
                            Submit a car rental request
                            Book a car through the app <br>

                        </p>
                    </li>
                    <li>
                        <b>Car owner</b> <br>
                        Approve "Car rental request"
                        App Approval <br>

                    </li>
                    <li>
                        <b>Tenants</b> <br>
                        Get a "Car Rental Request" Response
                        Receive Notifications via Apps & SMS <br>

                    </li>
                    <li>
                        <b>Tenants</b> <br>
                        Make a Deposit
                        Deposit 30% of the trip via the App <br>

                    </li>
                    <li>
                        <b>Owners and Tenants</b> <br>
                        <p>Completing the booking
                            Receive phone number information - Contact to verify the procedure</p>
                        <p>You can book a car online via Yotrip.vn website or Yotrip app through basic booking steps
                            Please <br> refer to the detailed information on each step of searching and booking a car as
                            follows: <br>

                    </li>
                    <li>
                        <b>Login or register an account </b> <br>
                        Please login with your existing account at Yotrip or log in via Facebook/Google. In case you
                        have not
                        registered for an account, you can choose the line "Register now" to create an account at
                        Yotrip.vn
                        Once done, you can click on the word "Create Account" to complete the process
                        WEB

                        APP

                    </li>
                    <li>
                        <b>Search for vehicles</b> <br>
                        You can find a car in 3 ways: <br>
                        a. Search by the address you enter in the search bar <br>
                        WEB <br>
                        APP <br>
                        b. Search by category of featured places <br>
                        WEB <br>
                        APP <br>
                        c. Search by category of featured cars that are highly rented on Yotrip <br>
                        WEB <br>
                        APP <br>

                    </li>
                    <li>
                        <b> Use the filter to search for the desired vehicle</b> <br>
                        a. Sorting: The system is defaulting to sorting the vehicles according to the optimal mode. You
                        can
                        choose to sort cars by low to high price, closest distance or vehicles with the highest rating.
                        <br>
                        b. Price: The system defaults to showing cars at all different prices. You can collapse the list
                        of
                        vehicles in the desired price range by moving the price bar. <br>
                        c. Vehicle type: The system is defaulting to display all 4-seater and 7-seater vehicles. You can
                        choose
                        to see only the list of 4-seater cars or the list of 7-seater cars by clicking on the
                        corresponding box.
                        <br>
                        d. Car make: The system is showing all cars of different brands by default. You can choose to
                        see only
                        the list of vehicles of a favorite company by clicking on the name of the car manufacturer.
                        WEB <br>
                        APP <br>
                        Advanced: Show advanced search features (number of seats on the vehicle, year of manufacture,
                        vehicles
                        that are in the "Home delivery" mode, or "Quick order" enabled (no owner required). approved
                        vehicle),
                        transmission (manual or automatic), fuel type (diesel or petrol) and many other advanced filter
                        conditions...) to easily find the right vehicle you want.
                        WEB <br>
                        APP <br>

                    </li>
                    <li>
                        <b>Select the desired vehicle and submit a rental request</b> <br>
                        a. Check vehicle information: Vehicle image, number of trips taken, reviews by tenants, vehicle
                        description and related features. <br>
                        WEB <br>
                        APP <br>
                        b. Check vehicle location: The system will localize coordinates on the map. The exact vehicle
                        address
                        will be displayed after the customer makes the deposit payment. <br>
                        WEB <br>
                        APP <br>
                        c. Check car rental document requirements and view vehicle owner information: <br>
                        1. Mandatory documents: To ensure safety, car owners need tenants to provide the original ID
                        card,
                        original driving license, household registration or original temporary residence book (KT3) in
                        Ho Chi
                        Minh City (if renting). Vehicles in Hanoi/Da Nang/Da Lat need HK/KT3 in the same locality). <br>
                        2. Terms of other car rental requirements: Owner's own policy on replacement documents in case
                        the
                        tenant does not have HK/KT3 (can be replaced with passport, company license, or ask a relative
                        to have
                        one). HK is in the name of the contract), property deposit when renting a car (motorcycle or
                        cash of
                        equivalent value).
                        Tenants note that when delivering the car, the car owners will keep the original HK/KT3 + the
                        deposit
                        property and will refund it after you return the car to its original condition.
                        In addition, please carefully check the required documents of the car owner to ensure that you
                        are
                        eligible to rent a car, to limit the cases of cancellation after depositing because the
                        documents are
                        not met.
                        In case you do not have all the required documents, please specify in the message to the vehicle
                        owner
                        or contact Yotrip's customer service department at 19009217 for flexible assistance in finding
                        suitable
                        vehicles. <br>
                        3. Car owner information: This section will show the rating for the car owner, the comment of
                        the tenant
                        and the response time of the car owner to the car rental request...
                        You can prioritize choosing car owners with high ratings, quick response times, and many
                        positive
                        comments from tenants. <br>
                        WEB <br>
                        APP <br>
                        d. Check price, rental time, choose a car delivery location, information about distance limits /
                        day:
                        <br>
                        <b>Rental period</b> <br>
                        - Car rental time is calculated in days, the system defaults to pick up the car from 9pm today
                        and
                        return the car at 8pm the next day.
                        - You can flexibly customize the pick-up and return time. If the total time is less than 24
                        hours, it
                        will be rounded to 1 day. As a rule, most car owners on Yotrip only deliver cars from 5am - 10pm
                        daily,
                        so you need to adjust the time accordingly to easily rent a car. <br>

                    </li>
                    <li>
                        <b>Car delivery location</b> <br>
                        You can choose 1 of 2 methods of car delivery:
                        - Delivery at the location of the car owner: The exact address of the car will be displayed
                        after you
                        have successfully made the deposit payment on the system.
                        - Door-to-door delivery: You can ask the car owner to deliver to your home address and will pay
                        an
                        additional delivery fee (the system will automatically determine the distance from the car
                        owner's
                        location to the car delivery location to vehicle delivery fee). <br>

                    </li>
                    <li>
                        <b>Distance limit</b> <br>
                        If you need to travel long distances, you need to carefully check the maximum number of
                        kilometers
                        allowed to travel in a day and the amount of surcharge/km if the limit is exceeded. Each vehicle
                        owner
                        will have different requirements for mileage limits and surcharges. <br>
                        WEB <br>
                        APP <br>
                        e. Enter promo code (if any): Every month, Yotrip deploys promotions to users, don't forget to
                        enter the
                        KM code to get a discount on the car. <br>
                        WEB <br>
                        APP <br>
                        f. Check the car rental request again: <br>
                        You need to check all the information in the car rental request (car information, rental time,
                        pickup
                        location, promotion, total rent, required documents and other requirements).
                        You can send a message to the car owner in the "Message" section to introduce the travel route,
                        the
                        documents you have or other requirements related to the car rental... so that the car owner can
                        make a
                        decision for the car rental. rent quickly and admin Yotrip can easily support you.
                        Finally, you send a request to rent a car to the car owner by clicking the "Book a car" key. The
                        car
                        owners will receive a request to book a car from you and will respond to you (Agree / Decline to
                        rent)
                        as soon as possible.
                        Note: To help you book a car faster, the system allows you to send multiple car rental requests
                        to many
                        different car owners at the same time, and you can prioritize the selection of car owners with
                        early
                        response. <br>
                        WEB <br>
                        APP <br>
                        After receiving a positive response from the car owner (via both methods: sms message +
                        notification on
                        the website/app), please proceed to pay a deposit of 30% of the car rental as soon as possible.
                        for or
                        all of the car booking process (the remaining 70% you will pay directly to the car owner when
                        receiving
                        the car). <br>
                        Deposit methods at Yotrip: <br>
                        <a href="https://www.mioto.vn/paymenthowto#visaMethod">Payment via credit/debit card VISA,
                            Master</a>
                        <br>
                        <a href="https://www.mioto.vn/paymenthowto#atmMethod">Payment via ATM card registered for online
                            payment</a> <br>
                        <a href="https://www.mioto.vn/paymenthowto#storeMethod">Pay in cash at a convenience store near
                            your
                            home (Payoo is accepted)</a> <br>
                        <a href="https://www.mioto.vn/paymenthowto#transferMethod">Payment by bank transfer</a> <br>
                        <a href="https://www.mioto.vn/paymenthowto#officeMethod">Pay in cash at Yotrip's office</a> <br>
                        For more detailed instructions, please visit the <a href="https://www.mioto.vn/paymenthowto">Payment
                            Instructions</a> <br>
                        For more detailed instructions, please visit the Payment Instructions page.
                        After successful deposit payment, you will receive the correct phone number and address of the
                        car
                        owner. Please contact the car owner soon to reconfirm the schedule and required documents to
                        ensure your
                        trip goes smoothly and smoothly. For any questions, you can contact <a href="#">19009217 (9AM -
                            9PM T2-T7)</a> or <a href="https://www.facebook.com/mioto.vn/">Yotrip
                            Fanpage</a> for support.
                    </li>
                </ol>
            </div>


        </div>
    </section>
    <!-- Total Start -->
    @include('partials.total')
    <!-- Total Start -->

    <!-- Footer -->
    @include('partials.footer')
@endsection
