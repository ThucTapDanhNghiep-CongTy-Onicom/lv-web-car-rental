@include('backend.partials.main')

<head>
    @include('backend.partials.title-meta')
 
        <!-- DataTables -->
        <link href="{{asset('public/backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('public/backend/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{asset('public/backend/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
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

                               
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Mã</th>
                                                <th>Giảm giá</th>
                                                <th>Thời gian bắt đầu</th>
                                                <th>Thời gian kết thúc</th>
                                                <th>Xóa bỏ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($sales as $sale)
                                            <tr>
                                                <td>{{$sale->id}}</td>
                                                <td>{{$sale->zipcode}}</td>
                                                <td>{{$sale->discount_sale}}%</td>
                                                <td>{{$newDateFormat = date('d M Y', strtotime($sale->time_start))}}
                                                </td>
                                                <td>{{$newDateFormat = date('d M Y', strtotime($sale->time_end))}}</td>
                                                <td>
                                                    <form method="POST" action="{{route('sale.destroy',[$sale->id])}}">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger btn-sm dltBtn"
                                                            data-id={{$sale->id}}
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
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.dltBtn').click(function(e) {
        var form = $(this).closest('form');
        var dataID = $(this).data('id');
        // alert(dataID);
        e.preventDefault();
        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                } else {
                    swal("Your data is safe!");
                }
            });
    })
})
</script>

</body>

</html>
