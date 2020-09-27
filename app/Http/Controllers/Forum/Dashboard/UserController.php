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
use App\Muteduser;

class UserController extends Controller
{
    public function index()
    {
        $user = [];
        $result = User::where('type','user')
                        ->orWhere('type','publisher')
                        ->get();

        foreach($result as $k=>$res)
        {
            $user[$k]['id'] = $res->id;
            $user[$k]['username'] = $res->username;
            $user[$k]['name'] = $res->name;

            $user[$k]['posts'] = Forumpost::where('username',$res->username)->count();

            $user[$k]['comments'] = Forumcomment::where('username',$res->username)->count();

            $user[$k]['reacts'] = Postreact::where('username',$res->username)->count();

            $user[$k]['reports'] = Postreport::where('reporter',$res->username)->count();

            $user[$k]['delreqs'] = Postdelreq::where('username',$res->username)->count();

            if(Muteduser::where('username',$res->username)->exists())
            {
                $user[$k]['muted'] = 'yes';
            }
            else
            {
                $user[$k]['muted'] = 'no';
            }

        }

        return view('forum.dashboard.alluserlist')->with('userlist',$user);
    }

    public function muteunmute(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username'=> 'required',
        ]);

        if($validator->fails())
        {
            return response()->json(array(
                'error' => 'something went wrong'
            ));
        }
        else
        {
            $state = Muteduser::where('username',$request->username)->first();

            if($state)
            {
                //here we unmute
                if(Muteduser::destroy($state->id))
                {
                    return response()->json(array(
                        'muted' => 'no'
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
                //here we mute
                $user = new Muteduser();
                $user->username = $request->username;
                $user->mtime = time();

                if($user->save())
                {
                    return response()->json(array(
                        'muted' => 'yes'
                    ));
                }
                else
                {
                    return response()->json(array(
                        'error' => 'something went wrong while muting'
                    ));
                }
            }
        }
        
    }
}
