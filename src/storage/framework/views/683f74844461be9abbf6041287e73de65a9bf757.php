<table class="table">
    <thead>
    <tr>
        <th scope="col">Email</th>
        <th scope="col">Kyc</th>
        <th scope="col">WTA</th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e(substr_replace($user->email,"***",0,5)); ?></td>
            <?php if($user->kyc): ?>
                <td>Completed</td>
            <?php else: ?>
                <td>Unconfirmed</td>
            <?php endif; ?>
            <?php if($user->kyc && $user->status): ?>
                <td><?php echo e($user->referral_value); ?></td>
            <?php else: ?>
                <td>0</td>
            <?php endif; ?>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<div class="d-flex justify-content-center">
<?php echo $users->links("pagination::bootstrap-4"); ?>

</div><?php /**PATH /home/wallet_wta_finance/public_html/app/Modules/ICO/Views/account/paginate.blade.php ENDPATH**/ ?>