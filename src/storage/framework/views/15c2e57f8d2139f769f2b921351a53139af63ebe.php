
<?php $__env->startSection('content'); ?>
<?php if(isset($banner)): ?>
<?php 
    $photo = $banner->photo;
?>
<div class="hero-wrap ftco-degree-bg" style="background-image: url(<?= $photo ?>);"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <!-- <div class="container">
        <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
            <div class="col-lg-8 ftco-animate">
                <div class="text w-100 text-center mb-md-5 pb-md-5">
                    <h1 class="mb-4"><?php echo e($banner->title); ?></h1>
                    <p style="font-size: 18px;"><?php echo $banner->description; ?></p>
                    <a href="https://vimeo.com/45830194"
                        class="icon-wrap popup-vimeo d-flex align-items-center mt-4 justify-content-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="ion-ios-play"></span>
                        </div>
                        <div class="heading-title ml-5">
                            <span>Easy steps for renting a car</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div> -->
</div>
<?php else: ?>
<div class="hero-wrap ftco-degree-bg" style="background-image: url('/ui/images/bg_1.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
            <div class="col-lg-8 ftco-animate">
                <div class="text w-100 text-center mb-md-5 pb-md-5">
                    <h1 class="mb-4">Fast &amp; Easy Way To Rent A Car</h1>
                    <p style="font-size: 18px;">A small river named Duden flows by their place and supplies it with the
                        necessary regelialia. It is a paradisematic country, in which roasted parts</p>
                    <a href="https://vimeo.com/45830194"
                        class="icon-wrap popup-vimeo d-flex align-items-center mt-4 justify-content-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="ion-ios-play"></span>
                        </div>
                        <div class="heading-title ml-5">
                            <span>Easy steps for renting a car</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<!-- Booking Start-->
<?php echo $__env->make('partials.booking', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Booking End -->

<!-- Feature Start -->
<?php echo $__env->make('partials.feature', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Feature End -->

<!-- About Start -->
<?php echo $__env->make('partials.about-us', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- About End -->



<!-- Location Start-->
<?php echo $__env->make('partials.location', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Location End-->

<!-- Book car Start -->
<?php echo $__env->make('partials.list-cars', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Book car End -->


<!-- Our last services Start-->
<?php echo $__env->make('partials.server', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Our last services End-->

<!-- Newspaper Start -->
<?php echo $__env->make('partials.newspaper', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Newspaper End -->

<!-- Download Start-->
<section class="ftco-section banner bg-1" id="home">
    <div class="overflow"></div>
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading" data-i18n="home.content.download.heading"></span>
                <h3 class="mb-3" style="font-weight: 600;" data-i18n="home.content.download.title"></h3>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <!-- Contents -->
                <div class="content-block">
                    <h5 data-i18n="home.content.download.note"></h5>
                    <!-- App Badge -->
                    <div class="app-badge">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="#" class=" btn-download"><i class="fa fa-android" aria-hidden="true"></i>
                                    <div><span style="font-size: 14px;" data-i18n="home.content.download.android"></span><span>GOOGLE PLAY</span></div>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class=" btn-download"><i class="fa fa-apple" aria-hidden="true"></i>
                                    <div><span style="font-size: 14px;" data-i18n="home.content.download.ios"></span><span>Apple store</span></div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-4">
          <div class="image-block">
            <img class="img-fluid phone-thumb" src="images/iphone-banner.png" alt="iphone-banner">
          </div>
        </div> -->
        </div>
    </div>
</section>
<!-- Download End-->

<!--Partner Start-->
<section id="partner" class="ftco-section">
    <div class="container">
        <h3 data-i18n="home.content.partner.title"></h3>
        <section class="customer-logos slider">
            <div class="slide"><img src="<?php echo e(asset('/ui/images/Logo-02.svg')); ?>"></div>
            <div class="slide"><img src="<?php echo e(asset('/ui/images/Logo-03.svg')); ?>"></div>
            <div class="slide"><img src="<?php echo e(asset('/ui/images/Logo-04.svg')); ?>"></div>
            <div class="slide"><img src="<?php echo e(asset('/ui/images/Logo-05.svg')); ?>"></div>
            <div class="slide"><img src="<?php echo e(asset('/ui/images/Logo-06.svg')); ?>"></div>
            <div class="slide"><img src="<?php echo e(asset('/ui/images/Logo-07.svg')); ?>"></div>
        </section>
        <h2>
    </div>
</section>
<!--Partner End-->

<!-- Total Start -->
<?php echo $__env->make('partials.total', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Total Start -->

<!-- Footer -->
<?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="<?php echo e(asset('/ui/js/js.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/home.blade.php ENDPATH**/ ?>