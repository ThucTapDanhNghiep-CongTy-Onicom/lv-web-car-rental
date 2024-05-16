<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title><?php echo $__env->yieldContent('title'); ?> - WTA Wallet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description"/>
    <meta content="ngoluan.com" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link rel="icon" type="image/png" sizes="16x16" href="/public/ico/assets/images/favicon.png?v=3">
    <link rel="stylesheet" href="/public/ico/assets/vendor/chartist/css/chartist.min.css">
    <link href="/public/ico/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="/public/ico/assets/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="/public/ico/assets/css/style.css?v=<?php echo e(time()); ?>" rel="stylesheet">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<div id="preloader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>
<!-- Begin page -->
<div id="main-wrapper">
    <?php echo $__env->make('ICO::inc.navheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('ICO::inc.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('ICO::inc.deznav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldSection(); ?>
    <div class="content-body">
        <div class="container-fluid">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
    <?php echo $__env->make('ICO::inc.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<!-- Required vendors -->
<script src="/public/ico/assets/vendor/global/global.min.js?v=3"></script>
<script src="/public/ico/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js?v=1"></script>
<script src="/public/ico/assets/vendor/chart.js/Chart.bundle.min.js"></script>
<!-- Chart piety plugin files -->
<script src="/public/ico/assets/vendor/peity/jquery.peity.min.js"></script>

<!-- Dashboard 1 -->
<script src="/public/ico/assets/js/dashboard/dashboard-1.js"></script>

<script src="/public/ico/assets/vendor/owl-carousel/owl.carousel.js"></script>
<script src="/public/ico/assets/js/custom.min.js?v=10"></script>
<script src="/public/ico/assets/js/deznav-init.js?v=2"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="/public/ico/assets/js/app.js?v=<?php echo e(time()); ?>"></script>
<?php echo $__env->yieldContent('script'); ?>
<script>
        $(document).on('click', 'li.dropdown.notification_dropdown', function(e) {
            e.stopPropagation();
        });
        var ws_notification = null;
        //open ws
        const ws_connect = () => {
            ws_notification = new WebSocket('wss://notification.wta.finance');
            ws_notification.onopen = function() {
                init_refesh();
            }
            ws_notification.onmessage = async function(event) {
                let result_data = JSON.parse(event.data);
                //init request
                if(result_data.total_unread>0){
                    $("#total_notify").show().html(result_data.total_unread);
                }else{
                    $("#total_notify").hide();
                }
                if (result_data.data.length > 0) {
                    $("#dlab_W_Notification").show();
                    $("#no_nofification").hide();
                    $("#see_all_notification").show();
                }
                let html_show = '';
                result_data.data.forEach((value) => {
                    let date_time = new Date(value.time);
                    let date_tostring = date_time.toDateString(),
                    timeHours = date_time.getHours(),
                    timeMinute = date_time.getMinutes(),
                    timeSecond = date_time.getSeconds(),
                    date_final = date_tostring+" - "+timeHours+":"+timeMinute;
                    html_show += `
                    <li>
                        <div class="timeline-panel">
                            <div class="media-body">
                                <p class="mb-1 text-white">${value.title}</p>
                                <small class="d-block">${date_final}</small>
                            </div>
                            <div class="media ml-1" style="background: none;">
                                ${(value.status==0)?
                                `<a href="javascript:mark_read_one('${value._id}');" style="color: #b769a0;"><i class="fa fa-circle" aria-hidden="true"></i></a>`
                                :
                                ''
                                //`<a href="javascript:mark_unread_one('${value._id}');" style="color: red;"><i class="fa fa-circle" aria-hidden="true"></i></a>`
                                }
                            </div>
                        </div>
                    </li>
                `;
                })
                $("#dlab_W_Notification .timeline").html(html_show);
            };
            ws_notification.onclose = function(e) {
                //console.log('Socket is closed. Reconnect will be attempted in 1 second.', e.reason);
                setTimeout(function() {
                    ws_connect();
                    console.log("Reconnect");
                }, 1000);
            };
        }
        ws_connect();

        function isOpen(ws) {
            return ws.readyState === ws.OPEN
        };
        const init_refesh = () => {
            if (!isOpen(ws_notification)) {
                ws_connect();
            } else {
                ws_notification.send(JSON.stringify({
                    action: "init",
                    users_id: <?php echo auth()->user("web")->id; ?>
                }));
            }
        }

        const mark_read_one = async (_id) => {
            if (!isOpen(ws_notification)) {
                ws_connect();
            } else {
                $(this).hide();
                await ws_notification.send(JSON.stringify({
                    action: "mark_read_one",
                    _id: `${_id}`
                }));
                await init_refesh();
            }
        }
        const mark_read_all = async () => {
            if (!isOpen(ws_notification)) {
                ws_connect();
            } else {
                await ws_notification.send(JSON.stringify({
                    action: "mark_read_all",
                    users_id: <?php echo auth()->user("web")->id; ?>
                }));
                await init_refesh();
            }
        }
        const mark_unread_one = async (_id) => {
            if (!isOpen(ws_notification)) {
                ws_connect();
            } else {
                await ws_notification.send(JSON.stringify({
                    action: "mark_unread_one",
                    _id: `${_id}`
                }));
                await init_refesh();
            }
        }
    </script>
</body>
</html><?php /**PATH /home/wallet_wta_finance/public_html/app/Modules/ICO/Views/layout.blade.php ENDPATH**/ ?>