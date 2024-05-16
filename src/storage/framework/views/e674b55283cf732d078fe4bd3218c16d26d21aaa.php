<?php if(Session::get("type")=="success"): ?>
    <div id="notification">
        <?php if(Session::has("flash_message")): ?>
            <div class="alert alert-<?php echo e(Session::get("type")); ?> alert-dismissible fade show text-green border-0" role="alert">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <?php echo e(Session::get("flash_message")); ?>

            </div>
        <?php endif; ?>
    </div>
<?php endif; ?><?php /**PATH /home/wallet_wta_finance/public_html/app/Modules/ICO/Views/inc/successmessage.blade.php ENDPATH**/ ?>