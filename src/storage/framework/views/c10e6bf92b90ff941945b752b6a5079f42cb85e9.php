
<?php $__env->startSection('title',"Security verification"); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-md-5">
        <div class="authincation-content form2fa">
            <div class="row no-gutters border-main">
                <div class="card">
                    <div class="card-header">
                        <span class="text-white">Two-factor authentication</span>
                    </div>
                    <div class="card-body">
                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>
                        <form role="form" method="post" action="<?php echo e(route('ico.security.twoFace.verify')); ?>">
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group">
                                <label class="control-label" for="otp">
                                    <b>Authentication code</b>
                                </label>
                                <input type="text" name="code" class="form-control" autocomplete="off" maxlength="6"
                                       id="otp">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary col-md-12">Verify</button>
                            </div>
                            <p class="text-muted">
                                Open the two-factor authentication app on your device to view your authentication code
                                and verify
                                your identity.
                            </p>
                        </form>
                            <div class="new-account mt-3">
                                <p class="text-muted">If you forget Authentication code? <a class="text-primary" href="/logout.html">Logout</a>
                                </p>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('ICO::layoutpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wallet_wta_finance/public_html/app/Modules/ICO/Views/security/2faverify.blade.php ENDPATH**/ ?>