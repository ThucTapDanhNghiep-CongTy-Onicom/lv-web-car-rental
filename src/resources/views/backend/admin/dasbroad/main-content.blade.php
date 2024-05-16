@extends('backend.admin.dasbroad.index')
@section('main-content')
    <div class="page-content">
        <div class="container-fluid">

            @include('backend.partials.page-title')


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">

                            <h5 class="card-title">Danh sách xe hơi</h5>
                            <p class="card-title-desc">
                                <a href="{{ route('main-content.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-toggle="tooltip" data-placement="bottom" title="Add User"><i
                                        class="fas fa-plus"></i> Thêm Ôtô </a>
                            </p>
                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Tên xe</th>
                                            <th>Hình ảnh</th>
                                            <th>Chỗ ngồi</th>
                                            <th>Giảm giá</th>
                                            <th>Giá</th>
                                            <th>Người cho thuê</th>
                                            <th>Tên hãng</th>
                                            <th>Địa chỉ</th>
                                            <th>Trạng thái</th>
                                            <th>Cập nhập</th>
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

                                                                                <div class="carousel-inner" role="listbox">
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
                                                                                    <span class="carousel-control-prev-icon"
                                                                                        aria-hidden="true"></span>
                                                                                    <span
                                                                                        class="visually-hidden">Previous</span>
                                                                                </a>
                                                                                <a class="carousel-control-next"
                                                                                    href="#carouselExampleIndicators<?= $car->id ?>"
                                                                                    role="button" data-bs-slide="next">
                                                                                    <span class="carousel-control-next-icon"
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
                                                        @if (isset($car->user->name))
                                                            {{ $car->user->name }}
                                                        @endif
                                                    </td>

                                                    <td>
                                                        @if (isset($car->render->manu_name))
                                                            {{ $car->render->manu_name }}
                                                        @endif
                                                    </td>
                                                    <td>{{ $car->address }}</td>
                                                    <td>
                                                        @if ($car->status == 'active')
                                                            <span class="badge bg-success">{{ $car->status }}</span>
                                                        @else
                                                            <span class="badge bg-warning">{{ $car->status }}</span>
                                                        @endif
                                                    </td>


                                                    <td>
                                                        <a href="{{ route('main-content.edit', $car->id) }}"
                                                            class="btn btn-primary btn-sm "
                                                            style="height:30px; width:30px;border-radius:50%;float:left;margin-right:10px"
                                                            data-toggle="tooltip" title="edit" data-placement="bottom"><i
                                                                class="fas fa-edit"></i></a>

                                                    </td>
                                                    <td>
                                                        <form method="POST"
                                                            action="{{ route('main-content.destroy', [$car->id]) }}">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-danger btn-sm nutXoaDayNe"
                                                                data-id={{ $car->id }}
                                                                style="height:30px; width:30px;border-radius:50%"
                                                                data-toggle="tooltip" data-placement="bottom"
                                                                title="Delete"><i class="fas fa-trash-alt"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

            </div>
            <!-- container-fluid -->
        </div>

    @endsection
