<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Friends</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> 
  <link rel="stylesheet" href=" {{asset('/css/publisher/report.css')}}">
  <link rel="stylesheet" href=" {{asset('/css/publisher/library.css')}}">
  <link rel="stylesheet" href=" {{asset('/css/publisher/common.css')}}">
  <link rel="stylesheet" href="{{asset('/css/publisher/connect.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="{{asset('/js/publisher/common.js')}}"></script>

</head>

<body>

  <div class="d-flex" id="wrapper">
    
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"><b>Menu</b></div>
      <div class="list-group list-group-flush">
        <a href="report.html" class="list-group-item list-group-item-action bg-light">Report</a>
        <a href="store.html" class="list-group-item list-group-item-action bg-light">Store</a>
        <a href="library.html" class="list-group-item list-group-item-action bg-light">Library</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Communnity</a>
        <a href="myprofile.html" class="list-group-item list-group-item-action bg-light">My Profile</a>
        <a href="publish.html" class="list-group-item list-group-item-action bg-light">Publish Game</a>
        <a href="logout.html" class="list-group-item list-group-item-action bg-light">Logout</a>
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
                                    <a class="nav-link" href="editprofile.html"> <i class="fa fa-user"></i> Edit Profile</a>
                                  </li>

                                </ul>
                              </nav>
                            </div>

                            <div class="edit-profile mt-3">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <table class="table">
                                        <tr>
                                            <th>Username</th>
                                            <td><input type="text" class="form-control" disabled value="ksq1234"></td>
                                        </tr>
                                        <tr>
                                            <th>Firstname</th>
                                            <td><input type="text" class="form-control" name="" id="" value="Mushfiqur"></td>
                                        </tr>
                                        <tr>
                                            <th>Lastname</th>
                                            <td><input type="text" class="form-control" name="" id="" value="Rahman"></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td><input type="email" class="form-control"  name="" id="" value="ksq1234@gmail.com"></td>
                                        </tr>
                                        <tr>
                                            <th>Phone Number</th>
                                            <td><input type="number" class="form-control"  name="" id="" value="12312312"></td>
                                        </tr>
                                        <tr>
                                            <th>Profile Picture</th>
                                            <td>
                                              <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="inputGroupFile02" accept="image/*" enctype="multipart/form-data">
                                                <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
                                              </div>
                                            </td>
                                        </tr>
                                        <tr>
                                          <th>Date Of Birth</th>
                                          <td>
                                            <input type="date" name="" id="" class="form-control">
                                          </td>
                                        </tr>
                                        
                                        <tr>
                                          <th>Bio</th>
                                          <td>
                                            <input type="text" class="form-control"  name="" id="" value="live and let live">
                                          </td>
                                        </tr>
                                        <tr>
                                          <th>
                                            <input type="submit" class="btn btn-info" value="Update" name="update">
                                          </th>
                                            <td>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>


                          </div>
                        </div>

                </div>
            </div>
        </div>
    

</body>

</html>