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

class PostReportController extends Controller
{
    public function index()
    {
        $data = [];

        $reports  = Postreport::all();
        foreach($reports as $report)
        {
            $post = Forumpost::where('id',$report->postid)
                                ->where('dtime',null)
                                ->first();
            $report->posttile = $post->title;
            $report->username = $post->username;
        }
        $reportedPostList = $reports;

        $data['reportedPostList'] = $reportedPostList;

        return view('forum.dashboard.reportedposts')->with($data);
    }


    public function dismiss(Request $request)
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
