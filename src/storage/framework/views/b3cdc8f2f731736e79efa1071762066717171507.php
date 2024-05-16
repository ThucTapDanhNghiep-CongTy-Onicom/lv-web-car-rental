<!DOCTYPE html>
<html lang="en">

<head>
    <title>Yotrip - Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('/ui/css/open-iconic-bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('ui/css/animate.css')); ?>">
    <!-- or the reference on CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">

    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- themify icon -->
    <link rel="stylesheet" href="<?php echo e(asset('/ui/css/css/themify-icons.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('/ui/css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/ui/css/owl.theme.default.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/ui/css/magnific-popup.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('/ui/css/aos.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('/ui/css/ionicons.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('/ui/css/bootstrap-datepicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/ui/css/jquery.timepicker.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('/ui/css/flaticon.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/ui/css/icomoon.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/ui/css/styles.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/ui/css/partner.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/ui/css/loader.css')); ?>">


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
                                    <img src="/ui/images/about.jpg" alt="Logo">
                                </div>
                                <div class="group-icon">
                                    <div class="icon-item">
                                        <a href="<?php echo e(url('auth/google')); ?>">
                                            <img src="/ui/images/logo-google.png" class="img-fluid img-base"
                                                alt="Google">
                                        </a>
                                    </div>
                                    <div class="icon-item">
                                        <a href="<?php echo e(url('/getInfo-facebook/facebook')); ?>">
                                            <img src="/ui/images/logo-fb.png" class="img-fluid img-base"
                                                alt="Facebook">
                                        </a>
                                    </div>
                                    <div class="icon-item">
                                        <a href="">
                                            <img src="/ui/images/logo-apple.png" class="img-fluid img-base"
                                                alt="Apple" style="    position: relative;
    top: -2px;
    left: 1px;
    right: 0;
    bottom: 1px">
                                        </a>
                                    </div>
                                </div>
                                <p>Dont’s have an account?</p>
                                <a href="<?php echo e(route('user.register')); ?>">Sign up</a>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-right">
                                <div class="logo">
                                    <img src="/ui/images/about.jpg" class="img-fluid" alt="Logo">
                                    <h2>Carbook</h2>
                                </div>
                                <div class="form-content p-5">
                                    <form action="<?php echo e(route('user.login.submit')); ?>" class="request-form" method="post">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" placeholder="Email">
                                        </div>
                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control"
                                                placeholder="Password">
                                        </div>
                                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        <div class="form-check">
                                            <input type="checkbox" name="remember_token"
                                                value="<?php echo e(old('remember_token') ? 'checked' : ''); ?>"> <label
                                                class="form-check-label" for="customControlInline">Remember
                                                me</label>
                                        </div>
                                        <div class="form-group mt-3">
                                            <input type="submit" class="btn btn-car-b" value="LOGIN">
                                        </div>
                                        <div class="">
                                            <?php if(Route::has('password.request')): ?>
                                            <a href="<?php echo e(route('password.request')); ?>">Forgot Password?</a>
                                            <?php endif; ?>
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


    <script src="<?php echo e(asset('/ui/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/ui/js/jquery-migrate-3.0.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/ui/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/ui/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/ui/js/jquery.easing.1.3.js')); ?>"></script>
    <script src="<?php echo e(asset('/ui/js/jquery.waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/ui/js/jquery.stellar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/ui/js/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/ui/js/jquery.magnific-popup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/ui/js/aos.js')); ?>"></script>
    <script src="<?php echo e(asset('/ui/js/jquery.animateNumber.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/ui/js/bootstrap-datepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('/ui/js/jquery.timepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/ui/js/scrollax.min.js')); ?>"></script>


    <script src="<?php echo e(asset('/ui/js/main.js')); ?>"></script>


    <script src="<?php echo e(asset('/ui/js/partner.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>

</body>

</html><?php /**PATH /var/www/html/resources/views/auth/login.blade.php ENDPATH**/ ?>