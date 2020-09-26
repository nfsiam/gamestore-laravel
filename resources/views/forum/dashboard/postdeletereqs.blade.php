@extends('layouts.modbase')

@section('container','container')

@section('breadcumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('forum.index')}}">forum</a></li>
        <li class="breadcrumb-item"><a href="{{route('forum.dashboard.index')}}">dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">post-delete-reqs</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="row mb-5">
            <div class="col-sm-12 table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">reqid</th>
                            <th scope="col">Username</th>
                            <th scope="col">postid</th>
                            <th scope="col">Request Time</th>            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($deletePostReqList as $deletePostReq)
                        <tr class="post-row" data-postid="{{$deletePostReq->postid}}">
                            <th scope="row">{{$deletePostReq->id}}</th>
                            <td>{{$deletePostReq->username}}</td>
                            <td>{{$deletePostReq->postid}}</td>
                            <td class="tstamp">{{$deletePostReq->rtime}}</td>
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
        window.location.href = "/forum/dashboard/post-delete-reqs/" + $(this).data('postid');
    });
</script>
@endsection