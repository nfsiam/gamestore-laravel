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
    </div>
</div>