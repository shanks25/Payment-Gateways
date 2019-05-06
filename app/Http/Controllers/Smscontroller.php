<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;

class Smscontroller extends Controller
{
	public function create()
	{
		return view('create');
	}

	public function index()
	{
		$apiKey = urlencode('bb43d2b319617402463ca0b6aac484b0');
		$numbers = 233244560599;
		$from = urlencode('Jims Autos');
		$message = rawurlencode('This is your message');
		$id='Swiftwheels';

		$url = "https://sms.dtechghana.com/api/v1/messages";
		urlencode($url);

	// Prepare data for POST request
		$data = array('from' => $from, 'to' => $numbers, "secret" => $apiKey, "content" => $message, "id" => $id);
		try {
			$ch = curl_init();
    // Check if initialization had gone wrong*    
			if ($ch === false) {
				throw new Exception('failed to initialize');
			}
			curl_setopt($ch, CURLOPT_URL, $url); 

		curl_setopt($ch, CURLOPT_POST, TRUE);   // if curlopt_post is false that means this is a get request
		curl_setopt($ch,CURLOPT_POSTFIELDS,$data); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, FALSE); 
		$result = curl_exec($ch);
		if ($result == false) {
			throw new Exception(curl_error($ch), curl_errno($ch));
			curl_close($ch); 
		}
	}
	catch(Exception $e) {
		dd($e);
	}

}

}
