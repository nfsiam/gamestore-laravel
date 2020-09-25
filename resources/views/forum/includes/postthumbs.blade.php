<div class="col-md-12 mb-5">
        @foreach($posts as $k=>$post)

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
                        <span class="badge badge-{{$post['typebadge']}} p-2">{{$post['type']}}</span>
                        <span class="badge badge-primary p-2">{{$post['gamename']}}</span>
                    </div>
                    <div>
                        <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i> <span class="tstamp">{{$post['ptime']}}</span></div>
                    </div>
                </div>
                <p class="card-title bg-light p-3 mt-2 rounded text-dark">
                    {{$post['title']}}
                </p>
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                    <span class="mr-3">
                        <span class="text-success"><i class="fas fa-arrow-up"></i></span>
                        {{$post['upvote']}}
                    </span>
                    <span>
                        <span class="text-danger"><i class="fas fa-arrow-down"></i></span>
                        {{$post['downvote']}}
                    </span>
                    <!-- <span><i class="fas fa-arrow-down"></i>{{$post['downvote']}}</span> -->
                    </div>
                    <div>
                        <a href="{{route('forum.showpost',[$post['id']])}}" class="btn bg-white text-primary-100 btn-sm">
                            <span class="text">view</span>
                            <span class="icon text-primary">
                                <i class="fas fa-arrow-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
</div>
