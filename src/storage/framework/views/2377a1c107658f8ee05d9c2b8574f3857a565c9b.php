
<?php $__env->startSection('title', 'Wallet'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-xl-4 col-lg-4 col-sm-4">
        <div class="account_overview">
            <p>Account Overview</p>
            <p><span>USD</span><span id="total_usd">0</span></p>
        </div>
        <div class="wallet_overwiew">
            <p class="title_main">Wallet Overview</p>
            <div class="list_item nav nav-tabs" role="tablist">
                <a class="item nav-link active" data-toggle="tab" href="#wta_wallet">
                    <div class="number">
                        <p class="label">WTA Wallet</p>
                        <?php
                        //$token_balances = 100.001343;
                        ?>
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
                    
                </a>
                <?php if($total_value>0): ?>
                <a class="item nav-link">
                    <div class="number">
                        <p class="label">WTA Bonus</p>
                        <?php
                        //$token_balances = 100.001343;
                        ?>
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
                    
                </a>
                <?php endif; ?>
                <a class="item nav-link" data-toggle="tab" href="#bnb_wallet">
                    <div class="number">
                        <p class="label">BNB Wallet</p>
                        <p id="bnb" data-qantity="<?php echo e($bnb_balance); ?>">
                            <?php
                            $bnb_bal= explode(".",$bnb_balance);
                            ?>
                            <?php if(!empty($bnb_bal[1]) && $bnb_bal[1]=="0000"): ?>
                            <?php echo e($bnb_bal[0]); ?>

                            <?php else: ?>
                            <?php echo e($bnb_balance); ?>

                            <?php endif; ?>
                        </p>
                        <p>$<span id="bnbprice">0</span></p>
                    </div>
                    
                </a>
                <a class="item nav-link" data-toggle="tab" data-href="#bg_point">
                    <div class="number">
                        <p class="label">BG POINT</p>
                        <p class="bg_point_balance">0</p>
                        <br><br>
                        <p></p>
                    </div>

                    
                </a>
            </div>
            <div class="account_fund">
                <div class="wta_token">
                    <div class="nav" role="tablist">
                        <a class="nav-link active" data-toggle="tab" href="#depositwta">Deposit Now</a>
                        <a class="nav-link " data-toggle="tab" href="#withdrawwta">Withdraw</a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="depositwta" role="tabpanel">
                            <div class="input-group mb-0 input-primary">
                                <input class="form-control" id="address_wta" value="<?php echo e($bnb_wallet->address); ?>">
                                <div class="input-group-append" style="cursor: pointer;" onclick="copyToClipboard('#address_wta')">
                                    <span class="input-group-text">
                                        <svg width="22" height="28" viewBox="0 0 22 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M19.933 23.8979L19.9371 20.9783L19.9371 6.53256C19.9371 5.34715 19.4662 4.21029 18.628 3.37209C17.7898 2.53387 16.6529 2.06297 15.4675 2.06297L3.61831 2.06297C3.83183 1.45964 4.2271 0.937315 4.74972 0.567889C5.27233 0.198462 5.8966 9.39596e-05 6.5366 8.63862e-05L15.4675 8.7167e-05C17.2 8.73184e-05 18.8616 0.688328 20.0867 1.9134C21.3118 3.13848 22 4.80004 22 6.53256L22 20.9783C22 22.326 21.1377 23.4744 19.933 23.8979ZM9.44665 27.5107C8.62562 27.5107 7.8376 27.1848 7.25724 26.6031L0.906298 20.2494C0.32594 19.669 2.66178e-06 18.881 2.73344e-06 18.0613L3.74132e-06 6.53256C3.81306e-06 5.71189 0.326014 4.92484 0.906313 4.34454C1.48661 3.76424 2.27367 3.43823 3.09433 3.43823L15.4648 3.43823C16.2854 3.43823 17.0725 3.76424 17.6528 4.34454C18.2331 4.92484 18.5591 5.71189 18.5591 6.53256L18.5591 24.4164C18.5591 25.2371 18.2331 26.0241 17.6528 26.6044C17.0725 27.1847 16.2854 27.5107 15.4648 27.5107L9.44665 27.5107ZM9.62268 25.4479L15.4648 25.4479C15.7383 25.4479 16.0007 25.3392 16.1941 25.1458C16.3875 24.9523 16.4962 24.69 16.4962 24.4164L16.4962 6.53256C16.4962 5.9632 16.0341 5.50112 15.4648 5.50112L3.09433 5.50112C2.82078 5.50112 2.55843 5.60979 2.36499 5.80322C2.17156 5.99665 2.06289 6.259 2.06289 6.53256L2.06289 17.8798L6.52835 17.8798C7.3122 17.8797 8.06688 18.1771 8.63996 18.7118C9.21304 19.2466 9.56181 19.979 9.6158 20.761L9.62268 20.9728L9.62268 25.4479ZM7.55979 23.9887L7.55842 20.9728C7.55842 20.4502 7.1706 20.0197 6.66725 19.9509L6.52698 19.9413L3.51516 19.9427L7.55842 23.9887L7.55979 23.9887Z" fill="#B769A0" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <p class="copied wta" data-copy="#address_wta">Copied!</p>
                            <p>Send only WTA to this deposit address.</p>
                            <p>Sending coin or token other than WTA to this address may result in the loss of your deposit</p>
                        </div>
                        <div class="tab-pane fade " id="withdrawwta" role="tabpanel">
                            <!--input type="text" class="form-control" placeholder="Address" />
                            <div class="amount_balance mt-2">
                                <input type="text" class="form-control" placeholder="Amount" />
                                <a href="#">Max</a>
                            </div-->
                            Comming soon
                        </div>
                    </div>
                </div>
                <div class="hide bnb_token">
                    <div class="nav" role="tablist">
                        <a class="nav-link active" data-toggle="tab" href="#depositbnb">Deposit Now</a>
                        <a class="nav-link " data-toggle="tab" href="#withdrawbnb">Withdraw</a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="depositbnb" role="tabpanel">
                            <div class="input-group mb-0 input-primary">
                                <input type="text" value="<?php echo e($bnb_wallet->address); ?>" class="form-control" id="address_bnb">
                                <div class="input-group-append" style="cursor: pointer;" onclick="copyToClipboard('#address_bnb')">
                                    <span class="input-group-text">
                                        <svg width="22" height="28" viewBox="0 0 22 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M19.933 23.8979L19.9371 20.9783L19.9371 6.53256C19.9371 5.34715 19.4662 4.21029 18.628 3.37209C17.7898 2.53387 16.6529 2.06297 15.4675 2.06297L3.61831 2.06297C3.83183 1.45964 4.2271 0.937315 4.74972 0.567889C5.27233 0.198462 5.8966 9.39596e-05 6.5366 8.63862e-05L15.4675 8.7167e-05C17.2 8.73184e-05 18.8616 0.688328 20.0867 1.9134C21.3118 3.13848 22 4.80004 22 6.53256L22 20.9783C22 22.326 21.1377 23.4744 19.933 23.8979ZM9.44665 27.5107C8.62562 27.5107 7.8376 27.1848 7.25724 26.6031L0.906298 20.2494C0.32594 19.669 2.66178e-06 18.881 2.73344e-06 18.0613L3.74132e-06 6.53256C3.81306e-06 5.71189 0.326014 4.92484 0.906313 4.34454C1.48661 3.76424 2.27367 3.43823 3.09433 3.43823L15.4648 3.43823C16.2854 3.43823 17.0725 3.76424 17.6528 4.34454C18.2331 4.92484 18.5591 5.71189 18.5591 6.53256L18.5591 24.4164C18.5591 25.2371 18.2331 26.0241 17.6528 26.6044C17.0725 27.1847 16.2854 27.5107 15.4648 27.5107L9.44665 27.5107ZM9.62268 25.4479L15.4648 25.4479C15.7383 25.4479 16.0007 25.3392 16.1941 25.1458C16.3875 24.9523 16.4962 24.69 16.4962 24.4164L16.4962 6.53256C16.4962 5.9632 16.0341 5.50112 15.4648 5.50112L3.09433 5.50112C2.82078 5.50112 2.55843 5.60979 2.36499 5.80322C2.17156 5.99665 2.06289 6.259 2.06289 6.53256L2.06289 17.8798L6.52835 17.8798C7.3122 17.8797 8.06688 18.1771 8.63996 18.7118C9.21304 19.2466 9.56181 19.979 9.6158 20.761L9.62268 20.9728L9.62268 25.4479ZM7.55979 23.9887L7.55842 20.9728C7.55842 20.4502 7.1706 20.0197 6.66725 19.9509L6.52698 19.9413L3.51516 19.9427L7.55842 23.9887L7.55979 23.9887Z" fill="#B769A0" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <p class="copied bnb" data-copy="#address_bnb">Copied!</p>
                            <div class="svg_qrcode mb-3" style="display: none;"></div>
                            <p>Send only BNB to this deposit address.</p>
                            <p>Sending coin or token other than BNB to this address may result in the loss of your deposit</p>
                        </div>
                        <div class="tab-pane fade " id="withdrawbnb" role="tabpanel">
                            <label>Address</label>
                            <input type="text" class="form-control address_withdraw_bnb" placeholder="0x" />
                            <p class="error_address_bnb text-danger"></p>
                            <label style="display: flex;width:100%">Amount <span style="width:100%;text-align: right;">Fee : 0.0002 ~ 0.0005 BNB</span></label>
                            <div class="amount_balance input-group mt-2">
                                <input type="text" data-balance="<?php echo e($bnb_balance); ?>" class="form-control amount_withdraw_bnb" placeholder="Minimum 0.001" />
                                <div class="input-group-append">
                                    <button type="button" onclick="get_fee_bnb()" class="btn btn-dark" style="border-radius: 5px;border-top-left-radius: 0;border-bottom-left-radius: 0;">Max</button>
                                </div>
                            </div>
                            <p class="error_amount_bnb text-danger"></p>
                            <button type="button" id="btn_withdraw_bnb" class="btn btn-primary" style="width: 100%;border-radius: 10px;">Withdraw</button>
                        </div>
                    </div>
                </div>
                <!--div class="hide bg_point">
                    <p>BG POINT - coming soon</p>
                </div-->
            </div>
        </div>
    </div>
    <div class="col-xl-8 col-lg-8 col-sm-8">
        <div class="tab-content tabcontent-border">
            <div id="wta_wallet" class="tab-pane fade active show" role="tabpanel">
                <div class="dashboard_chart">
                    <div class="chart_title">
                        <p class="title_chart">Market Overview</p>
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
                <div class="transaction_list">
                    <p class="title_table">Transactions List</p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Asset</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Status</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($order)): ?>
                                <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <ellipse cx="10.3864" cy="10" rx="10.2521" ry="10" fill="#B769A0" />
                                            <path d="M14.7033 5C14.1072 5 13.6237 5.47109 13.6237 6.05305V7.95491V11.8154V11.8695C13.609 12.4499 13.1092 12.9151 12.5049 12.8939C11.9328 12.8737 11.4661 12.3772 11.4661 11.8191V7.95544V6.05305C11.4661 5.47109 10.9826 5 10.3865 5C9.79045 5 9.30748 5.47109 9.30748 6.05305V7.95491V11.8186C9.30748 12.3772 8.84029 12.8732 8.26868 12.8934C7.66443 12.9146 7.1646 12.4493 7.14992 11.869V11.8149V7.95491V6.05305C7.14937 5.47109 6.66641 5 6.07032 5C5.47369 5 4.99072 5.47109 4.99072 6.05305V11.8424C4.99072 12.2117 5.05544 12.566 5.1751 12.895C5.6189 14.121 6.81815 15 8.22843 15C9.05784 15 9.81438 14.6955 10.3865 14.1958C10.9592 14.6955 11.7158 15 12.5452 15C13.9555 15 15.1547 14.1215 15.5985 12.895C15.7182 12.566 15.7829 12.2117 15.7829 11.8424V6.05305C15.7829 5.47109 15.2994 5 14.7033 5Z" fill="white" />
                                        </svg>
                                    </td>
                                    <td><?php echo e($value->created_at); ?></td>
                                    <td>IN</td>
                                    <td>WTA</td>
                                    <td><?php echo e($value->quantity_token); ?></td>
                                    <?php if($value->status == 2): ?>
                                    <td>Success</td>
                                    <?php elseif($value->status == 3): ?>
                                    <td>Failed</td>
                                    <?php elseif($value->status == 1): ?>
                                    <td>Pending</td>
                                    <?php else: ?>
                                    <td>No Progress</td>
                                    <?php endif; ?>
                                    <td>
                                        <?php if(!empty(json_decode($value->hash_wta)) && $value->hash_wta!='""' && !empty(json_decode($value->hash_wta)->transactionHash)): ?>
                                        <a href="https://bscscan.com/tx/<?php echo e(json_decode($value->hash_wta)->transactionHash); ?>" target="_blank">
                                            <svg width="9" height="14" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.61339 0.999999L7.76465 7L1.61339 13" stroke="#EC4C93" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="bnb_wallet" class="tab-pane fade" role="tabpanel">
                <div class="dashboard_chart">
                    <p class="title_chart">Market Overview</p>
                    <select class="bnb_optionview" style="margin-bottom: 15px;border-color: #666666;color: #666666;">
                        <option value="0">-- Option View--</option>
                        <option value="2" data-value="10">10</option>
                        <option value="5" data-value="20">20</option>
                        <option value="10" data-value="50">50</option>
                        <option value="20" data-value="100">100</option>
                        <option value="100" data-value="500">500</option>
                        <option value="200" data-value="1000">1000</option>
                    </select>
                    <canvas id="lineChart_2"></canvas>
                </div>
                <div class="transaction_list">
                    <p class="title_table">Transactions List</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Type</th>
                                <th scope="col">Asset</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Status</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($transactionsBNB)): ?>
                            <?php $__currentLoopData = $transactionsBNB; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($value->created_at); ?></td>
                                <td>OUT</td>
                                <td>BNB</td>
                                <td><?php echo e($value->amount); ?></td>
                                <?php if($value->status == 2): ?>
                                <td>Success</td>
                                <?php elseif($value->status == 3): ?>
                                <td>Failed</td>
                                <?php elseif($value->status == 1): ?>
                                <td>Pending</td>
                                <?php else: ?>
                                <td>No Progress</td>
                                <?php endif; ?>
                                <td>
                                    <?php if(!empty($value->bnb_hash)): ?>
                                    <a href="https://bscscan.com/tx/<?php echo e(json_decode($value->bnb_hash)->transactionHash); ?>" target="_blank">
                                        <svg width="9" height="14" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.61339 0.999999L7.76465 7L1.61339 13" stroke="#EC4C93" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="bg_point" class="tab-pane fade" role="tabpanel">
                <div class="dashboard_chart">
                    <p class="title_chart">Market Overview</p>
                    <canvas id="lineChart_3"></canvas>
                </div>
            </div>
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
            body: 'address=<?php echo $bnb_wallet->address; ?>'
        }).then(response => response.json())
        .then(data => {
            //console.log(data)
            
        });
    //load qrcode
    fetch(`https://balance.wta.finance/generate-qrcode?fromtext=<?php echo $bnb_wallet->address; ?>`).then(response => response.json())
        .then(data => {
            if(data.status){
                $(".svg_qrcode").html(data.data).show();
            }
        });
    $(document).ready(function() {
        //init option show y chart
        let wta_optionview = (localStorage.getItem('wta_optionview') != "" && localStorage.getItem('wta_optionview') != undefined) ? JSON.parse(localStorage.getItem('wta_optionview')) : {
            max: 12000,
            step: 2000
        };
        let bnb_optionview = (localStorage.getItem('bnb_optionview') != "" && localStorage.getItem('bnb_optionview') != undefined) ? JSON.parse(localStorage.getItem('bnb_optionview')) : {
            max: 20,
            step: 5
        };
        $(".wta_optionview").val(wta_optionview.step);
        $(".bnb_optionview").val(bnb_optionview.step);
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
        $(".bnb_optionview").change(function() {
            if (parseInt(this.value) > 0) {
                let get_filter = {
                    max: $(this).find('option:selected').attr("data-value"),
                    step: this.value
                }
                localStorage.setItem('bnb_optionview', JSON.stringify(get_filter));
                lineChart2();
            }
        });
    });
    let wallet_address = "<?php echo $bnb_wallet->address; ?>";
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
                    body: 'address=<?php echo $bnb_wallet->address; ?>&start_date=<?php echo date("Y-m-") . "01"; ?>&end_date=<?php echo date("Y-m-d") ?>'
                }).then(response => response.json());
            } else {
                data_balance = data_chart;
            }
            let limit_data_y = (localStorage.getItem('wta_optionview') != "" && localStorage.getItem('wta_optionview') != undefined) ? JSON.parse(localStorage.getItem('wta_optionview')) : {
                max: 12000,
                step: 2000
            };
            new Chart(lineChart_1, {
                type: 'line',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels: data_balance.data[0].x, //.reverse(),//["Jan", "Febr", "Mar", "Apr", "May", "Jun", "Jul"],
                    datasets: [{
                        label: "My First dataset",
                        data: data_balance.data[1].y, //[0, 0, 0, 0, 0, 0, 0],
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
                                max: parseInt(limit_data_y.max),
                                min: 0,
                                stepSize: parseInt(limit_data_y.step),
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

    async function searchWTABlanceByDateRange() {
        let filterchart_start_date = $('.filterchart_start_date').val(),
            filterchart_end_date = $(".filterchart_end_date").val();
        if (filterchart_start_date.length > 0 && filterchart_end_date.length > 0) {
            let data_balance = await fetch('https://balance.wta.finance/api/wta/balance-daterange', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `address=<?php echo $bnb_wallet->address; ?>&start_date=${filterchart_start_date}&end_date=${filterchart_end_date}`
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
                body: `address=<?php echo $bnb_wallet->address; ?>&month=${month}&year=${year}`
            }).then(response => response.json());
            lineChart1(data_balance);
            $('#modalmonth_filter_wta').modal('hide')
        } else {
            lineChart1();
        }
    }

    var lineChart2 = async function() {
        if (jQuery('#lineChart_2').length > 0) {
            //basic line chart
            const lineChart_2 = document.getElementById("lineChart_2").getContext('2d');

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
            let limit_data_y = (localStorage.getItem('bnb_optionview') != "" && localStorage.getItem('bnb_optionview') != undefined) ? JSON.parse(localStorage.getItem('bnb_optionview')) : {
                max: 20,
                step: 5
            };
            lineChart_2.height = 20;
            let data_balance = await fetch('https://balance.wta.finance/api/bnb/balance-daterange', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'address=<?php echo $bnb_wallet->address; ?>&start_date=<?php echo date("Y-m-") . "01"; ?>&end_date=<?php echo date("Y-m-d") ?>'
            }).then(response => response.json());
            //console.log(data_balance);
            //console.log(data_balance.data[1].y.reverse());
            new Chart(lineChart_2, {
                type: 'line',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels: data_balance.data[0].x, //["Jan", "Febr", "Mar", "Apr", "May", "Jun", "Jul"],
                    datasets: [{
                        label: "My First dataset",
                        data: data_balance.data[1].y, //[0, 0, 0, 0, 0, 0, 0],
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
                                max: parseInt(limit_data_y.max),
                                min: 0,
                                stepSize: parseInt(limit_data_y.step),
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
    var lineChart3 = function() {
        if (jQuery('#lineChart_3').length > 0) {
            //basic line chart
            const lineChart_3 = document.getElementById("lineChart_3").getContext('2d');

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

            lineChart_3.height = 100;

            new Chart(lineChart_3, {
                type: 'line',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels: ["Jan", "Febr", "Mar", "Apr", "May", "Jun", "Jul"],
                    datasets: [{
                        label: "My First dataset",
                        data: [0, 0, 0, 0, 0, 0, 0],
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
                                max: 100,
                                min: 0,
                                stepSize: 20,
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
    lineChart2();
    lineChart3();
    $(document).ready(function() {
        $(".flatpickr").flatpickr({
            maxDate: new Date()
        });
        $(".filterchart_month").flatpickr({
            maxDate: new Date(),
            dateFormat: 'Y-m',
        });

        $(".wallet_overwiew .list_item a.item[href='#wta_wallet']").click(function() {
            $(".wta_token").show();
            $(".bnb_token").hide();
            $(".bg_point").hide();
        });
        $(".wallet_overwiew .list_item a.item[href='#bnb_wallet']").click(function() {
            $(".wta_token").hide();
            $(".bnb_token").show();
            $(".bg_point").hide();
        });
        $(".wallet_overwiew .list_item a.item[href='#bg_point']").click(function() {
            $(".wta_token").hide();
            $(".bnb_token").hide();
            $(".bg_point").show();
        });

        $("#address_wta").keydown(function(e) {
            if (e.keyCode == 67 || e.keyCode == 17) {
                return true;
            }
            return false;
        });
        $("#address_bnb").keydown(function(e) {
            if (e.keyCode == 67 || e.keyCode == 17) {
                return true;
            }
            return false;
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
        $("#btn_withdraw_bnb").click(function() {
            let bnb_address = $(".address_withdraw_bnb").val(),
                amount = $(".amount_withdraw_bnb").val(),
                bnb_balance = $(".amount_withdraw_bnb").attr('data-balance'),
                this_ = this;
            let is_clear = true;
            if (bnb_address.length == 0 || bnb_address.length < 42) {
                $(".error_address_bnb").show().html(`Please enter the BSC network - address`)
                is_clear = false;
            } else {
                $(".error_address_bnb").html(``);
            }
            if (amount.length == 0) {
                $('.error_amount_bnb').show().html(`Amount to withdraw must be at least 0.001`);
                is_clear = false;
            }
            if (amount < 0.001) {
                $('.error_amount_bnb').show().html(`Amount to withdraw must be at least 0.001`);
                is_clear = false;
            }
            if (bnb_balance < 0.001) {
                $('.error_amount_bnb').show().html(`Not enough balance`);
                is_clear = false;
            }
            if (is_clear) {
                //console.log("is clear");
                $('.error_amount_bnb').html(``);
                Swal.fire({
                    title: `Do you want to withdraw?`,
                    text: `${amount} BNB`,
                    showCancelButton: true,
                    confirmButtonText: 'Confirm',
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'POST',
                            url: "/withdraw-bnb",
                            beforeSend: function() {
                                $(this_).prop('disabled', true);
                            },
                            data: {
                                _token: $('meta[name="csrf-token"]').attr('content'),
                                to_address: bnb_address,
                                amount: amount
                            },
                            success: function(data) {
                                $(this_).prop('disabled', false);
                                console.log(data);
                                let result_data = JSON.parse(data);
                                if (result_data.status) {
                                    Swal.fire("Transaction is pending.", result_data.msg, "success").then((value) => {
                                        if (value) {
                                            location.reload();
                                        }
                                        if (value == null) {
                                            location.reload();
                                        }
                                    });
                                } else {
                                    Swal.fire("Error.", result_data.msg, "error").then((value) => {});
                                }
                            },
                        });
                    }
                })

            }
        });
    });

    function get_fee_bnb() {
        fetch('https://gas.wta.finance/gasfee-testnet?address=<?php echo $bnb_wallet->address; ?>&wta_total=500')
            .then(response => response.json())
            .then(data => {
                //console.log(data)
                if (data.status) {
                    let fee = parseFloat(data.transfer_bnb_fee),
                        bnb_balance = parseFloat($(".amount_withdraw_bnb").attr('data-balance'));
                    if (bnb_balance > fee) {
                        $('.amount_withdraw_bnb').val(parseFloat(bnb_balance - fee));
                    } else {
                        $('.error_amount_bnb').show().html(`Not enough balance`);
                    }
                }
            });
    }

    function copyToClipboard(this_) {
        $("[data-copy='" + this_ + "']").css({
            opacity: "1"
        });
        var target = $(this_);
        // Make it visible, so can be focused
        target.attr('type', 'text');
        target.focus();
        // Select all the text
        target[0].setSelectionRange(0, target.val().length);

        // Copy the selection
        var succeed;
        try {
            succeed = document.execCommand("copy");
        } catch (e) {
            succeed = false;
        }
        return succeed;
    }

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
<?php echo $__env->make('ICO::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wallet_wta_finance/public_html/app/Modules/ICO/Views/wallet/index.blade.php ENDPATH**/ ?>