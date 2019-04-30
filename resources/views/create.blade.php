<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SMS Gateway</title>
</head>
<body>
	<div class="container">
		<form action="{{ route('sms') }}" method="post" enctype="multipart/form-data">
			@csrf
		<input type="submit" value="submit">
		</form>
	</div>
</body>
</html>