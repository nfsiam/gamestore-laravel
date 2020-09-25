@extends('layouts.post')

@section('breadcumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('forum.index')}}">forum</a></li>
        <li class="breadcrumb-item active" aria-current="page">post/2</li>
    </ol>
</nav>
@endsection

@section('comments')
<h1>Comments Here</h1>
@endsection

@if(true)
@section('commentbox')
<h1>Comment Box Here</h1>
@endsection
@endif