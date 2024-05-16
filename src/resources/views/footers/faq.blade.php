@extends('layouts.app')
@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/ui/images/bg_3.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home <i
                                class="ion-ios-arrow-forward"></i></a></span> <span>FAQ <i
                            class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">FAQ</h1>
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
                    <span class="subheading">Car booking guide</span>
                    <h2 class="subheading">How to rent a car on Yotrip?</h2><br>
                    <p>Yotrip is a self-driving car rental app that supports two platforms including yotrip and
                        Yotrip.vn website.
                    </p>

                    <p>Register an account on the Yotrip app (using mobile phone, Facebook, Mail), log in and
                        authenticate your phone number.</p>
                    <p>On the home page, select the area, adjust the time that you want to rent a car, press the search,
                        and the system will appear the list of vehicles.</p>
                    <p> After you submit a booking request and get the owner's consent for rent, you will make a deposit
                        of
                        30% of the rent in advance to receive the owner's information.</p>
                    <p> You can also see more details of your car booking steps <a
                            href="https://www.mioto.vn/bookinghowto">here.</a></p>
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
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">VIEW AND BOOK A CAR</span>
            </div>

        </div>
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Car booking guide</span>
            </div>

        </div>
        <ol>
            <li>
                <p class="mb-4">I've already submitted a booking request, what do I need to do next ?
                </p>
                <ul>
                    <li>Once you have submitted a successful booking request, the car owner will respond to agree or
                        decline your car rental request.
                    </li>
                    <li>In case the car owner agrees to request a car rental, you will make a deposit of 30% of the car
                        rental value to receive car owner information and contact the car owner directly.
                    </li>
                    <li>In case the car owner refuses your request to rent a car, you can continue to choose other cars
                        to book more and the Yotrip system allows users to book 3 cars at the same time and will
                        automatically cancel the other cars in case. You deposit the car you like.
                    </li>
                </ul>
            </li>
            <li>
                <p class="mb-4">How to check car owner records ?
                </p>
                <ul>
                    <li>To check car owner information, you can go to the car owner's profile to see a list of cars as
                        well as reviews of previous customers who have used the car owner's service.
                    </li>
                    <li> The rating is clearly shown in the review section and the number of stars that customers have
                        rated for the car owner.
                    </li>

                </ul>
            </li>
            <li>
                <p class="mb-4">What is express booking? How long is the waiting time to book a car ?
                </p>
                <ul>
                    <li>Fast car booking is a feature that allows tenants to book a car and switch to waiting for a
                        deposit immediately without confirming the rental agreement from the car owner. Tenants can make
                        a deposit to receive the owner's contact information immediately.

                    </li>
                    <li> In case the tenant waits for a long time for the car owner to respond, they can contact Hotline
                        Yotrip 1900 9217 or <a href="https://www.facebook.com/mioto.vn">Fanpage Yotrip </a>for support.
                    </li>
                    <li> In addition, tenants can book vehicles with Quick Booking feature enabled to save time waiting
                        for the owner to respond.
                    </li>
                </ul>
            </li>
        </ol>
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Vehicles on Yotrip</span>
            </div>

        </div>
        <ol>
            <li>
                <p class="mb-4">How to find manual or automatic cars on Yotrip? How to find a 4- or 7-seater car on
                    Yotrip ?
                </p>
                <ul>
                    <li>Yotrip has a filter so that users can choose the type of car they like best.

                    </li>
                    <li>In the filter section, the tenant selects the Transmission section to choose a manual or
                        automatic transmission vehicle.

                    </li>
                    <li> And the Vehicle Type section will allow guests to choose a 4- or 7-seat car.
                    </li>
                </ul>
            </li>
            <li>
                <p class="mb-4">Want to see the price of individual cars like? (Example Mazda series).
                </p>
                <ul>
                    <li>If you want to see the price of each car model, you can use the filter to select the model you
                        want to refer to.

                    </li>
                    <li> For example, to see the price of Mazda cars, in the filter section, select the Car brand,
                        select
                        Mazda, the Yotrip system will display the Mazda vehicles on the system and the price of each
                        vehicle.
                    </li>
                </ul>
            </li>
            <li>
                <p class="mb-4">Are vehicles on Yotrip allowed to smoke ?
                </p>
                <ul>
                    <li>Currently, most car owners on the Yotrip system have a provision that prohibits customers from
                        smoking in their cars.
                    </li>
                    <li>
                        If the car hirer violates, they will have to pay an additional deodorizing fee from 300k-500k
                        depending on the car owner.
                    </li>
                </ul>
            </li>
            <li>
                <p class="mb-4">How to find the cars around ?
                </p>
                <ul>
                    <li>To search for a car by distance, Yotrip supports tenants to search by vehicle list or map.
                    </li>
                    <li>
                        In the search field, you enter the address where you want to pick up the car, the Yotrip system
                        will give priority to the vehicles with the closest distance to you within 3km.
                    </li>
                    <li>
                        Or you can search by map, now the Yotrip system will display the specific area of the car and
                        you can choose the car closest to your area.
                    </li>
                </ul>
            </li>
            <li>
                <p class="mb-4">In which areas does Yotrip currently have partners ?
                </p>
                <ul>
                    <li>Yotrip is currently cooperating with partners across the country, focusing on big cities such as
                        Ho Chi Minh City, Hanoi, Da Nang.</li>
                </ul>
            </li>
        </ol>
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Car rental fee</span>
            </div>

        </div>
        <ol>
            <li>
                <p class="mb-4">What does the car rental cost include? Calculated how ?
                </p>
                <ul>
                    <li>The cost of renting a car will include the total daily rental unit price, service fee and
                        insurance fee (if the car has insurance).
                    </li>
                    <li>If the tenant applies a promotional code, the rental cost will be the total rental fee minus the
                        promotion.</li>
                    <li>
                        This is just the cost of renting a car that guests have to pay when renting, in case there are
                        additional costs such as gas, car cleaning, exceeding the km limit, the tenant will pay more to
                        the car owner for this cost.
                    </li>
                    <li>
                        Example
                        <ul>
                            <li>Car rental unit price 50000 VND</li>
                            <li> Service fee 25,000 won </li>
                            <li>Insurance fee 25,000 won</li>
                            <li>Total car rental fee 550000 x 1 day</li>
                            <li>Total 550000</li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <p class="mb-4">How to use promo code ?
                </p>
                <ul>
                    <li>
                        Yotrip regularly applies promotions for customers who book cars on the app.
                    </li>
                    <li>
                        For vehicles that have been applied with a special discount program (for example, unlimited 10%
                        off), you only need to choose a rental time and book a car, no need to apply another promotion
                        code.
                    </li>
                    <li>
                        For the remaining cars, there will be a "Promo code" section in the car booking section, enter
                        the code to apply the promotion.
                    </li>
                    <li>
                        Note: For the promotion code, the tenant can only use 1 time when having a successful trip.
                    </li>
                </ul>
            </li>
        </ol>
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Car rental and delivery time</span>
            </div>

        </div>
        <ol>
            <li>
                <p class="mb-4">How many days do you need to rent a car for Tet or holiday ?
                </p>
                <ul>
                    <li>The minimum rental time for holidays and New Year's Eve will depend on the length of the
                        holiday, Tet holiday and the busy schedule of the car owner.
                    </li>
                    <li> Normally, car owners will stipulate the minimum rental period for long holidays of 3 days or
                        more.</li>
                    <li>
                        Especially during Tet holiday, car rental time will be from 7-8 days or more.
                    </li>
                </ul>
            </li>
            <li>
                <p class="mb-4">Is it possible to rent a car by the hour or rent a half day ?
                </p>
                <ul>
                    <li>
                        For self-driving car rental service, the rental time is in days.
                    </li>
                    <li>
                        You can book a rental for less
                        than 24 hours, but the rental price is still calculated for 1 day.
                        Car owners do not support hourly or half-day rentals.
                    </li>
                </ul>
            </li>
            <li>
                <p class="mb-4">What time is the car delivery time on Yotrip ?
                </p>
                <ul>
                    <li>
                        Yotrip does not stipulate a specific car delivery time, tenants can choose a car rental time in
                        accordance with the car owner's delivery policy.
                    </li>
                    <li>
                        However, the common time for car delivery is from 9 pm today to 8 pm tomorrow, or from morning
                        to night, one day will be counted.
                    </li>
                    <li>
                        Some car owners will be flexible with the rental time of 24 hours for 1 day, without specifying
                        the time to deliver the car.
                    </li>
                </ul>
            </li>
        </ol>
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Distance limit</span>
            </div>

        </div>
        <ol>
            <li>
                <p class="mb-4">Does the car on Yotrip have a limit on the rental distance ? How to go over km ?
                </p>
                <ul>
                    <li>In order to ensure the quality of the car and ensure the safety of customers, most car owners
                        will set a limited number of kilometers.
                    </li>
                    <li> The limited number of kilometers will be determined by the vehicle owner, usually
                        300km-500km/day, and calculated on the total number of days of travel.</li>
                    <li>
                        For example, if you rent a car with a km limit of 300km/day and rent it for 2 days, the number
                        of kilometers you can travel is 600km.
                    </li>
                    <li>
                        And the extra fee will be from 2-5k/km over the limit.
                    </li>
                </ul>
            </li>
            <li>
                <p class="mb-4">Is it possible to rent a car by the hour or rent a half day ?
                </p>
                <ul>
                    <li>
                        For self-driving car rental service, the rental time is in days.
                    </li>
                    <li>
                        You can book a rental for less
                        than 24 hours, but the rental price is still calculated for 1 day.
                        Car owners do not support hourly or half-day rentals.
                    </li>
                </ul>
            </li>
            <li>
                <p class="mb-4">What time is the car delivery time on Yotrip ?
                </p>
                <ul>
                    <li>
                        Yotrip does not stipulate a specific car delivery time, tenants can choose a car rental time in
                        accordance with the car owner's delivery policy.
                    </li>
                    <li>
                        However, the common time for car delivery is from 9 pm today to 8 pm tomorrow, or from morning
                        to night, one day will be counted.
                    </li>
                    <li>
                        Some car owners will be flexible with the rental time of 24 hours for 1 day, without specifying
                        the time to deliver the car.
                    </li>
                </ul>
            </li>
        </ol>
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Car delivery to the place</span>
            </div>

        </div>
        <ol>
            <li>
                <p class="mb-4">Where is Yotrip address ? Where is the parking lot ?
                </p>
                <ul>
                    <li>Yotrip office is located at 305/4 Le Van Sy, Ward 1, Tan Binh, HCMC.

                    </li>
                    <li> Since Yotrip is an application that connects car owners and renters, there will be no parking,
                        car rental customers on the application will choose a car near the customer's area for
                        convenience in car delivery.</li>
                </ul>
            </li>
            <li>
                <p class="mb-4">Does Yotrip deliver the car to your place? How to find it on Yotrip ?
                </p>
                <ul>
                    <li>
                        The part of car delivery to the place will depend on the policy of each car owner, the car owner
                        will support delivery within the specified range.
                    </li>
                    <li>
                        To choose whether the car owner has a door-to-door delivery, you choose in the filter section,
                        or on the list of vehicles, it will specify whether the car is delivered or not.
                    </li>
                </ul>
            </li>
            <li>
                <p class="mb-4">How is the car delivery fee calculated ?
                </p>
                <ul>
                    <li>
                        The delivery fee applied by Yotrip will be a 2-way delivery fee.
                    </li>
                    <li>
                        For example: The car owner supports the delivery of the car within 10km, the delivery fee is
                        10k/km. If the delivery distance is 5km, the delivery and pick up fee will be 50k.
                    </li>

                </ul>
            </li>
            <li>
                <p class="mb-4">How do I change the delivery location ?
                </p>
                <ul>
                    <li>
                        If you want to change the car delivery location without making a deposit, you can cancel the
                        trip and rebook the car to adjust the car delivery location.
                    </li>
                    <li>
                        In case you have made a deposit, you can contact the car owner directly about the car delivery
                        issue.
                    </li>

                </ul>
            </li>
            <li>
                <p class="mb-4">Does Yotrip deliver cars at the airport ?
                </p>
                <ul>
                    <li>
                        Some car owners on the application have a door-to-door car delivery service. To order a car for
                        delivery at the airport, you should choose the car near the airport area and support
                        door-to-door delivery.
                    </li>
                    <li>
                        In the car delivery section, you enter the airport address, the system will display the cost of
                        car delivery so that the tenant can conveniently arrange the plan.
                    </li>

                </ul>
            </li>
        </ol>
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Car rental procedures</span>
            </div>

        </div>
        <ol>
            <li>
                <p class="mb-4">What documents do you need to rent a car on Yotrip? What is collateral ?
                </p>
                <ul>
                    <li>Car rental procedures include:
                        <ul>
                            <li>Car rental documents: ID card, driving license: car owner compares and returns to
                                tenant. Original household registration/KT3 (long-term temporary residence book): the
                                car owner keeps it.</li>
                            <li>Deposit property: Motorbike worth >15 million (with original swing) or 15 million in
                                cash.</li>
                        </ul>
                    </li>
                    <li> Note: If the car owner flexibly accepts other alternative documents such as Provincial
                        household registration (original), Passport, the car owner will clearly state "Accept provincial
                        household registration (original) or Passport" in the Other Terms section. in the Documents
                        required by the tenant.</li>
                </ul>
            </li>

            <li>
                <p class="mb-4">Can I rent it if I have a provincial household registration or no one?</p>
                <ul>
                    <li>Currently, many car owners on Yotrip support tenants with original provincial household
                        registration
                        or original Passport to facilitate more support for out-of-province tenants.
                    </li>
                </ul>
            </li>
            <li>
                <p class="mb-4">Can foreigners rent a car on Yotrip ?</p>
                <ul>
                    <li>If you are a foreign customer who wants to rent a self-drive car, you need a Vietnamese
                        acquaintance who has all the paperwork required by the car owner to sign a car rental contract.
                    </li>
                    <li>In addition, your driver's license must be an approved driver's license for circulation in
                        Vietnam.</li>
                </ul>
            </li>
            <li>
                <p class="mb-4">Is it possible to rent a car for someone else to drive ?</p>
                <ul>
                    <li>If you are the one who booked the car and will have someone else to drive, it is imperative that
                        when you receive the car, you will have all the documents required by the car owner to make a
                        contract, and the driver must also accompany you for the car owner to check. papers.
                    </li>
                </ul>
            </li>
        </ol>
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Submit a car rental request</span>
            </div>

        </div>
        <ol>
            <li>
                <p class="mb-4">Can I send multiple car rental requests to different car owners ?
                </p>
                <ul>
                    <li> Yotrip system allows tenants to send car rental requests to 3 car owners at the same time, and
                        in case you deposit the car you like, the Yotrip system will automatically cancel the remaining
                        2 cars.</li>
                </ul>
            </li>
            <li>
                <p class="mb-4">How long does it take to send a rental request to confirm the booking successfully ?</p>
                <ul>
                    <li>The successful booking confirmation time depends on the feedback of the car owner and the
                        deposit payment of the tenant.
                    </li>
                    <li>
                        Normally, the car owner will check and respond soon, if after 20 minutes from the time the
                        customer sends the request, the car owner has not responded, Yotrip will contact the car owner
                        to remind the car owner to respond.</li>
                    <li>
                        For vehicles that are in Quick Booking mode, the system will agree as soon as the customer
                        submits a rental request.</li>
                    <li>
                        After the owner responds to agree, the tenant will pay the deposit and receive the contact
                        information of the car owner. This is the final step to confirm a successful booking.</li>
                </ul>
            </li>
            <li>
                <p class="mb-4">After booking a car, how do I change the date ?</p>
                <ul>
                    <li>If after you complete the deposit and want to change the departure date, then you can handle it
                        in the following cases:
                        <ul>
                            <li>In case there is a change within 1 hour after the deposit: You can cancel the trip
                                directly and Yotrip will transfer the deposit to your new trip, or refund the deposit to
                                you..</li>
                            <li>
                                In case there is a change after 1 hour, you should call to notify the car owner. If the
                                car owner has an empty car schedule at the time you want to rebook and agrees to change
                                the rental date, Yotrip will support you to rebook a new trip.</li>
                            <li>
                                If the car owner does not support changing the travel date, Yotrip will apply a
                                cancellation policy to the tenant</li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <p class="mb-4">Forgot to enter promo code, how to handle? Can I enter the promo code more than once ?
                </p>
                <ul>
                    <li>
                        In case you have made a deposit but forgot to enter the promotion code, Yotrip can support to
                        cancel the trip and update the promotion code for you. And the promo code is applied once for a
                        successful trip.
                    </li>
                </ul>
            </li>
        </ol>
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Deposit</span>
            </div>
        </div>
        <ol>
            <li>
                <p class="mb-4">Do I need to make a deposit ? Deposit how ?
                </p>
                <ul>
                    <li> When the car owner agrees to rent, you will make a deposit of 30% of the trip value in advance
                        to show your goodwill to rent the car as well as to make sure the car owner will keep the car
                        for you.
                    </li>
                    <li>
                        To make a deposit, there are many payment methods, you can refer to the <a
                            href="https://www.mioto.vn/paymenthowto">Payment Guide</a>.
                    </li>
                </ul>
            </li>
            <li>
                <p class="mb-4">After successful deposit, what do I need to do ?
                </p>
                <ul>
                    <li> After a successful deposit, you will receive a notification of the phone number of the car
                        owner, you should actively contact the car owner to discuss more details about the paperwork as
                        well as the time to deliver the car.</li>
                    <li>
                        If you cannot agree with the vehicle owner on the required procedures, it is necessary to cancel
                        the trip on the system within 1 hour.
                    </li>
                </ul>
            </li>
        </ol>
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">REPRESENTATION AND PAYMENT</span>
            </div>
        </div>
        <ol>
            <li>
                <p class="mb-4">Car rental contract: Do you need to sign a contract or legal document to rent a car ?
                </p>
                <ul>
                    <li> When receiving the car, to ensure the interests of both parties and settle disputes when there
                        is a risk, you will sign a contract and a record of car handover with the vehicle owner, this
                        contract will be made in 2 copies and each party 1 copy will be kept.
                    </li>
                </ul>
            </li>
            <li>
                <p class="mb-4">After successful deposit, what do I need to do ?
                </p>
                <ul>
                    <li> After a successful deposit, you will receive a notification of the phone number of the car
                        owner, you should actively contact the car owner to discuss more details about the paperwork as
                        well as the time to deliver the car.</li>
                    <li>
                        If you cannot agree with the vehicle owner on the required procedures, it is necessary to cancel
                        the trip on the system within 1 hour.
                    </li>
                </ul>
            </li>
        </ol>
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Rental car management</span>
            </div>
        </div>
        <ol>
            <li>
                <p class="mb-4">Traffic fines? Who pays tolls ? Parking area ?
                </p>
                <ul>
                    <li> For self-driving car rental, in case the tenant commits a traffic violation due to the tenant's
                        fault, the traffic violation fee is entirely responsible for the lessee. This provision is
                        clearly stated in the car rental contract.
                    </li>
                    <li>For self-driving car rental, in case the tenant commits a traffic violation due to the tenant's
                        fault, the traffic violation fee is entirely responsible for the lessee. This provision is
                        clearly stated in the car rental contract.</li>
                </ul>
            </li>
            <li>
                <p class="mb-4">Who pays for gas ?
                </p>
                <ul>
                    <li>The tenant will be the one to pay for gas during the rental process.
                    </li>
                    <li>
                        When delivering the car to the tenant, the owner will specify the level of gas.
                    </li>
                    <li> When returning the car, the lessee is responsible for paying extra for the car owner for the
                        missing gas or can actively refuel the car owner with the same level of gas at the time of
                        receiving the car.</li>
                </ul>
            </li>
            <li>
                <p class="mb-4">Car cleaning ?
                </p>
                <ul>
                    <li>When delivering the car, the owner will deliver a clean car to the tenant.
                    </li>
                    <li>
                        At the end of the trip, the tenant needs to clean or wash it before handing it over to the
                        owner. The vehicle owner may charge an additional fee for washing or cleaning the vehicle if the
                        vehicle is dirty or has a bad smell.
                    </li>

                </ul>
            </li>
        </ol>
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Review after the trip</span>
            </div>
        </div>
        <ol>
            <li>
                <p class="mb-4">How to send a review to the car owner after the trip ?
                </p>
                <ul>
                    <li> After clicking the end of the trip, the application will display the evaluation section.
                        Tenants can write reviews about the car's quality and service.

                    </li>
                    <li> In case the guest does not submit a review, 9 days after the end of the trip, the system will
                        automatically rate the car owner 5 *.</li>
                </ul>
            </li>
        </ol>
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">SCHEDULE CHANGES – CANCELLATION</span>
            </div>
        </div>
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Cancel the trip after making a deposit</span>
            </div>
        </div>
        <ol>
            <li>
                <p class="mb-4">If there is a problem, how can I contact Yotrip for support ?
                </p>
                <ul>
                    <li>Tenants can contact Hotline 19009217 (during office hours) or message <a
                            href="https://www.facebook.com/mioto.vn">Yotrip Fanpage </a>for the
                        earliest support.
                    </li>
                </ul>
            </li>
            <li>
                <p class="mb-4">What should I do if I want to cancel my trip after making a deposit ?
                </p>
                <ul>
                    <li>Tenants can go to the Trip section, select the trip they want to cancel, click Cancel trip and
                        enter the reason for the cancellation to cancel the trip.
                    </li>
                </ul>
            </li>
            <li>
                <p class="mb-4">Can I get a refund if I change my schedule after a deposit is made ?</p>
                <ul>
                    <li>According to the cancellation policy, if the tenant cancels:</li>
                    <ul>
                        <li>Within 1 hour after deposit, 100% of deposit will be refunded.</li>
                        <li>More than 7 days before the trip, 70% of the deposit will be refunded.</li>
                        <li>7 days or less before the trip, the deposit will not be refunded.</li>
                    </ul>
                    <li>In case the lessee and the car owner have a separate agreement on the deposit, Yotrip will
                        follow the mutual agreement of the two parties, if not, the cancellation policy will be
                        followed.</li>
                </ul>
            </li>
        </ol>
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">The owner of the car canceled the trip</span>
            </div>
        </div>
        <ol>
            <li>
                <p class="mb-4">I made a deposit but the car owner canceled my trip, how to handle it ?
                </p>
                <ul>
                    <li>You can book another car on the app or contact Yotrip via Hotline 19009217 or text <a
                            href="https://www.facebook.com/mioto.vn">Yotrip
                            Fanpage</a> for early support.

                    </li>
                    <li>If during business hours, Yotrip staff will contact you to help you find another car and verify
                        the cancellation error to handle according to the cancellation policy. See cancellation policy
                        <a href="https://www.mioto.vn/privacy#canceltrip">here</a>.
                    </li>
                </ul>
            </li>
        </ol>
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">End the trip early</span>
            </div>
        </div>
        <ol>
            <li>
                <p class="mb-4">I want to end the trip early, what should I do ?
                </p>
                <ul>
                    <li>Tenants can contact the car owner to arrange a time to get the car back. In case of need to
                        update trip information, tenants contact Yotrip via Hotline 19009217 or <a
                            href="https://www.facebook.com/mioto.vn">Yotrip
                            Fanpage</a> for
                        support and update.
                    </li>
                </ul>
            </li>
        </ol>
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Refund</span>
            </div>
        </div>
        <ol>
            <li>
                <p class="mb-4">Refund time? How long does it take to get a refund ?
                </p>
                <ul>
                    <li>From the date of confirmation of the refund, Yotrip's accounting department will transfer the
                        money to the tenant within the next 3 working days (except Saturday, Sunday,  holiday and
                        New Year).
                    </li>
                </ul>
            </li>
        </ol>
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">CAR RENTAL EXPERIENCE</span>
            </div>
        </div>
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Book a car</span>
            </div>
        </div>
        <ol>
            <li>
                <p class="mb-4">After booking the car, it takes time to wait for the car owner to approve, is there any
                    other way faster ?
                </p>
                <ul>
                    <li>Tenants can order 3 cars at the same time or put the cars in Quick Book status to be able to
                        make a deposit and contact the car owner immediately.
                    </li>
                </ul>
            </li>
            <li>
                <p class="mb-4">How is the experience of booking a car on Yotrip ?
                </p>
                <ul>
                    <li>Tenants can refer to some experiences:</li>
                    <ul>
                        <li>Choose a car owner with quick response, high approval rate, good comments from rented
                            guests. </li>
                        <li>Vehicle has insurance, beautiful pictures, complete and clear information.</li>
                        <li>Put the car in Quick Book state and book 3 cars at the same time.</li>
                        <li>Refer to the current promo codes and choose the best offer.</li>
                    </ul>
                </ul>
            </li>
        </ol>
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Car delivery</span>
            </div>
        </div>
        <ol>
            <li>
                <p class="mb-4">What points should be kept in mind when receiving a car with the car owner to limit
                    disputes ?
                </p>
                <ul>
                    <li>To dispute when receiving the car, the lessee can:
                        <ul>
                            <li>Contact to discuss and agree with the car owner on documents, procedures, time and
                                address for delivery and receipt of the car right after the deposit.</li>
                            <li>Bring the documents as exchanged and signed the Car Rental Contract, Full Car Handover
                                Minute, each party keeps one copy.</li>
                            <li> Take photos, record videos of documents and vehicle status when receiving the car.</li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <p class="mb-4">How is the experience of booking a car on Yotrip ?
                </p>
                <ul>
                    <li>Tenants can refer to some experiences:</li>
                    <ul>
                        <li>Choose a car owner with quick response, high approval rate, good comments from rented
                            guests. </li>
                        <li>Vehicle has insurance, beautiful pictures, complete and clear information.</li>
                        <li>Put the car in Quick Book state and book 3 cars at the same time.</li>
                        <li>Refer to the current promo codes and choose the best offer.</li>
                    </ul>
                </ul>
            </li>
        </ol>
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Review after the trip</span>
            </div>
        </div>
        <ol>
            <li>
                <p class="mb-4">Are the tenant reviews 100% correct ?
                </p>
                <ul>
                    <li>After the end of the trip, the car owner will evaluate the tenant and the tenant will evaluate
                        the quality of the car and the service of the car owner. </li>
                    <li>These reviews are 100% real and are for reference if you want to book a car rental.</li>
                </ul>
            </li>
        </ol>
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">RISK MANAGEMENT</span>
            </div>
        </div>
        <ol>
            <li>
                <p class="mb-4">Yotrip supports when there is a problem: If there is a problem, how can I contact Yotrip
                    for support ?
                </p>
                <ul>
                    <li>Tenants can contact Hotline 19009217 (during office hours) or leave a message via <a
                            href="https://www.facebook.com/mioto.vn">Fanpage Yotrip </a>
                        for support as soon as possible.</li>
                </ul>
            </li>
        </ol>
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Trip insurance package</span>
            </div>
        </div>
        <ol>
            <li>
                <p class="mb-4">Renting a car but afraid of unexpected problems, does Yotrip have any protection package
                    ?
                </p>
                <ul>
                    <li>Currently, Yotrip has a MIC Insurance package to support tenants in case of a collision with a
                        maximum deductible of 2 million/case.</li>
                </ul>
            </li>
            <li>
                <p class="mb-4">I rent a car with trip insurance to support, when there is a problem, who should I
                    contact or how to handle it?
                </p>
                <ul>
                    <li>In case you have problems while renting a car with insurance support, Yotrip recommends that
                        you:</li>
                    <ul>
                        <li>Contact and notify the vehicle owner about the problem being encountered so that the car
                            owner can understand the situation.
                        </li>
                        <li> Take pictures of the incident scene and contact the MIC Insurance switchboard 1900558891 to
                            report the problem and receive appropriate handling instructions.</li>
                        <li> If you cannot contact MIC Insurance, you can contact Yotrip hotline 19009217 (9AM - 6PM, T2
                            - T7) or message <a href="https://www.facebook.com/mioto.vn">Yotrip Fanpage</a> for advice and timely support.</li>
                    </ul>
                    <li>Note: MIC insurance only supports problems during the time you book a rental on the Yotrip app.
                        Therefore, you need to report the incident as soon as it occurs to be recognized and supported
                        for compensation.</li>
                </ul>
            </li>
        </ol>
        <!-- <div class="row ftco-animate">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel ftco-owl">
                    <div class="item">
                        <div class="testimony-wrap rounded text-center py-4 pb-5">
                            <div class="user-img mb-2" style="background-image: url(/ui/images/person_1.jpg)">
                            </div>
                            <div class="text pt-4">
                                <p class="mb-4">Double check the car before receiving and before returning the car. Sign
                                    a written record of handover of the vehicle status upon receipt and when returning.
                                </p>
                                <p class="mb-4">Pay the car rental in full to the car owner when receiving the car.
                                </p>
                                <p class="mb-4">Present all relevant documents to the vehicle owner: ID card, GPLX,
                                    Household Registration or KT3. Household registration/KT3 deposit, cash (VND 15
                                    million or depending on the agreement with the vehicle owner) or equivalent assets
                                    (motorcycles and car parrots) before receiving the car.
                                </p>
                                <p class="mb-4">Comply with the regulations and the time of return as agreed upon by the
                                    two parties.
                                </p>
                                <p class="mb-4">Responsible for compensating for any losses in parts and accessories of
                                    the car, 100% compensation according to the genuine parts price if the part is found
                                    to be swapped, 100% of the cost of repairing the car if there is a damage depending
                                    on the extent of damage of the car, the cost of the car holidays cannot run due to
                                    the fault of the car tenant (the price is calculated by the rent in the car.
                                    contract) and vehicle cleaning charges if any.
                                </p>
                                <p class="name">Car hire responsibilities.</p>
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
                                <p class="mb-4">Deliver the car and all documents related to the vehicle on time and
                                    in a safe and clean state to ensure the quality of service.</p>
                                <p class="mb-4">The relevant vehicle documents include: vehicle registration paper
                                    (notarized photocopy), inspection paper, vehicle insurance paper (notarized or
                                    original photocopy).</p>
                                <p class="mb-4">Legal responsibility for the origin and ownership of the vehicle.</p>
                                <p class="name">The responsibility of the car owner</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</section>
<!-- Total Start -->
@include('partials.total')
<!-- Total Start -->

<!-- Footer -->
@include('partials.footer')

@endsection