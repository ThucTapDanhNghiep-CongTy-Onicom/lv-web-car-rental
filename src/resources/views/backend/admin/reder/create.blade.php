@extends('backend.admin.dasbroad.index')
@section('main-content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Danh sách hãng xe</h4>

                    <!-- <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Yotrip</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">Form Validation</li>
                        </ol>
                    </div> -->

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-12 col-xl-6">
                <div class="card">
                    <div class="card-body">
                       

                        <form class="custom-validation" action="{{route('reder.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <label class="form-label">Tên hãng</label>
                                <input type="text" class="form-control" name="manu_name" required="" placeholder="Enter name">
                                @error('manu_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Mô tả</label>
                                <textarea id="elm1" name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputPhoto" class="col-form-label">Hình ảnh</label>
                                <div class="input-group">
                                <input id="thumbnail" class="form-control" type="file" name="upload"  accept="image/*">
                                </div>
                                <div id="holder" style="margin-top:15px;max-height:100px;"></div>

                                @error('photo')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Tính năng</label>
                                <input type="number" class="form-control" name="feature" required="">
                               
                            </div>
                            <div class="mb-0">
                                <div>
                                <button type="reset" class="btn btn-danger waves-effect ms-1">
                                        Hủy bỏ
                                    </button>
                                    <button type="submit" class="btn btn-light waves-effect waves-light">
                                        Cập nhập
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