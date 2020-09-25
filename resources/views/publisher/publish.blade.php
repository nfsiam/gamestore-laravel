<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Publish</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> 
  <link rel="stylesheet" href="{{asset('/css/publisher/report.css')}}">
  <link rel="stylesheet" href=" {{asset('/css/publisher/library.css')}}">
  <link rel="stylesheet" href=" {{asset('/css/publisher/common.css')}}">
  <link rel="stylesheet" href=" {{asset('/css/publisher/connect.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src=" {{asset('/js/publisher/common.js')}}"></script>
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
                <div class="col-lg-10 col-sm-6">
                    <div class="publish-game">
                      
                        <form action="" method="POST" enctype="multipart/form-data">
                          @csrf
                            <table class="table">
                                <tr>
                                    <th>Game Title</th>
                                    <td><input type="text" class="form-control" name="title"  value="Contra"></td>
                                    <td>
                                      @error('title')
                                        {{ $message }}
                                      @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <th>Price $</th>
                                    <td><input type="text" class="form-control" name="price" id="" value="30"></td>
                                    <td>
                                      @error('price')
                                        {{ $message }}
                                      @enderror
                                    </td>
                                </tr>
                                
                               
                               
                                <tr>
                                    <th>Game Picture</th>
                                    <td>
                                      <div class="custom-file">
                                        <input type="file" name="gamepicture" class="custom-file-input" id="inputGroupFile02" accept="image/*" enctype="multipart/form-data">
                                        <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
                                      </div>
                                    </td>
                                    <td>
                                      @error('gamepicture')
                                        {{ $message }}
                                      @enderror
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th>Game File</th>
                                    <td>
                                      <div class="custom-file">
                                        <input type="file" name="gamefile" class="custom-file-input" id="inputGroupFile02" accept="/*" enctype="multipart/form-data">
                                        <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
                                      </div>
                                    </td>
                                    <td>
                                      @error('gamefile')
                                        {{ $message }}
                                      @enderror
                                    </td>
                                </tr>

                                <tr>
                                  <th>Attach Parent Game (optional)</th>
                                  <td>

                                    <select name="" id="" class="form-control">
                                      <option disabled selected>
                                          Choose a game
                                      </option>

                                      <option>
                                        Game Title : Contra , Game ID : 11
                                      </option>

                                      <option>
                                        Game Title : The Last Of Us , Game ID : 11
                                      </option>




                                    </select>


                                    
                                    
                                  </td>
                                </tr>



                                <tr>
                                  <th>
                                    <input type="submit" class="btn btn-info" value="Upload" name="upload">
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

  


</body>

</html>