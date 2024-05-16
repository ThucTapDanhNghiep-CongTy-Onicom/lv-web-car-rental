@extends('backend.admin.dasbroad.index')
@section('main-content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Bảng thêm mã khuyến mãi</h4>


                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-12 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Mã tự động</h5>

                        <form class="custom-validation" action="{{route('sale.store')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Người dùng</label>
                                <select class="select2 form-control mb-3 custom-select" name="user"
                                    style="width: 100%; height:36px;">
                                    <option>Chọn</option>
                                    @foreach($suppliers as $supplier)
                                    <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                    @endforeach
                                </select>
                                @error('user')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Giảm giá</label>
                                <input type="number" class="form-control" name="discount" required="">
                               
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ngày sử dụng</label>
                                <input class="form-control" type="date" name="time_start" value="<?= date("Y-m-d"); ?>"
                                    id="example-date-input">
                                @error('time_start')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ngày hết hạn</label>
                                <input class="form-control" type="date" name="time_end"
                                    value="<?= date("Y-m-d", strtotime('+1 day', strtotime(date("Y-m-d")))) ?>"
                                    id="example-date-input">
                                @error('time_end')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-0">
                                <div>

                                    <button type="reset" class="btn btn-danger waves-effect ms-1">
                                        Hủy bỏ
                                    </button>
                                    <button type="submit" class="btn btn-light waves-effect waves-light">
                                        Gửi đi
                                    </button>
                                </div>
                            </div>
                        </form>
                        <!-- end form -->
                    </div>
                    <!-- end cardbody -->
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- container-fluid -->
</div>
@endsection