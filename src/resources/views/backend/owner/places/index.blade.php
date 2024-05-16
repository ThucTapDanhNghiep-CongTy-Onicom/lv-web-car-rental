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

                            <h5 class="card-title">Danh sách địa điểm chưa hoạt động</h5>
                            
                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Quận, huyện</th>
                                            <th>Tỉnh thành</th>
                                            <th>Trạng thái</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if(isset($res_region))
                                        @foreach($res_region as $val)
                                        <tr>
                                            <td>{{$val->city_title}}</td>
                                            <td>{{$val->region_title}}</td>
                                            <td style="text-align: center;">
                                                @if($val->status=='active')
                                                <span class="badge bg-success">active</span>
                                                @else
                                                <span class="badge bg-warning">inactive</span>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <ul class="pagination justify-content-center">
                            {!! $res_region->links(); !!}
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