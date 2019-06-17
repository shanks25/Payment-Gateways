<?php

namespace App\Http\Controllers;

use Exception;
use GuzzleHttp\Client as Guzzle;
use Illuminate\Http\Request;

class SmsfreshController extends Controller
{
	public function index(Request $request)
	{ 
		$mobile = $request->mobile;
		$client = new Guzzle;
		$response = $client->get("http://148.251.80.111:5665/api/SendSMS?api_id=API2594630359&api_password=ETJLiE2WHih64u7&sms_type=T&encoding=T&sender_id=CHIGGYS&phonenumber=9657085678&textmessage=This is a test SMS");
	//	echo $response->getStatusCode(); # 200
// echo $response->getHeaderLine('content-type'); # 'application/json; charset=utf8'
  $result = json_decode($response->getBody()); # '{"id": 1420053, "name": "guzzle", ...}'
  print_r($result);
  
}


public function guzzleplay()
{
	$client = new Guzzle(['base_uri' => 'https://api.github.com/repos/guzzle/']);   // we can set base uri
	$response = $client->request('GET', 'guzzle');   // request will hit to baseurl/guzzle 	
	$result = json_decode($response->getBody()); 
	print_r($result); 
}

public function postform(Request $request)
{
	try
	{	$client = new Guzzle;
		$response = $client->request('POST', 'http://148.251.80.111:5665/api/SendSMS', [
			'form_params' => [
				'api_id' => 'abc',
				'api_password' => 'ETJLiE2WHih64u7',
				'sms_type' => 'T',
				'encoding' => 'T',
				'api_password' => 'ETJLiE2WHih64u7',

			 ],
[ 	
			'headers' => 
				'Accept'     => 'application/json',
				'Content-Type'     => 'application/json',
			]
		]
	);
		$result = json_decode($response->getBody()); # '{"id": 1420053, "name": "guzzle", ...}'
		print_r($result);


	}
	catch(Exception $e){
		echo $e->getMessage(); 
	}
}


}
