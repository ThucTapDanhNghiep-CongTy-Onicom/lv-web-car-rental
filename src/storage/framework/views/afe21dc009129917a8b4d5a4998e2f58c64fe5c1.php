
<?php $__env->startSection('title',"Register Account"); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-md-5">
        <div class="authincation-content">
            <div class="row no-gutters">
                <div class="col-xl-12">
                    <div class="auth-form">
                        <div class="text-center mb-4">
                            <a href="/">
                                <img src="/public/ico/assets/images/logo.svg?v=4" alt="" class="logo-page">
                            </a>
                        </div>
                        <h4 class="text-center mb-4">Sign up your account</h4>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($error): ?>
                                <div class="alert alert-danger">
                                    <li><?php echo e($error); ?></li>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <form action="" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="form-group input-group-lg">
                                <label class="mb-1">Email</label>
                                <input type="email" class="form-control" placeholder="example@mail.com" name="email"
                                       required value="<?php echo e(old('email')); ?>">
                                
                                
                                
                                
                                
                            </div>
                            <div class="form-group input-group-lg">
                                <label class="mb-1">Password</label>
                                <input type="password" class="form-control" name="password" required>
                                
                                
                                
                                
                                
                            </div>
                            <div class="form-group input-group-lg">
                                <label class="mb-1">Password Confirm</label>
                                <input type="password" class="form-control" name="password_confirm" required>
                                
                                
                                
                                
                                
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                            </div>
                        </form>
                        <div class="new-account mt-3">
                            <p>Already have an account? <a class="text-primary" href="/login.html">Sign In</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('ICO::layoutpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wallet_wta_finance/public_html/app/Modules/ICO/Views/users/registerCode.blade.php ENDPATH**/ ?>