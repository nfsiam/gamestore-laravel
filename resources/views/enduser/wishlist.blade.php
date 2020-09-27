<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Friends</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> 
  <link rel="stylesheet" href="home.css">
  <link rel="stylesheet" href="library.css">
  <link rel="stylesheet" href="common.css">
  <link rel="stylesheet" href="connect.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="common.js"></script>

</head>

<body>

  <div class="d-flex" id="wrapper">
    
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


        <div class="container-fluid">
          <button id="notification-btn" class="btn btn-primary mr-3 mt-3" style="float: right;"> <i class="fa fa-bell"></i> </button>
        <div class="notification-menu">
            
        </div>
            <div class="row">
                <div class="col-lg-12 col-sm-6">
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

                            <div class="game-list d-flex  flex-wrap pt-3">
                                <div class="box-wrapper ml-3">
                                  <div class="game-wrapper d-flex">
                  
                                      <div class="box mb-3">
                                        <img src="contra.JPG" alt="" srcset=""> 
                                      </div>
                  
                                      <div class="box-text mr-3 mb-3 text-center">
                                        <h5>Contra</h5>
                                        <h5>Size : 300kb</h5>
                                        <h5>Platform : Nes</h5>
                                        <h6 style="text-decoration: line-through;">Prev Price : $60</h6>
                                        <h6>Current Price : $30</h6>
                                        <h6>Valid till : 02/10/2</h6>
                                      </div>
                  
                                  </div>
                  
                                  <div class="box-button pb-3">
                                    <input type="button"  class="btn btn-danger btn-sm" value="Add to cart">
                                    <input type="button" class="btn btn-success btn-sm" value="Buy Now">
                                    
                                  </div>
                  
                                </div>
                  
                  
                  
                                <div class="box-wrapper ml-3">
                                  
                                  <div class="game-wrapper d-flex">
                                      <div class="box mb-3">
                                        <img src="contra.JPG" alt="" srcset=""> 
                                      </div>
                                      <div class="box-text mr-3 mb-3 text-center">
                                        <h5>Contra</h5>
                                        <h5>Size : 300kb</h5>
                                        <h5>Platform : Nes</h5>
                                        <h6 style="text-decoration: line-through;">Prev Price : $60</h6>
                                        <h6>Current Price : $30</h6>
                                        <h6>Valid till : 02/10/2</h6>
                                      </div>
                                  </div>
                  
                                  <div class="box-button pb-3">
                                    <input type="button"  class="btn btn-danger btn-sm" value="Add to cart">
                                    <input type="button" class="btn btn-success btn-sm" value="Buy Now">
                                    
                                  </div>
                  
                              </div>





                          </div>
                        </div>

                </div>
            </div>
        </div>
    

</body>

</html>