@extends('backend.admin.dasbroad.index')
@section('main-content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Chỉnh sửa giao diện</h4>



                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="card">
            <div class="card-body">

                <p class="card-title-desc">
                    <a href="{{route('create.setting')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom"
                        title="Add User"><i class="fas fa-plus"></i> Thêm
                        cấu trúc
                    </a>
                </p>
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Tên biến</th>
                                <th>Giá trị</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @if($data)
                        <tbody>
                            @foreach($data as $row)
                            <tr>
                                <td>{{$row->name}}</td>
                                @if($row->value == '.png'||$row->value == '.jpg'||$row->value == '.svg')
                                <td>
                                    <div class="img-banner">
                                        <img src="" style="width:200px; height: 100px;" alt="">
                                    </div>
                                </td>
                                @else
                                <td>
                                    {!!$row->value!!}
                                </td>
                                @endif
                                <td>
                                    @if($row->status==0)
                                    <span class="badge bg-success">Active</span>
                                    @else
                                    <span class="badge bg-warning">Inactive</span>
                                    @endif
                                </td>
                               
                                <td>
                                    <form method="GET" action="{{route('delete.setting',[$row->id])}}">
                                        @csrf
                                       
                                        <button class="btn btn-danger btn-sm nutXoaDayNe" data-id={{$row->id}}
                                            style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip"
                                            data-placement="bottom" title="Delete"><i
                                                class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->

@endsection