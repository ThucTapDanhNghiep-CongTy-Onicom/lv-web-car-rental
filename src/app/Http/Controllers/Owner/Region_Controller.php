<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Region;
use App\Models\Vistors;
use App\Helpers\Helper;
use App\Models\City;
use Carbon\Carbon;
use App\User;
use Socialite;

class Region_Controller extends Controller {
    public function index() {
        $res_region = Region::select('region.id','region.title as region_title','region.photo',
            'region.status','city.title as city_title')
            ->join('city','region.id','city.region_id')
            ->where('region.status','inactive')
            ->paginate(10);
        //dd($res_region);
        return view('backend.owner.places.index')->with('res_region',$res_region);
    }
   
}