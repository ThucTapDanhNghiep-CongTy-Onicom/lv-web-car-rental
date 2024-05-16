<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\User;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Coupon::all();
        return view('backend.admin.sale.index')->with('sales', $sales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $suppliers = User::where("role", "user")->get();
        return view('backend.admin.sale.create')->with('suppliers', $suppliers);  
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
            'time_start' => 'required|date|after:yesterday',
            'time_end' => 'required|date|after:time_start'
        ]);
        
        $response = Http::withHeaders([
            'X-Requested-With' => 'XMLHttpRequest'
        ])->post('https://yotrip.vn/api/sale', [
            'time_start' => $request->time_start,
            'time_end' => $request->time_end,
            'users_id' => (int)$request->user,
            'discount_sale' => $request->discount,
        ]);
        if ($response->status() == "201") {
            return redirect()->route('sale.index');
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

        $response = Http::withHeaders([
            'X-Requested-With' => 'XMLHttpRequest'
        ])->delete('https://yotrip.vn/api/delete_sale/'.$id);
        if ($response->status() == "200") {
            return redirect()->route('sale.index');
        }
    }
    //API 
    public function api_store(Request $request)
    {
        $request->validate([
            'time_start' => "required",
            'time_end' =>  "required"
        ]);
        $code = strtoupper(substr(md5(time()), 0, 6));

        $data = $request->all();
        $data['zipcode'] = $code;
        $data['time_start'] = date('Y-m-d', $data['time_start'] = strtotime($data['time_start']));
        $data['time_end'] = date('Y-m-d', $data['time_end'] = strtotime($data['time_end']));
       
        $catelory = Coupon::create($data);
        return response()->json($catelory, 201);
    }
    public function api_show()
    {
        $sales = Coupon::all();
        return response()->json($sales, 200);
    }
    public function api_delete($id)
    {
        try {
            $sale = Coupon::findOrFail($id);
        } catch (\Throwable $th) {
            return response()->json("Id Not Found", 404);
        }

        $sale->delete();
        //204 No content
        return response()->json("Delete Success", 200);
    }
}
