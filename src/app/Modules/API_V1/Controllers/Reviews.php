<?php

namespace App\Modules\API_V1\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Modules\API_V1\Models\Review_Model;
use App\Modules\API_V1\Helpers\Helper;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Mail;

class Reviews extends Controller {
    //Average rating when renting a car successfully.
    public function average($id) {
        $results = DB::select('SELECT ROUND(AVG(rate),1) as rate FROM `la_reviews`,`la_cars` WHERE la_cars.id = la_reviews.cars_id AND la_cars.id = ?', [$id]);
        if($results[0]->rate == NULL) {
            $res = "0.0";
        } else {
            $res = $results[0]->rate;
        }
        return response()->json(
           $res,
        );
    }
    //Show a list of vehicles that have been evaluated
    public function index() {
        $data = Review_Model::getAllReview();
        return response()->json([
            'status' => true,
            'msg' => 'Query successfully',
            'data' => $data,
        ]);
    }
}