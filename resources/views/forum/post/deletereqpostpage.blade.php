@extends('layouts.post')

@section('breadcumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('forum.index')}}">forum</a></li>
        <li class="breadcrumb-item active" aria-current="page">post/2</li>
    </ol>
</nav>
@endsection



@section('modactions')
<div class="row mb-5">
<div class="col-md-12">

    <form action="/forum/dashboard/delete-post" method="post">
    @csrf
    <input type="hidden" name="postid" value="{{$post['id']}}">
    <input type="hidden" name="route" value="forum.dashboard.postdeletereqs">
    <button type="submit" class="btn btn-block btn-success">Delete</button>
    </form>

    <form action="/forum/dashboard/dismiss-post-delreq" method="post">
    @csrf
    <input type="hidden" name="postid" value="{{$post['id']}}">
    <button type="submit" class="btn btn-block btn-danger">Dismiss</button>
    </form>
</div>

             
</div>
@endsection

@section('childscripts')
<script>

</script>
@endsection