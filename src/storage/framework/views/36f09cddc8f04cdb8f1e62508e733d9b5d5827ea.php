
<?php $__env->startSection('title',"Login"); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-md-5">
        <div class="authincation-content">
            <div class="row no-gutters">
                <div class="col-xl-12">
                    <div class="auth-form">
                        <div class="text-center mb-3">
							<a href="/">
								<img src="/public/ico/assets/images/logo.svg?v=15" alt="" class="logo-page">
                            </a>
                        </div>
                        <h4 class="text-center mb-4">Sign in your account</h4>
                        <?php echo $__env->make('ICO::inc.successmessage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('ICO::inc.errormessage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <form method="post" action="<?php echo e(route('ico.users.login_post')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="form-group input-group-lg">
                                <label class="mb-1">Email</label>
                                <input type="email" class="form-control" value="<?php echo e(old('email')); ?>" required name="email" placeholder="example@mail.com">
                                <?php if($errors->has('email')): ?>
                                    <div class="alert alert-danger">
                                        <?php echo e($errors->first('email')); ?>

                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="form-group input-group-lg">
                                <label class="mb-1">Password</label>
                                <input type="password" class="form-control" value="" required name="password">
                                <?php if($errors->has('password')): ?>
                                    <div class="alert alert-danger">
                                        <?php echo e($errors->first('password')); ?>

                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox ml-1">
                                        <input type="checkbox" class="custom-control-input" id="basic_checkbox_1"
                                               name="remember">
                                        <label class="custom-control-label" for="basic_checkbox_1">Remember Me</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <a href="/forgot-password.html">Forgot Password?</a>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>
                        </form>
                        <div class="new-account mt-3">
                            <p>Don't have an account? <a class="text-primary" href="/register.html">Sign up</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('ICO::layoutpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hcm_tourism/public_html/app/Modules/ICO/Views/users/login.blade.php ENDPATH**/ ?>