<!-- Right Sidebar -->
<div class="right-bar">
    <div data-simplebar class="h-100">
        <div class="rightbar-title px-3 py-4">
            <a href="javascript:void(0);" class="right-bar-toggle float-end">
                <i class="mdi mdi-close noti-icon"></i>
            </a>
            <h5 class="m-0">Cài đặt</h5>
        </div>

        <!-- Settings -->
        <hr />
        <h6 class="text-center mb-0">Chọn chế độ</h6>

        <div class="p-4">
            <div class="mb-2">
                <img src="{{asset('public/backend/assets/images/layouts/layout-1.jpg')}}" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="form-check form-switch mb-3">
                <input type="checkbox" class="form-check-input theme-choice" id="light-mode-switch" checked />
                <label class="custom-control-label" for="light-mode-switch">Chế độ sáng</label>
            </div>

            <div class="mb-2">
                <img src="{{asset('public/backend/assets/images/layouts/layout-2.jpg')}}" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="form-check form-switch mb-3">
                <input type="checkbox" class="form-check-input theme-choice" id="dark-mode-switch"
                    data-bsStyle="{{asset('public/backend/assets/css/bootstrap-dark.min.css')}}" data-appStyle="{{asset('public/backend/assets/css/app-dark.min.css')}}" />
                <label class="custom-control-label" for="dark-mode-switch">Chế độ tối</label>
            </div>

         


        </div>

    </div> <!-- end slimscroll-menu-->
</div>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>