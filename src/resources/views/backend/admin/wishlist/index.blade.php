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

                                <h5 class="card-title">Danh sách yêu thích</h5>

                                <div class="table-responsive">
                                    <table id="datatable" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>S.N.</th>
                                                <th>Gửi bởi</th>
                                                <th>Tên xe</th>
                                                <th>Giới tính</th>
                                                <th>Địa chỉ</th>
                                                <th>Hình ảnh</th>
                                                <th>Ngày tạo</th>
                                                <th>Ngày cập nhập</th>
                                                
                                            </tr>
                                        </thead>


                                        <tbody>

                                            @foreach($wishlists as $wishlist)
                                            @php
                                            $title=DB::table('cars')->select('name','photo')->where('id',$wishlist->car_id)->get();
                                            $info =
                                            DB::table('users')->select('name','gender','address')->where('id',$wishlist->user_id)->get();
                                            @endphp
                                            <tr>
                                                <td>{{$wishlist->id}}</td>
                                                <td>@foreach($info as $info1){{ $info1->name}} @endforeach</td>
                                                <td>@foreach($title as $data){{ $data->name}} @endforeach</td>
                                                <td>
                                                    @foreach($info as $info1)
                                                        @if(isset($info1->gender))
                                                            {{ $info1->gender}}
                                                        @endif 
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach($info as $info1)
                                                        @if(isset($info1->address))
                                                            {{ $info1->address}}
                                                        @endif  
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach($title as $data)
                                                    @php
                                                        $photo=explode(',',$data->photo);
                                                    @endphp
                                                    @if(isset($data->photo))
                                                    <img src="{{$photo[0]}}"
                                                        alt="Error" style="    width: 100px;height: 100px;">
                                                    @else
                                                    <img src="{{asset('public/backend/assets/images/pattern.png')}}"
                                                        alt="Error" style="    width: 100px;height: 100px;">
                                                    @endif
                                                    @endforeach
                                                </td>
                                                <td><?php $date = date_create($wishlist->created_at); echo date_format($date, "d/m/Y"); ?>
                                                </td>
                                                <td><?php $date = date_create($wishlist->updated_at); echo date_format($date, "d/m/Y"); ?>
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