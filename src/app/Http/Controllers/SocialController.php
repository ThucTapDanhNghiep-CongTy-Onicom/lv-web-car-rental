<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Socialite;


class SocialController extends Controller
{
    public function getInfo($social)
    {
        return Socialite::driver($social)->redirect();
    }
    public function checkInfo($social)
    {
        try {
            $user = Socialite::driver($social)->user();
            $finduser = User::where('email',$user->email)->first();
             // Mã giới thiệu
            $code = strtoupper(substr(md5(time()), 0, 6));
            if ($finduser) {
                Auth::login($finduser);
                return redirect('/');
            }else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_type' => "facebook",
                    'social_id' => $user->id,
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
    // Facebook:
    public function checkInfoFacebook($social)
    {
        try {
            //Socialite: 
            $user = Socialite::driver($social)->user();
            $finduser = User::where('social_id', $user->id)->first();
            
            //Mã giới thiệu:
            $code = strtoupper(substr(md5(time()), 0, 8));
             if ($finduser) {

                Auth::login($finduser);                
                return response()->json([
                    'status' => true,
                    "msg" => "Logged in successfully",
                ]);
            }else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_type' => "facebook",
                    'social_id' => $user->id,
                    'photo' => $user->avatar,
                    'received_code' => $code,
                    'password' => bcrypt($user->email)
                ]);

                $data = Auth::login($newUser);
                return response()->json([
                    'status' => true,
                    "msg" => "Logged in successfully",
                    "data" => $data,
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                "msg" => $e->getMessage(),
            ]);
        }
    }
}
