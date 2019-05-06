 @extends('search')
 @section('results')
 <h1>Search Results</h1>
 <p>{{$users->total()}} result(s) for '{{request()->input('search')}}' </p>
 <table id="example1" class="table table-bordered table-striped">
 	<thead>
 		<tr>
 			<th>Sr.No</th>
 			<th>Name</th>
 			<th>Email</th>
 		</tr>
 	</thead>
 	@foreach ($users as $user)
 	<tbody>
 	<tr>
 		<td>{{$loop->index + 1}}</td>
 		<td> {{$user->name}}</td>
 		<td>{{$user->email}}</td>
 	</tr>
 	 	@endforeach
 	</tbody>
 </table>

 	<br><br>
 	 	 {{ $users->appends(request()->input())->links() }}
 	@endsection
