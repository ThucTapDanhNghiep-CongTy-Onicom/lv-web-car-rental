<?php

namespace App\Modules\API_V1\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Modules\API_V1\Models\Bookings_Model;
use App\Modules\API_V1\Models\Cars_Model;
use App\Modules\API_V1\Helpers\Helper;
use App\Modules\API_V1\Models\History_Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Mail;

class Booking extends Controller {
    /**
     * Displays the user's order history.
     * Must have customer booking status
     * Includes vehicle information and rating average
    */
    public function my_booking(Request $request) {
        if($request->user()) {
             $data = Bookings_Model::select('bookings.id','bookings.total_amount','bookings.time_start',
                                       'bookings.time_end','bookings.date_start','bookings.date_end',
                                       'bookings.status','cars.name','cars.photo','bookings.car_id')
                ->leftJoin('cars','cars.id','bookings.car_id')
                ->where('bookings.user_id','=',$request->user()->id)
                ->get();
            $res = array();
            foreach($data as $val) {
                //average rating
                $review = new Reviews();
                $rate = $review->average($val->car_id);
                array_push($res, [
                    'code_orders' => 'YT'.$val->id.'OD',
                    'name'        => $val->name,
                    'photo'        => $val->photo,
                    'total_amount' => number_format($val->total_amount),
                    'pick_up_day'   => $val->time_start.', '.date("d-m-Y", strtotime($val->date_start)),
                    'drop_off_day'     => $val->time_end.', '.date("d-m-Y", strtotime($val->date_end)),
                    'transaction_status' => $val-> status,
                    'average_rating' => $rate->original,
                ]);
            }
        } else {
            return response()->json([
                'status' => true,
                'msg' => 'Please login before viewing the service!',
            ]);
        }
       
        return response()->json([
            'status' => true,
            'msg' => 'Query successfully',
            'data' => $res,
        ]);
    }
    //Car booking form information and price.
    public function booking_car_information(Request $request) {
        $validator = Validator::make( //required
            $request->all(),
            [
                "cars_id" => "integer|required",
                "address" => "string|required",
                "address_off" => "string|required",
                "total_amount" => "integer|required",
                "date_start" => "string|required",
                "date_end" => "string|required",
                "time_start" => "string|required",
                "time_end" => "string|required",

            ],
            [
                "address.required" =>  "Address is required",
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "msg" => $validator->errors()
            ]);
        }
        $date_start = $request->date_start;
        $date_end = $request->date_end;
        if($date_start == $date_end) {
            $error = array("Duplicate times can't book!");
            return response()->json([
                'status' => false,
                'msg' => array(
                    'error' => $error,
                ),
            ]);
        } else {
            //check input time:
            $time_start = $request->time_start;
            $time_end = $request->time_end;
            //--- check start time ----//
            if ($time_start == "pm") {
                $h_time_start = (int)$time_start + 12;
                $m_time_start = $request->time_start;
                $time_start = $h_time_start . $m_time_start;
            } else {
                $time_start = $request->time_start;
            }
            //--- check end time ----//
            if ($time_end == "pm") {
                $h_time_end = (int)$time_end + 12;
                $m_time_end = $request->time_end;
                $time_end = $h_time_end . $m_time_end;
            } else {
                $time_end = $request->time_end;
            }     
        }
        $res_car_detail = Cars_Model::select('id','name','price','seat','photo','discount','status')
                    ->where('id',$request->cars_id)
                    ->first();
        $booking = new Bookings_Model();
        $booking->users_id = $request->user()->id;
        $booking->cars_id = $res_car_detail->id;
        $booking->address_on = $request->address;
        $booking->address_off = $request->address_off;
        $booking->date_start = $date_start;
        $booking->date_end = $date_end;
        $booking->time_start = $time_start;
        $booking->time_end = $time_end;
        $booking->total_amount = $request->total_amount;
        $booking->status = 'trading';
        $booking->save();
        //Save your booking history:
        $history = new History_Model();
        $history->users_id = $request->user()->id;
        $history->bookings_id = $booking->id;
        $history->status = 'inactive';
        $history->save();
        //dd($res_car_detail->id);
        return response()->json([
            'status' => true,
            'msg' => 'Successful car booking',
        ]);
    }
}