@stack('scripts')
<!-- Required vendors -->
<script src="{{ asset('public/backend/owner/vendor/global/global.min.js') }}"></script>
<script src="{{ asset('public/backend/owner/vendor/chart.js/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('public/backend/owner/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>

<!-- Apex Chart -->
<script src="{{ asset('public/backend/owner/vendor/apexchart/apexchart.js') }}"></script>
<script src="{{ asset('public/backend/owner/vendor/nouislider/nouislider.min.js') }}"></script>
<script src="{{ asset('public/backend/owner/vendor/wnumb/wNumb.js') }}"></script>

<!-- Dashboard 1 -->
<script src="{{ asset('public/backend/owner/js/dashboard/dashboard-1.js') }}"></script>

<script src="{{ asset('public/backend/owner/js/custom.min.js') }}"></script>
<script src="{{ asset('public/backend/owner/js/dlabnav-init.js') }}"></script>
<script src="{{ asset('public/backend/owner/js/demo.js') }}"></script>
<script src="{{ asset('public/backend/owner/js/styleSwitcher.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>
    //Script tạo popup hiện lên khi bấm nút xóa
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.nutXoaDayNe').click(function(e) {
            var form = $(this).closest('form');
            var dataID = $(this).data('id');
            // alert(dataID);
            e.preventDefault();
            swal({
                    title: "Xác nhận!",
                    text: "Xe sẽ bị xóa và không thể lấy lại được!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    } else {
                        swal("Hành động xóa đã không được thực hiện!");
                    }
                });
        })
    })
    $(document).ready(function() {
        $("button").click(function(){
            $(".alert.alert-danger.alert-dismissable.fade.show").remove();
            $(".alert.alert-success.alert-dismissable.fade.show").remove();
        });
    })
</script>

<script>
    //Script tạo popup hiện di chuyển vào thùng rác
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.nutDiChuyen').click(function(e) {
            var form = $(this).closest('form');
            var dataID = $(this).data('id');
            // alert(dataID);
            e.preventDefault();
            swal({
                    title: "Xác nhận!",
                    text: "Bạn có muốn di chuyển xe vào thùng rác không!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    } else {
                        swal("Bạn đã giữ lại xe của mình!!");
                    }
                });
        })
    })
    $(document).ready(function() {
        $("button").click(function(){
            $(".alert.alert-danger.alert-dismissable.fade.show").remove();
            $(".alert.alert-success.alert-dismissable.fade.show").remove();
        });
    })
</script>