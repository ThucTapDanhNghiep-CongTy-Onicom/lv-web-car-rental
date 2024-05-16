<?php

namespace App\Http\Controllers;

use App\Models\Historys;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $histories = Historys::all();
        return view('backend.admin.history.index')
            ->with('histories', $histories);
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
        $response = Http::withHeaders([
            'X-Requested-With' => 'XMLHttpRequest'
        ])->post('https://yotrip.vn/api/history/',[
                'users_id' =>$request->user_id,
                'bookings_id' => $request->book_id
            ]
        );
        if ($response->status() == "200") {
            return redirect()->route('history.index');
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = Http::withHeaders([
            'X-Requested-With' => 'XMLHttpRequest'
        ])->post('https://yotrip.vn/api/delete_history/' . $id);
        if ($response->status() == "200") {
            return redirect()->route('history.index');
        }
    }
    //API 
    public function api_store(Request $request)
    {
        $request->validate([
            'users_id' => 'integer|required',
            'bookings_id' => 'integer|required',
        ]);
        $data = $request->all();
        $catelory = Historys::create($data);
        return response()->json($catelory, 201);
    }
    public function api_show()
    {
        $catelory = Historys::all();
        return response()->json($catelory, 200);
    }
    public function api_delete($id)
    {
        try {
            $history = Historys::findOrFail($id);
        } catch (\Throwable $th) {
            return response()->json("Id Not Found", 404);
        }

        $history->delete();
        //204 No content
        return response()->json("Delete Success", 200);
    }
    public function getuser_history($id)
    {
       $history = DB::table('historys')->where('user_id',$id)->get();
       return response()->json($history, 200);
    }
}
