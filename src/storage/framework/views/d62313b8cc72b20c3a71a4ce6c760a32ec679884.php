<?php if(Session::get("type")=="warning" || Session::get("type")=="danger"): ?>
    <div id="notification">
        <div class="alert alert-<?php echo e(Session::get("type")); ?> alert-dismissible fade show text-green border-0" role="alert">
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <?php echo e(Session::get("flash_message")); ?>

            <?php if(Session::has("href")): ?>
                <a id="re-register" class="data-time underline text-primary" href="<?php echo e(Session::get("href")); ?>" data-time="<?php echo e(Session::get("data-time")); ?>">Click here</a>
                to resend another confirmation email.
            <?php endif; ?>
        </div>

    </div>
<?php endif; ?><?php /**PATH /home/hcm_tourism/public_html/app/Modules/ICO/Views/inc/errormessage.blade.php ENDPATH**/ ?>