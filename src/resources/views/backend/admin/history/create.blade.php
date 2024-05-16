@extends('backend.dasbroad.index')
@section('main-content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Banners List</h4>

                   

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-12 col-xl-6">
                <div class="card">
                    <div class="card-body">
                  

                        <form class="form-horizontal" action="{{route('banner.store')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" required="" placeholder="Title">
                                @error('title')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <input type="text" class="form-control" name="description" required="" placeholder="Description">
                                @error('description')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Photo</label>
                                <input class="form-control" type="file" name="upload" accept="image/*">
                                @error('upload')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status</label><br>
                                <input type="checkbox" id="switch1" name="status" switch="none" />
                                <label for="switch1" data-on-label="On" data-off-label="Off"></label>
                                @error('status')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-0">
                                <div>
                                    <button type="submit" class="btn btn-light waves-effect waves-light">
                                        Submit
                                    </button>
                                    <button type="reset" class="btn btn-danger waves-effect ms-1">
                                        Cancel
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