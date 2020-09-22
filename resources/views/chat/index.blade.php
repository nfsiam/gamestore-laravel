@extends('layouts.base')

@section('title','Chat');

@section('breadcumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('chat.index')}}">chat</a></li>
    </ol>
</nav>
@endsection

@section('content')
<div>
    <h1>In Chat</h1>
</div>
@endsection