<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Region;
class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Region::select('id','title','photo','created_at','updated_at')
                            ->orderBy('id','DESC')
                            ->get();
        return view('backend.admin.location.index')->with('locations',$locations);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.location.create');
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

            $data['photo'] = "https://yotrip.vn/public/backend/uploads/images/".$request->upload->getClientOriginalName();
            $file = $request->upload->getClientOriginalName();
            $filePath =  'public/backend/uploads/images';

            $request->upload->move($filePath, $file);
        }

        $status = Region::create($data);
        if ($status) {
            request()->session()->flash('success', 'Successfully added Posts');
            return redirect()->route('location.index');
        } else {
            request()->session()->flash('error', 'Error occurred while adding Posts');
        }
        
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
        $location = Region::findOrFail($id);
        return view('backend.admin.location.edit')->with('locations', $location);
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
        //Kiểm tra request -> trả về error
        $location = Region::findOrFail($id);
        //Kiểm tra request -> trả về error
        $this->validate($request, [
            'locat_name' => 'string|required',
            
        ]);
       
        $data = $request->all();
        if ($request->upload) {

            $data['photo'] = "https://yotrip.vn/public/backend/uploads/images/".$request->upload->getClientOriginalName();
            $file = $request->upload->getClientOriginalName();
            $filePath = 'public/backend/uploads/images';

            $request->upload->move($filePath, $file);
        }

        //Lưu dữ liệu xuống database và kiểm tra
        $status = $location->fill($data)->save();
        if ($status) {
            request()->session()->flash('success', 'location successfully updated');
        } else {
            request()->session()->flash('error', 'Error occurred, Please try again!');
        }
        return redirect()->route('location.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = Region::findOrFail($id);
        $response = Http::delete('https://yotrip.vn/api/delete-location/'.$id);
        if ($response->status() == "201") {
            return redirect()->route('location.index');
        }
    }
     //API 
     public function api_store(Request $request)
     {
        
         $this->validate(
            $request,
            [
                'title' => 'string|required',
                'image' => 'required',
               
            ]
        );
        if ($request->image) {
            $file = $image->getClientOriginalExtension();
            if ($file == "png" || $file == "jpeg" || $file == "jpg") {
                $file = $request->image->getClientOriginalName();
                $filePath =  'public/backend/uploads/images';
                $request->image->move($filePath, $file);
            } else {
                return response()->json(404, 'Upload Faild , only upload .png,.jpg,jpeg ');
            }
            
        }
        $location = new Region();
        $location->photo = $request->image->getClientOriginalName();
        $location->title = $request->locat_name;
        
        
        $status = $location->save();
        if ($status) {
            return response()->json($location, 201);
        }
     }
     public function api_update(Request $request , $id)
     {  
        $location = Region::findOrFail($id);
        $this->validate(
              $request,
              [
                  'title' => 'string|required',
                  'image' => 'required',
               
              ]
           );
          if ($request->image) {
            $file = $image->getClientOriginalExtension();
            if ($file == "png" || $file == "jpeg" || $file == "jpg") {
                $file = $request->image->getClientOriginalName();
                $filePath = 'public/backend/uploads/images';
                $request->image->move($filePath, $file);
            } else {
                return response()->json(404, 'Upload Faild , only upload .png,.jpg,jpeg ');
            }
          }
          $location = new Region();
          $location->photo = $request->image->getClientOriginalName();
          $location->title = $request->locat_name;
        
          $status = $location->save();
          if ($status) {
              return response()->json($location, 200);
          }
     }
     public function api_show()
     {
         $location = Region::all();
         return response()->json($location, 200);
     }
     public function apiDelete($id)
     {
        $location = Region::findOrFail($id);
        $location->delete();
        //204 No content
        return response()->json("Delete Success", 201);
     }
    public function api_getId($id)
     {
         $location = Region::findOrFail($id);
         return response()->json($location, 201);
     }
}
