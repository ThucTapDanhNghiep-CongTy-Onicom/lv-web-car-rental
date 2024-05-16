
<?php $__env->startSection('title',"Forgot Password"); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-md-6">
        <div class="authincation-content">
            <div class="row no-gutters">
                <div class="col-xl-12">
                    <div class="auth-form">
						<div class="text-left mb-0">
							<a href="/" style="font-size:26px">
								<span class="ti-arrow-circle-left"></span>
							</a>
						</div>
						<div class="text-center mb-4">
                            <a href="/">
                                <img src="/public/ico/assets/images/logo.svg?V=4" alt="" class="logo-page">
                            </a>
                        </div>
                        <h4 class="text-center mb-4">Forgot Password</h4>
                        <form action="<?php echo e(route('ico.users.forgotPassword_post')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="form-group input-group-lg">
                                <label><strong>Email</strong></label>
                                <input type="email" class="form-control" name="email" placeholder="example@mail.com">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($error): ?>
                                        <div class="alert alert-danger">
                                            <li><?php echo e($error); ?></li>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block">SUBMIT</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('ICO::layoutpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wallet_wta_finance/public_html/app/Modules/ICO/Views/users/forgotPassword.blade.php ENDPATH**/ ?>