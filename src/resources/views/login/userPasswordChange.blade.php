<!DOCTYPE html>
<html lang="en">

<head>
    <title>Yotrip - ChangePassword</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/ui/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/ui/css/animate.css')}}">
    <!-- or the reference on CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">

    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- themify icon -->
    <link rel="stylesheet" href="{{asset('/ui/css/css/themify-icons.css')}}">

    <link rel="stylesheet" href="{{asset('/ui/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('/ui/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('/ui/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('/ui/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('/ui/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('/ui/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('/ui/css/jquery.timepicker.css')}}">

    <link rel="stylesheet" href="{{asset('/ui/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('/ui/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('/ui/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('/ui/css/partner.css')}}">
    <link rel="stylesheet" href="{{asset('/ui/css/loader.css')}}">

    <link rel="stylesheet" href="{{asset('/ui/css/styles.css')}}">
  <link rel="icon" href="{{asset('/ui/images/Yotrip_new2.png')}}" type="image/x-icon" />
</head>

<body>
    <div id="back-car"></div>
    <div id="login">
        <div class="container">
            <div class="container-fluids">
                <div class="container-fluid form-login">
                    <div class="row no-gutters">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-left">
                                <div class="logo">
                                    <img src="..//ui/images/about.jpg" alt="Logo">
                                </div>
                                <div class="group-icon">
                                    <div class="icon-item">
                                        <a href="{{ url('auth/google')}}">
                                            <img src="..//ui/images/logo-google.png" class="img-fluid img-base"
                                                alt="Google">
                                        </a>
                                    </div>
                                    <div class="icon-item">
                                        <a href="{{url('/getInfo-facebook/facebook')}}">
                                            <img src="..//ui/images/logo-fb.png" class="img-fluid img-base"
                                                alt="Facebook">
                                        </a>
                                    </div>
                                    <div class="icon-item">
                                        <a href="">
                                            <img src="..//ui/images/logo-apple.png" class="img-fluid img-base"
                                                alt="Apple" style="position: relative;top: -3px;left: -0.5px;right: 0;bottom: 1px">
                                        </a>
                                    </div>
                                </div>
                                <p>Dont’s have an account?</p>
                                <a href="{{route('user.register')}}">Sign up</a>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-right">
                                <div class="logo">
                                    <img src="{{asset('/ui/images/Group.svg')}}" class="img-fluid" alt="Logo">
                                  
                                </div>
                              
                                <div class="form-content p-5">
                                    @foreach ($errors->all() as $error)
                                    <p class="text-danger" style="font-size: small;">{{ $error }}</p>
                                    @endforeach
                                    <form action="{{route('user.changepass.save')}}" class="request-form" method="post">
                                        @csrf

                                        <div class="form-group">
                                            <input type="password" class="form-control" name="current_password"
                                                placeholder="Current Password" autocomplete="current-password">
                                        </div>

                                        <div class="form-group">
                                            <input type="password" name="new_password" class="form-control"
                                                placeholder="New Password" autocomplete="current-password">
                                        </div>

                                        <div class="form-group">
                                            <input type="password" name="new_confirm_password" class="form-control"
                                                placeholder="New Confirm Password" autocomplete="current-password">
                                        </div>

                                        <div class="form-group mt-3">
                                            <input type="submit" class="btn btn-car-b" value="LOGIN">
                                        </div>
                                        <div class="">
                                            @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}">Forgot Password?</a>
                                            @endif
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


    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00" />
        </svg></div>


    <script src="{{asset('/ui/js/jquery.min.js')}}"></script>
    <script src="{{asset('/ui/js/jquery-migrate-3.0.1.min.js')}}"></script>
    <script src="{{asset('/ui/js/popper.min.js')}}"></script>
    <script src="{{asset('/ui/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/ui/js/jquery.easing.1.3.js')}}"></script>
    <script src="{{asset('/ui/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('/ui/js/jquery.stellar.min.js')}}"></script>
    <script src="{{asset('/ui/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('/ui/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('/ui/js/aos.js')}}"></script>
    <script src="{{asset('/ui/js/jquery.animateNumber.min.js')}}"></script>
    <script src="{{asset('/ui/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('/ui/js/jquery.timepicker.min.js')}}"></script>
    <script src="{{asset('/ui/js/scrollax.min.js')}}"></script>


    <script src="{{asset('/ui/js/main.js')}}"></script>


    <script src="{{asset('/ui/js/partner.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>

</body>

</html>