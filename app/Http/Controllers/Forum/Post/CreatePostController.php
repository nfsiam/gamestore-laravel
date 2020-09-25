<?php

namespace App\Http\Controllers\Forum\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use Auth;
use Validator;

use App\Forumpost;
use App\User;
use App\Postreport;
use App\Postreact;
use App\Postdelreq;

class CreatePostController extends Controller
{
    public function create()
    {
        return view('forum.createpost');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type'=> ["required","regex:(issue|review|walkthrough)"],
            'title' => 'required|min:10|max:300',
            'body'=>'required|min:10|max:60000',
            'gamename'=>'required',
            'codes'=>'sometimes|max:20000',
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
}
