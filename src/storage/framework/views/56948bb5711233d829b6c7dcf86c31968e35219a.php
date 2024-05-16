<?php $__env->startSection('title', $row->title); ?>
<?php $__env->startSection('content'); ?>
<form method="post" enctype="multipart/form-data">
    <?php echo $__env->make('Dashboard::inc.formheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('Dashboard::inc.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-8">
            <div class="card-box">
                <h4 class="header-title mb-3"><?php echo e($row->desc); ?></h4>
				<div class="form-group mb-2">
                    <label >Name</label>
                    <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control form-control-sm" placeholder="* tiêu đề">
                </div>
                <div class="form-group mb-2">
                    <label >Start Date</label>
                    <input type="text"  name="start_date" value="<?php echo e(old('start_date')); ?>" class="form-control form-control-sm flatpickr_datetime" placeholder="Start date">
                </div>
				<div class="form-group mb-2">
                    <label >End Date</label>
                    <input type="text" name="end_date" value="<?php echo e(old('end_date')); ?>" class="form-control form-control-sm flatpickr_datetime" placeholder="End date">
                </div>
				<div class="form-group mb-2">
                    <label >Token Number</label>
                    <input type="number" name="token_number" value="<?php echo e(old('token_number')); ?>" class="form-control form-control-sm" placeholder="Token number">
                </div>
				<div class="form-group mb-2">
                    <label >Token Remaining</label>
                    <input type="number" name="token_remaining" value="<?php echo e(old('token_remaining')); ?>" class="form-control form-control-sm" placeholder="Token remaining">
                </div>
				<div class="form-group mb-2">
                    <label >Limit buy token</label>
                    <input type="number" name="limit_buy_token" value="<?php echo e(old('limit_buy_token')); ?>" class="form-control form-control-sm" placeholder="Token limit">
                </div>
                <div class="form-group mb-0">
                    <label>Trạng thái</label>
                    <select class="form-control form-control-sm" name="status">
                        <option value="1" <?php echo e((old('status')!="" && old('status')==1)? "selected" :""); ?>>Kích hoạt</option>
                        <option value="0" <?php echo e((old('status')!="" && old('status')==0)? "selected" :""); ?>>Khóa</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('Dashboard::inc.formfooter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Dashboard::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wallet_wta_finance/public_html/app/Modules/Dashboard/Views/phase/add.blade.php ENDPATH**/ ?>