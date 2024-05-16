<?php

namespace App\Modules\API_V1\Helpers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illiminate\Http\Response;

class Helper extends Controller
{
    static function api_get($url = "")
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "103.110.85.217:4000/api/v1" . $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        return json_decode($output);
    }
    static function api_post($url = "", $param)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "103.110.85.217:4000/api/v1" . $url);
        curl_setopt($curl, CURLOPT_POST, count($param));
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($param));
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($curl);
        curl_close($curl);
        return json_decode($output);
    }
    public static function getIpClient()
    {
        //whether ip is from share internet
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip_address = $_SERVER['HTTP_CLIENT_IP'];
        }
        //whether ip is from proxy
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        //whether ip is from remote address
        else {
            $ip_address = $_SERVER['REMOTE_ADDR'];
        }
        return $ip_address;
    }
    public static function getListDay()
    {
        $arrDay = [];
        $month = date('m');
        $years = date('Y');
        for($day = 1;$day <= 31;$day++) {
            $item = mktime(12,0,0,$month, $day ,$years);
            if(date('m',$item) == $month) 
            $arrDay[] = date('Y-m-d',$item);
        }
        return $arrDay;
    }
}