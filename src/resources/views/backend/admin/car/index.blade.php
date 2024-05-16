@extends('backend.admin.dasbroad.index')
@section('main-content')
<div class="page-content">
    <div class="container-fluid">
        @include('backend.partials.page-title')
        <div class="row">
            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <span class="float-end text-muted font-size-13">24/24</span>
                        <h5 class="card-title mb-3">Thống kê số liệu</h5>
                        <div id="donut-example" class="morris-charts workloed-chart" dir="ltr"></div>
                        <ul class="list-unstyled text-center text-muted mb-0">
                            <li class="list-inline-item font-size-13"><i
                                    class="mdi mdi-album font-size-16 align-middle text-purple me-2"></i>Xe hơi</li>
                            <li class="list-inline-item font-size-13"><i
                                    class="mdi mdi-album font-size-16 align-middle text-pink me-2"></i>Đơn đặt</li>
                            <li class="list-inline-item font-size-13"><i
                                    class="mdi mdi-album font-size-16 align-middle text-light me-2"></i>Người dùng</li>
                        </ul>
                    </div>
                </div>
                <!-- end card -->
            </div>
            <div class="col-xl-9">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Chi tiết Ngân sách</h5>
                        <div id="morris-bar-chart" class="morris-charts project-budget-detail-chart" dir="ltr"></div>
                        <ul class="list-unstyled text-center text-muted mb-0 mt-2">
                            <li class="list-inline-item font-size-13"><i
                                    class="mdi mdi-album font-size-16 align-middle text-primary me-2"></i>Tổng ngân sách
                            </li>
                            <li class="list-inline-item font-size-13"><i
                                    class="mdi mdi-album font-size-16 align-middle text-success me-2"></i>Số tiền đã sử dụng
                            </li>
                            <li class="list-inline-item font-size-13"><i
                                    class="mdi mdi-album font-size-16 align-middle text-secondary me-2"></i>Số tiền mục tiêu</li>
                        </ul>
                    </div>
                </div>
                <!-- end card -->
            </div>
        </div>
        <!--end row-->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h5>Tổng quát</h5>
                        <div class="row">
                            <div class="col-lg-9 border-right">
                                <div class="card shadow-none mb-0 ">
                                    <div class="card-body">
                                        <div id="morris-line-chart" class="morris-charts overview-chart" dir="ltr">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-lg-3">
                                <div class="card mb-0 overview shadow-none">
                                    <div class="card-body border-bottom">
                                        <div class="">
                                            <div class="row align-items-center">
                                                <div class="col-4">
                                                    <div class="overview-content">
                                                        <i class="mdi mdi-earth  text-success"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 text-end">
                                                    <p class="text-muted font-size-13 mb-1">Đang online</p>
                                                    <h4 class="mb-0 font-size-20">{{$count_online}}</h4>
                                                </div>
                                            </div>
                                            <!-- end row -->
                                        </div>
                                    </div>
                                    <div class="card-body border-bottom">
                                        <div class="">
                                            <div class="row  align-items-center">
                                                <div class="col-4">
                                                    <div class="overview-content">
                                                        <i class="mdi mdi-tree-outline text-purple"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 text-end">
                                                    <p class="text-muted font-size-13 mb-1">Tổng tháng trước</p>
                                                    <h4 class="mb-0 font-size-20">{{$vistor_last_month_count}}</h4>
                                                </div>
                                            </div>
                                            <!-- end row -->
                                        </div>
                                    </div>
                                    <div class="card-body border-bottom">
                                        <div class="">
                                            <div class="row align-items-center">
                                                <div class="col-4">
                                                    <div class="overview-content">
                                                        <i class="mdi mdi-diamond-stone text-warning"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 text-end">
                                                    <p class="text-muted font-size-13 mb-1">Tổng tháng này</p>
                                                    <h4 class="mb-0 font-size-20">{{$vistor_this_month_count}}</h4>
                                                </div>
                                            </div>
                                            <!-- end row -->
                                        </div>
                                    </div>
                                    <div class="card-body border-bottom">
                                        <div class="">
                                            <div class="row align-items-center">
                                                <div class="col-4">
                                                    <div class="overview-content">
                                                        <i class="mdi mdi-nfc-variant text-red"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 text-end">
                                                    <p class="text-muted font-size-13 mb-1">Tổng một năm</p>
                                                    <h4 class="mb-0 font-size-20">{{$vistor_year_count}}</h4>
                                                </div>
                                            </div>
                                            <!-- end row -->
                                        </div>
                                    </div>
                                    <div class="card-body border-bottom">
                                        <div class="">
                                            <div class="row align-items-center">
                                                <div class="col-4">
                                                    <div class="overview-content">
                                                        <i class="mdi mdi-thermostat" style="color:red;"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 text-end">
                                                    <p class="text-muted font-size-13 mb-1">Tổng truy cập</p>
                                                    <h4 class="mb-0 font-size-20">{{$vistors_total}}</h4>
                                                </div>
                                            </div>
                                            <!-- end row -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- end row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Doanh thu các ngày trong tháng</h5>
                        <div class="row justify-content-end">
                            <div class="col-xl-12 align-self-center">
                                <ul class="list-unstyled list-inline float-end">
                                    <li class="list-inline-item px-3">
                                        <h5><?= number_format($revenueActive['totalMoney']) ?> VNĐ</h5>
                                        <small class="font-size-14 text-muted">Doanh thu tháng này</small>
                                    </li>
                                    <li class="list-inline-item px-3">
                                        <h5 class="mb-2"><?= number_format($revenueTrading['totalMoney']) ?> VNĐ</h5>
                                        <small class="font-size-14 text-muted">Số tiền chưa nhận</small>
                                    </li>
                                    <li class="list-inline-item px-3">
                                        <h5 class="text-danger mb-2"><i
                                                class="mdi mdi-arrow-down-bold font-size-14 text-danger"></i>
                                            7.9% </h5>
                                        <span class="font-size-14 text-danger">Vượt mục tiêu hiện tại</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div id="extra-area-chart" class="morris-charts project-budget-chart" dir="ltr"></div>
                        <ul class="list-unstyled text-center text-muted mb-0 mt-2">
                            <li class="list-inline-item font-size-13"><i
                                    class="mdi mdi-album font-size-16 align-middle text-primary me-2"></i>Giao dịch hoàn thành
                            </li>
                            <li class="list-inline-item font-size-13"><i
                                    class="mdi mdi-album font-size-16 align-middle text-success me-2" style="color: orange!important;"></i>Đang trong quá trình giao dịch
                            </li>
                           
                           
                        </ul>
                    </div>
                </div>
            </div>

            <!-- end col -->
        </div>
        <!-- end col -->
        <!--end row-->
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5>Bởi các quốc gia</h5>
                        <div class="row">
                            <div class="col-md-12 col-lg-8">
                                <div id="world-map-markers" class="dashboard-map" style="height: 295px;">
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4 align-self-center">
                                <p class="text-muted font-size-13 mb-1"><i
                                        class="mdi mdi-checkbox-blank-circle me-2 text-success"></i>Ấn độ
                                    <span class="float-end">35%</span>
                                </p>
                                <div class="progress mb-4" style="height:3px;">
                                    <div class="progress-bar progress-animated bg-success" role="progressbar"
                                        style="max-width: 35%; border-radius: 50px;" aria-valuenow="55"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                                <p class="text-muted font-size-13 mb-1"><i
                                        class="mdi mdi-checkbox-blank-circle me-2 text-success"></i>Hoa kỳ
                                    <span class="float-end">58%</span>
                                </p>
                                <div class="progress mb-4" style="height:3px;">
                                    <div class="progress-bar progress-animated bg-success" role="progressbar"
                                        style="max-width: 58%; border-radius: 50px;" aria-valuenow="58"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                                <p class="text-muted font-size-13 mb-1"><i
                                        class="mdi mdi-checkbox-blank-circle me-2 text-danger"></i>Nga
                                    <span class="float-end">85%</span>
                                </p>
                                <div class="progress mb-4" style="height:3px;">
                                    <div class="progress-bar progress-animated bg-danger" role="progressbar"
                                        style="max-width: 85%; border-radius: 50px;" aria-valuenow="85"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                                <p class="text-muted font-size-13 mb-1"><i
                                        class="mdi mdi-checkbox-blank-circle me-2 text-success"></i>Châu úc
                                    <span class="float-end">71%</span>
                                </p>
                                <div class="progress mb-0" style="height:3px;">
                                    <div class="progress-bar progress-animated bg-success" role="progressbar"
                                        style="max-width: 71%; border-radius: 50px;" aria-valuenow="71"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end col -->
            <div class="col-xl-4">
                <div class="card bg-primary text-white income">
                    <div class="card-body" style="margin-bottom: 13px;">
                        <h5 class="text-white">Thu nhập tháng này</h5>
                        @php
                        $check = false;
                        $bookings = DB::table('bookings')->where('status' , 'active')->sum('total_amount');
                        $countb = DB::table('bookings')->where('status' , 'active')->count();


                        $total = $bookings * $countb;

                        @endphp
                        <div class="">


                            <h1 class="my-4 text-white"><i
                                    class="mdi mdi-wallet me-3"></i><?= number_format($total, 0, ',', '.') . " VND"; ?>
                            </h1>
                            <!-- <span class="float-end">Last Month : $6500.50</span> -->

                            <a href="#" class="text-white my-4">Đọc thêm<i class="mdi mdi-arrow-right ms-2"></i></a>
                            <div class="mt-4">
                                <span class="peity-bar" data-peity='{ "fill": ["#9dcee8", "#9dcee8"]}' data-width="100%"
                                    data-height="162">1,2,3,4,3,6,3,5,3,8,4,2,6,3,5,3,8,4,2,5,2,3,4,3,6</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!--end row-->

    </div>
    <!-- container-fluid -->
</div>

@endsection