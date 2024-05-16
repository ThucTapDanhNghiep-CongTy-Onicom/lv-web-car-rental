<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vistors;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user_ip = $request->ip(); /*ip host customers*/
         /*current online*/
        $current_online = Vistors::where('ip_address',$user_ip)->get();
        $count_online = $current_online->count();
        if($count_online < 1) {
             $vistors = new Vistors();
             $vistors->ip_address = $user_ip;
             $vistors->date_vistors = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
             $vistors->save();
        }
        return view('/')->with(compact('count_online'));
    } 
  
}
