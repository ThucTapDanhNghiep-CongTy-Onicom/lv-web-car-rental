<?php $__env->startSection('title', $row->title); ?>
<?php $__env->startSection('content'); ?>
<form method="post" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">

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
    <?php echo $__env->make("Dashboard::inc.message", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="row">
                <div class="col-md-6 mb-1">
                    <div class="card-box">
                        <?php
                        $thumbsize = json_decode($settings["THUMB_SIZE_POST"]);
                        ?>
                        <label>Upload (jpg,png) [<?php echo e($thumbsize->width."x".$thumbsize->height); ?>px]</label>
                        <div class="input-group mb-2">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input " name="photo" id="photo">
                                <label class="custom-file-label" for="photo">Choose file</label>
                            </div>
                        </div>
                        <div class="input-group">
                            <button type="submit" name="addphoto" class="ladda-button btn btn-success waves-effect waves-light btn-sm" data-style="expand-right">
                                <span class="ladda-label"><i class="ti-save"></i> Save</span>
                                <span class="ladda-spinner"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-box">
                <h5><?php echo e($post->title); ?></h5>
                <div class="responsive-table-plugin">
                    <div class="table-wrapper">
                        <div class="table-rep-plugin fixed-solution">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table class="table table-sm table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Hình</th>
                                            <th>Trạng thái</th>
                                            <th>Created</th>
                                            <th>Updated</th>
                                            <th>Tools</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th scope="row"><input type="checkbox" name="check[]" value="<?php echo e($value->id); ?>" /></th>
                                            <td><img src='/public/upload/images/post/large/<?php echo e($value->name); ?>' width="50" /></td>
                                            <td>
                                                <?php if($value->status): ?>
                                                <span class="badge bg-soft-success text-success shadow-none">Kích hoạt</span>
                                                <?php elseif(!$value->status): ?>
                                                <span class="badge bg-soft-danger text-danger shadow-none">Khóa</span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($value->created_at); ?></td>
                                            <td><?php echo e($value->updated_at); ?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-blue btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe-settings"></i></button>
                                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-start">
                                                        <!--a class="dropdown-item" href="/<?php echo e(Helper_Dashboard::get_patch()); ?>/<?php echo e(Helper_Dashboard::get_patch(2)); ?>/edit/<?php echo e($value->id); ?>"><i class="fe-edit-2"></i> Chỉnh sửa</a-->
                                                        <?php if($value->status==1): ?>
                                                        <a class="dropdown-item text-danger" href="/dashboard/post/photo/status/<?php echo e($value->id); ?>/0"><i class="fe-lock"></i> Khóa</a>
                                                        <?php elseif($value->status==0): ?>
                                                        <a class="dropdown-item text-success" href="/dashboard/post/photo/status/<?php echo e($value->id); ?>/1"><i class="fe-check-circle"></i> Kích hoạt</a>
                                                        <?php endif; ?>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item text-danger" href='/dashboard/post/photo/delete/<?php echo e($value->id); ?>'><i class="fe-trash-2"></i> Xóa</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Dashboard::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hcm_tourism/public_html/app/Modules/Dashboard/Views/post/photo.blade.php ENDPATH**/ ?>