<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Reviews;
use App\Models\Vistors;
use App\Helpers\Helper;
use Carbon\Carbon;
use App\User;
use Socialite;

class Review_Controller extends Controller {
    public function index() {
        $res_review = Reviews::select('reviews.id','reviews.rate','reviews.review as comment','reviews.reply',
            'users.name as users_name','cars.name as cars_name',DB::raw('round(AVG(rate),0) as reviews_rate'),
            'cars.photo as cars_photo')
            ->join('users','reviews.users_id','users.id')
            ->join('cars','reviews.cars_id','cars.id')
            ->where('cars.users_id',Auth::user()->id)
            ->groupBy('reviews.users_id')
            ->paginate(10);
        //dd($res_review);
        return view('backend.owner.reviews.index')->with('res_review',$res_review);
    }
   
}