@extends('layouts.post')

@section('breadcumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('forum.index')}}">forum</a></li>
        <li class="breadcrumb-item"><a href="{{route('forum.dashboard.index')}}">dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('forum.dashboard.index')}}">pending-posts</a></li>
        <li class="breadcrumb-item active" aria-current="page">2</li>
    </ol>
</nav>
@endsection