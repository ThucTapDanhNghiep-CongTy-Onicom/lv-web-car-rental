<?php

namespace App\Modules\API_V1\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Modules\API_V1\Models\Location_Model;
use App\Modules\API_V1\Helpers\Helper;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Mail;

class Locations extends Controller {
    //Get county and district information for region, city
    public function district() {
        $districts = DB::table('districts')
                    ->select('cars.id','cars.name','cars.photo','cars.price')
                    ->join('locations','locations.id','=','districts.locat_id')
                    ->join('cars','cars.id','=','districts.car_id')
                    ->get();
        return response()->json([
            'status' => true,
            'msg' => 'Query successfully',
            'data' => $districts,
        ]);
    }
    //Count the number of cars in an area, city
    public function booking_for_location(Request $request) {
        $allLocation = Location_Model::all();
        $booking = array();
            $results = DB::select("SELECT `locations`.`locat_name`,
            COUNT(bookings.id)  as booking ,locations.id,locations.image
            FROM `bookings`,`cars`,`locations` 
            WHERE bookings.car_id=cars.id AND cars.locat_id = locations.id 
            GROUP BY locations.locat_name,locations.id,locations.image
            ORDER BY COUNT(bookings.id) DESC LIMIT ?",[$request->quatily]);
        return response()->json([
            'status' => true,
            'msg' => "Get all booking for location",
            'data' => $results
        ], 200);
    }
    //Show list of regions, cities  
    public function index() {
        $data = Location_Model::select('id','locat_name','image')
                                ->get();
        return response()->json([
            'status' => true,
            'msg'    => 'Query successful',
            'data'   => $data,
        ]);
    }
}