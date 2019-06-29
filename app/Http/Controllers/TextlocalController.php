<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TextlocalController extends Controller
{
	public function index(Request $request)
	{
		$apiKey = urlencode('NcgAlah9T4s-lEz1dYZLGLos4mXYMmF726R2H2Kr3a');
	// Message details
		$numbers = array('91'.$request->mobile);
		$sender = urlencode('TXTLCL');
		$message = rawurlencode('This is your message');

		$numbers = implode(',', $numbers);

	// Prepare data for POST request
		$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);

	// Send the POST request with cURL
		$ch = curl_init('https://api.textlocal.in/send/');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);
	// Process your response here
		echo $response; 
	}
}
