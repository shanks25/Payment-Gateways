<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Instamojo\Instamojo;

class InstamojoController extends Controller
{
	public function create()
	{
		return view('instamojo.checkout');
	}

	public function index()
	{
		$api = new Instamojo('test_af07350102df28c8a0ccbe3977e', 'test_0e51d3c16753ffaa5148c5ac4a8', 'https://test.instamojo.com/api/1.1/');
		try {
			$response = $api->paymentRequestCreate(array(
				"purpose" => "FIFA 16",
				"amount" => "100",
				"send_email" => true,
				"email" => "foo@example.com",
				"redirect_url" => url('instamojo/success')
			));
			return $response;
		}
		catch (Exception $e) {
			print('Error: ' . $e->getMessage());
		}
	}
	public function success(Request $request)
	{
		$api = new Instamojo('test_af07350102df28c8a0ccbe3977e', 'test_0e51d3c16753ffaa5148c5ac4a8');
	  $request->all();
	 	$request1= $request->payment_request_id;
 
	 	$request2 = $request->payment_id;

		try {
			$response = $api->paymentRequestPaymentStatus('6e588ddf72f044d9a62219ffec1d3281', 'MOJO9430M05A33969055');
     dd($response);
}
catch (Exception $e) {
	print('Error: ' . $e->getMessage());
}

}
}
