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

class PostApprovalController extends Controller
{
    public function index()
    {
        $data = [];

        $pendingPostList = Forumpost::where('status','pending')
                                    ->where('dtime',null)
                                    ->get();
        $data['pendingPostList'] = $pendingPostList;

        return view('forum.dashboard.pendingposts')->with($data);
    }

    public function approve(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'postid'=> 'required|integer',
        ]);

        if($validator->fails())
        {
            return redirect()->route('forum.dashboard.pendingposts');
        }
        else
        {
            $post = Forumpost::find($request->postid);

            $post->status = 'approved';

            if($post->save())
            {
                return redirect()->route('forum.dashboard.pendingposts');
            }

        }
        
    }

    public function decline(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'postid'=> 'required|integer',
        ]);

        if($validator->fails())
        {
            return redirect()->route('forum.dashboard.pendingposts');
        }
        else
        {
            if(Forumpost::destroy($request->postid))
            {
                return redirect()->route('forum.dashboard.pendingposts');
            }

        }
        
    }
}
