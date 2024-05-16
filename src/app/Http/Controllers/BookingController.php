<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Bookings;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = json_decode(Http::get('https://yotrip.vn/api/booking'));
        return view('backend.admin.booking.index')->with('bookings',$bookings);
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
        $this->validate($request, [
           
            'address' => 'required',
            'address_off' => 'required',
            'time_start' => 'required',
            'time_end' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
            'total_amount' =>'integer|required',
        ]);
        $booking = new Booking();
        $data = $request->all();
        $data['car_id'] = $request->car_id;
        $data['user_id'] = $request->user()->id;
        
        $data['total_amount'] = $request->total;
       
        $data['status'] = 'trading';
      
        $booking->fill($data);
        $booking->save();
        return view('pages.pament')->with('booking', $booking);
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
        $bookings = Bookings::findOrFail($id);
        return view('backend.admin.booking.active')->with('bookings', $bookings);
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
        $request->validate([
            'status' => 'string|required',
        ]);
        $response = Http::post('https://yotrip.vn/api/update_booking/' . $id, [
            "status"  => $request->status
        ]);
        if ($response->status() == "200") {
            return redirect()->route('booking.index');
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
        //
    }
     //API 
     public function apiStore(Request $request)
     {
         $this->validate(
             $request,
             [
                
                'address' => 'required',
                'address_off' => 'required',
                'time_start' => 'required',
                'time_end' => 'required',
                'date_start' => 'required',
                'date_end' => 'required',
             ]
         );
         $data = $request->all();
         $status = Bookings::create($data);
         if ($status) {
             return response()->json($status, 201);
         }
    }
     public function apiShow()
     {
         $booking = Bookings::all();
         return response()->json($booking, 200);
     }
     public function apiUpdate(Request $request, $id)
     {
         $request->validate([
             'status' => 'string|required',
         ]);
         $booking = Bookings::findOrFail($id);
         if (!empty($booking)) {
             $booking->update($request->all());
             //200 OK(The request has successed)
             return response()->json($booking, 200);
         }
     }
  public function getUser_Booking($id)
    {
        $booking = DB::table('bookings')->where('user_id',$id)->get();
        return response()->json($booking,200);
    }
}