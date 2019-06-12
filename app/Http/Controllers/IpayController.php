<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IpayController extends Controller
{
	

	public function create()
	{
		$invoiceid=uniqid();
		session()->put('invoice',$invoiceid);
		return view('ipay.checkout',compact('invoiceid'));
	}

	public function demo($invoice)
	{
		$this->invoice= $invoice;
	}

	public function index()
	{
		$name='Harray Paidal';
		$random=mt_rand(100000,999999);
		$invoice = "{\n  \"merchant_key\": \"tk_e36f5f54-61c0-11e9-865e-f23c9170642f\",\n  \"invoice_id\": \"a4567\",\n  \"total\": 1,\n \"pymt_instrument\": \"'0260000000'\",\n  \"extra_wallet_issuer_hint\": \"airtel\",\n  \"ipn_url\": \"https://localhost:8000/ipay/callbackurl\"}";

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://community.ipaygh.com/v1/mobile_agents_v2",
			CURLOPT_POST=>true,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => $invoice,
			CURLOPT_HTTPHEADER => array(
				"Content-Type: application/json",
				"Postman-Token: 2bd373c8-3669-4fdf-93e9-d301af0a9cff",
				"cache-control: no-cache"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		$response =  json_decode($response,true);
		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			dd($response);	
		}
	}
	public function callbackurl()
	{
		return 'asfd';
		$invoice= session()->get('invoice');
		
		$ch = curl_init('https://community.ipaygh.com/v1/gateway/json_status_chk?invoice_id='.$invoice.'&merchant_key=tk_e36f5f54-61c0-11e9-865e-f23c9170642f');
		curl_setopt($ch, CURLOPT_POST, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);
		echo $response;
	}
}


