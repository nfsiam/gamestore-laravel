<?php

namespace App\Http\Controllers\Forum;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
use App\Forumpost;
use Auth;
use App\User;
use App\Postreport;
use App\Postdelreq;
use DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forum.createpost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        
        $upvote = DB::table('postvotes')
                    ->where('vote','up')
                    ->where('postid',$res->id)
                    ->get();
        $downvote = DB::table('postvotes')
                    ->where('vote','down')
                    ->where('postid',$res->id)
                    ->get();

        $post['gamename'] = $res->gamename;
        $post['upvote'] = $upvote->count();
        $post['downvote'] = $downvote->count();

        return $post;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = Forumpost::where('id',$id)
                            ->where('status','<>','pending')
                            ->where('dtime',null)
                            ->first();

        $post = $this->formatPost($result);

        $user = Auth::user();
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

            $result->viewcount = $result->viewcount + 1;
            $result->save();
            return view('forum.post.postpage')->with('post',$post)->with('report',$report);
            // if($user->username != $post['username'])
            // {
            // }
        }
        else if($user->username == $post['username'])
        {
            $delreq = '';
            if(Postdelreq::where('postid',$id)->exists())
            {
                $delreq = "<i class='fas fa-check-circle'></i>";
            }
            return view('forum.post.postpage')->with('post',$post)->with('delreq',$delreq);
        }
        $result->viewcount = $result->viewcount + 1;
        $result->save();
        return view('forum.post.postpage')->with('post',$post);
    }

    public function showpending($id)
    {
        $codes = '<html>
                    <h1>haha</h1>
                </html>';
        $post['username'] = 'siam'; 
        return view('forum.post.pendingpostpage')->with('codes',$codes)->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

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
