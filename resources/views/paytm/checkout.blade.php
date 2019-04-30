<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Paytm Checkout Page</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style>
		body{
			margin: 150px;
		}
	</style>
</head>
<body>
	<div class="container">
		<form class="form-inline" method="post" action="{{ route('checkout.store') }}">
			@csrf	 
			<div class="form-group mx-sm-3 mb-2">
				<label for="price" style="margin-right: 20px;font-size: 26px;">Price</label>
				<input type="text" name="price" class="form-control" id="price" placeholder="Amount">
			</div>
			<button type="submit" class="btn btn-primary mb-2">Checkout</button>
		</form>
	</div>
</body>
</html>