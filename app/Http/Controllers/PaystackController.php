<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Unicodeveloper\Paystack\Facades\Paystack;

class PaystackController extends Controller
{

	public function showform()
	{
		return view('paystack.paymentform');
	}

	public function redirectToGateway()
	{
		return Paystack::getAuthorizationUrl()->redirectNow();
		$kunal= Paystack::getAuthorizationUrl();
		dd($kunal);
	}

	public function handleGatewayCallback()
	{
		$paymentDetails = Paystack::getPaymentData();

		dd($paymentDetails);
	}
}
