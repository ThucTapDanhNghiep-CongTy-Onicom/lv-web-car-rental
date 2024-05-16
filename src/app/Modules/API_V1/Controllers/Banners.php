<?php

namespace App\Modules\API_V1\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Modules\API_V1\Models\Banners_Model;
use App\Modules\API_V1\Helpers\Helper;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Mail;

class Banners extends Controller
{
     //List of banners on mobile screens
     public function mobile()
     {
        $results = Banners_Model::select('id','title','description','photo')
                         ->where('type', '1')
                         ->get();
        $data = array();
        foreach($results as $val){
            array_push($data, [
                'id' => $val->id,
                'title' => $val->title,
                'description' => strip_tags(html_entity_decode($val->description)),
                'photo' => $val->photo
            ]);
        }
         return response()->json([
             'status' => true,
             'msg' => 'Query successfully',
             'data' => $data,
         ]);
     }
    //Thiếu type để phân biệt mobile , pc.
    public function index()
    {
        $banner = Banners_Model::select('id','title','description','photo')
                        ->where('status', 'on')
                        ->first();
        return response()->json([
            'status' => true,
            'msg' => 'Query successfully',
            'data' => $banner,
        ]);
    }
}