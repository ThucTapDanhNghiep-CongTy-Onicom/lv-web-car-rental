<section class="ftco-section ftco-no-pt bg-light">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-12 featured-top-booking">
                <div class="row no-gutters">
                    <div class="col-md-6 d-flex align-items-center">
                        <form autocomplete="off" action="<?php echo e(route('search.car')); ?>"
                            class="request-form ftco-animate bg-primary" method="POST">
                            <?php echo csrf_field(); ?>
                            <h2 data-i18n="home.booking.title"></h2>
                            <div class="form-group">
                                <label for="" class="label" data-i18n="home.booking.pickLocation"></label>
                                <?php if(!empty($_GET['address'])): ?> 
                                <input onclick="popupOpen()" type="text" class="form-control" id="res"
                                    value="<?php echo e($_GET['address']); ?>" name="address" data-i18n-placeholder="home.booking.pickLocationPlaceholder"
                                    readonly>
                                <?php else: ?>
                                <input onclick="popupOpen()" type="text" class="form-control" 
                                     name="address" data-i18n-placeholder="home.booking.pickLocationPlaceholder"
                                    readonly>
                                <?php endif; ?>
                            </div>
                            <div class="d-flex">
                                <div class="form-group mr-2">
                                    <label for="" class="label" data-i18n="home.booking.pickDate"></label>
                                    <input type="date" class="form-control" name="start_date" value="<?= date('Y-m-d') ?>">
                                </div>
                                <div class="form-group ml-2">
                                    <label for="" class="label" data-i18n="home.booking.pickTime"></label>
                                    <input type="text" class="form-control" name="start_time" value="9:00pm" id="time_pick"
                                        data-i18n-placeholder="home.booking.pickTimePlaceholder">
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="form-group mr-2">
                                    <label for="" class="label" data-i18n="home.booking.dropDate"></label>
                                    <input type="date" class="form-control" name="end_date" value="<?= date('Y-m-d', strtotime('+1 day', strtotime(date('Y-m-d')))) ?>">
                                </div>
                                <div class="form-group ml-2">
                                    <label for="" class="label" data-i18n="home.booking.dropTime"></label>
                                    <input type="text" class="form-control" name="end_time" value="8:00pm" id="time_drop"
                                        data-i18n-placeholder="home.booking.dropTimePlaceholder">

                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" data-i18n-value="home.booking.buttonRent" class="btn btn-secondary py-3 px-4">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 d-flex align-items-center">
                        <div class="services-wrap rounded-right w-100">
                            <h3 class="heading-section mb-4" data-i18n="home.booking.guide.title"></h3>
                            <div class="row d-flex mb-4">
                                <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                    <div class="services w-100 text-center">
                                        <div class="icon d-flex align-items-center justify-content-center"><span
                                                class="flaticon-route"></span></div>
                                        <div class="text w-100">
                                            <h3 class="heading mb-2" data-i18n="home.booking.guide.choose"></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                    <div class="services w-100 text-center">
                                        <div class="icon d-flex align-items-center justify-content-center"><span
                                                class="flaticon-handshake"></span></div>
                                        <div class="text w-100">
                                            <h3 class="heading mb-2" data-i18n="home.booking.guide.deal"></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                    <div class="services w-100 text-center">
                                        <div class="icon d-flex align-items-center justify-content-center"><span
                                                class="flaticon-rent"></span></div>
                                        <div class="text w-100">
                                            <h3 class="heading mb-2" data-i18n="home.booking.guide.rent"></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<script>
    $('#keyword').keyup(function() {
        var query = $(this).val();
        if (query != '') {
            var _token = $('input[name = "_token"]').val();
            $.ajax({
                url: "<?php echo e(url('research-ajax')); ?>",
                method: "POST",
                data: {
                    query: query,
                    _token: _token
                },
                success: function(data) {
                    $('#search_ajax').fadeIn();
                    $('#search_ajax').html(data);
                }
            })
        } else {
            $('#search_ajax').fadeOut();
        }
    });
    $(document).on('click', '.li_search', function() {
        $('#keyword').val($(this).text());
        $('#search_ajax').fadeOut();
    });
</script>
<script>
    const popupOpen = function() {
        document.querySelector("#popup").style.display = "block";
        document.querySelector("#overlay").style.display = "block";
        document.querySelector("#overlay").classList.add('active');
       
    }

    // Popup Close

    function popupClose() {
        document.querySelector("#popup").style.display = "none";
        document.querySelector("#overlay").style.display = "none";
        document.querySelector("#overlay").classList.remove('active')
    }
</script>
<?php /**PATH /var/www/html/resources/views/partials/booking.blade.php ENDPATH**/ ?>