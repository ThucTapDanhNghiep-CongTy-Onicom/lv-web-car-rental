<?php

namespace App\Modules\API_V1\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Modules\API_V1\Models\Whishlists_Model;
use App\Modules\API_V1\Models\Cars_Model;
use App\Modules\API_V1\Helpers\Helper;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Mail;

class Whishlist extends Controller {
   public function favorite(Request $request) {
        $data = Whishlists_Model::select('cars.id','cars.name',
            'cars.photo','cars.seat','cars.price',
            'city.title as city_title','cars.range_of_vehicle','cars.status')      
            ->leftJoin('cars', 'wishlists.cars_id', '=', 'cars.id')
            ->leftJoin('city','cars.city_id','city.id')
            ->join('users', 'users.id', '=', 'wishlists.users_id')
            ->where('wishlists.users_id', $request->user()->id)
            ->groupBy('cars.id')
            ->orderBy('cars.id','DESC')
            ->paginate(16);
        $res = array();
        foreach($data as $val) {
            $review = new Reviews();
            $rate = $review->average($val->id);
            array_push($res, [
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
            'data' => $res,
        ]);
   }
   public function add_delete_favorite(Request $request) {
        $data =  Whishlists_Model::where('cars_id',$request->cars_id)
            ->where('users_id',$request->user()->id)
            ->first();
        if(empty($request->cars_id) || empty($request->user()->id)) {
            return response()->json([
                'status' => false,
                'msg' => 'Sorry, an unexpected error has occurred!',
            ]);
        }
        //2 phương thức:
        if(!empty($data)) {
            DB::table('wishlists')->where('cars_id', '=', $request->cars_id)->delete();
            return response()->json([
                'status' => true,
                'msg' => 'Delete successfully',
                'data' => false,
            ]);
        } 
        $wishList = new Whishlists_Model();
        $wishList->users_id = $request->user()->id;
        $wishList->cars_id = $request->cars_id;
        $res = $wishList->save();
        if($res) {
            return response()->json([
                'status' => true,
                'msg' => 'Save car to favorites list successfully!',
                'data' => true,
            ]);
        } else {
            return response()->json([
                'status' => false,
                'msg' => 'Sorry, an unexpected error has occurred!',
            ]);
        }
        
   }
}