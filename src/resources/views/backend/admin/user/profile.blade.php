@include('backend.partials.main')

<head>
    @include('backend.partials.title-meta')


    <!-- Responsive datatable examples -->
    <link href="{{asset('public/profile/backend/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}"
        rel="stylesheet" type="text/css" />
    <link href="{{asset('public/profile/backend/assets/libs/dropify/css/dropify.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('public/profile/backend/assets/libs/magnific-popup/magnific-popup.css')}}" rel="stylesheet" type="text/css" />
    @include('backend.partials.head-css')

</head>

@include('backend.partials.body')

<!-- Begin page -->
<div id="layout-wrapper">

    @include('backend.partials.menu')

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                @include('backend.partials.page-title')
                <div class="row">
                    <div class="col-xl-3">
                        <div class="card profile">
                            <div class="card-body">
                                <div class="text-center">
                                    @if($profile->photo)
                                    <img src="{{$profile->photo}}"
                                        alt="{{$profile->name}}" class="rounded-circle img-thumbnail avatar-xl">
                                    @else
                                    <img src="{{asset('public/backend/assets/images/users/user-3.jpg')}}" alt=""
                                        class="rounded-circle img-thumbnail avatar-xl">
                                    @endif
                                    <div class="online-circle">
                                        <i class="fa fa-circle text-success"></i>
                                    </div>
                                    <h4 class="mt-3">{{$profile->name}}</h4>
                                    <p class="text-muted font-size-13">Hồ sơ</p>
                                    



                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-body">
                                <h5>Thông tin cá nhân</h5>
                                <h6>About :</h6>
                                <p class="card-title-desc">Hi I'm {{$profile->name}},has
                                    been the industry's standard dummy text ever since the 1500s,
                                    when an unknown printer took a galley of type.
                                </p>
                                <hr>
                                <div class="button-list btn-social-icon">
                                    <button type="button" class="btn btn-facebook rounded-circle">
                                        <i class="fab fa-facebook"></i>
                                    </button>

                                    <button type="button" class="btn btn-twitter rounded-circle ms-2">
                                        <i class="fab fa-twitter"></i>
                                    </button>

                                    <button type="button" class="btn btn-linkedin rounded-circle  ms-2">
                                        <i class="fab fa-linkedin"></i>
                                    </button>

                                    <button type="button" class="btn btn-dribbble rounded-circle  ms-2">
                                        <i class="fab fa-dribbble"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->


                        <!-- end card -->

                        <!-- <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Map</h5>
                                <div id="gmaps-markers" class="gmaps" style="height:200px;"></div>
                            </div>
                        </div> -->
                        <!-- end card -->

                        <!-- <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Contact</h5>
                                <ul class="list-unstyled mb-0">
                                    <li class=""><i class="mdi mdi-phone me-2 text-success font-size-18"></i> <b>
                                            phone </b> : +{{$profile->phone}}</li>
                                    <li class="mt-2"><i
                                            class="mdi mdi-email-outline text-success font-size-18 mt-2 me-2"></i>
                                        <b> Email </b> : {{$profile->email}}
                                    </li>
                                    <li class="mt-2"><i
                                            class="mdi mdi-map-marker text-success font-size-18 mt-2 me-2"></i>
                                        <b>Location</b> : {{$profile->address}}
                                    </li>
                                </ul>
                            </div>
                        </div> -->
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                    <div class="col-xl-9">
                        <div class="card">
                            <div class="card-body profile">
                                <h5>Hoạt động của bạn</h5>
                                <canvas id="lineChart" height="70"></canvas>
                            </div>
                        </div>
                        <!-- end card -->
                        <div class="">
                            <div class="custom-tab tab-profile">

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active pb-3 pt-0" data-bs-toggle="tab" href="#projects"
                                            role="tab"><i class="fab fa-product-hunt me-2"></i>Dự án</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link pb-3 pt-0" data-bs-toggle="tab" href="#settings"
                                            role="tab"><i class="fas fa-cog me-2"></i>Cài đặt</a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content pt-4">
                                    <div class="tab-pane active" id="projects" role="tabpanel">
                                        <div class="row">
                                            <!-- end col -->

                                            <div class="col-xl-12">
                                                <div class="card">
                                                    <div class="card-body" style="margin-top: 27px;">
                                                        <h5 class="card-title">Thanh toán</h5>
                                                        <div class="table-responsive">
                                                            <table
                                                                class="table table-centered table-nowrap table-hover mb-0">
                                                                <thead>
                                                                    <tr class="align-self-center">
                                                                        <th>ID</th>
                                                                        <th>Hình khách hàng</th>
                                                                        <th>Hình thức thanh toán</th>
                                                                        <th>Ngày thanh toán</th>
                                                                        <th>Tiền</th>
                                                                        <th>Giao dịch</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @if($payments)
                                                                    @foreach($payments as $payment)

                                                                    <tr>
                                                                        <td>{{$payment->p_transaction_id}}</td>
                                                                        <td>
                                                                            @if($payment->user->photo)
                                                                            <img src="{{$payment->user->photo}}"
                                                                                alt="{{$payment->user->name}}"
                                                                                class="avatar-xs rounded-circle me-2">
                                                                            @else
                                                                            <img src="public/backend/assets/images/users/user-2.jpg"
                                                                                alt=""
                                                                                class="avatar-xs rounded-circle me-2">
                                                                            @endif
                                                                            {{$payment->name}}
                                                                        </td>
                                                                        <td>{{$payment->p_code_bank}}</td>
                                                                        <td><?php $date = date_create($payment->p_time); echo date_format($date, "d/m/Y"); ?>
                                                                        </td>
                                                                        <td>{{number_format($payment->p_money)}} VNĐ
                                                                        </td>
                                                                        <td>
                                                                            @if($payment->status=='trading')
                                                                            <span
                                                                                class="badge bg-warning">{{$payment->user->status}}</span>
                                                                            @elseif($payment->status=='active')
                                                                            <span
                                                                                class="badge bg-success">{{$payment->user->status}}</span>
                                                                            @else
                                                                            <span class="bg-rounded"
                                                                                style="background: #f25858;border-radius: 4px;font-size: 75%;padding: .25em .4em;font-weight: 500;color: #fff;">Không hoạt động</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    @endforeach
                                                                    @endif
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!--end table-responsive-->
                                                        <div class="pt-3 border-top text-end">
                                                            <a href="#" class="text-primary">Xem tất cả<i
                                                                    class="mdi mdi-arrow-right"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end card -->
                                            </div>            
                                            <!-- end col -->
                                        </div>
                                        <!-- end row -->


                                        <!-- end row -->
                                    </div>

                                    <div class="tab-pane" id="settings" role="tabpanel">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="">
                                                            <form class="form-horizontal form-material mb-0"
                                                                enctype="multipart/form-data">

                                                                <input type="file" id="input-file-now-custom-1"
                                                                    class="dropify"
                                                                    data-default-file="public/profile/backend/assets/images/users/user-3.jpg"
                                                                    name="upload" />
                                                                <div class="mb-3">
                                                                    <input type="text" placeholder="Full Name"
                                                                        class="form-control" name="name"
                                                                        value="{{$profile->name}}">
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-6 mb-3">
                                                                        <input type="email" placeholder="Email"
                                                                            class="form-control" name="email"
                                                                            id="example-email"
                                                                            value="{{$profile->email}}">
                                                                    </div>
                                                                    <div class="col-md-6 mb-3">
                                                                        <input type="text" placeholder="Address"
                                                                            name="address" class="form-control"
                                                                            value="{{$profile->address}}">
                                                                    </div>

                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6 mb-3">
                                                                        <input type="text" name="phone"
                                                                            placeholder="Phone No" class="form-control"
                                                                            value="{{$profile->phone}}">
                                                                    </div>
                                                                    <div class="col-md-6 mb-3">
                                                                        <select name="gender" class="form-control">
                                                                            <option value="male"
                                                                                {{(($profile->gender=='male') ? 'selected' : '')}}>
                                                                                Male</option>
                                                                            <option value="female"
                                                                                {{(($profile->gender=='female') ? 'selected' : '')}}>
                                                                                Female
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">

                                                                    <a href="{{route('user.index')}}"
                                                                        class="btn btn-primary btn-sm text-light px-4 mt-3 float-end mb-0">Go</a>
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
                </div>

                <!-- end row -->



            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        @include('backend.partials.footer')
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

@include('backend.partials.right-sidebar')

@include('backend.partials.vendor-scripts')
<!-- google maps api -->
<script src="https://maps.google.com/maps/api/js?key=AIzaSyCtSAR45TFgZjOs4nBFFZnII-6mMHLfSYI"></script>

<!-- Gmaps file -->
<script src="{{asset('public/profile/backend/assets/libs/gmaps/gmaps.min.js')}}"></script>

<script src="{{asset('public/profile/backend/assets/libs/dropify/js/dropify.min.js')}}"></script>

<!-- Magnific Popup-->
<script src="{{asset('public/profile/backend/assets/libs/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

<!-- Chart JS -->
<script src="{{asset('public/profile/backend/assets/libs/chart.js/Chart.bundle.min.js')}}"></script>

<script src="{{asset('public/profile/backend/assets/js/pages/profile.init.js')}}"></script>
<script src="{{asset('public/backend/assets/libs/jquery/jquery.min.js')}}"></script>



</body>

</html>