<div class="card shadow mb-3">
    <div class="card-body pb-3">

        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex justify-content-between align-items-center">
                {{$comment->username}}
            </div>
            <div class="tstamp">
                {{$comment->ctime}}
            </div>
        </div>
        <hr>
        <p class="card-title bg-light p-3 mt-2 rounded text-dark">
            {{$comment->comment}}
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