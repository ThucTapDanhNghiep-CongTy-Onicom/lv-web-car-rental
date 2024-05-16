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

                                <h5 class="card-title">Thùng rác của bạn</h5>

                                <div class="table-responsive">
                                    <table id="datatable" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Tên xe</th>
                                                <th>Hình ảnh</th>
                                                <th>Chỗ ngồi</th>
                                                <th>Giảm giá</th>
                                                <th>Giá</th>
                                                <th>Tên hãng</th>
                                                <th>Địa chỉ</th>
                                                <th>Trở về</th>
                                                <th>Xóa bỏ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (isset($cars))
                                                @foreach ($cars as $car)
                                                    <tr>
                                                        <td>{{ $car->name }}</td>
                                                        <td>
                                                            <div class="min-carousel">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card" style="width:200px;">
                                                                            <div class="card-body">
                                                                                <div id="carouselExampleIndicators<?= $car->id ?>"
                                                                                    class="carousel slide"
                                                                                    data-bs-ride="carousel">
                                                                                    <?php $photo_split = explode(',', $car->photo); ?>
                                                                                    <ol class="carousel-indicators">
                                                                                        @for ($i = 0; $i < count($photo_split) - 1; $i++)
                                                                                            <li data-bs-target="#carouselExampleIndicators<?= $car->id ?>"
                                                                                                data-bs-slide-to="<?php echo $i; ?>"
                                                                                                class="<?php if ($i == 0) {
                                                                                                    echo 'active';
                                                                                                } ?>">
                                                                                            </li>
                                                                                        @endfor
                                                                                    </ol>

                                                                                    <div class="carousel-inner"
                                                                                        role="listbox">
                                                                                        @for ($i = 0; $i < count($photo_split) - 1; $i++)
                                                                                            <div
                                                                                                class="carousel-item <?php if ($i == 0) {echo 'active';} ?>">
                                                                                                <img class="d-block img-fluid"
                                                                                                    src="<?php echo $photo_split[$i]; ?>"
                                                                                                    alt="First slide">
                                                                                            </div>
                                                                                        @endfor
                                                                                    </div>

                                                                                    <a class="carousel-control-prev"
                                                                                        href="#carouselExampleIndicators<?= $car->id ?>"
                                                                                        role="button" data-bs-slide="prev">
                                                                                        <span
                                                                                            class="carousel-control-prev-icon"
                                                                                            aria-hidden="true"></span>
                                                                                        <span
                                                                                            class="visually-hidden">Previous</span>
                                                                                    </a>
                                                                                    <a class="carousel-control-next"
                                                                                        href="#carouselExampleIndicators<?= $car->id ?>"
                                                                                        role="button" data-bs-slide="next">
                                                                                        <span
                                                                                            class="carousel-control-next-icon"
                                                                                            aria-hidden="true"></span>
                                                                                        <span
                                                                                            class="visually-hidden">Next</span>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        </td>
                                                        <td>{{ $car->seat }}</td>
                                                        <td>{{ $car->discount }}%</td>
                                                        <td>{{ $car->price }}</td>
                                                        <td>
                                                            @if (isset($car->manu_name))
                                                                {{ $car->manu_name }}
                                                            @endif
                                                        </td>
                                                        <td>{{ $car->address }}</td>
                                                        <td style="text-align: center;">
                                                            <form method="POST" action="{{ route('trash.rehibilitate', [$car->id]) }}">
                                                                @csrf
                                                                <button class="btn btn-danger btn-sm"
                                                                    data-id={{ $car->id }}
                                                                    style="height:40px; width:40px;border-radius:50%"
                                                                    data-toggle="tooltip" data-placement="bottom"
                                                                    title="Exchange">
                                                                    <i class="fas fa-exchange-alt" style="margin: 0px 0 0px -3px;"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <form method="POST" action="{{ route('destroy', [$car->id]) }}">
                                                                @csrf
                                                                <button class="btn btn-danger btn-sm nutXoaDayNe"
                                                                    data-id={{ $car->id }}
                                                                    style="height:40px; width:40px;border-radius:50%"
                                                                    data-toggle="tooltip" data-placement="bottom"
                                                                    title="Delete">
                                                                    <i class="fas fa-ban" style="margin: 0px 0 0px -3px;"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <ul class="pagination justify-content-center">
                                {!! $cars->links() !!}
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
