@extends('backend.admin.dasbroad.index')
@section('main-content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Bảng trả lời giao dịch</h4>

                   

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-12 col-xl-6">
                <div class="card">
                    <div class="card-body">
                     

                        <form class="custom-validation" action="{{route('booking.update',$bookings->id)}}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">

                                <select name="status" class="form-control">
                                     <option value="trading" {{(($bookings->status=='trading') ? 'selected' : '')}}>
                                        Trading
                                    </option>
                                    <option value="active" {{(($bookings->status=='active') ? 'selected' : '')}}>Active
                                    </option>

                                    <option value="inactive" {{(($bookings->status=='inactive') ? 'selected' : '')}}>Inactive
                                    </option>
                                    
                                </select>
                                @error('status')
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
@push('scripts')
<script src="{{asset('public/backend/assets/libs/dropzone/min/dropzone.min.js')}}"></script>
<script src="{{asset('public/backend/assets/libs/dropify/js/dropify.min.js')}}"></script>

<script src="{{asset('public/backend/assets/js/pages/form-fileuploads.init.js')}}"></script>
<script src="{{asset('public/backend/assets/js/app.js')}}"></script>
@endpush