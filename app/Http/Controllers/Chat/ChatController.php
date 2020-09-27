<?php

namespace App\Http\Controllers\Chat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Conversation;
use App\User;
use GuzzleHttp\Client;


class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('chat.index');
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
}
