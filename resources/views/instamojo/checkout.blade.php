<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Instamojo Checkout Page</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style>
		body{
			margin: 150px;
		}
	</style>
</head>
<body>
	<div class="container">
		<form class="form-inline" method="post" action="{{ route('instamojo') }}">
			@csrf	 
		 
			<button type="submit" class="btn btn-primary mb-2">Checkout</button>
		</form>
	</div>
</body>
</html>