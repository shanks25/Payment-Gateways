<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;


class WalletController extends Controller
{
	public function index(Request $request)
	{
   $name='Harray Paidal';
   $random=mt_rand(100000,999999);
   $invoice = "{\n  \"merchant_key\": \"tk_e36f5f54-61c0-11e9-865e-f23c9170642f\",\n  \"invoice_id\": \"123a456a\",\n  \"total\": 1,\n  \"pymt_instrument\": \"'0244560599'\",\n  \"extra_wallet_issuer_hint\": \"airtel\",\n  \"ipn_url\": \"https://localhost:8000/return\"}";

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
   return $response;
 }
}
public function return(Request $request)
{
 return $request->all();
}
}


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