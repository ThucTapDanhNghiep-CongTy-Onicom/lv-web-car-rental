
<?php $__env->startSection('content'); ?>
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/ui/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo e(url('/')); ?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>About us <i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">About Us</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-about">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(/ui/images/about.jpg);">
            </div>
            <div class="col-md-6 wrap-about ftco-animate">
                <div class="heading-section heading-section-white pl-md-5">
                    <span class="subheading">About us</span>
                    <h2 class="mb-4">Welcome to Yotrip</h2>

                    <p>Yotrip is a 4-7 seat self-driving car rental application platform, following the sharing economy model.</p>
                    <p>Yotrip relies on technology to provide a comprehensive solution to travel problems by connecting customers with self-driving car rental service providers.</p>
                    <p>Yotrip with the mission of simplifying the car rental process with many utilities through mobile applications, and at the same time building a civilized and dynamic sharing ecosystem.</p>
                    <p><a href="<?php echo e(route('about')); ?>" class="btn btn-light py-3 px-4">Search Vehicle</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-intro partner" style="background: url(/ui/images/bg_2.jpg) center;">
    <div class="overlays"></div>
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-md-6 heading-section heading-section-white ftco-animate">
                <h3 class="mb-3 text-white">Become our partner for a chance to earn extra monthly income.</h3>
                <a href="<?php echo e(route('partner.registration')); ?>" class="btn btn-secondary btn-lg">Partner Registration</a>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section testimony-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Testimonial</span>
                <h2 class="mb-3">Happy Clients</h2>
            </div>
        </div>
        <div class="row ftco-animate">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel ftco-owl">
                    <div class="item">
                        <div class="testimony-wrap rounded text-center py-4 pb-5">
                            <div class="user-img mb-2" style="background-image: url(/ui/images/person_1.jpg)">
                            </div>
                            <div class="text pt-4">
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia
                                    and Consonantia, there live the blind texts.</p>
                                <p class="name">Roger Scott</p>
                                <span class="position">Marketing Manager</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap rounded text-center py-4 pb-5">
                            <div class="user-img mb-2" style="background-image: url(/ui/images/person_2.jpg)">
                            </div>
                            <div class="text pt-4">
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia
                                    and Consonantia, there live the blind texts.</p>
                                <p class="name">Roger Scott</p>
                                <span class="position">Interface Designer</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap rounded text-center py-4 pb-5">
                            <div class="user-img mb-2" style="background-image: url(/ui/images/person_3.jpg)">
                            </div>
                            <div class="text pt-4">
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia
                                    and Consonantia, there live the blind texts.</p>
                                <p class="name">Roger Scott</p>
                                <span class="position">UI Designer</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap rounded text-center py-4 pb-5">
                            <div class="user-img mb-2" style="background-image: url(/ui/images/person_1.jpg)">
                            </div>
                            <div class="text pt-4">
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia
                                    and Consonantia, there live the blind texts.</p>
                                <p class="name">Roger Scott</p>
                                <span class="position">Web Developer</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap rounded text-center py-4 pb-5">
                            <div class="user-img mb-2" style="background-image: url(/ui/images/person_1.jpg)">
                            </div>
                            <div class="text pt-4">
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia
                                    and Consonantia, there live the blind texts.</p>
                                <p class="name">Roger Scott</p>
                                <span class="position">System Analyst</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .ftco-intro.partner .overlays {
    position: absolute;
    top: -120px;
    left: -100px;
    right: 0;
    bottom: -120px;
    width: 40%;
    content: '';
    opacity: 1;
    background: #e85626;
    -ms-transform: rotate(18deg);
    -webkit-transform: rotate(18deg);
    transform: rotate(18deg);
}
</style>
<!-- Total Start -->
<?php echo $__env->make('partials.total', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Total Start -->

<!-- Footer -->
<?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/pages/about.blade.php ENDPATH**/ ?>