
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
                    <label >Fullname</label>
                    <input type="text" disabled value="<?php echo e($data->fullname); ?>" class="form-control form-control-sm" placeholder="* tiêu đề">
                </div>
                <div class="form-group mb-2">
                    <label >Email</label>
                    <input type="text" disabled value="<?php echo e($data->email); ?>" class="form-control form-control-sm" placeholder="bai-viet">
                </div>
                <div class="form-group mb-2">
                    <label >Referral Code</label>
                    <input type="text" disabled value="<?php echo e($data->referral_code); ?>" class="form-control form-control-sm" placeholder="bai-viet">
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-box">
                <h5 class="header-title text-uppercase bg-light p-2 mb-2"><i class="icon-shield"></i> Reset 2FA</h5>
                
                <div class="form-group mb-2">
                    <label>2FA : <?php echo e($data->google2fa_secret); ?></label>
                    <select class="form-control form-control-sm" name="google2fa_enable">
                        <option value="1" <?php echo e(old('google2fa_enable',$data->google2fa_enable)==1? "selected" :""); ?>>Kích hoạt</option>
                        <option value="0" <?php echo e(old('google2fa_enable',$data->google2fa_enable)==0? "selected" :""); ?>>Khóa</option>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label>KYC Status</label>
                    <select class="form-control form-control-sm" name="kyc_status">
                        <option value="1" <?php echo e(old('kyc_status',$data->kyc_status)==1? "selected" :""); ?>>Hoàn thành</option>
                        <option value="0" <?php echo e(old('kyc_status',$data->kyc_status)==0? "selected" :""); ?>>Chưa hoàn thành</option>
                    </select>
                </div>
                <div class="form-group mb-0">
                    <label>Status</label>
                    <select class="form-control form-control-sm" name="status">
                        <option value="1" <?php echo e(old('status',$data->status)==1? "selected" :""); ?>>Kích hoạt</option>
                        <option value="0" <?php echo e(old('status',$data->status)==0? "selected" :""); ?>>Khóa</option>
                    </select>
                </div>
            </div>

        </div>
    </div>
    <?php echo $__env->make('Dashboard::inc.formfooter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Dashboard::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wallet_wta_finance/public_html/app/Modules/Dashboard/Views/users/edit.blade.php ENDPATH**/ ?>