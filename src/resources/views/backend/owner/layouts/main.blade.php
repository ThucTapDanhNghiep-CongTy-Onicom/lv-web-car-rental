<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <title>Yotrip</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{asset('/backend/owner/vendor/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('/backend/owner/vendor/nouislider/nouislider.min.css')}}">
	<!-- Style css -->
    <link href="{{asset('/backend/owner/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('/backend/owner/css/admin.css')}}" rel="stylesheet">
    <link rel="icon" href="{{ asset('/ui/images/Yotrip_new2.png') }}" type="image/x-icon" />
    <link href="/backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />
    
    @stack('styles')

</head>


<body>
    @yield('content')
</body>

</html>
