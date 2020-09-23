@extends('layouts.base')

@section('css')
<link href="{{ asset('css/chat.css') }}" rel="stylesheet">
@endsection

@section('breadcumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('chat.index')}}">chat</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$receiver}}</li>
    </ol>
</nav>
@endsection

@section('content')
<div>
    <div class="prev-chat-row" id="chat-history">
        @foreach($messages as $message)
        <div class="col-md-12 border px-3 py-1 mb-3 msg">
            <span class="timeSpan tstamp">{{$message->stime}}</span>
            <span class="usernameSpan">{{$message->sender}} : </span>
            <span class="msgSpan">{{$message->msg}}</span>
        </div>
        @endforeach
    </div>
    <form class="chat-form-row" id="chat-form" autocomplete="off" spellcheck="false">
        <br>
        <div class="row">
            <div class="col-md-9">
                <input type="text" id="msgBox" class="form-control" required autofocus>
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary btn-block" type="submit">Send</button>
            </div>
        </div>
        <br>
    </form>
</div>
@endsection

@section('scripts')
<script>
        const socket = io.connect('http://localhost:3000', {query: 'token={{$ctoken}}'});
        const form = document.getElementById('chat-form');
        const msgBox = document.getElementById('msgBox');
        const chatHistory = document.getElementById('chat-history');

        const appendMsg = (msgObj) => {
            const msgDiv = document.createElement('div');
            msgDiv.classList.add('col-md-12');
            msgDiv.classList.add('border');
            msgDiv.classList.add('px-3');
            msgDiv.classList.add('py-1');
            msgDiv.classList.add('mb-3');
            msgDiv.classList.add('msg');

            const timeSpan = document.createElement('span');
            timeSpan.classList.add('timeSpan');
            timeSpan.innerText = moment(msgObj.time).format('hh:mm:ss a');



            const usernameSpan = document.createElement('span');
            usernameSpan.classList.add('usernameSpan');
            usernameSpan.innerText = msgObj.id + ' : ';


            const msgSpan = document.createElement('span');
            msgSpan.classList.add('msgSpan');
            msgSpan.innerText = msgObj.msg;

            msgDiv.appendChild(timeSpan);
            msgDiv.appendChild(usernameSpan);
            msgDiv.appendChild(msgSpan);


            chatHistory.appendChild(msgDiv);
            chatHistory.scrollTop = chatHistory.scrollHeight;
        };

        socket.on('message', (msgObj) => {
            appendMsg(msgObj);
        });

        socket.on('prevMsg', msgQueue => {
            for (const msgObj of msgQueue) {
                appendMsg(msgObj);
            }
        });

        form.addEventListener('submit', (e) => {
            e.preventDefault();
            socket.emit('msgEvent', {
                msg: msgBox.value
            });
            msgBox.value = '';
            msgBox.focus();
        });

        socket.on('error', function(err) {
            console.log(err);
        });

    </script>
@endsection
