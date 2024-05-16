@extends('layouts.app')
@section('content')
<style>
/*
Promotion
*/
#promotion .request-form {
    box-shadow: none !important;
    background: #f8f9fa;
    padding-left: 0 !important;
}

#promotion .request-form .form-control {
    border: 1px solid #C4C4C4 !important;

}

#promotion .request-form .form-group i {
    cursor: pointer;
    padding: 10px;
    background: #FBBB4A;
    color: #BD8522;
}

#promotion .carousel-testimony .item {
    border: 1px solid #C4C4C4;
}

#promotion .carousel-testimony .item img {
    width: 70px;
    height: 70px;
    margin: 0 auto;
    border-radius: 50%;
}

#promotion .carousel-testimony .item h4 {
    font-weight: 600;
    margin-bottom: 10px;
    text-transform: uppercase;
}

#promotion .carousel-testimony .item p {
    color: #C4C4C4;
    font-size: 14px;
}

#promotion .carousel-testimony .item p span {
    color: #BD8522 !important;
}
</style>
<!-- thêm đoạn css cho danh sách khuyến mãi -->
<section id="promotion" class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form id="form1" action="{{route('coupon.search')}}" method="get" class="request-form ftco-animate">
                    <h4 class="border-bt">Contact Information</h4>
                    <div class="form-group d-flex mt-4">
                        <input type="search" class="form-control" name="keyword" placeholder="Enter you promotion...">
                        <i class="fa fa-search" onclick="document.querySelector('#form1').submit();"></i>
                    </div>
                </form>
            </div>
        </div>
        <div class="row ftco-animate">
            @foreach($carsale as $sale)
            @if($sale->user_id == Auth::user()->id)
            <div class="col-md-4">
                <div class="rounded ftco-animate" style="margin-bottom: 40px;box-shadow: 0px 5px 12px -1px rgb(0 0 0 / 6%);">
                    <div class="item <?php $sale->id?>"
                        onclick="document.querySelector('.main-crytal').style.display='block'">
                        <div class="text-center">
                            <div class="text pt-4 pb-4">
                                <img src="https://n1-cstg.mioto.vn/g/2018/03/17/16/52.jpg" class="img-fluid" alt="Img">
                                <h4>{{$sale->zipcode}}</h4>
                                <p>Discount {{$sale->discount_sale}}%</p>
                                @php 
                                    $price = ($sale->discount_sale / 100) * 200;
                                  
                                @endphp
                                <div class="mb-2">maximum discount <span>{{$price}}k</span></div>
                                <div class="date-end" style="font-size: 12px;">
                                    ( Valid from <b style="color: #BD8522;"><?php $date = date_create($sale->time_start); echo date_format($date, "M d , Y"); ?></b> to 
                                    <b style=" color: #BD8522; "><?php $date1 = date_create($sale->time_end); echo date_format($date1, "M d , Y"); ?></b> )
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            @endif
            @endforeach
        </div>
        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    {{$carsale->links()}}
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Crytal Start -->

<div class="main-crytal">
    @foreach($carsale as $sale)
    <div id="popup" onclick="document.querySelector('.main-crytal').style.display='none'">
    </div>
    <div class="container-popup">
        <div class="form-crytal ftco-animate">
            <form class="request-form">
                <div class="title-payment border-bt d-flex">

                    <h4 class="">Coupon</h4>

                </div>
             

                <div class="content-payment d-flex">

                    <ul>

                        <li>
                            The promotion may end earlier than expected when the promotion quantity is exhausted.
                        </li>
                        <li>
                            Not valid in conjunction with other promotions.
                        </li>
                        <li>
                            The code only applies to the latest app version.
                        </li>
                        <li>
                            Only 1 promo code can be used per trip.
                        </li>
                        <li>
                            Only applicable for Self-Driving Car Rental service .
                        </li>

                    </ul>
                </div>
                <div class="form-group payment mt-3">

                </div>
            </form>


        </div>
    </div>
    @endforeach
</div>

<!-- Crytal End -->
<!-- Footer -->
@include('partials.footer')

@endsection
@push('scripts')
<script>
//Xóa style:display:none; trong select;
$('.pagination').remove();
</script>
@endpush