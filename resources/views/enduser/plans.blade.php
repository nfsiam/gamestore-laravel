<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Friends</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> 
  <link rel="stylesheet" href="{{asset('css/home.css')}}">
  <link rel="stylesheet" href="{{asset('css/library.css')}}">
  <link rel="stylesheet" href="{{asset('css/common.css')}}">
  <link rel="stylesheet" href="{{asset('css/connect.css')}}">
    <link rel="stylesheet" href="{{asset('css/plans.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="{{asset('js/common.js')}}"></script>


</head>

<body>
  <button id="notification-btn" class="btn btn-primary mr-3 mt-3" style="float: right;"> <i class="fa fa-bell"></i> </button>
        <div class="notification-menu">
            
        </div>
        <div class="d-flex" id="wrapper">
          <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading"><b>Menu</b></div>
            <div class="list-group list-group-flush">
              <a href="/enduser/home" class="list-group-item list-group-item-action bg-light">Home</a>
              <a href="/enduser/store" class="list-group-item list-group-item-action bg-light">Store</a>
              <a href="/enduser/library" class="list-group-item list-group-item-action bg-light">Library</a>
              <a href="{{route('forum.index')}}" class="list-group-item list-group-item-action bg-light">Forum</a>
              <a href="/enduser/connect" class="list-group-item list-group-item-action bg-light">Find Friends</a>
              <a href="/enduser/myprofile" class="list-group-item list-group-item-action bg-light">My Profile</a>
              <a href="/enduser/plans" class="list-group-item list-group-item-action bg-light">Plans</a>
              <a href="/enduser/logout" class="list-group-item list-group-item-action bg-light">Logout</a>
            </div>
          </div> 
        <div class="container text-center">
         
          
            <div class="row">
                <div class="col-12">
                    <h1 class="font-weight-light">Choose a plan</h1>
                    <p>Games can be expensive but don't worry we have flexible plans for you to choose <br> So pick one to get started</p>
                    <div class="box-wrap d-flex flex-wrap ">
                        <div class="box-plan mr-3 mb-3">
                            <h4>Plan 1</h4>
                            <p class="mt-5">Choose any 3 games for $180</p>
                            <button class="btn btn-primary btn-lg btn-block mt-5 ml-4" style="width: 85%;">Get Started</button>
                        </div>

                        <div class="box-plan mr-3 mb-3">
                            <h4>Plan 2</h4>
                            <p class="mt-5">Choose any 5 games for $220</p>
                            <button class="btn btn-primary btn-lg btn-block mt-5 ml-4" style="width: 85%;">Get Started</button>
                        </div>

                        <div class="box-plan mr-3 mb-3">
                            <h4>Plan 3</h4>
                            <p class="mt-5">Choose any 8 games for $300</p>
                            <button class="btn btn-primary btn-lg btn-block mt-5 ml-4" style="width: 85%;">Get Started</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
  </div>
</body>

</html>