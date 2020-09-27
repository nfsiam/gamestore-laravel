<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Moderation Panel</title>
    <style>
        body {
            width: 100%;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <div style="width: 85%; margin: 0 7.5%;">
        <div style="padding-left: 50px; padding-right: 50px;">
            <h3>Moderation Report</h3>
            <h4>printed by: {{Auth::user()->username}}</h4>
            <hr>

            <table>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Count</th>
                </tr>
                <tr>
                    <td>Pending Posts</td>
                    <td>{{$pendingcount}}</td>
                </tr>
                <tr>
                    <td>Post Reports</td>
                    <td>{{$postreportcount}}</td>
                </tr>
                <tr>
                    <td>Post Delete Request</td>
                    <td>{{$postdelreqcount}}</td>
                </tr>

                <tr>
                    <td>All Users</td>
                    <td>{{$usercount}}</td>
                </tr>
                <tr>
                    <td>Comment Count</td>
                    <td>{{$commentcount}}</td>
                </tr>

                <tr>
                    <td>React Count</td>
                    <td>{{$reactcount}}</td>
                </tr>

                <tr>
                    <td>Issue Count</td>
                    <td>{{$issuecount}}</td>
                </tr>

                <tr>
                    <td>Review Count</td>
                    <td>{{$reviewcount}}</td>
                </tr>
                <tr>
                    <td>Walkthrough Count</td>
                    <td>{{$walkthroughcount}}</td>
                </tr>
            </table>
        </div>
    </div>

    </div>

</body>

</html>