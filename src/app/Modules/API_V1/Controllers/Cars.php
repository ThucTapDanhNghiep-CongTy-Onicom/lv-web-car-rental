<?php

namespace App\Modules\API_V1\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Modules\API_V1\Models\Cars_Model;
use App\Modules\API_V1\Models\Location_Model;
use App\Modules\API_V1\Models\Review_Model;
use App\Modules\API_V1\Models\Renders_Model;
use App\Modules\API_V1\Models\Bookings_Model;
use App\Modules\API_V1\Models\Whishlists_Model;
use App\Modules\API_V1\Models\Costs_Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class Cars extends Controller {
  
    //List of discount cars.
    public function discount(Request $request) {
        if($request->quantily != null) {
            $data = Cars_Model::select('cars.id','cars.name','cars.seat',
                'cars.photo','cars.price','cars.discount')
                ->where('cars.discount', '>', 0)
                ->limit($request->quantily)
                ->orderBy('cars.id','desc')
                ->get();
        } else {
            $data = Cars_Model::select('cars.id','cars.name','cars.seat',
                'cars.photo','cars.price','cars.discount')
                ->orderBy('cars.id','desc')
                ->paginate(10);
        }
        $for = array();
        foreach($data as $val) {
            $review = new Reviews();
            $rate = $review->average($val->id);
            array_push($for, [
                'id'     => $val->id,
                'name' => $val->name,
                'photo' => $val->photo,
                'seat' => $val->seat,
                'price' => $val->price,
                'rate'   => $rate->original,
                'discount' => $val->discount
            ]);
        }
       
        return response()->json([
            'status' => true,
            'message' => 'Successfully',
            'data' => $for,
        ]);
    }
    //Counting car bookings
    public function count_booking($id) {
        $result = Bookings_Model::where('status' , 'active')->where('cars_id' ,$id)->count();
        return response()->json(
           $result,
        );
    }
    //Search for cars by car brand
    public function brand(Request $request) {
        if($request->by_brand != null) {
            $data = Renders_Model::select('id','manu_name','photo','feature')
                ->where('renders.manu_name','like','%'.$request->by_brand.'%')
                ->get();
        } else {
            $data = Renders_Model::select('id','manu_name','photo','feature')
                                ->orderBy('id','DESC')
                                ->get();
        }
        return response()->json([
            'status' => true,
            'message' => 'Successfully',
            'data' => $data,
        ]);
    }
    /*Filter seat, car company, region and 
      sort price increasing, decreasing, latest */
    public function filter(Request $request) {
        $validator = Validator::make(
            $request->all(),
            [
                "render" => "nullable",
                "seat" => "nullable",
                "location" => "nullable",
                "sortby" => "nullable",
                "service" => "nullable",
                "start" => "nullable",
                "end" => "nullable",
                "district" => "nullable",
                "province" => "nullable",
                "day_start" => "nullable",
                "day_end" => "nullable",
                "time_start" => "nullable",
                "time_end" => "nullable",
            ],
        );
        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "error" => $validator->errors()
            ]);
        }
        //------------------ TODO:Filter costs with 4 param all cases ---------------------//
        /*search 1 type*/
        $data = array();
        if($request->render != null) {
            $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->where('renders_id', '=', $request->render)
                    ->paginate(10);
        }
        if($request->seat != null) {
            $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('seat', '=', $request->seat)
                ->paginate(10);
        }
        if($request->location != null) {
            $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('city.region_id', '=', $request->location)
                ->paginate(10);
        }
        if($request->sortby != null) {
            if($request->sortby == '1') {
                $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->orderBy('cars.price', 'ASC')
                    ->paginate(10);
            } elseif($request->sortby == '2') {
                $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->orderBy('cars.price', 'DESC')
                    ->paginate(10);
            } elseif($request->sortby == '3') {
                $data = Cars_Model::select('cars.id','cars.name',
                        'cars.photo','cars.seat','cars.price',
                        'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->orderBy('cars.id', 'DESC')
                    ->paginate(10);
            } elseif($request->sortby == '4') {
                $data = Cars_Model::select('cars.id','cars.name',
                        'cars.photo','cars.seat','cars.price',
                        'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->join('bookings','bookings.cars_id','cars.id')
                    ->orderBy('cars.id', 'DESC')
                    ->distinct()
                    ->paginate(10);
            }
        }
        if($request->service != null) {
            $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('cars.range_of_vehicle', '=', $request->service)
                ->paginate(10);
        }
        /*search 2 type*/
        if($request->render != null && $request->seat != null) {
            $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->where('cars.renders_id', '=', $request->render)
                    ->where('seat', '=', $request->seat)
                    ->paginate(10);
        }
        if($request->render != null && $request->location != null) {
            $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('cars.renders_id', '=', $request->render)
                ->where('city.region_id', '=', $request->location)
                ->paginate(10);
        }
        if($request->render != null && $request->service != null) {
            $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('cars.range_of_vehicle', '=', $request->service)
                ->where('cars.renders_id', '=', $request->render)
                ->paginate(10);
        }
        if($request->render != null && $request->sortby != null) {
            if($request->sortby == '1') {
                $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('cars.renders_id', '=', $request->render)
                ->orderBy('cars.price', 'ASC')
                ->paginate(10);
            } elseif($request->sortby == '2') {
                $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('cars.renders_id', '=', $request->render)
                ->orderBy('cars.price', 'DESC')
                ->paginate(10);
            } elseif($request->sortby == '3') {
                $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('cars.renders_id', '=', $request->render)
                ->orderBy('cars.id', 'DESC')
                ->paginate(10);
            } elseif($request->sortby == '4') {
                $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->join('bookings','bookings.cars_id','cars.id')
                ->where('cars.renders_id', '=', $request->render)
                ->orderBy('cars.id', 'DESC')
                ->distinct()
                ->paginate(10);
            }
        }
        if($request->seat != null && $request->location != null) {
            $data = Cars_Model::select('cars.id','cars.name',
            'cars.photo','cars.seat','cars.price',
            'cars.renders_id','city.region_id','cars.range_of_vehicle')
            ->leftJoin('city','cars.city_id','city.id')
            ->where('seat', '=', $request->seat)
            ->where('city.region_id', '=', $request->location)
            ->paginate(10);
        }
        if($request->seat != null && $request->service != null) {
            $data = Cars_Model::select('cars.id','cars.name',
            'cars.photo','cars.seat','cars.price',
            'cars.renders_id','city.region_id','cars.range_of_vehicle')
            ->leftJoin('city','cars.city_id','city.id')
            ->where('cars.seat', '=', $request->seat)
            ->where('cars.range_of_vehicle', '=', $request->service)
            ->paginate(10);
        }
        if($request->seat != null && $request->sortby != null) {
            if($request->sortby == '1') {
                $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('cars.seat', '=', $request->seat)
                ->orderBy('cars.price', 'ASC')
                ->paginate(10);
            } elseif($request->sortby == '2') {
                $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('cars.seat', '=', $request->seat)
                ->orderBy('cars.price', 'DESC')
                ->paginate(10);
            } elseif($request->sortby == '3') {
                $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('cars.seat', '=', $request->seat)
                ->orderBy('cars.id', 'DESC')
                ->paginate(10);
            } elseif($request->sortby == '4') {
                $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->join('bookings','bookings.cars_id','cars.id')
                ->where('cars.seat', '=', $request->seat)
                ->orderBy('cars.id', 'DESC')
                ->distinct()
                ->paginate(10);
            }
        }
        if($request->location != null && $request->sortby != null) {
            if($request->sortby == '1') {
                $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('city.region_id', '=', $request->location)
                ->orderBy('cars.price', 'ASC')
                ->paginate(10);
            } elseif($request->sortby == '2') {
                $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('city.region_id', '=', $request->location)
                ->orderBy('cars.price', 'DESC')
                ->paginate(10);
            } elseif($request->sortby == '3') {
                $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('city.region_id', '=', $request->location)
                ->orderBy('cars.id', 'DESC')
                ->paginate(10);
            } elseif($request->sortby == '4') {
                $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->join('bookings','bookings.cars_id','cars.id')
                ->where('city.region_id', '=', $request->location)
                ->orderBy('cars.id', 'DESC')
                ->distinct()
                ->paginate(10);
            }

        }
        if($request->service != null && $request->sortby != null) {
            if($request->sortby == '1') {
                $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('cars.range_of_vehicle', '=', $request->service)
                ->orderBy('cars.price', 'ASC')
                ->paginate(10);
            } elseif($request->sortby == '2') {
                $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('cars.range_of_vehicle', '=', $request->service)
                ->orderBy('cars.price', 'DESC')
                ->paginate(10);
            } elseif($request->sortby == '3') {
                $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('cars.range_of_vehicle', '=', $request->service)
                ->orderBy('cars.id', 'DESC')
                ->paginate(10);
            } elseif($request->sortby == '4') {
                $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->join('bookings','bookings.cars_id','cars.id')
                ->where('cars.range_of_vehicle', '=', $request->service)
                ->orderBy('cars.id', 'DESC')
                ->distinct()
                ->paginate(10);
            }

        }
        /*search 3 type*/
        if($request->render != null && $request->seat != null && $request->location != null) {
            $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('cars.renders_id', '=', $request->render)
                ->where('cars.seat', '=', $request->seat)
                ->where('city.region_id', '=', $request->location)
                ->paginate(10);
            
        }
        if($request->render != null && $request->seat != null && $request->service != null) {
            $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('cars.renders_id', '=', $request->render)
                ->where('cars.seat', '=', $request->seat)
                ->where('cars.range_of_vehicle', '=', $request->service)
                ->paginate(10);
        }
        if($request->render != null && $request->location != null && $request->sortby != null) {
            if($request->sortby == '1') {
                $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('cars.renders_id', '=', $request->render)
                ->where('city.region_id', '=', $request->location)
                ->orderBy('cars.price', 'ASC')
                ->paginate(10);
            } elseif($request->sortby == '2') {
                $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('cars.renders_id', '=', $request->render)
                ->where('city.region_id', '=', $request->location)
                ->orderBy('cars.price', 'DESC')
                ->paginate(10);
            } elseif($request->sortby == '3') {
                $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('cars.renders_id', '=', $request->render)
                ->where('city.region_id', '=', $request->location)
                ->orderBy('cars.id', 'DESC')
                ->paginate(10);
            } elseif($request->sortby == '4') {
                $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->join('bookings','bookings.cars_id','cars.id')
                ->where('cars.renders_id', '=', $request->render)
                ->where('city.region_id', '=', $request->location)
                ->orderBy('cars.id', 'DESC')
                ->distinct()
                ->paginate(10);
            }

        }
        if($request->render != null && $request->service != null && $request->sortby != null) {
            if($request->sortby == '1') {
                $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('cars.renders_id', '=', $request->render)
                ->where('cars.range_of_vehicle', '=', $request->service)
                ->orderBy('cars.price', 'ASC')
                ->paginate(10);
            } elseif($request->sortby == '2') {
                $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('cars.renders_id', '=', $request->render)
                ->where('cars.range_of_vehicle', '=', $request->service)
                ->orderBy('cars.price', 'DESC')
                ->paginate(10);
            } elseif($request->sortby == '3') {
                $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('cars.renders_id', '=', $request->render)
                ->where('cars.range_of_vehicle', '=', $request->service)
                ->orderBy('cars.id', 'DESC')
                ->paginate(10);
            } elseif($request->sortby == '4') {
                $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->join('bookings','bookings.cars_id','cars.id')
                ->where('cars.renders_id', '=', $request->render)
                ->where('cars.range_of_vehicle', '=', $request->service)
                ->orderBy('cars.id', 'DESC')
                ->distinct()
                ->paginate(10);
            }

        }
        if($request->render != null && $request->seat != null && $request->sortby != null) {
            if($request->sortby == '1') {
                $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('cars.renders_id', '=', $request->render)
                ->where('cars.seat', '=', $request->seat)
                ->orderBy('cars.price', 'ASC')
                ->paginate(10);
            } elseif($request->sortby == '2') {
                $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('cars.renders_id', '=', $request->render)
                ->where('cars.seat', '=', $request->seat)
                ->orderBy('cars.price', 'DESC')
                ->paginate(10);
            } elseif($request->sortby == '3') {
                $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('cars.renders_id', '=', $request->render)
                ->where('cars.seat', '=', $request->seat)
                ->orderBy('cars.id', 'DESC')
                ->paginate(10);
            } elseif($request->sortby == '4') {
                $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->join('bookings','bookings.cars_id','cars.id')
                ->where('cars.renders_id', '=', $request->render)
                ->where('cars.seat', '=', $request->seat)
                ->orderBy('cars.id', 'DESC')
                ->distinct()
                ->paginate(10);
            }
        }
        if($request->location != null && $request->seat != null && $request->sortby  != null) {
            if($request->sortby == '1') {
                $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('cars.renders_id', '=', $request->render)
                ->where('cars.seat', '=', $request->seat)
                ->orderBy('cars.price', 'ASC')
                ->paginate(10);
            } elseif($request->sortby == '2') {
                $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('city.region_id', '=', $request->location)
                ->where('cars.seat', '=', $request->seat)
                ->orderBy('cars.price', 'DESC')
                ->paginate(10);
            } elseif($request->sortby == '3') {
                $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('city.region_id', '=', $request->location)
                ->where('cars.seat', '=', $request->seat)
                ->orderBy('cars.id', 'DESC')
                ->paginate(10);
            } elseif($request->sortby == '4') {
                $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->join('bookings','bookings.cars_id','cars.id')
                ->where('city.region_id', '=', $request->location)
                ->where('cars.seat', '=', $request->seat)
                ->orderBy('cars.id', 'DESC')
                ->distinct()
                ->paginate(10);
            }
        }
        if($request->location != null && $request->service != null && $request->sortby != null) {
            if($request->sortby == '1') {
                $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('city.region_id', '=', $request->location)
                ->where('cars.range_of_vehicle', '=', $request->service)
                ->orderBy('cars.price', 'ASC')
                ->paginate(10);
            } elseif($request->sortby == '2') {
                $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('city.region_id', '=', $request->location)
                ->where('cars.range_of_vehicle', '=', $request->service)
                ->orderBy('cars.price', 'DESC')
                ->paginate(10);
            } elseif($request->sortby == '3') {
                $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('city.region_id', '=', $request->location)
                ->where('cars.range_of_vehicle', '=', $request->service)
                ->orderBy('cars.id', 'DESC')
                ->paginate(10);
            } elseif($request->sortby == '4') {
                $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->join('bookings','bookings.cars_id','cars.id')
                ->where('city.region_id', '=', $request->location)
                ->where('cars.range_of_vehicle', '=', $request->service)
                ->orderBy('cars.id', 'DESC')
                ->distinct()
                ->paginate(10);
            }
        }
        
        if($request->render != null && $request->location != null 
                && $request->seat != null && $request->sortby != null && $request->service != null) {
                    if($request->sortby == '1') {
                        $data = Cars_Model::select('cars.id','cars.name',
                        'cars.photo','cars.seat','cars.price',
                        'cars.renders_id','city.region_id','cars.range_of_vehicle')
                        ->leftJoin('city','cars.city_id','city.id')
                        ->where('city.region_id', '=', $request->location)
                        ->where('cars.range_of_vehicle', '=', $request->service)
                        ->where('cars.renders_id', '=', $request->render)
                        ->where('cars.seat', '=', $request->seat)
                        ->orderBy('cars.price', 'ASC')
                        ->paginate(10);
                    } elseif($request->sortby == '2') {
                        $data = Cars_Model::select('cars.id','cars.name',
                        'cars.photo','cars.seat','cars.price',
                        'cars.renders_id','city.region_id','cars.range_of_vehicle')
                        ->leftJoin('city','cars.city_id','city.id')
                        ->where('city.region_id', '=', $request->location)
                        ->where('cars.range_of_vehicle', '=', $request->service)
                        ->where('cars.renders_id', '=', $request->render)
                        ->where('cars.seat', '=', $request->seat)
                        ->orderBy('cars.price', 'DESC')
                        ->paginate(10);
                    } elseif($request->sortby == '3') {
                        $data = Cars_Model::select('cars.id','cars.name',
                        'cars.photo','cars.seat','cars.price',
                        'cars.renders_id','city.region_id','cars.range_of_vehicle')
                        ->leftJoin('city','cars.city_id','city.id')
                        ->where('city.region_id', '=', $request->location)
                        ->where('cars.range_of_vehicle', '=', $request->service)
                        ->where('cars.renders_id', '=', $request->render)
                        ->where('cars.seat', '=', $request->seat)
                        ->orderBy('cars.id', 'DESC')
                        ->paginate(10);
                    } elseif($request->sortby == '4') {
                        $data = Cars_Model::select('cars.id','cars.name',
                        'cars.photo','cars.seat','cars.price',
                        'cars.renders_id','city.region_id','cars.range_of_vehicle')
                        ->leftJoin('city','cars.city_id','city.id')
                        ->join('bookings','bookings.cars_id','cars.id')
                        ->where('city.region_id', '=', $request->location)
                        ->where('cars.range_of_vehicle', '=', $request->service)
                        ->orderBy('cars.id', 'DESC')
                        ->distinct()
                        ->paginate(10);
                    }
        } elseif ($request->render == null && $request->location == null 
            && $request->seat == null && $request->price == null && $request->service == null) {
            $data = Cars_Model::select('cars.id','cars.name','cars.photo','cars.seat','cars.price')
                ->paginate(10);
        }
        //------------------ TODO:Filter costs with all cases ---------------------//
        //Type 1: filter by cost
        if($request->start != null && $request->end != null ) {
            $start = $request->start;
            $end = $request->end;
            $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('cars.price', '>=', $start)
                ->where('cars.price', '<=', $end)
                ->paginate(10);
        }
        //Type 2: filter by cost by car brand, by seat, by region, by price and by vehicle type
        if($request->render != null && $request->start != null && $request->end != null) {
            $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('cars.renders_id', '=', $request->render)
                ->where('cars.price', '>=', $request->start)
                ->where('cars.price', '<=', $request->end)
                ->paginate(10);
        }
        if($request->seat != null && $request->start != null && $request->end != null) {
            $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('cars.seat', '=', $request->seat)
                ->where('cars.price', '>=', $request->start)
                ->where('cars.price', '<=', $request->end)
                ->paginate(10);
        }
        if($request->location != null && $request->start != null && $request->end != null) {
            $data = Cars_Model::select('cars.id','cars.name',
            'cars.photo','cars.seat','cars.price',
            'cars.renders_id','city.region_id','cars.range_of_vehicle')
            ->leftJoin('city','cars.city_id','city.id')
                ->where('city.region_id', '=', $request->location)
                ->where('cars.price', '>=', $request->start)
                ->where('cars.price', '<=', $request->end)
                ->paginate(10);
        }
        if($request->service != null && $request->start != null && $request->end != null) {
            $data = Cars_Model::select('cars.id','cars.name',
            'cars.photo','cars.seat','cars.price',
            'cars.renders_id','city.region_id','cars.range_of_vehicle')
            ->leftJoin('city','cars.city_id','city.id')
                ->where('cars.range_of_vehicle', '=', $request->service)
                ->where('cars.price', '>=', $request->start)
                ->where('cars.price', '<=', $request->end)
                ->paginate(10);
        }
        if($request->sortby != null && $request->start != null && $request->end != null) {
            if($request->sortby == '1') {
                $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('cars.price', '>=', $request->start)
                ->where('cars.price', '<=', $request->end)
                ->orderBy('cars.price', 'ASC')
                ->paginate(10);
            } elseif($request->sortby == '2') {
                $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('cars.price', '>=', $request->start)
                ->where('cars.price', '<=', $request->end)
                ->orderBy('cars.price', 'DESC')
                ->paginate(10);
            } elseif($request->sortby == '3') {
                $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('cars.price', '>=', $request->start)
                ->where('cars.price', '<=', $request->end)
                ->orderBy('cars.id', 'DESC')
                ->paginate(10);
            } elseif($request->sortby == '4') {
                $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->join('bookings','bookings.cars_id','cars.id')
                ->where('cars.price', '>=', $request->start)
                ->where('cars.price', '<=', $request->end)
                ->orderBy('cars.id', 'DESC')
                ->distinct()
                ->paginate(10);
            }
        }
        //Type 3: Filter with 3 parameters note the default cost filter is always (start and end)
        if($request->render != null && $request->seat != null 
            && $request->start != null && $request->end != null) {
             $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('cars.renders_id', '=', $request->render)
                ->where('cars.seat', '=', $request->seat)
                ->where('cars.price', '>=', $request->start)
                ->where('cars.price', '<=', $request->end)
                ->paginate(10);
        }
        if($request->render != null && $request->location != null 
            && $request->start != null && $request->end != null) {
            $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('cars.renders_id', '=', $request->render)
                ->where('city.region_id', '=', $request->location)
                ->where('cars.price', '>=', $request->start)
                ->where('cars.price', '<=', $request->end)
                ->paginate(10);
        }
        if($request->render != null && $request->service != null 
            && $request->start != null && $request->end != null) {
            $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('cars.renders_id', '=', $request->render)
                ->where('cars.range_of_vehicle', '=', $request->service)
                ->where('cars.price', '>=', $request->start)
                ->where('cars.price', '<=', $request->end)
                ->paginate(10);
        }
        if($request->render != null && $request->sortby != null 
            && $request->start != null && $request->end != null) {
                if($request->sortby == '1') {
                    $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->where('cars.renders_id', '=', $request->render)
                    ->where('cars.price', '>=', $request->start)
                    ->where('cars.price', '<=', $request->end)
                    ->orderBy('cars.price', 'ASC')
                    ->paginate(10);
                } elseif($request->sortby == '2') {
                    $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->where('cars.renders_id', '=', $request->render)
                    ->where('cars.price', '>=', $request->start)
                    ->where('cars.price', '<=', $request->end)
                    ->orderBy('cars.price', 'DESC')
                    ->paginate(10);
                } elseif($request->sortby == '3') {
                    $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->where('cars.renders_id', '=', $request->render)
                    ->where('cars.price', '>=', $request->start)
                    ->where('cars.price', '<=', $request->end)
                    ->orderBy('cars.id', 'DESC')
                    ->paginate(10);
                } elseif($request->sortby == '4') {
                    $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->join('bookings','bookings.cars_id','cars.id')
                    ->where('cars.renders_id', '=', $request->render)
                    ->where('cars.price', '>=', $request->start)
                    ->where('cars.price', '<=', $request->end)
                    ->orderBy('cars.id', 'DESC')
                    ->distinct()
                    ->paginate(10);
                }
        }
        if($request->seat != null && $request->location != null 
            && $request->start != null && $request->end != null) {
             $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('cars.seat', '=', $request->seat)
                ->where('city.region_id', '=', $request->location)
                ->where('cars.price', '>=', $request->start)
                ->where('cars.price', '<=', $request->end)
                ->paginate(10);
        }
        if($request->seat != null && $request->service != null 
            && $request->start != null && $request->end != null) {
             $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('cars.seat', '=', $request->seat)
                ->where('cars.range_of_vehicle', '=', $request->service)
                ->where('cars.price', '>=', $request->start)
                ->where('cars.price', '<=', $request->end)
                ->paginate(10);
        }
        if($request->seat != null && $request->sortby != null 
            && $request->start != null && $request->end != null) {
                if($request->sortby == '1') {
                    $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->where('cars.seat', '=', $request->seat)
                    ->where('cars.price', '>=', $request->start)
                    ->where('cars.price', '<=', $request->end)
                    ->orderBy('cars.price', 'ASC')
                    ->paginate(10);
                } elseif($request->sortby == '2') {
                    $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->where('cars.seat', '=', $request->seat)
                    ->where('cars.price', '>=', $request->start)
                    ->where('cars.price', '<=', $request->end)
                    ->orderBy('cars.price', 'DESC')
                    ->paginate(10);
                } elseif($request->sortby == '3') {
                    $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->where('cars.seat', '=', $request->seat)
                    ->where('cars.price', '>=', $request->start)
                    ->where('cars.price', '<=', $request->end)
                    ->orderBy('cars.id', 'DESC')
                    ->paginate(10);
                } elseif($request->sortby == '4') {
                    $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->join('bookings','bookings.cars_id','cars.id')
                    ->where('cars.seat', '=', $request->seat)
                    ->where('cars.price', '>=', $request->start)
                    ->where('cars.price', '<=', $request->end)
                    ->orderBy('cars.id', 'DESC')
                    ->distinct()
                    ->paginate(10);
                }
        }
        if($request->location != null && $request->service != null 
            && $request->start != null && $request->end != null) {
            $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('city.region_id', '=', $request->location)
                ->where('cars.range_of_vehicle', '=', $request->service)
                ->where('cars.price', '>=', $request->start)
                ->where('cars.price', '<=', $request->end)
                ->paginate(10);
        }
        if($request->location != null && $request->sortby != null 
            && $request->start != null && $request->end != null) {
                if($request->sortby == '1') {
                    $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->where('city.region_id', '=', $request->location)
                    ->where('cars.price', '>=', $request->start)
                    ->where('cars.price', '<=', $request->end)
                    ->orderBy('cars.price', 'ASC')
                    ->paginate(10);
                } elseif($request->sortby == '2') {
                    $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->where('city.region_id', '=', $request->location)
                    ->where('cars.price', '>=', $request->start)
                    ->where('cars.price', '<=', $request->end)
                    ->orderBy('cars.price', 'DESC')
                    ->paginate(10);
                } elseif($request->sortby == '3') {
                    $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->where('city.region_id', '=', $request->location)
                    ->where('cars.price', '>=', $request->start)
                    ->where('cars.price', '<=', $request->end)
                    ->orderBy('cars.id', 'DESC')
                    ->paginate(10);
                } elseif($request->sortby == '4') {
                    $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->join('bookings','bookings.cars_id','cars.id')
                    ->where('city.region_id', '=', $request->location)
                    ->where('cars.price', '>=', $request->start)
                    ->where('cars.price', '<=', $request->end)
                    ->orderBy('cars.id', 'DESC')
                    ->distinct()
                    ->paginate(10);
                }
        }
        if($request->service != null && $request->sortby != null 
            && $request->start != null && $request->end != null) {
                if($request->sortby == '1') {
                    $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->where('cars.range_of_vehicle', '=', $request->service)
                    ->where('cars.price', '>=', $request->start)
                    ->where('cars.price', '<=', $request->end)
                    ->orderBy('cars.price', 'ASC')
                    ->paginate(10);
                } elseif($request->sortby == '2') {
                    $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->where('cars.range_of_vehicle', '=', $request->service)
                    ->where('cars.price', '>=', $request->start)
                    ->where('cars.price', '<=', $request->end)
                    ->orderBy('cars.price', 'DESC')
                    ->paginate(10);
                } elseif($request->sortby == '3') {
                    $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->where('cars.range_of_vehicle', '=', $request->service)
                    ->where('cars.price', '>=', $request->start)
                    ->where('cars.price', '<=', $request->end)
                    ->orderBy('cars.id', 'DESC')
                    ->paginate(10);
                } elseif($request->sortby == '4') {
                    $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->join('bookings','bookings.cars_id','cars.id')
                    ->where('cars.range_of_vehicle', '=', $request->service)
                    ->where('cars.price', '>=', $request->start)
                    ->where('cars.price', '<=', $request->end)
                    ->orderBy('cars.id', 'DESC')
                    ->distinct()
                    ->paginate(10);
                }
        }
        //Type 4: Filter 4 cases:
        if($request->render != null && $request->seat != null && $request->location != null
            && $request->start != null && $request->end != null) {
            $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->where('cars.renders_id', '=', $request->render)
                    ->where('cars.seat', '=', $request->seat)
                    ->where('city.region_id', '=', $request->location)
                    ->where('cars.price', '>=', $request->start)
                    ->where('cars.price', '<=', $request->end)
                    ->paginate(10);
        }
        if($request->render != null && $request->seat != null && $request->service != null
            && $request->start != null && $request->end != null) {
            $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->where('cars.renders_id', '=', $request->render)
                    ->where('cars.seat', '=', $request->seat)
                    ->where('cars.range_of_vehicle', '=', $request->service)
                    ->where('cars.price', '>=', $request->start)
                    ->where('cars.price', '<=', $request->end)
                    ->paginate(10);
        }
        if($request->render != null && $request->seat != null && $request->sortby != null
            && $request->start != null && $request->end != null) {
                if($request->sortby == '1') {
                    $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->where('cars.renders_id', '=', $request->render)
                    ->where('cars.seat', '=', $request->seat)
                    ->where('cars.price', '>=', $request->start)
                    ->where('cars.price', '<=', $request->end)
                    ->orderBy('cars.price', 'ASC')
                    ->paginate(10);
                } elseif($request->sortby == '2') {
                    $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->where('cars.renders_id', '=', $request->render)
                    ->where('cars.seat', '=', $request->seat)
                    ->where('cars.price', '>=', $request->start)
                    ->where('cars.price', '<=', $request->end)
                    ->orderBy('cars.price', 'DESC')
                    ->paginate(10);
                } elseif($request->sortby == '3') {
                    $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->where('cars.renders_id', '=', $request->render)
                    ->where('cars.seat', '=', $request->seat)
                    ->where('cars.price', '>=', $request->start)
                    ->where('cars.price', '<=', $request->end)
                    ->orderBy('cars.id', 'DESC')
                    ->paginate(10);
                } elseif($request->sortby == '4') {
                    $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->join('bookings','bookings.cars_id','cars.id')
                    ->where('cars.renders_id', '=', $request->render)
                    ->where('cars.seat', '=', $request->seat)
                    ->where('cars.price', '>=', $request->start)
                    ->where('cars.price', '<=', $request->end)
                    ->orderBy('cars.id', 'DESC')
                    ->distinct()
                    ->paginate(10);
                }
        }
        if($request->location != null && $request->seat != null && $request->service != null
            && $request->start != null && $request->end != null) {
            $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->where('cars.range_of_vehicle', '=', $request->service)
                    ->where('cars.seat', '=', $request->seat)
                    ->where('city.region_id', '=', $request->location)
                    ->where('cars.price', '>=', $request->start)
                    ->where('cars.price', '<=', $request->end)
                    ->paginate(10);
        }
        if($request->location != null && $request->seat != null && $request->sortby != null
            && $request->start != null && $request->end != null) {
                if($request->sortby == '1') {
                    $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->where('city.region_id', '=', $request->location)
                    ->where('cars.seat', '=', $request->seat)
                    ->where('cars.price', '>=', $request->start)
                    ->where('cars.price', '<=', $request->end)
                    ->orderBy('cars.price', 'ASC')
                    ->paginate(10);
                } elseif($request->sortby == '2') {
                    $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->where('city.region_id', '=', $request->location)
                    ->where('cars.seat', '=', $request->seat)
                    ->where('cars.price', '>=', $request->start)
                    ->where('cars.price', '<=', $request->end)
                    ->orderBy('cars.price', 'DESC')
                    ->paginate(10);
                } elseif($request->sortby == '3') {
                    $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                     ->where('city.region_id', '=', $request->location)
                    ->where('cars.seat', '=', $request->seat)
                    ->where('cars.price', '>=', $request->start)
                    ->where('cars.price', '<=', $request->end)
                    ->orderBy('cars.id', 'DESC')
                    ->paginate(10);
                } elseif($request->sortby == '4') {
                    $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->join('bookings','bookings.cars_id','cars.id')
                     ->where('city.region_id', '=', $request->location)
                    ->where('cars.seat', '=', $request->seat)
                    ->where('cars.price', '>=', $request->start)
                    ->where('cars.price', '<=', $request->end)
                    ->orderBy('cars.id', 'DESC')
                    ->distinct()
                    ->paginate(10);
                }
        }
        if($request->service != null && $request->seat != null && $request->sortby != null
            && $request->start != null && $request->end != null) {
                if($request->sortby == '1') {
                    $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->where('cars.range_of_vehicle', '=', $request->service)
                    ->where('cars.seat', '=', $request->seat)
                    ->where('cars.price', '>=', $request->start)
                    ->where('cars.price', '<=', $request->end)
                    ->orderBy('cars.price', 'ASC')
                    ->paginate(10);
                } elseif($request->sortby == '2') {
                    $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->where('cars.range_of_vehicle', '=', $request->service)
                    ->where('cars.seat', '=', $request->seat)
                    ->where('cars.price', '>=', $request->start)
                    ->where('cars.price', '<=', $request->end)
                    ->orderBy('cars.price', 'DESC')
                    ->paginate(10);
                } elseif($request->sortby == '3') {
                    $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->where('cars.range_of_vehicle', '=', $request->service)
                    ->where('cars.seat', '=', $request->seat)
                    ->where('cars.price', '>=', $request->start)
                    ->where('cars.price', '<=', $request->end)
                    ->orderBy('cars.id', 'DESC')
                    ->paginate(10);
                } elseif($request->sortby == '4') {
                    $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->join('bookings','bookings.cars_id','cars.id')
                     ->where('cars.range_of_vehicle', '=', $request->service)
                    ->where('cars.seat', '=', $request->seat)
                    ->where('cars.price', '>=', $request->start)
                    ->where('cars.price', '<=', $request->end)
                    ->orderBy('cars.id', 'DESC')
                    ->distinct()
                    ->paginate(10);
                }
        }
        if($request->service != null && $request->render != null && $request->sortby != null
            && $request->start != null && $request->end != null) {
            if($request->sortby == '1') {
                $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('cars.range_of_vehicle', '=', $request->service)
                ->where('cars.renders_id', '=', $request->render)
                ->where('cars.price', '>=', $request->start)
                ->where('cars.price', '<=', $request->end)
                ->orderBy('cars.price', 'ASC')
                ->paginate(10);
            } elseif($request->sortby == '2') {
                $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('cars.range_of_vehicle', '=', $request->service)
                ->where('cars.renders_id', '=', $request->render)
                ->where('cars.price', '>=', $request->start)
                ->where('cars.price', '<=', $request->end)
                ->orderBy('cars.price', 'DESC')
                ->paginate(10);
            } elseif($request->sortby == '3') {
                $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->where('cars.range_of_vehicle', '=', $request->service)
                ->where('cars.renders_id', '=', $request->render)
                ->where('cars.price', '>=', $request->start)
                ->where('cars.price', '<=', $request->end)
                ->orderBy('cars.id', 'DESC')
                ->paginate(10);
            } elseif($request->sortby == '4') {
                $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->join('bookings','bookings.cars_id','cars.id')
                 ->where('cars.range_of_vehicle', '=', $request->service)
                ->where('cars.renders_id', '=', $request->render)
                ->where('cars.price', '>=', $request->start)
                ->where('cars.price', '<=', $request->end)
                ->orderBy('cars.id', 'DESC')
                ->distinct()
                ->paginate(10);
            }
        }
        //Type 5: final filter with all parameters
        if($request->render != null && $request->seat != null && $request->location != null
            && $request->service != null && $request->sortby != null 
            && $request->start != null && $request->end != null) {
                if($request->sortby == '1') {
                    $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->where('cars.renders_id', '=', $request->render)
                    ->where('cars.seat', '=', $request->seat)
                    ->where('city.region_id', '=', $request->location)
                    ->where('cars.range_of_vehicle', '=', $request->service)
                    ->where('cars.price', '>=', $request->start)
                    ->where('cars.price', '<=', $request->end)
                    ->orderBy('cars.price', 'ASC')
                    ->paginate(10);
                } elseif($request->sortby == '2') {
                    $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->where('cars.renders_id', '=', $request->render)
                    ->where('cars.seat', '=', $request->seat)
                    ->where('city.region_id', '=', $request->location)
                    ->where('cars.range_of_vehicle', '=', $request->service)
                    ->where('cars.price', '>=', $request->start)
                    ->where('cars.price', '<=', $request->end)
                    ->orderBy('cars.price', 'DESC')
                    ->paginate(10);
                } elseif($request->sortby == '3') {
                    $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->where('cars.renders_id', '=', $request->render)
                    ->where('cars.seat', '=', $request->seat)
                    ->where('city.region_id', '=', $request->location)
                    ->where('cars.range_of_vehicle', '=', $request->service)
                    ->where('cars.price', '>=', $request->start)
                    ->where('cars.price', '<=', $request->end)
                    ->orderBy('cars.id', 'DESC')
                    ->paginate(10);
                } elseif($request->sortby == '4') {
                    $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->join('bookings','bookings.cars_id','cars.id')
                    ->where('cars.renders_id', '=', $request->render)
                    ->where('cars.seat', '=', $request->seat)
                    ->where('city.region_id', '=', $request->location)
                    ->where('cars.range_of_vehicle', '=', $request->service)
                    ->where('cars.price', '>=', $request->start)
                    ->where('cars.price', '<=', $request->end)
                    ->orderBy('cars.id', 'DESC')
                    ->distinct()
                    ->paginate(10);
                }
        }
        //------------------ TODO:Search for cars by address and delivery time -------------//
        if($request->district != null)  {
            $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->leftJoin('region','city.region_id','region.id')
                ->where('city.title','like', '%'.$request->district.'%')
                ->paginate(10);
        }
        if($request->province != null)  {
            $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->leftJoin('region','city.region_id','region.id')
                ->where('region.title','like', '%'.$request->province.'%')
                ->paginate(10);
        }
        if($request->district != null && $request->province)  {
            $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->leftJoin('region','city.region_id','region.id')
                ->where('city.title','like', $request->district)
                ->orwhere('region.title','like', $request->province)
                ->paginate(10);
        }
        if($request->district != null && $request->province != null 
                && $request->day_start != null && $request->day_end != null
                && $request->time_start != null && $request->time_end != null)  {
            $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->leftJoin('region','city.region_id','region.id')
                ->where('city.title','like', '%'.$request->district.'%')
                ->orwhere('region.title','like', '%'.$request->province.'%')
                ->where('cars.start_date', '<=', $request->day_start)
                ->where('cars.end_date', '>=', $request->day_end)
                ->where('cars.start_time', '<=', $request->time_start)
                ->where('cars.end_time', '>=', $request->time_end)
                ->paginate(10);
        }
        //Type 2: 
        if($request->render != null && $request->district != null && $request->province != null 
                && $request->day_start != null && $request->day_end != null
                && $request->time_start != null && $request->time_end != null)  {
            $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->leftJoin('region','city.region_id','region.id')
                ->where('city.title','like', '%'.$request->district.'%')
                ->orwhere('region.title','like', '%'.$request->province.'%')
                ->where('cars.start_date', '<=', $request->day_start)
                ->where('cars.end_date', '>=', $request->day_end)
                ->where('cars.start_time', '<=', $request->time_start)
                ->where('cars.end_time', '>=', $request->time_end)
                ->where('cars.renders_id', '=', $request->render)
                ->paginate(10);
        }
        if($request->seat != null && $request->district != null && $request->province != null 
                && $request->day_start != null && $request->day_end != null
                && $request->time_start != null && $request->time_end != null)  {
            $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->leftJoin('region','city.region_id','region.id')
                ->where('city.title','like', '%'.$request->district.'%')
                ->orwhere('region.title','like', '%'.$request->province.'%')
                ->where('cars.start_date', '<=', $request->day_start)
                ->where('cars.end_date', '>=', $request->day_end)
                ->where('cars.start_time', '<=', $request->time_start)
                ->where('cars.end_time', '>=', $request->time_end)
                ->where('cars.seat', '=', $request->seat)
                ->paginate(10);
        }
        if($request->service != null && $request->district != null && $request->province != null 
                && $request->day_start != null && $request->day_end != null
                && $request->time_start != null && $request->time_end != null)  {
            $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->leftJoin('region','city.region_id','region.id')
                ->where('city.title','like', '%'.$request->district.'%')
                ->orwhere('region.title','like', '%'.$request->province.'%')
                ->where('cars.start_date', '<=', $request->day_start)
                ->where('cars.end_date', '>=', $request->day_end)
                ->where('cars.start_time', '<=', $request->time_start)
                ->where('cars.end_time', '>=', $request->time_end)
                ->where('cars.range_of_vehicle', '=', $request->service)
                ->paginate(10);
        }
        if($request->sortby != null && $request->district != null && $request->province != null 
                && $request->day_start != null && $request->day_end != null
                && $request->time_start != null && $request->time_end != null) {
            if($request->sortby == '1') {
                $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->leftJoin('region','city.region_id','region.id')
                    ->where('city.title','like', $request->district)
                    ->orwhere('region.title','like', $request->province)
                    ->where('cars.start_date', '<=', $request->day_start)
                    ->where('cars.end_date', '>=', $request->day_end)
                    ->where('cars.start_time', '<=', $request->time_start)
                    ->where('cars.end_time', '>=', $request->time_end)
                    ->orderBy('cars.price', 'asc')
                    ->paginate(10);
            } elseif($request->sortby == '2') {
                $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->leftJoin('region','city.region_id','region.id')
                    ->where('city.title','like', '%'.$request->district.'%')
                    ->orwhere('region.title','like', '%'.$request->province.'%')
                    ->where('cars.start_date', '<=', $request->day_start)
                    ->where('cars.end_date', '>=', $request->day_end)
                    ->where('cars.start_time', '<=', $request->time_start)
                    ->where('cars.end_time', '>=', $request->time_end)
                    ->orderBy('cars.price', 'desc')
                    ->paginate(10);
            } elseif($request->sortby == '3') {
                $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->leftJoin('region','city.region_id','region.id')
                    ->where('city.title','like', '%'.$request->district.'%')
                    ->orwhere('region.title','like', '%'.$request->province.'%')
                    ->where('cars.start_date', '<=', $request->day_start)
                    ->where('cars.end_date', '>=', $request->day_end)
                    ->where('cars.start_time', '<=', $request->time_start)
                    ->where('cars.end_time', '>=', $request->time_end)
                    ->orderBy('cars.id', 'desc')
                    ->paginate(10);
            } elseif($request->sortby == '4') {
                $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->leftJoin('region','city.region_id','region.id')
                    ->join('bookings','bookings.cars_id','cars.id')
                    ->where('city.title','like', '%'.$request->district.'%')
                    ->orwhere('region.title','like', '%'.$request->province.'%')
                    ->where('cars.start_date', '<=', $request->day_start)
                    ->where('cars.end_date', '>=', $request->day_end)
                    ->where('cars.start_time', '<=', $request->time_start)
                    ->where('cars.end_time', '>=', $request->time_end)
                    ->orderBy('cars.id', 'DESC')
                    ->distinct()
                    ->paginate(10);
            }
        }
        // Type 3:
        if($request->render != null && $request->seat != null 
            && $request->district != null && $request->province != null 
                && $request->day_start != null && $request->day_end != null
                && $request->time_start != null && $request->time_end != null) {
            $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->leftJoin('region','city.region_id','region.id')
                ->where('city.title','like', '%'.$request->district.'%')
                ->orwhere('region.title','like', '%'.$request->province.'%')
                ->where('cars.start_date', '<=', $request->day_start)
                ->where('cars.end_date', '>=', $request->day_end)
                ->where('cars.start_time', '<=', $request->time_start)
                ->where('cars.end_time', '>=', $request->time_end)
                ->where('cars.renders_id', '=', $request->render)
                ->where('cars.seat', '=', $request->seat)
                ->paginate(10);
        }
        if($request->render != null && $request->service != null 
            && $request->district != null && $request->province != null 
                && $request->day_start != null && $request->day_end != null
                && $request->time_start != null && $request->time_end != null) {
            $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->leftJoin('region','city.region_id','region.id')
                ->where('city.title','like', '%'.$request->district.'%')
                ->orwhere('region.title','like', '%'.$request->province.'%')
                ->where('cars.start_date', '<=', $request->day_start)
                ->where('cars.end_date', '>=', $request->day_end)
                ->where('cars.start_time', '<=', $request->time_start)
                ->where('cars.end_time', '>=', $request->time_end)
                ->where('cars.renders_id', '=', $request->render)
                ->where('cars.range_of_vehicle', '=', $request->service)
                ->paginate(10);
        }
        if($request->render != null && $request->sortby != null
            && $request->district != null && $request->province != null 
                && $request->day_start != null && $request->day_end != null
                && $request->time_start != null && $request->time_end != null) {
            if($request->sortby == '1') {
                $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->leftJoin('region','city.region_id','region.id')
                    ->where('city.title','like', '%'.$request->district.'%')
                    ->orwhere('region.title','like', '%'.$request->province.'%')
                    ->where('cars.start_date', '<=', $request->day_start)
                    ->where('cars.end_date', '>=', $request->day_end)
                    ->where('cars.start_time', '<=', $request->time_start)
                    ->where('cars.end_time', '>=', $request->time_end)
                    ->where('cars.renders_id', '=', $request->render)
                    ->orderBy('cars.price', 'asc')
                    ->paginate(10);
            } elseif($request->sortby == '2') {
                $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->leftJoin('region','city.region_id','region.id')
                    ->where('city.title','like', '%'.$request->district.'%')
                    ->orwhere('region.title','like', '%'.$request->province.'%')
                    ->where('cars.start_date', '<=', $request->day_start)
                    ->where('cars.end_date', '>=', $request->day_end)
                    ->where('cars.start_time', '<=', $request->time_start)
                    ->where('cars.end_time', '>=', $request->time_end)
                    ->where('cars.renders_id', '=', $request->render)
                    ->orderBy('cars.price', 'desc')
                    ->paginate(10);
            } elseif($request->sortby == '3') {
                $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->leftJoin('region','city.region_id','region.id')
                    ->where('city.title','like', '%'.$request->district.'%')
                    ->orwhere('region.title','like', '%'.$request->province.'%')
                    ->where('cars.start_date', '<=', $request->day_start)
                    ->where('cars.end_date', '>=', $request->day_end)
                    ->where('cars.start_time', '<=', $request->time_start)
                    ->where('cars.end_time', '>=', $request->time_end)
                    ->where('cars.renders_id', '=', $request->render)
                    ->orderBy('cars.id', 'desc')
                    ->paginate(10);
            } elseif($request->sortby == '4') {
                $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->leftJoin('region','city.region_id','region.id')
                    ->join('bookings','bookings.cars_id','cars.id')
                    ->where('city.title','like', '%'.$request->district.'%')
                    ->orwhere('region.title','like', '%'.$request->province.'%')
                    ->where('cars.start_date', '<=', $request->day_start)
                    ->where('cars.end_date', '>=', $request->day_end)
                    ->where('cars.start_time', '<=', $request->time_start)
                    ->where('cars.end_time', '>=', $request->time_end)
                    ->where('cars.renders_id', '=', $request->render)
                    ->orderBy('cars.id', 'desc')
                    ->distinct()
                    ->paginate(10);
            }
        }
        if($request->seat != null && $request->service != null
            && $request->district != null && $request->province != null 
                && $request->day_start != null && $request->day_end != null
                && $request->time_start != null && $request->time_end != null) {
            $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'cars.renders_id','city.region_id','cars.range_of_vehicle')
                ->leftJoin('city','cars.city_id','city.id')
                ->leftJoin('region','city.region_id','region.id')
                ->where('city.title','like', '%'.$request->district.'%')
                ->orwhere('region.title','like', '%'.$request->province.'%')
                ->where('cars.start_date', '<=', $request->day_start)
                ->where('cars.end_date', '>=', $request->day_end)
                ->where('cars.start_time', '<=', $request->time_start)
                ->where('cars.end_time', '>=', $request->time_end)
                ->where('cars.seat', '=', $request->seat)
                ->where('cars.range_of_vehicle', '=', $request->service)
                ->paginate(10);
        }
        if($request->seat != null && $request->sortby != null
            && $request->district != null && $request->province != null 
                && $request->day_start != null && $request->day_end != null
                && $request->time_start != null && $request->time_end != null) {
            if($request->sortby == '1') {
                $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->leftJoin('region','city.region_id','region.id')
                    ->where('city.title','like', '%'.$request->district.'%')
                    ->orwhere('region.title','like', '%'.$request->province.'%')
                    ->where('cars.start_date', '<=', $request->day_start)
                    ->where('cars.end_date', '>=', $request->day_end)
                    ->where('cars.start_time', '<=', $request->time_start)
                    ->where('cars.end_time', '>=', $request->time_end)
                    ->where('cars.seat', '=', $request->seat)
                    ->orderBy('cars.price', 'asc')
                    ->paginate(10);
            } elseif($request->sortby == '2') {
                $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->leftJoin('region','city.region_id','region.id')
                    ->where('city.title','like', '%'.$request->district.'%')
                    ->orwhere('region.title','like', '%'.$request->province.'%')
                    ->where('cars.start_date', '<=', $request->day_start)
                    ->where('cars.end_date', '>=', $request->day_end)
                    ->where('cars.start_time', '<=', $request->time_start)
                    ->where('cars.end_time', '>=', $request->time_end)
                    ->where('cars.seat', '=', $request->seat)
                    ->orderBy('cars.price', 'desc')
                    ->paginate(10);
            } elseif($request->sortby == '3') {
                $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->leftJoin('region','city.region_id','region.id')
                    ->where('city.title','like', '%'.$request->district.'%')
                    ->orwhere('region.title','like', '%'.$request->province.'%')
                    ->where('cars.start_date', '<=', $request->day_start)
                    ->where('cars.end_date', '>=', $request->day_end)
                    ->where('cars.start_time', '<=', $request->time_start)
                    ->where('cars.end_time', '>=', $request->time_end)
                    ->where('cars.seat', '=', $request->seat)
                    ->orderBy('cars.id', 'desc')
                    ->paginate(10);
            } elseif($request->sortby == '4') {
                $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->leftJoin('region','city.region_id','region.id')
                    ->join('bookings','bookings.cars_id','cars.id')
                    ->where('city.title','like', '%'.$request->district.'%')
                    ->orwhere('region.title','like', '%'.$request->province.'%')
                    ->where('cars.start_date', '<=', $request->day_start)
                    ->where('cars.end_date', '>=', $request->day_end)
                    ->where('cars.start_time', '<=', $request->time_start)
                    ->where('cars.end_time', '>=', $request->time_end)
                    ->where('cars.seat', '=', $request->seat)
                    ->orderBy('cars.id', 'desc')
                    ->distinct()
                    ->paginate(10);
            }
        }
        if($request->service != null && $request->sortby != null 
            && $request->district != null && $request->province != null 
                && $request->day_start != null && $request->day_end != null
                && $request->time_start != null && $request->time_end != null) {
            if($request->sortby == '1') {
                $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->leftJoin('region','city.region_id','region.id')
                    ->where('city.title','like', '%'.$request->district.'%')
                    ->orwhere('region.title','like', '%'.$request->province.'%')
                    ->where('cars.start_date', '<=', $request->day_start)
                    ->where('cars.end_date', '>=', $request->day_end)
                    ->where('cars.start_time', '<=', $request->time_start)
                    ->where('cars.end_time', '>=', $request->time_end)
                    ->where('cars.range_of_vehicle', '=', $request->service)
                    ->orderBy('cars.price', 'asc')
                    ->paginate(10);
            } elseif($request->sortby == '2') {
                $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->leftJoin('region','city.region_id','region.id')
                    ->where('city.title','like', '%'.$request->district.'%')
                    ->orwhere('region.title','like', '%'.$request->province.'%')
                    ->where('cars.start_date', '<=', $request->day_start)
                    ->where('cars.end_date', '>=', $request->day_end)
                    ->where('cars.start_time', '<=', $request->time_start)
                    ->where('cars.end_time', '>=', $request->time_end)
                    ->where('cars.range_of_vehicle', '=', $request->service)
                    ->orderBy('cars.price', 'desc')
                    ->paginate(10);
            } elseif($request->sortby == '3') {
                $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->leftJoin('region','city.region_id','region.id')
                    ->where('city.title','like', '%'.$request->district.'%')
                    ->orwhere('region.title','like', '%'.$request->province.'%')
                    ->where('cars.start_date', '<=', $request->day_start)
                    ->where('cars.end_date', '>=', $request->day_end)
                    ->where('cars.start_time', '<=', $request->time_start)
                    ->where('cars.end_time', '>=', $request->time_end)
                    ->where('cars.range_of_vehicle', '=', $request->service)
                    ->orderBy('cars.id', 'desc')
                    ->paginate(10);
            } elseif($request->sortby == '4') {
                $data = Cars_Model::select('cars.id','cars.name',
                    'cars.photo','cars.seat','cars.price',
                    'cars.renders_id','city.region_id','cars.range_of_vehicle')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->leftJoin('region','city.region_id','region.id')
                    ->join('bookings','bookings.cars_id','cars.id')
                    ->where('city.title','like', '%'.$request->district.'%')
                    ->orwhere('region.title','like', '%'.$request->province.'%')
                    ->where('cars.start_date', '<=', $request->day_start)
                    ->where('cars.end_date', '>=', $request->day_end)
                    ->where('cars.start_time', '<=', $request->time_start)
                    ->where('cars.end_time', '>=', $request->time_end)
                    ->where('cars.range_of_vehicle', '=', $request->service)
                    ->orderBy('cars.id', 'desc')
                    ->distinct()
                    ->paginate(10);
            }

        }
        $arr = array();
        foreach($data as $val) {
            //Average rating pressed into vehicle data
            $review = new Reviews();
            $rate = $review->average($val->id);
            array_push($arr, [
                'id'     => $val->id,
                'renders_id'=> $val->renders_id,
                'region_id'=> $val->region_id,
                'name' => $val->name,
                'photo' => $val->photo,
                'seat' => $val->seat,
                'price' => $val->price,
                'range_of_vehicle'   => $val->range_of_vehicle,
                'rate'   => $rate->original,
            ]);
        }
        return response()->json([
            'status' => true,
            'msg'    => 'Query Successfully',
            'current_page' => $data->currentPage(),
            "total" => $data->total(),
            "last_page" => $data->lastPage(),
            "per_page" => $data->perPage(),
            'data'   => $arr
        ]);
    }
    //Take out the 5 most posted car brands:
    public function top_locations(Request $request) {
        if(!empty($request->quantily))
            $data = Location_Model::select('region.id as region_id_city','region.title','region.photo','region.status',
                    'city.title as city_title','city.id as city_id_region','cars.id as cars_id',DB::raw('COUNT(*) as count_region_cars'))
                    ->join('city','city.region_id','region.id')
                    ->join('cars','cars.city_id','city.id')
                    ->where('region.status','active')
                    ->groupBy('region.id')
                    ->limit($request->quantily)
                    ->orderBy('count_region_cars','desc')
                    ->get();
        else {
            $data = Location_Model::select('region.id as region_id_city','region.title','region.photo','region.status',
                    'city.title as city_title','city.id as city_id_region','cars.id as cars_id',DB::raw('COUNT(*) as count_region_cars'))
                    ->join('city','city.region_id','region.id')
                    ->join('cars','cars.city_id','city.id')
                    ->groupBy('region.id')
                    ->orderBy('count_region_cars','desc')
                    ->paginate(16);
        }
        $res = array();
        foreach($data as $val) {
            array_push($res, [
                'region_id_city' => $val->region_id_city,
                'region_title' => $val->title,
                'region_photo' => $val->photo,
                'city_title' => $val->city_title,
                'count_region_cars' => $val->count_region_cars,
            ]);
        }
        if($request->quantily == null) {
            return response()->json([
                'status' => true,
                'message' => 'Successfully',
                'current_page' => $data->currentPage(),
                "total" => $data->total(),
                "last_page" => $data->lastPage(),
                "per_page" => $data->perPage(),
                'data' => $res,
            ]);
        }
        return response()->json([
            'status' => true,
            'message' => 'Successfully',
            'data' => $res,
        ]);
    }
    //Take out the 5 most posted car brands:
    public function top_renders(Request $request) {
        if($request->quantily != null) {
            $data = Renders_Model::select('renders.id','renders.manu_name','renders.photo')
                ->join('cars','cars.renders_id','renders.id')
                ->groupBy('renders.id')
                ->orderBy('renders.id','desc')
                ->limit($request->quantily)
                ->get();
        } else {
            $data = Renders_Model::select('renders.id','renders.manu_name','renders.photo')
                ->join('cars','cars.renders_id','renders.id')
                ->groupBy('renders.id')
                ->orderBy('renders.id','desc')
                ->get();
        }

        return response()->json([
            'status' => true,
            'message' => 'Successfully',
            'data' => $data,
        ]);
    }
    //Vehicle details by car brand
    public function renders(Request $request) {
        if(empty($request->renders_id)) {
            return response()->json([
                'status' => false,
                'msg' => 'ID must be numeric',
            ]);
            
        } else {
            $result = Cars_Model::select(
                    'cars.id','cars.name','cars.photo','cars.seat','cars.price',
                    'cars.range_of_vehicle', 'renders.manu_name as renders_name',
                    'cars.status','city.title as city_title','region.title as region_title')
                ->leftJoin('city','cars.city_id','city.id')    
                ->leftJoin('region','city.region_id','region.id')
                ->join('renders','cars.renders_id','renders.id')
                ->where('cars.renders_id', $request->renders_id)
                ->paginate(16);
          
            $data = array();
            foreach($result as $val) {
                $review = new Reviews();
                $rate = $review->average($request->id);
                $trip = $this->count_booking($request->id);
                array_push($data, [
                    'id'=> $val->id,
                    'name' => $val->name,
                    'renders_name' => $val->renders_name,
                    'photo' => $val->photo,
                    'seat' => $val->seat,
                    'price' => $val->price,
                    'city_name' => trim($val->city_title,"\r\n"),
                    'region_name' => $val->region_title,
                    'average_rating' => $rate->original,
                    'average_trip' => str_pad($trip->original, 2, '0', STR_PAD_LEFT)
                ]);
            }
            return response()->json([
                'status' => true,
                'msg' => 'Query successfully',
                'current_page' => $result->currentPage(),
                "total" => $result->total(),
                "last_page" => $result->lastPage(),
                "per_page" => $result->perPage(),
                'data' => $data,
            ]);
        }
    }
    //Research location name:
    public function research_location(Request $request) {
        $validator = Validator::make(
            $request->all(),
            [
                "address" => "nullable",
            ],
        );
        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "error" => $validator->errors()
            ]);
        }
        if($request->address != null) {
            $data = DB::select('SELECT la_region.id,la_region.title,la_region.photo FROM `la_region` WHERE title like ?',['%'.$request->address.'%']);
        } else {
            $data = DB::select('SELECT * FROM `la_region`');
        }
        return response()->json([
            'status' => true,
            'message' => 'Successfully',
            'data' => $data,
        ]);
    }
    //Ranking of the most booked cars
    public function top_booking(Request $request) {
        $quantily = $request->quantily;
        if(!empty($quantily)) {
            $data = Cars_Model::select('cars.id','cars.name','cars.seat','cars.photo','cars.price',
                    'city.title as city_title','bookings.total_amount','bookings.status as bookings_status',
                    'region.title as region_title')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->join('region','region.id','city.region_id')
                    ->join('bookings','bookings.cars_id','cars.id')
                    ->orderBy('cars.id','DESC')
                    ->groupBy('cars.id')
                    ->limit($quantily)
                    ->get();
        } else {
            $data = Cars_Model::select('cars.id','cars.name','cars.seat','cars.photo','cars.price',
                    'city.title as city_title','bookings.total_amount','bookings.status as bookings_status',
                    'region.title as region_title')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->join('region','region.id','city.region_id')
                    ->join('bookings','bookings.cars_id','cars.id')
                    ->orderBy('cars.id','DESC')
                    ->groupBy('cars.id')
                    ->paginate(16);
        }
        $arr = array();
        foreach($data as $val) {
            $review = new Reviews();
            $rate = $review->average($val->id);
            array_push($arr, [
                'id'     => $val->id,
                'name' => $val->name,
                'photo' => $val->photo,
                'seat' => $val->seat,
                'price' => $val->price,
                'rate'   => $rate->original,
                'city_title'   => trim($val->city_title,"\r\n"),
                'region_title'   => $val->region_title,
                'total_amount'   => $val->total_amount,
                'bookings_status' => $val->bookings_status,
            ]);
        }
        if($quantily == null) {
            return response()->json([
                'status' => true,
                'message' => 'Query Successfully',
                'current_page' => $data->currentPage(),
                "total" => $data->total(),
                "last_page" => $data->lastPage(),
                "per_page" => $data->perPage(),
                'data' => $arr,
            ]);
        }
        return response()->json([
            'status' => true,
            'message' => 'Query Successfully',
            'data' => $arr,
        ]);
    }
    //Rate the latest cars added by loyal customers
    public function lastest(Request $request) {
        if($request->quantily != null) {
            $data = Cars_Model::select('cars.id','cars.name','cars.seat','cars.photo','cars.price')
                ->limit($request->quantily)
                ->orderBy('cars.id','desc')
                ->get();
        } else {
            $data = Cars_Model::select('cars.id','cars.name','cars.seat','cars.photo','cars.price')
                ->orderBy('cars.id','desc')
                ->paginate(10);
        }
        $for = array();
        foreach($data as $val) {
            $review = new Reviews();
            $rate = $review->average($val->id);
            array_push($for, [
                'id'     => $val->id,
                'name' => $val->name,
                'photo' => $val->photo,
                'seat' => $val->seat,
                'price' => $val->price,
                'rate'   => $rate->original,
            ]);
        }
        if(empty($request->quantily)) {
            return response()->json([
                'status' => true,
                'message' => 'Successfully',
                'current_page' => $data->currentPage(),
                "total" => $data->total(),
                "last_page" => $data->lastPage(),
                "per_page" => $data->perPage(),
                'data' => $for,
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Successfully',
                'data' => $for,
            ]);
        }
        
    }
    //Show booked vehicle details
    public function booking(Request $request) {
        $cars = Cars_Model::select('id','name','photo','price')
                    ->where('id', $request->id)->first();
        return response()->json([
            'status' => true,
            'msg' => 'Query successfully',
            'data' => $cars,
        ]);
    }
    //Show available seat numbers
    public function seat() {
        $seats = Cars_Model::select('seat')
                    ->distinct()
                    ->get('seat');
        return response()->json([
            'status' => true,
            'msg' => 'Query successfully',
            'data' => $seats,
        ]);
    }
    //Show vehicles by region
    public function location(Request $request) {
        $cars = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'city.title as city_title','cars.range_of_vehicle','cars.status')
                    ->leftJoin('city','cars.city_id','city.id')
                    ->where('city.region_id', $request->id)
                    ->paginate(6);
        $data = array();
        foreach($cars as $val) {
            array_push($data, [
                'id' => $val->id,
                'name' => $val->name,
                'photo' => $val->photo,
                'price' => $val->price,
                'city_title' => $val->city_title,
                'range_of_vehicle' => $val->range_of_vehicle,
            ]);
        }
        
        return response()->json([
            'status' => true,
            'msg'    => 'Query successfully',
            'current_page' => $cars->currentPage(),
            "total" => $cars->total(),
            "last_page" => $cars->lastPage(),
            "per_page" => $cars->perPage(),
            'data'   => $data
        ]);
    }
    //Show list of vehicles with driver
    public function drive() {
        $driverCar = Cars_Model::select('id','name','photo','price','status')
                    ->where('range_of_vehicle', 2)
                    ->where('status', 'active')
                    ->orderBy('id', 'DESC')
                    ->get();
        $for = array();
        foreach($driverCar as $val) {
            $review = new Reviews();
            $rate = $review->average($val->id);
            array_push($for, [
                'id'     => $val->id,
                'name' => $val->name,
                'photo' => $val->photo,
                'seat' => $val->seat,
                'price' => $val->price,
                'rate'   => $rate->original,
            ]);
        }
        return response()->json([
            'status' => true,
            'msg' => 'Query successfully',
            'data' => $for,
        ]);
    }
    //Show a list of self-driving cars
    public function driving() {
        $driving = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'city.title as city_title','cars.range_of_vehicle','cars.status')
            ->leftJoin('city','cars.city_id','city.id')
            ->orderby('id','desc')->paginate(10);
        $for = array();
        foreach($driving as $val) {
            $review = new Reviews();
            $rate = $review->average($val->id);
            array_push($for, [
                'id'     => $val->id,
                'name' => $val->name,
                'photo' => $val->photo,
                'seat' => $val->seat,
                'price' => $val->price,
                'rate'   => $rate->original,
            ]);
        }
        return response()->json([
            'status' => true,
            'msg' => 'Query successfully',
            'data' => $for,
        ]);
    }
    //Show vehicle details
    public function detail(Request $request) { 
        if(!isset($request->id)) {
            return response()->json([
                'status' => true,
                'msg' => 'ID must be numeric',
            ]);
        } else {
            $result = Cars_Model::select(
                    'cars.id','cars.name','cars.description','cars.photo','cars.seat',
                    'cars.make','cars.fuel','cars.power','cars.gearbox','cars.luggage','cars.price',
                    'cars.service_charge','cars.insurance_fees','cars.discount','cars.address','cars.terms_of_use',
                    'cars.rules','cars.range_of_vehicle','features.sensors','features.control_parking','features.auto_temp',
                    'features.wireless_co','features.conditioner','features.navigator','features.map','features.camera','features.kids_chair',
                    'features.spare_tire','features.bluetooth','features.rear_camera','features.usb',
                    'features.safety_aribag','features.gps','users.name as users_name','users.photo as users_photo',
                    'cars.status','city.title as city_title','region.title as region_title')
                ->leftJoin('users','users.id','cars.users_id')
                ->leftJoin('features','features.cars_id','cars.id')
                ->leftJoin('city','cars.city_id','city.id')
                ->leftJoin('region','city.region_id','region.id')
                ->where('cars.id', $request->id)
                ->get();
            $data = array();
            foreach($result as $val) {
                $review = new Reviews();
                $rate = $review->average($request->id);
                $trip = $this->count_booking($request->id);
                array_push($data, [
                    'id'=> $val->id,
                    'name' => $val->name,
                    'description' => strip_tags(html_entity_decode($val->description)),
                    'photo' => $val->photo,
                    'seat' => $val->seat,
                    'make' => $val->make,
                    'power' => $val->power,
                    'fuel' => $val->fuel,
                    'gearbox' => $val->gearbox,
                    'luggage' => $val->luggage,
                    'price' => $val->price,
                    'service_charge' => $val->service_charge,
                    'insurance_fees' => $val->insurance_fees,
                    'terms_of_use' => $val->terms_of_use,
                    'rules' => $val->rules,
                    'range_of_vehicle' => $val->range_of_vehicle,
                    'sensors' => $val->sensors,
                    'control_parking' => $val->control_parking,
                    'wireless_co' => $val->wireless_co,
                    'conditioner' => $val->conditioner,
                    'navigator' => $val->navigator,
                    'map' => $val->map,
                    'camera' => $val->camera,
                    'kids_chair' => $val->kids_chair,
                    'spare_tire' => $val->spare_tire,
                    'bluetooth' => $val->bluetooth,
                    'rear_camera' => $val->rear_camera,
                    'usb' => $val->usb,
                    'safety_aribag' => $val->safety_aribag,
                    'users_name' => $val->users_name,
                    'users_photo' => $val->users_photo,
                    'city_name' => trim($val->city_title,"\r\n"),
                    'region_name' => $val->region_title,
                    'average_rating' => $rate->original,
                    'average_trip' => str_pad($trip->original, 2, '0', STR_PAD_LEFT)
                ]);
            }
            return response()->json([
                'status' => true,
                'msg' => 'Query successfully',
                'data' => $data,
            ]);
        }
       
    }
    //Display vehicle list (with 1 page pagination with 10 products)
    public function index(Request $request) {
        $data = Cars_Model::select('cars.id','cars.name',
                'cars.photo','cars.seat','cars.price',
                'city.title as city_title','cars.range_of_vehicle','cars.status')
            ->leftJoin('city','cars.city_id','city.id')
            ->orderby('id','desc')->paginate(10);
        $for = array();
        foreach($data as $val) {
            $review = new Reviews();
            $rate = $review->average($val->id);
            array_push($for, [
                'id'     => $val->id,
                'name' => $val->name,
                'photo' => $val->photo,
                'seat' => $val->seat,
                'price' => $val->price,
                'rate'   => $rate->original,
                'city_title' => trim($val->city_title,"\r\n"),
                'range_of_vehicle' => $val->range_of_vehicle,
                'status_cars' => $val->status,
            ]);
        }
        return response()->json([
            'status' => true,
            'msg' => 'Query successfully',
            'current_page' => $data->currentPage(),
            "total" => $data->total(),
            "last_page" => $data->lastPage(),
            "per_page" => $data->perPage(),
            'data' => $for,
        ]);
    }
    
}