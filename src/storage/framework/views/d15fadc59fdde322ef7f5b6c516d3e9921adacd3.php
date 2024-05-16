<div class="col-md-12" style="margin-bottom: 80px;">
    <div class="row no-gutters">
        <div class="col-md-4 d-flex align-items-center">
            <form action="<?php echo e(route('sort')); ?>" class="request-form ftco-animate bg-primary" style="border-radius: 0px !important;">
                <h2 style="border-radius: 0px !important;" data-i18n="vehicle.search.left.title"></h2>
                <div class="form-group mt-4">
                    <select class="form-control" name="render" id="exampleFormControlSelect1">
                        <option value="render" data-i18n="vehicle.search.left.render"></option>
                        <?php if(isset($renders)): ?>
                        <?php $__currentLoopData = $renders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $render): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($render->id); ?>" <?php if (isset($sorts['render'])) {
                                                                if ($render->id == $sorts['render']) {
                                                                    echo 'selected';
                                                                }
                                                            } ?>>
                            <?php echo e($render->manu_name); ?> (<?php echo e($render->count_region_cars); ?> xe)
                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-group mt-4">
                    <select class="form-control" name="seat" id="exampleFormControlSelect1">
                        <option value="seat" data-i18n="vehicle.search.left.seat"></option>
                        <?php if(isset($seats)): ?>
                        <?php $__currentLoopData = $seats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($car->seat); ?>" <?php if (isset($sorts['seat'])) {
                                                                if ($car->seat == $sorts['seat']) {
                                                                    echo 'selected';
                                                                }
                                                            } ?>>
                            <?php echo e($car->seat); ?> (<?php echo e($car->sl_cars); ?> xe)
                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-group mt-4">
                    <select class="form-control" name="locations" id="exampleFormControlSelect1">
                        <option value="locations" data-i18n="vehicle.search.left.location"></option>
                        <?php if(isset($locations)): ?>
                        <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($location->id); ?>" <?php if (isset($sorts['locations'])) {
                                                                if ($location->id == $sorts['locations']) {
                                                                    echo 'selected';
                                                                }
                                                            } ?>>
                            <?php echo e($location->title); ?> (<?php echo e($location->number_of_vehicles); ?> xe)
                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-group mt-4">
                    <select class="form-control" name="price" id="exampleFormControlSelect1">
                        <option value="price" data-i18n="vehicle.search.left.price"></option>
                        <option value="1" <?php if (isset($sorts['price'])) {
                                                if ($sorts['price'] == '1') {
                                                    echo 'selected';
                                                }
                                            } ?>>
                            Increase</option>
                        <option value="0" <?php if (isset($sorts['price'])) {
                                                if ($sorts['price'] == '0') {
                                                    echo 'selected';
                                                }
                                            } ?>>
                            Decrease</option>
                    </select>
                </div>
                <div class="form-group" style="margin-bottom: -10px;">
                    <input type="submit" data-i18n-value="vehicle.search.left.btnSearch" class="btn btn-secondary py-3 px-4">
                </div>
            </form>
        </div>
        <div class="col-md-8 d-flex">
            <?php $temp= asset('public/ui/images/bg_2.jpg'); ?>
            <div class="services-wrap rounded-right w-100" style="background: url(<?php echo e($temp); ?>) no-repeat center;">
                <h3 class="heading-section mb-4 text-white"  data-i18n="vehicle.search.right.title"></h3>
                <!-- <p><a href="#" class="btn btn-primary py-3 px-4">Reserve Your Perfect Car</a></p> -->
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\Yotrip\resources\views/partials/filter-list-cars.blade.php ENDPATH**/ ?>