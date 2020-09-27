<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sba.css') }}" rel="stylesheet">
    @yield('css')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js')}}"></script>
    <title>@yield('title')</title>
</head>

<body>
    <div class="container">
        <!-- nav start-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
            <a class="navbar-brand" href="#">Game Store</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Store</a>
                    </li>
<<<<<<< HEAD
                    <li class="nav-item active">
                        <a class="nav-link dropdown-toggle" href="/forum" data-toggle="dropdown">Forum</a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- user -->
                            <a href="/forum/issues" class="dropdown-item">Issues</a>
                            <a href="/forum/reviews" class="dropdown-item">Reviews</a>
                            <a href="/forum/walkthroughs" class="dropdown-item">Walkthroughs</a>
                            <a href="/chat" class="dropdown-item">Chat</a>
                            <a href="/chat/gossiproom" class="dropdown-item">Gossip Room</a>
                            <!-- user -->
                        </div>
=======
                    <li class="nav-item">
                        <a class="nav-link" href="/forum">Forum</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/chat">Chat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/chat/gossiproom">Gossiproom</a>
>>>>>>> f6bee69a229c3786d076cac56a65f58a92eaac58
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- nav end -->

        <!-- breadcumb start -->
        @yield('breadcumb')
        <!-- breadcumb end -->

        @yield('content')
        
    </div>

    @yield('scripts')
<<<<<<< HEAD
=======

    <script>
        function convertTimes(){
            $('.tstamp').each(function(){
                $(this).html(moment.unix(parseInt($(this).html())).format('hh:mm:ss a'));
                $(this).removeClass('tstamp');
            });
        }
        $(document).ready(function(){
            convertTimes();
        });
    </script>
>>>>>>> f6bee69a229c3786d076cac56a65f58a92eaac58
    
</body>

</html>