<?php $__env->startSection('title', $row->title); ?>
<?php $__env->startSection('content'); ?>
<form method="post" enctype="multipart/form-data">
    <?php echo $__env->make('Dashboard::inc.formheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('Dashboard::inc.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-8">
            <div class="card-box">
                <h4 class="header-title mb-3"><?php echo e($row->desc); ?></h4>
                <div class="form-group mb-2">
                    <select class="form-control form-control-sm" name="parent_id">
                        <option value="0">-- Không chọn --</option>
                        <?php $__currentLoopData = $data_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($value->id); ?>" <?php echo e(old('parent_id',$data->parent_id)==$value->id? "selected" :""); ?>><?php echo e($value->category_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="title">Category Name</label>
                    <input type="text" name="category_name" value="<?php echo e(old('category_name',$data->category_name)); ?>" class="form-control form-control-sm" placeholder="* tiêu đề">
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-box">
                <h5 class="header-title text-uppercase bg-light p-2 mb-2"><i class="fe-image mr-1"></i> Hình ảnh</h5>
                <?php if($data->imageUri!=""): ?>
                <div class="form-group mb-2">
                    <img src="/public/upload/images/category/large/<?php echo e($data->imageUri); ?>" style="width: auto;max-width: 100%">
                </div>
                <?php endif; ?>
                <div class="form-group mb-2">
                    <?php
                    $thumbsize = json_decode($settings["THUMB_SIZE_BLOG"]);
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
                    <label>Sort</label>
                    <input type="number" name="sort" value="<?php echo e(old('sort',$data->sort)); ?>" class="form-control form-control-sm" placeholder="1">
                </div>
                <div class="form-group mb-0">
                    <label>Trạng thái</label>
                    <select class="form-control form-control-sm" name="status">
                        <option value="1" <?php echo e(old('status',$data->status)==1? "selected" :""); ?>>Kích hoạt</option>
                        <option value="0" <?php echo e(old('status',$data->status)==0? "selected" :""); ?>>Khóa</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('Dashboard::inc.formfooter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Dashboard::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hcm_tourism/public_html/app/Modules/Dashboard/Views/category/edit.blade.php ENDPATH**/ ?>