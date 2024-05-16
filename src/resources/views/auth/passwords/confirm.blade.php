<!DOCTYPE html>
<html lang="en">

<head>
    <title>Yotrip - Reset</title>
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
    <link rel="stylesheet" href="{{asset('/ui/css/loader.css')}}">>
    <link rel="icon" href="{{asset('/ui/images/icon.svg')}}" type="image/x-icon" />

</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Confirm Password') }}</div>
    
                    <div class="card-body">
                        {{ __('Please confirm your password before continuing.') }}
    
                        <form method="POST" action="{{ route('password.confirm') }}">
                            @csrf
    
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Confirm Password') }}
                                    </button>
    
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    


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
