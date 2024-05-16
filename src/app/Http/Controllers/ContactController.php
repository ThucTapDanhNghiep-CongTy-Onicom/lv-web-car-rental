<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contacts::all();
        return view('backend.admin.contact.index')->with('contacts',$contacts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    //API 
    public function api_store(Request $request)
    {
        $request->validate([
            'name' => 'string|required|max:50',
            'email' => 'string|required|max:50',
            'message' => 'string|required',
        ]);
        $data = $request->all();
        $contact = Contacts::create($data);
        return response()->json($contact, 201);
    }
    public function api_show()
    {
        $catelory = Contacts::all();
        return response()->json($catelory, 200);
    }
    public function api_delete($id)
    {
        try {
            $contact = Contacts::findOrFail($id);
        } catch (\Throwable $th) {
            return response()->json("Id Not Found", 404);
        }
       
        $contact->delete();
        //204 No content
        return response()->json("Delete Success", 200);
    }
    public function api_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'string|required|max:50',
            'email' => 'string|required|max:50',
            'message' => 'string|required',
        ]);
        $catelory = Contacts::findOrFail($id);
        if (!empty($catelory)) {
            $catelory->update($request->all());
            //200 OK(The request has successed)
            return response()->json($catelory, 200);
        }
    }
}
