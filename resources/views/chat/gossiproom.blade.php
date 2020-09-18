<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js')}}"></script>
    <title>Gossip Room</title>
    <style>
        #chat-history {
            height: 65vh;
            width: 100%;
            padding-top: 15px;
            overflow-y: auto;
        }

        #chat-form {
            height: 15vh;
        }

        .msg {
            word-wrap: break-word;
            word-break: break-all;
            width: 100%;
        }

        .timeSpan {
            color: #888;
            padding-right: 5px;
        }

        .usernameSpan {
            font-weight: 700;
            color: rgb(61, 109, 82);
        }
    </style>
    <script>
        const username = "{{session('username')}}";
    </script>
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
                    <li class="nav-item active">
                        <a class="nav-link dropdown-toggle" href="/forum" data-toggle="dropdown">Forum</a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- user -->
                            <a href="/forum/issues" class="dropdown-item">Issues</a>
                            <a href="/forum/reviews" class="dropdown-item">Reviews</a>
                            <a href="/forum/walkthroughs" class="dropdown-item">Walkthroughs</a>
                            <a href="/forum/gossiproom" class="dropdown-item">Gossip Room</a>
                            <!-- user -->
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- nav end -->

        <!-- breadcumb start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/forum">forum</a></li>
                <li class="breadcrumb-item active" aria-current="page">gossiproom</li>
            </ol>
        </nav>
        <!-- breadcumb end -->
        <div>
            <div class="prev-chat-row" id="chat-history">

            </div>
            <form class="chat-form-row" id="chat-form" autocomplete="off" spellcheck="false">
                <br>
                <div class="row">
                    <div class="col-md-9">
                        <input type="text" id="msgBox" class="form-control" required autofocus>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-primary btn-block" type="submit">Send</button>
                    </div>
                </div>
                <br>
            </form>
        </div>

    </div>

    <script>
        const socket = io.connect('http://localhost:3000');
        const form = document.getElementById('chat-form');
        const msgBox = document.getElementById('msgBox');
        const chatHistory = document.getElementById('chat-history');

        const appendMsg = (msgObj) => {
            const msgDiv = document.createElement('div');
            msgDiv.classList.add('col-md-12');
            msgDiv.classList.add('border');
            msgDiv.classList.add('px-3');
            msgDiv.classList.add('py-1');
            msgDiv.classList.add('mb-3');
            msgDiv.classList.add('msg');

            const timeSpan = document.createElement('span');
            timeSpan.classList.add('timeSpan');
            timeSpan.innerText = moment(msgObj.time).format('hh:mm:ss a');



            const usernameSpan = document.createElement('span');
            usernameSpan.classList.add('usernameSpan');
            usernameSpan.innerText = msgObj.id + ' : ';


            const msgSpan = document.createElement('span');
            msgSpan.classList.add('msgSpan');
            msgSpan.innerText = msgObj.msg;

            msgDiv.appendChild(timeSpan);
            msgDiv.appendChild(usernameSpan);
            msgDiv.appendChild(msgSpan);


            chatHistory.appendChild(msgDiv);
            chatHistory.scrollTop = chatHistory.scrollHeight;
        };

        socket.on('message', (msgObj) => {
            appendMsg(msgObj);
        });

        socket.on('prevMsg', msgQueue => {
            for (const msgObj of msgQueue) {
                appendMsg(msgObj);
            }
        });

        form.addEventListener('submit', (e) => {
            e.preventDefault();
            socket.emit('msgEvent', {
                id: username,
                msg: msgBox.value
            });
            msgBox.value = '';
            msgBox.focus();
        });

        socket.on('error', function(err) {
            console.log(err);
        });
        // Connection succeeded
        socket.on('success', function(data) {
            console.log(data.message);
            console.log('user info: ' + data.user);
            console.log('logged in: ' + data.user.logged_in)
        })
    </script>


</body>

</html>