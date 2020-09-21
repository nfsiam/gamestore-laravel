<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Friends</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> 
  <link rel="stylesheet" href="{{ asset('css/home.css')}}">
  <link rel="stylesheet" href="{{ asset('css/library.css')}}">
  <link rel="stylesheet" href="{{ asset('css/common.css')}}">
  <link rel="stylesheet" href="{{ asset('css/connect.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="{{ asset('js/common.js')}}"></script>

</head>

<body>

  <div class="d-flex" id="wrapper">
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"><b>Menu</b></div>
      <div class="list-group list-group-flush">
        <a href="/enduser/home" class="list-group-item list-group-item-action bg-light">Home</a>
        <a href="/enduser/store" class="list-group-item list-group-item-action bg-light">Store</a>
        <a href="/enduser/library" class="list-group-item list-group-item-action bg-light">Library</a>
        <a href="/enduser/community" class="list-group-item list-group-item-action bg-light">Communnity</a>
        <a href="/enduser/connect" class="list-group-item list-group-item-action bg-light">Find Friends</a>
        <a href="/enduser/myprofile" class="list-group-item list-group-item-action bg-light">My Profile</a>
        <a href="/enduser/plans" class="list-group-item list-group-item-action bg-light">Plans</a>
        <a href="/enduser/logout" class="list-group-item list-group-item-action bg-light">Logout</a>
      </div>
    </div> 
    
      <div class="container-fluid">
        <button id="notification-btn" class="btn btn-primary mr-3 mt-3" style="float: right;"> <i class="fa fa-bell"></i> </button>
        <div class="notification-menu">
            
        </div>
        <h1 class="mt-4 font-weight-light">Search</h1>
        <form action="" method="GET">
          <input style="padding: 10px; width: 300px; border: 1px solid;" class="form-input" type="search" placeholder="Type to search">
          
      </form>
        <div class="row">
            <div class="col-lg-12 col-sm-5">

              <div class="friend-list d-flex flex-wrap">
                <div class="friend-profile-container mt-3 d-flex flex-wrap">
                    <div class="profile-wrap mr-5 p-3">
                        <div class="propic-wrapper text-center">
                            <img src="propic1.jpeg" class="img-circle" alt="">
                            <h5 class="mt-2 mb-2">Captain Price</h5>
                        </div>
                        <div class="profile-buttons">
                            <button class="btn btn-primary btn-sm mt-2"><i class="fa fa-user-times"></i>   <span class="ml-1">Unfriend</span></button>
                            <button class="btn btn-primary btn-sm mt-2"><i class="fa fa-comments"></i>   <span class="ml-1">Message</span></button>
                            <button class="btn btn-primary btn-sm mt-2"><i class="fa fa-ban"></i>   <span class="ml-1">Block</span></button>
                        </div>
                    </div>
                </div>



                <div class="friend-profile-container mt-3 d-flex flex-wrap">
                    <div class="profile-wrap mr-5 p-3">
                        <div class="propic-wrapper text-center">
                            <img src="propic2.jpg" class="img-circle" alt="">
                            <h5 class="mt-2 mb-2">Sherlock Holmes</h5>
                        </div>
                        <div class="profile-buttons">
                            <button class="btn btn-primary btn-sm mt-2"><i class="fa fa-user-plus"></i>   <span class="ml-1">Add Friend</span></button>
                            <button class="btn btn-primary btn-sm mt-2"><i class="fa fa-comments"></i>   <span class="ml-1">Message</span></button>
                            <button class="btn btn-primary btn-sm mt-2"><i class="fa fa-ban"></i>   <span class="ml-1">Block</span></button>
                        </div>
                    </div>
                </div>




                

              </div>

              










            </div>
        </div>

        </div>
    </div>


</body>

</html>