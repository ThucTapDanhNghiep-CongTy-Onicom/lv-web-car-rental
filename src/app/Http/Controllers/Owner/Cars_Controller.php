<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Cars;
use App\Models\Vistors;
use App\Models\Reders;
use App\Models\City;
use App\Models\Region;
use App\Models\Bookings;
use App\Models\Categories;
use App\Models\Locations;
use App\Models\Costdate;
use App\Models\Features;
use App\Helpers\Helper;
use App\User;
use Carbon\Carbon;
use Socialite;

class Cars_Controller extends Controller {
    public function index() {
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $cars = Cars::select('cars.id','cars.name','cars.photo','seat',
                'price','discount','cars.address','cars.renders_id','cars.status','cars.end_date',
                'renders.manu_name','renders.id as renders_id',
                'users.id as users_id','users.role','users.name as users_name','users.photo as users_photo')
                    ->leftJoin('renders','cars.renders_id','renders.id')
                    ->leftJoin('users','cars.users_id','users.id')
                    ->where('cars.status','active')
                    // ->where('cars.end_date','>=',$today)
                    ->where('cars.users_id','=',Auth::user()->id)
                    ->whereNull('cars.deleted_at')
                    ->orderBy('cars.id','DESC')
                    ->paginate(10);        
        
        return view('backend.owner.cars.index')
            ->with('cars', $cars)
            ->with('today', $today);
    }
    // Filter ajax province, district
    public function filterRegion(Request $request) {
        $region_id = $request->region;
        if($region_id) {
            $location = City::select('id','title')
                ->where('region_id',$region_id)
                ->get();
            return response(['data' => $location]);
        }
    }
    //Save the deleted product back to the original:
    public function rehibilitate(Request $request,$id) {
        $result = Cars::where("cars.id", $id)
            ->update(['deleted_at' => NULL]);
        if ($result) {
            request()->session()->flash('success', 'Phục hồi thành công');
        } else {
            request()->session()->flash('error', 'Lỗi không mong muốn');
        }
        return redirect()->route('trash.index');
    }
    //Display the list of vehicles that are moved to the trash:
    public function trash() {
        $cars = Cars::select('cars.id','cars.name','cars.photo','seat',
                'price','discount','cars.address','cars.renders_id','cars.status',
                'renders.manu_name','renders.id as renders_id',
                'users.id as users_id','users.role','users.name as users_name','users.photo as users_photo')
            ->leftJoin('renders','cars.renders_id','renders.id')
            ->leftJoin('users','cars.users_id','users.id')
            ->where('cars.status','active')
            ->where('cars.users_id','=',Auth::user()->id)
            ->whereNotNull('deleted_at')
            ->orderBy('id','desc')
            ->paginate(10);
        return view('backend.owner.cars.trash')
            ->with('cars', $cars);
    }
    //Move to Trash:
    public function moveTrash(Request $request,$id) {
        //dd(date_default_timezone_set("Asia/Ho_Chi_Minh"));
        $result = Cars::where("cars.id", $id)
            ->update(['deleted_at' => Carbon::now()]);
        if ($result) {
            request()->session()->flash('success', 'Chuyển vào thùng rác thành công');
        } else {
            request()->session()->flash('error', 'Lỗi không mong muốn');
        }
        return redirect()->route('index');
    }
    // Post your car on the website
    public function create() {
        $categorys = Categories::all();
        $suppliers = User::where("role", "mod")
                ->where('users.id',Auth::user()->id)
                ->get();
        $renders = Reders::select('id','manu_name')
            ->orderBy('id','desc')
            ->get();
        $citys = City::select('city.*'
                      ,'region.id as region_id_city','region.title as region_title','region.status')
                ->leftJoin('region','city.region_id','region.id')
                ->where('region.status','active')
                ->get();
        $region = Region::select('region.id','region.title','region.status')
            ->get();

        $cars = Cars::all();
        return view('backend.owner.cars.create')
            ->with('suppliers', $suppliers)
            ->with('categorys', $categorys)
            ->with('renders', $renders)
            ->with('cars', $cars)
            ->with('region', $region)
            ->with('citys', $citys);
       
    }
    //Make a car owner's post save:
    public function store(Request $request) {
        $request->validate([
            'name' => 'string|required',
            'upload' => 'required',
            'seat' => 'required',
            'color' => 'string|required',
            'make' => 'integer|required',
            'power' => 'integer|required',
            'gearbox' => 'integer|required',
            'luggage' => 'integer|required',
            'fuel' => 'string|required',
            'price' => 'integer|required',
            'discount' => 'nullable',
            'service_charge' => 'integer|required',
            'insurance_fees' => 'integer|required',
            'address' => 'string|required',
            'terms_of_use' => 'string|required',
            'rules' => 'string|required',
            'user' => 'integer|required',
            'category' => 'integer|required',
            'render' => 'integer|required',
            'city' => 'integer|required',
            'status' => 'string',
            'range_of_vehicle' => 'string|required',
            'start_date' => 'required|after:yesterday',
            'end_date' => 'required|after:start_date'

        ]);
        $data = $request->all();
        if ($request->status == null) {
            $data['status'] = "inactive";
        } else {
            $data['status'] = "active";
        }
        $data['seat'] = (int)$request->seat;
        $data['users_id'] = (int)$request->user;
        $data['categories_id'] = (int)$request->category;
        $data['renders_id'] = (int)$request->render;
        $data['city_id'] = (int)$request->city;
        $photo_name = "";
        foreach ($request->upload as $photo) {
            if ($photo) {
                $file = "https://yotrip.vn/public/backend/uploads/images/cars/".$photo->getClientOriginalName();
                $filePath =  'public/backend/uploads/images/cars';
                $photo->move($filePath, $file);
                $photo_name .= $file . ",";
            }
        }
        $data['photo'] = $photo_name;
        $result = Cars::create($data);
        // Daily money table
        $cost_date = new Costdate();
        $cost_date['one_to_three'] = $request->onetothree;
        $cost_date['five_online'] = $request->fiveonline;
        $cost_date['ten_to_fourteen'] = $request->tentofourteen;
        $cost_date['more_fifteen'] = $request->morefifteen;
        $cost_date['price_month'] = $request->pricemonth;
        $cost_date['cars_id'] = $result['id'];
        $cost_date->save();
        // Features of the car has 15 features:
        $feature = new Features();
        $feature['sensors'] = $request->sensors;
        $feature['control_parking'] = $request->control_parking;
        $feature['auto_temp'] = $request->auto_temp;
        $feature['wireless_co'] = $request->wireless_co;
        $feature['conditioner'] = $request->conditioner;
        $feature['navigator'] = $request->navigator;
        $feature['map'] = $request->map;
        $feature['camera'] = $request->camera;
        $feature['kids_chair'] = $request->kids_chair;
        $feature['spare_tire'] = $request->spare_tire;
        $feature['bluetooth'] = $request->bluetooth;
        $feature['rear_camera'] = $request->rear_camera;
        $feature['usb'] = $request->usb;
        $feature['safety_aribag'] = $request->safety_aribag;
        $feature['gps'] = $request->gps;
        $feature['cars_id'] = $result['id'];
        $feature->save();
       
        if ($result) {
            request()->session()->flash('success', 'Thêm xe thành công.');
        } else {
            request()->session()->flash('error', 'Vui lòng thử lại!');
        }
        return redirect()->route('index');
    }
    //Point to vehicle post update page 
    public function edit($id) {
        $suppliers = User::where("role", "mod")
                ->where('users.id',Auth::user()->id)
                ->get();
        $car = Cars::findOrFail($id);
        $categorys = Categories::all();
        $citys = City::select('city.*'
                      ,'region.id as region_id_city','region.title as region_title','region.status')
                ->leftJoin('region','city.region_id','region.id')
                ->where('region.status','active')
                ->get();
        $region = Region::select('region.id','region.title','region.status')
            ->get();
        $renders = Reders::select('id','manu_name')
            ->orderBy('id','desc')
            ->get();
        $costdate = Costdate::where('cars_id', $id)->first();
        $feature = Features::where('cars_id', $id)->first();
        return view('backend.owner.cars.update')
           ->with('car', $car)
            ->with('suppliers', $suppliers)
            ->with('categorys', $categorys)
            ->with('renders', $renders)
            ->with('citys', $citys)
            ->with('region', $region)
            ->with('costdate', $costdate)
            ->with('feature', $feature);
    }
    //Update car owner's post
    public function update(Request $request, $id) {
        $car = Cars::findOrFail($id);
        $cost_date = CostDate::where('cars_id', $id)->first();
        $feature = Features::where('cars_id', $id)->first();
        $request->validate([
            'name' => 'string|required',
            'seat' => 'required',
            'color' => 'string|required',
            'make' => 'integer|required',
            'power' => 'integer|required',
            'gearbox' => 'integer|required',
            'luggage' => 'integer|required',
            'fuel' => 'string|required',
            'price' => 'integer|required',
            'discount' => 'nullable',
            'service_charge' => 'integer|required',
            'insurance_fees' => 'integer|required',
            'address' => 'string|required',
            'terms_of_use' => 'string|required',
            'rules' => 'string|required',
            'user' => 'integer|required',
            'category' => 'integer|required',
            'render' => 'integer|required',
            'city' => 'integer|required',
            'status' => 'string',
            'range_of_vehicle' => 'string|required',
            'start_date' => 'required|after:yesterday',
            'end_date' => 'required|after:start_date'
        ]);

        $data = $request->all();
        if ($request->status == null) {
            $data['status'] = "inactive";
        } else {
            $data['status'] = "active";
        }
        
        $data['seat'] = (int)$request->seat;
        $data['users_id'] = (int)$request->user;
        $data['categories_id'] = (int)$request->category;
        $data['renders_id'] = (int)$request->render;
        $data['city_id'] = (int)$request->city;
        $photo_name = "";
        if ($request->upload) {
            foreach ($request->upload as $photo) {
                if ($photo) {
                    $file = "https://yotrip.vn/public/backend/uploads/images/cars/".$photo->getClientOriginalName();
                    $filePath = 'public/backend/uploads/images/cars';
                    $photo->move($filePath, $file);
                    $photo_name .= $file . ",";
                }
            }
            $data['photo'] = $photo_name;
        } else {
            $data['photo'] = $car->photo;
        }
        $result = $car->update($data);
        //Bảng giá của xe:
        $cost_date['one_to_three'] = $request->onetothree;
        $cost_date['five_online'] = $request->fiveonline;
        $cost_date['ten_to_fourteen'] = $request->tentofourteen;
        $cost_date['more_fifteen'] = $request->morefifteen;
        $cost_date['price_month'] = $request->pricemonth;
        $cost_date->save();
        // Features of the car has 15 features:
        if($feature) {
            $feature['sensors'] = $request->sensors;
            $feature['control_parking'] = $request->control_parking;
            $feature['auto_temp'] = $request->auto_temp;
            $feature['wireless_co'] = $request->wireless_co;
            $feature['conditioner'] = $request->conditioner;
            $feature['navigator'] = $request->navigator;
            $feature['map'] = $request->map;
            $feature['camera'] = $request->camera;
            $feature['kids_chair'] = $request->kids_chair;
            $feature['spare_tire'] = $request->spare_tire;
            $feature['bluetooth'] = $request->bluetooth;
            $feature['rear_camera'] = $request->rear_camera;
            $feature['usb'] = $request->usb;
            $feature['safety_aribag'] = $request->safety_aribag;
            $feature['gps'] = $request->gps;
            $feature->save();
        } else {
            $feature['sensors'] = $request->sensors;
            $feature['control_parking'] = $request->control_parking;
            $feature['auto_temp'] = $request->auto_temp;
            $feature['wireless_co'] = $request->wireless_co;
            $feature['conditioner'] = $request->conditioner;
            $feature['navigator'] = $request->navigator;
            $feature['map'] = $request->map;
            $feature['camera'] = $request->camera;
            $feature['kids_chair'] = $request->kids_chair;
            $feature['spare_tire'] = $request->spare_tire;
            $feature['bluetooth'] = $request->bluetooth;
            $feature['rear_camera'] = $request->rear_camera;
            $feature['usb'] = $request->usb;
            $feature['safety_aribag'] = $request->safety_aribag;
            $feature['gps'] = $request->gps;
            $res = Cars::select('id')->where('id',$id)->first();
            $feature['cars_id'] = $res->id;
            Features::create($feature);
        }
        if ($result) {
            request()->session()->flash('success', 'Cập nhập bài đăng thành công.');
        } else {
            request()->session()->flash('error', 'Vui lòng thử lại!');
        }
        return redirect()->route('index');
    }
    //Delete from post list
    public function destroy($id) {
        $res = Cars::where('id',$id)->delete();
        $res = Costdate::where('cars_id', $id)->delete();
        $res = Features::where('cars_id', $id)->first();
        if($res) {
            request()->session()->flash('success', 'Đã xóa bài đăng thành công');
        } else {
            request()->session()->flash('error', 'Vui lòng thử lại');
        }
        return redirect()->route('index');
    }
}