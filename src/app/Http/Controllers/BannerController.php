<?php

namespace App\Http\Controllers;

use App\Models\Banners;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\HttpFoundation\File\File;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = json_decode(Http::get('https://yotrip.vn/api/show_banner'));
        return view('backend.admin.banner.index')->with('banners', $banners);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'title' => 'string|required|max:50',
                'upload' => 'required'
            ]
        );
        $data = $request->all();
        if ($request->upload) {

            $data['photo'] = "https://yotrip.vn/public/backend/uploads/images/banners/".$request->upload->getClientOriginalName();
            $file = $request->upload->getClientOriginalName();
            $filePath = 'public/backend/uploads/images/banners';

            $request->upload->move($filePath, $file);
        }
        $countActive = Banners::where('status', 'on')->count();
        if ($countActive == 1) {
            $data['status'] = "off";
        }
        $result = Banners::create($data);
        if ($result) {
            request()->session()->flash('success', 'Successfully added Posts');
            return redirect()->route('banner.index');
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
        $banner = Banners::findOrFail($id);
        $countActive = Banners::where('status', 'on')->count();
        return view('backend.admin.banner.edit')->with('banner', $banner)->with('countActive', $countActive);
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

        $banner = Banners::findOrFail($id);

        $data = $request->all();
        if ($request->upload) {

            $data['photo'] = "https://yotrip.vn/public/backend/uploads/images/banners/".$request->upload->getClientOriginalName();
            $file = $request->upload->getClientOriginalName();
            $filePath = 'public/backend/uploads/images/banners';

            $request->upload->move($filePath, $file);
        } else {
            $data['photo'] = $banner->photo;
        }
        if ($request->status == null) {
            $request->status = "off";
        }
        $banner->title = $request->title;
        $banner->description = $request->description;
        $banner->photo = $data['photo'];
        $banner->type =  $request->type;
        $banner->status =  $request->status;
        $result = $banner->save();
        if ($result) {
            request()->session()->flash('success', 'Successfully added Posts');
            return redirect()->route('banner.index');
        } else {
            request()->session()->flash('error', 'Error occurred while adding Posts');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = Http::post('https://yotrip.vn/api/delete_banner/' . $id);
        if ($response->status() == "200") {
            return redirect()->route('banner.index');
        }
    }
    //API 

    public function api_show()
    {
        $banners = Banners::all();
        return response()->json($banners, 200);
    }

    public function api_store(Request $request)
    {
        $this->validate(
            $request,
            [
                'title' => 'string|required|max:50',
                'photo' => 'required'
            ]
        );
        if ($request->photo) {
            $file = $photo->getClientOriginalExtension();
            if ($file == "png" || $file == "jpeg" || $file == "jpg") {
                $file = $request->photo->getClientOriginalName();
                $filePath = 'public/backend/uploads/images/banners';
                $request->photo->move($filePath, $file);
            } else {
                return response()->json(404, 'Upload Faild , only upload .png,.jpg,jpeg ');
            }
           
        }
        $banner = new Banners();
        $banner->photo = $request->photo->getClientOriginalName();
        $banner->title = $request->title;
        if ($request->status == null) {
            $status = "off";
        }
        if ($request->description == null) {
            $description = "";
        }
        $banner->description = $description;
        $banner->status = $status;
        $status = $banner->save();
        if ($status) {
            return response()->json($banner, 201);
        }
    }
    public function api_delete($id)
    {
        try {
            $catelory = Banners::findOrFail($id);
        } catch (\Throwable $th) {
            return response()->json("Id Not Found", 404);
        }
       
        $catelory->delete();
        //204 No content
        return response()->json("Delete Success", 200);
    }
    public function api_update(Request $request, $id)
    {

        $this->validate(
            $request,
            [
                'title' => 'string|required|max:50',
                'photo' => 'required'
            ]
        );
        if ($request->photo) {
            $file = $photo->getClientOriginalExtension();
            if ($file == "png" || $file == "jpeg" || $file == "jpg") {
                $file = $request->photo->getClientOriginalName();
                $filePath = 'public/backend/uploads/images/banners';
                $request->photo->move($filePath, $file);
            } else {
                return response()->json(404, 'Upload Faild , only upload .png,.jpg,jpeg ');
            }
           
        }

        $banner = Banners::findOrFail($id);
        $banner->photo = $request->photo->getClientOriginalName();
        $banner->title = $request->title;
        if ($request->status == null) {
            $request->status = "off";
        }
        if ($request->description == null) {
            $request->description = "";
        }

        $banner->description =  $request->description;
        $banner->status =  $request->status;
        $status = $banner->save();
        if ($status) {
            return response()->json($banner, 201);
        }
    }
}