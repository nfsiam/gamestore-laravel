<?php

namespace App\Http\Controllers\Forum\Comment;

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
use App\Forumcomment;


class CreateCommentController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'postid'=> 'required|integer',
            'comment' => 'required|min:10',
        ]);

        if($validator->fails())
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray()
            ));
        }
        else if($validator->passes())
        {
            $username = Auth::user()->username;

            $bool = Forumpost::where('comment','on')
                                ->where('id',$request->postid)
                                ->where('status','<>','pending')
                                ->where('dtime',null)
                                ->exists();
            if($bool)
            {
                $comment = new Forumcomment();

                $comment->postid = $request->postid;
                $comment->comment = $request->comment;
                $comment->username = $username;
                $comment->ctime = time();

                if($comment->save())
                {
                    return response()->json(array(
                        'success' => true,
                        'comment' => [
                            'id' => $comment->id,
                            'comment' => $comment->comment,
                            'ctime' => $comment->ctime,
                            'username' => $comment->username
                        ]
                    ));
                }
                else
                {
                    return response()->json(array(
                        'error' => 'something went wrong while commenting'
                    ));
                }
            }
            else
            {
                return response()->json(array(
                    'error' => 'no authority'
                ));
            }
        }
    }
}
