
<?php $__env->startSection('title',"Authentication"); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-md-8">
        <div class="form-input-content text-center error-page">

            <h4><i class="fa fa-exclamation-triangle text-warning"></i> The page request to enable 2fa authentication!</h4>
            <p>Please click on the link below to go to the security page.</p>
            <div>
                <a class="btn btn-primary" href="/2fa.html">Security</a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('ICO::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wallet_wta_finance/public_html/app/Modules/ICO/Views/page/2fa.blade.php ENDPATH**/ ?>