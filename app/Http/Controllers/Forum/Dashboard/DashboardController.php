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

class DashboardController extends Controller
{
    public function index()
    {
        $data = [];
        $pendingcount = Forumpost::where('status','pending')
                                    ->where('dtime',null)
                                    ->count();
        $postreportcount = Postreport::where('status','pending')
                                    ->count();

        $postdelreqcount = Postdelreq::where('status','pending')
                                    ->count();

        $usercount = User::where('type','user')
                            ->orWhere('type','publisher')
                            ->count();

        $data['issuecount'] = Forumpost::where('posttype','issue')
                            ->count();
        $data['reviewcount'] = Forumpost::where('posttype','review')
                            ->count();
        $data['walkthroughcount'] = Forumpost::where('posttype','walkthrough')
                            ->count();

        $data['pendingcount'] = $pendingcount;
        $data['postreportcount'] = $postreportcount;
        $data['postdelreqcount'] = $postdelreqcount;
        $data['usercount'] = $usercount;

        return view('forum.dashboard.index')->with($data);
    }
}
