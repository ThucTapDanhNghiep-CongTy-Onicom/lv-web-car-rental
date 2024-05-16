<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = json_decode(Http::get('http://yotrip.vn/api/show_category'));
        return view('backend.admin.category.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.category.create');
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
            'categories_name' => 'string|required',
        ]);
        $data = $request->all();
        $result = Categories::create($data);
        if ($result) {
            return redirect()->route('category.index');
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
        $category = Categories::findOrFail($id);
        return view('backend.admin.category.edit')->with('category', $category);
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
        $category = Categories::findOrFail($id);
        $request->validate([
            'categories_name' => 'string|required',
        ]);
        $data = $request->all();
        $result = $category->update($data);
        if ($result) {
            return redirect()->route('category.index');
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
        $response = Http::post('https://yotrip.vn/api/delete_category/' . $id);
        if ($response->status() == "200") {
            return redirect()->route('category.index');
        }
    }
    //API 
    public function api_store(Request $request)
    {
        $request->validate([
            'categories_name' => 'string|required',
        ]);
        $data = $request->all();
        $catelory = Categories::create($data);
        return response()->json($catelory, 201);
    }
    public function api_show()
    {
        $catelory = Categories::all();
        return response()->json($catelory, 200);
    }
    public function api_delete($id)
    {
        $catelory = Categories::findOrFail($id);
        $catelory->delete();
        //204 No content
        return response()->json("Delete Success", 200);
    }
    public function api_update(Request $request, $id)
    {
        $request->validate([
            'categories_name' => 'string|required',
        ]);
        $catelory = Categories::findOrFail($id);
        if (!empty($catelory)) {
            $catelory->update($request->all());
            //200 OK(The request has successed)
            return response()->json($catelory, 200);
        }
    }
}
