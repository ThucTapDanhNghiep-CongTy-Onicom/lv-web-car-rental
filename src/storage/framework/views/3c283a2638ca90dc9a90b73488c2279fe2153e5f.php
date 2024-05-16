
<?php $__env->startSection('title',"Security-Password"); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('ICO::inc.successmessage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="row">
    <div class="col-xl-5">
        <div class="card-common">
            <form method="post">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <p class="title-main">Change the password</p>
                    <label for="exampleInputPassword1">Current password</label>
                    <input type="password" class="form-control" name="old_password" required value="<?php echo e(old('old_password')); ?>">
                    <?php if($errors->has('old_password')): ?>
                    <div class="alert alert-danger">
                        <?php echo e($errors->first('old_password')); ?>

                    </div>
                    <?php endif; ?>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($error[0] == 0): ?>
                    <div class="alert alert-danger">
                        <li><?php echo e(substr($error,1)); ?></li>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">New Password</label>
                    <input type="password" class="form-control" name="new_password" required value="<?php echo e(old('new_password')); ?>">
                    <?php if($errors->has('new_password')): ?>
                    <div class="alert alert-danger">
                        <?php echo e($errors->first('new_password')); ?>

                    </div>
                    <?php endif; ?>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($error[0] == 3): ?>
                    <div class="alert alert-danger">
                        <li><?php echo e(substr($error,1)); ?></li>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Password confirmed</label>
                    <input type="password" class="form-control" name="password_confirm" value="<?php echo e(old('password_confirm')); ?>" required>
                    <?php if($errors->has('password_confirm')): ?>
                    <div class="alert alert-danger">
                        <?php echo e($errors->first('password_confirm')); ?>

                    </div>
                    <?php endif; ?>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($error[0] == 1): ?>
                    <div class="alert alert-danger">
                        <li><?php echo e(substr($error,1)); ?></li>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php if($user->google2fa_enable): ?>
                <div class="form-group">
                    <label for="exampleInputPassword1">Two-Factor Authentication (2FA)</label>
                    <input type="text" class="form-control" name="google_verification" required>
                </div>
                <?php endif; ?>
                <?php if($errors->has('google_verification')): ?>
                <div class="alert alert-danger">
                    <?php echo e($errors->first('google_verification')); ?>

                </div>
                <?php endif; ?>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($error[0] == 2): ?>
                <div class="alert alert-danger">
                    <li><?php echo e(substr($error,1)); ?></li>
                </div>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('ICO::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wallet_wta_finance/public_html/app/Modules/ICO/Views/account/password.blade.php ENDPATH**/ ?>