<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
</head>
<body>
	<h1>Profile</h1>
	<br>
	<br>
    <a href="/gamelist">Back</a>
    <br>
	<br>
	<form action="/profileUpdate" method="post">

		{{csrf_field()}}
		<table>
			<tr>
				<td>Username</td>
				<td><label  name="username" value="">{{$userInfo['username']}}</label></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><input type="text"  name="name" value="{{$userInfo['name']}}"></td>
			</tr>
			<tr>
				<td>dob</td>
				<td>
					<input type="text"  name="dob" value="{{$userInfo['dob']}}">
					<input type="date"  name="dob" value="">
				</td>
			</tr>
			<tr>
				<td>bio</td>
				<td><input type="text"  name="bio" value="{{$userInfo['bio']}}"></td>
			</tr>
			
			<tr>
				<td></td>
				<td><button type="submit"  name="but" value="{{$userInfo['id']}}">Update</button></td>
			</tr>
		</table>

	</form>

	@foreach($errors->all() as $error)
		{{$error}} <br>
	@endforeach

</body>
</html>
