<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Corvestor</title>
    <link href="/public/dashboard/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/public/dashboard/assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="/public/dashboard/assets/css/app.min.css" rel="stylesheet" type="text/css">
</head>

<body class="authentication-bg">
    <div class="account-pages mt-5 mb-2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-pattern">
                        <div class="card-body p-4">
                            <?php if(isset($errors)): ?>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p style="color:red"><?php echo e($error); ?></p>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            <form method="post">
                                <?php echo csrf_field(); ?>
                                <div class="form-group mb-3">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="email" />
                                </div>
                                <div class="form-group mb-3">
                                    <label>password</label>
                                    <input type="text" class="form-control" name="password" placeholder="passsword" />
                                </div>
                                <button class="btn btn-primary btn-block" type="submit" name="button">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html><?php /**PATH /home/wallet_wta_finance/public_html/app/Modules/Dashboard/Views/authentication/login.blade.php ENDPATH**/ ?>