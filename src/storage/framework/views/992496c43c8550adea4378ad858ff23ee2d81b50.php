
<?php $__env->startSection('title', 'Account'); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-xl-6 col-lg-12 col-sm-12">
        <?php echo $__env->make('ICO::inc.successmessage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('ICO::inc.errormessage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="account">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-4">
                <div class="info">
                    <p class="title">Account</p>
                    <div class="profile_sumany">
                        <div class="photo">
                            <?php if($user->photo): ?>
                                <img src="<?php echo e(asset('public/'.$user->photo)); ?>" alt="">
                            <?php else: ?>
                            <img src="/public/assets/images/4a4aefaeb6696571bc3c0307d5bd8a50.jpeg" />
                            <?php endif; ?>
                        </div>
                        <div class="content">
                            <p><span>Name</span><span><?php echo e($user->fullname); ?></span></p>
                            <p><span>Email</span><span><?php echo e(substr_replace(auth()->user("web")->email,"***",0,5)); ?></span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="list_tab">
                    <div class="list_item nav nav-tabs" role="tablist">
                        <a class="item nav-link active" data-toggle="tab" href="#profile">
                            <span>Profile</span>
                            <svg width="8" height="14" viewBox="0 0 8 14" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 13L7 7L1 1" stroke="black" stroke-width="2" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>
                        </a>
                        <a class="item nav-link" data-toggle="tab" href="#security">
                            <span>Security</span>
                            <svg width="8" height="14" viewBox="0 0 8 14" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 13L7 7L1 1" stroke="black" stroke-width="2" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>
                        </a>
                        <?php if($user->kyc_status): ?>
                        <a class="item nav-link" data-toggle="tab" href="#refferals">
                            <span>Referrals</span>
                            <svg width="8" height="14" viewBox="0 0 8 14" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 13L7 7L1 1" stroke="black" stroke-width="2" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-6 col-sm-8">
                <div class="tab-content tabcontent-border">
                    <div id="profile" class="tab-pane fade active show" role="tabpanel">
                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                <div class="profile_form">
                                    <form method="POST" action="<?php echo e(route('ico.account.update_post')); ?>"
                                          enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <p class="title">Update profile</p>
                                        <div class="mb-3">
                                            <label class="form-label">Fullname</label>
                                            <input type="text" class="form-control" name="fullname"
                                                   value="<?php echo e($user->fullname); ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Photo</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image_photo"
                                                       value="">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <button type="submit" class="btn btn-save">Save Changes</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="security" class="tab-pane fade" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="card-common">
                                    <p class="title-main">Two-Factor Authentication (2FA)</p>
                                    <p class="title">Google Authenticator (Recommended)</p>
                                    <p class="desc">Protect your account and transactions.</p>
                                    <?php if(!$user->google2fa_enable): ?>
                                        <span class="mb-0"><a class="action" href="./2fa.html">Enable</a></span>
                                    <?php else: ?>
                                        <span class="mb-0"><a class="action" href="./2fa.html">Disable</a></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="card-common">
                                    <p class="title-main">Indentity Verification</p>
                                    <p class="title">E-KYC </p>
                                    <p class="desc">Completing verification helps to protect account security</p>
                                    
<!--                                    <a href="https://ekyc.live/?email=<?php echo e($user->email); ?>&id=<?php echo e($secret_key); ?>"-->
<!--                                       class="action">Not yet</a>-->

                                    <?php if($user->kyc_status): ?>
                                    <a href="" class="action">Successfully</a>
<!--                                    <p class="title-main">Coming soon</p>-->
                                    <?php else: ?>
                                    <a href="https://ekyc.live/?email=<?php echo e($user->email); ?>&id=<?php echo e($secret_key); ?>" class="action">Not yet</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="card-common">
                                    <p class="title-main">SMS Authentication</p>
                                    <p class="title">Coming Soon</p>
                                    <p class="desc">Protect your account and transactions.</p>
                                    <a href="#" class="action">Coming Soon</a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="card-common">
                                    <p class="title-main">Advanced Security</p>
                                    <p class="title">Login Password</p>
                                    <p class="desc">Login password is used to log in to your account.</p>
                                    <a href="/change-password.html" class="action">Change</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if($user->kyc_status): ?>
                    <div id="refferals" class="tab-pane fade" role="tabpanel">
                        <div class="referral">
                            <p>Referral Program</p>
                            <div class="info">
                                <div class="item">
                                    <p>Referral Link:
                                    </p>
                                    <div class="input-group mb-3 input-primary">
                                        <input disabled type="text" id="referral_link"
                                               value="<?php echo e(url('register/'.$user->referral_code)); ?>"
                                               class="form-control">

                                        <div class="input-group-append" style="cursor: pointer;"
                                             onclick="copyToClipboard('#referral_link','<?php echo e(url('register/'.$user->referral_code)); ?>')">
                                        <span class="input-group-text">
                                            <svg width="22" height="28" viewBox="0 0 22 28" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M19.933 23.8979L19.9371 20.9783L19.9371 6.53256C19.9371 5.34715 19.4662 4.21029 18.628 3.37209C17.7898 2.53387 16.6529 2.06297 15.4675 2.06297L3.61831 2.06297C3.83183 1.45964 4.2271 0.937315 4.74972 0.567889C5.27233 0.198462 5.8966 9.39596e-05 6.5366 8.63862e-05L15.4675 8.7167e-05C17.2 8.73184e-05 18.8616 0.688328 20.0867 1.9134C21.3118 3.13848 22 4.80004 22 6.53256L22 20.9783C22 22.326 21.1377 23.4744 19.933 23.8979ZM9.44665 27.5107C8.62562 27.5107 7.8376 27.1848 7.25724 26.6031L0.906298 20.2494C0.32594 19.669 2.66178e-06 18.881 2.73344e-06 18.0613L3.74132e-06 6.53256C3.81306e-06 5.71189 0.326014 4.92484 0.906313 4.34454C1.48661 3.76424 2.27367 3.43823 3.09433 3.43823L15.4648 3.43823C16.2854 3.43823 17.0725 3.76424 17.6528 4.34454C18.2331 4.92484 18.5591 5.71189 18.5591 6.53256L18.5591 24.4164C18.5591 25.2371 18.2331 26.0241 17.6528 26.6044C17.0725 27.1847 16.2854 27.5107 15.4648 27.5107L9.44665 27.5107ZM9.62268 25.4479L15.4648 25.4479C15.7383 25.4479 16.0007 25.3392 16.1941 25.1458C16.3875 24.9523 16.4962 24.69 16.4962 24.4164L16.4962 6.53256C16.4962 5.9632 16.0341 5.50112 15.4648 5.50112L3.09433 5.50112C2.82078 5.50112 2.55843 5.60979 2.36499 5.80322C2.17156 5.99665 2.06289 6.259 2.06289 6.53256L2.06289 17.8798L6.52835 17.8798C7.3122 17.8797 8.06688 18.1771 8.63996 18.7118C9.21304 19.2466 9.56181 19.979 9.6158 20.761L9.62268 20.9728L9.62268 25.4479ZM7.55979 23.9887L7.55842 20.9728C7.55842 20.4502 7.1706 20.0197 6.66725 19.9509L6.52698 19.9413L3.51516 19.9427L7.55842 23.9887L7.55979 23.9887Z"
                                                      fill="#B769A0"></path>
                                            </svg>
                                        </span>
                                        </div>
                                    </div>
                                    <p class="copied wta" data-copy="#referral_link">Copied!</p>

                                </div>
                                <div class="item">
                                    <p>Registered referral : <?php echo e($Registered); ?></p>
<!--                                    <p>Bonus total: <?php echo e($bonus_value); ?> WTA</p>-->
                                    <p>Referral total: <?php echo e($referral_value); ?> WTA</p>
                                </div>
                            </div>
                        </div>
                        <div class="list card-common">
                            <div class="table-responsive" id="table_data">
                                <?php echo $__env->make("ICO::account.paginate", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>

                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function() {
            $("#referral_link").keydown(function(e) {
                if (e.keyCode == 67 || e.keyCode == 17) {
                    return true;
                }
                return false;
            });
        });

        function copyToClipboard(this_,value) {
            navigator.clipboard.writeText(value).then(function () {
                /* clipboard successfully set */
                $("[data-copy='" + this_ + "']").css({opacity:"1"});
            }, function () {
                /* clipboard write failed */
            });
        }
        $(document).ready(function(){

            $(document).on('click', '.page-link', function(event){
                event.preventDefault();
                if($(this).attr('href') != undefined){
                    var page = $(this).attr('href').split('page=')[1];
                }else{
                    var page = $(this).text();
                }
                fetch_data(page);
            });

            function fetch_data(page)
            {
                // var _token = $("input[name=_token]").val();
                var _token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url:"<?php echo e(route('ico.pagination.get')); ?>",
                    method:"GET",
                    data:{_token:_token, page:page},
                    success:function(users)
                    {
                        $('#table_data').html(users);
                    }
                });
            }

        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('ICO::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wallet_wta_finance/public_html/app/Modules/ICO/Views/account/index.blade.php ENDPATH**/ ?>