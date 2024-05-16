
<?php $__env->startSection('title', $row->title); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title"><?php echo e($row->title); ?></h4>
        </div>
    </div>
</div>
<?php echo $__env->make("Dashboard::inc.message", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if($settings['MAINTAIN_MODE']): ?>
<div class="alert alert-danger bg-danger text-white border-0" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
    </button>
    Website đang ở chế độ bảo trì, hủy bỏ tại : Cấu hình -> Cài đặt chung -> Hệ thống : Maintain
</div>
<?php endif; ?>
<div class="row">
    <div class="col-md-4 grid-margin">
        <div class="card bg-facebook">
            <div class="card-body">
                <div class="d-flex  flex-row align-items-top">
                    <i class="icon-pie-chart text-primary font-20"></i>
                    <div class="ml-3">
                        <h4 class="text-primary"><?php echo e(number_format($totalSupply,0,"",",")); ?> <?php echo e($settings['ICO_SYMBOL']); ?></h4>
                        <p class="mt-2 card-text">Total Supply</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 grid-margin">
        <div class="card bg-facebook">
            <div class="card-body">
                <div class="d-flex  flex-row align-items-top">
                    <i class="icon-info text-primary font-20"></i>
                    <div class="ml-0">
                        <h4 class="text-primary"><?php echo e($settings['ICO_NAME']); ?></h4>
                        <p class="mt-2 card-text">Token Name</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 grid-margin">
        <div class="card bg-facebook">
            <div class="card-body">
                <div class="d-flex  flex-row align-items-top">
                    <i class="icon-info text-primary font-20"></i>
                    <div class="ml-3">
                        <h4 class="text-primary"><?php echo e($settings['ICO_DECIMALS']); ?></h4>
                        <p class="mt-2 card-text">Decimals</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Dashboard::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wallet_wta_finance/public_html/app/Modules/Dashboard/Views/dashboard/index.blade.php ENDPATH**/ ?>