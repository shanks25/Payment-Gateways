<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Search</title>
	<style>
		.container{
			margin: 5%;
		}
	</style>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="col-lg-6 offset-3">	
			
			<form action="{{ url('searchresults') }}" method="get">

				<div class="form-group">
					<label for="exampleInputEmail1">Search User</label>
					<input type="text" class="form-control" name="search">
				</div>
				<button class="btn btn-primary" type="submit">Submit</button>
			</form>
			@section('results')
			@show
		</div>
	</div>
</body>
</html>