<div class="card shadow mb-3">
    <div class="card-body pb-3">

        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex justify-content-between align-items-center">
                <div class="mr-2">
                    <img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt="">
                </div>
                <div class="ml-2">
                    <div class="h7 m-0">{{$post['username']}}</div>
                    <div class="h8 text-muted">{{$post['name']}}</div>
                </div>
            </div>
            <div>
            <span class="text-secondary px-2 mr-2 border rounded">
                <i class="fas fa-eye"></i> {{$post['viewcount']}}
            </span>
            <span class="text-secondary">
                <i class="fas fa-star"></i>
            </span>
            </div>
        </div>
        <hr>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <span class="badge badge-warning p-2">{{$post['type']}}</span>
                <span class="badge badge-primary p-2">{{$post['gamename']}}</span>
            </div>
            <div>
                <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i> <span class="tstamp">{{$post['ptime']}}</span></div>
            </div>
        </div>
        <p class="card-title bg-light p-3 mt-2 rounded text-dark">
        {{$post['title']}}
        </p>
        <p class="card-title bg-light p-3 mt-2 rounded text-dark">
        {{$post['body']}}
        </p>
        @isset($post['fname'])
        <p class="card-title bg-light p-3 mt-2 rounded text-dark">
            <img src="{{url('/fs/postimages')}}/{{$post['fname']}}" class="img-fluid" alt="Image"/>
        </p>
        @endisset
        @isset($post['codes'])
            <pre class="prettyprint linenums rounded"><code>{{ $post['codes'] }}</code></pre>
        @endisset
        <div class="d-flex justify-content-between align-items-center">
            <div>
            <span class="mr-3">
                <span class="text-success"><i class="fas fa-arrow-up"></i></span>
                5
            </span>
            <span>
                <span class="text-danger"><i class="fas fa-arrow-down"></i></span>
                0
            </span>
            </div>
            <div>
                @include('forum.includes.postdropaction')
            </div>
        </div>
    </div>
</div>