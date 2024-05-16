<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comments::all();
        return view('backend.admin.comment.index')->with('comments', $comments);
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
        //
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
    public function api_store(Request $request)
    {
        $request->validate([
            'users_id' => 'string|required|max:50',
            'cars_id' => 'string|required|max:50',
            'comment' => 'string|required',
        ]);
        $data = $request->all();
        $comment = Comments::create($data);
        return response()->json($comment, 201);
    }
    public function api_show()
    {
        $comments = Comments::all();
        return response()->json($comments, 200);
    }
    public function api_delete($id)
    {
        try {
            $comment = Comments::findOrFail($id);
        } catch (\Throwable $th) {
            return response()->json("Id Not Found", 404);
        }

        $comment->delete();
        //204 No content
        return response()->json("Delete Success", 200);
    }
    // public function api_update(Request $request, $id)
    // {
    //     $request->validate([
    //         'user_id' => 'string|required|max:50',
    //         'car_id' => 'string|required|max:50',
    //         'comment' => 'string|required',
    //     ]);
    //     $comment = Comments::findOrFail($id);
    //     if (!empty($comment)) {
    //         $comment->update($request->all());
    //         //200 OK(The request has successed)
    //         return response()->json($comment, 200);
    //     }
    // }
}
