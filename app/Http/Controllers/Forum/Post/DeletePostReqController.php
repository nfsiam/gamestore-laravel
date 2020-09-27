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

class DeletePostReqController extends Controller
{
    public function postdelreq(Request $request)
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

            $bool = Forumpost::where('username',$username)
                                ->where('id',$request->postid)
                                ->where('status','<>','pending')
                                ->where('dtime',null)
                                ->exists();
            if($bool)
            {
                $pdelreq = Postdelreq::where('postid',$request->postid)
                                        ->first();
                if($pdelreq)
                {
                    if(Postdelreq::destroy($pdelreq->id))
                    {
                        return response()->json(array(
                            'request' => 'cancel'
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
                    $pdelreq = new Postdelreq();
                    $pdelreq->rtime = time();
                    $pdelreq->postid = $request->postid;
                    $pdelreq->username = $username;

                    if($pdelreq->save())
                    {
                        return response()->json(array(
                            'request' => 'made'
                        ));
                    }
                    else
                    {
                        return response()->json(array(
                            'error' => 'something went wrong while requesting'
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
