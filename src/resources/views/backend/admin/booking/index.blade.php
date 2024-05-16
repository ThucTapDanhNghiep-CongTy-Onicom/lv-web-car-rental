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

                                <h5 class="card-title">Danh sách đặt xe</h5>

                                <div class="table-responsive">
                                    <table id="datatable-buttons" class="table table-striped table-bordered w-100">
                                        <thead>
                                            <tr>
                                                <th>S.N.</th>
                                                <th>Tên người dùng</th>
                                                <th>Tên xe</th>
                                                <th>Thuế</th>
                                                <th>Địa chỉ</th>
                                                <th>Hình chụp</th>
                                                <th>Ngày bắt đầu</th>
                                                <th>Ngày kết thúc</th>
                                                <th>Trạng thái</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>


                                        <tbody>

                                            @foreach($bookings as $booking)
                                            @php
                                            $title=DB::table('cars')->select('name','photo')->where('id',$booking->cars_id)->get();
                                            $info =
                                            DB::table('users')->select('name')->where('id',$booking->users_id)->get();
                                            @endphp
                                            <tr>
                                                <td>{{$booking->id}}</td>
                                                <td>@foreach($info as $info1){{ $info1->name}} @endforeach</td>
                                                <td>@foreach($title as $data){{ $data->name}} @endforeach</td>
                                                <td>{{$booking->taxes}}</td>
                                                <td>{{$booking->address_on}}</td>
                                                <td>
                                                    @foreach($title as $data)
                                                    @php
                                                        $photo=explode(',',$data->photo);
                                                       
                                                        
                                                    @endphp
                                                    @if(isset($photo))
                                                   
                                                    <img src="{{$photo[0]}}"
                                                        alt="Error" style="    width: 100px;height: 100px;">
                                                   
                                                    @else
                                                    <img src="{{asset('public/backend/assets/images/pattern.png')}}"
                                                        alt="Error" style="    width: 100px;height: 100px;">
                                                    @endif
                                                    @endforeach
                                                </td>
                                                @php
                                                    $date =$booking->date_start;
                                                    $date_start = date('d/m/Y', strtotime($date));
                                                    
                                                    $date1 =$booking->date_end;
                                                    $date_end = date('d/m/Y', strtotime($date1));
                                                @endphp
                                                <td>
                                                    {{ $date_start }}
                                                </td>
                                                <td>
                                                    {{ $date_end }}
                                                </td>
                                                <td>
                                                    @if($booking->status=='trading')
                                                    <span class="badge bg-warning">{{$booking->status}}</span>
                                                    @elseif($booking->status=='active')
                                                    <span class="badge bg-success">{{$booking->status}}</span>
                                                    @else
                                                    <span class="bg-rounded" style="background: #f25858;border-radius: 4px;font-size: 75%;padding: .25em .4em;font-weight: 500;color: #fff;">{{$booking->status}}</span>
                                                    @endif
                                                </td>


                                                <td>
                                                    <a href="{{route('booking.edit',$booking->id)}}"
                                                        class="btn btn-primary btn-sm "
                                                        style="height:30px; width:30px;border-radius:50%;float:left;margin-right:10px"
                                                        data-toggle="tooltip" title="edit" data-placement="bottom"><i
                                                            class="fa fa-eye"></i></a>

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