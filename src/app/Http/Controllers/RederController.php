<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Reders;

class RederController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reders = json_decode(Http::get('https://yotrip.vn/api/reder'));
        return view('backend.admin.reder.index')->with('reders',$reders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.reder.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->upload) {

            $data['photo'] = "https://yotrip.vn/public/backend/uploads/images/renders/".$request->upload->getClientOriginalName();
            $file = $request->upload->getClientOriginalName();
            $filePath = 'public/backend/uploads/images/renders';

            $request->upload->move($filePath, $file);
        }

        $status = Reders::create($data);
        if ($status) {
            request()->session()->flash('success', 'Successfully added Posts');
            return redirect()->route('reder.index');
        } else {
            request()->session()->flash('error', 'Error occurred while adding Posts');
        }
        // $request->validate([
        //     'manu_name' => 'string|required',
        // ]);
        
        // $response = Http::post('http://yotrip.vn/api/reder', [
        //     'manu_name' => $request->manu_name,
        //     'img' => 'ádasdsad',
        //     'description' => $request->description,
        //     'feature' => $request->feature,
        // ]);
        // // dd($response->body());
        // if ($response->status() == "201") {
        //     return redirect()->route('reder.index');
        // }
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
        $reders = Reders::findOrFail($id);
        return view('backend.admin.reder.edit')->with('reders', $reders);
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
        $reder = Reders::findOrFail($id);
        //Kiểm tra request -> trả về error
        $this->validate($request, [
            'manu_name' => 'string|required',
            'description' => 'string|required',
        ]);
       
        $data = $request->all();
        if ($request->upload) {

            $data['photo'] = "https://yotrip.vn/public/backend/uploads/images/renders/".$request->upload->getClientOriginalName();
            $file = $request->upload->getClientOriginalName();
            $filePath = 'public/backend/uploads/images/renders';

            $request->upload->move($filePath, $file);
        }

        //Lưu dữ liệu xuống database và kiểm tra
        $status = $reder->fill($data)->save();
        if ($status) {
            request()->session()->flash('success', 'reder successfully updated');
        } else {
            request()->session()->flash('error', 'Error occurred, Please try again!');
        }
        return redirect()->route('reder.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reders = Reders::findOrFail($id);
        $response = Http::post('https://yotrip.vn/api/update-reder/'.$id);
        if ($response->status() == "201") {
            return redirect()->route('reder.index');
        }
    }
      //API 
      public function apiStore(Request $request)
      {
        $this->validate(
            $request,
            [
                'manu_name' => 'string|required',
                'photo' => 'required'
            ]
        );
        if ($request->img) {
            $file = $img->getClientOriginalExtension();
            if ($file == "png" || $file == "jpeg" || $file == "jpg") {
                $file = $request->img->getClientOriginalName();
                $filePath = 'public/backend/uploads/images';
                $request->img->move($filePath, $file);
            } else {
                return response()->json(404, 'Upload Faild , only upload .png,.jpg,jpeg ');
            }
           
        }
        $reder = new Reders();
        $reder->photo = $request->img->getClientOriginalName();
        $reder->manu_name = $request->manu_name;
        $reder->feature = $request->feature;
        if ($request->description == null) {
            $description = "";
        }
        $reder->description = $description;
        $status = $reder->save();
        if ($status) {
            return response()->json($reder, 201);
        }
      }
      public function apiUpdate(Request $request , $id)
      {  
          $reder = Reders::findOrFail($id);
          $this->validate(
                $request,
                [
                    'manu_name' => 'string|required',
                    'photo' => 'required'
                ]
             );
            if ($request->img) {
                $file = $img->getClientOriginalExtension();
                if ($file == "png" || $file == "jpeg" || $file == "jpg") {
                    $file = $request->img->getClientOriginalName();
                    $filePath = 'public/backend/uploads/images';
                    $request->img->move($filePath, $file);
                } else {
                    return response()->json(404, 'Upload Faild , only upload .png,.jpg,jpeg ');
                }
            }
            $reder = new Reders();
            $reder->photo = $request->img->getClientOriginalName();
            $reder->manu_name = $request->manu_name;
            $reder->feature = $request->feature;
            if ($request->description == null) {
                $description = "";
            }
            $reder->description = $description;
            $status = $reder->save();
            if ($status) {
                return response()->json($reder, 200);
            }
          
      }
      public function apiShow()
      {
          $reder = Reders::all();
          return response()->json($reder, 200);
      }
      public function apiDelete($id)
      {
         $reder = Reders::findOrFail($id);
         $reder->delete();
         //204 No content
         return response()->json("Delete Success", 201);
      }
}
