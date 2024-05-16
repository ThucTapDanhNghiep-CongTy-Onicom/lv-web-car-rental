<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table {
            max-width: 600px;
            width: 100%;
            margin: 0 auto 0;
            background: #fff;
            box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.05);
            border-radius: 5px;
            font-size: 18px;
        }
    </style>
</head>

<body style="background: #F3F3F3;padding: 80px 0;">
    <table>
        <tbody>
            <tr>
                <td style="text-align: center;padding: 30px;">
                    <img width="90" style="margin-bottom: 20px;" src="<?php echo e(asset('public/upload/email/logo.png')); ?>" />
                    <p style="text-align: left;color: #663B59;margin-bottom:15px">Hi <?php echo e($email); ?>,</p>
                    <p style="text-align: left;color: #663B59;">You have enabled two-factor authentication. <br/> Please backup the code to restore when forgotten.</p>
                    <p style="text-align: left;color: #663B59;font-size: 14px;margin-bottom:15px">If you do not fulfill this request, please give us feedback.</p>
                    <p style="text-align: left;font-size: 14px;color: #606060;">(c) 2021 Womentech. All rights reserved.</p>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</body>

</html><?php /**PATH /home/wallet_wta_finance/public_html/app/Modules/ICO/Views/email/enable2fa.blade.php ENDPATH**/ ?>