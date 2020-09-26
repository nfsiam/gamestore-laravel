@extends('layouts.modbase')

@section('container','container')

@section('breadcumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('forum.index')}}">forum</a></li>
        <li class="breadcrumb-item"><a href="{{route('forum.dashboard.index')}}">dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">reported-posts</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="row mb-5">
            <div class="col-sm-12 table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">reportid</th>
                            <th scope="col">Reporter</th>
                            <th scope="col">postid</th>
                            <th scope="col">Report Type</th>
                            <th scope="col">Report Time</th>            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reportedPostList as $reportedPost)
                        <tr class="post-row" data-reportid="{{$reportedPost->id}}">
                            <th scope="row">{{$reportedPost->id}}</th>
                            <td>{{$reportedPost->reporter}}</td>
                            <td>{{$reportedPost->postid}}</td>
                            <td>{{$reportedPost->reporttype}}</td>
                            <td class="tstamp">{{$reportedPost->rtime}}</td>
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
        window.location.href = "/forum/dashboard/reported-posts/" + $(this).data('reportid');
    });
</script>
@endsection