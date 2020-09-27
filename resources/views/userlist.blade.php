<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Game Store</title>
    <style>
        a{
            background-color:sandybrown;
            font-weight: bolder;
            border: 2px black solid;
            text-decoration: none;
            padding: 5px;
            margin: 5px;
        }
        .item{
            border: 1px black solid;
            padding: 5px;
            margin-top: 15px;
        }
    </style>
</head>
<body>

<div align="center">
    <h1>User list</h1>
    <br>
    <a href="/profile">Profile</a>
    <a href="/transactions">Transctions-History</a>
    <br>
    <br>
    <br>
    <a href="/gamelist">Game list</a>
    <a href="/userlist">User list</a>
</div>
    
@foreach($u_list as $user)
	<div class="item">
		Name: {{ $user->name }} <br>
        <br>
		
        <button type="submit" name="cartBtn" class="cartBtn" id="cartBtn" value="{{ $user->id }}">
            Make friend
        </button>
		
	</div>
@endforeach
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
	<script>

	    $(document).ready(function(){

	      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	      
	      $("body").on("click",".cartBtn", function(){

	        var id = $(this).val();

	        $.ajax({
	            
	            url: '/makefriend',
	            type: 'POST',
	            data: {_token: CSRF_TOKEN, id:id},
	            success: function(result){
	            	
	            }
	        });
	      });
	    });

 	</script>

</body>
</html>