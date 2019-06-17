<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SMS Gateway</title>
</head>
<body>
	<div class="container">
		<h3>below submit button for dtechghana</h3>
		<form action="{{ route('sms') }}" method="post" enctype="multipart/form-data">
			@csrf
			<input type="submit" value="submit">
		</form>
		<h3>below submit for GET METHOD sms fresh</h3>
		<form action="{{ route('freshsms') }}" method="get">
			@csrf
			<input type="text" name="mobile" placeholder="Enter Mobile Number">
			<input type="submit" value="submit">
		</form>

		<h3>below submit for POST METHOD sms fresh</h3>
		<form action="{{ url('sendsms') }}" method="post">
			@csrf
			<input type="text" name="mobile" placeholder="Enter Mobile Number">
			<input type="submit" value="submit">
		</form>


		<h3>below submit for POST METHOD Textlocal</h3>
		<form action="{{ url('textlocal') }}" method="post">
			@csrf
			<input type="text" name="mobile" placeholder="Enter Mobile Number">
			<input type="submit" value="submit">
		</form>
	</div>
</body>
</html>