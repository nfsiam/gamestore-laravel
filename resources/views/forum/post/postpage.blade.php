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
<div class="row">
    <div class="col-md-12 comments">
        @foreach($comments as $comment)
        @include('forum.includes.comment')
        @endforeach
    </div>
</div>
@endsection


@if($post['comment'] == 'on' && $muted == false)
@section('commentbox')

<div class="row">
    <div class="col-md-12">
        <form action="post" id="commentForm">
            <div class="row mb-5">
                <div class="col-sm-12">

                    <div class="form-group">
                        <label
                            for="commentBox">Comment</label>
                        <textarea class="form-control"
                            id="commentBox" rows="4"
                            placeholder="type your comment..."></textarea>
                        <small id="errcomment"></small>
                    </div>

                    <div
                        class="form-group d-flex justify-content-end">
                        <button type="reset"
                            class="btn btn-secondary mr-2">Clear</button>
                        <button type="submit"
                            class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
@endif


@section('childscripts')
@if($post['comment'] == 'on' && $muted == false)
<script>

    function appendComment(comment){
        $('.comments').append(`
            <div class="card shadow mb-3">
                <div class="card-body pb-3">

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex justify-content-between align-items-center">
                            {{Auth::user()->username}}
                        </div>
                        <div class="tstamp">
                            ${comment.ctime}
                        </div>
                    </div>
                    <hr>
                    <p class="card-title bg-light p-3 mt-2 rounded text-dark">
                        ${comment.comment}
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <button class="btn btn-white shadow-none">
                            @if(true)
                            <span class="text-danger"><i class="fas fa-heart"></i></span>
                            @else
                            <span class="text-muted"><i class="fas fa-heart"></i></span>
                            @endif
                            <span class="text-muted ml-2"> 777 </span>
                        </button>
                        <div>
                            ...
                        </div>
                    </div>
                </div>
            </div>
        `);
        convertTimes();
        $('#commentForm').trigger("reset");

    }
    $('#commentForm').submit(function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "{{route('forum.createcomment')}}",
            data: {
                "_token": "{{ csrf_token() }}",
                comment : $('#commentBox').val(),
                postid : {{$post['id']}},
            },
            success: function (data) {
                if('errors' in data){
                    if('postid' in data.errors){
                        $('#errcomment').html(data.errors.postid.join(','));
                    }else{
                        $('#errcomment').html(data.errors.comment.join(','));
                    }
                }
                if('error' in data){
                    alert(data.error);
                    $('#errcomment').html('');
                }else if('comment' in data){
                    appendComment(data.comment);
                    $('#errcomment').html('');
                }
            }
        });
        
    });
</script>
@endif
@endsection