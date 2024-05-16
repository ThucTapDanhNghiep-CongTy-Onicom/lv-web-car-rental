<?php

namespace App\Modules\API_V1\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Modules\API_V1\Models\Users_Model;
use App\Modules\API_V1\Models\Whishlists_Model;
use App\Modules\API_V1\Models\HistoryPlaces_Model;
use App\Modules\API_V1\Models\Otp_Model;
use App\Modules\API_V1\Models\City_Model;
use App\Modules\API_V1\Models\Location_Model;
use App\Modules\API_V1\Helpers\Helper;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use App\User;
class Users extends Controller
{
    //Customer Profile in app
    public function profile(Request $request) {
        // $users = Users_Model::find($request->id);
        $users = $request->user();
        if(!is_null($users)) {
            return response()->json([
                "status" => true,
                "msg" => 'Successful access',
                "data" => [
                    "name" => $users->name,
                    "gender" => $users->gender,
                    "birthday" => $users->birthday,
                    "city" => $users->address
                ],
            ]);
            
        } else {
            return response()->json([
                'status' => false,
                'msg'    => 'You are not logged in',
            ]);
            
        }
        
    }
    //Build login through social network
    public function social(Request $request) {
        $validator = Validator::make(
            $request->all(),
            [
                "name" => "required",
                "email" => "required",
                "photo" => "required",
                "social_id" => "required",
                "social_type"  => "required"

            ]
        );
        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "error" => $validator->errors()
            ]);
        }

        $finduser = User::where('email', $request->email)->first();
        if ($finduser) {

            $tokenResult = $finduser->createToken('authToken')->plainTextToken;

            return response()->json([
                'status' => false,
                'msg' => 'Email already exists!',
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
            ]);
        }else {
            // Mã giới thiệu
            $code = strtoupper(substr(md5(time()), 0, 6));
            $newUser = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'social_type' => $request->social_type,
                'social_id' => $request->social_id,
                'photo' => $request->photo,
                'received_code' => $code,
                'password' => bcrypt($request->email)
            ]);

            $tokenResult = $newUser->createToken('authToken')->plainTextToken;

            return response()->json([
                'status_code' => 200,
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
            ]);
        }
    }
    //User login feature using token authentication
    public function login(Request $request) {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'email' => 'email|required|string',
                    'password' => 'required|string',
                    'devices' => 'required'
                ],
                [
                    "email.required" => "Email is required",
                    "email.email" => "Your email is not valid",
                    "password.required" => "Password is required",
                    "devices.required" => "Devices is required",
                ]
            );
            if ($validator->fails()) {
                return response()->json([
                    "status" => false,
                    "error" => $validator->errors()
                ]);
            }

            $user = User::where('email', $request->email)->first();
            if(empty($user)) {
                return response()->json([
                    'status' => false,
                    'msg' => 'Email does not exist',
                ]);
            }
            if (!Hash::check($request->password, $user->password, [])) {
                throw new \Exception('The email or password is incorrect or your account has been blocked.');
            }

            $tokenResult = $user->createToken($request->devices)->plainTextToken;

            return response()->json([
                'status' => true,
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
            ]);
        } catch (\Exception $error) {
            return response()->json([
                'status' => false,
                'msg' => 'The email or password is incorrect or your account has been blocked.',
            ]);
        }
    }
    //Display a list of users via token
    public function index(Request $request) {
        $data = Users_Model::select('id','name','email',
                    'phone','gender','photo','status')->get();
        return response()->json([
            'status' => true,
            'msg' => 'Query successful',
            'data' => $data,
            
        ]);
    }
    //Login error message
    public function error(Request $request){
        return response()->json([
            'status' => false,
            "msg" => "Unauthenticated",
        ]);
    }
    //Account logout feature through token deletion
    public function logout(Request $request){
        //Auth::guard("api")->tokens()->delete();
        //auth()->user()->tokens()->delete();
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'status' => true,
            "msg" => "users logout",
            //"data" => $request->user()
        ]);
    }
    //User registration feature by sending otp code to user email.
    public function create(Request $request){
        
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $email_active = DB::table('users')->where('email', $request->email)->first();
        if ($email_active == null) {
            $dataAll = $request->all();
            $otp = rand(1000, 9999);
            $data = [
                'otp' => $otp,
            ];
            $otpemail = new Otp_Model();
            $otpemail['email'] = $request->email;
            $otpemail['otp'] = $otp;
            $otpemail['start_time'] = date('Y-m-d H:i');
            $otpemail['end_time'] = date("Y-m-d H:i", strtotime('+5 minute', strtotime(date("Y-m-d H:i"))));
            $otpemail->save();
            Mail::send('login.sendmail', $data, function ($message) use ($dataAll) {
                $message->from('phantinh1209@gmail.com', 'Xác thực tài khoản thuê xe');
                $message->to($dataAll['email']);
                $message->subject('Thư xác thực tài khoản thuê xe');
            });
            return response()->json([
                'status'  => true,
                'message' => 'Successfully Send OTP ',
            ], 201);
        } else {
            return response()->json([
                'status' => false,
                'error' => 'Email already exist',
            ], 400);
        }
    }
    //Successful registration through the otp code just received
    public function register(Request $request) {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $data = $request->all();
        $otp = [
            'otp' => $request->otpRegister,
        ];
        // Mã giới thiệu
        $code = strtoupper(substr(md5(time()), 0, 6));
        $otpemail = Otp_Model::where('email',$request->email)
                            ->orderBy('id' , 'desc')->first();
        if (isset($otpemail)) {
            if (strtotime($otpemail->end_time) >= strtotime(date('Y-m-d H:i'))) {
                if ($request->otp == $otpemail->otp) {
                    $data['name'] = $request->name;
                    $data['email'] = $request->email;
                    $data['password'] = bcrypt($request->password);
                    $data['phone'] = $request->phone;
                    $data['otp'] = $request->otp;
                    $data['received_code'] = $code;
                    $data['referral_code'] = $request->referral_code;

                    $status = User::create($data);
                    if ($status) {
                        return response()->json([
                            'status' => true,
                            'msg' => 'Successfully registered! Please confirm your email!',
                        ]);
                    }
                } else {
                    return response()->json([
                        'status' => false,
                        'error' => 'Wrong OTP',
                    ]);
                }
            } else {
                Otp_Model::where('email', $request->email)->delete();
                return response()->json([
                    'status' => false,
                    'code' => 400,
                    'msg' => 'OTP expired',
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'code' => 400,
                'error' => 'Please re-enter email and get otp',
            ]);
        }
    }
    //Display user information through token
    public function findUsers(Request $request) {
        // $users = Users_Model::find($request->id);
        $users = $request->user();
        if(!is_null($users)) {
            return response()->json([
                "status" => true,
                "msg" => 'Successful access',
                "data" => [
                    "name" => $users->name,
                    "email"=> $users->email,
                    "phone" => $users->phone,
                    "gender" => $users->gender,
                    "birthday" => $users->birthday,
                    "photo" => $users->photo,
                    "country_users" => $users->country_users
                ],
            ]);
            
        } else {
            return response()->json([
                'status' => false,
                'msg'    => 'You are not logged in',
            ]);
           
        }
        
    }
    //Update user profile: include name, gender, address, date of birth
    public function updateProfile(Request $request) {
        $validator = Validator::make(
            $request->all(),
            [
                "name"  => "required",
                "gender" => "required",
                "address"  => "required", 
                "birthday"  => "required", 
            ],
            [
                "name.required" => "Name is required",
                "gender.required" => "Gender is required",
                "city.required" => "City is required",
                "birthday.required" => "Birthday is required",
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "error" => $validator->errors()
            ]);
        }
        if(empty($request->user()->email)) {   
            return response()->json([
                "status" => false,
                "msg" => "Token does not exist",
            ]);
        }
        Users_Model::where("email", $request->user()->email)
            ->update(['name' => $request->name,'gender' => $request->gender,
            'address' => $request->address,'birthday' => $request->birthday]);
        return response()->json([
            'status' => true,
            "msg" => "Update successful"
        ]);
    }
    //Update user's image
    public function updatePhoto(Request $request) {
        // $settings = config('global.settings');
        $validator = Validator::make(
            $request->all(),
            [
                "photo" => "required",
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "msg" => 'Photo is required'
            ]);
        }
        if(empty($request->user()->email)) {   
            return response()->json([
                "status" => false,
                "msg" => "Token does not exist",
            ]);
        }
        $users = Users_Model::where("email", $request->user()->email)->first();
        if(!empty($users)) {
            if ($request->photo) {
                $data['photo'] = $request->photo->getClientOriginalName();
                $file = $request->photo->getClientOriginalName();
                $filePath = 'public/backend/uploads/images/users';
                $request->photo->move($filePath, $file);
                //Lưu dữ liệu xuống database và kiểm tra
                if (strpos($request->photo->getClientOriginalName(), 'https://lh3') === false) {
                    $data['photo'] = "https://yotrip.vn/public/backend/uploads/images/users/".$request->photo->getClientOriginalName();
                }
            }else{
                $data['photo'] = $request->photo;
            }
        }
        $users->fill($data)->save();
        //Users_Model::where("email", $request->email)->update(['photo' => $file_name]);
        return response()->json([
            "status" => true,
            "msg" => "Update successful",
            "data" => $data['photo']
        ]);
    }
    //Update phone numbers for users
    public function updatePhone(Request $request) {
        $validator = Validator::make(
            $request->all(),
            [
                "phone" => "required",
            ],
            [
                "phone.required" => "Phone is required",
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "error" => $validator->errors()
            ]);
        }
        if(empty($request->user()->email)) {   
            return response()->json([
                "status" => false,
                "msg" => "Token does not exist",
            ]);
        }
        Users_Model::where("email", $request->user()->email)
            ->update(['phone' => $request->phone]);
        return response()->json([
            'status' => true,
            "msg" => "Update successful"
        ]);
    }
    //Password change feature
    public function changePassword(Request $request) {
        $validator = null;
        if ($request->isForgotpassword) {
            $validator = Validator::make(
                $request->all(),
                [
                    "isForgotpassword" => "required",
                    "password" => "required|min:6",
                    "password_confirm" => "required|same:password",

                ],
                [
                    
                    "password.required" => "Password is required",
                    "password.min" => "Password must be at least 6 characters",
                    "password_confirm.required" =>  "Password confirm is required",
                    "password_confirm.same" => "Confirmation password does not match",
                ]
            );
        } else {
            $validator = Validator::make(
                $request->all(),
                [
                    "password" => "required|min:6",
                    "password_confirm" => "required|same:password",
                    "password_old" =>  "required"
                ],
                [
                    "password.required" => "Password is required",
                    "password.min" =>  "Password must be at least 6 characters",
                    "password_confirm.required" => "Password confirm is required",
                    "password_confirm.same" =>  "Confirmation password does not match",
                    "password_old.required" =>  "Please enter the current password"
                ]
            );
        }
        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "error" => $validator->errors()
            ]);
        }
        if(empty($request->user()->email)) {   
            return response()->json([
                "status" => false,
                "msg" => "Token does not exist",
            ]);
        }
        $users = Users_Model::where("email", $request->user()->email)->first();
        if (empty($users)) {
            return response()->json([
                "status" => false,
                "msg" => "Email does not exist",
            ]);
        }
        if ($request->isForgotpassword) {
            Users_Model::find($users->id)
                ->update([
                    'password_reset' => "",
                    "password" => Hash::make($request->password_confirm)
                ]);
            return response()->json([
                "status" => true,
                "msg" =>  "Change password successfully"
            ]);
        } else {
            if (Hash::check($request->password_old, $users->password)) {
                Users_Model::find($users->id)
                    ->update([
                        "password" => Hash::make($request->password_confirm)
                    ]);
                return response()->json([
                    "status" => true,
                    "msg" =>  "Change password successfully"
                ]);
            } else {
                return response()->json([
                    "status" => false,
                    "error" => ["password_old" => ["Current password is incorrect"]],
                ]);
            }
        }
    }
    //Forgot password feature via email
    public function forgotPassword_SendMail(Request $request) {
        $input = $request->all();
        $rules = array(
            'email' => "required|email",
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $arr = array(
                "status" => 400,
                "message" => $validator->errors()->first(),
                "data" => array());
        } else {
            try {
                $response = Password::sendResetLink($request->only('email'), function (Message $message) {
                    $message->subject($this->getEmailSubject());
                });
                switch ($response) {
                    case Password::RESET_LINK_SENT:
                        return \Response::json(
                            array(
                                "status" => true, 
                                "message" => trans($response)));
                    case Password::INVALID_USER:
                        return \Response::json(
                            array(
                                "status" => false, 
                                "message" => trans($response)));
                }
            } catch (\Swift_TransportException $ex) {
                $arr = array(
                    "status" => false, 
                    "message" => $ex->getMessage(), 
                    );
            } catch (Exception $ex) {
                $arr = array(
                    "status" => false, 
                    "message" => $ex->getMessage(), 
                    );
            }
        }
        return \Response::json($arr);
    }
    // [post] detail chi tiết xe yêu thích:
    public function detail_favorite(Request $request) {
        if($request->user()) {
            $check = Whishlists_Model::where(['cars_id' => $request->vehicle_id_code,'users_id' => $request->user()->id])->count();
            //dd($check);
            if($check == '0') {
                return response()->json([
                    'status'=> false,
                    'msg' => 'List is empty',
                    'check' => 0,
                ]);
            } else {
                return response()->json([
                    'status'=> true,
                    'msg' => 'Test success!',
                    'check' => 1,
                ]);
            }
        }
        
    }
    // [post] list of saved places
    public function places(Request $request) {
        $users = Users_Model::where('id', $request->user()->id)->first();
        if(empty($users)) {
            return response()->json([
                'status' => false,
                "msg" => "The request was not accepted. Because you are not logged in!!"
            ]);
        }
        $places = HistoryPlaces_Model::select('history_places.id','history_places.address','history_places.full_address',
            'users.name','city.title as city_title','region.title as region_title','history_places.status',
            'history_places.created_at')
            ->join('users','history_places.users_id','users.id')
            ->join('city','history_places.city_id','city.id')
            ->join('region','history_places.region_id','region.id')
            ->where('history_places.users_id',$users->id)
            ->get();
        $data = array();
        foreach($places as $place) {
            array_push($data, [
                'id' => $place->id,
                'address' => $place->address,
                'full_address' => $place->full_address,
                'name' => $place->name,
                'city_title' => trim($place->city_title,"\r\n"),
                'region_title' => trim($place->region_title,"\r\n"),
                'status' => $place->status,
                'save_date' => $place->created_at,
            ]);
        }
        return response()->json([
            'status' => true,
            "msg" => "Query successful",
            "data" => $data
        ]);
    }
    //Save the user's search location:
    public function save_place(Request $request) {
        $validator = Validator::make(
            $request->all(),
            [   
                'address' => 'required|string',
                'district' => 'required|string',
                'province' => 'required|string',
                'location_lat' => 'required|string',
                'location_lng' => 'required|string',
            ],
        );
        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "error" => $validator->errors()
            ]);
        }
        //$users = Users_Model::where('id', $request->user()->id)->first();
        if(empty($request->user()->id)) {
            return response()->json([
                'status' => false,
                "msg" => "The request was not accepted. Because you are not logged in!!"
            ]);
        }
        // Quận/huyện -> city_id
        $city = City_Model::where('title','like','%'.$request->district.'%')->first();
        // Thành phố -> region_id
        $region = Location_Model::where('region.title','like','%'.trim(str_replace( 'Thành phố','', $request->province )).'%')->first();
        // dd(trim(str_replace( 'Thành phố','', $request->province )));
        // Kiểm tra dữ liệu đã tồn tại địa chỉ đó chưa
        $history = HistoryPlaces_Model::where('users_id',$request->user()->id)
                ->where('address','like','%'.$request->address.'%')
                ->first();
        if(!empty($history->address)) {
            return response()->json([
                'status' => true,
                "msg" => "Address already exists - Please enter a good locationc!"
            ]);
        }
        $place = new HistoryPlaces_Model;
        $place->users_id = $request->user()->id;
        $place->address = $request->address;
        $place->city_id = $city->id;
        $place->region_id = $region->id;
        $place->location_lat = $request->location_lat;
        $place->location_lng = $request->location_lng;
        $place->full_address = ($request->full_address) ? $request->full_address : null;
        $place->save();
        if($place) {
            return response()->json([
                'status' => true,
                "msg" => "Saved address successfully!"
            ]);
        } else {
            return response()->json([
                'status' => false,
                "msg" => "Save failed!"
            ]);
        }
        
    }
    // Delete saved addresses:
    public function delete_place(Request $request) {
        $user = Users_Model::where('id',$request->user()->id)
            ->where('email',$request->user()->email)
            ->first();
        if($user) {
            $delete = HistoryPlaces_Model::where('id',$request->place_id)->delete();
            if($delete) {
                return response()->json([
                    'status' => true,
                    'msg' => 'Delete successfully',
                ]);
            }
            return response()->json([
                'status' => false,
                'msg' => 'Delete fail!',
            ]);
        }
        return response()->json([
            'status' => false,
            'msg' => 'User does not exist or due to your email!!',
        ]);
    }
    // public function forgotPassword_SendMail(Request $request)
    // {
    //     $validator = Validator::make(
    //         $request->all(),
    //         [
    //             "email" => "required|email",
    //             "language" => "required",
    //         ],
    //         [
    //             "email.required" => $request->language == "vi" ? "Vui lòng nhập email" : "Email is required",
    //             "email.email" => $request->language == "vi" ? "Email không đúng định dạng" : "Your email is not valid",
    //         ]
    //     );
    //     if ($validator->fails()) {
    //         return response()->json([
    //             "status" => false,
    //             "error" => $validator->errors()
    //         ]);
    //     }
    //     $users = Users_Model::where("email", $request->email)->first();
    //     if (empty($users)) {
    //         return response()->json([
    //             "status" => false,
    //             "error" => ["email" => [$request->language == "vi" ? "Email này chưa được đăng ký" : "This email isn't registered"]]
    //         ]);
    //     }
    //     $code = $this->generateRandomString(6);
    //     Users_Model::find($users->id)->update(['password_reset' => $code]);
    //     $email = $request->email;
    //     if ($request->language == "vi") {
    //         Mail::send('API::email.forgotpassword_vi', [
    //             'email' => $email,
    //             'reset_code' => $code //$confirmation_code
    //         ], function ($message) use ($email) {
    //             $message->from('noreply@visithcmc.vn', 'HCMC Tourism');
    //             $message->to($email)->subject("Yêu cầu đặt lại mật khẩu");
    //         });
    //         return response()->json([
    //             "status" => true,
    //             "msg" => "Đã gửi yêu cầu, vui lòng kiểm tra email."
    //         ]);
    //     } else {
    //         Mail::send("API::email.forgotpassword_en", [
    //             'email' => $email,
    //             'reset_code' => $code //$confirmation_code
    //         ], function ($message) use ($email) {
    //             $message->from('noreply@visithcmc.vn', 'HCMC Tourism');
    //             $message->to($email)->subject("Request a password reset");
    //         });
    //         return response()->json([
    //             "status" => true,
    //             "msg" => "Request sent, please check email."
    //         ]);
    //     }
    // }


    // public function forgotPassword_checkcode(Request $request)
    // {
    //     $validator = Validator::make(
    //         $request->all(),
    //         [
    //             "email" => "required|email",
    //             "language" => "required",
    //             "code" => "required",
    //         ],
    //         [
    //             "code.required" => $request->language == "vi" ? "Vui lòng nhập mã" : "Code is required"
    //         ]
    //     );
    //     if ($validator->fails()) {
    //         return response()->json([
    //             "status" => false,
    //             "error" => $validator->errors()
    //         ]);
    //     }
    //     $users = Users_Model::where("email", $request->email)->where("password_reset", $request->code)->first();
    //     if (empty($users)) {
    //         return response()->json([
    //             "status" => false,
    //             "msg" => $request->language == "vi" ? "Mã được yêu cầu không chính xác." : "The requested code is incorrect.",
    //             "error" => ["code" => [$request->language == "vi" ? "Mã được yêu cầu không chính xác." : "The requested code is incorrect."]]
    //         ]);
    //     } else {
    //         return response()->json([
    //             "status" => true,
    //             "msg" => "Success!"
    //         ]);
    //     }
    // }

    // public function changePassword(Request $request)
    // {
    //     $validator = null;
    //     if ($request->isForgotpassword) {
    //         $validator = Validator::make(
    //             $request->all(),
    //             [
    //                 "email" => "required|email",
    //                 "language" => "required",
    //                 "isForgotpassword" => "required",
    //                 "password" => "required|min:6",
    //                 "password_confirm" => "required|same:password",

    //             ],
    //             [
    //                 "code.required" => $request->language == "vi" ? "Vui lòng nhập mã" : "Code is required",
    //                 "password.required" => $request->language == "vi" ? 'Vui lòng nhập mật khẩu' : "Password is required",
    //                 "password.min" => $request->language == "vi" ? "Mật khẩu ít nhất 6 ký tự" : "Password must be at least 6 characters",
    //                 "password_confirm.required" => $request->language == "vi" ? "Vui lòng nhập lại mật khẩu" : "Password confirm is required",
    //                 "password_confirm.same" => $request->language == "vi" ? "Nhập lại mật khẩu không đúng" : "Confirmation password does not match",
    //             ]
    //         );
    //     } else {
    //         $validator = Validator::make(
    //             $request->all(),
    //             [
    //                 "email" => "required|email",
    //                 "language" => "required",
    //                 "password" => "required|min:6",
    //                 "password_confirm" => "required|same:password",
    //                 "password_old" =>  "required"
    //             ],
    //             [
    //                 "password.required" => $request->language == "vi" ? 'Vui lòng nhập mật khẩu' : "Password is required",
    //                 "password.min" => $request->language == "vi" ? "Mật khẩu ít nhất 6 ký tự" : "Password must be at least 6 characters",
    //                 "password_confirm.required" => $request->language == "vi" ? "Vui lòng nhập lại mật khẩu" : "Password confirm is required",
    //                 "password_confirm.same" => $request->language == "vi" ? "Nhập lại mật khẩu không đúng" : "Confirmation password does not match",
    //                 "password_old.required" => $request->language == "vi" ? "Vui lòng nhập mật khẩu hiện tại" : "Please enter the current password"
    //             ]
    //         );
    //     }
    //     if ($validator->fails()) {
    //         return response()->json([
    //             "status" => false,
    //             "error" => $validator->errors()
    //         ]);
    //     }
    //     $users = Users_Model::where("email", $request->email)->first();
    //     if (empty($users)) {
    //         return response()->json([
    //             "status" => false,
    //             "msg" => $request->language == "vi" ? "Email không tồn tại" : "Email does not exist",
    //         ]);
    //     }
    //     if ($request->isForgotpassword) {
    //         Users_Model::find($users->id)
    //             ->update([
    //                 'password_reset' => "",
    //                 "password" => Hash::make($request->password_confirm)
    //             ]);
    //         return response()->json([
    //             "status" => true,
    //             "msg" => $request->language == "vi" ? "Thay đổi mật khẩu thành công" : "Change password successfully"
    //         ]);
    //     } else {
    //         if (Hash::check($request->password_old, $users->password)) {
    //             Users_Model::find($users->id)
    //                 ->update([
    //                     "password" => Hash::make($request->password_confirm)
    //                 ]);
    //             return response()->json([
    //                 "status" => true,
    //                 "msg" => $request->language == "vi" ? "Thay đổi mật khẩu thành công" : "Change password successfully"
    //             ]);
    //         } else {
    //             return response()->json([
    //                 "status" => false,
    //                 "error" => ["password_old" => [$request->language == "vi" ? "Mật khẩu hiện tại không đúng" : "Current password is incorrect"]],
    //             ]);
    //         }
    //     }
    // }

    // private function generateRandomString($length = 10)
    // {
    //     return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
    // }

   
}