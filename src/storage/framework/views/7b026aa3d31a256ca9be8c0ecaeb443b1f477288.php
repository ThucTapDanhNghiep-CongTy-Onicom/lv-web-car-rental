<section class="ftco-section ftco-no-pt bg-light pt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <span class="subheading" data-i18n="home.content.featureVehicle.heading"></span>
                <h2 class="mb-2" data-i18n="home.content.featureVehicle.title"></h2>
                <p>
                <h3><b data-i18n="home.content.featureVehicle.self"></b></h3>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="carousel-car owl-carousel">
                    <?php $__currentLoopData = $drivingCar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $driving): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(isset($driving)): ?>
                            <?php
                                $photo = explode(',', $driving->photo);
                                $encode = encrypt($driving->id);
                            ?>

                            <div class="item">
                                <div class="car-wrap rounded ftco-animate">
                                    <div class="img rounded d-flex align-items-end"
                                        style="background-image: url('<?= $photo[0] ?>');">
                                    </div>
                                    <div class="text">
                                        <h2 class="mb-0"><a
                                                href="<?php echo e(route('car.detail', $encode)); ?>"><?php echo e($driving->name); ?></a>
                                        </h2>
                                        <div class="d-flex mb-3">
                                            <span class="cat"><?php echo e($driving->render->manu_name); ?></span>
                                            <p class="price ml-auto">
                                                <?= number_format($driving->price, 0, ',', '.') . ' VNĐ' ?>
                                                <span>/day</span>
                                            </p>
                                        </div>
                                        <!-- Tính tổng rate trung bình  -->
                                        <?php
                                            $numberRate = DB::table('reviews')
                                                ->where('cars_id', $driving->id);
                                            $sumRating = DB::table('reviews')
                                                ->where('cars_id', $driving->id);
                                            $itemAge = 0;
                                        ?>

                                        <div class="wrapper">
                                            <?php for($i = 1; $i <= 5; $i++): ?>
                                                <i class="ion-ios-star <?php echo e($i <= $itemAge ? 'active' : ''); ?>"></i>
                                            <?php endfor; ?>
                                        </div>
                                        <!-- Số chuyến đi -->
                                        <?php
                                            $icheck = false;
                                            
                                            $count = DB::table('bookings')
                                                ->where('status', 'active')
                                                ->where('cars_id', $driving->id)->count();
                                        ?>


                                        <span class="add-wapper">
                                            <?= str_pad($count, 2, '0', STR_PAD_LEFT) ?> trip
                                        </span>


                                        <!-- địa chỉ -->
                                        <div class="location">
                                            <div class=located>
                                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                <?php echo e($driving->city_title); ?>, <?php echo e($driving->region_title); ?>

                                            </div>
                                        </div>
                                        <p class="d-flex mb-0 d-block"><a href="<?php echo e(route('car.booking', $encode)); ?>"
                                                class="btn btn-orange py-2 mr-1"  data-i18n="car.rental"></a> <a
                                                href="<?php echo e(route('car.detail', $encode)); ?>"
                                                class="btn btn-gray py-2 ml-1" data-i18n="car.detail"></a></p>
                                        <div class="regis-partner-car" style="margin-top: 10px;padding-bottom: 10px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <p>
                <h3><b data-i18n="home.content.featureVehicle.carDriver"></b></h3>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="carousel-car owl-carousel">
                    <?php $__currentLoopData = $driverCar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $driver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(isset($driver)): ?>
                            <?php
                                $photo = explode(',', $driver->photo);
                                $encode = encrypt($driver->id);
                            ?>

                            <div class="item">
                                <div class="car-wrap rounded ftco-animate">
                                    <div class="img rounded d-flex align-items-end"
                                        style="background-image:  url('<?= $photo[0] ?>');">
                                    </div>
                                    <div class="text">
                                        <h2 class="mb-0"><a
                                                href="<?php echo e(route('car.detail', $encode)); ?>"><?php echo e($driver->name); ?></a>
                                        </h2>
                                        <div class="d-flex mb-3">
                                            <span class="cat"><?php echo e($driver->render->manu_name); ?></span>
                                            <p class="price ml-auto">
                                                <?= number_format($driver->price, 0, ',', '.') . ' VNĐ' ?>
                                                <span>/</span><span data-i18n="car.day"></span>
                                            </p>
                                        </div>
                                        <!-- Tính tổng rate trung bình  -->
                                        <?php
                                            $numberRate = DB::table('reviews')
                                                ->where('cars_id', $driver->id);
                                            $sumRating = DB::table('reviews')
                                                ->where('cars_id', $driver->id);
                                            $itemAge = 0;
                                        ?>

                                        <div class="wrapper">
                                            <?php for($i = 1; $i <= 5; $i++): ?>
                                                <i class="ion-ios-star <?php echo e($i <= $itemAge ? 'active' : ''); ?>"></i>
                                            <?php endfor; ?>
                                        </div>
                                        <!-- Số chuyến đi -->
                                        <?php
                                            $icheck = false;
                                            
                                            $count = DB::table('bookings')
                                                ->where('status', 'active')
                                                ->where('cars_id', $driver->id)->count();
                                            
                                        ?>


                                        <span class="add-wapper">           
                                            <?php echo str_pad($count, 2, '0', STR_PAD_LEFT) ?> trip

                                        </span>
                                        <div class="location">
                                            <div class=located>
                                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                <?php echo e($driver->city_title); ?>, <?php echo e($driver->region_title); ?>

                                            </div>
                                        </div>


                                        <p class="d-flex mb-0 d-block"><a href="<?php echo e(route('car.booking', $encode)); ?>"
                                                class="btn btn-orange py-2 mr-1"  data-i18n="car.rental"></a> <a
                                                href="<?php echo e(route('car.detail', $encode)); ?>"
                                                class="btn btn-gray py-2 ml-1" data-i18n="car.detail"></a></p>
                                        <div class="regis-partner-car" style="margin-top: 10px;padding-bottom: 10px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    .located {
        position: relative;
        font-size: .8125rem;
        top: -12px;
        bottom: 0;
        left: -2px;
        right: 0;
    }

    .located i {
        width: 20px;
        height: 20px;
        border: 1px solid;
        text-align: center;
        padding: 3px;
        margin-left: 1px;
        border-radius: 50px;
    }

    .located i:before {
        color: #E85626;
    }

    /* tổng rate */
    .wrapper .active {
        color: #E85626 !important;
        position: relative;
    }

    .wrapper {
        position: relative;
        bottom: 15px;
        left: 0;
        right: 0;
        display: inline-block;
        border: none;
        font-size: 20px;
        padding-top: -74px;
        margin-left: -2px;
    }

    .add-wapper {
        position: relative;
        top: -16px;
        left: 100px;
        font-size: 14px;
        bottom: 0;
        right: 0;

    }

</style>
<?php /**PATH C:\xampp\htdocs\Yotrip\resources\views/partials/list-cars.blade.php ENDPATH**/ ?>