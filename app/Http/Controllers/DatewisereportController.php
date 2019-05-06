<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Illuminate\Http\Request;

class DatewisereportController extends Controller
{
	public function index(Request $request)
	{
	return	$users = Order::whereBetween('created_at', ['2019-04-28', '2019-05-01'.+1])->get();

		return redirect()->route('users.index', compact('users'));
	}
}
