
<?php $__env->startSection('title',"Maintenance"); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <form action="">
        <div class="form-group">
            <h1 class="text-center mt-5" style="color:#fff!important">Website is under maintenance</h1>
        </div>
        <div class="form-group">
            <p class="text-center" style="color:#fff!important">We'll be back when it's done. Thanks for your patience.</p>

        </div>
        <div class="new-account mt-3">
            <p class="text-center" style="color:#fff!important"><a class="text-primary" href="/">Home</a> | <a class="text-primary" href="<?php echo e(URL::to('logout.html')); ?>">Logout</a>
            </p>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('ICO::layoutpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wallet_wta_finance/public_html/app/Modules/ICO/Views/maintain/index.blade.php ENDPATH**/ ?>