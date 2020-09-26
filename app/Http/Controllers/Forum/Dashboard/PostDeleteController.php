<?php

namespace App\Http\Controllers\Forum\Dashboard;

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

class PostDeleteController extends Controller
{
    public function index()
    {
        $data = [];

        $delreqs  = Postdelreq::all();

        $deletePostReqList = $delreqs;

        $data['deletePostReqList'] = $deletePostReqList;

        return view('forum.dashboard.postdeletereqs')->with($data);
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'postid'=> 'required|integer',
            'route'=> 'required',
        ]);

        if($validator->fails())
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray()
            ));
        }
        else
        {
            Forumpost::destroy($request->postid);

            Postreport::where('postid',$request->postid)->delete();

            Postreact::where('postid',$request->postid)->delete();

            Postdelreq::where('postid',$request->postid)->delete();

            if($request->ajax())
            {
                return response()->json(['status' => 'successful']);
            }
            
            return redirect()->route($request->route);
        }
    }

    public function dismiss(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'postid'=> 'required|integer',
        ]);

        if($validator->fails())
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray()
            ));
        }
        else
        {
            Postdelreq::where('postid',$request->postid)->delete();
            
            return redirect()->route('forum.dashboard.postdeletereqs');
        }
    }
}
