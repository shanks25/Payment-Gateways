<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client as Guzzle;
use Illuminate\Http\Request;

class Msg91Controller extends Controller
{
	public function index()
	{
		$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.msg91.com/api/sendhttp.php?campaign=&response=&afterminutes=&schtime=&flash=&unicode=&mobiles=9657085678&authkey=281434AVTJwMEUHb5d07894a&route=4&sender=611332&message=Hello!%20This%20is%20a%20test%20message&country=91",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

	 
}
}
