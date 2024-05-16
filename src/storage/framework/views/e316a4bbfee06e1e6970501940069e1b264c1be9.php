
<?php $__env->startSection('title',"Notification Register"); ?>
<?php $__env->startSection('content'); ?>

<div class="col-md-6">
    <div class="authincation-content">
        <div class="row no-gutters">
            <div class="col-xl-12">
                <div class="auth-form">
                    <div class="text-center mb-3">
                        <img src="/public/upload/email/logo.png" alt="" style="height: 54px">
                    </div>
                    <?php echo $__env->make('ICO::inc.successmessage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('ICO::inc.errormessage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <h2 class="text-center mb-0">You are nearly done!</h2> <br /><br>
                    <p class="text-center">Please verify your email address to finish the registration.</p>
                    <p class="text-center">Email sent to <?php echo e(Session::get('email')); ?></p>
                    <form action="<?php echo e(route('ico.users.register.re_post')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <p class="text-center " id="resend_email">Didn't receive the verification mail? Please check your spam folder or
                            <input name="data-time" type="text" value="<?php echo e(Session::get('confirmation_code')); ?>" hidden>
                            <input type="submit" value="click here" class="text-primary underline btn p-0 m-0"> to resend mail.
                        </p>
                    </form>
                    <br>
                    <div class="text-center">
                        <a style="color:#fff;display: flex;align-items: center;justify-content: center;font-size: 17px;" href="/login.html" class="btn btn-primary btn-block">Finish</a>
                    </div><br>
                    <div class="new-account mt-3">
                        <p class="float-left">Already Have an account?</p>
                        <a class="float-right mb-5 text-primary underline" href="/login.html">Sign in</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('ICO::layoutpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wallet_wta_finance/public_html/app/Modules/ICO/Views/page/registernotify.blade.php ENDPATH**/ ?>