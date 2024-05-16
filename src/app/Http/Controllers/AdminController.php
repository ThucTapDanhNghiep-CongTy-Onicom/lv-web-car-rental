<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Models\Payment;
use App\Models\Vistors;
use App\Models\Cars;
use App\Models\Bookings;
use App\Models\Config;
use App\Helpers\Helper;
use Carbon\Carbon;


use Socialite;

class AdminController extends Controller
{
    public function error() {
        return view('backend.404');
    }

    public function setting() {
        $data = Config::where('status','0')->get();
        return view('backend.admin.setting.index')->with('data',$data);
    }
    public function createSetting() {
        return view('backend.admin.setting.create');
    }
    public function storeSetting(Request $request) {
           
        $this->validate(
            $request,
            [
                "name" => "required",
                "value" => "nullable",
                "upload" => "nullable",
            ]
        );
        $data = $request->all();
        if ($request->upload) {

            $data['value'] = "https://yotrip.vn/public/backend/uploads/images/".$request->upload->getClientOriginalName();
            $file = $request->upload->getClientOriginalName();
            $filePath = 'public/backend/uploads/images';

            $request->upload->move($filePath, $file);
        }
        $result = Config::create($data);
        if ($result) {
            request()->session()->flash('success', 'Successfully added Posts');
            return redirect('/settings');
        } else {
            request()->session()->flash('error', 'Error occurred while adding Posts');
        }
    }
    public function deleteSetting($id) {
        $config = Config::findOrFail($id);
        $config->delete();
        return redirect('/settings');
    }
    public function dasbroad(Request $request) {

        // TODO: Total book cars
        $cars = Cars::all();
        $cars_count = $cars->count();
        // TODO: Total all user active
        $users = User::where('status','active')->get();
        $users_count = $users->count();
        // TODO: Get car order data
        $booking = Bookings::all();
        $booking_count = $booking->count();
        
        return view('backend.dasbroad.main-content')->with(compact(
        'cars_count','users_count','booking_count'));
    }
    public function admin(Request $request) {
        $user_ip = Helper::getClientIPaddress(); /*ip host customers wifi*/
        //dd($user_ip);
        $early_last_month = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $end_of_last_month = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();

        $early_this_month = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $oneyears = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        /*total last month*/
        $vistor_of_lastmonth = Vistors::whereBetween('date_vistors',[$early_last_month,$end_of_last_month])
                            ->get();
        $vistor_last_month_count = $vistor_of_lastmonth->count();
        /*total this month*/
        $vistor_of_thismonth = Vistors::whereBetween('date_vistors',[$early_this_month,$now])
                            ->get();
        $vistor_this_month_count = $vistor_of_thismonth->count();
        /*total in one year*/
        $vistor_of_year = Vistors::whereBetween('date_vistors',[$oneyears,$now])
                        ->get();
        $vistor_year_count = $vistor_of_year->count();
        
        /*current online*/
        $current_online = Vistors::where('ip_address',$user_ip)->get();
        $count_online = $current_online->count();
        if($count_online < 1) {
            $vistors = new Vistors();
            $vistors->ip_address = $user_ip;
            $vistors->date_vistors = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
            $vistors->save();
        }
        /*Total vistor*/
        $vistors = Vistors::all();
        $vistors_total = $vistors->count();

        /*total cars*/
        $cars = Cars::all();
        $cars_count = $cars->count();
        /*Total buyer*/
        $users = User::where('status','active')->get();
        $users_count = $users->count();
        $booking = Bookings::all();
        $booking_count = $booking->count();
        // TODO: Calculate revenue by month:
        $revenueActive = Bookings::where('status' , 'active')
        ->whereMonth('created_at',date('m'))
        ->select(\DB::raw('sum(total_amount) as totalMoney'))
        ->first()->toArray();
        //dd($revenueActive);
        $revenueTrading = Bookings::where('status' , 'trading')
        ->whereMonth('created_at',date('m'))
        ->select(\DB::raw('sum(total_amount) as totalMoney'))
        ->first()->toArray();
        return view('backend.admin.car.index')->with(compact('count_online','vistor_last_month_count',
                    'vistor_this_month_count','vistor_year_count','vistors_total',
                    'cars_count','users_count','booking_count','revenueActive','revenueTrading'));
    }
    //User profile
    public function profile($id) {
        
         $profile = User::findOrFail($id);
         $payments = Payment::all();
        
         // return $profile;
         return view('backend.admin.user.profile')->with('profile', $profile)->with('payments', $payments);
    }
    // Trỏ đến google
    public function redirectToGoogle() {
        return Socialite::driver('google')->redirect();
    }
   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback() {
        try {

            $user = Socialite::driver('google')->stateless()->user();
            $finduser = User::where('email', $user->email)->first();
             // Mã giới thiệu
           $code = strtoupper(substr(md5(time()), 0, 6));
            if ($finduser) {

                Auth::login($finduser);

                return redirect('/');
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id' => $user->id,
                    'social_type' => "google",
                    'photo' => $user->avatar,
                    'received_code' => $code,
                    'password' => bcrypt($user->email)
                ]);

                Auth::login($newUser);
                return redirect('/');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}