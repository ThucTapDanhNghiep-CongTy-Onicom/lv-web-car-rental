@extends('layouts.app')
@section('content')
    @php
    if (isset($cars->photo)) {
        $photos = explode(',', $cars->photo);
    }

    @endphp
    <!-- Booking Start-->
    <section id="choose-pay" class="ftco-section bg-light">
        <div class="container">
            <div class="row no-gutters mt-5">
                <div class="col-md-12 payment-car">
                    <div class="row">

                        <div class="col-md-4 col-sm-12">
                            <div class="info-top">
                                <div class="row">
                                    <div class="col-4 img-car pt-2" style="padding-right: 10px;">
                                        <img src="{{ $photos[0] }}" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-8">
                                        <h5>{{ $cars->name }}</h5>
                                        <div class="row no-gutters content-detail">
                                            <div class="col-6">
                                                <p><i class="fa fa-car"></i>Gasoline</p>
                                                <p><i class="fa fa-gas-pump"></i>8l/100km</p>
                                            </div>
                                            <div class="col-6">
                                                <p><i class="fa fa-cogs"></i>Luggage</p>
                                                <p><i class="fa fa-couch"></i>Seats {{ $cars->seat }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row info-owner text-dark">
                                    <div class="col-4">
                                        <p>Car Owner</p>
                                    </div>
                                    <div class="col-8">
                                        @if(!empty($cars->user->name))
                                        <p>{{ $cars->user->name }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row text-dark info-owner mt-s-1">
                                    <div class="col-4">
                                        <p>Phone</p>
                                    </div>
                                    <div class="col-8">
                                        @if(!empty($cars->user->name))
                                        <p>{{ $cars->user->phone }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="content-line"></div>
                                <div class="row text-dark">
                                    <div class="col-12 rent-time">
                                        <div class="row">
                                            <div class="col-4 title-pick">
                                                <i class="fas fa-map-marker-alt"></i> Pick-up
                                            </div>
                                            <div class="col-8 location-pick">
                                                <div style="font-size: 16px;font-weight: 500;">{{ $booking['address_on'] }}</div>
                                                <div class="pre-time">
                                                    @php
                                                        $date = $booking['date_start'];
                                                        $my_date = date('d/m/Y', strtotime($date));
                                                    @endphp

                                                    <div class="rent-day">{{ $my_date }}</div>
                                                    <div class="rent-time">{{ $booking['time_start'] }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-4 title-pick">
                                                <i class="fas fa-map-marker-alt"></i> Drop-off
                                            </div>
                                            <div class="col-8 location-pick">
                                                <div style="font-size: 16px;font-weight: 500;">{{ $booking['address_off'] }}</div>
                                                @php
                                                    $date = $booking['date_end'];
                                                    $end_date = date('d/m/Y', strtotime($date));
                                                @endphp
                                                <div class="pre-time">
                                                    <div class="rent-day">{{ $end_date }}</div>
                                                    <div class="rent-time">{{ $booking['time_end'] }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="info-bottom mt-3 mb-4">
                                <div class="content">
                                    <h5>Payment Details</h5>
                                    <div class="content-item">
                                        <div>1 day</div>
                                        <div style="text-align: right;">
                                            <?= number_format($booking['total_amount'], 0, ',', '.') . ' VNĐ' ?></div>
                                    </div>
                                    
                                    @php
                                        
                                        $discount = 100 - $booking['zipcode'];
                                        
                                        $transfer = $discount / 100;
                                        
                                        $total = $booking['total_amount'] + $transfer;
                                        
                                        $sale = $total;
                                        
                                        $showsale = $total - $sale;
                                        
                                    @endphp
                                    <div class="content-item">
                                        <div>Counpon</div>
                                        <div style="text-align: right;">-
                                            <?= number_format($showsale, 0, ',', '.') . ' VNĐ' ?></div>
                                    </div>
                                   
                                </div>
                                <div class="content-total">
                                    <div class="content">
                                        <div class="content-item">
                                            <div>Total</div>

                                            <div style="text-align: right;">
                                                <?= number_format($sale, 0, ',', '.') . ' VNĐ' ?></div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="contact-payment" class="col-md-8 col-sm-12">
                            <form action="{{ route('car.paymentbook', $cars->id) }}" method="POST"
                                class="request-form ftco-animate">
                                @csrf
                                <input type="text" name="total" value="{{ $booking['total_amount'] }}"
                                    id="" hidden>
                                <h4 class="border-bt">Contact Information</h4>
                                <div class="form-group">
                                    <label for="" class="label">First name</label>
                                    <input type="text" name="firstname" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="" class="label">Last name</label>
                                    <input type="text" name="lastname" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="" class="label">Phone number</label>
                                    <input type="number" name="phone" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="" class="label">Email</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                                <button type="submit" name="payment" class="pay-now" value="2">Pay Now</button>
                            </form>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="payment-select request-form ftco-animate"
                                        style="border: 1px solid #BD8522; border-radius: 0px !important;">
                                        <h4 class="border-bt">Select your payment method <span
                                                style="font-size: 16px;">(Click one option
                                                below)</span></h4>
                                        <div class="row payment-visa mt-4">
                                            <div class="col">
                                                <nav>
                                                    <div class="nav nav-pills nav-underline mb-5 animated"
                                                        data-animation="fadeInUpShorter" data-animation-delay="0.5s"
                                                        id="myTab" role="tablist">
                                                        <a href="#ico" class="nav-item nav-link" id="ico-tab"
                                                            data-toggle="tab" aria-controls="ico" aria-selected="false"
                                                            role="tab">Credit Card</a>
                                                        <a href="#token" class="nav-item nav-link" id="token-tab"
                                                            data-toggle="tab" aria-controls="token" aria-selected="false"
                                                            role="tab">
                                                            <img src="../ui/images/vn-pay.png" alt="VN Pay"
                                                                class="img-fluid" width="40px" height="20px">
                                                            VNPay</a>
                                                        <a href="#client1" class="nav-item nav-link" id="client-tab"
                                                            data-toggle="tab" aria-controls="client" aria-selected="false"
                                                            role="tab">
                                                            <img src="../ui/images/logo-momo.jpg" alt="Momo"
                                                                class="img-fluid" width="20px" height="20px">
                                                            Momo</a>
                                                        <a href="#general" class="nav-item nav-link active" id="general-tab"
                                                            data-toggle="tab" aria-controls="general" aria-selected="true"
                                                            role="tab">Bank transfer</a>
                                                        <a href="#biswap" class="nav-item nav-link" id="biswap-tab"
                                                            data-toggle="tab" aria-controls="biswap" aria-selected="false"
                                                            role="tab">Crypto</a>

                                                    </div>
                                                </nav>
                                                <div class="tab-content" id="myTabContent">

                                                    <div class="tab-pane fade" id="token" role="tabpanel"
                                                        aria-labelledby="token-tab">
                                                        <div id="token-accordion"
                                                            class="collapse-icon accordion-icon-rotate">
                                                            <div class="card">
                                                                <div class="vn-pay-item">
                                                                    <div class="row">
                                                                        <div class="col-md-3 col-sm-4 col-576-3">
                                                                            <img src="../ui/images/vietcombanklogo.png"
                                                                                class="img-fluid p-2" alt="VietcomBank"
                                                                                onclick="this.style.border = '1px solid #000';">
                                                                        </div>
                                                                        <div class="col-md-3 col-sm-4 col-576-3">
                                                                            <img src="../ui/images/ACB-bank.png"
                                                                                class="img-fluid p-2" alt="ACB">
                                                                        </div>
                                                                        <div class="col-md-3 col-sm-4 col-576-3">
                                                                            <img src="../ui/images/vp-bank.png"
                                                                                class="img-fluid p-2" alt="VP Bank">
                                                                        </div>
                                                                        <div class="col-md-3 col-sm-4 col-576-3">
                                                                            <img src="../ui/images/SacombankLogo.png"
                                                                                class="img-fluid p-2" alt="Sacombank">
                                                                        </div>

                                                                        <div class="col-md-3 col-sm-4 col-576-3">
                                                                            <img src="../ui/images/angibak.png"
                                                                                class="img-fluid p-2" alt="Agribank">
                                                                        </div>
                                                                        <div class="col-md-3 col-sm-4 col-576-3">
                                                                            <img src="../ui/images/abbank.jpg"
                                                                                class="img-fluid p-2" alt="ABBank">
                                                                        </div>
                                                                        <div class="col-md-3 col-sm-4 col-576-3">
                                                                            <img src="../ui/images/techcombank.jpg
                                                                " class="img-fluid p-2" alt="Techcombank">
                                                                        </div>
                                                                        <div class="col-md-3 col-sm-4 col-576-3">
                                                                            <img src="../ui/images/baovietbank-amp.jpg"
                                                                                class="img-fluid p-2" alt="Bao Viet Bank">
                                                                        </div>
                                                                        <div class="col-md-3 col-sm-4 col-576-3">
                                                                            <img src="../ui/images/SHB-bank.jpg"
                                                                                class="img-fluid p-2" alt="SHB Bank">
                                                                        </div>

                                                                        <div class="col-md-3 col-sm-4 col-576-3">
                                                                            <img src="../ui/images/HSBC.jpg"
                                                                                class="img-fluid p-2" alt="HSBC Bank">
                                                                        </div>
                                                                        <div class="col-md-3 col-sm-4 col-576-3">
                                                                            <img src="../ui/images/BIDV.jpg"
                                                                                class="img-fluid p-2" alt="BIDV">
                                                                        </div>
                                                                        <div class="col-md-3 col-sm-4 col-576-3">
                                                                            <img src="../ui/images/MB-bank.png"
                                                                                class="img-fluid p-2" alt="MB Bank">
                                                                        </div>
                                                                        <div class="col-md-3 col-sm-4 col-576-3">
                                                                            <img src="../ui/images/lien-viet-bank.png"
                                                                                class="img-fluid p-2"
                                                                                alt="Lien Viet Post Bank">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="tab-pane fade" id="client1" role="tabpanel"
                                                        aria-labelledby="client-tab">
                                                        <div id="client-accordion"
                                                            class="collapse-icon accordion-icon-rotate">

                                                            <div class="card">
                                                                <span class="text-dark">You will be redirected to Momo
                                                                    to
                                                                    complete your purchase</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="tab-pane fade show active" id="general" role="tabpanel"
                                                        aria-labelledby="general-tab">
                                                        <div id="general-accordion"
                                                            class="collapse-icon accordion-icon-rotate">
                                                            <div class="card animated" data-animation="fadeInUpShorter"
                                                                data-animation-delay="0.1s">
                                                                <div class="card bank-transfer">
                                                                    <p>Guarantee 100% safety when paying by bank transfer.
                                                                        Please enter your information
                                                                        and transfer to the account below. We will contact
                                                                        you as soon as possible to
                                                                        confirm and activate your account.</p>
                                                                    <p>Account Name: Vietnam Masters Co., Ltd</p>
                                                                    <p>Bank: VP Bank Ben Thanh branch</p>
                                                                    <p>Account number: 220546039</p>
                                                                    <p>Transfer syntax: Name + Email (if any) + Phone number
                                                                    </p>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!--Bitcoin-->
                                                    <div class="tab-pane fade" id="biswap" role="tabpanel"
                                                        aria-labelledby="biswap-tab">
                                                        <div id="token-accordion"
                                                            class="collapse-icon accordion-icon-rotate">
                                                            <div class="card">
                                                                <form action="#" class="ftco-animate">
                                                                    <div class="form-group">
                                                                        <input type="search" name="Search" id=""
                                                                            class="form-control"
                                                                            placeholder="Enter Token/Coin name">
                                                                    </div>
                                                                </form>
                                                                <div class="row coin text-dark">
                                                                    <div
                                                                        class="coin-item col-mx-992 col-sm-6 col-992-6 mt-3">
                                                                        <div class="d-flex">
                                                                            <div>
                                                                                <img src="../ui/images/bitcoin.jpg"
                                                                                    class="img-fluid rounded-circle"
                                                                                    alt="Bitcoin">
                                                                            </div>
                                                                            <div class="coin-name">Bitcoin (BTC)</div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="coin-item col-mx-992 col-sm-6 col-992-6 mt-3">
                                                                        <div class="d-flex">
                                                                            <div>
                                                                                <img src="../ui/images/BUSD.png"
                                                                                    class="img-fluid rounded-circle"
                                                                                    alt="BUSD">
                                                                            </div>
                                                                            <div class="coin-name">BUSD (Erc20)</div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="coin-item col-mx-992 col-sm-6 col-992-6 mt-3">
                                                                        <div class="d-flex">
                                                                            <div>
                                                                                <img src="../ui/images/dash.jpg"
                                                                                    class="img-fluid rounded-circle"
                                                                                    alt="DASH">
                                                                            </div>
                                                                            <div class="coin-name">Dash (Dash)</div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="coin-item col-mx-992 col-sm-6 col-992-6 mt-3">
                                                                        <div class="d-flex">
                                                                            <div>
                                                                                <img src="../ui/images/ethenium.png"
                                                                                    class="img-fluid rounded-circle"
                                                                                    alt="Ethereum">
                                                                            </div>
                                                                            <div class="coin-name">Ethereum (ETH)
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="coin-item col-mx-992 col-sm-6 col-992-6 mt-3">
                                                                        <div class="d-flex">
                                                                            <div>
                                                                                <img src="../ui/images/litecoin.jpg"
                                                                                    class="img-fluid rounded-circle"
                                                                                    alt="Lite coin">
                                                                            </div>
                                                                            <div class="coin-name">Litecoin (BTC)
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="coin-item col-mx-992 col-sm-6 col-992-6 mt-3">
                                                                        <div class="d-flex">
                                                                            <div>
                                                                                <img src="../ui/images/XRP.svg"
                                                                                    class="img-fluid rounded-circle"
                                                                                    alt="XRP">
                                                                            </div>
                                                                            <div class="coin-name">XRP (XRP)</div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="coin-item col-mx-992 col-sm-6 col-992-6 mt-3">
                                                                        <div class="d-flex">
                                                                            <div>
                                                                                <img src="../ui/images/TRON.png"
                                                                                    class="img-fluid rounded-circle"
                                                                                    alt="TRON">
                                                                            </div>
                                                                            <div class="coin-name">TRON (TRX)</div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="coin-item col-mx-992 col-sm-6 col-992-6 mt-3">
                                                                        <div class="d-flex">
                                                                            <div>
                                                                                <img src="../ui/images/trueUSD.png"
                                                                                    class="img-fluid rounded-circle"
                                                                                    alt="TRUEUSD">
                                                                            </div>
                                                                            <div class="coin-name">TrueUSD (TUSD)
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="coin-item col-mx-992 col-sm-6 col-992-6 mt-3">
                                                                        <div class="d-flex">
                                                                            <div>
                                                                                <img src="../ui/images/USD-coin.png"
                                                                                    class="img-fluid rounded-circle"
                                                                                    alt="USD coin">
                                                                            </div>
                                                                            <div class="coin-name">USD Coin (USDC)
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="coin-item col-mx-992 col-sm-6 col-992-6 mt-3">
                                                                        <div class="d-flex">
                                                                            <div>
                                                                                <img src="../ui/images/stellar.png"
                                                                                    class="img-fluid rounded-circle"
                                                                                    alt="Stellar">
                                                                            </div>
                                                                            <div class="coin-name">Stellar (XLM)</div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="coin-item col-mx-992 col-sm-6 col-992-6 mt-3">
                                                                        <div class="d-flex">
                                                                            <div>
                                                                                <img src="../ui/images/DAI.png"
                                                                                    class="img-fluid rounded-circle"
                                                                                    alt="DAI coin">
                                                                            </div>
                                                                            <div class="coin-name">DAI (DAI)</div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="coin-item col-mx-992 col-sm-6 col-992-6 mt-3">
                                                                        <div class="d-flex">
                                                                            <div>
                                                                                <img src="../ui/images/cardano.jpg"
                                                                                    class="img-fluid rounded-circle"
                                                                                    alt="Cardano">
                                                                            </div>
                                                                            <div class="coin-name">Cardano (ADA)</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="ico" role="tabpanel"
                                                        aria-labelledby="ico-tab">
                                                        <div id="ico-accordion"
                                                            class="collapse-icon accordion-icon-rotate">
                                                            <div class="card">
                                                                <div class="credit-card-item">
                                                                    <img src="../ui/images/visa-mastercard.png"
                                                                        alt="Master card" class="img-fluid"
                                                                        width="150px" height="35px">
                                                                    <p>Important: Please fill out your credit/debit card
                                                                        details below to pay for your
                                                                        booking in a simple and secure way.</p>
                                                                    <form action="#" class="request-form ftco-animate">
                                                                        <div class="form-group">
                                                                            <label for="" class="label">Card
                                                                                number</label>
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="" class="label">Name of
                                                                                card</label>
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                        <div class="d-flex" style="width: 100%;">
                                                                            <div class="form-group"
                                                                                style="width: 59%;margin-right: 15px;">
                                                                                <label for=""
                                                                                    class="label">Expiration</label>
                                                                                <input type="text" class="form-control">
                                                                            </div>
                                                                            <div class="form-group"
                                                                                style="width: 39%;">
                                                                                <label for=""
                                                                                    class="label">CCV/CVV</label>
                                                                                <input type="text" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="payment-select request-form ftco-animate"
                                        style="border: 1px solid #BD8522; border-radius: 0px !important;">
                                        <h4 class="border-bt mb-4">Reservation Terms and Booking Conditions</h4>
                                        <div class="text-b5">
                                            By completing this booking, you agree to the Booking Conditions, Terms and
                                            Conditions,
                                            and Privacy Policy.
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12 pay">
                                    <form action="">
                                        <input type="button" class="pay-now" value="Pay Now">

                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- Booking End -->

    <!-- Choose car Start -->
    <section class="ftco-section ftco-no-pt">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                    <span class="subheading">Choose Car</span>
                    <h2 class="mb-2">Related Cars</h2>
                </div>
            </div>
            <div class="row">
                @if ($cars != null)
                    @foreach ($cars->rel_prods as $car)
                        @php
                            $photos = explode(',', $car->photo);
                            $encode = encrypt($car->id);
                        @endphp
                        <div class="col-md-4">
                            <div class="car-wrap rounded ftco-animate">
                                <div class="img rounded d-flex align-items-end"
                                    style="background-image: url('<?= $photos[0] ?>');">
                                </div>
                                <div class="text">
                                    <h2 class="mb-0"><a
                                            href="{{ route('car.detail', $encode) }}">{{ $car->name }}</a></h2>
                                    <div class="d-flex mb-3">
                                        <span class="cat">{{ $car->render->manu_name }}</span>
                                        <p class="price ml-auto">${{ number_format($car->price) }} <span>/day</span>
                                        </p>
                                    </div>
                                    <div class="wrapper">
                                        <input name="ratingRadio" type="radio" id="st1" value="1" />
                                        <label for="st1"></label>
                                        <input name="ratingRadio" type="radio" id="st2" value="2" />
                                        <label for="st2"></label>
                                        <input name="ratingRadio" type="radio" id="st3" value="3" />
                                        <label for="st3"></label>
                                        <input name="ratingRadio" type="radio" id="st4" value="4" />
                                        <label for="st4"></label>
                                        <input name="ratingRadio" type="radio" id="st5" value="5" />
                                        <label for="st5"></label>
                                    </div>
                                    <p class="d-flex mb-0 d-block"><a href="{{ route('car.booking', $encode) }}"
                                            class="btn btn-orange py-2 mr-1">Book now</a> <a
                                            href="{{ route('car.detail', $encode) }}"
                                            class="btn btn-gray py-2 ml-1">Details</a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="row mt-5">
                <div class="col text-center">
                    <div class="block-27">
                        <div class="form-group">
                            <a href="{{ route('car') }}"><input type="submit" value="All car"
                                    class="btn btn-orange py-2 px-5"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Choose car End -->


    <!-- Footer -->
    @include('partials.footer')
@endsection
