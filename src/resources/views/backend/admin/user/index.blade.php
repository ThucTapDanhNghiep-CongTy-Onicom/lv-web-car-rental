@include('backend.partials.main')

<head>

    @include('backend.partials.title-meta')

    <!-- DataTables -->
    <link href="{{asset('public/backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet"
        type="text/css" />
    <link href="{{asset('public/backend/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}"
        rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{asset('public/backend/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}"
        rel="stylesheet" type="text/css" />

    @include('backend.partials.head-css')

</head>

@include('backend.partials.body')

<!-- Begin page -->
<div id="layout-wrapper">

    @include('backend.partials.menu')

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                @include('backend.partials.page-title')

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">

                                <h5 class="card-title">Danh sách người dùng</h5>

                                <div class="table-responsive">
                                    <table id="datatable" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên</th>
                                                <th>Email</th>
                                                <th>Số phone</th>
                                                <th>Giới tính</th>
                                                <th>Địa chỉ</th>
                                                <th>Hình ảnh</th>
                                                <th>Trạng thái</th>
                                                <th>Ngày tạo</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>


                                        <tbody>

                                            @foreach($users as $user)
                                            <tr>
                                                <td>{{$user->id}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                               
                                                <td>{{$user->phone}}</td>
                                                <td>{{$user->gender}}</td>
                                                <td>{{$user->address}}</td>
                                                <td>
                                                    @if($user->photo)
                                                        @if($user->social_type == "google")
                                                        <img src="{{$user->photo}}"
                                                            alt="{{$user->name}}" style="width: 100px;height: 100px;">
                                                        @else
                                                        @if($user->photo == null)
                                                        <img src="{{asset('/ui/images/users/user-3.jpg')}}"
                                                            alt="{{$user->name}}" style="width: 100px;height: 100px;">
                                                        @else 
                                                        <img src="{{$user->photo}}"
                                                            alt="{{$user->name}}" style="width: 100px;height: 100px;">
                                                        @endif
                                                        @endif
                                                    @else
                                                    <img src="{{asset('/backend/assets/images/pattern.png')}}"
                                                        alt="Error" style="width: 100px;height: 100px;">

                                                    @endif
                                                </td>

                                                <td>
                                                    @if($user->status=='active')
                                                    <span class="badge bg-success">{{$user->status}}</span>
                                                    @else
                                                    <span class="badge bg-warning">{{$user->status}}</span>
                                                    @endif
                                                </td>

                                               



                                                <td><?php $date = date_create($user->created_at); echo date_format($date, "d/m/Y"); ?>
                                                </td>

                                                <td>
                                                    <a href="{{route('user.edit',$user->id)}}"
                                                        class="btn btn-primary btn-sm "
                                                        style="height:30px; width:30px;border-radius:50%;float:left;margin-right:10px"
                                                        data-toggle="tooltip" title="edit" data-placement="bottom"><i
                                                            class="fas fa-edit"></i></a>
                                                    <form method="POST" action="{{route('user.destroy',[$user->id])}}">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger btn-sm nutXoaDayNe"
                                                            data-id={{$user->id}}
                                                            style="height:30px; width:30px;border-radius:50%"
                                                            data-toggle="tooltip" data-placement="bottom"
                                                            title="Delete"><i class="fas fa-trash-alt"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->



            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        @include('backend.partials.footer')
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

@include('backend.partials.right-sidebar')

@include('backend.partials.vendor-scripts')

@include('backend.partials.table')

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>
//Script tạo popup hiện lên khi bấm nút xóa
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.nutXoaDayNe').click(function(e) {
        var form = $(this).closest('form');
        var dataID = $(this).data('id');
        // alert(dataID);
        e.preventDefault();
        swal({
                title: "Confirm!",
                text: "user that has been deleted cannot be retrieved!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                } else {
                    swal("Oh good luck, not deleted yet!!!");
                }
            });
    })
})
</script>

</body>

</html>