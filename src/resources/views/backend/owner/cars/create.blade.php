@extends('backend.owner.layouts.main')

@section('content')
    <!-- Preloader start -->
    @include('backend.owner.partials.loading')
    <!-- Preloader end -->

    <!-- Main wrapper start -->
    <div id="main-wrapper">
        <!--  Nav header start -->
        @include('backend.owner.partials.nav-header')
        <!-- Nav header end -->
        <!-- Header start -->
        {{-- @include('backend.owner.partials.header-start') --}}
        <!-- Header end ti-comment-alt -->

        <!-- Sidebar start -->
        @include('backend.owner.partials.sidebar')
        <!-- Sidebar end -->

        <!-- Content body start -->
        <div class="content-body" style="padding-top: inherit;">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Danh sách xe hơi</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                {{-- {{ route('main-content.store') }} --}}
                                <form class="form-horizontal" action="{{ route('store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        {{-- Left --}}
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Tên xe</label>
                                                <input type="text" class="form-control" name="name" required=""
                                                    placeholder="Nhập tên xe">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Mô tả</label>

                                                <textarea id="elm1" name="description" placeholder="Nhập mô tả..."></textarea>
                                                @error('description')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Hình ảnh</label>
                                                <!-- <input type="file" name="upload[]" multiple id=""> -->
                                                <input class="form-control choose" type="file" name="upload[]"
                                                    accept="image/*" multiple="multiple">
                                                @error('upload')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Chổ ngồi</label>
                                                <input type="number" class="form-control" name="seat" required=""
                                                    placeholder="Nhập số chỗ ngồi">
                                                @error('seat')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Màu xe</label>
                                                <input type="text" class="form-control" name="color" required=""
                                                    placeholder="Nhập màu xe">
                                                @error('color')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Người cho thuê</label>
                                                <select class="select2 form-control mb-3 custom-select" name="user">
                                                    <option>__Mời bạn chọn người cho thuê__</option>
                                                    @foreach ($suppliers as $supplier)
                                                        <option value="{{ $supplier->id }}" selected>{{ $supplier->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('user')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Thể loại xe</label>
                                                <select class="select2 form-control mb-3 custom-select" name="category">
                                                    <option>__Mời bạn chọn loại xe__</option>
                                                    @foreach ($categorys as $category)
                                                        <option value="{{ $category->id }}">
                                                            {{ $category->categories_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('category')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Hãng xe</label>
                                                <select class="select2 form-control mb-3 custom-select" name="render">
                                                    <option>__Mời bạn chọn hãng xe__</option>
                                                    @foreach ($renders as $render)
                                                        <option value="{{ $render->id }}">{{ $render->manu_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('render')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Vận tốc xe</label>
                                                <input type="number" class="form-control" name="make" required=""
                                                    placeholder="Nhập vận tốc">
                                                @error('make')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Vận tốc đồng hồ</label>
                                                <input type="number" class="form-control" name="power" required=""
                                                    placeholder="Nhập vận tốc đồng hồ">
                                                @error('power')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Hộp số</label>
                                                <input type="number" class="form-control" name="gearbox" required=""
                                                    placeholder="Nhập hộp số">
                                                @error('gearbox')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Hành lý</label>
                                                <input type="number" class="form-control" name="luggage" required=""
                                                    placeholder="Nhập số túi">
                                                @error('luggage')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Nhiên liệu</label>
                                                <select class="select2 form-control mb-3 custom-select" name="fuel">
                                                    <option selected>__Mời bạn chọn nhiên liệu__</option>
                                                    <option value="petrol">Petrol</option>
                                                    <option value="electricity">Electricity</option>
                                                    <option value="oil">Oil</option>
                                                </select>
                                                @error('fuel')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            {{-- Features --}}
                                            <div class="mb-0 row">
                                                <div class="col-md-9">
                                                    <div class="form-check-inline my-2">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="sensors" class="form-check-input"
                                                                id="customCheck6" data-parsley-multiple="groups"
                                                                data-parsley-mincheck="2" value="sensors">
                                                            <label class="form-check-label" for="customCheck6">Cảm
                                                                biến</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check-inline my-2">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="control_parking"
                                                                class="form-check-input" id="customCheck7"
                                                                data-parsley-multiple="groups" data-parsley-mincheck="2"
                                                                value="control_parking">
                                                            <label class="form-check-label" for="customCheck7">Bãi đậu xe
                                                                điều
                                                                khiển từ xa</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check-inline my-2">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="auto_temp" class="form-check-input"
                                                                id="customCheck8" data-parsley-multiple="groups"
                                                                data-parsley-mincheck="2" value="auto_temp">
                                                            <label class="form-check-label" for="customCheck8">Nhiệt độ tự
                                                                động</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check-inline my-2">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="wireless_co"
                                                                class="form-check-input" id="customCheck9"
                                                                data-parsley-multiple="groups" data-parsley-mincheck="2"
                                                                value="wireless_co">
                                                            <label class="form-check-label" for="customCheck9">Co không
                                                                dây</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check-inline my-2">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="conditioner"
                                                                class="form-check-input" id="customCheck4"
                                                                data-parsley-multiple="groups" data-parsley-mincheck="2"
                                                                value="conditioner">
                                                            <label class="form-check-label" for="customCheck4">Dầu
                                                                xả</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check-inline my-2">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="navigator" class="form-check-input"
                                                                id="customCheck5" data-parsley-multiple="groups"
                                                                data-parsley-mincheck="2" value="navigator">
                                                            <label class="form-check-label" for="customCheck5">Định
                                                                vị</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check-inline my-2">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="map" class="form-check-input"
                                                                id="customCheck5" data-parsley-multiple="groups"
                                                                data-parsley-mincheck="2" value="map">
                                                            <label class="form-check-label" for="customCheck5">Bản
                                                                đồ</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check-inline my-2">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="camera" class="form-check-input"
                                                                id="customCheck5" data-parsley-multiple="groups"
                                                                data-parsley-mincheck="2" value="camera">
                                                            <label class="form-check-label"
                                                                for="customCheck5">Camera</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check-inline my-2">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="kids_chair"
                                                                class="form-check-input" id="customCheck5"
                                                                data-parsley-multiple="groups" data-parsley-mincheck="2"
                                                                value="kids_chair">
                                                            <label class="form-check-label" for="customCheck5">Ghế trẻ
                                                                em</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check-inline my-2">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="spare_tire"
                                                                class="form-check-input" id="customCheck5"
                                                                data-parsley-multiple="groups" data-parsley-mincheck="2"
                                                                value="spare_tire">
                                                            <label class="form-check-label" for="customCheck5">Lốp dự
                                                                phòng</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check-inline my-2">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="bluetooth"
                                                                class="form-check-input" id="customCheck5"
                                                                data-parsley-multiple="groups" data-parsley-mincheck="2"
                                                                value="bluetooth">
                                                            <label class="form-check-label"
                                                                for="customCheck5">Bluetooth</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check-inline my-2">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="rear_camera"
                                                                class="form-check-input" id="customCheck5"
                                                                data-parsley-multiple="groups" data-parsley-mincheck="2"
                                                                value="rear_camera">
                                                            <label class="form-check-label" for="customCheck5">
                                                                Camera sau</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check-inline my-2">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="usb" class="form-check-input"
                                                                id="customCheck5" data-parsley-multiple="groups"
                                                                data-parsley-mincheck="2" value="usb">
                                                            <label class="form-check-label" for="customCheck5">USB</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check-inline my-2">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="safety_aribag"
                                                                class="form-check-input" id="customCheck5"
                                                                data-parsley-multiple="groups" data-parsley-mincheck="2"
                                                                value="safety_aribag">
                                                            <label class="form-check-label" for="customCheck5">Túi khí an
                                                                toàn</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check-inline my-2">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="gps" class="form-check-input"
                                                                id="customCheck5" data-parsley-multiple="groups"
                                                                data-parsley-mincheck="2" value="gps">
                                                            <label class="form-check-label" for="customCheck5">GPS</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end col -->
                                            </div>
                                        </div>
                                        {{-- End Left --}}
                                        {{-- Right --}}
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Giá xe</label>
                                                <input type="number" class="form-control price" name="price" required=""
                                                    placeholder="Nhập giá">
                                                @error('price')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Giá giảm</label>
                                                <input type="number" class="form-control discount" name="discount"
                                                    placeholder="Nhập giá giảm">
                                                @error('discount')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Phí dịch vụ</label>
                                                <input type="number" class="form-control discount" name="service_charge"
                                                    placeholder="Nhập phí dịch vụ">
                                                @error('service_charge')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Phí bảo hiểm</label>
                                                <input type="number" class="form-control discount" name="insurance_fees"
                                                    placeholder="Nhập phí bảo hiểm">
                                                @error('insurance_fees')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            {{-- Enter address --}}
                                            <div class="mb-3">
                                                <label class="form-label">Loại xe (Xe tự lái - 1 và xe có tài xế -
                                                    2)</label>
                                                <input type="number" class="form-control" name="range_of_vehicle"
                                                    required="" placeholder="Nhập 1 or 2 cho loại xe">
                                                @error('range_of_vehicle')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Bảo hiểm</label>

                                                <textarea required="" name="terms_of_use" class="form-control" rows="4">Nhập bảo hiểm</textarea>
                                                @error('terms_of_use')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Quy tắc</label>

                                                <textarea required="" name="rules" class="form-control" rows="4">Nhập quy tắc</textarea>
                                                @error('rules')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Địa chỉ</label>
                                                <input type="text" class="form-control" name="address" required=""
                                                    placeholder="Nhập địa chỉ">
                                                @error('address')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            {{-- City --}}
                                            <div class="mb-3">
                                                <label class="form-label">Thành phố</label>
                                                <select class="select2 form-control mb-3 custom-select js_region"
                                                    data-type="region">
                                                    <option>__Mời bạn chọn thành phố__</option>
                                                    @foreach ($region as $city)
                                                        <option value="{{ $city->id }}">
                                                            {{ $city->title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('region')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            {{-- Chọn quận huyện --}}
                                            <div class="mb-3">
                                                <label class="form-label">Quận/Huyện</label>
                                                <select class="select2 form-control mb-3 custom-select js_region"
                                                    name="city" id="district">
                                                    <option>__Mời bạn chọn quận huyện__</option>
                                                </select>
                                                @error('city')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            {{-- Thời gian --}}
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Ngày bắt đầu</label>
                                                        <input  name="start_date" class="form-control"
                                                            type="date" value="<?= date('d-m-Y') ?>" />

                                                        @error('start_date')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Ngày kết thúc</label>
                                                        <input  class="form-control" type="date" name="end_date"
                                                            value="<?= date('d-m-Y', strtotime('+1 day', strtotime(date('d-m-Y')))) ?>" />
                                                        @error('end_date')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Thời gian bắt đầu</label>
                                                        <input type="time" name="start_time">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Thời gian kết
                                                            thúc</label>
                                                        <input type="time" name="end_time">
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Giá 1-3 ngày</label>
                                                        <input type="number" class="form-control price" name="onetothree"
                                                            required="" placeholder="Nhập giá">
                                                        @error('price')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <label class="form-label">Giá 5-9 ngày</label>
                                                        <input type="number" class="form-control price" name="fiveonline"
                                                            required="" placeholder="Nhập giá">
                                                        @error('price')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Giá 10-14 ngày</label>
                                                        <input type="number" class="form-control price"
                                                            name="tentofourteen" required="" placeholder="Nhập giá">
                                                        @error('price')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <label class="form-label">Giá thêm 15 ngày</label>
                                                        <input type="number" class="form-control price" name="morefifteen"
                                                            required="" placeholder="Nhập giá">
                                                        @error('price')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Giá theo tháng</label>
                                                <input type="number" class="form-control price" name="pricemonth"
                                                    required="" placeholder="Nhập giá">
                                                @error('price')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <label class="form-label">Trạng thái</label><br>
                                                <input type="checkbox" id="switch1" name="status" switch="none" />
                                                <label for="switch1" data-on-label="On" data-off-label="Off"></label>
                                                @error('status')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- End Right --}}
                                    </div>
                                    {{-- Act --}}
                                    <div class="mb-0">
                                        <div>
                                            <button type="reset" class="btn btn-danger waves-effect ms-1">
                                                Hủy bỏ
                                            </button>
                                            <button type="submit" class="btn btn-light waves-effect waves-light">
                                                Gửi đi
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <!-- end form -->
                            </div>
                            <!-- end cardbody -->
                        </div>
                    </div>

                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- Content body end -->
    </div>
    <!-- Main wrapper end -->
    <!-- Scripts -->

    @include('backend.owner.partials.footer-boby')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    {{-- Ajax load tỉnh, quận huyện --}}
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.js_region').change(function(event) {
                event.preventDefault();
                let route = "{{ route('region.ajax') }}";
                let $this = $(this);
                let type = $this.attr('data-type');
                let regionID = $this.val();
                $.ajax({
                        method: "GET",
                        url: route,
                        data: {
                            type: type,
                            region: regionID
                        }
                    })
                    .done(function(msg) {
                        if (msg.data) {
                            let html = '';
                            let element = '';
                            if (type == 'region') {
                                html = "<option>__Mời bạn chọn quận huyện__</option>";
                                element = '#district';
                            } else {}
                            $.each(msg.data, function(index, value) {
                                html += "<option value='" + value.id + "'>" + value.title +
                                    "</option>"
                            });
                            $(element).html('').append(html);
                        }
                    })
            });
        });
    </script>
    <script>
        var price = document.querySelector('.price');
        var discount = document.querySelector('.discount');
        price.addEventListener('change', e => {
            var price1 = document.querySelector('.price').value;
            discount.setAttribute('max', price1);
        });
    </script>
    <script src="{{ asset('public/backend/assets/libs/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('public/backend/assets/js/pages/form-editor.init.js') }}"></script>
    <link href="{{ asset('public/backend/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
