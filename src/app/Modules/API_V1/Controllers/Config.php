<?php

namespace App\Modules\API_V1\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Modules\API_V1\Helpers\Helper;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Modules\API_V1\Models\Config_Model;

class Config extends Controller {
    //Display app parts: logo, icon, banner,...
    public function index(Request $request) {
        $settings = config('global.settings');
        return response()->json([
            'status' => true,
            'msg' => 'Query successfully',
            "data" => [
                "favicon_icon" => $settings['FAVICON_ICON'],
                "logo" =>  $settings['PHOTO_LOGO'],
                "photo_welcome" => $settings['PHOTO_WELCOME'],
                "title_welcome" => strip_tags(html_entity_decode($settings['TITLE_WELCOME'])),
                "show_logo" => $settings['SHOW_LOGO'],
                "banner_top" =>  $settings['BANNER_TOP'],
                "banner_bottom" =>  $settings['BANNER_BOTTOM']
            ],
        ]);
    }
    //Show about us
    public function about(Request $request) {
        $settings = config('global.settings');
        return response()->json([
            "status" => true,
            "msg" => "Query successful",
            "data" => $settings['ABOUT_US_CONTENT']
        ]);
    }
    //Show terms and rules
    public function thinks() {
        $settings = config('global.settings');
        return response()->json([
            "status" => true,
            "msg" => "Query successful",
            "data" => [
                "title_1" => $settings['TITLE_COLUM_1'],
                "content_1" => $settings['CONTENT_ROW_1']. '#' .$settings['CONTENT_ROW_2']. '#' .$settings['CONTENT_ROW_3'],
              
                "title_2" => $settings['TITLE_COLUM_2'],
                "content_21" => $settings['CONTENT_ROW_2.1']. '#' .$settings['CONTENT_ROW_2.2']. '#' .$settings['CONTENT_ROW_2.3']. '#' .$settings['CONTENT_ROW_2.4']. '#' .$settings['CONTENT_ROW_2.5'],
               
                "title_3" => $settings['TITLE_COLUM_3'],
                "content_31" => $settings['CONTENT_ROW_3.1'].'#'.$settings['CONTENT_ROW_3.2'].'#'.$settings['CONTENT_ROW_3.3'],
               
            ],
        ]);
    }
    
}