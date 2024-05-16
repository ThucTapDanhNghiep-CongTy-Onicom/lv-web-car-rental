@extends('backend.dasbroad.index')
@section('main-content')


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Error 404</h4>



                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5 align-self-center">
                                <img src="public/backend/assets/images/error.svg" alt="" class="img-fluid">
                            </div>
                            <!-- end col-->
                            <div class="col-md-7">
                                <div class="error-content text-center">
                                    <h1 class="">404!</h1>
                                    <h3 class="text-primary">Looks like you've got lost...</h3><br>
                                    <a class="btn btn-primary mb-5 waves-effect waves-light" href="{{route('admin')}}">Back
                                        to Dashboard</a>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end cardbody -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->

@endsection