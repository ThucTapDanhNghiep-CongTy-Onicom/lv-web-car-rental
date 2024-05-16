@extends('backend.owner.layouts.main')

@section('content')
<!-- Preloader start -->
@include('backend.owner.partials.loading')
<!-- Preloader end -->

<!-- Main wrapper start -->
<div id="main-wrapper">
    <!--  Nav header start -->
    @include('backend.owner.partials.nav-header')
    <!-- Nav header end -->
    <!-- Header start -->
    @include('backend.owner.partials.header-start')
    <!-- Header end ti-comment-alt -->

    <!-- Sidebar start -->
    @include('backend.owner.partials.sidebar')
    <!-- Sidebar end -->

    <!-- Content body start -->
    <div class="content-body">
        <div class="container-fluid">
            <!-- <div class="row">
                <div class="col-md-12">
                   @include('backend.owner.layouts.notification')
                </div>
            </div> -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">

                            <h5 class="card-title">Đánh giá của khách hàng</h5>

                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Khách hàng</th>
                                            <th>Mẫu xe</th>
                                            <th>Hình ảnh</th>
                                            <th>Đánh giá</th>
                                            <th>Bình luận</th>
                                            <th>Trả lời của bạn</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if(isset($res_review))
                                        @foreach($res_review as $val)
                                        <tr>
                                            <td>{{$val->users_name}}</td>
                                            <td>{{$val->cars_name}}</td>
                                            @php
                                            $photo = explode(",", $val->cars_photo);
                                            @endphp
                                            @if(empty($val->cars_photo))
                                            <td>
                                                <img src="{{asset('public/backend/assets/images/project-logo.jpg')}}"
                                                    width="50">
                                            </td>
                                            @else
                                            <td>
                                                <img src="<?= $photo[0] ?? 9 ?>" width="100" height="100">
                                            </td>
                                            @endif
                                            <td style="text-align: center;">{{$val->reviews_rate}}<i
                                                    class="flaticon-086-star" style="color:gold;"></i></td>
                                            <td>{{$val->comment}}</td>
                                            <td>{{$val->reply}}</td>
                                            <td style="text-align: center;">
                                                <a href="" class="btn btn-primary btn-sm" data-toggle="tooltip"
                                                    title="edit" data-placement="bottom">
                                                    <i class="fas fa-edit" style="margin: 10px;font-size: 15px;"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <ul class="pagination justify-content-center">
                            {!! $res_review->links(); !!}
                        </ul>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- Content body end -->

    <!-- Footer start -->
    @include('backend.owner.partials.footer')
    <!-- Footer end -->

</div>
<!-- Main wrapper end -->
<!-- Scripts -->
@include('backend.owner.partials.footer-boby')
@endsection