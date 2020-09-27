<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>ADMIN</title>

  <link rel="stylesheet" href="/css/admin/bootstrap.min.css">

 


  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>

</head>

<body>
  <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Admin</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
      data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100"  id="searchboxid"  type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="#">Sign out</a>
      </li>
    </ul>
  </nav>

  <div class="container-fluid">
    <div class="row">
    @include('admin/admindashboard')

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
              <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
              <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
              <span data-feather="calendar"></span>
              This week
            </button>
          </div>
        </div>  

        <div>
          <h2>Wellcome Admin</h2>
        </div>


        <div class="emptable1" style="margin: 20px 20px 0px 0px ; background-color: rgb(216, 195, 195);">

  
      </div>

      <form method="post" action="/admin/gamedelete">
        <label>ID:</label>
        <input class="form-control"  type="text" placeholder="type the id" name="id">
        @if(session('permissiongamedelete')=="yes")
        <input class="btn btn-danger"   type="submit" name="submit" value="delete now">
        @else
        <input class="btn btn-danger" disabled  type="submit" name="submit" value="delete now">
        @endif
      </form>

      <br>
      <br>

      <form action="" method="post">
      <input type="submit" class="btn btn-secondary" name="submit" value="Excel">
      </form>

      </main>
    </div>
  </div>
 

  <script src="/css/admin/jquery-3.4.1.min.js"></script>
  <script src="/css/admin/popper.min.js"></script>
  <script src="/css/admin/bootstrap.min.js"></script>

  <script>

    $(document).ready(function(){
    
        //e.preventDefault()
        var mytext = $('#searchboxid').val();
        var emptable1=$('.emptable1');
        $.ajax({
            url:'/admin/searchgame',
            data: {text: mytext},
            method:'get',
            contentType: 'application/x-www-form-urlencoded',
            success: function(response){
                //console.log(response.emp)
    
             
                var html1= " <table class='table' border='1'>"+
                " <tr>"+
                " <th>id</th> <th>title</th> <th>propic</th> <th>filepath</th> <th>publisher</th> <th>publishdate</th> <th>offerid</th> <th>parentgameid</th> <th>price</th> </tr> <tbody>";
              
               var html2="";
    
               
                for(let emp of response.emp){
    
                   html2=html2+
                   " <form  >"+
                   "<input type='hidden' name='id' value='"+emp.id+"'>"+
                            "<tr>"+
                            "<td>'"+emp.id+"'</td>"+
                            "<td>'"+emp.title+"'</td>"+
                            "<td>'"+emp.propic+"'</td>"+
                           
                            "<td>'"+emp.filepath+"'</td>"+
                            "<td>'"+emp.publisher+"'</td>"+
                            "<td>'"+emp.publishdate+"'</td>"+
                            "<td>'"+emp.offerid+"'</td>"+
                            "<td>'"+emp.parentgameid+"'</td>"+
                            "<td>'"+emp.price+"'</td>"+                            
                         " </tr>"                          
                            ;
                      
                }
    
                  emptable1.html(html1+html2+"</table> </form>");
            },
            error: function(err){
                console.log(err)
            }
        })
    
    
    
    
    
    });
    
        </script>

<script>
  $(document).ready(function () {

      var emptable1 = $('.emptable1');


      $('#searchboxid').keyup(function (e) {
        //e.preventDefault()
        var mytext = $('#searchboxid').val();
        $.ajax({
          url: '/admin/search',
          data: { text: mytext },
          method: 'POST',
          contentType: 'application/x-www-form-urlencoded',
          success: function (response) {
         //   console.log(response)
         var html1= " <table class='table' border='1'>"+
                " <tr>"+
                " <th>id</th> <th>title</th> <th>propic</th> <th>filepath</th> <th>publisher</th> <th>publishdate</th> <th>offerid</th> <th>parentgameid</th> <th>price</th> </tr> <tbody>";
              
               var html2="";
    
               
                for(let emp of response.emp){
    
                   html2=html2+
                   " <form  >"+
                   "<input type='hidden' name='id' value='"+emp.id+"'>"+
                            "<tr>"+
                            "<td>'"+emp.id+"'</td>"+
                            "<td>'"+emp.title+"'</td>"+
                            "<td>'"+emp.propic+"'</td>"+
                         
                            "<td>'"+emp.filepath+"'</td>"+
                            "<td>'"+emp.publisher+"'</td>"+
                            "<td>'"+emp.publishdate+"'</td>"+
                            "<td>'"+emp.offerid+"'</td>"+
                            "<td>'"+emp.parentgameid+"'</td>"+
                            "<td>'"+emp.price+"'</td>"+                            
                         " </tr>"                          
                            ;
             
            }
            emptable1.html(html1 + html2 + "</table> </form>");
          },
          error: function (err) {
            console.log(err)
          }
        })
      })




    });
</script>




</body>

</html>