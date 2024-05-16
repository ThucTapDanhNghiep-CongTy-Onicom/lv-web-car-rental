
<?php $__env->startSection('content'); ?>
<!-- Partner registion start -->
<section class="partner-registration hero-wrap-2 js-fullheight">
    <div class="banner-registration hero-wrap-2 js-fullheight content-registration text-white" style="background: url('/ui/images/bg_3.jpg') center center;background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 show-top ismobile-none">
                    <div class="box-content">
                        <p class="title">Become a Driver Partner and deliver vehicles</p>
                        <p class="more">For more than 4 000 companies in Europe</p>
                        <p class="more-item"><i class='bx bx-check'></i> For more than 4 000 companies in Europe</p>
                        <p class="more-item"><i class='bx bx-check'></i> For more than 4 000 companies in Europe</p>
                        <p class="more-item"><i class='bx bx-check'></i> For more than 4 000 companies in Europe</p>
                    </div>
                </div>
                <div class="col-md-6 show-top">
                    <div class="top-regis">
                        Join a community with more than 15,000 driver partners
                    </div>
                    <div class="bottom-regis">
                        To start your registration, nothing could be simpler
                        <p class="note">Just a simple form !</p>
                        <div class="form-regis">
                            <form action="<?php echo e(route('partner.registration.full')); ?>" method="get">
                                <?php echo csrf_field(); ?>
                                <div class="d-flex">
                                    <div class="form-group mr-2">
                                        <input type="text" class="form-control" name="firstname" placeholder="First name">
                                    </div>
                                    <div class="form-group ml-2">
                                        <input type="text" class="form-control" name="lastname" placeholder="Last name">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Sign up" class="btn btn-primary py-3 px-4">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<style>
    @media  screen and (max-width: 525px) {
        .partner-registration{
            height: 710px !important;
        }
        .partner-registration .banner-registration{
            height: 710px !important;
        }
        .partner-registration .ismobile-none{
            display: none;
        }
    }
</style>
<!-- Partner registion end -->

<!-- Total Start -->
<?php echo $__env->make('partials.total', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Total Start -->

<!-- Footer -->
<?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/pages/partnerRegistration.blade.php ENDPATH**/ ?>