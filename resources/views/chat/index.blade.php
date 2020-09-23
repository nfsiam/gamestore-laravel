@extends('layouts.base')

@section('css')
<style>
    .message{
        cursor: pointer;
    }
</style>
@endsection

@section('title','Chat')

@section('breadcumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('chat.index')}}">chat</a></li>
    </ol>
</nav>
@endsection

@section('content')
<!-- search section -->
<div class="row mb-3">
    <div class="col-md-8">
        <div class="input-group">
            <input type="search" class="form-control input-group-prepend" id="searchmessage"
                placeholder="search messages by username...">
        </div>
    </div>
    <div class="col-md-4">
        <button class="btn btn-block btn-primary btn-success" data-toggle="collapse" data-target="#collapseOne" aria-controls="collapseOne">
            <i class="fas fa-plus-circle"></i> New chat
        </button>
    </div>
</div>
<div id="collapseOne" class="collapse in">
    <div class="card mx-auto">
        <div class="card-body">
            <div class="col-md-12">
                <div class="input-group mb-2">
                    <input type="search" class="form-control input-group-prepend" id="searchnewuser"
                        placeholder="search user by username...">
                </div>
                <div class="userlist">
                    <!-- searched users -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- message list -->
<div class="row messages mt-3">
@foreach($messages as $message)
<div class="col-md-12 mb-2 message" data-receiver="{{$message['receiver']}}">
    <div class="card  rounded-1">
    <div class="card-body p-1 pl-3">
        <div class="row no-gutters align-items-center">
        <div class="col mr-2">
            <div class="font-weight-bold text-success mb-1">{{$message['receiver']}}</div>
            <div class="text-s mb-0 text-gray"><span class="tstamp">{{$message['stime']}}</span> {{$message['msg']}}</div>
        </div>
        </div>
    </div>
    </div>
</div>
@endforeach
</div>

@endsection

@section('scripts')
<script>
    $(document).on('click','.message',function(){
        console.log($(this).data('receiver'));
        window.location.href = '/chat/'+$(this).data('receiver');
    });

    $('#searchnewuser').keyup(function(){
        const searchText = $(this).val().trim();
        if(searchText != ''){
            console.log(searchText);
            $.ajax({
                type: 'POST',
                url: "{{route('chat.searchnewuser')}}",
                dataType: 'JSON',
                data: {
                    "_token": "{{ csrf_token() }}",
                    searchText : searchText
                },
                success: function (data) {
                    if('error' in data){
                        $('.userlist').html('something went wrong');
                    }else{
                        $('.userlist').html('');
                        for(let i=0;i<data.length; i++)
                        {
                            console.log(data[i]);
                            $('.userlist').append('<a href="/chat/'+data[i].username+'" class="btn-light btn btn-block text-info">'+data[i].username+' [ '+data[i].name+' ]</a>');

                        }
                    }
                }
            });

        }else{
            console.log('empty');
            $('.userlist').html('');
        }
    });
    $('#searchnewuser').on('search',function(){        
        console.log('empty');
        $('.userlist').html('');

    });

    function appendMessages(data){
        $('.messages').html('');
        for(let i=0;i<data.length; i++){
            console.log(data[i]);
            $('.messages').append(
                `<div class="col-md-12 mb-2 message" data-receiver="${data[i].receiver}">
                    <div class="card  rounded-1">
                    <div class="card-body p-1 pl-3">
                        <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-success mb-1">${data[i].receiver}</div>
                            <div class="text-s mb-0 text-gray"><span class="tstamp">${data[i].stime} ${data[i].msg}</div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>`
            );
        }
        convertTimes();
    }

    function getAllMessages(){
        $.ajax({
            type: 'POST',
            url: "{{route('chat.getallmessages')}}",
            dataType: 'JSON',
            data: {
                "_token": "{{ csrf_token() }}",
            },
            success: function (data) {
                if('error' in data){
                    console.log(data.error);
                }else{
                    appendMessages(data);
                }
            }
        });
    }

    $('#searchmessage').keyup(function(){
        const searchText = $(this).val().trim();
        if(searchText != ''){
            console.log(searchText);
            $.ajax({
                type: 'POST',
                url: "{{route('chat.searchmessage')}}",
                dataType: 'JSON',
                data: {
                    "_token": "{{ csrf_token() }}",
                    searchText : searchText
                },
                success: function (data) {
                    if('error' in data){
                        console.log(data.error);
                    }else{
                        appendMessages(data);
                    }
                }
            });
        }else{
            console.log('empty');
            getAllMessages();
        }
    });
    $('#searchmessage').on('search',function(){        
        console.log('empty');
        getAllMessages();

    });
</script>
@endsection