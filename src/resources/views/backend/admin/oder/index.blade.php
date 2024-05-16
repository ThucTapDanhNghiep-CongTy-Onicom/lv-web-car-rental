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

                                <h5 class="card-title">Order Lists</h5>

                                <div class="table-responsive">
                                    <table id="datatable-buttons" class="table table-striped table-bordered w-100">
                                        <thead>
                                            <tr>
                                                <th>S.N.</th>
                                                <th>Oder By</th>
                                                <th>Car Name</th>
                                                <th>Reder Name</th>
                                                <th>Gender</th>
                                                <th>Address</th>
                                                <th>Color</th>
                                                <th>Seat</th>
                                                <th>Total</th>
                                                <th>Created At</th>
                                                <th>Updated At</th>
                                                
                                            </tr>
                                        </thead>


                                        <tbody>

                                            @foreach($receipts as $receipt)
                                            @php
                                                $title=DB::table('cars')->select('name','color','seat','price')->where('id',$receipt->cars_id)->get();
                                                $info =DB::table('users')->select('name','gender','address')->where('id',$receipt->users_id)->get();
                                                $manuName =DB::table('reders')->select('manu_name')->where('id',$receipt->renders_id)->get();
                                                $bookings =DB::table('bookings')->select('address_on','taxes')->where('id',$receipt->bookings_id)->get();
                                            @endphp
                                            <tr>
                                                <td>{{$receipt->id}}</td>
                                                <td>
                                                    @foreach($info as $info1)
                                                        @if(isset($info1->name))
                                                            {{ $info1->name}} 
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach($title as $data)
                                                        @if(isset($data->name))
                                                            {{ $data->name}} 
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach($manuName as $manu)
                                                        @if(isset($manu->manu_name))
                                                            {{ $manu->manu_name}} 
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach($info as $info1)
                                                        @if(isset($info1->gender))
                                                            {{ $info1->gender}}
                                                        @endif 
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach($bookings as $booking)
                                                        @if(isset($booking->address_on))
                                                            {{ $booking->address_on}}
                                                        @endif  
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach($title as $data1)
                                                        @if(isset($data->color))
                                                            {{ $data->color}}
                                                        @endif  
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach($title as $data)
                                                        @if(isset($data->seat))
                                                            {{ $data->seat}}
                                                        @endif  
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @php
                                                        foreach($bookings as $booking) {
                                                            if(isset($booking->taxes)) {
                                                                $total = ($booking->taxes) / 100;
                                                            }
                                                        }
                                                    @endphp
                                                    @foreach($title as $data)
                                                        @if(isset($data->price))
                                                            @php
                                                                $totalamout = round(($data->price * $total),1);
                                                            @endphp
                                                            {{ $totalamout }}
                                                        @endif  
                                                    @endforeach
                                                </td>
                                                <td><?php $date = date_create($receipt->created_at); echo date_format($date, "d/m/Y"); ?>
                                                </td>
                                                <td><?php $date = date_create($receipt->updated_at); echo date_format($date, "d/m/Y"); ?>
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



</body>

</html>