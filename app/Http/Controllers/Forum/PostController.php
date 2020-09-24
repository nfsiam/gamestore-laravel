<?php

namespace App\Http\Controllers\Forum;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
use App\Forumpost;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forum.createpost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type'=> ["required","regex:(issue|review|walkthrough)"],
            'title' => 'required|min:10|max:100',
            'body'=>'required|min:10|max:60000',
            'gamename'=>'required',
            'codes'=>'sometimes|max:255',
            'pic' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if($validator->fails())
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray()
            ));
        }
        else if($validator->passes())
        {
            $post = new Forumpost();

            $post->posttype = $request->type;
            $post->gamename = $request->gamename;
            $post->username = Auth::user()->username;
            $post->title = $request->title;
            $post->body = $request->body;
            $post->ptime = time();

            if($request->hasFile('pic'))
            {
                $image = $request->file('pic');
                $new_name = md5_file($image) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('fs/postimages'), $new_name);
                $post->fname = $new_name;
            }
            if($request->has('codes'))
            {
                $post->codes = $request->codes;
            }

            if($post->save())
            {
                return response()->json(['success'=>true]);
            }
            else
            {
                return response()->json(['failure'=>true]);
            }
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
        //
    }
}
