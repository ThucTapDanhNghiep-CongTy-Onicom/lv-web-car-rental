
<?php $__env->startSection('title',"Dashboard"); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-xl-4 col-lg-4 col-sm-12 col-sm-4">
        <div class="account_overview">
            <p>Account Overview</p>
            <p><span>USD</span><span id="total_usd">0</span></p>
        </div>
        <div class="wallet_overwiew">
            <p class="title_main">Wallet Overview</p>
            <div class="list_item">
                <div class="item">
                    <div class="number">
                        <p class="label">WTA Wallet</p>
                        <?php if(is_float($token_balance) && $token_balance>=1000): ?>
                        <p><?php echo e(number_format(explode(".",$token_balance)[0],0,"",",").".".explode(".",$token_balance)[1]); ?></p>
                        <?php else: ?>
                        <p><?php echo e(number_format($token_balance,0,"",",")); ?></p>
                        <?php endif; ?>

                        <?php if($now->exists() && $token_balance>0): ?>
                        <?php
                        $total_price = $now->first()->price*$token_balance;
                        ?>
                        <p data-usdwta="<?php echo e($total_price); ?>">$<?php echo e(number_format($total_price,2,'.',',')); ?></p>
                        <?php elseif($past->exists() && $token_balance>0): ?>
                        <?php
                        $total_price = $past->first()->price*$token_balance;
                        ?>
                        <p data-usdwta="<?php echo e($total_price); ?>">$<?php echo e(number_format($total_price,2,'.',',')); ?></p>
                        <?php else: ?>
                        <p data-usdwta="0">$0</p>
                        <?php endif; ?>
                    </div>
                    
                </div>
                <?php if($total_value>0): ?>
                <div class="item">
                    <div class="number">
                        <p class="label">WTA Bonus</p>
                        <?php if(is_float($total_value) && $total_value>=1000): ?>
                        <p><?php echo e(number_format(explode(".",$total_value)[0],0,"",",").".".explode(".",$total_value)[1]); ?></p>
                        <?php else: ?>
                        <p><?php echo e(number_format($total_value,0,"",",")); ?></p>
                        <?php endif; ?>

                        <?php if($now->exists() && $total_value>0): ?>
                        <?php
                        $total_price = $now->first()->price*$total_value;
                        ?>
                        <p data-usdwta="<?php echo e($total_price); ?>">$<?php echo e(number_format($total_price,2,'.',',')); ?></p>
                        <?php elseif($past->exists() && $total_value>0): ?>
                        <?php
                        $total_price = $past->first()->price*$total_value;
                        ?>
                        <p data-usdwta="<?php echo e($total_price); ?>">$<?php echo e(number_format($total_price,2,'.',',')); ?></p>
                        <?php else: ?>
                        <p data-usdwta="0">$0</p>
                        <?php endif; ?>
                    </div>
                    
                </div>
                <?php endif; ?>
                <div class="item">
                    <div class="number">
                        <p class="label">BNB Wallet</p>
                        <p id="bnb" data-qantity="<?php echo e($eth_balance); ?>">
                            <?php
                            $bnb_balance= explode(".",$eth_balance);
                            ?>
                            <?php if($bnb_balance[1]=="0000"): ?>
                            <?php echo e($bnb_balance[0]); ?>


                            <?php else: ?>
                            <?php echo e($eth_balance); ?>

                            <?php endif; ?>
                        </p>
                        <p>$<span id="bnbprice">0</span></p>
                    </div>
                    
                </div>
                <div class="item">
                    <div class="number">
                        <p class="label">BG POINT</p>
                        <p class="bg_point_balance">0</p>
                        <br><br>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-8">
        <div class="dashboard_chart">
            <div class="chart_title">
                <p class="title_chart">Market Overview WTA</p>
                <div class="chart_filter">
                    <a href="javascript:;" data-toggle="modal" data-target="#modaldate_filter_wta">Date</a>
                    <a href="javascript:;" data-toggle="modal" data-target="#modalmonth_filter_wta">Month</a>
                </div>
            </div>
            <select class="wta_optionview" style="margin-bottom: 15px;border-color: #666666;color: #666666;">
                <option value="0">-- Option View--</option>
                <option value="200" data-value="1000">1000</option>
                <option value="1000" data-value="5000">5000</option>
                <option value="2000" data-value="10000">10000</option>
                <option value="10000" data-value="50000">50000</option>
                <option value="20000" data-value="100000">100000</option>
                <option value="100000" data-value="500000">500000</option>
                <option value="200000" data-value="1000000">1000000</option>
                <option value="2000000" data-value="10000000">10000000</option>
            </select>
            <canvas id="lineChart_1"></canvas>
            <div class="modal fade show" id="modaldate_filter_wta" aria-modal="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content  bg-custom border-main">
                        <button type="button" class="close" data-dismiss="modal"><span><i class="la la-close"></i></span></button>
                        <div class="modal-body">
                            <p>Filter chart by date</p>
                            <div class="mb-4">
                                <label>Start Date</label>
                                <input type="text" class="form-control filterchart_start_date flatpickr" placeholder="yyyy-mm-dd">
                            </div>
                            <div class="mb-4">
                                <label>End Date</label>
                                <input type="text" class="form-control filterchart_end_date flatpickr" placeholder="yyyy-mm-dd">
                            </div>
                            <div style="text-align: right;">
                                <a href="javascript:searchWTABlanceByDateRange();" class="btn btn-primary" id="btn-chartwtadate" style="border-radius: 5px;">Search</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade show" id="modalmonth_filter_wta" aria-modal="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content  bg-custom border-main">
                        <button type="button" class="close" data-dismiss="modal"><span><i class="la la-close"></i></span></button>
                        <div class="modal-body">
                            <p>Filter chart by month</p>
                            <div class="mb-4">
                                <label>Month</label>
                                <input type="text" class="form-control filterchart_month flatpickr_month" placeholder="yyyy-mm">
                            </div>
                            <div style="text-align: right;">
                                <a href="javascript:searchWTABlanceByMonth();" class="btn btn-primary" id="btn-chartwtadate" style="border-radius: 5px;">Search</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="phase_list">
            <?php if($now->exists()): ?>
            <div class="item">
                <p>Token Sale Going On</p>
                <p><?php echo e($now->first()->name); ?></p>
                <input class="form-control" value="<?php echo e($wtabalanceOf_owner); ?>" disabled />
                <p class="tb-time" data-time="<?php echo e($now->first()->end_date); ?>"><span class="test"></span></p>
                <?php if($user->kyc_status && $user->google2fa_enable): ?>
                <!--a href="/token-sale/<?php echo e($now->first()->id); ?>" class="btn btn-buynow">Buy Now</a-->
                <a href="/order.html" class="btn btn-buynow">Buy Now</a>
                <?php endif; ?>
            </div>
            <?php endif; ?>
            <?php if($coming->exists()): ?>
            <div class="item">
                <p>Token Sale Coming On</p>
                <p><?php echo e($coming->first()->name); ?></p>
                <input class="form-control" value="<?php echo e(number_format($coming->first()->token_number,0,'','.')); ?>" disabled />
                <p class="tb-time" data-time="<?php echo e($coming->first()->start_date); ?>"><span class="test"></span></p>
                <?php if($user->kyc_status && $user->google2fa_enable): ?>
                <button class="btn btn-buynow" disabled>Coming Soon</button>
                <!--                <a href="/token-sale/<?php echo e($coming->first()->id); ?>" class="btn btn-buynow" disabled>Coming Soon</a>-->
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<script>
    fetch('https://balance.wta.finance/api/bnb/add-address', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'address=<?php echo $address; ?>'
        }).then(response => response.json())
        .then(data => {
            //console.log(data)
        });
    $(document).ready(function() {
        //init option show y chart
        let wta_optionview = (localStorage.getItem('wta_optionview') != "" && localStorage.getItem('wta_optionview') != undefined) ? JSON.parse(localStorage.getItem('wta_optionview')) : {
            max: 12000,
            step: 2000
        };
        $(".wta_optionview").val(wta_optionview.step);
        //event filter
        $(".wta_optionview").change(function() {
            if (parseInt(this.value) > 0) {
                //console.log($(this).find('option:selected').attr("data-value"))
                let get_filter = {
                    max: $(this).find('option:selected').attr("data-value"),
                    step: this.value
                }
                localStorage.setItem('wta_optionview', JSON.stringify(get_filter));
                searchWTABlanceByDateRange();
                /*
                let filterchart_month = $('.filterchart_month').val();
                if (filterchart_month.length > 0) {
                    searchWTABlanceByMonth();
                }else{
                    searchWTABlanceByDateRange();
                }*/
            }
        });
    });
    let draw = Chart.controllers.line.__super__.draw;
    var lineChart1 = async function(data_chart = "") {
        if (jQuery('#lineChart_1').length > 0) {
            //basic line chart
            const lineChart_1 = document.getElementById("lineChart_1").getContext('2d');
            Chart.controllers.line = Chart.controllers.line.extend({
                draw: function() {
                    draw.apply(this, arguments);
                    let nk = this.chart.chart.ctx;
                    let _stroke = nk.stroke;
                    nk.stroke = function() {
                        nk.save();
                        nk.shadowColor = 'rgb(236 76 147)'; //'rgba(255, 0, 0, .2)';
                        //nk.shadowBlur = 10;
                        //nk.shadowOffsetX = 0;
                        //nk.shadowOffsetY = 10;
                        _stroke.apply(this, arguments)
                        nk.restore();
                    }
                }
            });
            lineChart_1.height = 10000;

            let data_balance = [];
            if (data_chart == "") {
                data_balance = await fetch('https://balance.wta.finance/api/wta/balance-daterange', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'address=<?php echo $address; ?>&start_date=<?php echo date("Y-m-") . "01"; ?>&end_date=<?php echo date("Y-m-d") ?>'
                }).then(response => response.json());
            } else {
                data_balance = data_chart;
            }
            let limit_data_y = (localStorage.getItem('wta_optionview') != "" && localStorage.getItem('wta_optionview') != undefined) ? JSON.parse(localStorage.getItem('wta_optionview')) : {
                max: 12000,
                step: 2000
            };
            console.log(limit_data_y);
            new Chart(lineChart_1, {
                type: 'line',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels: data_balance.data[0].x, //[au,oc,nov]
                    datasets: [{
                        label: "My First dataset",
                        data: data_balance.data[1].y, //[1,2,3,]
                        borderColor: 'rgba(236, 76, 147, 1)', //'rgba(235, 129, 83, 1)',
                        borderWidth: "2",
                        backgroundColor: 'transparent',
                        pointBackgroundColor: 'rgba(236, 76, 147, 1)', //'rgba(235, 129, 83, 1)'
                    }]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                max: parseInt(limit_data_y.max), //(localStorage.getItem('wta_optionview')!="" || localStorage.getItem('wta_optionview')!=undefined)? parseInt(localStorage.getItem('wta_optionview')):12000,
                                min: 0,
                                stepSize: parseInt(limit_data_y.step), //2000,
                                padding: 10
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                padding: 5
                            },
                            gridLines: {
                                display: false
                            }
                        }],
                    }
                }
            });

        }
    }
    lineChart1();


    async function searchWTABlanceByDateRange() {
        let filterchart_start_date = $('.filterchart_start_date').val(),
            filterchart_end_date = $(".filterchart_end_date").val();
        if (filterchart_start_date.length > 0 && filterchart_end_date.length > 0) {
            let data_balance = await fetch('https://balance.wta.finance/api/wta/balance-daterange', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `address=<?php echo $address; ?>&start_date=${filterchart_start_date}&end_date=${filterchart_end_date}`
            }).then(response => response.json());
            lineChart1(data_balance);
            $('#modaldate_filter_wta').modal('hide')
        } else {
            lineChart1();
        }
    }

    async function searchWTABlanceByMonth() {
        let filterchart_month = $('.filterchart_month').val();
        if (filterchart_month.length > 0) {
            let month = filterchart_month.split("-")[1],
                year = filterchart_month.split("-")[0];

            let data_balance = await fetch('https://balance.wta.finance/api/wta/balance-month', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `address=<?php echo $address; ?>&month=${month}&year=${year}`
            }).then(response => response.json());
            lineChart1(data_balance);
            $('#modalmonth_filter_wta').modal('hide')
        }
    }

    $(document).ready(function() {
        $(".flatpickr").flatpickr({
            maxDate: new Date()
        });
        $(".filterchart_month").flatpickr({
            maxDate: new Date(),
            dateFormat: 'Y-m',
        });

        $.ajax({
            type: 'POST',
            url: "/bg-point-balance",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
            },
            success: function(data) {
                //console.log(data);
                let result_data = JSON.parse(data);
                if (result_data.status) {
                    $(".bg_point_balance").html(result_data.data)
                }
            },
        });
    });

    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
    }
    let socket = new WebSocket("wss://stream.binance.com:9443/ws/bnbusdt@kline_1m");
    socket.onmessage = function(e) {
        //console.log(e.data)
        let data = JSON.parse(e.data);
        let bnb_token = parseFloat(document.querySelector("#bnb").getAttribute("data-qantity"));
        let bnb_usdt = (bnb_token * parseFloat(data.k.c)).toFixed(2);
        document.querySelector("#bnbprice").innerHTML = bnb_usdt;

        //for price total
        let wta_usdt = parseFloat(document.querySelector("p[data-usdwta]").getAttribute("data-usdwta"));
        document.querySelector("#total_usd").innerHTML = parseFloat(parseFloat(bnb_usdt) + parseFloat(wta_usdt)).toFixed(2) == 0.00 ? 0 : formatNumber(parseFloat(parseFloat(bnb_usdt) + parseFloat(wta_usdt)).toFixed(2));
        //console.log();
    }
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('ICO::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wallet_wta_finance/public_html/app/Modules/ICO/Views/dashboard/index.blade.php ENDPATH**/ ?>