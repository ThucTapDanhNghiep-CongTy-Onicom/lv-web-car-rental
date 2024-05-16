
<?php $__env->startSection('title', $row->title); ?>
<?php $__env->startSection('content'); ?>
<script>
    /*
    async function get_data(email, id) {
        await fetch('https://ekyc.live/api/v1/kyc-data', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    'email': email,
                    'app_id': 1
                })
            })
            .then(response => response.json())
            .then(result => {
                //console.log(result)
                if (result.status) {
                    let photo = document.querySelector(`[data-id='${id}'] .photo`);
                    photo.innerHTML = `
                    <a data-fancybox data-src="${result.data.img_face}">
                    <img width="50" src='${result.data.img_face}'/>
                    </a>
                    `;
                    //console.log("email:"+email +" image : "+result.data.img_face)
                    let ekyc_status = document.querySelector(`[data-id='${id}'] .ekyc_status`);
                    if (result.data.status) {
                        ekyc_status.innerHTML = `<span class="badge bg-soft-success text-success shadow-none">Passed</span>`;
                    } else {
                        ekyc_status.innerHTML = `<span class="badge bg-soft-danger text-danger shadow-none">Failed</span>`;
                    }
                } else {
                    let photo = document.querySelector(`[data-id='${id}'] .photo`);
                    photo.innerHTML = `<span class="badge bg-soft-danger text-danger shadow-none">No KYC</span>`;
                }
            }).catch((error) => {
                alet(error);
            });
    }
    async function view_detail(email) {
        await fetch('https://ekyc.live/api/v1/kyc-data', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    'email': email,
                    'app_id': 1
                })
            })
            .then(response => response.json())
            .then(result => {
                console.log(result)
                if (result.status) {
                    let data_html = `
                        <p>Name : <b>${result.data.name}</b></p>
                        <p>Email : <b>${result.data.email}</b></p>
                        <p>Birthday : <b>${result.data.birthday}</b></p>
                        <p>IP Address : <b>${result.data.ip}</b></p>
                        <p>Created : <b>${result.data.created_at}</b></p>
                        <hr/>`;
                    if (result.type == 'identity') {
                        data_html += `<p>Verify Type : <b>${result.type=='identity'? 'Identity Card Number' : result.type}</b></p>
                        <p>ID : <b>${result.data.cmnd}</b></p>
                        <p>
                            Face:
                            <img style="max-width:100%;width:auto;" src="${result.data.img_face}" />
                        </p>
                        <p>
                            Front:
                            <img style="width:100%;" src="${result.data.img_front}" />
                        </p>
                        <p>
                            Back:
                            <img style="width:100%;" src="${result.data.img_back}" />
                        </p>
                        `;
                    }
                    if (result.type == 'driver') {
                        data_html += `<p>Verify Type : <b>${result.type}</b></p>
                        <p>ID : <b>${result.data.id_driver}</b></p>
                        <p>
                            Face:
                            <img style="max-width:100%;width:auto;" src="${result.data.img_face}" />
                        </p>
                        <p>
                            Front:
                            <img style="width:100%;" src="${result.data.img_front}" />
                        </p>
                        <p>
                            Back:
                            <img style="width:100%;" src="${result.data.img_back}" />
                        </p>
                        `;
                    }
                    if (result.type == 'passport') {
                        data_html += `<p>Verify Type : <b>${result.type}</b></p>
                        <p>ID : <b>${result.data.id_number}</b></p>
                        <p>
                            Face:
                            <img style="max-width:100%;width:auto;" src="${result.data.img_face}" />
                        </p>
                        <p>
                            Back:
                            <img style="width:100%;" src="${result.data.img_front_thumb}" />
                        </p>
                        <p>
                            Front:
                            <img style="width:100%;" src="${result.data.img_front}" />
                        </p>
                        
                        `;
                    }
                    $(".result_info").html(data_html);
                } else {
                    $(".result_info").html(`<p>${email} haven't KYC yet</p>`);
                }
            }).catch((error) => {
                alet(error);
            });
    }*/
