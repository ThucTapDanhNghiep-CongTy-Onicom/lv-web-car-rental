<?php $__env->startSection('title', $row->title); ?>
<?php $__env->startSection('content'); ?>
<form method="post" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <a href="/<?php echo e(Helper_Dashboard::get_patch()); ?>/<?php echo e(Helper_Dashboard::get_patch(2)); ?>/<?php echo e($data->language_id==2?'vi':'en'); ?>" class="btn btn-danger waves-effect btn-sm ml-2"><i class="mdi mdi-close-circle"></i></a>
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
                    <select class="form-control form-control-sm" name="category_id">
                        <option value="0">-- Không chọn --</option>
                        <?php $__currentLoopData = $list_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($value->id); ?>" <?php echo e(old('category_id',$data->category_id)==$value->id? "selected" :""); ?>><?php echo e($value->category_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="title">Tiêu đề</label>
                    <input type="text" name="title" value="<?php echo e(old('title',$data->title)); ?>" class="form-control form-control-sm" placeholder="* tiêu đề">
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label>Ngày mở cửa</label>
                            <input type="text" name="day_working" value="<?php echo e(old('day_working',$data->day_working)); ?>" class="form-control form-control-sm" placeholder="Ex: thứ 2 - thứ 5">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label>Thời gian mở cửa</label>
                            <input type="text" name="time_working" value="<?php echo e(old('time_working',$data->time_working)); ?>" class="form-control form-control-sm" placeholder="Ex: 8h-17h">
                        </div>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label>Địa chỉ</label>
                    <input type="text" name="address" value="<?php echo e(old('address',$data->address)); ?>" class="form-control form-control-sm" placeholder="Ex: 123 Cach Mang Thang 8,">
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label>Website</label>
                            <input type="text" name="website" value="<?php echo e(old('website',$data->website)); ?>" class="form-control form-control-sm" placeholder="Ex: www.abc.com">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label>Quận/huyện</label>
                            <input type="text" name="district" value="<?php echo e(old('district',$data->district)); ?>" class="form-control form-control-sm" placeholder="Ex: Quan 1">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <textarea name="content" rows="8" class="form-control form-control-sm" placeholder="* Nội dung"><?php echo e(old('content',$data->content)); ?></textarea>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-box">
                <h5 class="header-title text-uppercase bg-light p-2 mb-2"><i class="fe-image mr-1"></i> Hình ảnh</h5>
                <?php if($data->image!=""): ?>
                <div class="form-group mb-2">
                    <img src="/public/upload/images/post/large/<?php echo e($data->image); ?>" style="width: auto;max-width: 100%">
                </div>
                <?php endif; ?>
                <div class="form-group mb-2">
                    <?php
                    $thumbsize = json_decode($settings["THUMB_SIZE_POST"]);
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
                    <label for="title">Đánh giá</label>
                    <select class="form-control form-control-sm" name="star_review">
                        <option value="1" <?php echo e(old('star_review',$data->star_review)==1? "selected" :""); ?>>1/5 sao</option>
                        <option value="2" <?php echo e(old('star_review',$data->star_review)==2? "selected" :""); ?>>2/5 sao</option>
                        <option value="3" <?php echo e(old('star_review',$data->star_review)==3? "selected" :""); ?>>3/5 sao</option>
                        <option value="4" <?php echo e(old('star_review',$data->star_review)==4? "selected" :""); ?>>4/5 sao</option>
                        <option value="5" <?php echo e(old('star_review',$data->star_review)==5? "selected" :""); ?>>5/5 sao</option>
                    </select>
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
<?php echo $__env->make('Dashboard::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hcm_tourism/public_html/app/Modules/Dashboard/Views/post/edit.blade.php ENDPATH**/ ?>