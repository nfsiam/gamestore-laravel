<button type="button" class="btn btn-light btn-lg btn-block rounded-0 text-primary"
        data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></button>
    <div class="dropdown-menu dropdown-menu-right">
        @if((Auth::user()->type == 'user' || Auth::user()->type == 'publisher') && Auth::user()->username != $post['username'])
            <!-- user /publisher but not post creator -->
            <button class="dropdown-item action-report-post" type="button"
                data-reporttype="spam">
                Report as Spam
                <span id="reportSpam"><i class="{{$report[0]}}"></i></span>
            </button>
            <button class="dropdown-item action-report-post" type="button"
                data-reporttype="duplicate">
                Report as Duplicate
                <span id="reportDuplicate"><i class="{{$report[1]}}"></i></span>
            </button>
            <button class="dropdown-item action-report-post" type="button"
                data-reporttype="wrongcategory">
                Report as Wrong Category
                <span id="reportWrongCategory"><i class="{{$report[2]}}"></i></span>
            </button>
            <button class="dropdown-item action-report-post" type="button"
                data-reporttype="other">
                Report as Other
                <span id="reportOther"><i class="{{$report[3]}}"></i></span>
            </button>
            <!-- user /publisher but not post creator end-->
        <!-- user / publisher end-->
        @elseif(Auth::user()->type =='moderator' || Auth::user()->type =='admin')
        <!-- moderator / admin -->
        <button class="dropdown-item" type="button" data-postid="{{$post['id']}}"
            id="delete">Delete</button>
        <button class="dropdown-item" type="button" data-postid="{{$post['id']}}"
            id="turnoff">Turn Off Comment <span></span></button>
        <button class="dropdown-item mute-unmute" type="button" data-username="{{$post['username']}}"
            >Mute User<span>
            @isset($post['postermuted'])
                <i class='fas fa-check-circle'></i>
            @endisset
            </span></button>
        <!-- moderator / admin end -->
        @elseif(Auth::user()->type =='user' && Auth::user()->username == $post['username'])
        <!-- postmaker -->
        <button class="dropdown-item" type="button" id="reqDeletePost"
            data-postid="{{$post['id']}}">Request to
            Delete <span>{!!$delreq!!}</span> </button>
        <!-- postmaker end -->
        @endif
    </div>