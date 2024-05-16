@extends('layouts.app')
@section('content')
    @php
    $photos = explode(',', $cars->photo);
    @endphp

    <link rel="stylesheet" href="{{ asset('/ui/css/splide.css') }}">
    <section class="hero-wrap hero-wrap-detail js-fullheight" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row no-gutters slider-text2 align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('car') }}">Car <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span
                            class="mr-2">{{ $cars->render->manu_name }} </span>
                    <h1 class="mb-3 bread">{{ $cars->name }}</h1>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section ftco-car-details">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="car-details">
                        <div class="img rounded">
                            <div class="splide">
                                <div class="splide__track">
                                    @if (count($photos) != 1)
                                        <ul class="splide__list">
                                            @if (count($photos) <= 5 && count($photos) >= 2)
                                                @foreach ($photos as $photo)
                                                    @if ($photo)
                                                        <li class="splide__slide snip0019">
                                                            <img src="<?= $photo ?>" class="img-fluid" alt="">
                                                        </li>
                                                    @endif
                                                @endforeach
                                            @else
                                                @for ($i = 0; $i < 5; $i++)
                                                    <li class="splide__slide snip0019">
                                                        <img src="<?= $photos[$i] ?>" class="img-fluid" alt="">
                                                    </li>
                                                @endfor
                                            @endif

                                        </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="text text-center">
                            @php
                                $count = 0;
                                if (Auth::user()) {
                                    $count = App\Models\Wishlists::where(['cars_id' => $cars->id, 'users_id' => Auth::user()->id])->count();
                                }
                            @endphp
                            <h2>
                                {{ $cars->name }}
                                @if ($count == '0')
                                    <a href="{{ route('wishlist.add', $cars->id) }}"
                                        style="position: relative;bottom: 10px;top: -5px;left: 0; right: 0;">
                                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                                    </a>
                                @else
                                    <a href="{{ route('wishlist.remove', $cars->id) }}"
                                        style="position: relative;bottom: 10px;top: -5px;left: 0; right: 0;">
                                        <i class="fa fa-heart-o" aria-hidden="true"
                                            style="background: #AF2D23;color: #fff;"></i>
                                    </a>
                                @endif
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md col-6 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services">
                        <div class="media-body py-md-4">
                            <div class="d-flex mb-3 align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="flaticon-dashboard"></span></div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        Mileage
                                        @if (!empty($cars->power))
                                            <span>{{ $cars->power }} Km/h</span>
                                        @else
                                            <span>Unknown</span>
                                        @endif

                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md col-6 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services">
                        <div class="media-body py-md-4">
                            <div class="d-flex mb-3 align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="flaticon-car-seat"></span></div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        Seats
                                        <span>{{ $cars->seat }} Adults</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md col-6 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services">
                        <div class="media-body py-md-4">
                            <div class="d-flex mb-3 align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="flaticon-backpack"></span></div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        Luggage
                                        @if (empty($cars->luggage))
                                            <span>Unknown</span>
                                        @else
                                            <span>{{ $cars->luggage }} Bags</span>
                                        @endif
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md col-6 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services">
                        <div class="media-body py-md-4">
                            <div class="d-flex mb-3 align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="flaticon-diesel"></span></div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        Fuel
                                        @if ($cars->fuel == 'petrol')
                                            <span>Petrol</span>
                                        @elseif ($cars->fuel == 'electricity')
                                            <span>Electricity</span>
                                        @elseif ($cars->fuel == 'oil')
                                            <span>Oil</span>
                                        @else
                                            <span>Unknown</span>
                                        @endif
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md col-6 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services">
                        <div class="media-body py-md-4">
                            <div class="d-flex mb-3 align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="flaticon-pistons"></span></div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        Transmission
                                        @if ($cars->range_of_vehicle == 1)
                                            <span>Automatical</span>
                                        @else
                                            <span>Manual</span>
                                        @endif
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="table-detail" class="row my-5">
                <div class="col-md-6">
                    <div class="row no-gutters">
                        <div class="col-md-7 table-detail">
                            <div class="td-title">Rental price list</div>
                            <div class="td-car-item">1-3</div>
                            <div class="td-car-item">5-9</div>
                            <div class="td-car-item">10-14</div>
                            <div class="td-car-item">15</div>
                            <div class="td-rental-item">Rent by month</div>
                        </div>

                        <div class="col-md-5 table-detail" style="border-left: 10px solid #fff;">
                            @if ($cars)
                                <div class="td-title">Rent cost</div>
                                <div class="td-car-item">
                                    <?= number_format($cars['one_to_three'], 0, ',', '.') . ' VNĐ' ?></div>
                                <div class="td-car-item">
                                    <?= number_format($cars['five_online'], 0, ',', '.') . ' VNĐ' ?></div>
                                <div class="td-car-item">
                                    <?= number_format($cars['ten_to_fourteen'], 0, ',', '.') . ' VNĐ' ?></div>
                                <div class="td-car-item">
                                    <?= number_format($cars['more_fifteen'], 0, ',', '.') . ' VNĐ' ?></div>
                                <div class="td-rental-item">
                                    <?= number_format($cars['price_month'], 0, ',', '.') . ' VNĐ' ?></div>
                            @else
                                <div class="td-title">Rent cost</div>
                                <div class="td-car-item"><?= number_format(500000, 0, ',', '.') . ' VNĐ' ?></div>
                                <div class="td-car-item"><?= number_format(500000, 0, ',', '.') . ' VNĐ' ?></div>
                                <div class="td-car-item"><?= number_format(500000, 0, ',', '.') . ' VNĐ' ?></div>
                                <div class="td-car-item"><?= number_format(500000, 0, ',', '.') . ' VNĐ' ?></div>
                                <div class="td-car-item"><?= number_format(500000, 0, ',', '.') . ' VNĐ' ?></div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6 table-detail table-right">
                    <div class="td-title">Time you want to rent the car</div>
                    <div class="table-right-content">
                        <div class="time-back">
                            <i class="fa fa-calendar-o" aria-hidden="true"></i>Date <span>></span> Back
                        </div>
                        <div class="tb-cost">
                            <div class="row" style="margin-bottom: -50px !important;">
                                <div class="col-9">
                                    <p>Estimated cost for 1 day</p>
                                </div>

                                <div class="col-3">
                                    <p><b><?= number_format($cars->price, 0, ',', '.') . 'VNĐ' ?></b></p>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: -10px !important;">
                                <div class="col-9">
                                    <p>Estimated cost</p>
                                </div>
                                <div class="col-3">
                                    <p><b><?= number_format($cars->price, 0, ',', '.') . 'VNĐ' ?></b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="td-submit">
                        @php
                            $encode = encrypt($cars->id);
                        @endphp
                        <a href="{{ route('car.booking', $encode) }}" class="btn"
                            style="color: #fff;width: 100%;background: #AF2D23;border-radius: 5px;adding: 10px !important;font-size: 20px; font-weight: 600;">
                            Rent It Now
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 pills">
                    <div class="bd-example bd-example-tabs">
                        <div class="d-flex justify-content-center">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-description-tab" data-toggle="pill"
                                        href="#pills-description" role="tab" aria-controls="pills-description"
                                        aria-expanded="true">Features</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill"
                                        href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer"
                                        aria-expanded="true">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review"
                                        role="tab" aria-controls="pills-review" aria-expanded="true">Review</a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content" id="pills-tabContent">
                            {{-- TODO: Product Features --}}
                            <div class="tab-pane fade show active" id="pills-description" role="tabpanel"
                                aria-labelledby="pills-description-tab">
                                <div class="row">
                                    <div class="col-md-4">
                                        <ul class="features">

                                            <li class="check">
                                                <span class="ion-ios-checkmark"></span>
                                                Sensors
                                            </li>
                                            <li class="check">
                                                <span class="ion-ios-checkmark"></span>
                                                Control parking
                                            </li>
                                            <li class="check">
                                                <span class="ion-ios-checkmark"></span>
                                                GPS
                                            </li>
                                            <li class="check">
                                                <span class="ion-ios-checkmark"></span>
                                                Luggage
                                            </li>
                                            <li class="check">
                                                <span class="ion-ios-checkmark"></span>
                                                Music
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="features">
                                            <li class="check"><span class="ion-ios-checkmark"></span>Seat Belt
                                            </li>
                                            <li class="remove"><span class="ion-ios-close"></span>Sleeping Bed
                                            </li>
                                            <li class="check"><span class="ion-ios-checkmark"></span>Water</li>
                                            <li class="check"><span class="ion-ios-checkmark"></span>Bluetooth
                                            </li>
                                            <li class="remove"><span class="ion-ios-close"></span>Onboard
                                                computer</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="features">
                                            <li class="check"><span class="ion-ios-checkmark"></span>Audio input
                                            </li>
                                            <li class="check"><span class="ion-ios-checkmark"></span>Long Term
                                                Trips</li>
                                            <li class="check"><span class="ion-ios-checkmark"></span>Car Kit</li>
                                            <li class="check"><span class="ion-ios-checkmark"></span>Remote
                                                central locking
                                            </li>
                                            <li class="check"><span class="ion-ios-checkmark"></span>Climate
                                                control</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            {{-- TODO: Product Description --}}
                            <div class="tab-pane fade" id="pills-manufacturer" role="tabpanel"
                                aria-labelledby="pills-manufacturer-tab">
                                {!! $cars->description !!}
                            </div>
                            {{-- TODO: Product Reviews --}}
                            <div class="tab-pane fade" id="pills-review" role="tabpanel"
                                aria-labelledby="pills-review-tab">
                                <div class="row">
                                    @php
                                        $numberRate = DB::table('reviews')
                                            ->where('cars_id', $cars->id)
                                            ->count();
                                        $sumRating = DB::table('reviews')
                                            ->where('cars_id', $cars->id)
                                            ->sum('rate');
                                    @endphp
                                    <div class="col-md-7">
                                        <!-- Hiển thị các đánh của khách hàng -->
                                        <h3 class="head">{{ $numberRate }} Reviews</h3>
                                        @foreach ($cars_review as $review)
                                            @if ($review->cars_id == $cars->id)
                                                @php
                                                    
                                                @endphp
                                                <div class="review d-flex">
                                                    @if ($review->user_info['social_type'] == 'google')
                                                        <div class="user-img"
                                                            style="background-image: url(<?= $review->user_info['photo'] ?>)">
                                                        </div>
                                                    @else
                                                        @if ($review->user_info['photo'])
                                                            <div class="user-img"
                                                                style="background-image: url(<?= $review->user_info['photo'] ?>)">
                                                            </div>
                                                        @else
                                                            <div class="user-img"
                                                                style="background-image: url({{ asset('/ui/images/person_1.jpg') }})">
                                                            </div>
                                                        @endif
                                                    @endif
                                                    <div class="desc">
                                                        <h4>
                                                            <span
                                                                class="text-left">{{ $review->user_info['name'] }}</span>
                                                            <span
                                                                class="text-right">{{ $review->created_at->format('D , m Y') }}</span>
                                                        </h4>
                                                        <div class="star">
                                                            @if ($review->rate <= 0)
                                                                <span>
                                                                    <i class="icon ion-ios-star-outline"></i>
                                                                    <i class="icon ion-ios-star-outline"></i>
                                                                    <i class="icon ion-ios-star-outline"></i>
                                                                    <i class="icon ion-ios-star-outline"></i>
                                                                    <i class="icon ion-ios-star-outline"></i>
                                                                </span>
                                                            @elseif($review->rate === 1)
                                                                <span>
                                                                    <i class="ion-ios-star"></i>
                                                                    <i class="icon ion-ios-star-outline"></i>
                                                                    <i class="icon ion-ios-star-outline"></i>
                                                                    <i class="icon ion-ios-star-outline"></i>
                                                                    <i class="icon ion-ios-star-outline"></i>
                                                                </span>
                                                            @elseif($review->rate === 2)
                                                                <span>
                                                                    <i class="ion-ios-star"></i>
                                                                    <i class="ion-ios-star"></i>
                                                                    <i class="icon ion-ios-star-outline"></i>
                                                                    <i class="icon ion-ios-star-outline"></i>
                                                                    <i class="icon ion-ios-star-outline"></i>
                                                                </span>
                                                            @elseif($review->rate === 3)
                                                                <span>
                                                                    <i class="ion-ios-star"></i>
                                                                    <i class="ion-ios-star"></i>
                                                                    <i class="ion-ios-star"></i>
                                                                    <i class="icon ion-ios-star-outline"></i>
                                                                    <i class="icon ion-ios-star-outline"></i>
                                                                </span>
                                                            @elseif($review->rate === 4)
                                                                <span>
                                                                    <i class="ion-ios-star"></i>
                                                                    <i class="ion-ios-star"></i>
                                                                    <i class="ion-ios-star"></i>
                                                                    <i class="ion-ios-star"></i>
                                                                    <i class="icon ion-ios-star-outline"></i>
                                                                </span>
                                                            @elseif($review->rate >= 5)
                                                                <span>
                                                                    <i class="ion-ios-star"></i>
                                                                    <i class="ion-ios-star"></i>
                                                                    <i class="ion-ios-star"></i>
                                                                    <i class="ion-ios-star"></i>
                                                                    <i class="ion-ios-star"></i>
                                                                </span>
                                                            @endif
                                                            <span class="text-right"><a href="#"
                                                                    class="reply"><i
                                                                        class="icon-reply"></i></a></span>
                                                        </div>
                                                        <div class="review-rate-reply">{{ $review->review }}</div>
                                                        @if ($review->reply)
                                                            <div class="review-rate-reply"
                                                                style="margin-left: -90px;background: #fafafa;height: 45px;line-height: 45px;">
                                                                {{ $review->reply }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                        <div class="review d-flex">
                                            <!-- Start form -->
                                            <form id="user-comment" action="{{ route('rate.add') }}"
                                                class="request-form" method="post">
                                                @csrf
                                                @if (Auth::check())
                                                    <input type="hidden" name="users_id" value="{{ Auth::User()->id }}">
                                                @endif
                                                <div class="desc">
                                                    <fieldset class="rating">

                                                        <input id="demo-1" type="radio" name="rate" value="1">
                                                        <label for="demo-1">1 star</label>
                                                        <input id="demo-2" type="radio" name="rate" value="2">
                                                        <label for="demo-2">2 stars</label>
                                                        <input id="demo-3" type="radio" name="rate" value="3">
                                                        <label for="demo-3">3 stars</label>
                                                        <input id="demo-4" type="radio" name="rate" value="4">
                                                        <label for="demo-4">4 stars</label>
                                                        <input id="demo-5" type="radio" name="rate" value="5">
                                                        <label for="demo-5">5 stars</label>

                                                        <div class="stars">
                                                            <label for="demo-1" aria-label="1 star" title="1 star"></label>
                                                            <label for="demo-2" aria-label="2 stars"
                                                                title="2 stars"></label>
                                                            <label for="demo-3" aria-label="3 stars"
                                                                title="3 stars"></label>
                                                            <label for="demo-4" aria-label="4 stars"
                                                                title="4 stars"></label>
                                                            <label for="demo-5" aria-label="5 stars"
                                                                title="5 stars"></label>
                                                        </div>

                                                    </fieldset>
                                                    <div class="form-group">
                                                        <input type="hidden" name="cars_id" class="form-control"
                                                            value="{{ $cars->id }}">
                                                    </div>
                                                    <div class="forn-group">
                                                        <textarea class="form-control" name="review" cols="30" rows="10" placeholder="Comment here..."></textarea>
                                                    </div>

                                                    @isset(Auth::user()->id)
                                                        @php
                                                            $icheck = false;
                                                            
                                                            $reviewCheck = DB::table('reviews')
                                                                ->where('users_id', Auth::user()->id)
                                                                ->where('cars_id', $cars->id)
                                                                ->count();
                                                            
                                                            $carts = DB::table('historys')
                                                                ->join('bookings', 'bookings.id', '=', 'historys.bookings_id')
                                                                ->get();
                                                            
                                                            foreach ($carts as $item) {
                                                                if (Auth::user()->id == $item->users_id && $item->cars_id == $cars->id) {
                                                                    $icheck = true;
                                                                }
                                                            }
                                                            $check = true;
                                                            if ($reviewCheck <= 1) {
                                                                $check = true;
                                                            } else {
                                                                $check = false;
                                                        } @endphp @if ($check == true)
                                                            @if (Auth::check())
                                                                @if ($icheck == true)
                                                                    <div class="col-md-12 col-12">
                                                                        <div class="form-group button5">
                                                                            <button type="submit" class="btn btn-orange"
                                                                                style="margin-left: -13px;width: 107%;">Submit</button>
                                                                        </div>
                                                                    </div>
                                                                @elseif($icheck == false)
                                                                    <div class="col-md-12 col-12">
                                                                        <div class="form-group button5">
                                                                            <button type="submit" disabled
                                                                                class="btn btn-orange"
                                                                                style="margin-left: -13px;width: 107%;opacity: .5;">Submit</button>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @else
                                                                <h6>Mời quý khách đăng nhập tài khoản trước ạ!!</h6>
                                                            @endif
                                                        @else
                                                            <div class="col-md-12 col-12">
                                                                <div class="form-group button5">
                                                                    <button type="submit" disabled class="btn btn-orange"
                                                                        style="margin-left: -13px;width: 107%;opacity: .5;">Submit</button>
                                                                </div>
                                                            </div>
                                                        @endif

                                                    @endisset
                                                </div>
                                            </form>
                                            <!-- End form -->
                                        </div>

                                    </div>
                                    @php
                                        //Gom nhóm xem tổng sao
                                        $arrayDashaboard = App\Models\Reviews::groupBy('rate')
                                            ->where('cars_id', $cars->id)
                                            ->select(DB::raw('count(rate) as total'), DB::raw('sum(rate) as sum'))
                                            ->addSelect('rate')
                                            ->get()
                                            ->toArray();
                                        
                                        $arrayRatings = [];
                                        if (!empty($arrayDashaboard)) {
                                            for ($i = 1; $i <= 5; $i++) {
                                                $arrayRatings[$i] = ['total' => 0, 'sum' => 0, 'rate' => 0];
                                                foreach ($arrayDashaboard as $item) {
                                                    if ($item['rate'] == $i) {
                                                        $arrayRatings[$i] = $item;
                                                        continue;
                                                    }
                                                }
                                            }
                                        }
                                        
                                    @endphp
                                    <!-- kết thúc danh sách -->
                                    <div class="col-md-5">
                                        <!-- Xếp hạng đánh giá -->
                                        <div class="rating-wrap">
                                            <h3 class="head">Give a Review</h3>
                                            @if ($arrayRatings)
                                                <div class="wrap">
                                                    @foreach ($arrayRatings as $key => $arrayRating)
                                                        @php
                                                            $itemAge = 0;
                                                            $itemAge = round(($arrayRating['total'] / $numberRate) * 100, 0);
                                                        @endphp
                                                        @if ($arrayRating['rate'] <= 0)
                                                            <p class="star">
                                                                <span>
                                                                    <i class="icon ion-ios-star-outline"></i>
                                                                    <i class="icon ion-ios-star-outline"></i>
                                                                    <i class="icon ion-ios-star-outline"></i>
                                                                    <i class="icon ion-ios-star-outline"></i>
                                                                    <i class="icon ion-ios-star-outline"></i>
                                                                    (<?= $itemAge ?>%)
                                                                </span>
                                                                <span> {{ $arrayRating['total'] }} Reviews</span>
                                                            </p>
                                                        @elseif($arrayRating['rate'] == 1)
                                                            <p class="star">
                                                                <span>
                                                                    <i class="ion-ios-star"></i>
                                                                    <i class="icon ion-ios-star-outline"></i>
                                                                    <i class="icon ion-ios-star-outline"></i>
                                                                    <i class="icon ion-ios-star-outline"></i>
                                                                    <i class="icon ion-ios-star-outline"></i>
                                                                    (<?= $itemAge ?>%)
                                                                </span>
                                                                <span> {{ $arrayRating['total'] }} Reviews</span>
                                                            </p>
                                                        @elseif($arrayRating['rate'] == 2)
                                                            <p class="star">
                                                                <span>
                                                                    <i class="ion-ios-star"></i>
                                                                    <i class="ion-ios-star"></i>
                                                                    <i class="icon ion-ios-star-outline"></i>
                                                                    <i class="icon ion-ios-star-outline"></i>
                                                                    <i class="icon ion-ios-star-outline"></i>
                                                                    (<?= $itemAge ?>%)
                                                                </span>
                                                                <span> {{ $arrayRating['total'] }} Reviews</span>
                                                            </p>
                                                        @elseif($arrayRating['rate'] == 3)
                                                            <p class="star">
                                                                <span>
                                                                    <i class="ion-ios-star"></i>
                                                                    <i class="ion-ios-star"></i>
                                                                    <i class="ion-ios-star"></i>
                                                                    <i class="icon ion-ios-star-outline"></i>
                                                                    <i class="icon ion-ios-star-outline"></i>
                                                                    (<?= $itemAge ?>%)
                                                                </span>
                                                                <span> {{ $arrayRating['total'] }} Reviews</span>
                                                            </p>
                                                        @elseif($arrayRating['rate'] == 4)
                                                            <p class="star">
                                                                <span>
                                                                    <i class="ion-ios-star"></i>
                                                                    <i class="ion-ios-star"></i>
                                                                    <i class="ion-ios-star"></i>
                                                                    <i class="ion-ios-star"></i>
                                                                    <i class="icon ion-ios-star-outline"></i>
                                                                    (<?= $itemAge ?>%)
                                                                </span>
                                                                <span> {{ $arrayRating['total'] }} Reviews</span>
                                                            </p>
                                                        @elseif($arrayRating['rate'] == 5)
                                                            <p class="star">
                                                                <span>
                                                                    <i class="ion-ios-star"></i>
                                                                    <i class="ion-ios-star"></i>
                                                                    <i class="ion-ios-star"></i>
                                                                    <i class="ion-ios-star"></i>
                                                                    <i class="ion-ios-star"></i>
                                                                    (<?= $itemAge ?>%)
                                                                </span>
                                                                <span> {{ $arrayRating['total'] }} Reviews</span>
                                                            </p>
                                                        @endif
                                                    @endforeach

                                                </div>
                                            @else
                                                <div class="wrap">
                                                    <h6 style="margin-top: 20px;font-weight: bold;margin-bottom: 20px;">
                                                        {{ $cars->name }} There are no reviews yet!!
                                                    </h6>
                                                </div>
                                            @endif
                                        </div>
                                        <!-- Kết thúc xếp hạng -->
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
    </section>

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
                                        <p class="price ml-auto">
                                            <?= number_format($car->price, 0, ',', '.') . ' VNĐ' ?><span>/day</span></p>
                                    </div>
                                    <!-- Tính tổng rate trung bình  -->
                                    @php
                                        $numberRate = DB::table('reviews')
                                            ->where('cars_id', $car->id)
                                            ->count();
                                        $sumRating = DB::table('reviews')
                                            ->where('cars_id', $car->id)
                                            ->sum('rate');
                                        $itemAge = 0;
                                        if ($numberRate != 0) {
                                            $itemAge = round($sumRating / $numberRate, 2);
                                        }
                                    @endphp
                                    @php
                                        $icheck = false;
                                        
                                        $count = DB::table('bookings')
                                            ->where('cars_id', $car->id)
                                            ->count();
                                        
                                        $bookings = DB::table('bookings')
                                            ->where('cars_id', $car->id)
                                            ->get();
                                        
                                        foreach ($bookings as $booking) {
                                            if ($booking->status == 'active') {
                                                $icheck = true;
                                            }
                                        }
                                        
                                    @endphp
                                    <div class="wrapper">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i class="ion-ios-star {{ $i <= $itemAge ? 'active' : '' }}">
                                            </i>
                                        @endfor
                                    </div>
                                    @if ($icheck == true)
                                        <span class="add-wapper">

                                            <?= str_pad($count, 2, '0', STR_PAD_LEFT) ?> trip

                                        </span>
                                    @else
                                        <span class="add-wapper">

                                            <?= str_pad(0, 2, '0', STR_PAD_LEFT) ?> trip
                                        </span>
                                    @endif
                                    <!-- địa chỉ -->
                                    <div class="location">
                                        <div class=located>
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                            {{ $cars->address }}
                                        </div>
                                    </div>
                                    <p class="d-flex mb-0 d-block"><a href="{{ route('car.booking', $encode) }}"
                                            class="btn btn-orange py-2 mr-1">Rent now</a> <a
                                            href="{{ route('car.detail', $encode) }}"
                                            class="btn btn-gray py-2 ml-1">Details</a></p>
                                    <div class="regis-partner-car" style="margin-top: 10px;padding-bottom: 10px;">
                                    </div>
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
                            <a class="btn btn-orange py-2 px-5" href="{{ route('car') }}">All car</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .located {
            position: relative;
            font-size: .8125rem;
            top: -12px;
            bottom: 0;
            left: 0;
            right: 0;
        }

        .located i {
            width: 20px;
            height: 20px;
            border: 1px solid;
            text-align: center;
            padding: 4px;
            margin-left: 1px;
            border-radius: 50px;
        }

        .located i:before {
            color: black;
        }

        /* tổng rate */
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

        .add-wapper {
            position: relative;
            top: -16px;
            left: 100px;
            font-size: 14px;
            bottom: 0;
            right: 0;

        }

        .link-profile {
            color: #000;
        }

        .link-profile:hover {
            color: #E85626
        }

    </style>
    <!-- Footer -->
    @include('partials.footer')
    <script src="{{ asset('/ui/js/detailSlide.js') }}"></script>

@endsection
