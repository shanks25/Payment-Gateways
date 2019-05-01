<?php
Route::get('wallet','WalletController@index');
Route::post('/create','Smscontroller@index')->name('sms');
Route::get('/','Smscontroller@create');
Route::get('return','WalletController@return'); 

//Hubtel
Route::post('hubtel','HubtelPaymentController@index');
 
Route::resource('checkout','paytmOrderController');
Route::post('/paytm-callback', 'paytmOrderController@paytmCallback');  // Submit order to paytm

//IpayGhana

Route::post('ipay/wallet','IpayController@index')->name('ipay');
Route::get('ipay/callbackurl','IpayController@callbackurl');  // call back url
Route::get('ipay/checkout','IpayController@create');


//payu
Route::get('instamojo/checkout','InstamojoController@create');
Route::post('instamojo/checkout','InstamojoController@index')->name('instamojo');
Route::get('instamojo/success','InstamojoController@success');

//payu ends here


