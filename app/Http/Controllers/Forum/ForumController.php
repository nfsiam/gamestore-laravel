<?php

namespace App\Http\Controllers\Forum;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Forumpost;
use App\User;
use DB;

class ForumController extends Controller
{
    public function formatPosts($result)
    {
        $posts = [];
        foreach($result as $k=>$res)
        {
            $posts[$k]['username'] = $res->username; 
            $user = User::where('username',$res->username)->first();
            $posts[$k]['name'] = $user->name;
            $posts[$k]['propic'] = $user->propic;

            $posts[$k]['title'] = $res->title;
            $posts[$k]['viewcount'] = $res->viewcount;
            $posts[$k]['ptime'] = $res->ptime;
            $posts[$k]['id'] = $res->id;
            $posts[$k]['type'] = $res->posttype;

            if($res->posttype == 'issue')
            {
                $posts[$k]['typebadge'] = 'warning';
            }
            else if($res->posttype == 'review')
            {
                $posts[$k]['typebadge'] = 'info';
            }
            else if($res->posttype == 'walkthrough')
            {
                $posts[$k]['typebadge'] = 'success';
            }
            
            $upvote = DB::table('postvotes')
                        ->where('vote','up')
                        ->where('postid',$res->id)
                        ->get();
            $downvote = DB::table('postvotes')
                        ->where('vote','down')
                        ->where('postid',$res->id)
                        ->get();

            $posts[$k]['gamename'] = $res->gamename;
            $posts[$k]['upvote'] = $upvote->count();
            $posts[$k]['downvote'] = $downvote->count();
        }

        return $posts;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $result = Forumpost::where('status','approved')
                            ->orderBy('id','DESC')
                            ->simplePaginate(10);

        $posts = $this->formatPosts($result);

        $gamelist = DB::select( DB::raw("select DISTINCT gamename, COUNT('gamename') c from forumposts where status <> :var"), array('var' => 'pending'));

        return view('forum.index')->with('posts',$posts)
                                    ->with('links',$result->links())
                                    ->with('gamelist',$gamelist);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function searchpost(Request $request)
    {
       $result = Forumpost::where('status','approved')
                            ->where('title','like','%'.$request->searchText.'%')
                            ->orderBy('id','DESC')
                            ->get();

        $posts = $this->formatPosts($result);

        return view('forum.includes.postthumbs')->with('posts',$posts);
    }
}
