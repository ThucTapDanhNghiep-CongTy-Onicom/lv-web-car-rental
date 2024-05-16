<?php

namespace App\Helpers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illiminate\Http\Response;

class Helper extends Controller
{
    public static function create_slug($str) {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str); 
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str); 
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str); 
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str); 
        $str = preg_replace('/(đ)/', 'd', $str); 
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str); 
        $str = preg_replace('/([\s]+)/', '-', $str);   
        return $str;
    }
    public static function getClientIPaddress() {

        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
            $client  = @$_SERVER['HTTP_CLIENT_IP'];
            $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
            $remote  = $_SERVER['REMOTE_ADDR'];
     
            if(filter_var($client, FILTER_VALIDATE_IP)){
                $clientIp = $client;
            }
            elseif(filter_var($forward, FILTER_VALIDATE_IP)){
                $clientIp = $forward;
            }
            else{
                $clientIp = $remote;
            }
     
        return $clientIp;
    }
}
