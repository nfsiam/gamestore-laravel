@extends('layouts.modbase')

@section('container','container')

@section('breadcumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('forum.index')}}">forum</a></li>
        <li class="breadcrumb-item"><a href="{{route('forum.dashboard.index')}}">dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">all-users</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="row mb-5">
            <div class="col-sm-12 table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">username</th>
                            <th scope="col">name</th>
                            <th scope="col">posts</th>
                            <th scope="col">comments</th>
                            <th scope="col">reacts</th>
                            <th scope="col">reports</th>
                            <th scope="col">delete requests</th>           
                            <th scope="col">muted</th>        
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($userlist as $user)
                        <tr class="post-row" data-username="{{$user['username']}}">
                            <th scope="row">{{$user['id']}}</th>
                            <td>{{$user['username']}}</td>
                            <td>{{$user['name']}}</td>
                            <td>{{$user['posts']}}</td>
                            <td>{{$user['comments']}}</td>
                            <td>{{$user['reacts']}}</td>
                            <td>{{$user['reports']}}</td>
                            <td>{{$user['delreqs']}}</td>
                            <td>
                                @if($user['muted'] == 'yes')
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input  mute-unmute" id="{{$user['username']}}" checked data-username="{{$user['username']}}">
                                        <label class="custom-control-label" for="{{$user['username']}}">Muted</label>
                                    </div>
                                </div>
                                @else
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input mute-unmute" id="{{$user['username']}}" data-username="{{$user['username']}}">
                                        <label class="custom-control-label" for="{{$user['username']}}">Unmuted</label>
                                    </div>
                                </div>
                                @endif
                            <td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

@endsection

@section('scripts')
<script>

    $(".mute-unmute").change(function () {
        let that = $(this);
        $.ajax({
            url: '{{route("forum.dashboard.muteunmute")}}',
            method: 'POST',
            dataType: 'json',
            data: {
                "_token": "{{ csrf_token() }}",
                username: $(this).data('username'),
            },
            success: function (data) {
                if('error' in data){
                    console.log(data.error);
                }
                else if('muted' in data){
                    if(data.muted == 'yes'){
                        that.next('label').html('muted');
                        that.prop('checked',true);
                    }else{
                        that.next('label').html('unmuted');
                        that.prop('checked',false);
                    }
                }
            },
        });
    });
    
</script>
@endsection