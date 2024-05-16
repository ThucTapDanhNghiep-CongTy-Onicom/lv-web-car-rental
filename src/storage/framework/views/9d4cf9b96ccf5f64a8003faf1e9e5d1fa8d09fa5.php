
<?php $__env->startSection('title', $row->title); ?>
<?php $__env->startSection('content'); ?>
<link href="/public/dashboard/assets/libs/select2/select2.min.css" rel="stylesheet" type="text/css">
<form method="post" enctype="multipart/form-data">
    <?php echo $__env->make('Dashboard::inc.formheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('Dashboard::inc.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <h4 class="header-title mb-3"><?php echo e($row->desc); ?></h4>

                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label>Users</label>
                            <select class="form-control form-control-sm js-example-basic-single w-100" name="users_id">
                                <option value="0">-- Không chọn --</option>
                                <?php if(!empty($list_users)): ?>
                                <?php $__currentLoopData = $list_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($value->id); ?>"><?php echo e($value->email); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label>Total Lock</label>
                            <input type="input" name="total_locked" value="<?php echo e(old('total_locked')); ?>" class="form-control form-control-sm" placeholder="Ex: 10000">
                        </div>
                    </div>
                    <!--div class="col-md-6">
                        <div class="form-group mb-2">
                            <label>Percent amount</label>
                            <input type="input" name="percent_amount" value="<?php echo e(old('percent_amount')); ?>" class="form-control form-control-sm" placeholder="Ex: 10">
                        </div>
                    </div-->
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('Dashboard::inc.formfooter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</form>
<script src="/public/dashboard/assets/libs/select2/select2.min.js"></script>
<script>
    (function($) {
        'use strict';
        if ($(".js-example-basic-single").length) {
            $(".js-example-basic-single").select2();
        }
        if ($(".js-example-basic-multiple").length) {
            $(".js-example-basic-multiple").select2();
        }
    })(jQuery);
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Dashboard::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wallet_wta_finance/public_html/app/Modules/Dashboard/Views/withdrawalrule/add.blade.php ENDPATH**/ ?>