@extends('layouts.modbase')

@section('container','container-fluid')

@section('breadcumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('forum.index')}}">forum</a></li>
        <li class="breadcrumb-item"><a href="{{route('forum.dashboard.index')}}">dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">pending-posts</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="row mb-5">
            <div class="col-sm-12 table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">postid</th>
                            <th scope="col">Time</th>
                            <th scope="col">User</th>
                            <th scope="col">Game</th>
                            <th scope="col">Type</th>
                            <th scope="col" class="w-50">Title</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pendingPostList as $pendingPost)
                        <tr class="post-row" data-postid="{{$pendingPost->id}}">
                            <th scope="row">{{$pendingPost->id}}</th>
                            <td class="tstamp">{{$pendingPost->ptime}}</td>
                            <td>{{$pendingPost->username}}</td>
                            <td>{{$pendingPost->gamename}}</td>
                            <td>{{$pendingPost->type}}</td>
                            <td>{{$pendingPost->title}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

@endsection

@section('scripts')
<script>
    $('.post-row').click(function () {
        window.location.href = "/forum/dashboard/pending-posts/" + $(this).data('postid');
    });
</script>
@endsection