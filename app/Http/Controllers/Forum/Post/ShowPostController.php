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
use App\Forumcomment;

class ShowPostController extends Controller
{
    public function formatPost($res)
    {
        $post = [];
        $post['username'] = $res->username; 
        $user = User::where('username',$res->username)->first();
        $post['name'] = $user->name;
        $post['propic'] = $user->propic;

        $post['title'] = $res->title;
        $post['body'] = $res->body;
        $post['viewcount'] = $res->viewcount + 1;
        $post['ptime'] = $res->ptime;
        $post['id'] = $res->id;
        $post['type'] = $res->posttype;
        $post['comment'] = $res->comment;

        if($res->fname != null)
        {
            $post['fname'] = $res->fname;
        }
        if($res->codes != null)
        {
            $post['codes'] = $res->codes;
        }

        if($res->posttype == 'issue')
        {
            $post['typebadge'] = 'warning';
        }
        else if($res->posttype == 'review')
        {
            $post['typebadge'] = 'info';
        }
        else if($res->posttype == 'walkthrough')
        {
            $post['typebadge'] = 'success';
        }
        
        $post['reacts'] = Postreact::where('postid',$res->id)
                            ->count();

        $post['gamename'] = $res->gamename;
        

        return $post;
    }

    public function show($id)
    {
        $result = Forumpost::where('id',$id)
                            ->where('status','<>','pending')
                            ->where('dtime',null)
                            ->first();

        $post = $this->formatPost($result);

        $user = Auth::user();

        $data = [];

        $data['post'] = $post;

        if(($user->type == 'user' || $user->type == 'publisher') && $user->username != $post['username'])
        {
            $report = ['','','',''];

            $repres = Postreport::where('postid',$id)
                                ->where('reporter',$user->username)
                                ->first();
            if($repres)
            {
                if($repres->reporttype == 'spam')
                    $report[0] = 'fas fa-check-circle';
                elseif($repres->reporttype == 'duplicate')
                    $report[1] = 'fas fa-check-circle';
                elseif($repres->reporttype == 'wrongcategory')
                    $report[2] = 'fas fa-check-circle';
                elseif($repres->reporttype == 'other')
                    $report[3] = 'fas fa-check-circle';
            }

            $data['report'] = $report;

            $myreact = Postreact::where('postid',$post['id'])
                                    ->where('username',$user->username)
                                    ->exists();
            if($myreact)
            {
                $data['myreact'] = true;
            }
        }
        else if($user->username == $post['username'])
        {
            $delreq = '';
            if(Postdelreq::where('postid',$id)->exists())
            {
                $delreq = "<i class='fas fa-check-circle'></i>";
            }

            $data['delreq'] = $delreq;
        }

        $data['muted'] = false;

        $data['comments'] = Forumcomment::where('postid',$id)
                                        ->where('dtime',null)
                                        ->get();

        $result->viewcount = $result->viewcount + 1;
        $result->save();

        return view('forum.post.postpage')->with($data);
    }

    public function formatPendingPost($res)
    {
        $post = [];
        $post['username'] = $res->username; 
        $user = User::where('username',$res->username)->first();
        $post['name'] = $user->name;
        $post['propic'] = $user->propic;

        $post['title'] = $res->title;
        $post['body'] = $res->body;
        $post['viewcount'] = $res->viewcount;
        $post['ptime'] = $res->ptime;
        $post['id'] = $res->id;
        $post['type'] = $res->posttype;
        $post['comment'] = $res->comment;

        if($res->fname != null)
        {
            $post['fname'] = $res->fname;
        }
        if($res->codes != null)
        {
            $post['codes'] = $res->codes;
        }

        if($res->posttype == 'issue')
        {
            $post['typebadge'] = 'warning';
        }
        else if($res->posttype == 'review')
        {
            $post['typebadge'] = 'info';
        }
        else if($res->posttype == 'walkthrough')
        {
            $post['typebadge'] = 'success';
        }
        
        $post['reacts'] = 0;

        $post['gamename'] = $res->gamename;
        

        return $post;
    }

    public function showpending($id)
    {
        $result = Forumpost::where('id',$id)
                            ->where('status','pending')
                            ->where('dtime',null)
                            ->first();

        $post = $this->formatPendingPost($result);

        $user = Auth::user();

        $data = [];

        $data['post'] = $post;


        return view('forum.post.pendingpostpage')->with($data);
    }

    public function formatReportedPost($res)
    {
        $post = [];
        $post['username'] = $res->username; 
        $user = User::where('username',$res->username)->first();
        $post['name'] = $user->name;
        $post['propic'] = $user->propic;

        $post['title'] = $res->title;
        $post['body'] = $res->body;
        $post['viewcount'] = $res->viewcount;
        $post['ptime'] = $res->ptime;
        $post['id'] = $res->id;
        $post['type'] = $res->posttype;
        $post['comment'] = $res->comment;

        if($res->fname != null)
        {
            $post['fname'] = $res->fname;
        }
        if($res->codes != null)
        {
            $post['codes'] = $res->codes;
        }

        if($res->posttype == 'issue')
        {
            $post['typebadge'] = 'warning';
        }
        else if($res->posttype == 'review')
        {
            $post['typebadge'] = 'info';
        }
        else if($res->posttype == 'walkthrough')
        {
            $post['typebadge'] = 'success';
        }
        
        $post['reacts'] = 0;

        $post['gamename'] = $res->gamename;
        
        return $post;
    }

    public function showreported($id)
    {
        $report = Postreport::find($id);

        if($report)
        {
            $result = Forumpost::where('id',$report->postid)
                                ->where('dtime',null)
                                ->first();

            $post = $this->formatReportedPost($result);
    
            $user = Auth::user();
    
            $data = [];
    
            $data['post'] = $post;
    
            $data['reporttype'] = $report->reporttype;
            $data['reportid'] = $report->id;
    
            return view('forum.post.reportedpostpage')->with($data);
        }

    }

    public function formatDelReqPost($res)
    {
        $post = [];
        $post['username'] = $res->username; 
        $user = User::where('username',$res->username)->first();
        $post['name'] = $user->name;
        $post['propic'] = $user->propic;

        $post['title'] = $res->title;
        $post['body'] = $res->body;
        $post['viewcount'] = $res->viewcount;
        $post['ptime'] = $res->ptime;
        $post['id'] = $res->id;
        $post['type'] = $res->posttype;
        $post['comment'] = $res->comment;

        if($res->fname != null)
        {
            $post['fname'] = $res->fname;
        }
        if($res->codes != null)
        {
            $post['codes'] = $res->codes;
        }

        if($res->posttype == 'issue')
        {
            $post['typebadge'] = 'warning';
        }
        else if($res->posttype == 'review')
        {
            $post['typebadge'] = 'info';
        }
        else if($res->posttype == 'walkthrough')
        {
            $post['typebadge'] = 'success';
        }
        
        $post['reacts'] = 0;

        $post['gamename'] = $res->gamename;
        
        return $post;
    }

    public function showdelreqpost($id)
    {
        $result = Forumpost::where('id',$id)
                            ->where('dtime',null)
                            ->first();

        $post = $this->formatDelReqPost($result);

        $user = Auth::user();

        $data = [];

        $data['post'] = $post;

        return view('forum.post.deletereqpostpage')->with($data);

    }
}
