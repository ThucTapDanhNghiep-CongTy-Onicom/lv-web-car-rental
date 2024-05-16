<?php

namespace App\Modules\API_V1\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Modules\API_V1\Models\Admins_Model;
use App\Modules\API_V1\Models\Users_Model;
use App\Modules\API_V1\Models\Bookings_Model;
use App\Modules\API_V1\Helpers\Helper;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Admin extends Controller {

    //Line chart statistics: Account of registered and unauthenticated users
    public function statistical() {
        $years1 = DB::select('SELECT YEAR(created_at) as years ,MONTH(created_at) as month , status FROM `la_users` GROUP BY month');
        $Quy1 = DB::select('SELECT DISTINCT id ,created_at
                FROM `la_users` WHERE  MONTH(created_at) BETWEEN 1 AND 2');     
        $Quy2 = DB::select('SELECT DISTINCT id ,created_at
            FROM `la_users` WHERE  MONTH(created_at) BETWEEN 3 AND 6  ');
        $Quy3 = DB::select('SELECT DISTINCT id ,created_at
            FROM `la_users` WHERE  MONTH(created_at) BETWEEN 7 AND 9  ');
        $Quy4 = DB::select('SELECT DISTINCT id ,created_at
            FROM `la_users` WHERE  MONTH(created_at) BETWEEN 10 AND 12  ');
        $data = array();
        $Q = 0;
        
        foreach($years1 as $val) {
            $Active = 0;
            $Inactive = 0;
            if($val->status == 'active') {
                if($val->month >= 1 && $val->month <= 2) {
                    $Active = count($Quy1);
                    $Q = 1;
                } elseif($val->month >= 3 && $val->month <= 6) {
                    $Q = 2;
                    $Active = count($Quy2);
                } elseif($val->month >= 7 && $val->month <= 9) {
                    $Q = 3;
                    $Active = count($Quy3);
                } elseif($val->month >= 10 && $val->month <= 12) {
                    $Q = 4;
                    $Active = count($Quy4);
                }
            } elseif($val->status == 'inactive') {
                if($val->month >= 1 && $val->month <= 2) {
                    $Q = 1;
                    $Inactive = count($Quy1);
                } elseif($val->month >= 3 && $val->month <= 6) {
                    $Q = 2;
                    $Inactive = count($Quy2);
                } elseif($val->month >= 7 && $val->month <= 9) {
                    $Q = 3;
                    $Inactive = count($Quy3);
                } elseif($val->month >= 10 && $val->month <= 12) {
                    $Q = 4;
                    $Inactive = count($Quy4);
                }
            }
            
            array_push($data,[
                'y' => $val->years . ' Q' . $Q,
                'Active' => $Active,
                'Inactive' => $Inactive
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $data,
        ]);
    }
    /*public function register(Request $request) {
        $admin = new Admins_Model;
        $admin->email = "api_admin@gmail.com";
        $admin->password = Hash::make(empty($request->password)?"123":$request->password);
        $admin->type = 0; // 0 is normal, 1 is dev
        $admin->fullname = "luan";
        $admin->gender = "1";
        $admin->status = 1;
        $admin->remember_token = "";
        $status = $admin->save();
    }*/
    /*public function login(Request $request) {
        if (Auth::guard("admin")->attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::guard("admin")->user();
            $message['token'] = $user->createToken('App_Tourism')->accessToken;
            return response()->json(['status'=>true,"msg"=>$message]);
           //echo "aaaa";
        } else {
            return response()->json(['status'=>false,"msg"=>'Unauthorised ']);
        }
    }*/
    //Statistics for sugar quiz: How much is the order status and revenue.
    public function revenue() {
        $time = Helper::getListDay();
        //TODO: Doanh thu theo tháng
        $revenueActive = Bookings_Model::where('status' , 'active')
                   //->whereMonth('created_at',date('m'))
                   ->select(\DB::raw('sum(total_amount) as totalMoney'), \DB::raw('DATE(created_at) as day'))
                   ->groupBy('day')
                   ->get();
        // TODO: Doanh thu chưa nhận
        $revenueTranding = Bookings_Model::where('status' , 'trading')
                   //->whereMonth('created_at',date('m'))
                   ->select(\DB::raw('sum(total_amount) as totalMoney'), \DB::raw('DATE(created_at) as day'))
                   ->groupBy('day')
                   ->get();
      
        $data = array();
        foreach($time as $day) {
            $active = 0;
            foreach($revenueActive as $val) {
                if($val->day == $day) {
                    $active = $val->totalMoney;
                    break;
                }
            }
            $tranding = 0;
            foreach($revenueTranding as $key) {
                if($key->day == $day) {
                    $tranding = $key->totalMoney;
                    break;
                }
            }
            array_push($data, [
                'Time' => $day,
                'Ac' => $active,
                'Tr' => $tranding
            ]);
        }
       
        return response()->json([
            'status'=>true,
            'data' => $data
        ]);
        
    }
}