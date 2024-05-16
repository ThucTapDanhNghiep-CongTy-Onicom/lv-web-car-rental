
<?php $__env->startSection('title', $row->title); ?>
<?php $__env->startSection('content'); ?>
<form method="post" enctype="multipart/form-data">
    <?php echo $__env->make('Dashboard::inc.formheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('Dashboard::inc.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-8">
            <div class="card-box">
                <h4 class="header-title mb-3">Thay đổi mật khẩu</h4>
                <div class="form-group mb-2">
                    <label>Old Password</label>
                    <input type="password" name="password" value="<?php echo e(old('password')); ?>" class="form-control form-control-sm" placeholder="* Mật khẩu cũ">
                </div>
                <div class="form-group mb-2">
                    <label>New Password</label>
                    <input type="password" name="new_password" value="<?php echo e(old('new_password')); ?>" class="form-control form-control-sm" placeholder="* mật khẩu mới">
                </div>
                <div class="form-group mb-0">
                    <label>Confirm New Password</label>
                    <input type="password" name="confirm_password" value="<?php echo e(old('confirm_password')); ?>" class="form-control form-control-sm" placeholder="* nhập lại mật khẩu">
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('Dashboard::inc.formfooter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Dashboard::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wallet_wta_finance/public_html/app/Modules/Dashboard/Views/myaccount/edit.blade.php ENDPATH**/ ?>