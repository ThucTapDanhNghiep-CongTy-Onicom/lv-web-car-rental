<?php

namespace App\Modules\API_V1\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Modules\API_V1\Models\Coupon_Model;
use App\Modules\API_V1\Helpers\Helper;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Mail;

class Coupon extends Controller {
    //Find promotional codes for customers.
    public function search(Request $request) {
        $tukhoa = $request->get('keyword');
      
        $carsale = Coupon_Model::where('zipcode',  'LIKE', "%$tukhoa%")
                            ->take(30)
                            ->paginate(3)
                            ->appends(['tukhoa' => $tukhoa]); 
        return response()->json([
            'status' => true,
            'msg' => 'Query successfully',
        ]);                 
    }
    //Show promo code details
    public function detail($id) {
        $zipcode = Coupon_Model::select('id','user_id',
                        'zipcode','discount_sale','time_start','time_end')
                    ->where('user_id', $id)->get();
        return response()->json([
            'status' => true,
            'msg' => 'Query successfully',
            'data' => $zipcode,
        ]);
    }
    //Show a list of promotional codes for customers
    public function index() {
        $data = Coupon_Model::select('id','user_id',
                            'zipcode','discount_sale','time_start','time_end')
                    ->where('status','=','active')
                    ->get();
        return response()->json([
            'status' => true,
            'msg'    => 'Query successful',
            'data'   => $data,
        ]);
    }
}