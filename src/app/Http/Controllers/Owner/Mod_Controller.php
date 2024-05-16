<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Vistors;
use App\Models\Cars;
use App\Models\Bookings;
use App\Helpers\Helper;
use Carbon\Carbon;
use App\User;
use Socialite;

class Mod_Controller extends Controller {
    public function index() {
        
        return view('backend.owner.management.index');
    }
   
}