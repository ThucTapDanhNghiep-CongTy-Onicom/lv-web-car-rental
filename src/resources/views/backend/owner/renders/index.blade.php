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
            <div class="row">
                <div class="col-md-12">
                   @include('backend.owner.layouts.notification')
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">

                            <h5 class="card-title">Danh sách hãng xe</h5>
                            {{-- <p class="card-title-desc">
                                <a href="{{route('create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip"
                                    data-placement="bottom" title="Add Render">
                                    <i class="fas fa-plus"></i> 
                                    Thêm hãng xe
                                </a>
                            </p> --}}
                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Tên hãng</th>
                                            <th>Mô tả</th>
                                            <th>Hình ảnh</th>
                                            <th>Trạng thái</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if(isset($res_renders))
                                        @foreach($res_renders as $val)
                                        <tr>
                                            <td>{{$val->manu_name}}</td>
                                            <td>{!!$val->description!!}</td>
                                            <td>
                                                @if($val->photo)
                                                <img src="{{$val->photo}}" width="100" height="100">
                                                @else
                                                <img src="" width="100" height="100">
                                                @endif
                                            </td>
                                            <td style="text-align: center;">
                                                @if($val->feature=='1')
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
                            {!! $res_renders->links(); !!}
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