<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class SearchController extends Controller
{
	public function index()
	{
		return view('search');
	}
	public function search(Request $request)
	{ 
		$search= $request->search;
		$users = User::where('name','like',"%$search%")
					   ->orWhere('email','like',"%$search%")	
		               ->paginate(10);
		return	view('searchresults')->with('users',$users);
	}
  
   public function user($id)
   {
   	 return User::find($id);
   }

}
