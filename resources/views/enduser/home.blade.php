
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Homepage</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> 
  <link rel="stylesheet" href="{{ asset('css/home.css')}}">
  <link rel="stylesheet" href="{{ asset('css/common.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="{{asset('js/common.js')}}"></script>

  
</head>

<body>

    <div class="d-flex" id="wrapper">

     
       <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading"><b>Menu</b></div>
        <div class="list-group list-group-flush">
          <a href="/enduser/home" class="list-group-item list-group-item-action bg-light">Home</a>
          <a href="/enduser/store" class="list-group-item list-group-item-action bg-light">Store</a>
          <a href="/enduser/library" class="list-group-item list-group-item-action bg-light">Library</a>
          <a href="#" class="list-group-item list-group-item-action bg-light">Communnity</a>
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


        <h1 class="mt-4">Offers</h1>
        <form action="">
          <input style="padding: 10px;" class="form-input" type="search" placeholder="Search for more offers">
          <button class="btn btn-primary mb-1" style="padding: 10px; padding-right: 15px; padding-left: 15px;"><i class="fa fa-search"></i></button>
          <br>
          <button class="btn btn-info btn-sm mt-2"><i class="fa fa-filter"></i>   <span class="ml-2">Add Filter</span></button>
          <button class="btn btn-warning btn-sm mt-2"><i class="fa fa-shopping-cart"></i>   <span class="ml-2">Cart</span></button>
        </form>

        <div class="row">
            <div class="col-lg-12 col-sm-5">
             <!--  d-flex flex-wrap -->
              <div class="game-list d-flex  flex-wrap pt-3">

              <div class="box-wrapper ">
                
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
                  <input type="button" class="btn btn-warning btn-sm" value="Add to wish list">
                </div>

              </div>



              <div class="box-wrapper ">
                
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
                  <input type="button" class="btn btn-warning btn-sm" value="Add to wish list">
                </div>

              </div>



              <div class="box-wrapper ">
                
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
                  <input type="button" class="btn btn-warning btn-sm" value="Add to wish list">
                </div>

              </div>





              <div class="box-wrapper ">
                
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
                  <input type="button" class="btn btn-warning btn-sm" value="Add to wish list">
                </div>

              </div>





              <div class="box-wrapper">
                
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
                  <input type="button" class="btn btn-warning btn-sm" value="Add to wish list">
                </div>

              </div>
              

              </div>
            </div>
        </div>

        <h1 class="mt-4">Upcoming</h1>
        <form action="">
          <input style="padding: 10px;width: 300px;" class="form-input" type="search" placeholder="Search for more Upcoming Games">
          <button class="btn btn-primary mb-1" style="padding: 10px; padding-right: 15px; padding-left: 15px;"><i class="fa fa-search"></i></button>
          <br>
          <button class="btn btn-info btn-sm mt-2"><i class="fa fa-filter"></i>   <span class="ml-2">Add Filter</span></button>
        </form>
       
        <div class="row">
          <div class="col-lg-12 col-sm-5">

            <div class="game-list d-flex  flex-wrap pt-3">

              <div class="box-wrapper">
                
                <div class="game-wrapper d-flex">

                    <div class="box mb-3">
                      <img src="contra.JPG" alt="" srcset=""> 
                    </div>

                    <div class="box-text mr-3 mb-3 text-center">
                      <h5>Contra</h5>
                      <h5>Size : 300kb</h5>
                      <h5>Platform : Nes</h5>
                      
                      <h6>Current Price : $30</h6>
                      <h6>Release Date : 02/10/2</h6>
                    </div>

              </div>

                <div class="box-button pb-3">
                 
                  <input type="button" class="btn btn-warning btn-sm" value="Add to wish list">
                </div>

              </div>



              <div class="box-wrapper">
                
                <div class="game-wrapper d-flex">

                    <div class="box mb-3">
                      <img src="contra.JPG" alt="" srcset=""> 
                    </div>

                    <div class="box-text mr-3 mb-3 text-center">
                      <h5>Contra</h5>
                      <h5>Size : 300kb</h5>
                      <h5>Platform : Nes</h5>
                     
                      <h6>Current Price : $30</h6>
                      <h6>Release Date : 02/10/2</h6>
                    </div>

              </div>

                <div class="box-button pb-3">
                 
                  <input type="button" class="btn btn-warning btn-sm" value="Add to wish list">
                </div>

              </div>



              <div class="box-wrapper">
                
                <div class="game-wrapper d-flex">

                    <div class="box mb-3">
                      <img src="contra.JPG" alt="" srcset=""> 
                    </div>

                    <div class="box-text mr-3 mb-3 text-center">
                      <h5>Contra</h5>
                      <h5>Size : 300kb</h5>
                      <h5>Platform : Nes</h5>
                      
                      <h6>Current Price : $30</h6>
                      <h6>Release Date : 02/10/2</h6>
                    </div>

              </div>

                <div class="box-button pb-3">
                  
                  <input type="button" class="btn btn-warning btn-sm" value="Add to wish list">
                </div>

              </div>





              <div class="box-wrapper">
                
                <div class="game-wrapper d-flex">

                    <div class="box mb-3">
                      <img src="contra.JPG" alt="" srcset=""> 
                    </div>

                    <div class="box-text mr-3 mb-3 text-center">
                      <h5>Contra</h5>
                      <h5>Size : 300kb</h5>
                      <h5>Platform : Nes</h5>
                      
                      <h6>Current Price : $30</h6>
                      <h6>Release Date : 02/10/2</h6>
                    </div>

              </div>

                <div class="box-button pb-3">
                  
                  <input type="button" class="btn btn-warning btn-sm" value="Add to wish list">
                </div>

              </div>





              <div class="box-wrapper ">
                
                <div class="game-wrapper d-flex">

                    <div class="box mb-3">
                      <img src="contra.JPG" alt="" srcset=""> 
                    </div>

                    <div class="box-text mr-3 mb-3 text-center">
                      <h5>Contra</h5>
                      <h5>Size : 300kb</h5>
                      <h5>Platform : Nes</h5>
                      
                      <h6>Current Price : $30</h6>
                      <h6>Release Date : 02/10/2</h6>
                    </div>

              </div>

                <div class="box-button pb-3">
                  
                  <input type="button" class="btn btn-warning btn-sm" value="Add to wish list">
                </div>

              </div>
              

            </div>
           


      </div>
    </div>

    <h1 class="mt-4">Latest Patches</h1>
        <form action="">
          <input style="padding: 10px;width: 300px;" class="form-input" type="search" placeholder="Search for latest Release Patches">
          <button class="btn btn-primary mb-1" style="padding: 10px; padding-right: 15px; padding-left: 15px;"><i class="fa fa-search"></i></button>
          
        </form>
       
        <div class="row">
          <div class="col-lg-12 col-sm-5">

            <div class="game-list d-flex  flex-wrap pt-3">

              <div class="box-wrapper">
                
                <div class="game-wrapper d-flex">

                    <div class="box mb-3">
                      <img src="contra.JPG" alt="" srcset=""> 
                    </div>

                    <div class="box-text mr-3 mb-3 text-center">
                      <h5>Contra</h5>
                      <h5>Size : 300kb</h5>
                      <h5>Platform : Nes</h5>
                      <h6>Patched Date : 02/10/2</h6>
                    </div>

              </div>

                <div class="box-button pb-3">
                  <input type="button" class="btn btn-success btn-sm" value="Update">
                </div>
              </div>

              <div class="box-wrapper">
                
                <div class="game-wrapper d-flex">

                    <div class="box mb-3">
                      <img src="the last of us.jpg" alt="" srcset=""> 
                    </div>

                    <div class="box-text mr-3 mb-3 text-center">
                      <h5>The Last of us</h5>
                      <h5>Size : 30gb</h5>
                      <h5>Platform : PS4</h5>
                      
                      <h6>Current Price : $30</h6>
                      <h6>Patched Date : 02/10/2</h6>
                    </div>

              </div>

                <div class="box-button pb-3">
                  
                  <input type="button" class="btn btn-success btn-sm" value="Update">
                </div>

              </div>
              

            </div>
           


      </div>
    </div>





  </div>

</body>

</html>