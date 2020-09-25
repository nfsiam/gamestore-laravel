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
<script src="{{asset('js/connect.js')}}"></script>

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
          <input style="padding: 10px; width: 300px; border: 1px solid;" class="form-input" type="search" placeholder="Type to search">
        <div class="row">
            <div class="col-lg-12 col-sm-5">
              <div class="friend-list d-flex flex-wrap">
                @php
                    $i=0;
                    $query="select * from friends where sender='".Auth::user()->username."' || receiver='".Auth::user()->username."' ";
                    $status = Illuminate\Support\Facades\DB::select("select * from friends where sender='".Auth::user()->username."' || receiver='".Auth::user()->username."' ");
                    //print_r($status);
                   // echo $query;
                    //  print_r($status[0]);
                @endphp
                 @foreach ($users as $user)
                    <div class="friend-profile-container mt-3 d-flex flex-wrap">
                      <div class="profile-wrap mr-5 p-3">
                          <div class="propic-wrapper text-center">
                              <img src="{{asset($user->propic)}}" class="img-circle" alt="">
                              <h5 class="mt-2 mb-2">{{$user->username}}</h5>
                          </div>
                          <input type="hidden" id="addjs" name="">
                          <div class="profile-buttons">
                           
                           @if (count($status)>0 && $i<count($status))
                              @if ($status[$i]->sender==$user->username || $status[$i]->receiver==$user->username)  
                                @if ($status[$i]->status=="requested")
                                    @if ($status[$i]->receiver == Auth::user()->username)
                                        <button id="{{$status[$i]->id}}" class="acceptrequestbtn btn btn-primary btn-sm mt-2"><i class="fa fa-user"></i>   <span class="ml-1">Accept</span></button>
                                    @endif
                                    <button id="{{$status[$i]->id}}" class="cancelrequestbtn btn btn-primary btn-sm mt-2"><i class="fa fa-user-times"></i>   <span class="ml-1">Cancel</span></button>
                                @else
                                    <button id="{{$status[$i]->id}}" class="unfriendbtn btn btn-primary btn-sm mt-2"><i class="fa fa-user-times"></i>   <span class="ml-1">Unfriend</span></button>
                                @endif
                              @php
                                  $i++;
                              @endphp
                              @else
                                <button id="{{$user->username}}" class="addfriendbtn btn btn-primary btn-sm mt-2"><i class="fa fa-user"></i>   <span class="ml-1">Add Friend</span></button>
                              @endif
                           @else
                              <button id="{{$user->username}}" class="addfriendbtn btn btn-primary btn-sm mt-2"><i class="fa fa-user"></i>   <span class="ml-1">Add Friend</span></button>    
                           @endif

                              
                              <button id="{{$user->username}}" class="messagefriendbtn btn btn-primary btn-sm mt-2"><i class="fa fa-comments"></i>   <span class="ml-1">Message</span></button>
                             
                          </div>
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