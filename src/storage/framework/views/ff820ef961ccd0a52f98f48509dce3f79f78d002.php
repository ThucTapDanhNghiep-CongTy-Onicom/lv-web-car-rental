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
                    <p style="text-align: left;margin-bottom:15px;color: #606060;">Xin chào <?php echo e($email); ?>,</p>
                    <p style="text-align: left;color: #606060;font-size: 14px;">Bạn đã yêu cầu quên mật khẩu tại ứng dụng, để khôi phục mật khẩu hãy nhập mã code sau để tiến hành khôi phục.</p>
                    <p style="text-align: left;color: #606060;font-size: 14px;">Mã khôi phục : <b style="color:red;letter-spacing: 5px;"><?php echo e($reset_code); ?></b></p>
                    <p style="text-align: left;color: #606060;font-size: 14px;margin-bottom:15px">Ai đó đã yêu cầu khôi phục mật khẩu trên ứng dụng, nếu bạn không thực hiện yêu cầu này xin vui lòng bỏ qua email này.</p>
                    <p style="text-align: left;font-size: 14px;color: #606060;">© HCMC Tourism Promotion Center. All rights reserved.</p>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html><?php /**PATH /home/hcm_tourism/public_html/app/Modules/API/Views/email/forgotpassword_vi.blade.php ENDPATH**/ ?>