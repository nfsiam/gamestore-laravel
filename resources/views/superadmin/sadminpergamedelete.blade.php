<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Super ADMIN</title>

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
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="#">Sign out</a>
      </li>
    </ul>
  </nav>

  <div class="container-fluid">
    <div class="row">
      @include('superadmin/dashboard')

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

            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">USERNAME</th>
                    <th scope="col">Game Delete Permission</th>
                    <th scope="col">Permitted By</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($permission as $admin)
                <form method="POST" action="/sadmin/permissiongamedelete" >
                <input type="hidden" name="username" value="{{$admin->username}}" >
                  <tr>
                    <th scope="row"></th>
                    <td>{{ $admin->id}}</td>
  						      <td>{{ $admin->username}}</td>
                    <td>
                    <select name="permissionstatus" class="browser-default custom-select">	

                     @if($admin->permissionstatus=="yes")																
  
                     <option selected value="yes">yes</option>
                       <option  value="no">no</option>
                       <option  value="">none</option>
                     @elseif($admin->permissionstatus=="no")																
  
                    <option  value="yes">yes</option>
                      <option selected  value="no">no</option>
                      <option  value="">none</option>
                    @else															
  
                    <option  value="yes">yes</option>
                      <option  value="no">no</option>
                      <option selected value="">none</option>
                    @endif
						      	</td>
					      		<td>{{ $admin->permittedby}}</td>
					      		<td>{{ $admin->eventtime}}</td>
                    <td><input type="submit" class="btn btn-primary" name="submit" value="update"></td>
                  </tr>
                  </form>
                  @endforeach
                </tbody>
              </table>
            
        </div>
       
      </main>
    </div>
  </div>
 

  <script src="/css/admin/jquery-3.4.1.min.js"></script>
  <script src="/css/admin/popper.min.js"></script>
  <script src="/css/admin/bootstrap.min.js"></script>



</body>

</html>