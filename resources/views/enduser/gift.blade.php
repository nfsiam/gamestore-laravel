<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gift Game</title>
</head>
<body>
        <form action="" method="post">
            @csrf

            <input type="text" style="width:300px;" name="username" id="" placeholder="Enter username you want to gift">
            <br>
            <input type="submit" value="Submit">
            <br>
            @error('username')
               {{$message}}
            @enderror

        </form>
</body>
</html>