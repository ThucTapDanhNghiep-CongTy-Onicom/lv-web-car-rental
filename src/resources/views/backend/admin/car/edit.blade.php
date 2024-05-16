@extends('backend.admin.dasbroad.index')
@section('main-content')
    <style>
        input[type=time] {
            border: none;
            color: #2a2c2d;
            font-size: 14px;
            font-family: helvetica;
            width: 190px;
        }

        input[type=time]::-webkit-datetime-edit-fields-wrapper {
            display: flex;
        }

        input[type=time]::-webkit-datetime-edit-text {
            padding: 19px 4px;
        }


        /* Hour */
        input[type=time]::-webkit-datetime-edit-hour-field {
            background-color: #f2f4f5;
            border-radius: 15%;
            color: black;
            padding: 19px 13px;
        }

        /* Minute */
        input[type=time]::-webkit-datetime-edit-minute-field {
            background-color: #f2f4f5;
            border-radius: 15%;
            padding: 19px 13px;
        }

        /* AM/PM */
        input[type=time]::-webkit-datetime-edit-ampm-field {
            background-color: #7155d3;
            border-radius: 15%;
            color: #fff;
            padding: 19px 13px;
        }

        /* 'X' button for resetting/clearing time */
        input[type=time]::-webkit-clear-button {
            display: none;
        }

        /* Up/Down arrows for incrementing/decrementing the value */
        input[type=time]::-webkit-inner-spin-button {
            display: none;
        }

    </style>
    <div class="page-content">
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


                            <form class="form-horizontal" action="{{ route('main-content.update', $car->id) }}"
                                method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Tên xe</label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $car->name }}" required="" placeholder="Name">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Mô tả</label>

                                            <textarea id="elm1" name="description" placeholder="Description">{{ $car->description }}</textarea>
                                            @error('description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Hình ảnh</label>
                                            <!-- <input type="file" name="upload[]" multiple id=""> -->
                                            <input class="form-control" type="file" name="upload[]" accept="image/*"
                                                multiple="multiple">
                                            @error('upload')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <?php $photo_split = explode(',', $car->photo); ?>
                                            @for ($i = 0; $i < count($photo_split) - 1; $i++)
                                                <img src="<?= $photo_split[$i] ?>" alt=""
                                                    style="width: 60px;margin-top: 10px;">
                                            @endfor
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Chỗ ngồi</label>
                                            <input type="number" class="form-control" name="seat"
                                                value="{{ $car->seat }}" required="" placeholder="Seat">
                                            @error('seat')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Màu xe</label>
                                            <input type="text" class="form-control" name="color"
                                                value="{{ $car->color }}" required="" placeholder="Color">
                                            @error('color')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                       
                                        <div class="mb-3">
                                            <label class="form-label">Người cho thuê</label>
                                            <select class="select2 form-control mb-3 custom-select" name="user"
                                                style="width: 100%; height:36px;">
                                                <option>Chọn người cho thuê</option>
                                                
                                                @foreach ($suppliers as $supplier)
                                                    @if (empty($car->user->id))
                                                        <option value="{{ $supplier->id }}" >
                                                            {{ $supplier->name }}
                                                        </option>
                                                    @elseif (!empty($car->user->id))
                                                        @if ($supplier->id == $car->user->id)
                                                            <option value="{{ $supplier->id }}" selected>
                                                                {{ $supplier->name }}
                                                            </option>
                                                        @endif
                                                    @endif
                                                   
                                                @endforeach

                                            </select>
                                            @error('user')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Thể loại xe</label>
                                            <select class="select2 form-control mb-3 custom-select" name="category"
                                                style="width: 100%; height:36px;">
                                                <option>Chọn thể loại</option>
                                                @foreach ($categorys as $category)
                                                    @if ($category->id == $car->catagory->id)
                                                        <option value="{{ $category->id }}" selected>
                                                            {{ $category->categories_name }}</option>
                                                    @endif
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
                                            <label class="form-label">Vận tốc xe</label>
                                            <input type="text" class="form-control" name="make"
                                                value="{{ $car->make }}" required="" placeholder="Make">
                                            @error('make')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Vận tốc đồng hồ</label>
                                            <input type="number" class="form-control" name="power"
                                                value="{{ $car->power }}" required="" placeholder="Make">
                                            @error('power')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Hộp số</label>
                                            <input type="number" class="form-control" name="gearbox"
                                                value="{{ $car->gearbox }}" required="" placeholder="Make">
                                            @error('gearbox')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Hành lý</label>
                                            <input type="number" class="form-control" name="luggage"
                                                value="{{ $car->luggage }}" required="" placeholder="Make">
                                            @error('luggage')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Nhiên liệu</label>
                                            <select class="select2 form-control mb-3 custom-select" name="fuel"
                                                style="width: 100%; height:36px;">
                                                <option value="{{ $car->fuel }}" selected>{{ $car->fuel }}
                                                </option>
                                                <option value="petrol">Petrol</option>
                                                <option value="electricity">Electricity</option>
                                                <option value="oil">Oil</option>
                                            </select>
                                            @error('render')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        {{-- Features --}}
                                        <div class="mb-0 row">
                                            <div class="col-md-9">
                                                <div class="form-check-inline my-2">
                                                    <div class="form-check">
                                                        @if (empty($feature['sensors']))
                                                            <input type="checkbox" name="sensors" class="form-check-input"
                                                                id="customCheck6" data-parsley-multiple="groups"
                                                                data-parsley-mincheck="2" value="sensors">
                                                        @else
                                                            <input type="checkbox" name="sensors" class="form-check-input"
                                                                id="customCheck6" data-parsley-multiple="groups"
                                                                data-parsley-mincheck="2"
                                                                value="{{ $feature['sensors'] }}" checked>
                                                        @endif
                                                        <label class="form-check-label" for="customCheck6">Cảm biến</label>
                                                    </div>
                                                </div>
                                                <div class="form-check-inline my-2">
                                                    <div class="form-check">
                                                        @if (empty($feature['control_parking']))
                                                            <input type="checkbox" name="control_parking"
                                                                class="form-check-input" id="customCheck7"
                                                                data-parsley-multiple="groups" data-parsley-mincheck="2"
                                                                value="control_parking">
                                                        @else
                                                            <input type="checkbox" name="control_parking"
                                                                class="form-check-input" id="customCheck7"
                                                                data-parsley-multiple="groups" data-parsley-mincheck="2"
                                                                value="{{ $feature['control_parking'] }}" checked>
                                                        @endif
                                                        <label class="form-check-label" for="customCheck7">Bãi đậu xe điều
                                                            khiển từ xa</label>
                                                    </div>
                                                </div>
                                                <div class="form-check-inline my-2">
                                                    <div class="form-check">
                                                        @if (empty($feature['auto_temp']))
                                                            <input type="checkbox" name="auto_temp" class="form-check-input"
                                                                id="customCheck8" data-parsley-multiple="groups"
                                                                data-parsley-mincheck="2" value="auto_temp">
                                                        @else
                                                            <input type="checkbox" name="auto_temp" class="form-check-input"
                                                                id="customCheck8" data-parsley-multiple="groups"
                                                                data-parsley-mincheck="2"
                                                                value="{{ $feature['auto_temp'] }}" checked>
                                                        @endif
                                                        <label class="form-check-label" for="customCheck8">Nhiệt độ tự
                                                            động</label>
                                                    </div>
                                                </div>
                                                <div class="form-check-inline my-2">
                                                    <div class="form-check">
                                                        @if (empty($feature['wireless_co']))
                                                            <input type="checkbox" name="wireless_co"
                                                                class="form-check-input" id="customCheck9"
                                                                data-parsley-multiple="groups" data-parsley-mincheck="2"
                                                                value="wireless_co">
                                                        @else
                                                            <input type="checkbox" name="wireless_co"
                                                                class="form-check-input" id="customCheck9"
                                                                data-parsley-multiple="groups" data-parsley-mincheck="2"
                                                                value="{{ $feature['wireless_co'] }}" checked>
                                                        @endif
                                                        <label class="form-check-label" for="customCheck9">Co không
                                                            dây</label>
                                                    </div>
                                                </div>
                                                <div class="form-check-inline my-2">
                                                    <div class="form-check">
                                                        @if (empty($feature['conditioner']))
                                                            <input type="checkbox" name="conditioner"
                                                                class="form-check-input" id="customCheck4"
                                                                data-parsley-multiple="groups" data-parsley-mincheck="2"
                                                                value="conditioner">
                                                        @else
                                                            <input type="checkbox" name="conditioner"
                                                                class="form-check-input" id="customCheck4"
                                                                data-parsley-multiple="groups" data-parsley-mincheck="2"
                                                                value="{{ $feature['conditioner'] }}" checked>
                                                        @endif
                                                        <label class="form-check-label" for="customCheck4">Dầu xả</label>
                                                    </div>
                                                </div>
                                                <div class="form-check-inline my-2">
                                                    <div class="form-check">
                                                        @if (empty($feature['navigator']))
                                                            <input type="checkbox" name="navigator" class="form-check-input"
                                                                id="customCheck5" data-parsley-multiple="groups"
                                                                data-parsley-mincheck="2" value="navigator">
                                                        @else
                                                            <input type="checkbox" name="navigator" class="form-check-input"
                                                                id="customCheck5" data-parsley-multiple="groups"
                                                                data-parsley-mincheck="2"
                                                                value="{{ $feature['navigator'] }}" checked>
                                                        @endif
                                                        <label class="form-check-label" for="customCheck5">Định vị</label>
                                                    </div>
                                                </div>
                                                <div class="form-check-inline my-2">
                                                    <div class="form-check">
                                                        @if (empty($feature['map']))
                                                            <input type="checkbox" name="map" class="form-check-input"
                                                                id="customCheck5" data-parsley-multiple="groups"
                                                                data-parsley-mincheck="2" value="map">
                                                        @else
                                                            <input type="checkbox" name="map" class="form-check-input"
                                                                id="customCheck5" data-parsley-multiple="groups"
                                                                data-parsley-mincheck="2" value="{{ $feature['map'] }}"
                                                                checked>
                                                        @endif
                                                        <label class="form-check-label" for="customCheck5">Bản đồ</label>
                                                    </div>
                                                </div>
                                                <div class="form-check-inline my-2">
                                                    <div class="form-check">
                                                        @if (empty($feature['camera']))
                                                            <input type="checkbox" name="camera" class="form-check-input"
                                                                id="customCheck5" data-parsley-multiple="groups"
                                                                data-parsley-mincheck="2" value="camera">
                                                        @else
                                                            <input type="checkbox" name="camera" class="form-check-input"
                                                                id="customCheck5" data-parsley-multiple="groups"
                                                                data-parsley-mincheck="2"
                                                                value="{{ $feature['camera'] }}" checked>
                                                        @endif
                                                        <label class="form-check-label" for="customCheck5">Camera</label>
                                                    </div>
                                                </div>
                                                <div class="form-check-inline my-2">
                                                    <div class="form-check">
                                                        @if (empty($feature['kids_chair']))
                                                            <input type="checkbox" name="kids_chair"
                                                                class="form-check-input" id="customCheck5"
                                                                data-parsley-multiple="groups" data-parsley-mincheck="2"
                                                                value="kids_chair">
                                                        @else
                                                            <input type="checkbox" name="kids_chair"
                                                                class="form-check-input" id="customCheck5"
                                                                data-parsley-multiple="groups" data-parsley-mincheck="2"
                                                                value="{{ $feature['kids_chair'] }}" checked>
                                                        @endif
                                                        <label class="form-check-label" for="customCheck5">Ghế trẻ
                                                            em</label>
                                                    </div>
                                                </div>
                                                <div class="form-check-inline my-2">
                                                    <div class="form-check">
                                                        @if (empty($feature['spare_tire']))
                                                            <input type="checkbox" name="spare_tire"
                                                                class="form-check-input" id="customCheck5"
                                                                data-parsley-multiple="groups" data-parsley-mincheck="2"
                                                                value="spare_tire">
                                                        @else
                                                            <input type="checkbox" name="spare_tire"
                                                                class="form-check-input" id="customCheck5"
                                                                data-parsley-multiple="groups" data-parsley-mincheck="2"
                                                                value="{{ $feature['spare_tire'] }}" checked>
                                                        @endif
                                                        <label class="form-check-label" for="customCheck5">Lốp dự
                                                            phòng</label>
                                                    </div>
                                                </div>
                                                <div class="form-check-inline my-2">
                                                    <div class="form-check">
                                                        @if (empty($feature['bluetooth']))
                                                            <input type="checkbox" name="bluetooth"
                                                                class="form-check-input" id="customCheck5"
                                                                data-parsley-multiple="groups" data-parsley-mincheck="2"
                                                                value="bluetooth">
                                                        @else
                                                            <input type="checkbox" name="bluetooth"
                                                                class="form-check-input" id="customCheck5"
                                                                data-parsley-multiple="groups" data-parsley-mincheck="2"
                                                                value="{{ $feature['bluetooth'] }}" checked>
                                                        @endif
                                                        <label class="form-check-label"
                                                            for="customCheck5">Bluetooth</label>
                                                    </div>
                                                </div>
                                                <div class="form-check-inline my-2">
                                                    <div class="form-check">
                                                        @if (empty($feature['rear_camera']))
                                                            <input type="checkbox" name="rear_camera"
                                                                class="form-check-input" id="customCheck5"
                                                                data-parsley-multiple="groups" data-parsley-mincheck="2"
                                                                value="rear_camera">
                                                        @else
                                                            <input type="checkbox" name="rear_camera"
                                                                class="form-check-input" id="customCheck5"
                                                                data-parsley-multiple="groups" data-parsley-mincheck="2"
                                                                value="{{ $feature['rear_camera'] }}" checked>
                                                        @endif
                                                        <label class="form-check-label" for="customCheck5">
                                                            Camera sau</label>
                                                    </div>
                                                </div>
                                                <div class="form-check-inline my-2">
                                                    <div class="form-check">
                                                        @if (empty($feature['usb']))
                                                            <input type="checkbox" name="usb" class="form-check-input"
                                                                id="customCheck5" data-parsley-multiple="groups"
                                                                data-parsley-mincheck="2" value="usb">
                                                        @else
                                                            <input type="checkbox" name="usb" class="form-check-input"
                                                                id="customCheck5" data-parsley-multiple="groups"
                                                                data-parsley-mincheck="2" value="{{ $feature['usb'] }}"
                                                                checked>
                                                        @endif
                                                        <label class="form-check-label" for="customCheck5">USB</label>
                                                    </div>
                                                </div>
                                                <div class="form-check-inline my-2">
                                                    <div class="form-check">
                                                        @if (empty($feature['safety_aribag']))
                                                            <input type="checkbox" name="safety_aribag"
                                                                class="form-check-input" id="customCheck5"
                                                                data-parsley-multiple="groups" data-parsley-mincheck="2"
                                                                value="safety_aribag">
                                                        @else
                                                            <input type="checkbox" name="safety_aribag"
                                                                class="form-check-input" id="customCheck5"
                                                                data-parsley-multiple="groups" data-parsley-mincheck="2"
                                                                value="{{ $feature['safety_aribag'] }}" checked>
                                                        @endif
                                                        <label class="form-check-label" for="customCheck5">Túi khí an
                                                            toàn</label>
                                                    </div>
                                                </div>
                                                <div class="form-check-inline my-2">
                                                    <div class="form-check">
                                                        @if (empty($feature['gps']))
                                                            <input type="checkbox" name="gps" class="form-check-input"
                                                                id="customCheck5" data-parsley-multiple="groups"
                                                                data-parsley-mincheck="2" value="gps">
                                                        @else
                                                            <input type="checkbox" name="gps" class="form-check-input"
                                                                id="customCheck5" data-parsley-multiple="groups"
                                                                data-parsley-mincheck="2" value="{{ $feature['gps'] }}"
                                                                checked>
                                                        @endif
                                                        <label class="form-check-label" for="customCheck5">GPS</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end col -->
                                        </div>
                                    </div>
                                    {{-- Right --}}
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Giá tiền</label>
                                            <input type="number" class="form-control" name="price"
                                                value="{{ $car->price }}" required="" placeholder="Price">
                                            @error('price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Giá giảm</label>
                                            <input type="number" class="form-control" name="discount"
                                                value="{{ $car->discount }}" required="" placeholder="discount">
                                            @error('discount')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Phí dịch vụ</label>
                                            <input type="number" class="form-control" name="service_charge"
                                                value="{{ $car->service_charge }}" required="" placeholder="discount">
                                            @error('service_charge')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Phí bảo hiểm</label>
                                            <input type="number" class="form-control" name="insurance_fees"
                                                value="{{ $car->insurance_fees }}" required="" placeholder="discount">
                                            @error('insurance_fees')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Địa chỉ</label>
                                            <input type="text" class="form-control" name="address"
                                                value="{{ $car->address }}" required="" placeholder="address">
                                            @error('address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Loại xe (Xe tự lái - 1 và xe có tài xế -
                                                2)</label>
                                            <input type="number" class="form-control" name="range_of_vehicle"
                                                value="{{ $car->range_of_vehicle }}" required=""
                                                placeholder="Range of vehicle">
                                            @error('range_of_vehicle')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Bảo hiểm</label>

                                            <textarea required="" name="terms_of_use" class="form-control" id="exampleFormControlTextarea1"
                                                rows="4">{{ $car->terms_of_use }}</textarea>
                                            @error('terms_of_use')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Quy tắc</label>

                                            <textarea required="" name="rules" class="form-control" id="exampleFormControlTextarea1"
                                                rows="4">{{ $car->rules }}</textarea>
                                            @error('rules')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Hãng xe</label>
                                            <select class="select2 form-control mb-3 custom-select" name="render"
                                                style="width: 100%; height:36px;">
                                                <option>Select</option>
                                                @foreach ($renders as $render)
                                                    @if ($render->id == $car->render->id)
                                                        <option value="{{ $render->id }}" selected>
                                                            {{ $render->manu_name }}</option>
                                                    @endif
                                                    <option value="{{ $render->id }}">{{ $render->manu_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('render')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Thành phố/Quận/Huyện</label>
                                            <select class="select2 form-control mb-3 custom-select" name="city"
                                                style="width: 100%; height:36px;">
                                                <option>Select</option>
                                                @foreach ($citys as $city)
                                                    @if ($city->id == $car->city->id)
                                                        <option value="{{ $city->id }}" selected>
                                                            {{ $city->title }} - Thành phố {{ $city->region_title }}
                                                        </option>
                                                    @endif
                                                    <option value="{{ $city->id }}">{{ $city->title }} - Thành phố
                                                        {{ $city->region_title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('city')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Ngày bắt đầu</label>
                                                    <input class="form-control" type="date"
                                                        value="{{ $car->start_date }}" name="start_date"
                                                        value="<?= date('Y-m-d') ?>" id="example-date-input">
                                                    @error('time_start')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Ngày kết thúc</label>
                                                    <input class="form-control" type="date"
                                                        value="{{ $car->end_date }}" name="end_date"
                                                        value="<?= date('Y-m-d', strtotime('+1 day', strtotime(date('Y-m-d')))) ?>"
                                                        id="example-date-input">
                                                    @error('time_end')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3" style="margin-top: 10px;">
                                                    <label class="form-label">Thời gian bắt đầu</label>
                                                    <input type="time" name="start_time" value="{{ $car->start_time }}">
                                                </div>
                                                <div class="mb-3" style="margin-top: 10px;">
                                                    <label class="form-label" style="margin-right: 10px;">Thời gian kết
                                                        thúc</label>
                                                    <input type="time" name="end_time" value="{{ $car->end_time }}">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Giá 1-3 ngày</label>
                                                    <input type="number" class="form-control price" name="onetothree"
                                                        value="{{ $costdate['one_to_three'] }}" required=""
                                                        placeholder="Price">
                                                    @error('price')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <label class="form-label">Giá 5-9 ngày</label>
                                                    <input type="number" class="form-control price" name="fiveonline"
                                                        value="{{ $costdate['five_online'] }}" required=""
                                                        placeholder="Price">
                                                    @error('price')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Giá 10-14 ngày</label>
                                                    <input type="number" class="form-control price" name="tentofourteen"
                                                        value="{{ $costdate['ten_to_fourteen'] }}" required=""
                                                        placeholder="Price">
                                                    @error('price')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <label class="form-label">Giá thêm 15 ngày</label>
                                                    <input type="number" class="form-control price" name="morefifteen"
                                                        value="{{ $costdate['more_fifteen'] }}" required=""
                                                        placeholder="Price">
                                                    @error('price')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Giá tháng</label>
                                            <input type="number" class="form-control price" name="pricemonth"
                                                value="{{ $costdate['price_month'] }}" required="" placeholder="Price">
                                            @error('price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <label class="form-label">Trạng thái</label><br>
                                            @if ($car->status == 'active')
                                                <input type="checkbox" id="switch1" name="status" switch="none" checked />
                                                <label for="switch1" data-on-label="On" data-off-label="Off"></label>
                                            @else
                                                <input type="checkbox" id="switch1" name="status" switch="none" />
                                                <label for="switch1" data-on-label="On" data-off-label="Off"></label>
                                            @endif

                                            @error('status')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

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
        <!-- container-fluid -->
    </div>
@endsection
@push('scripts')
    <!--tinymce js-->
    <script src="{{ asset('public/backend/assets/libs/tinymce/tinymce.min.js') }}"></script>

    <script src="{{ asset('public/backend/assets/js/pages/form-editor.init.js') }}"></script>
@endpush
