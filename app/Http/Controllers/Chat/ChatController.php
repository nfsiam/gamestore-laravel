<?php

namespace App\Http\Controllers\Chat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Conversation;
use App\User;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Validator;


class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function formatMessageList($result,$username)
    {
        $messages = [];

        foreach($result as $k=>$res)
        {
            if($res->sender == $username)
            {
                $messages[$k]['receiver'] = $res->receiver;

                $msg = 'me: '.$res->msg;

                if(strlen($msg) > 47)
                {
                    $msg = substr($msg,0,47).'...';
                }
                $messages[$k]['msg'] = $msg;
            }
            else
            {
                $messages[$k]['receiver'] = $res->sender;
                $msg = $res->msg;

                if(strlen($msg) > 47)
                {
                    $msg = substr($msg,0,47).'...';
                }

                $messages[$k]['msg'] = $msg;
            }
            $messages[$k]['stime'] = $res->stime;
        }
        return $messages;
    }

    public function getMessageList()
    {
        $username = Auth::user()->username;

        $result = DB::select('
        SELECT 
        M.id,M.sender,M.receiver, M.convid, M.msg, M.attachment, M.stime
        FROM conversations M
        INNER JOIN 
        (
            SELECT 
            MAX(id) AS last_id_of_conversation,
            convid,sender,receiver, msg, attachment, stime
            FROM conversations
            GROUP BY convid
        ) AS t
        ON M.id = last_id_of_conversation where M.sender = ? or M.receiver = ? order by M.id DESC
        ', [$username, $username]);

        return $this->formatMessageList($result,$username);
    }

    public function index()
    {
        $messages = $this->getMessageList();
        return view('chat.index')->with('messages',$messages);
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

    public function gossiproom()
    {
        $sender = Auth::user()->username;
        $convid = md5('gossiproom');
        $receiver = 'gossiproom';
        $messages = Conversation::where('convid',$convid)->get();

        $client = new Client();
        $response = $client->request('POST', 'http://localhost:3000/api/chat/chat_token', [
            'content-type' => 'application/json',
            'form_params' => [
                'sender' => $sender,
                'receiver' => $receiver,
                'convid' => "$convid",   
            ]
        ]);
        $ctoken = json_decode($response->getBody(),true);

        return view('chat.gossiproom')->with('messages',$messages)->with('ctoken',$ctoken['ctoken'])->with('receiver',$receiver);
    }
    public function conversation($receiver)
    {
        if($receiver)
        {
            if(!User::where('username',$receiver)->first())
            {
                return redirect()->route('chat.index');
            }
        }
        $sender = Auth::user()->username;
        
        if($receiver == $sender)
        {
            return redirect()->route('chat.index');
        }
        
        $SR = [$sender,$receiver];

        sort($SR);
        $convid = md5($SR[0].'+'.$SR[1]);
        
        $messages = Conversation::where('convid',$convid)->get();

        $client = new Client();
        $response = $client->request('POST', 'http://localhost:3000/api/chat/chat_token', [
            'content-type' => 'application/json',
            'form_params' => [
                'sender' => $sender,
                'receiver' => $receiver,
                'convid' => "$convid",   
            ]
        ]);

        $ctoken = json_decode($response->getBody(),true);
        return view('chat.conversation')->with('messages',$messages)->with('ctoken',$ctoken['ctoken'])->with('receiver',$receiver);
    }

    public function searchnewuser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'searchText' => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json(['error' => 'something went wrong']);
        }
        else
        {
            $users = User::where('username','<>',Auth::user()->username)
                            ->where('username', 'like', $request->searchText. '%')
                            ->orWhere('name', 'like', $request->searchText. '%')
                            ->where('username','<>',Auth::user()->username)->get();
            $userlist = [];

            foreach($users as $k=>$user)
            {
                // if($user->username != Auth::user()->username)
                // {
                    $userlist[$k]['username'] = $user->username;
                    $userlist[$k]['name'] = $user->name;
                // }
            }
 
            return response()->json($userlist);
        }
    }

    public function searchmessage(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'searchText' => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json(['error' => 'something went wrong']);
        }
        else
        {
            $username = Auth::user()->username;

            $result = DB::select('
            SELECT 
            M.id,M.sender,M.receiver, M.convid, M.msg, M.attachment, M.stime
            FROM conversations M
            INNER JOIN 
            (
                SELECT 
                MAX(id) AS last_id_of_conversation,
                convid,sender,receiver, msg, attachment, stime
                FROM conversations
                GROUP BY convid
            ) AS t
            ON M.id = last_id_of_conversation where (M.sender =? and M.receiver like ?) or (M.receiver = ? and M.sender like ?)  order by M.id DESC
            ', [$username,"%".$request->searchText."%",$username,"%".$request->searchText."%"]);
    
            $messages = $this->formatMessageList($result,$username);
 
            return response()->json($messages);
        }
    }
    public function getallmessages(Request $request)
    {
        $messages = $this->getMessageList();
        return response()->json($messages);
    }
}
