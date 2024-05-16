<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\Cars;
use App\Models\Bookings;
use App\Models\Reders;
use App\Models\Vistors;
use App\Helpers\Helper;
use Carbon\Carbon;
use App\User;
use Socialite;

class Renders_Controller extends Controller {
    public function index() {
        $res_renders = Reders::select('id','manu_name','description','photo','feature')
                    ->orderBy('id','DESC')
                    ->paginate(5);
        //dd($res_renders);
        return view('backend.owner.renders.index')->with('res_renders',$res_renders);
    }
   
}