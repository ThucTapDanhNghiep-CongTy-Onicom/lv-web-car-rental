<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\User;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editUser(Request $request, $id)
    {
        $users = User::findOrFail($id);
        $data = $request->all();
        if ($request->photo) {
            $data['photo'] = $request->photo->getClientOriginalName();
            $file = $request->photo->getClientOriginalName();
            $filePath = 'public/backend/uploads/images/users';
            $request->photo->move($filePath, $file);
        }
        //Kiểm tra ảnh có phải là ảnh của google hay fb hông
        if (strpos($request->photo->getClientOriginalName(), 'https://lh3') === false || strpos($request->photo->getClientOriginalName(), 'https://graph.facebook.com') === false ) {
            $data['photo'] = "https://yotrip.vn/public/backend/uploads/images/users/".$request->photo->getClientOriginalName();
        }
        //Lưu dữ liệu xuống database và kiểm tra
        $users->fill($data)->save();
       
    }
    public function updateProfileAdmin(Request $request)
    {
        $users = User::findOrFail($id);
        $data = $request->all();
        if ($request->photo) {
            $data['photo'] = $request->photo->getClientOriginalName();
            $file = $request->photo->getClientOriginalName();
            $filePath = 'public/backend/uploads/images/users';
            $request->photo->move($filePath, $file);
        }
        //Lưu dữ liệu xuống database và kiểm tra
        $users->fill($data)->save();
        if ($status) {
            request()->session()->flash('success', 'user successfully updated');
        } else {
            request()->session()->flash('error', 'Error occurred, Please try again!');
        }
        return redirect()->route('user.profile');
    }
    public function index()
    {
        $users = json_decode(Http::get('http://yotrip.vn/api/user'));
        return view('backend.admin.user.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|required|max:30',
            'email' => 'string|required|unique:users',
            'password' => 'string|required',
            'role' => 'required|in:user,mod',
        ]);
        $data = $request->all();
        $user = User::create($data);
        return response()->json($user, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view('backend.admin.user.edit')->with('users', $users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $users = User::findOrFail($id);
       
        //Kiểm tra request -> trả về error
        $this->validate($request, [
            'name' => 'string|required|max:30',
            'role' => 'required|in:admin,user,mod',
        ]);
       
        $data = $request->all();
        $users['role'] = $request->role;
       
        if ($request->upload) {

            $data['photo'] = $request->upload->getClientOriginalName();
            $file = $request->upload->getClientOriginalName();
            $filePath = 'public/backend/uploads/images/users';

            $request->upload->move($filePath, $file);
        }
        
        //Lưu dữ liệu xuống database và kiểm tra
        $users->save();
        $status = $users->fill($data)->save();
        
        if ($status) {
            request()->session()->flash('success', 'user successfully updated');
        } else {
            request()->session()->flash('error', 'Error occurred, Please try again!');
        }
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $response = Http::post('https://yotrip.vn/api/update-user/'.$id);
        if ($response->status() == "201") {
            return redirect()->route('user.index');
        }
    }
     //Doi pass user
     public function changPasswordStore(Request $request)
     {
         $request->validate([
             'current_password' => ['required', new MatchOldPassword],
             'new_password' => ['required'],
             'new_confirm_password' => ['same:new_password'],
         ]);
 
         User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
         request()->session()->flash('success', 'Password successfully changed');
         return redirect('/');
     }




    public function apiUpdate(Request $request , $id)
    {  
        $user = User::findOrFail($id);
        $this->validate(
              $request,
              [
                'name' => 'string|required|max:30',
                'role' => 'required|in:admin,user,mod',
              ]
           );
          if ($request->photo) {
              $file = $photo->getClientOriginalExtension();
            if ($file == "png" || $file == "jpeg" || $file == "jpg") {
                $file = $request->photo->getClientOriginalName();
                $filePath = 'public\backend\uploads\images\users';
                $request->photo->move($filePath, $file);
            } else {
                return response()->json(404, 'Upload Faild , only upload .png,.jpg,jpeg ');
            }
            
          }
        
          $user->photo = $request->photo->getClientOriginalName();
          $user->name = $request->name;
          $user->email = $request->email;
          $user->role = $request->role;
          $user->phone = $request->phone;
          $user->gender = $request->$gender;
          $user->address = $request->address;
          $status = $user->save();
        
          if ($status) {
              return response()->json($user, 200);
          }
        
    }
    public function apiShow()
    {
        $user = User::all();
        return response()->json($user, 200);
    }
    public function apiDelete($id)
    {
       $user = User::findOrFail($id);
       $user->delete();
       //204 No content
       return response()->json("Delete Success", 201);
    }
}