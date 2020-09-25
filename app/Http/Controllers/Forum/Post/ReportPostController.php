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

class ReportPostController extends Controller
{
    public function reportpost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'postid'=> 'required|integer',
            'reporttype'=> ["required","regex:(spam|duplicate|other|wrongcategory)"]
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

            $bool = Forumpost::where('id',$request->postid)
                                ->where('status','<>','pending')
                                ->where('dtime',null)
                                ->exists();
            if($bool)
            {
                $rep = Postreport::where('postid',$request->postid)
                                        ->where('reporter',$username)
                                        ->first();
                if($rep)
                {
                    //there is an old report
                    if($rep->reporttype == $request->reporttype)
                    {
                        //delete old report
                        if(Postreport::destroy($rep->id))
                        {
                            return response()->json(array(
                                'cancel' => true
                            )); 
                        }
                    }
                    else
                    {
                        //update old report
                        $rep->reporttype = $request->reporttype;
                        $rep->rtime = time();
                        if($rep->save())
                        {
                            return response()->json(array(
                                'reported' => true
                            ));
                        }
                        else
                        {
                            return response()->json(array(
                                'error' => 'something went wrong while updating'
                            ));
                        }
                    }
                }
                else
                {
                    //create new report
                    $rep = new Postreport();
                    $rep->rtime = time();
                    $rep->postid = $request->postid;
                    $rep->reporter = $username;
                    $rep->reporttype = $request->reporttype;

                    if($rep->save())
                    {
                        return response()->json(array(
                            'reported' => true
                        ));
                    }
                    else
                    {
                        return response()->json(array(
                            'error' => 'something went wrong while reporting'
                        ));
                    }
                }
            }
            else
            {
                //no post
                return response()->json(array(
                    'error' => 'no authority'
                ));
            }
        }
    }
}
