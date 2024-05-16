@extends('layouts.app')
@section('content')
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/ui/images/bg_3.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span> Owner's Guide<i
                                class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread"> Owner's Guide</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section testimony-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-12 heading-section ftco-animate">
                    <span class="subheading">
                        Owner's Guide</span>
                    <p class="md-4">
                        You can easily register and manage your rental car on the Yotrip system via the yotrip.vn website
                        or the Yotrip app. The detailed steps are as follows: <br>
                    </p>
                    <span class="subheading">
                        A. Vehicle Registration Instructions</span>
                    {{-- A --}}
                    <ol>
                        <p class="md-4">
                            <b> Login or register an account</b> <br>
                            Please login with your existing account at Yotrip or log in via Facebook/Google. In case you
                            have not
                            registered for an account, you can choose the line "Register now" to create an account at Yotrip
                            Once done, you can click on the word "Create Account" to complete the process
                            WEB
                            APP
                            <b>Vehicle registration</b> <br>
                            After creating an account, select your account icon, select "My Car" → select "Vehicle
                            Registration" to
                            start registering your vehicle
                            WEB
                            APP
                            In the "Vehicle registration" section, please fill out all the information fields (from 5-10
                            minutes for
                            this section) <br>
                            <b>STEP 1: Vehicle information</b> <br>
                            License plates:
                            Please fill in your license plate correctly (eg 51G-1234). In case the license plate is
                            duplicated
                            because there are already users, please call 19009217 (9AM - 6PM T2-T7) to notify the admin.
                            WEB

                            APP

                            Basic information:
                            Range of vehicle
                            Currently, Yotrip only rents cars with 4-7 seats.
                            Car make - Model - Number of seats
                            Select a vehicle from the list. In case your vehicle information is not on the list, please call
                            19009217 (9AM - 6PM T2-T7) to notify the admin.
                            Year of manufacture
                            Yotrip does not limit the production year of the car, as long as you make sure the car is still
                            in good
                            condition and safe for tenants.
                            Transmission
                            Select Manual/Automatic.
                            Fuel
                            Select Petrol/Oil information.
                            WEB

                            APP

                            Fuel Consumption/100km
                            Tenants will prioritize choosing fuel-efficient cars for long trips.
                            Vehicle description
                            You can write a few lines to introduce your car. You can refer to the descriptions of car owners
                            who are
                            renting on Yotrip
                            Description of car owner Thang Nguyen for Huynhdai Elentra 2018
                            Hyundai Elantra 1.6AT-2018 automatic number registered in November 2018. New car, clean, safe,
                            spacious,
                            comfortable, suitable for family travel.
                            The car is equipped with a reverse sensor system, automatic wiper sensor, automatic headlight
                            sensor,
                            side view camera, dash cam, overspeed warning system integrated on the DVD touch screen with GPS
                            navigation. , AV entertainment system and many other amenities.
                            Feature:
                            Select the features that correspond to your vehicle (Sunroof, Bluetooth, GPS Navigation, USB
                            Slot, Child
                            Seat)
                            WEB

                            APP <br>
                            <b>STEP 2: Set up a rental request</b> <br>
                            Rental unit price
                            How much do you want to rent?
                            You can refer to the price of the car owners are renting on the system to set the rental price
                            for your
                            car.
                            The more competitive the price, the more attractive customers will be to rent a car. The system
                            will
                            also prioritize ranking competitively priced vehicles at a higher rank when customers search for
                            cars.
                            Discount
                            Do you want a discount for long-term rental orders?
                            You can set a discount for long-term (week/monthly) car rental requests.
                            Currently, the popular discount of Yotrip car owners is from 5% for weekly rental and 10% for
                            monthly
                            rental.
                            Quick booking
                            Do you want to check customer information and reconfirm the car rental schedule before browsing
                            the car?
                            Normally, after a tenant submits a car rental request, the car owner will check customer
                            information,
                            reconfirm the schedule and approve (agree/reject) the car rental request on the application.
                            However, some car owners are not often online / rarely check their phones, in order to save
                            time, they
                            can install automatic consent mode with the "Quick booking" feature. This feature allows the car
                            owner
                            to default to "Agree" to all car rental requests that fall on the available car dates that the
                            car owner
                            has previously set up.
                            Vehicle address
                            What is your car's address?
                            Enter your vehicle's location (house number - street - District - City) and check the car
                            location
                            displayed on the map.
                            Note, this location is also the address where the customer will come to pick up and return the
                            car.
                            WEB

                            APP

                            Car delivery to the place
                            Can you deliver the car to the customer's address?
                            This feature is for car owners who can deliver cars to tenants.
                            You need to set the range you can deliver the vehicle as well as set up the two-way delivery and
                            pick-up
                            fee.
                            The default delivery range on the system is 20km and the two-way delivery fee is 10,000vnd/km
                            WEB

                            APP

                            Distance limit
                            Do you require a maximum mileage/day limit for tenants?
                            This feature allows car owners to limit the maximum number of kilometers the vehicle can be used
                            in a
                            day.
                            The default distance limit on the system is 400km and the overriding fee is 5,000vnd/km
                            WEB

                            APP

                            Car rental terms
                            In addition to stipulating car rental documents (original) including ID card, driving license,
                            household
                            registration / KT3 (default requirement for all car owners on Yotrip), car owners can stipulate
                            some
                            additional terms. other related to the leasing procedure, this will limit disputes arising in
                            the event
                            of an incident:
                            - Do you accept provincial household registration? Is it acceptable to replace HK/KT3 with other
                            documents (Passport?)
                            - Regulation of car cleaning fee if the car is dirty when returning
                            - No smoking? Carrying smelly foods? Fees if violations occur.
                            - Car wash fee if the car is dirty?
                            - Limited time to receive the car on Tet/holidays
                            - Other terms if any
                            WEB

                            APP <br>
                            <b>
                                STEP 3: Pictures</b> <br>
                            Upload pictures of your car to show your tenants. Yotrip recommends that you take 5-10 photos
                            from
                            different angles (exterior, interior) and the captured images should be sharp and clear to
                            attract
                            tenants.
                            Click "Select Image" → select your vehicle's image → click "Post Image". You do this
                            sequentially many
                            times to update many car images on the system.
                            Click "Register" to complete the registration process
                            After clicking register, you will receive a notification that your vehicle registration request
                            has been
                            sent to Admin Yotrip.
                            If your car fully meets the rental requirements, Admin Yotrip will process your vehicle approval
                            within
                            1-3 working days.
                            If you are a new car owner and are posting a car on Yotrip for the first time, a Yotrip partner
                            developer will contact you to verify your information and carefully advise on rental procedures
                            on the
                            app before approving your request. Request your vehicle registration.
                            WEB
                            APP <br>
                        </p>
                    </ol>
                    {{-- B --}}
                    <span class="subheading">
                        B. Vehicle Management Manual</span>
                    <ol>
                        After the Admin has approved the vehicle registration request, you will receive a notification via
                        the
                        Yotrip application.
                        Before you start renting, you need to install 2 important pieces of information: <br>
                        <li>
                            <p class="md-4">
                                <b>Set up car rental schedule (operation on Website)</b> <br>
                                <b>On the website</b> <br>
                                Select "My Vehicles" → "Vehicle List" → "Manage Vehicles" <br>
                            </p>
                        </li>
                        <li>
                            <b>Under "Vehicle Management", select "Schedule settings":</b> <br>
                            <b>Vehicle Schedule</b> <br>
                            The bus schedule feature is one of the very important features that allows you to flexibly
                            adjust
                            the
                            busy bus schedule by day, you need to understand and regularly update the busy bus schedule to
                            ensure
                            that the tenant will book the car on the days of your car. still empty.
                            Assuming you have a plan to use the car on February 22 and February 25, to update the busy
                            schedule
                            for
                            these 2 days, select "Set up a busy schedule".
                            In the car schedule section, you select the dates of 22/02 and 25/02, the system will
                            automatically
                            highlight the dates you choose, signaling that the car is busy and the tenant will not be able
                            to
                            send a
                            request to rent a car for these days.
                            To remove a busy schedule, follow the same steps as before. <br>
                        </li>
                        <li>
                            <b>Set rental period</b> <br>
                            Currently, the default rental period on the system is from now - next 3 months, which means that
                            tenants
                            can only rent your car on any date within the next 3 months.
                            You can change the rental period at other landmarks by selecting "Until" and selecting the
                            desired
                            date.
                            This feature is often used when car owners are only sure about the schedule in the next 1-2
                            months.
                            <br>

                        </li>
                        <li>
                            <b>Set up a car rental schedule (operate on the app)</b> <br>
                            <b>Vehicle Schedule</b> <br>
                            You log in to the application, select "My car" to go to the "Manage vehicles" page → select the
                            vehicle
                            to be adjusted → select "Vehicle schedule"
                            To adjust the busy schedule for February 22 and February 25, you just need to select February 22
                            and
                            February 25, press and hold for 1-2 seconds, the system will automatically black out the days
                            you
                            choose
                            to report. The car dealership is busy and the tenant will not be able to submit a rental request
                            for
                            these dates.
                            To remove a busy schedule, follow the same steps as before.

                            Press and hold to adjust the busy schedule
                            Limited rental schedule <br>

                        </li>
                        <li>
                            <b>Set rental price (operation on Website)</b> <br>
                            <b>General price setting for all days</b> <br>
                            In the "Vehicle management" section, select "Price settings". This step was actually done when
                            you
                            started to register the car, but you can still adjust the rental price if you want, including
                            the
                            general price for all days, weekly rental discount, monthly rental discount.
                            Set rental rates by day
                            In case you want to change different rental rates by day, you can use this feature.
                            In the "Vehicle management" section → select "Schedule settings" → in the car schedule section,
                            select
                            "Customize prices" → select the date and adjust the rental price you want.
                            This feature is often used to adjust prices on holidays, rent prices +30-40% compared to
                            weekdays,
                            or
                            adjust prices on weekends +10-20%. <br>

                        </li>
                        <li>
                            <b>Select price repeat icon</b> <br>
                            n case you want to repeat or fix the default weekend rental price higher than weekday, for
                            example
                            +10%,
                            you can do it quickly by selecting the icon next to "Customize price", next you Enter the price
                            for
                            2
                            days Saturday and Sunday, then click "Confirm". <br>

                        </li>
                        <li>
                            <b>Select price repeat icon</b> <br>
                            Repeat pricing for weekends
                            Set rental price (operation on App)
                            General price setting for all days
                            At the "Car Management" page, select "Rental price" and set the general price for all days,
                            weekly
                            rental discount, monthly rental discount.

                            Adjust car prices for all days
                            Set rental rates by day
                            In case you want to change different rental rates by day, you can use this feature.
                            At the page "Manage vehicles" → select "Car schedule" → select the date and adjust the rental
                            price
                            you
                            want. <br>

                        </li>
                        <li>
                            <b>Vehicle calendar page</b> <br>
                            Adjust car price by day
                            In case you want to repeat or fix the default weekend rental price higher than weekday, you can
                            do
                            it
                            quickly by selecting the icon to go to the "Setting recurring price" page, next you enter the
                            price
                            for
                            2 Saturday and Sunday, then click "Confirm".

                            Select price repeat icon

                            Repeat pricing for weekends
                        </li>
                    </ol>
                    {{-- C --}}
                    <span class="subheading">
                        C. Guide to Approval/Rejection</span>
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
                            Get "Car rental request"
                            Receive Notifications via Apps & SMS <br>
                        </li>
                        <li>
                            <b>Car owner</b> <br>
                            Approve (Agree / Deny)
                            App Approval <br>
                        </li>
                        <li>
                            <b>Tenants</b> <br>
                            Make a Deposit
                            Deposit 30% of the trip via the App <br>

                        </li>
                        <li>
                            <b>Owners and Tenants</b> <br>
                            Completing the booking
                            Receive phone number information - Contact to verify the procedure
                            When a customer sends a request to rent a car, you will receive a notification via the app and
                            sms on
                            the phone.
                            Please access the Yotrip application, select "Notifications", select "Request a car rental" to
                            go to the
                            "Rental details" page and respond by clicking "Agree" or "Reject". ".
                            At the "Rental details" page, you need to carefully check the booking time and unit price before
                            proceeding with approval.
                            To view tenant information, click on the tenant's name to take you to the Profile page, where
                            you can
                            see the reviews from other car owners for the tenant (in case the tenant has had a trip on
                            Yotrip )
                            Note *: Response rate (% of responses / total car rental requests), Response time, Agree rate
                            will
                            affect your car rating results on the app, thereby directly affecting your vehicle's rating.
                            Next, the
                            customer can book a car, so car owners need to actively update their busy schedule, and
                            regularly
                            respond to customers' car rental requests as soon as possible.

                            Car booking notification via sms

                            Notice of booking a car through the application

                            View tenant profile page

                            Agree/Reject rental request

                            Notice of booking a car through the application

                            View tenant profile page

                            Agree/Reject rental request
                            After the owner responds, the tenant will receive a notification via the application and SMS via
                            phone.
                            In case the car owner agrees to lease the car, the lessee will make a deposit to complete the
                            car rental
                            process.
                            "Note**: After the car owner agrees to rent, during the time the tenant makes a deposit, the car
                            owner
                            has the right to agree to other car rental requests on Yotrip, the system will give priority to
                            the
                            customers. Who makes the earliest deposit?
                            In case the car owner receives other car rental requests outside the system, the car owner
                            should pay
                            attention to update the busy schedule right on the system before the customer makes a deposit."
                            The car owner and tenant will receive phone number information so that they can directly
                            exchange and
                            verify documents and rental schedule after the tenant successfully makes a deposit.
                            "Note ***: Car owners and tenants need to actively contact each other to verify the rental
                            procedures,
                            in case there is a problem or change the rental plan, it is necessary to cancel the trip within
                            1 hour.
                            from the time of deposit so as not to be charged a cancellation fee.
                            In case of cancellations outside of 1 hour after deposit, the fee will be charged according to
                            the
                            "Cancellation Policy" which has been officially applied and registered on Yotrip's <a
                                href="https://www.mioto.vn/privacy#canceltrip">webiste here.</a> "
                        </li>
                    </ol>
                    {{-- D --}}
                    <span class="subheading">
                        D. Cancellation Instructions</span>
                    <ol>
                        <li>
                            <p class="md-4">
                                <b>Cancel the trip before the customer makes a deposit:</b> <br>
                                This situation occurs when the car owners change the rental plan, there is a mistake in
                                checking the bus
                                schedule, so they agree to the rental and then cancel the trip, or the car owner has
                                received another
                                tenant in the past. Waiting time for customers to deposit.
                                To cancel the trip, the car owner accesses the Yotrip application, selects "Notifications" →
                                selects
                                "Upcoming" → selects the trip you want to cancel to take to the "Rental Details" page →
                                click "Cancel
                                trip" .
                                Cancel the trip after the customer has made a deposit:
                                This can happen because of reasons from the car owner such as the car has a problem or from
                                the tenant
                                side such as the customer does not have all the required documents. To cancel a trip, car
                                owners need to
                                follow these steps: <br>
                                1. The car owner please call to notify and discuss with the tenant about the cancellation of
                                the trip so
                                that the tenant can actively arrange work and change the travel schedule in time. <br>
                                2. Cancel a trip on the system: The car owner accesses the Yotrip application, selects
                                "Notifications" →
                                selects "Upcoming" → selects the trip you want to cancel to go to the "Rental details" page
                                → click
                                "Cancel trip". At the cancellation page, please select "Reason for cancellation" and clearly
                                explain the
                                reason for cancellation in the text, then click cancel. Specifying the reason for the
                                cancellation of
                                the trip will help the admin clearly determine the reason for the cancellation of the trip
                                belongs to
                                the owner or the lessee, so that there can be appropriate records in handling canceled
                                trips, accurately
                                calculating sales for the car owner.
                                As soon as the car owner cancels the trip, the system will send a notice to the tenant about
                                the car
                                owner's cancellation as well as the reason and the message the car owner sends to the
                                tenant."
                                According to the <a href="https://www.mioto.vn/privacy#canceltrip">"Cancellation Policy"</a>
                                published
                                in the Operation Regulations on the website Yotrip.vn,
                                the cancellation of the trip by the car owner after the customer has made a deposit may
                                result in a
                                cancellation fee and affect the evaluation score of the customer. car owners on the Yotrip
                                system, so
                                car owners need to consider and check carefully before canceling the trip. <br>

                            </p>
                        </li>
                        <li>
                            <p class="md-4">
                                <b>Actions on the website</b> <br>
                                Select a trip under "Notifications" → "Upcoming"

                                Select "Cancel Trip"

                                Select the reason, specify the content and confirm the cancellation
                                Action on the app

                                Select a trip under "Notifications" → "Upcoming"

                                Select "Cancel Trip"

                                Select the reason, specify the content and confirm the cancellation <br>

                            </p>
                        </li>
                        <li>
                            <p class="md-4">
                                <b>Action on the app</b> <br>
                                Select a trip under "Notifications" → "Upcoming"

                                Select "Cancel Trip"

                                Select the reason, specify the content and confirm the cancellation <br>
                            </p>
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
