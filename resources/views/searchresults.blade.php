 @extends('search')
 @section('results')
 <h1>Search Results</h1>
 <p>{{$users->count()}} result(s) for '{{request()->input('query')}}' </p>
 @foreach ($users as $user)
 <div>{{$user->name}}</div>
 @endforeach
 @endsection