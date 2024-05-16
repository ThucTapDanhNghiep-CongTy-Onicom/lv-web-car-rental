@extends('layouts.app')
@section('content')
@php
$photos=explode(',',$cars->photo);
@endphp

<link rel="stylesheet" href="{{asset('/ui/css/splide.css')}}">
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
                                                    @if(count($photos) != 1)
                                                    <ul class="splide__list">
                                                        @if(count($photos) <= 5 && count($photos)>= 1)
                                                            @foreach($photos as $photo)
                                                            @if($photo)
                                                            <li class="splide__slide snip0019">
                                                                <img src="<?= $photo?>"
                                                                    class="img-fluid" alt="">
                                                            </li>

                                                            @endif
                                                            @endforeach
                                                            @else
                                                            @for($i = 0 ; $i < 5;$i++) <li
                                                                class="splide__slide snip0019">
                                                                <img src="<?= $photos[$i]?>"
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
                                            <h2 class="text-22">{{$cars->name}}</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row mt-5 mb-4">
                                        <div class="col-4 avatar-owner">
                                            @if($cars->user->social_type == 'google')
                                            <img src="<?= $cars->user->photo ?>" class="img-fluid" alt="ss"
                                                style="border-radius: 50%;width: 128px;height: 128px;display: block;margin: 0 auto;">
                                            @else
                                            @if($cars->user->photo)
                                            <img src="<?= $cars->user->photo ?>"
                                                class="img-fluid" alt=""
                                                style="border-radius: 50%;width: 128px;height: 128px;display: block;margin: 0 auto;">
                                            @else
                                            <img class="img-fluid" src="..//backend/assets/images/users/user-1.jpg"
                                                alt="Header Avatar"
                                                style="border-radius: 50%;width: 128px;height: 128px;display: block;margin: 0 auto;">
                                            @endif

                                            @endif

                                        </div>
                                        <div class="col-8 detail-owner">
                                            <p>{{$cars->user->name}}</p>
                                            <!-- Tính tổng rate trung bình  -->
                                            @php
                                            $numberRate =DB::table('reviews')->where('cars_id',$cars->id)->count();
                                            $sumRating = DB::table('reviews')->where('cars_id',$cars->id)->sum('rate');
                                            $itemAge = 0;
                                            if($numberRate!=0){
                                            $itemAge = round($sumRating / $numberRate, 2);
                                            }
                                            @endphp

                                            <div class="wrapper">
                                                @for($i = 1; $i <= 5; $i ++) <i
                                                    class="ion-ios-star {{ $i <= $itemAge ? 'active' : ''}}"></i>
                                                    @endfor

                                            </div>

                                            <!-- Số chuyến đi -->
                                            @php
                                            $icheck = false;

                                            $count = DB::table('bookings')->where('status' , 'active')->where('cars_id' ,
                                            $cars->id)->count();
                                            @endphp


                                            <span class="value">

                                                <?=str_pad($count, 2, '0', STR_PAD_LEFT); ?> trip

                                            </span>

                                            <div>
                                                Address : {{$cars->address}} <br>
                                                Phone : {{$cars->user->phone}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="info-owner mt-5">
                                        <p>
                                            {!!$cars->rules!!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex align-items-start j-center">
                        <form action="{{route('car.payment',$cars->id)}}" class="request-form-2 ftco-animate"
                            method="post">
                            @csrf
                            <h2 class="text-center">
                                <span><?= number_format($cars->price, 0, ',', '.' ) . " VNĐ"; ?></span>/day
                            </h2>
                            <div class="form-group">
                                <label for="" class="label">Pick-up location</label>
                                <input type="text" class="form-control" name="address"
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
                                    <input type="date" class="form-control" name="date_start" value="<?= date('Y-m-d', strtotime('+1 day', strtotime(date('Y-m-d')))) ?>">
                                </div>
                                <div class="form-group ml-2">
                                    <label for="" class="label">Pick-up time</label>
                                    <input type="text" class="form-control" name="time_start" id="time_pick"
                                        value="00:00am">
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="form-group mr-2">
                                    <label for="" class="label">Drop-off date</label>
                                    <input type="date" class="form-control" name="date_end" value="<?= date('Y-m-d', strtotime('+3 day', strtotime(date('Y-m-d')))) ?>">

                                </div>
                                <div class="form-group ml-2">
                                    <label for="" class="label">Drop-off time</label>
                                    <input type="text" class="form-control" name="time_end" id="time_drop"
                                        value="20:00pm">

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="label">Taxes</label>
                                <input type="number" class="form-control" name="taxes" value="100000">
                            </div>

                 
                            
                            <select name="zipcode" class="form-control">
                                <label for="" class="label">Counpon</label>
                                <option value=""> Choose a discount code
                                </option>
                                @foreach($coupons as $coupon)
                                <option value="{{$coupon->discount_sale}}"> {{$coupon->zipcode}} -> (discount {{$coupon->discount_sale}}%)
                                </option>
                                @endforeach
                                
                            </select>
                          
                            <div class="form-group detail-price mt-3">
                                <h3 class="mb-3">Detail price</h3>
                                <div class="row mb-3">
                                    <div class="col-6">Rental price</div>
                                    <div class="col-6 text-right">
                                        <?= number_format($cars->price, 0, ',', '.' ) . " VNĐ"; ?>/day</div>
                                </div>
                                <div class="row mb-3">
                                    @if($cars->service_charge)
                                    <div class="col-6">Service charge</div>
                                    
                                    <div class="col-6 text-right"><?= number_format($cars->service_charge, 0, ',', '.' ) . " VNĐ"; ?>
                                    </div>
                                    @endif
                                    
                                </div>
                                <div class="row mb-3" style="border-bottom: 1px solid #AF2D23;">
                                    @if($cars->insurance_fees)
                                    <div class="col-6">Insurance fees</div>
                                    <div class="col-6 text-right"><?= number_format($cars->insurance_fees, 0, ',', '.' ) . " VNĐ"; ?>
                                    </div>
                                    @endif
                                </div>

                                @php
                              
                               
                                $total = $cars->price + 100000 + 95590;

                                @endphp
                                <div class="row total mb-3">
                                    <div class="col-6">Total</div>
                                    <div class="col-6 text-right" name="total_amount" value="{{$total}}">
                                        <?= number_format($total, 0, ',', '.' ) . " VNĐ"; ?>
                                    </div>
                                    <input type="text" name="total_amount" value="{{$total}}" hidden>
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
</section>
<!-- Booking End -->

<style>
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

<script src="{{asset('/ui/js/detailSlide.js')}}"></script>
@endsection