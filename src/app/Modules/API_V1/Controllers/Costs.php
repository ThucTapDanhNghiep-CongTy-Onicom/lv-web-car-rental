<?php

namespace App\Modules\API_V1\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Modules\API_V1\Models\Costs_Model;
use App\Modules\API_V1\Helpers\Helper;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Mail;

class Costs extends Controller
{
    public function table(Request $request)
    {
        $data = Costs_Model::select('id','onetothree','fiveonline',
                            'tentofourteen','morefifteen','pricemonth','car_id')
                    ->where('car_id', $request->id)->first();
        return response()->json([
            'status' => true,
            'msg'    => 'Query successfully',
            'data'   => $data
        ]);
    }
}