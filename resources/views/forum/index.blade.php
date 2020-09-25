@extends('layouts.base')

@section('title','Forum')


@section('content')

<!-- create and search start -->
<div class="row mb-5">
    <div class="col-md-2 mb-2 mb-md-0 ">
        @if(Auth::user()->type == 'moderator')
        <a href="/forum/moderate" class="btn btn-primary btn-block">Moderate</a>
        @else
        <a href="/forum/create" class="btn btn-primary btn-block">Create</a>
        @endif


    </div>
    <div class="col-md-10">
        <div class="input-group">
            <input type="search" class="form-control input-group-prepend" id="searchpost"
                placeholder="search posts...">
        </div>
    </div>
</div>
<!-- create and search end -->

<div class="row  search-heading">
</div>

<div class="row">
    <div class="col-md-8">
        <!-- main content -->

        <div class="row search-posts">
        </div>

        <!-- posts start -->
        <div class="row posts">
            @include('forum.includes.postthumbs')
            <div class="col-md-12">
                {{ $links }}
            </div>
        </div>
        <!-- posts end -->
        <!-- main content end -->
    </div>
    <div class="col-md-4">
        <div class="card shadow mb-3">
            <div class="card-body mb-0">
                <ul class="list-inline mb-0">
                    @foreach($gamelist as $game)
                    <li class="list-inline-item">
                        <a href="#" class="btn gc btn-sm btn-icon-split">
                            <span class="icon">
                                {{$game->c}}
                            </span>
                            <span class="text">{{$game->gamename}}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>


@endsection


@section('scripts')
<script>

    const colors = ["primary", "secondary", "danger", "warning", "success", "info", "light", "dark"]
    const colorlist = [];
    $('.gc').each(function(){
        const random = Math.floor(Math.random() * colors.length);
        $(this).addClass(`btn-${colors[random]}`);
    });

    $('#searchpost').on('search',function(){        
        $('.search-posts').html('');
        $('.search-heading').html('');
        $('.posts').show();
    });

    const  cb = function(){
        const searchText = $('#searchpost').val().trim();
        if(searchText != ''){
            console.log(searchText);
            $.ajax({
                type: 'POST',
                url: "{{route('forum.searchpost')}}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    searchText : searchText
                },
                success: function (data) {
                    $('.posts').hide();
                    $('.search-heading').html(`<div class="col-md-12 h3">showing search results for "${searchText}"</div>`);
                    $('.search-posts').html(data);
                    convertTimes();
                }
            });

        }else{
            $('.search-posts').html('');
            $('.search-heading').html('');
            $('.posts').show();
        }
    }

    function addSearchCallback(textBox, callback, delay) {
        var timer = null;
        textBox.onkeyup = function() {
            if (timer) {
                window.clearTimeout(timer);
            }
            timer = window.setTimeout( function() {
                timer = null;
                callback();
            }, delay );
        };
        textBox = null;
    }

    addSearchCallback( document.getElementById("searchpost"), cb , 1000 );

</script>
@endsection