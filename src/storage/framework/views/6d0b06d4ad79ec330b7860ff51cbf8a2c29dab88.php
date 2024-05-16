
<?php $__env->startSection('title', $row->title); ?>
<?php $__env->startSection('content'); ?>
<form method="post" enctype="multipart/form-data">
    <?php echo $__env->make('Dashboard::inc.formheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make("Dashboard::inc.message", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-7">
            <div class="card-box">
                <h5 class="mb-3 mt-0 text-uppercase bg-light p-2"><i class="mdi mdi-square-edit-outline"></i> Thông tin ICO</h5>
                <div class="form-group mb-3">
                    <label>ICO Name</label>
                    <input type="text" name="ICO_NAME" value="<?php echo e($settings['ICO_NAME']); ?>" class="form-control" placeholder="">
                </div>
                <div class="form-group mb-3">
                    <label>ICO SYMBOL</label>
                    <input type="text" name="ICO_SYMBOL" value="<?php echo e($settings['ICO_SYMBOL']); ?>" class="form-control" placeholder="">
                </div>
                <div class="form-group mb-3">
                    <label>ICO DECIMALS</label>
                    <input type="text" name="ICO_DECIMALS" value="<?php echo e($settings['ICO_DECIMALS']); ?>" class="form-control" placeholder="">
                </div>
                <div class="form-group mb-3">
                    <label>ICO CONTRACT ADDRESS</label>
                    <input type="text" name="ICO_CONTRACT_ADDRESS" value="<?php echo e($settings['ICO_CONTRACT_ADDRESS']); ?>" class="form-control" placeholder="">
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('Dashboard::inc.formfooter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Dashboard::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hcm_tourism/public_html/app/Modules/Dashboard/Views/config/ico.blade.php ENDPATH**/ ?>