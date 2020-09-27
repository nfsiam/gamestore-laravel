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
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <div align="center">
        <h1>Game list</h1>
        <br>
        <a href="/profile">Profile</a>
        <a href="/transactions">Transactions-History</a>
        <br>
        <br>
        <br>
        <a href="/gamelist">Game list</a>
        <a href="/userlist">User list</a>
    </div>
    <br>
    <br>
@foreach($g_list as $game)
	<div class="item">
		Name: {{ $game->title }} <br>
        Price: {{ $game->price }} <br>
        <br>
		
        <button type="submit" name="cartBtn" class="cartBtn" id="cartBtn" value="{{ $game->id }}">
            Add to Cart
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
	            
	            url: '/addtocart',
	            type: 'POST',
	            data: {_token: CSRF_TOKEN, id:id},
	            success: function(result){
	            	if(result == -1){
	            		alert("Not allowed");
	            	}
	            }
	        });
	      });
	    });

 	</script>

</body>
</html>