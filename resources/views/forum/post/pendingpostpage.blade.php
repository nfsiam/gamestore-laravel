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

<form action="/forum/dashboard/approve-post/{{$post['id']}}" method="post">
@csrf
<input type="hidden" name="postid" value="{{$post['id']}}">
<button type="submit" class="btn btn-block btn-success">Approve</button>
</form>

<form action="/forum/dashboard/decline-post/{{$post['id']}}" method="post">
@csrf
<input type="hidden" name="postid" value="{{$post['id']}}">
<button type="submit" class="btn btn-block btn-danger">Decline</button>
</form>
             
</div>
@endsection

@section('childscripts')
<script>

</script>
@endsection