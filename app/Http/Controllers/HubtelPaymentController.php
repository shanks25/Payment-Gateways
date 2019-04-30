<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;


class WalletController extends Controller
{
	public function index(Request $request)
	{

    try{
     $name='Harray Paidal';
     $random=mt_rand(100000,999999);
     $invoice = "{\n  \"items\": [\n    {\n      \"name\": \"$name\",\n      \"quantity\": 1,\n      \"unitPrice\": 50\n    },\n    {\n      \"name\": \"Chinua Achebe\",\n      \"quantity\": 1,\n      \"unitPrice\": 50\n    }\n  ],\n  \"totalAmount\": 100,\n  \"description\": \"Book Shop Checkout\",\n  \"callbackUrl\": \"https://webhook.site/8b4bbd0a-5f98-4b3d-abbe-b9b49767f7d5\",\n  \"returnUrl\": \"http://hubtel.com/online\",\n  \"merchantBusinessLogoUrl\": \"http://hubtel.com/online\",\n  \"merchantAccountNumber\": \"HM0409180006\",\n  \"cancellationUrl\": \"http://hubtel.com/online\",\n  \"clientReference\": \"$random\"\n}";

     $headers=  array(
      "Authorization: Basic bjJXS0o1Qjo0MWU4NzA4ZS0wODVkLTQ0NDUtOTQ3ZS1hZjBiODlkNzI1OWY=",
      "Content-Type: application/json",
      "Postman-Token: 2bd373c8-3669-4fdf-93e9-d301af0a9cff",
      "cache-control: no-cache"
    );

     $ch = curl_init("https://api.hubtel.com/v2/pos/onlinecheckout/items/initiate");
     curl_setopt($ch, CURLOPT_POST, true);
     curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($invoice));
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

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
  catch(Exception $e)
  {
    return $e;
  }
}

}

$items = ["name" => "Harry Potter", "quantity" => 1, "unitPrice" => 50];
$invoice = array("items" => $items, "totalAmount" => 1, "description" => "test", "callbackUrl" => "https://localhost:8000/status","returnUrl"=>"https://localhost:8000/return","cancellationUrl"=>"https://localhost:8000/cancel",
  "merchantBusinessLogoUrl"=>"https://localhost:8000/wallet","merchantAccountNumber"=>"HM0409180006","clientReference"=>1234567890);.


/*
Above can also be written as below 

 $name='Harray Paidal';
     $random=mt_rand(100000,999999);
     $invoice = "{\n  \"items\": [\n    {\n      \"name\": \"$name\",\n      \"quantity\": 1,\n      \"unitPrice\": 50\n    },\n    {\n      \"name\": \"Chinua Achebe\",\n      \"quantity\": 1,\n      \"unitPrice\": 50\n    }\n  ],\n  \"totalAmount\": 100,\n  \"description\": \"Book Shop Checkout\",\n  \"callbackUrl\": \"https://webhook.site/8b4bbd0a-5f98-4b3d-abbe-b9b49767f7d5\",\n  \"returnUrl\": \"http://hubtel.com/online\",\n  \"merchantBusinessLogoUrl\": \"http://hubtel.com/online\",\n  \"merchantAccountNumber\": \"HM0409180006\",\n  \"cancellationUrl\": \"http://hubtel.com/online\",\n  \"clientReference\": \"$random\"\n}";

     $headers=  array(
      "Authorization: Basic bjJXS0o1Qjo0MWU4NzA4ZS0wODVkLTQ0NDUtOTQ3ZS1hZjBiODlkNzI1OWY=",
      "Content-Type: application/json",
      "Postman-Token: 2bd373c8-3669-4fdf-93e9-d301af0a9cff",
      "cache-control: no-cache"
    );

     $ch = curl_init("https://api.hubtel.com/v2/pos/onlinecheckout/items/initiate");
     curl_setopt($ch, CURLOPT_POST, true);
     curl_setopt($ch, CURLOPT_POSTFIELDS, $invoice);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
     
     $response = curl_exec($ch);
     $err = curl_error($ch);
     curl_close($ch);
     $response =  json_decode($response,true);
     if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      dd($response);
    }
*/