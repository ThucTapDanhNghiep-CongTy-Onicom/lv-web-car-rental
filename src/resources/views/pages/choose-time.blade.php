@extends('layouts.app')
@section('content')
    @php
    $photos = explode(',', $cars->photo);
    $encode = encrypt($cars->id);

    if ($cars->discount != 0) {
        $percent = (100 - $cars->discount) / 100;
        $priceCookie = $cars->price * $percent + $cars->service_charge + $cars->insurance_fees;
    } else {
        $priceCookie = $cars->price + $cars->service_charge + $cars->insurance_fees;
    }
    if ($cars->discount != 0) {
        $percent = (100 - $cars->discount) / 100;
        $price = $cars->price * $percent;
    } else {
        $price = $price = $cars->price;
    }

    @endphp

    <link rel="stylesheet" href="{{ asset('/ui/css/splide.css') }}">
    <div class="hero-wrap-3 ftco-degree-bg" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
    </div>
    <!-- Booking Start-->
    <section class="ftco-section ftco-no-pt bg-light">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-12 feature-top">
                    <div class="row no-gutters">
                        <div class="col-md-8 d-flex align-items-center mb-5">
                            <div class="container-sm">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="car-details">
                                            <div class="img rounded">
                                                <div class="splide">
                                                    <div class="splide__track">
                                                        @if (count($photos) != 1)
                                                            <ul class="splide__list">
                                                                @if (count($photos) <= 5 && count($photos) >= 1)
                                                                    @foreach ($photos as $photo)
                                                                        @if ($photo)
                                                                            <li class="splide__slide snip0019">
                                                                                <img src="<?= $photo ?>"
                                                                                    class="img-fluid" alt="">
                                                                            </li>
                                                                        @endif
                                                                    @endforeach
                                                                @else
                                                                    @for ($i = 0; $i < 5; $i++)
                                                                        <li class="splide__slide snip0019">
                                                                            <img src="<?= $photos[$i] ?>"
                                                                                class="img-fluid" alt="">
                                                                        </li>
                                                                    @endfor
                                                                @endif

                                                            </ul>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text text-center">
                                                <h2 class="text-22">{{ $cars->name }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row mt-5 mb-4">
                                            <div class="col-3 avatar-owner">
                                                @if (!empty($cars->user->social_type) == 'google')
                                                    <a class="link-profile" href="{{ route('profileOwner') }}">
                                                        <img src="<?= $cars->user->photo ?>" class="img-fluid" alt="ss"
                                                            style="border-radius: 50%;width: 100px;height: 100px;display: block;margin: 0px auto;">
                                                    </a>
                                                @elseif (empty($cars->user->social_type))
                                                    <a class="link-profile" href="{{ route('profileOwner') }}">
                                                        <img class="img-fluid"
                                                            src="{{ asset('/backend/assets/images/users/user-1.jpg') }}"
                                                            alt="Header Avatar"
                                                            style="border-radius: 50%;width: 100px;height: 100px;display: block;margin: 0px auto;">
                                                    </a>
                                                @else
                                                    @if ($cars->user->photo)
                                                        <a class="link-profile" href="{{ route('profileOwner') }}">
                                                            <img src="<?= $cars->user->photo ?>" class="img-fluid"
                                                                alt=""
                                                                style="border-radius: 50%;width: 100px;height: 100px;display: block;margin: 0px auto;">
                                                        </a>
                                                    @else
                                                        <a class="link-profile" href="{{ route('profileOwner') }}">
                                                            <img class="img-fluid"
                                                                src="{{ asset('/backend/assets/images/users/user-1.jpg') }}"
                                                                alt="Header Avatar"
                                                                style="border-radius: 50%;width: 100px;height: 100px;display: block;margin: 0px auto;">
                                                        </a>
                                                    @endif
                                                @endif

                                            </div>
                                            <div class="col-9 detail-owner">
                                                @if (!empty($cars->user->name))
                                                    <a class="link-profile" href="{{ route('profileOwner') }}">
                                                        <p>{{ $cars->user->name }}</p>
                                                    </a>
                                                @else
                                                    <p>TestYotrip</p>
                                                @endif
                                                <!-- Tính tổng rate trung bình  -->
                                                @php
                                                    $numberRate = DB::table('reviews')
                                                        ->where('cars_id', $cars->id)
                                                        ->count();
                                                    $sumRating = DB::table('reviews')
                                                        ->where('cars_id', $cars->id)
                                                        ->sum('rate');
                                                    $itemAge = 0;
                                                    if ($numberRate != 0) {
                                                        $itemAge = round($sumRating / $numberRate, 2);
                                                    }
                                                @endphp

                                                <div class="wrapper">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <i class="ion-ios-star {{ $i <= $itemAge ? 'active' : '' }}"></i>
                                                    @endfor

                                                </div>

                                                <!-- Số chuyến đi -->
                                                @php
                                                    $icheck = false;
                                                    
                                                    $count = DB::table('bookings')
                                                        ->where('status', 'active')
                                                        ->where('cars_id', $cars->id)
                                                        ->count();
                                                @endphp


                                                <span class="value">

                                                    <?= str_pad($count, 2, '0', STR_PAD_LEFT) ?> trip

                                                </span>

                                                <div>
                                                    Address : {{ $cars->address }} <br>
                                                    @if (!empty($cars->user->phone))
                                                        Phone : {{ $cars->user->phone }}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="info-owner mt-5">
                                            <p>
                                                {!! $cars->rules !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex align-items-start j-center">
                            <form action="{{ route('car.payment', $encode) }}" class="request-form-2 ftco-animate"
                                method="post">
                                @csrf
                                <h2 class="text-center">
                                    <?= number_format($price ?? 0, 0, ',', '.') . ' VNĐ ' ?><span>/ day</span>
                                </h2>
                                <div class="form-group">
                                    <label for="" class="label">Pick-up location</label>
                                    <input type="text" class="form-control" id="address_on" name="address_on"
                                        placeholder="City, Airport, Station, etc">
                                </div>
                                <div class="form-group">
                                    <label for="" class="label">Drop-off location</label>
                                    <input type="text" class="form-control" name="address_off"
                                        placeholder="City, Airport, Station, etc">
                                </div>
                                <div class="d-flex">
                                    <div class="form-group mr-2">
                                        <label for="" class="label">Pick-up date</label>
                                        <input type="date" class="form-control" name="date_start"
                                            value="<?= date('Y-m-d') ?>">

                                    </div>
                                    <div class="form-group ml-2">
                                        <label for="" class="label">Pick-up time</label>
                                        <input type="text" class="form-control" name="time_start" id="time_pick"
                                            value="21:00pm" placeholder="Time">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="form-group mr-2">
                                        <label for="" class="label">Drop-off date</label>
                                        <input type="date" id="change-date" class="form-control" name="date_end"
                                            value="<?= date('Y-m-d', strtotime('+1 day', strtotime(date('Y-m-d')))) ?>">

                                    </div>
                                    <div class="form-group ml-2">
                                        <label for="" class="label">Drop-off time</label>
                                        <input type="text" class="form-control" name="time_end" id="time_drop"
                                            value="20:00pm" placeholder="Time">

                                    </div>
                                </div>
                                <select name="zipcode" class="form-control">
                                    <label for="" class="label">Counpon</label>
                                    <option value=""> Choose a discount code
                                    </option>
                                    @foreach ($coupons as $coupon)
                                        <option value="{{ $coupon->discount_sale }}"> {{ $coupon->zipcode }} ->
                                            (discount
                                            {{ $coupon->discount_sale }}%)
                                        </option>
                                    @endforeach
                                </select>

                                <div class="form-group detail-price mt-3">
                                    <h3 class="mb-3">Price details</h3>

                                    <div class="row mb-3">
                                        <div class="col-6">Rental unit price</div>
                                        <div class="col-6 text-right">
                                            <?= number_format($price, 0, ',', '.') . ' VNĐ' ?>/ day</div>
                                    </div>

                                    @if ($cars->discount != 0)
                                        <div class="row mb-3">
                                            <div class="col-6">Discount Program</div>
                                            <div class="col-6 text-right" style="text-decoration-line: line-through;">
                                                <?= number_format($cars->price, 0, ',', '.') . ' VNĐ' ?>/ day</div>
                                        </div>
                                    @endif
                                    {{-- Phí ngoài luồng --}}
                                    <div class="row mb-3">
                                        @if ($cars->service_charge)
                                            <div class="col-6">Service charge</div>

                                            <div class="col-6 text-right" name="service_charge">
                                                <?= number_format($cars->service_charge, 0, ',', '.') . ' VNĐ' ?>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="row mb-3" style="border-bottom: 1px solid #AF2D23;">
                                        @if ($cars->insurance_fees)
                                            <div class="col-6">Insurance fees</div>
                                            <div class="col-6 text-right" name="insurance_fees">
                                                <?= number_format($cars->insurance_fees, 0, ',', '.') . ' VNĐ' ?>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="row mb-3" style="border-bottom: 1px solid #AF2D23;">
                                        <div class="col-6">Total car rental fee</div>
                                        <div class="col-6 text-right">
                                            <?= number_format($price, 0, ',', '.') . ' VNĐ' ?>
                                            <span style="font-weight: bold; color: #1f1f1f;" id="day">
                                                x 1 day
                                            </span>
                                        </div>
                                    </div>

                                    {{-- end unit price --}}
                                    @php
                                        $total = $price + $cars->service_charge + $cars->insurance_fees;
                                    @endphp
                                    <div class="row total mb-3">
                                        <div class="col-6">Total</div>

                                        <div class="col-6 text-right">
                                            <div class="price-total" id="priceSl">
                                                <?= number_format($total, 0, ',', '.') . ' VNĐ' ?>
                                            </div>
                                        </div>
                                        <input type="hidden" id="test" name="total_amount" value="{{ $total }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Rent A Car Now" class="btn btn-orange py-3 px-4">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" id="a" value="<?= date('Y-m-d') ?>">
        <input type="hidden" id="b" value="<?= date('Y-m-d', strtotime('+1 day', strtotime(date('Y-m-d')))) ?>">
        <p id='demo'></p>
    </section>
    <!-- Booking End -->

    <style>
        .wrapper .active {
            color: #E85626 !important;
            position: relative;
        }

        .wrapper {
            position: relative;
            bottom: 15px;
            left: 0;
            right: 0;
            display: inline-block;
            border: none;
            font-size: 20px;
            padding-top: -74px;
            margin-left: -2px;
        }

        .value {
            position: relative;
            left: 55px;
            top: -15px;
            right: 0;
            bottom: 0;
        }

        .break-height {
            width: 20px;
            height: 1px;
            background-color: #141414;

        }

    </style>

    <!-- Footer -->
    @include('partials.footer')

    <script src="{{ asset('/ui/js/detailSlide.js') }}"></script>
    <script>
        // geolocation Object: enableHighAccuracy, timeout, maximumAge 
        //https://developer.mozilla.org/en-US/docs/Web/API/Geolocation/getCurrentPosition
        var options = {
            enableHighAccuracy: true,
            timeout: 5000,
            maximumAge: 0
        };

        function success(pos) {
            const lat = pos.coords.latitude;
            const long = pos.coords.longitude;
            var value = $('#address_on');
            var requestOptions = {
                method: 'GET',
            };
            fetch("https://maps.googleapis.com/maps/api/geocode/json?latlng=" + lat + "," + long +
                    "&key={{ env('GOOGLE_MAPS_API_KEY') }}", requestOptions)
                .then(
                    response => response.json()
                )
                .then((data) => {
                    for (let i = 0; i <= 1; i++) {
                        value.val(data.results[i].formatted_address);
                    }
                })
                .catch(
                    error => console.log('error', error)
                );
        }

        function error(err) {
            //console.warn(`ERROR(${err.code}): ${err.message}`);
            alert(`${err.message}`);
        }
        navigator.geolocation.getCurrentPosition(success, error, options);
    </script>

    <script>
        var change = document.getElementById('change-date');
        change.onchange = function() {
            document.getElementById('b').value = this.value;
        }

        // var days = (b - a) / 1000 / 60 / 60 / 24;
        $(document).ready(function() {
            var day_start = new Date();

            $("#change-date").change(function(event) {
                var day_end = $('#b').val();
                var str = day_end.substr(8, 2);
                var days = (str - day_start.getDate());
                var total = {{ $priceCookie }} * days;

                $('#priceSl').text(total + ' VNĐ');
                $('#test').val(total);
                $('#day').text('x ' + days + ' day');
            });
        });

        // days = days - (b.getTimezoneOffset() - b.getTimezoneOffset()) / (60 * 24);
        // console.log(days);
    </script>
@endsection
