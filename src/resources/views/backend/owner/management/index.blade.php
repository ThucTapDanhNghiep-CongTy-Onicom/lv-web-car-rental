@extends('backend.owner.layouts.main')
@section('content')
    <!--*******************
                Preloader start
            ********************-->
    @include('backend.owner.partials.loading')
    <!--*******************
                Preloader end
            ********************-->

    <!--**********************************
                Main wrapper start
            ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
                    Nav header start
                ***********************************-->
        @include('backend.owner.partials.nav-header')
        <!--**********************************
                    Nav header end
                ***********************************-->



        <!--**********************************
                    Header start
                ***********************************-->
        @include('backend.owner.partials.header-start')
        <!--**********************************
                    Header end ti-comment-alt
                ***********************************-->

        <!--**********************************
                    Sidebar start
                ***********************************-->
        @include('backend.owner.partials.sidebar')
        <!--**********************************
                    Sidebar end
                ***********************************-->

        <!--**********************************
                    Content body start
                ***********************************-->
        @include('backend.owner.partials.content')
        <!--**********************************
                    Content body end
                ***********************************-->



        <!--**********************************
                    Footer start
                ***********************************-->
        @include('backend.owner.partials.footer')
        <!--**********************************
                    Footer end
                ***********************************-->




    </div>
    <!--**********************************
                Main wrapper end
            ***********************************-->

    <!--**********************************
                Scripts
            ***********************************-->
    @include('backend.owner.partials.footer-boby')
@endsection
