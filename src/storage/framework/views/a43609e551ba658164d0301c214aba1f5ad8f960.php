<?php $__env->startSection('title', $row->title); ?>
<?php $__env->startSection('content'); ?>
<form method="post" enctype="multipart/form-data">
    <?php echo $__env->make('Dashboard::inc.formheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('Dashboard::inc.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-8">
            <div class="card-box">
                <h4 class="header-title mb-3"><?php echo e($row->desc); ?></h4>
                <div class="form-group">
                    <div class="form-group">
                    <label for="title">EMBASSY Tiếng việt</label>
                        <textarea name="EMBASSY_CONTENT_VI" class="form-control" rows="20"><?php echo e($settings['EMBASSY_CONTENT_VI']); ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('Dashboard::inc.formfooter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Dashboard::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hcm_tourism/public_html/app/Modules/Dashboard/Views/embassy/edit_vi.blade.php ENDPATH**/ ?>