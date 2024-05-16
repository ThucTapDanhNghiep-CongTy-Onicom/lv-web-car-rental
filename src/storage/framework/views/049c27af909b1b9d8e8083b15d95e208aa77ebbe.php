<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title><?php echo $__env->yieldContent('title'); ?></title>
	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
	<link href="/public/ico/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="/public/ico/assets/css/style.css?v=<?php echo e(time()); ?>" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
	<style>
		.copyright {
			display: flex;
			justify-content: center;
		}

		.copyright li {
			margin-left: 15px;
			margin-right: 15px;
		}

		body {
			background-image: url(/public/ico/assets/images/bg_outsite.jpeg);
			background-position: center;
			background-size: cover;
			background-repeat: no-repeat;
		}
	</style>
</head>

<body class="vh-100">
	<div class="authincation h-100">
		<div class="container h-100">
			<div class="row justify-content-center h-100 align-items-center">
				<?php echo $__env->yieldContent('content'); ?>				
			</div>
		</div>
	</div>
	<script src="/public/ico/assets/vendor/global/global.min.js"></script>
	<script src="/public/ico/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="/public/ico/assets/js/custom.min.js"></script>
	<script src="/public/ico/assets/js/deznav-init.js"></script>
	<script src="/public/ico/assets/js/app.js?v=<?php echo e(time()); ?>"></script>

</body>

</html><?php /**PATH /home/admin_nftmarketplace/public_html/app/Modules/ICO/Views/layoutpage.blade.php ENDPATH**/ ?>