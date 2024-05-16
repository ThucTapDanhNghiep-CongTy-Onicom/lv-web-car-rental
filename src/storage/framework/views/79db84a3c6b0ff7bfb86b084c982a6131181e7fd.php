<?php $__env->startSection('title', $row->title); ?>
<?php $__env->startSection('content'); ?>
<form method="post" enctype="multipart/form-data">
<?php echo csrf_field(); ?>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <a href="/<?php echo e(Helper_Dashboard::get_patch()); ?>/<?php echo e(Helper_Dashboard::get_patch(2)); ?>/<?php echo e(Helper_Dashboard::get_patch(4)); ?>" class="btn btn-danger waves-effect btn-sm ml-2"><i class="mdi mdi-close-circle"></i></a>
                    <a href="javascript: window.location.reload();" class="btn btn-light waves-effect waves-light btn-sm ml-2">
                        <i class="mdi mdi-autorenew"></i>
                    </a>
                    <button type="submit" name="save" class="ladda-button btn btn-success waves-effect waves-light btn-sm ml-2" data-style="expand-right">
                        <span class="ladda-label"><i class="ti-save"></i> Save</span>
                        <span class="ladda-spinner"></span>
                    </button>
                </div>
                <h4 class="page-title"><?php echo e($row->title); ?></h4>
            </div>
        </div>
    </div>

    <?php if(count($errors)>0): ?>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body text-danger">
                    <h5 class="card-title"><i class="fe-alert-triangle"></i> Đã xảy ra lỗi</h5>
                    <ul style="margin: 0;padding: 0 15px;">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="card-text"><?php echo e($value); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php echo $__env->make('Dashboard::inc.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-8">
            <div class="card-box">
                <h4 class="header-title mb-3"><?php echo e($row->desc); ?></h4>
                <div class="form-group mb-2">
                    <label for="title">Tiêu đề</label>
                    <input type="text" name="title" value="<?php echo e(old('title')); ?>" class="form-control form-control-sm" placeholder="* tiêu đề">
                </div>
                <div class="form-group mb-2">
                    <label>Mô tả</label>
                    <textarea name="description" rows="5" class="form-control form-control-sm"><?php echo e(old('description')); ?></textarea>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-box">
                <h5 class="header-title text-uppercase bg-light p-2 mb-2"><i class="fe-image mr-1"></i> Hình ảnh</h5>
                <div class="form-group mb-2">
                    <?php
                    $thumbsize = json_decode($settings["THUMB_SIZE_SLIDE"]);
                    ?>
                    <label>Upload (jpg,png) [<?php echo e($thumbsize->width."x".$thumbsize->height); ?>px]</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input " name="photo" id="photo">
                            <label class="custom-file-label" for="photo">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="title">Sort</label>
                    <input type="number" name="sort" value="<?php echo e(empty(old('sort'))?1:old('sort')); ?>" class="form-control form-control-sm" placeholder="">
                </div>
                <div class="form-group mb-0">
                    <label>Trạng thái</label>
                    <select class="form-control form-control-sm" name="status">
                        <option value="1" <?php echo e((old('status')!="" && old('status')==1)? "selected" :""); ?>>Kích hoạt</option>
                        <option value="0" <?php echo e((old('status')!="" && old('status')==0)? "selected" :""); ?>>Khóa</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('Dashboard::inc.formfooter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Dashboard::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hcm_tourism/public_html/app/Modules/Dashboard/Views/sliders/add.blade.php ENDPATH**/ ?>