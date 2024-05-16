@include('backend.partials.main')

<head>
    @include('backend.partials.title-meta')
    <!-- DataTables -->
    <link href="public/backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="public/backend/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="public/backend/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
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
                                                <th>User</th>
                                                <th>Car</th>
                                                <th>Comment</th>
                                                <th>Reply</th>
                                                <th>Status</th>
                                                <th>Created_at</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($comments as $comment)
                                            <tr>
                                                <td>{{$comment->id}}</td>
                                                <td>{{$comment->user->name}}</td>
                                                <td>{{$comment->car->name}}</td>
                                                <td>{{$comment->comment}}</td>
                                                <td>{{$comment->replied_comment}}</td>
                                                <td>
                                                    @if($comment->status=='active')
                                                    <span class="badge bg-success">{{$comment->status}}</span>
                                                    @else
                                                    <span class="badge bg-warning">{{$comment->status}}</span>
                                                    @endif
                                                </td>
                                                <td>{{$newDateFormat = date('d M Y', strtotime($comment->created_at))}}
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

</body>

</html>

