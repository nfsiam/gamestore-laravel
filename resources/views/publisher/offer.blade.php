<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> 
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src=" {{asset('/js/publisher/common.js')}}"></script>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <table class="table">
    
                <tr>
                    <th>Updated Price</th>
                    <td>
                        <input type="number" name="updatePrice" id="updateprice">
                    </td>
                </tr>
    
                <tr>
                    <th>Offer Start</th>
                    <td>
                        <input type="date" name="startDate" id="startdate">
                    </td>
                </tr>
    
                <tr>
                    <th>Offer End</th>
                    <td>
                        <input type="date" name="endDate" id="enddate">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input class="btn btn-primary btn-sm" type="submit" value="Update" name="submit">
                        <input class="btn btn-danger btn-sm" type="button" value="Back" name="back" id="back">
                    </td>
                  
                </tr>
            </table>
        </form>
    </div>

</body>
</html>