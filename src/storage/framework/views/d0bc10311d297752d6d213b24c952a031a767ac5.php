
<?php $__env->startSection('title', $row->title); ?>
<?php $__env->startSection('content'); ?>
<form method="post" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <div class="form-inline">
                        <!--div class="form-group">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control border-white" name="search" value="<?php echo e(Cookie::get('search_wallet')); ?>" placeholder="Address">
                                <div class="input-group-append">
                                    <button type="submit" name="btn_search" class="input-group-text bg-blue border-blue text-white">
                                        <i class="fe-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div-->
                        <!--a href="/<?php echo e(Helper_Dashboard::get_patch()); ?>/<?php echo e(Helper_Dashboard::get_patch(2)); ?>/trash" class="btn btn-blue btn-sm ml-2">
                            <i class="fe-trash"></i>
                        </a-->
                        <a href="/<?php echo e(Helper_Dashboard::get_patch()); ?>/<?php echo e(Helper_Dashboard::get_patch(2)); ?>" class="btn btn-danger waves-effect btn-sm ml-2"><i class="mdi mdi-close-circle"></i></a>
                        <a href="javascript: window.location.reload();" class="btn btn-blue btn-sm ml-2">
                            <i class="mdi mdi-autorenew"></i>
                        </a>
                        <!--a href="/<?php echo e(Helper_Dashboard::get_patch()); ?>/<?php echo e(Helper_Dashboard::get_patch(2)); ?>/add" class="ladda-button waves-effect waves-light btn btn-blue btn-sm ml-1" data-style="expand-right">
                            <span class="ladda-label"><i class="fe-plus-circle"></i></span>
                            <span class="ladda-spinner"></span>
                        </a-->
                    </div>
                </div>
                <h4 class="page-title"><?php echo e($row->title); ?></h4>
            </div>
        </div>
    </div>
    <?php echo $__env->make('Dashboard::inc.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-6">
            <div class="card-box">
                <h4 class="header-title mb-3"><?php echo e($row->desc); ?></h4>
                <div class="form-group mb-2">
                    <label for="title">Users</label>
                    <input type="text" disabled value="<?php echo e($data->email); ?>" class="form-control form-control-sm">
                </div>
                <div class="form-group mb-2">
                    <label for="title">Address</label>
                    <input type="text" disabled value="<?php echo e($data->address); ?>" class="form-control form-control-sm">
                </div>
                <div class="form-group mb-2">
                    <label for="title">Total Lock</label>
                    <input type="number" name="total_locked" value="<?php echo e(old('total_locked',$data->total_locked)); ?>" class="form-control form-control-sm" placeholder="Total lock">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="btn_update">Saves change</button>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card-box">
                <h4 class="header-title mb-3">Add lock</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label>Start date</label>
                            <input type="text" name="start_date" value="<?php echo e(old('start_date')); ?>" class="form-control form-control-sm flatpickr_datetime" placeholder="Start date">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label>End date</label>
                            <input type="text" name="end_date" value="<?php echo e(old('end_date')); ?>" class="form-control form-control-sm flatpickr_datetime" placeholder="End date">
                        </div>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label>Percent Amount</label>
                    <input type="number" name="percent_amount" class="form-control form-control-sm" placeholder="Ex : 10">
                </div>
                <div class="form-group mb-2">
                    <label>Sort</label>
                    <input type="number" name="sort" value="1" class="form-control form-control-sm" placeholder="1">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="btn_add">Add new</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <div class="responsive-table-plugin">
                    <div class="table-wrapper">
                        <div class="table-rep-plugin fixed-solution">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table class="table table-sm table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Percent Amount</th>
                                            <th>Created</th>
                                            <th>Sort</th>
                                            <th>Tools</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($list_locktime)): ?>
                                        <?php $__currentLoopData = $list_locktime; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($key+1); ?></td>
                                            <td><?php echo e($value->start_date); ?></td>
                                            <td><?php echo e($value->end_date); ?></td>
                                            <td><?php echo e($value->percent_amount); ?>%</td>
                                            <td><?php echo e($value->created_at); ?></td>
                                            <td><?php echo e($value->sort); ?></td>
                                            <td></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
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
<?php echo $__env->make('Dashboard::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wallet_wta_finance/public_html/app/Modules/Dashboard/Views/withdrawalrule/edit.blade.php ENDPATH**/ ?>