<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Reviews;

class RateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Reviews::orderBy('id', 'DESC')->paginate(10);
        $reviews = json_decode(Http::get('http://yotrip.vn/api/review'));
        return view('backend.admin.review.index')->with('reviews',$reviews);
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
            'rate' => 'required|numeric|min:1',
            
        ]);
        $data = $request->all();
        $data['cars_id'] = $request->car_id;
        $data['users_id'] = $request->user()->id;
        $data['status'] = 'active';
        // dd($data);
        $status = Reviews::create($data);
        if ($status) {
            request()->session()->flash('success', 'Thank you for your feedback');
        } else {
            request()->session()->flash('error', 'Something went wrong! Please try again!!');
        }
        return redirect()->back();
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
        $reviews = Reviews::findOrFail($id);
        return view('backend.admin.review.reply')->with('reviews', $reviews);
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
        $location = Reviews::findOrFail($id);
        //Kiểm tra request -> trả về error
        $this->validate($request, [
             'reply' => 'string|required',
            
        ]);
       
        $data = $request->all();
       
        //Lưu dữ liệu xuống database và kiểm tra
        $status = $location->fill($data)->save();
        if ($status) {
            request()->session()->flash('success', 'location successfully updated');
        } else {
            request()->session()->flash('error', 'Error occurred, Please try again!');
        }
        return redirect()->route('review.index');
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
                'rate' => 'required|numeric|min:1'
                
            ]
        );
       
        $review = new Reviews();
        $review->rate = $request->rate;
        $review->feature = $request->feature;
        if ($request->review == null) {
            $review = "";
        }
        $review->reply = $request->reply;
        $status = $review->save();
        if ($status) {
            return response()->json($review, 201);
        }
      }
    public function apiShow()
    {
        $review = Reviews::all();
        return response()->json($review, 200);
    }
    public function apiUpdate(Request $request, $id)
    {
        $request->validate([
            'reply' => 'string|required',
        ]);
        $review = Reviews::findOrFail($id);
        if (!empty($review)) {
            $review->update($request->all());
            //200 OK(The request has successed)
            return response()->json($review, 200);
        }
    }
}
