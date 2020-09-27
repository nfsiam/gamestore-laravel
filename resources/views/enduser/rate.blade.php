<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rate Game</title>
</head>
<body>
        <form action="" method="post">
            @csrf

            <input type="number" name="ratting" id="" placeholder="choose between 1 to 5">
            <br>
            <input type="submit" value="Submit">
            <br>
            @error('ratting')
               {{$message}}
            @enderror

        </form>
</body>
</html>