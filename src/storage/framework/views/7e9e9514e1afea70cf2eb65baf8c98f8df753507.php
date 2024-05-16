
<?php $__env->startSection('title',"Order"); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('ICO::inc.successmessage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('ICO::inc.errormessage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="order">
    <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-7  col-sm-4">
            <?php if(!empty($now)): ?>
            <div class="phase_sale mb-4">
                <p>Token Sale Going On</p>
                <p><?php echo e($now->name); ?></p>
                <input class="form-control" disabled value="<?php echo e($wtabalanceOf_owner); ?>" />
                <strong id="now" data-time="<?php echo e($now->end_date); ?>"></strong>
                <div id="now-show" class="text-center count_down"></div>
            </div>
            <?php endif; ?>
            <?php if($coming->exists()): ?>
            <div class="phase_sale mb-4">
                <p>Token Sale Coming On</p>
                <p><?php echo e($coming->first()->name); ?></p>
                <input class="form-control" disabled value="<?php echo e(number_format($coming->first()->token_number,0,'','.')); ?>" />
                <strong id="now" data-time="<?php echo e($coming->first()->start_date); ?>"><span class="test"></span></strong>
                <div id="now-show" class="text-center count_down"></div>
            </div>
            <?php endif; ?>
            <div class="tutorial_video mb-4">
            <iframe width="100%" height="250" src="https://www.youtube.com/embed/0x5TZSIrwdk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-8">
            <?php if(!empty($now)): ?>
                <?php if($max_buy_remaining<$now->max_buy): ?>
                <div class="rate">
                    <div class="loading">
                        <i class="ti-reload"></i>
                    </div>
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Rate</label>
                            <input type="text" class="form-control" placeholder="0" id="rate_show" value="0" disabled>
                        </div>
                        <div class="mb-3">
                            <div style="display:flex;width:100%">
                                <label class="form-label">BNB</label>
                                <span style="display:flex;width:100%;justify-content: flex-end;">Balance: <span style="margin-left: 5px;"><?php echo e($bnb_balance); ?></a></span></span>
                            </div>
                            <input type="text" class="form-control input_buy_bnb" disabled id="bnb_balance" name="bnb_quantity" max="<?php echo e($bnb_balance); ?>" placeholder="" value="">
                            <p class="error text-red" id="error_bnb"></p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">BNB Fee gas</label>
                            <input type="number" id="fee_buy" class="form-control" disabled name="bnb_fee" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">WTA</label>
                            <input type="number" class="form-control input_buy_wta" autofocus name="wta_quantity" id="wta_quantity" placeholder="" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="6">
                            <p class="error text-red" id="error_wta"></p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Min: 100 WTA - Max: 500 WTA</label>
                        </div>
                        <div class="mb-0">
                            <button type="button" class="btn btn-buy" id="btn_buy" disabled data-toggle="modal" data-target="#modal_confirm_buy">Buy now</button>
                        </div>
                    </form>
                </div>
                <?php endif; ?>
            <?php else: ?>
                <div class="rate">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Rate</label>
                            <input type="text" class="form-control" placeholder="0" id="rate_show" value="0" disabled>
                        </div>
                        <div class="mb-3">
                            <div style="display:flex;width:100%">
                                <label class="form-label">BNB</label>
                                <span style="display:flex;width:100%;justify-content: flex-end;">Balance: <span style="margin-left: 5px;"><?php echo e($bnb_balance); ?></a></span></span>
                            </div>
                            <input type="text" class="form-control input_buy_bnb" disabled id="bnb_balance" name="bnb_quantity" max="<?php echo e($bnb_balance); ?>" placeholder="" value="">
                            <p class="error text-red" id="error_bnb"></p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">BNB Fee gas</label>
                            <input type="number" id="fee_buy" class="form-control" disabled name="bnb_fee" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">WTA</label>
                            <input type="number" class="form-control input_buy_wta" disabled placeholder="">
                            <p class="error text-red" id="error_wta"></p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Min: 100 WTA - Max: 500 WTA</label>
                        </div>
                        <div class="mb-0">
                            <button type="button" class="btn btn-buy" disabled>Coming soon</button>
                        </div>
                    </form>
                </div>
            <?php endif; ?>
            <div class="order_list">
                <p class="title">Order List</p>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Date</th>
                                <th scope="col">Phase</th>
                                <th scope="col">WTA</th>
                                <th scope="col">BNB</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($order->exists()): ?>
                            <?php $__currentLoopData = $order->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td scope="row"><?php echo e($order->id); ?></td>
                                <td><?php echo e($order->created_at); ?></td>
                                <td><?php echo e($order->name); ?></td>
                                <td><?php echo e(number_format($order->quantity_token)); ?></td>
                                <td>
                                    <?php echo e($order->quantity_bnb==0?'Updating':$order->quantity_bnb); ?>

                                </td>
                                <?php if($order->status == 1): ?>
                                <td>Pending</td>
                                <?php elseif($order->status == 2): ?>
                                <td style="color:#EC4C93">Success</td>
                                <?php elseif($order->status == 3): ?>
                                <td style="color:red">Failed</td>
                                <?php else: ?>
                                <td>No progress</td>
                                <?php endif; ?>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade show" id="modal_confirm_buy" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content  bg-custom border-main">
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <div style="display:flex;width:100%">
                            <label class="form-label">WTA</label>
                        </div>
                        <input type="number" id="modal_token" class="form-control input_buy_wta" disabled oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="6">
                        <p class="error text-red" id="error_wta_modal"></p>
                    </div>
                    <div class="mb-3">
                        <lable>BNB</lable>
                        <input type="text" id="modal_bnb" class="form-control" disabled>
                        <p class="error text-red" id="error_bnb_modal"></p>
                    </div>
                    <div class="mb-3">
                        <lable>BNB Fee</lable>
                        <input type="text" id="modal_fee" class="form-control" disabled>
                    </div>
                    <div style="justify-content: flex-end;display: flex;">
                        <button class="btn btn-defaul" style="border: 1px solid #dddddd;margin-right: 14px;" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" disabled id="modal_btn_buy">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/caret/1.0.0/jquery.caret.min.js"></script>
<script>
    let bnb_socket = null;
    const bnb_connect = () => {
        bnb_socket = new WebSocket("wss://stream.binance.com:9443/ws/bnbusdt@kline_1m");
        bnb_socket.onmessage = function(e) {
            $(".rate .loading").hide();            
            let data = JSON.parse(e.data);
            let price_bnb = parseFloat(data.k.c);
            <?php if (!empty($now) && !empty($now->wta_price)) { ?>
                let wta_quantity = parseFloat($("#wta_quantity").val());
                let rate_bnb = parseFloat(<?php echo !empty($now->wta_price) ? $now->wta_price : 0 ?>) / price_bnb;
                    $("#rate_show").val(`1 WTA = ${rate_bnb.toFixed(6)} BNB`).attr("data-nobnb", rate_bnb.toFixed(6)).attr("data-pricewta", <?php echo $now->wta_price; ?>);
                if(wta_quantity>=<?php echo $now->min_buy; ?>){
                    //check if input bnb to buy
                    let bnb_max = parseFloat($("#bnb_balance").attr("max"));
                    let bnb_balance = parseFloat($("#bnb_balance").val());
                    let bnb_fee = parseFloat($("#fee_buy").val());
                    
                    if (bnb_max > 0) {
                        $("#bnb_balance").attr("max-buy", parseFloat(bnb_max - bnb_fee).toFixed(6));
                    } else {
                        $("#bnb_balance").attr("max-buy", 0);
                    }
                    let max_bnb_can_buy = parseFloat($("#bnb_balance").attr("max-buy"));
                    //console.log(bnb_balance);
                    if (!isNaN(wta_quantity) && wta_quantity >= <?php echo $now->min_buy; ?> && wta_quantity <=<?php echo $now->max_buy; ?>) {
                        let bnb_quantity = parseFloat(rate_bnb * wta_quantity).toFixed(6);
                        if (bnb_quantity <= max_bnb_can_buy) {
                            $("#bnb_balance,#modal_bnb").val(bnb_quantity);
                            $("#error_bnb,#error_bnb_modal").hide().html(`${max_bnb_can_buy}-${bnb_quantity}=${max_bnb_can_buy-bnb_quantity}`);
                            $("#btn_buy,#modal_btn_buy").prop('disabled', false);
                        } else {
                            $("#btn_buy,#modal_btn_buy").prop('disabled', true);
                            $("#error_bnb,#error_bnb_modal").show().html(`Not enough balance`); //(`${max_bnb_can_buy}-${bnb_quantity}=${max_bnb_can_buy-bnb_quantity}` + " Not enough balance").css({'color': 'red'});
                        }
                    }
                }
        <?php } ?>
        };
    }
    bnb_connect();
    bnb_socket.onclose = function(e) {
        setTimeout(function() {
            bnb_connect();            
        }, 1000);
    };
    $(document).ready(function() {
        <?php if (!empty($now)) { ?>
            $('.input_buy_wta').keypress(function(eve) {
                if ((eve.which != 46 || $(this).val().indexOf('.') != -1) && (eve.which < 48 || eve.which > 57) || (eve.which == 46 && $(this).caret().start == 0)) {
                    eve.preventDefault();
                }
                $('.input_buy_wta').keyup(function(eve) {
                    if ($(this).val().indexOf('.') == 0) {
                        $(this).val($(this).val().substring(1));
                    }
                    let wta_quantity = parseFloat($(this).val());
                    let balance_max = parseFloat($("#bnb_balance").attr("max-buy")).toFixed(6);
                    let rate_bnb = parseFloat($("#rate_show").attr("data-nobnb")).toFixed(6);
                    
                    let bnb_quantity = parseFloat(rate_bnb * wta_quantity).toFixed(6);
                    if (bnb_quantity <= balance_max && wta_quantity >= <?php echo $now->min_buy; ?>) {
                        //allow buy
                        let total_bought = <?php echo $max_buy_remaining; ?>;
                    }
                    if (!isNaN(bnb_quantity)) {
                        //console.log(bnb_quantity);
                        if (bnb_quantity > balance_max && wta_quantity<=<?php echo $now->max_buy; ?>) {
                            //set max bnb can buy
                            $("#bnb_balance,#modal_bnb").val(balance_max);
                            //set max wta can buy
                            $(this).val(parseFloat(balance_max / rate_bnb).toFixed(2));
                        }
                    }
                    if (wta_quantity >= <?php echo $now->min_buy; ?>) {
                        $("#error_wta,#error_wta_modal").html(``).hide();
                        $("#btn_buy,#modal_btn_buy").prop('disabled', false);
                    } else {
                        $("#btn_buy,#modal_btn_buy").prop('disabled', true);
                        $("#error_wta,#error_wta_modal").html(`Min: <?php echo $now->min_buy; ?> WTA`).show();
                    }
                    if (wta_quantity > <?php echo $now->max_buy; ?>) {
                        //console.log("cc");
                        $("#btn_buy,#modal_btn_buy").prop('disabled', true);
                        $("#error_wta,#error_wta_modal").html(`Max: <?php echo $now->max_buy; ?> WTA`).show();
                    }         
                });
            });
            $(".bnb_max").click(function() {
                let max_bnb_balance = parseFloat($("#bnb_balance").attr("max-buy"));
                $("#bnb_balance,#modal_bnb").val(max_bnb_balance.toFixed(6));
                convert_wta(max_bnb_balance);
            });
            $(".btn_buy").click(function() {
                console.log("click")
            });
        <?php } else { ?>
            $(".input_buy_wta").prop('disabled', true);
        <?php } ?>
        get_fee_bnb();
        $('#modal_confirm_buy').on('shown.bs.modal', function() {
            $("#modal_token").trigger('focus');
            $("#modal_token").val($('#wta_quantity').val());
        });
        //buy
        $("#modal_btn_buy").click(function() {
            $.ajax({
                type: 'POST',
                url: "/order/token/buy",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    token: $("#wta_quantity").val(),
                },
                success: function(dataRespone) {
                    //console.log(dataRespone);
                    // console.log(typeof dataRespone)
                    let data = JSON.parse(dataRespone);
                    // console.log(data);

                    Swal.fire(data.title, data.msg, data.status ? "success" : "error").then((value) => {
                        if (value) {
                            location.reload();
                        }
                        if (value == null) {
                            location.reload();
                        }
                    });

                },
            });
        });
    });

    function convert_wta(max_bnb_balance) {
        <?php if (!empty($now)) { ?>
            let rate_bnb = parseFloat($("#rate_show").attr("data-nobnb"));
            let rate_wta = max_bnb_balance / rate_bnb;
            if (rate_wta <= <?php echo $now->max_buy; ?> && rate_wta >= <?php echo $now->min_buy; ?>) {
                $("#wta_quantity,#modal_token").val(rate_wta.toFixed(2));
                $("#error_wta,#error_wta_modal").html(``).hide();
                get_fee_bnb(rate_wta);
                $("#btn_buy,#modal_btn_buy").prop('disabled', false);
            } else {
                $("#wta_quantity,#modal_token").val("");
                if (rate_wta == 0) {
                    $("#error_wta,#error_wta_modal").html(``).hide();
                } else {
                    $("#error_wta,#error_wta_modal").html(`>${rate_wta.toFixed(2)}`).show();
                }
            }
        <?php } ?>
    }

    function convert_bnb(wta_quantity) {
        let rate_bnb = parseFloat($("#rate_show").attr("data-nobnb"));
        let balance_bnb = (rate_bnb * wta_quantity).toFixed(4);
        let fee_bnb = parseFloat($("#fee_buy").val());
        let balance = parseFloat($("#bnb_balance").attr("max")) - fee_bnb;
        if (balance_bnb <= balance) {
            $('.input_buy_bnb').val(balance_bnb);
        }
    }

    function get_fee_bnb(rate_wta = 500) {
        fetch('https://gas.wta.finance/gasfee-testnet?address=<?php echo $address; ?>&wta_total=' + rate_wta)
            .then(response => response.json())
            .then(data => {
                //console.log(data)
                if (data.status) {
                    let fee = parseFloat(data.transfer_bnb_fee) + parseFloat(data.transfer_wta_fee);
                    $('#fee_buy').val(fee.toFixed(5));
                    $('#modal_fee').val(fee.toFixed(5));
                    let bnb_max = parseFloat($("#bnb_balance").attr("max"));
                    if (bnb_max > 0) {
                        $("#bnb_balance").attr("max-buy", bnb_max - fee);
                    } else {
                        $("#bnb_balance").attr("max-buy", 0);
                    }
                }
            });
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('ICO::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wallet_wta_finance/public_html/app/Modules/ICO/Views/order/index.blade.php ENDPATH**/ ?>