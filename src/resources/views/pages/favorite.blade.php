@extends('layouts.app')
@section('content')
    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row mt-4">
                <div class="col-md-12" style="margin-bottom: 80px;">
                    <div class="row payment-visa mt-4">
                        <div class="col">
                            <nav>
                                <div class="nav nav-pills nav-underline mb-5 animated" data-animation="fadeInUpShorter"
                                    data-animation-delay="0.5s" id="myTab" role="tablist">
                                    <a href="#ico" class="nav-item nav-link active" id="ico-tab" data-toggle="tab"
                                        aria-controls="ico" aria-selected="false" role="tab">Self-driving car</a>
                                    <a href="#biswap" class="nav-item nav-link" id="biswap-tab" data-toggle="tab"
                                        aria-controls="biswap" aria-selected="false" role="tab">Car with driver</a>

                                </div>
                            </nav>
                            <div class="tab-content" id="myTabContent">
                                <!--Bitcoin-->
                                <div class="tab-pane fade" id="biswap" role="tabpanel" aria-labelledby="biswap-tab">
                                    <div id="token-accordion" class="collapse-icon accordion-icon-rotate">
                                        <div class="card">
                                            <div class="row">
                                                @foreach ($cars as $car)
                                                    @if ($car->range_of_vehicle == 2)
                                                        @php
                                                            $photo = explode(',', $car->photo);
                                                            $encode = encrypt($car->id);
                                                        @endphp
                                                        <div class="col-md-4">
                                                            <div class="car-wrap rounded ftco-animate">
                                                                <div class="img rounded d-flex align-items-end"
                                                                    style="background-image:  url('<?= $photo[0] ?>');">

                                                                    <a href="{{ route('wishlist.remove', $car->id) }}"
                                                                        class="favorite">
                                                                        <i class="fa fa-trash"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="text">
                                                                    <h2 class="mb-0"><a
                                                                            href="{{ route('car.detail', $encode) }}">{{ $car->name }}</a>
                                                                    </h2>
                                                                    <div class="d-flex mb-3">
                                                                        <span
                                                                            class="cat">{{ $car->render->manu_name }}</span>
                                                                        <p class="price ml-auto">
                                                                            ${{ number_format($car->price) }}
                                                                            <span>/day</span>
                                                                        </p>
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
                                                                    <div class="wrapper">
                                                                        @for ($i = 1; $i <= 5; $i++)
                                                                            <i
                                                                                class="ion-ios-star {{ $i <= $itemAge ? 'active' : '' }}">
                                                                            </i>
                                                                        @endfor

                                                                    </div>
                                                                    <!-- Số chuyến đi -->
                                                                    @php
                                                                        $icheck = false;
                                                                        
                                                                        $count = DB::table('bookings')
                                                                            ->where('status', 'active')
                                                                            ->where('cars_id', $car->id)
                                                                            ->count();
                                                                    @endphp


                                                                    <span class="add-wapper">

                                                                        <?= str_pad($count, 2, '0', STR_PAD_LEFT) ?> trip

                                                                    </span>

                                                                    <!-- địa chỉ -->
                                                                    <div class="location">
                                                                        <div class=located>
                                                                            <i class="fa fa-map-marker"
                                                                                aria-hidden="true"></i>
                                                                            {{ $car->address }}
                                                                        </div>
                                                                    </div>
                                                                    <p class="d-flex mb-0 d-block"><a
                                                                            href="{{ route('car.booking', $encode) }}"
                                                                            class="btn btn-orange py-2 mr-1">Book now</a> <a
                                                                            href="{{ route('car.detail', $encode) }}"
                                                                            class="btn btn-gray py-2 ml-1">Details</a></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="row mt-5">
                                                <div class="col text-center">
                                                    <div class="block-27">
                                                        <ul>
                                                            {{ $cars->links() }}
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade show active" id="ico" role="tabpanel" aria-labelledby="ico-tab">
                                    <div id="ico-accordion" class="collapse-icon accordion-icon-rotate">
                                        <div class="card">
                                            <div class="row">
                                                @foreach ($cars as $car)
                                                    @if ($car->range_of_vehicle == 1)
                                                        @php
                                                            $photo = explode(',', $car->photo);
                                                            $encode = encrypt($car->id);
                                                        @endphp
                                                        <div class="col-md-4">
                                                            <div class="car-wrap rounded ftco-animate">
                                                                <div class="img rounded d-flex align-items-end"
                                                                    style="background-image:  url('<?= $photo[0] ?>');">
                                                                    <a href="{{ route('wishlist.remove', $car->id) }}"
                                                                        class="favorite">
                                                                        <i class="fa fa-trash"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="text">
                                                                    <h2 class="mb-0"><a
                                                                            href="{{ route('car.detail', $encode) }}">{{ $car->name }}</a>
                                                                    </h2>
                                                                    <div class="d-flex mb-3">
                                                                        <span
                                                                            class="cat">{{ $car->render->manu_name }}</span>
                                                                        <p class="price ml-auto">
                                                                            ${{ number_format($car->price) }}
                                                                            <span>/day</span>
                                                                        </p>
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
                                                                    <div class="wrapper">
                                                                        @for ($i = 1; $i <= 5; $i++)
                                                                            <i
                                                                                class="ion-ios-star {{ $i <= $itemAge ? 'active' : '' }}">
                                                                            </i>
                                                                        @endfor

                                                                    </div>
                                                                    <!-- Số chuyến đi -->
                                                                    @php
                                                                        $icheck = false;
                                                                        
                                                                        $count = DB::table('bookings')
                                                                            ->where('status', 'active')
                                                                            ->where('cars_id', $car->id)
                                                                            ->count();
                                                                    @endphp


                                                                    <span class="add-wapper">

                                                                        <?= str_pad($count, 2, '0', STR_PAD_LEFT) ?> trip

                                                                    </span>

                                                                    <!-- địa chỉ -->
                                                                    <div class="location">
                                                                        <div class=located>
                                                                            <i class="fa fa-map-marker"
                                                                                aria-hidden="true"></i>
                                                                            {{ $car->address }}
                                                                        </div>
                                                                    </div>

                                                                    <p class="d-flex mb-0 d-block"><a
                                                                            href="{{ route('car.booking', $encode) }}"
                                                                            class="btn btn-orange py-2 mr-1">Book now</a> <a
                                                                            href="{{ route('car.detail', $encode) }}"
                                                                            class="btn btn-gray py-2 ml-1">Details</a></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach

                                            </div>
                                            <div class="row mt-5">
                                                <div class="col text-center">
                                                    <div class="block-27">
                                                        <ul>
                                                            {{ $cars->links() }}
                                                        </ul>
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
            </div>

        </div>
    </section>
    <style>
        .favorite i {
            background: #E85626;
            color: #fff;
            position: absolute;
            top: 15px;
            right: 30px;
            cursor: pointer;
            font-size: 18px;
            padding: 9px;
            padding-left: 9px;
            border: 1px solid #E85626;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            text-align: center;
        }

    </style>
    <style>
        /* tổng rate */
        .add-wapper {
            position: relative;
            top: -16px;
            left: 100px;
            font-size: 14px;
            bottom: 0;
            right: 0;

        }

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
            padding: 3px;
            margin-left: 1px;
            border-radius: 50px;
        }

        .located i:before {
            color: #E85626;
        }

    </style>
    <!-- Footer -->
    @include('partials.footer')
@endsection
@push('scripts')
    <script>
        //Xóa style:display:none; trong select;
        $('.pagination').remove();
    </script>
@endpush
