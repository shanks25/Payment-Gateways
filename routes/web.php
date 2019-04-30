<?php

//for paytm
Route::post('/create','Smscontroller@index')->name('sms');
Route::get('/','Smscontroller@create');
Route::post('wallet','WalletController@index')->name('wallet');
Route::get('return','WalletController@return'); 
Route::resource('checkout','paytmOrderController');
Route::post('/paytm-callback', 'paytmOrderController@paytmCallback');  // Submit order to paytm
Route::post('wallet2','WalletController2@index');
//paytm ends here

//payu
Route::get('payu/checkout','PayuController@index');




//payu ends here


