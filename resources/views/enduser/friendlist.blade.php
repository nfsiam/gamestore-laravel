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
        <a href="/logout" class="list-group-item list-group-item-action bg-light">Logout</a>
      </div>
    </div> 
        <div class="container-fluid">
          <button id="notification-btn" class="btn btn-primary mr-3 mt-3" style="float: right;"> <i class="fa fa-bell"></i> </button>
        <div class="notification-menu">
            
        </div>
            <div class="row">
                <div class="col-lg-12 col-sm-5">
                    <h4 class="font-weight-light mt-4 ml-2">Your Profile</h4>
                        <div class="my-profile-wrap d-flex flex-wrap">
                            <div class="profile-wrapper">
                              <div class="propic-wrapper d-flex flex-wrap mt-4 ml-3">
                                <img src="ironman.jpg" alt="" class="img-circle">
                                <div>
                                  <h3 class="mt-4 ml-4">Iron Man</h3>
                                  <h5 class="mt-4 ml-4 font-weight-light">Live and let live</h5>
                                </div>
                            </div>
                            <div class="profile-nav-menu mt-4">
                              <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd; border: 1px solid transparent; border-radius: 10px;">
                                <ul class="navbar-nav mr-auto">

                                  <li class="nav-item">
                                    <a href="myprofile.html" class="nav-link">  <i class="fa fa-address-book"></i> General </a>
                                  </li>

                                  <li class="nav-item">
                                    <a class="nav-link" href="yourphotos.html"> <i class="fa fa-photo"></i> Your Photos </a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="achievments.html"> <i class="fa fa-trophy"></i>Achivements and Rewards</a>
                                  </li>

                                  <li class="nav-item">
                                    <a class="nav-link" href="editprofile.html"> <i class="fa fa-user"></i> Edit Profile</a>
                                  </li>
                                  
                                  <li class="nav-item">
                                    <a class="nav-link" href="friendlist.html"> <i class="fa fa-users"></i> Friendlist</a>
                                  </li>

                                  <li class="nav-item">
                                    <a class="nav-link" href="wishlist.html"> <i class="fa fa-gratipay"></i> Wishlist</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="wallet.html"> <i class="fa fa-money"></i> Wallet </a>
                                  </li>
                                </ul>
                              </nav>
                            </div>
                            <table class="table">
                              <th>
                                <h1 class="mt-4 font-weight-light">Search</h1>
                                <form action="" method="GET">
                                  <input style="padding: 10px; width: 300px; border: 1px solid;" class="form-input" type="search" placeholder="Type to search">
                                  <button class="btn btn-primary mb-1" style="padding: 10px; padding-right: 15px; padding-left: 15px;"><i class="fa fa-search"></i></button>
                                </form>
                              </th>
                               <tr class="friend-list d-flex flex-wrap">
                                 <td>
                                 
                                  <div class="friend-profile-container mt-3 d-flex flex-wrap">
                                    <div class="profile-wrap p-3">
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
                                 </td>
                               </tr>
                               
                            </table>

                          </div>
                        </div>

                </div>
            </div>
        </div>
    </div>

</body>

</html>