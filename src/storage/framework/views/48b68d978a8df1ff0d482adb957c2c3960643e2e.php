
<?php $__env->startSection('title',"Security"); ?>
<?php $__env->startSection('content'); ?>
<!--div class=" form-head d-flex flex-wrap mb-4 align-items-center">
        <h2 class="text-black mr-auto font-w600 mb-3">Two-Factor Authentication (2FA)</h2>
    </div-->
<div class="row">
    <div class="col-xl-12">
        <div class="row">
            <div class="col-xl-6 col-lg-12 col-sm-12">
                <div class="card-common">
                    <p class="title-main">Two-Factor Authentication (2FA)</p>
                    <?php if(session('error')): ?>
                    <div class="alert alert-danger">
                        <?php echo e(session('error')); ?>

                    </div>
                    <?php endif; ?>
                    <?php if(session('success')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('success')); ?>

                    </div>
                    <?php endif; ?>
                    <?php if(!$user->google2fa_enable): ?>
                    <strong>1. Scan this barcode with your Google Authenticator App:</strong><br /><br />
                    <img src="<?php echo e($google2fa_url); ?>" alt="">
                    <br /><br />
                    <label for="verify-code" class="control-label">Secret Key</label>
                    <div class="mb-3">
                        <input value="<?php echo e($secret); ?>" type="text" class="form-control" disabled>
                    </div>
                    <strong>2.Enter the pin the code to Enable 2FA</strong><br /><br />
                    <form class="form-horizontal" method="POST" action="<?php echo e(route('ico.security.2fa.enable')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('verify-code') ? ' has-error' : ''); ?>">

                            <label for="verify-code" class="control-label">Authenticator Code</label>
                            <div class="">
                                <input id="verify-code" type="text" class="form-control" name="verify-code"
                                        required>

                                <?php if($errors->has('verify-code')): ?>
                                <div class="alert alert-danger">
                                    <?php echo e($errors->first('verify-code')); ?>

                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Enable 2FA
                                </button>
                            </div>
                        </div>
                    </form>
                    <?php else: ?>
                    <div class="alert alert-success">
                        2FA is Currently <strong>Enabled</strong> for your account.
                    </div>
                    <p>If you are looking to disable Two Factor Authentication. Please confirm your password and Click Disable 2FA Button.</p>
                    <form class="form-horizontal col-md-6 pl-0" method="POST" action="<?php echo e(route('ico.security.2fa.disable2fa')); ?>">
                        <div class="form-group<?php echo e($errors->has('current-password') ? ' has-error' : ''); ?>">
                            <label for="change-password" class="control-label">Current Password</label>

                            <div class="">
                                <input id="current-password" type="password" class="form-control" name="current-password" required>

                                <?php if($errors->has('current-password')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('current-password')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-offset-5">

                            <?php echo e(csrf_field()); ?>

                            <button type="submit" class="btn btn-primary ">Disable 2FA</button>
                        </div>
                    </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('ICO::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wallet_wta_finance/public_html/app/Modules/ICO/Views/security/2fa.blade.php ENDPATH**/ ?>