<!DOCTYPE html>
<html>

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
                    <img width="90" style="margin-bottom: 20px;" src="https://api.onicorn.vn/public/assets/images/logo.png" />
                    <p style="text-align: left;margin-bottom:15px;color: #606060;">Hi <?php echo e($email); ?>,</p>
                    <p style="text-align: left;color: #606060;font-size: 14px;">You have requested to forget your password at the application, to recover the password enter the following code to proceed with the recovery.</p>
                    <p style="text-align: left;color: #606060;font-size: 14px;">Recovery code : <b style="color:red;letter-spacing: 5px;"><?php echo e($reset_code); ?></b></p>
                    <p style="text-align: left;color: #606060;font-size: 14px;margin-bottom:15px">Someone has requested a password reset on the app, if you don't do this please ignore this email.</p>
                    <p style="text-align: left;font-size: 14px;color: #606060;">© HCMC Tourism Promotion Center. All rights reserved.</p>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html><?php /**PATH /home/hcm_tourism/public_html/app/Modules/API/Views/email/forgotpassword_en.blade.php ENDPATH**/ ?>