@extends('backend.admin.dasbroad.index')
@section('main-content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Danh sách thể loại</h4>



                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-12 col-xl-6">
                <div class="card">
                    <div class="card-body">


                        <form class="custom-validation" action="{{route('category.store')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Tên thể loại</label>
                                <input type="text" class="form-control" name="categories_name" required="" placeholder="Name">
                                @error('categories_name')
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
@push('script')

@endpush