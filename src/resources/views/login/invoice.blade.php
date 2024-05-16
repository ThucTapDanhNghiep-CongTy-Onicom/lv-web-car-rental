@extends('layouts.app')
@section('content')
<link href="{{asset('/backend/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{asset('/backend/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{asset('/backend/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />


<!-- Start right Content here -->
<!-- ============================================================== -->


<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-lg-10 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <img src="/ui/images/Yotrip_logo-website-02.png" alt="" class="img-fluid"
                                    width="75">
                            </div>
                            <!-- end col -->
                            <div class="col-lg-6  align-self-center">
                                <div class="">
                                    <div class="float-end">
                                     <?php $carsss = DB::table('bookings')->where('id', $own['car_id'])->first(); ?>
                                        <h6 class="mb-0"><b>Order Date :</b> {{$carsss['created_at'] ?? ''}}</h6>
                                        <h6><b>Order ID :</b> # 23654789</h6>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="float-start mt-5">
                                    <address class="font-size-13">
                                        <strong class="font-size-14">Pick-up :</strong><br>
                                        <?php $own1 = DB::table('users')->where('id', $own['user_id'])->first(); ?>
                                        {{$own1->name}}<br>
                                        {{$booking['address']}}
                                        <abbr title="Phone"></abbr> {{$own1->phone}} <br>
                                        <abbr title="Phone">Pick-up day:</abbr> {{$booking['date_start']}} <br>
                                        <abbr title="Phone">Pick-up time:</abbr> {{$booking['time_start']}}

                                    </address>
                                </div>
                                <div class="float-end text-end  mt-5">
                                    <address class="font-13">
                                        <strong class="font-size-14">Drop-off:</strong><br><br>
         
                                        {{$booking['address_off']}} <br>
                                        <abbr title="Phone">Drop-off day:</abbr> {{$booking['date_end']}} <br>
                                        <abbr title="Phone">Drop-off time:</abbr> {{$booking['time_end']}}
                                    </address>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row-->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">

                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Car Name</th>
                                                <th>Description</th>
                                                <th>Color</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <th>{{$own['id']}}</th>
                                                <th>{{$own['name']}}</th>
                                                <th>{!!$own['description']!!}</th>
                                                <th>{{$own['color']}}</th>
                                                <th>${{$booking['total_amount'] + $booking['taxes']}}</th>
                                            </tr>

                                            <tr>
                                                <td colspan="3" class="border-0"></td>
                                                <td class="border-0 font-size-14"><b>Sub Total</b></td>
                                                <td class="border-0 font-size-14">
                                                    <b>${{$booking['total_amount'] + $booking['taxes']}}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th colspan="3" class="border-0"></th>
                                                <td class="border-0 font-size-14"><b>Tax Rate</b></td>
                                                <td class="border-0 font-size-14"><b>$0.00%</b></td>
                                            </tr>
                                            <tr class="bg-dark text-light">
                                                <th colspan="3" class="border-0"></th>
                                                <td class="border-0 font-size-14" style="padding: 22px 0;"><b>Total</b></td>
                                                <td class="border-0 font-size-14" style="padding: 22px 0;">
                                                    <b>${{$booking['total_amount'] + $booking['taxes']}}</b>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- end table -->
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <h5 class="mt-4">Terms And Condition :</h5>
                                <ul class="ps-3">
                                    <li><small>All accounts are to be paid within 7 days from receipt of
                                            invoice. </small></li>
                                    <li><small>To be paid by cheque or credit card or direct payment
                                            online.</small></li>
                                    <li><small> If account is not paid within 7 days the credits details
                                            supplied as confirmation<br> of work undertaken will be charged
                                            the agreed quoted fee noted above.</small></li>
                                </ul>
                            </div>
                            <!-- end col -->
                            <div class="col-lg-6 align-self-end">
                                <div class="w-25 float-end">
                                    <img src="assets/images/signature.png" alt="" class="img-fluid">
                                    <p class="border-top">Signature</p>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                        <hr>
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-12 col-xl-4 ms-auto align-self-center">
                                <div class="text-center text-muted"><small>Thank you very much for doing
                                        business with us. Thanks !</small></div>
                            </div>
                            <!-- end col -->
                            <div class="col-lg-12 col-xl-4">
                                <div class="float-end d-print-none">
                                    <a href="javascript:window.print()" class="btn btn-info"><i
                                            class="fa fa-print"></i></a>
                                    <a href="#" class="btn btn-primary">Submit</a>
                                    <a href="{{route('car.booking',$own['id'])}}" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->


<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>
                document.write(new Date().getFullYear())
                </script> © Amezia.
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                    Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- end main content-->

<!-- Footer -->
@include('partials.footer')
<!-- JAVASCRIPT -->
<script src="{{asset('/backend/assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('/backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('/backend/assets/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('/backend/assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('/backend/assets/libs/node-waves/waves.min.js')}}"></script>

<script src="{{asset('/backend/assets/js/app.js')}}"></script>
@endsection