<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\Categories;
use App\Models\Costdate;
use App\Models\Features;
use App\Models\Region;
use App\Models\City;
use App\Models\Reders;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Cars::where('status','active')
                    ->orderBy('id','ASC')
                    ->get();
        
        return view('backend.admin.dasbroad.main-content')->with('cars', $cars);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $categorys = Categories::all();
        $suppliers = User::where("role", "mod")->get();
        $renders = Reders::all();
        $citys = City::select('city.*'
                      ,'region.id as region_id_city','region.title as region_title','region.status')
                ->leftJoin('region','city.region_id','region.id')
                ->where('region.status','active')
                ->get();
        $cars = Cars::all();
        return view('backend.admin.car.create')
            ->with('suppliers', $suppliers)
            ->with('categorys', $categorys)
            ->with('renders', $renders)
            ->with('cars', $cars)
            ->with('citys', $citys);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            return redirect()->route('main-content.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $suppliers = User::where("role", "mod")->get();
        $car = Cars::findOrFail($id);
        $categorys = Categories::all();
        $citys = City::select('city.*'
                      ,'region.id as region_id_city','region.title as region_title','region.status')
                ->leftJoin('region','city.region_id','region.id')
                ->where('region.status','active')
                ->get();
        $renders = Reders::all();
        $costdate = Costdate::where('cars_id', $id)->first();
        $feature = Features::where('cars_id', $id)->first();
        return view('backend.admin.car.edit')
            ->with('car', $car)
            ->with('suppliers', $suppliers)
            ->with('categorys', $categorys)
            ->with('renders', $renders)
            ->with('citys', $citys)
            ->with('costdate', $costdate)
            ->with('feature', $feature);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
            return redirect()->route('main-content.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $response = Http::post('https://yotrip.vn/api/delete_car/' . $id);
        return redirect()->route('main-content.index');
        // if ($response->status() == "200") {
        //     return redirect()->route('main-content.index');
        // }
    }
    public function api_store(Request $request)
    {
        $request->validate([
            'name' => 'string|required',
            'photo' => 'required',
            'seat' => 'required',
            'color' => 'string|required',
            'make' => 'string|required',
            'price' => 'integer|required',
            'city' => 'string|required',
            'insurance' => 'string|required',
            'rules' => 'string|required',
            'user_id' => 'integer|required',
            'cat_id' => 'integer|required',
            'red_id' => 'integer|required',
            'locat_id' => 'integer|required',
            'sensors' => 'string|nullable',
            'control_parking' => 'string|nullable',
            'auto_temp' => 'string|nullable',
            'wireless_co' => 'string|nullable',
            'conditioner' => 'string|nullable',
            'navigator' => 'string|nullable',
            'start_date' => 'string|nullable',
            'end_date' => 'string|nullable',
            'start_time' => 'string|nullable',
            'end_time' => 'string|nullable',
            'status' => 'string',
            'book_status' => 'string|required',
            'onetothree' => 'integer|required',
            'fiveonline' => 'integer|required',
            'tentofourteen' => 'integer|required',
            'morefifteen' => 'integer|required',
            
        ]);
        $data = $request->all();
        $photo_name = "";
        foreach ($request->photo as $photo) {
            if ($photo) {
                $file = $photo->getClientOriginalExtension();
                if ($file == "png" || $file == "jpeg" || $file == "jpg") {
                    $file = $photo->getClientOriginalName();
                    $filePath =  'public/backend/uploads/images/cars';
                    $photo->move($filePath, $file);
                    $photo_name .= $file . "/";
                } else {
                    return response()->json(404, 'Upload Faild , only upload .png,.jpg,jpeg ');
                }
            }
        }

        $data['photo'] = $photo_name;
        $result = Cars::create($data);
        $costdate = new Costdate();
        $costdate['onetothree'] = $request->onetothree;
        $costdate['fiveonline'] = $request->fiveonline;
        $costdate['tentofourteen'] = $request->tentofourteen;
        $costdate['morefifteen'] = $request->morefifteen;
        $costdate['car_id'] = $result['id'];
        if ($result) {
            return response()->json($data, 201);
        }
    }
    public function api_show()
    {
        $cars = Cars::all();
        return response()->json($cars, 200);
    }
    public function api_getId($id)
    {
        $cars = Cars::findOrFail($id);
        return response()->json($cars, 200);
    }
    public function api_delete($id)
    {
        try {
            $cars = Cars::findOrFail($id);
            $costdate = Costdate::where('cars_id', $id)->first();
            $feature = Features::where('cars_id', $id)->first();
        } catch (\Throwable $th) {
            return response()->json("Id Not Found", 404);
        }
        $cars->delete();
        $costdate->delete();
        $feature->delete();
        return response()->json("Delete Success", 200);
    }
    public function api_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'string|required',
            'photo' => 'required',
            'seat' => 'required',
            'color' => 'string|required',
            'make' => 'string|required',
            'price' => 'integer|required',
            'city' => 'string|required',
            'insurance' => 'string|required',
            'rules' => 'string|required',
            'user_id' => 'integer|required',
            'cat_id' => 'integer|required',
            'red_id' => 'integer|required',
            'locat_id' => 'integer|required',
            'sensors' => 'string|nullable',
            'control_parking' => 'string|nullable',
            'auto_temp' => 'string|nullable',
            'wireless_co' => 'string|nullable',
            'conditioner' => 'string|nullable',
            'navigator' => 'string|nullable',
            'start_date' => 'string|nullable',
            'end_date' => 'string|nullable',
            'start_time' => 'string|nullable',
            'end_time' => 'string|nullable',
            'status' => 'string|required',
            'book_status' => 'string|required',
            'onetothree' => 'integer|required',
            'fiveonline' => 'integer|required',
            'tentofourteen' => 'integer|required',
            'morefifteen' => 'integer|required',
            'car_id' => 'integer|require',
        ]);
        $data = $request->all();
        $photo_name = "";
        foreach ($request->photo as $photo) {
            if ($photo) {
                $file = $photo->getClientOriginalExtension();
                if ($file == "png" || $file == "jpeg" || $file == "jpg") {
                    $file = $photo->getClientOriginalName();
                    $filePath = 'public/backend/uploads/images/cars';
                    $photo->move($filePath, $file);
                    $photo_name .= $file . "/";
                } else {
                    return response()->json(404, 'Upload Faild , only upload .png,.jpg,jpeg ');
                }
            }
        }

        $data['photo'] = $photo_name;
        $comment = Cars::findOrFail($id);
        $costdate = Cars::where('car_id', $id);
        if (!empty($comment)) {
            $comment->update($data);
            $costdate['onetothree'] = $request->onetothree;
            $costdate['fiveonline'] = $request->fiveonline;
            $costdate['tentofourteen'] = $request->tentofourteen;
            $costdate['morefifteen'] = $request->morefifteen;
            $costdate->save();
            //200 OK(The request has successed)
            return response()->json($comment, 200);
        }
    }

    public function api_sortLocationCar()
    {
    }
}