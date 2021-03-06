<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Store</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> 
  <link rel="stylesheet" href=" {{asset('/css/publisher/report.css')}}">
  <link rel="stylesheet" href=" {{asset('/css/publisher/library.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href=" {{asset('/css/publisher/common.css')}}">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src=" {{asset('/js/publisher/common.js')}}"></script>
  <script src="{{asset('/js/publisher/library.js')}}"></script>
</head>

<body>

  <div class="d-flex" id="wrapper">
    
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"><b>Menu</b></div>
      <div class="list-group list-group-flush">
        <a href="report.html" class="list-group-item list-group-item-action bg-light">Report</a>
        <a href="store.html" class="list-group-item list-group-item-action bg-light">Store</a>
        <a href="library.html" class="list-group-item list-group-item-action bg-light">Library</a>
        <a href="{{route('forum.index')}}" class="list-group-item list-group-item-action bg-light">Forum</a>
        <a href="myprofile.html" class="list-group-item list-group-item-action bg-light">My Profile</a>
        <a href="publish.html" class="list-group-item list-group-item-action bg-light">Publish Game</a>
        <a href="logout.html" class="list-group-item list-group-item-action bg-light">Logout</a>
      </div>
    </div>


      <div class="container-fluid">
        <button id="notification-btn" class="btn btn-primary mr-3 mt-3" style="float: right;"> <i class="fa fa-bell"></i> </button>
        <div class="notification-menu">
            
        </div>
        
        <h1 class="mt-4 font-weight-light">Search</h1>
          <input id="searchLibrary" style="padding: 10px; width: 300px; border: 1px solid;" class="form-input" type="search" placeholder="Type to search">
      
       
        
        
        <div class="row">
            <div class="col-lg-12 col-sm-5">
             <!--  d-flex flex-wrap -->
              <div class="game-list d-flex  flex-wrap pt-3" id="game-list-id">
              
              @foreach ($games as $game)
                <div class="box-wrapper">
                  <div class="game-wrapper d-flex">

                      <div class="box mb-3">
                        <img src="{{asset($game->propic)}}" alt="" srcset=""> 
                      </div>

                      <div class="box-text mr-3 mb-3 text-center">
                        <h5>{{$game->title}}</h5>
                        <h6>Current Price : ${{$game->price}}</h6>
                        <h6>Publisher: {{$game->publisher}}</h6>
                        <h6>Release Date : {{$game->publishdate}}</h6>
                      </div>

                  </div>

                  <div class="box-button pb-3">
                      <button class="offer-btn btn btn-success btn-sm" id="1"> <i class="fa fa-money"></i> <span class="ml-1">Set Offer</span></button>
                  </div>

                </div>

              @endforeach


          
            </div>
          </div>
      </div>


      </div>
    </div>


</body>

</html>