</script>
<form method="post">
    <?php echo csrf_field(); ?>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <div class="form-inline">
                        <div class="form-group">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control border-white" name="search" value="<?php echo e(Cookie::get('search_kyc')); ?>" placeholder="email...">
                                <div class="input-group-append">
                                    <button type="submit" name="btn_search" class="input-group-text bg-blue border-blue text-white">
                                        <i class="fe-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!--a href="/<?php echo e(Helper_Dashboard::get_patch()); ?>/<?php echo e(Helper_Dashboard::get_patch(2)); ?>/trash" class="btn btn-blue btn-sm ml-2">
                            <i class="fe-trash"></i>
                        </a-->
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
    <?php echo $__env->make("Dashboard::inc.message", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="card-box">
                <div class="responsive-table-plugin">
                    <div class="table-wrapper">
                        <div class="table-rep-plugin fixed-solution">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table class="table table-sm table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Photo</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Total Users</th>
                                            <th>Total Earn</th>
                                            <th>WTA Earn</th>
                                            <th>Account Status</th>
                                            <th>KYC</th>
                                            <th>Created</th>
                                            <th>Updated</th>
                                            <!--th>Action</th-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <!--th scope="row"><input type="checkbox" name="check[]" value="<?php echo e($value->id); ?>" /></th-->
                                            <td><?php echo e($value->referral_user_id); ?></td>
                                            <td class="photo">
                                                <?php if(!empty($value->photo)): ?>
                                                <a data-fancybox data-src="/public/<?php echo e($value->photo); ?>">
                                                    <img width="50" src="/public/<?php echo e($value->photo); ?>"/>
                                                </a>
                                                <?php else: ?>
                                                <img width="50" src="/public/dashboard/assets/images/users/no-image.svg"/>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($value->fullname); ?></td>
                                            <td><a href="/dashboard/referral/details/<?php echo e($value->referral_user_id); ?>" onclick="view_detail('<?php echo e($value->email); ?>')" title="Detail"><?php echo e($value->email); ?></a></td>
                                            <td>
                                                <?php
                                                $referral_count = DB::table('referral')
                                                ->where("referral_user_id",$value->referral_user_id)->count()
                                                ?>
                                                <?php echo e($referral_count); ?>

                                            </td>
                                            <td>
                                                <?php
                                                $totalearn_count = DB::table('referral')
                                                ->where("referral_user_id",$value->referral_user_id)
                                                ->where("status",1)
                                                ->count()
                                                ?>
                                                <?php echo e($totalearn_count); ?>

                                            </td>
                                            <td>
                                                <?php
                                                $airdrop = DB::table('airdrop')
                                                ->where("id",$value->airdrop_id)->first();
                                                $wta_value = $totalearn_count*(!empty($airdrop->referral_value)?$airdrop->referral_value:0);
                                                ?>
                                                <?php echo e($wta_value); ?>

                                            </td>
                                            <td>
                                                <?php if($value->users_tatus): ?>
                                                <span class="badge bg-soft-success text-success shadow-none">Enabled</span>
                                                <?php elseif(!$value->users_tatus): ?>
                                                <span class="badge bg-soft-danger text-danger shadow-none">Disabled</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($value->kyc_status): ?>
                                                <span class="badge bg-soft-success text-success shadow-none">Completed</span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($value->created_at); ?></td>
                                            <td><?php echo e($value->updated_at); ?></td>
                                            <!--td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-blue btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe-settings"></i></button>
                                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-start">
                                                        <a class="dropdown-item text-danger" target="_blank" href='/dashboard/kyc/cancel-bonus/<?php echo e($value->bonus_id); ?>/<?php echo e($value->airdrop_id); ?>'><i class="fe-trash-2"></i> Cancel Bonus</a>
                                                    </div>
                                                </div>
                                            </td-->
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pagin mt-2">
                    <div class="row">
                        <!--div class="col">
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe-trash-2"></i> <i class="mdi mdi-chevron-down"></i></button>
                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 37px, 0px);">
                                    <a class="dropdown-item" href="#" onclick="javascript:checkDelBoxes($(this).closest('form').get(0), 'check[]', true);return false;"><i class="fe-check-square"></i> Tất cả</a>
                                    <a class="dropdown-item" href="#" onclick="javascript:checkDelBoxes($(this).closest('form').get(0), 'check[]', false);return false;"><i class="fe-x"></i> Hủy bỏ</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" delete-all="true" url="/<?php echo e(Helper_Dashboard::get_patch(1)); ?>/<?php echo e(Helper_Dashboard::get_patch(2)); ?>/delete" href="#"><i class="fe-trash-2"></i> Xóa</a>
                                </div>
                            </div>
                        </div-->
                        <div class="col">
                            <?php echo $data->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="modal fade" id="modal_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-12">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="result_info"></div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Dashboard::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wallet_wta_finance/public_html/app/Modules/Dashboard/Views/referral/index.blade.php ENDPATH**/ ?>