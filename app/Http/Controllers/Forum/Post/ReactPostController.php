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

class ReactPostController extends Controller
{
    public function reactpost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'postid'=> 'required|integer',
        ]);

        if($validator->fails())
        {
            return response()->json(array(
                'error' => 'something went wrong'
            ));
        }
        else if($validator->passes())
        {
            $username = Auth::user()->username;

            $bool = Forumpost::where('username','<>',$username)
                                ->where('id',$request->postid)
                                ->where('status','<>','pending')
                                ->where('dtime',null)
                                ->exists();
            if($bool)
            {
                $preact = Postreact::where('postid',$request->postid)
                                        ->where('username',$username)
                                        ->first();
                if($preact)
                {
                    //delete old react
                    if(Postreact::destroy($preact->id))
                    {
                        return response()->json(array(
                            'react' => 'cancel'
                        ));
                    }
                    else
                    {
                        return response()->json(array(
                            'error' => 'something went wrong while deleting'
                        ));
                    }
                }
                else
                {
                    //new react
                    $preact = new Postreact();
                    $preact->rtime = time();
                    $preact->postid = $request->postid;
                    $preact->username = $username;

                    if($preact->save())
                    {
                        return response()->json(array(
                            'react' => 'made'
                        ));
                    }
                    else
                    {
                        return response()->json(array(
                            'error' => 'something went wrong while reacting'
                        ));
                    }
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
