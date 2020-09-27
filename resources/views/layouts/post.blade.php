@extends('layouts.base')

@section('css')
<script src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js"></script>
<link href="{{ asset('css/tranquil-heart.css') }}" rel="stylesheet">
@endsection

@section('content')

<!-- post  -->
@include('forum.includes.post')

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
<script>
    $(document).ready(function(){
        $('.action-report-post').click(function(){
            const that = $(this);
            $.ajax({
                type: 'POST',
                url: "{{route('forum.reportpost')}}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    postid : "{{$post['id']}}",
                    reporttype: $(this).data('reporttype')
                },
                success: function (data) {
                    if ('error' in data) {
                        alert(data.error);
                    } else {
                        if (data.reported == true) {
                            $('.action-report-post span').html('');
                            that.find('span').html("<i class='fas fa-check-circle'></i>");
                        } else if (data.cancel == true) {
                            $('.action-report-post span').html('');
                        }
                    }
                }
            });
        });

        $('.react-post').click(function(){
            $.ajax({
                type: 'POST',
                url: "{{route('forum.reactpost')}}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    postid : "{{$post['id']}}"
                },
                success: function (data) {
                    if('error' in data){
                        alert(data.error);
                    }else if('react' in data){
                        if(data.react == 'cancel'){
                            //remove icon
                            $('.react-post').find('.heart').removeClass('text-danger');
                            $('.react-post').find('.heart').addClass('text-muted');
                            $('.react-post').find('.react-count').html(parseInt($('.react-post').find('.react-count').html())-1);
                        }else{
                            //add icon
                            $('.react-post').find('.heart').removeClass('text-muted');
                            $('.react-post').find('.heart').addClass('text-danger');
                            $('.react-post').find('.react-count').html(parseInt($('.react-post').find('.react-count').html())+1);

                        }
                    }
                }
            });
        });
    });
</script>
<!-- other users scripts end -->
@elseif(Auth::user()->type =='moderator' || Auth::user()->type =='admin')
<!-- mod scripts -->
<script>
    $(".mute-unmute").click(function () {
        let that = $(this);
        $.ajax({
            url: '{{route("forum.dashboard.muteunmute")}}',
            method: 'POST',
            dataType: 'json',
            data: {
                "_token": "{{ csrf_token() }}",
                username: $(this).data('username'),
            },
            success: function (data) {
                if('error' in data){
                    alert(data.error);
                }
                else if('muted' in data){
                    if(data.muted == 'yes'){
                        that.find('span').html("<i class='fas fa-check-circle'></i>");
                    }else{
                        that.find('span').html("");
                    }
                }
            },
        });
    });

    $("#delete").click(function () {
        let that = $(this);
        $.ajax({
            url: '/forum/dashboard/delete-post',
            method: 'POST',
            dataType: 'json',
            data: {
                "_token": "{{ csrf_token() }}",
                postid: $(this).data('postid'),
                route: 'ajaxroute'
            },
            success: function (data) {
                if('errors' in data){
                    alert("something went wrong");
                }
                else if('status' in data){
                   window.location.href = '/forum';
                }
            },
        });
    });
</script>
<!-- mod scripts end -->
@endif

@yield('childscripts')

@endsection