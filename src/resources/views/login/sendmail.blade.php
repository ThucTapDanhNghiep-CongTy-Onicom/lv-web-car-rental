<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
</head>

<body>
    <div class="row">
        <div class="col-lg-12">
            <table class="body-wrap"
                style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; margin: 0;">
                <tr
                    style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                    <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;"
                        valign="top"></td>
                    <td class="container" width="600"
                        style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;"
                        valign="top">
                        <div class="content"
                            style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
                            <table class="main" width="100%" cellpadding="0" cellspacing="0"
                                itemprop="action" itemscope itemtype="http://schema.org/ConfirmAction"
                                style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; background-color: #fff; margin: 0; border: 3px solid #BD8522;"
                                bg-color="#fff">

                                <tr
                                    style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                    <td class="content-wrap"
                                        style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 20px;"
                                        valign="top">
                                        <meta itemprop="name" content="Confirm Email"
                                            style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;" />
                                        <table width="100%" cellpadding="0" cellspacing="0"
                                            style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                            <tr>
                                                <td><a href="#"><img src="{{asset('/ui/images/Group.svg')}}"
                                                            alt=""
                                                            style="margin-left: auto; margin-right: auto; display:block; margin-bottom: 10px; height: 60px;"></a>
                                                </td>
                                            </tr>
                                            <tr
                                                style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td class="content-block"
                                                    style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; color: #AF2D23; font-size: 24px; font-weight: 700; text-align: center; vertical-align: top; margin: 0; padding: 0 0 10px;"
                                                    valign="top">
                                                    WelCome To Yotrip
                                                </td>
                                            </tr>
                                            <tr
                                                style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td class="content-block"
                                                    style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; color: #888; font-size: 14px; vertical-align: top; margin: 0; padding: 10px 10px;"
                                                    valign="top">
                                                    
                                                    Thank you very much for your visit!
                                                </td>
                                            </tr>
                                            <tr
                                                style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td class="content-block"
                                                    style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 10px 10px;"
                                                    valign="top">
                                                    We may need to send you a code to confirm your account and it is important that we need this to authenticate you.
                                                </td>
                                            </tr>
                                            <tr
                                                style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td class="content-block"
                                                    style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 35px; vertical-align: top; margin: 0; padding: 10px 10px;    text-align: center;
                                                    font-weight: bold;"
                                                    valign="top">
                                                    {{$otp}}
                                                </td>
                                            </tr>
                                            <tr
                                                style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td class="content-block" itemprop="handler" itemscope
                                                    itemtype="http://schema.org/HttpActionHandler"
                                                    style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 10px 10px;"
                                                    valign="top">
                                                    <a href="{{url('/ui/otp')}}" itemprop="url"
                                                        style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; color: #FFF; text-decoration: none; line-height: 2em; font-weight: bold; text-align: center; cursor: pointer; display: block; border-radius: 5px; text-transform: capitalize;  margin: 0;background-color: #AF2D23 ; border-color: #AF2D23 ; border-style: solid; border-width: 10px 20px;">
                                                        
                                                        Verify account
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr
                                                style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td class="content-block"
                                                    style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; padding-top: 5px; vertical-align: top; margin: 0; text-align: right;"
                                                    valign="top">
                                                    &mdash; <b>Yotrip</b> - 2022 © Onicorn.
                                                </td>
                                            </tr>
                                        </table>
                                        <!-- end table -->
                                    </td>
                                </tr>
                            </table>
                            <!-- end table -->

                        </div>
                    </td>
                    <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;"
                        valign="top"></td>
                </tr>
            </table>
            <!-- table -->
        </div>
    </div>
  
</body>
</html>
