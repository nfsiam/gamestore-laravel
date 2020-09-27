<!DOCTYPE html>
<html>
<head>
	<title>Transction list</title>
</head>
<body>
	<h1>Transction List</h1>

	<a href="/gamelist">Back</a>
	<br>
	<br>

		<table border="2px">
			<tr>
				<th>ID</th>
				<th>Game ID</th>
				<th>User Name</th>
				<th>Price</th>
				<th>Transaction Type</th>
				<th>Transaction By</th>
				<th>Transaction At</th>
			</tr>
	
		@foreach($list as $transaction)

			<tr>
				<td>{{$transaction->id}}</td>
				<td>{{$transaction->gameid}}</td>
				<td>{{$transaction->username}}</td>
				<td>{{$transaction->purchaseprice}}</td>
				<td>{{$transaction->transactiontype}}</td>
				<td>{{$transaction->transactionby}}</td>
				<td>{{$transaction->transactionat}}</td>
			</tr>

		@endforeach

		</table>

</body>
</html>
