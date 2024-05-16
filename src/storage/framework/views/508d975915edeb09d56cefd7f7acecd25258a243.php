
<?php $__env->startSection('title',"Error"); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-md-8">
        <div class="form-input-content text-center error-page">
            <p class="font-weight-bold text-white" style="margin-bottom:0;font-size:50px">403</p>
            <p style="color:#fff"><i class="fa fa-exclamation-triangle"></i>There is already 1 other device accessing with this account.</p>
            <div class="mt-4">
                <a class="btn btn-primary" href="/login.html">Login</a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('ICO::layoutpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hcm_tourism/public_html/app/Modules/ICO/Views/page/logout.blade.php ENDPATH**/ ?>