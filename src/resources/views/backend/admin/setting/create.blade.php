@extends('backend.admin.dasbroad.index')
@section('main-content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Thêm cấu trúc</h4>

                  

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-body">
                      

                        <form class="form-horizontal" action="{{route('store.setting')}}" method="POST"
                            enctype="multipart/form-data">
                            {{csrf_field()}}

                            <div class="mb-3">
                                <label class="form-label">Tên biến</label>
                                <input type="text" class="form-control" name="name" required="" placeholder="Tên biến">
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Giá trị</label>
                                <textarea id="elm1" name="value" placeholder="Gía trị"></textarea>
                                @error('value')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Hình ảnh</label>
                                <input class="form-control" type="file" name="upload" accept="image/*">
                                @error('upload')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            
                            <div class="mb-0">
                                <div>
                                    <button type="reset" class="btn btn-danger waves-effect ms-1">
                                        Cancel
                                    </button>
                                    <button type="submit" class="btn btn-light waves-effect waves-light">
                                        Submit
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
@push('scripts')
<!--tinymce js-->
<script src="{{asset('public/backend/assets/libs/tinymce/tinymce.min.js')}}"></script>

<script src="{{asset('public/backend/assets/js/pages/form-editor.init.js')}}"></script>
@endpush