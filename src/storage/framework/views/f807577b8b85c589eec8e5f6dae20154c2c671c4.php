
<?php $__env->startSection('content'); ?>
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/ui/images/bg_3.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo e(url('/')); ?>">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Contact <i
                                class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread">Contact Us</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section contact-section">
        <div class="container">
            <div class="row d-flex mb-5 contact-info">
                <div class="col-md-4">
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <div class="border w-100 p-4 rounded mb-2 d-flex">
                                <div class="icon mr-3">
                                    <span class="icon-map-o"></span>
                                </div>
                                <p><span>Address:</span>9th Floor, Vien Dong Building, 14 Phan Ton, Da Kao Ward, District 1,
                                    Ho Chi Minh City</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="border w-100 p-4 rounded mb-2 d-flex">
                                <div class="icon mr-3">
                                    <span class="icon-mobile-phone"></span>
                                </div>
                                <p><span>Phone:</span> <a href="tel://1234567920">1900 9217 210</a></p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="border w-100 p-4 rounded mb-2 d-flex">
                                <div class="icon mr-3">
                                    <span class="icon-envelope-o"></span>
                                </div>
                                <p><span>Email:</span> <a href="mailto:support@yotrip.vn">support@yotrip.vn</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 block-9 mb-md-5">
                    <form action="<?php echo e(route('contact.save')); ?>" class="bg-light p-5 contact-form" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Your Email">
                        </div>
                        <!-- <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Subject">
                                </div> -->
                        <div class="form-group">
                            <textarea name="message" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send Message" class="btn btn-car py-3 px-5">
                        </div>
                    </form>

                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div id="google-map" class="bg-white"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script defer
        src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(env('GOOGLE_MAPS_API_KEY')); ?>&callback=iMap&libraries=places&v=weekly">
    </script>
    <script>
        function iMap() {
            //TODO: Setup map
            const uluru = {
                lat: 10.8037082,
                lng: 106.74719
            };
            // The map, centered at Uluru
            const map = new google.maps.Map(document.getElementById("google-map"), {
                zoom: 13,
                zoomControl: false,
                streetViewControl: false,
                scrollwheel: true,
                disableDefaultUI: true,
                center: uluru,
                mapTypeId: "roadmap",
            });
            // The marker, positioned at Uluru
            const marker = new google.maps.Marker({
                position: uluru,
                map: map,
            });

        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/pages/contact.blade.php ENDPATH**/ ?>