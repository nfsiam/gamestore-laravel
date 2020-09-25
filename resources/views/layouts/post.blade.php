@extends('layouts.base')

@section('css')
<script src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js"></script>
<link href="{{ asset('css/tranquil-heart.css') }}" rel="stylesheet">
@endsection

@section('content')

<!-- post  -->
@include('forum.includes.post');

<!-- mod action buttons  -->
@yield('modactions')

<!-- comments  -->
@yield('comments')

<!-- comment box -->
@yield('commentbox')

@endsection

@section('scripts')
@if(Auth::user()->username == $post['username'])
<!-- postmaker scripts -->
<script>
    $(document).ready(function(){
        $('#reqDeletePost').click(function(){
            $.ajax({
                type: 'POST',
                url: "{{route('forum.postdelreq')}}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    postid : "{{$post['id']}}"
                },
                success: function (data) {
                    if('error' in data){
                        alert(data.error);
                    }else if('request' in data){
                        if(data.request == 'cancel'){
                            //remove icon
                            $('#reqDeletePost').find('span').html("");
                        }else{
                            //add icon
                            $('#reqDeletePost').find('span').html("<i class='fas fa-check-circle'></i>");
                        }
                    }
                }
            });
        });
    });
</script>
<!-- postmaker scripts end -->
@elseif((Auth::user()->type == 'user' || Auth::user()->type == 'publisher') && Auth::user()->username != $post['username'])
<!-- other users scripts -->

<!-- other users scripts end -->
@elseif(Auth::user()->type =='moderator' || Auth::user()->type =='admin')
<!-- mod scripts -->

<!-- mod scripts end -->
@endif
@endsection