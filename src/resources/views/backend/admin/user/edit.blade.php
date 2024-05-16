@extends('backend.admin.dasbroad.index')
@section('main-content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Danh sách người dùng</h4>

                 

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-12 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">


                                <div class="">
                                    <form class="form-horizontal form-material mb-0"
                                        action="{{route('user.update',$users->id)}}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <img src="{{asset('public/backend/uploads/images/users/'.$users->photo)}}" alt="" style="width: 100px;
    height: 100px;
    display: block;margin-bottom: 5px;">
                                        <input type="file" id="input-file-now-custom-1" class="dropify" name="upload"
                                            data-default-file="{{asset('public/backend/assets/images/users/user-3.jpg')}}" />

                                       
                                        <div class="mb-3">
                                            <input type="text" placeholder="Full Name" class="form-control" name="name"
                                                value="{{$users->name}}">
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <input type="email" placeholder="Email" class="form-control"
                                                    name="email" id="example-email" value="{{$users->email}}">
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <select name="gender" class="form-control">
                                                    <option value="male"
                                                        {{(($users->gender=='male') ? 'selected' : '')}}>Male</option>
                                                    <option value="female"
                                                        {{(($users->gender=='female') ? 'selected' : '')}}>Female
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <input type="text" placeholder="Address" name="address"
                                                    class="form-control" value="{{$users->address}}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <input type="text" placeholder="Phone No" name="phone"
                                                    class="form-control" value="{{$users->phone}}">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <select name="role" class="form-control">
                                                  
                                                    <option value="user"
                                                        {{(($users->role=='user') ? 'selected' : '')}}> User
                                                    </option>
                                                    <option value="mod"
                                                        {{(($users->role=='mod') ? 'selected' : '')}}> Admin
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <select name="status" class="form-control">
                                                <option value="active"
                                                    {{(($users->status=='active') ? 'selected' : '')}}>Active</option>
                                                <option value="inactive"
                                                    {{(($users->status=='inactive') ? 'selected' : '')}}>Inactive
                                                </option>
                                            </select>
                                            @error('status')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <div>

                                                <button type="submit"
                                                    class="btn btn-primary btn-sm text-light px-4 mt-3 float-end mb-0">
                                                    Submit
                                                </button>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- container-fluid -->
</div>
@endsection
@push('scripts')
<script src="{{asset('public/backend/assets/libs/tinymce/tinymce.min.js')}}"></script>

<script src="{{asset('public/backend/assets/js/pages/form-editor.init.js')}}"></script>

@endpush