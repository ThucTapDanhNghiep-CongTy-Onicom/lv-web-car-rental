@extends('backend.admin.dasbroad.index')
@section('main-content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Bảng hồi đáp</h4>

                    

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-12 col-xl-6">
                <div class="card">
                    <div class="card-body">
                       

                        <form class="custom-validation" action="{{route('review.update',$reviews->id)}}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                           
    		@method('PATCH')
                            <div class="mb-3 row">
                                <div class="col-sm-12">
                                    <input class="form-control" type="text" id="subject2" name="review" placeholder="Subject" value="{{$reviews->review}}">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="mb-3">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"
                                    placeholder="Tin nhắn của bạn" name="reply">{{$reviews->reply}}</textarea>
                            </div>
                            <div class="mb-0">
                                <div>
                                    <button type="reset" class="btn btn-danger waves-effect ms-1">
                                        Hủy bỏ
                                    </button>
                                    <button type="submit" class="btn btn-light waves-effect waves-light">
                                        Gủi đi
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