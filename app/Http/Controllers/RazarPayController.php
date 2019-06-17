<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class RazarPayController extends Controller
{
    public function index()
    {
        return view('razorpay.razorpay');
    }

    <?php
$d=strtotime("tomorrow");
echo date("Y-m-d h:i:sa", $d) . "<br>"; // this shit will actually work and
                                        // return tomoroows date time                 

$d=strtotime("next Saturday");
echo date("Y-m-d h:i:sa", $d) . "<br>";

$d=strtotime("+3 Months");
echo date("Y-m-d h:i:sa", $d) . "<br>";
?>
    
    public function payment(Request $request)
    {

        $api = new Api('rzp_test_Gur3vzkmY22mZj', 'hoLwNcwp8P9zvprlt0e5WQXo');
        $orderData = [
            'receipt'         => 3456,
            'amount'          => $request->amount * 100,
            'currency'        => $request->currency,
            'payment_capture' => 1
        ];
        $razorpayOrder = $api->order->create($orderData);
        $razorpayOrderId = $razorpayOrder['id'];
        session()->put('invoice',$razorpayOrderId); 
        $amount = $orderData['amount'];
        $data = [
            "key"               => 'rzp_test_Gur3vzkmY22mZj',
            "amount"            => $amount,
            "name"              =>  $request->item_name,
            "description"       =>  $request->item_description,
            "image"             => "",
            "prefill"           => [
                "name"              =>  $request->cust_name,
                "email"             =>  $request->email,
                "contact"           =>  $request->contact,
            ],
            "notes"             => [
                "address"           =>  $request->address,
                "merchant_order_id" => "12312321",
            ],
            "theme"             => [
                "color"             => "#F37254"
            ],
            "order_id"          => $razorpayOrderId,
        ];

        $json = json_encode($data);
        return view('razorpay.razormanual',compact('json'));
    } 
    public function razorpayverify(Request $request)
    {


       $success = true;

       $error = "Payment Failed";

       if (empty($_POST['razorpay_payment_id']) === false)
       {
        $api = new Api('rzp_test_Gur3vzkmY22mZj', 'hoLwNcwp8P9zvprlt0e5WQXo');

        try
        {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
            $attributes = array(
                'razorpay_order_id' => $invoice= session()->get('invoice'),
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_signature' => $request->razorpay_signature   
            ); 
            $api->utility->verifyPaymentSignature($attributes);

        }
        catch(SignatureVerificationError $e)
        { 
            $success = false;
            $error = 'Razorpay Error : ' . $e->getMessage();
        }
    } 
    if ($success === true)
    {
        return view('razorpay.success');
    }
    else
    {
         return view('razorpay.fail');
    } 
   
}
}
