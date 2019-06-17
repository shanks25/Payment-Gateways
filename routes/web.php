<?php
Route::get('wallet','WalletController@index');
Route::post('/create','Smscontroller@index')->name('sms');
Route::get('/freshsms','SmsfreshController@index')->name('freshsms');
Route::post('/sendsms','SmsfreshController@postform');
Route::get('/guzzleplay','SmsfreshController@guzzleplay');


Route::post('/textlocal','TextlocalController@index');
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
Route::get('report','DatewisereportController@index');
Route::get('report2','DatewisereportController@index');
Route::get('search','SearchController@index');
Route::get('searchresults','SearchController@search');

Route::get('user/{id}','SearchController@user');

Route::get('paywithrazorpay', 'RazarPayController@index')->name('paywithrazorpay');

Route::post('razorpay', 'RazarPayController@payment')->name('razorpay');
Route::post('razorpayverify', 'RazarPayController@razorpayverify')->name('razorpayverify');
 Route::group(['prefix' => 'admin'], function () {
	Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
	Route::post('/login', 'AdminAuth\LoginController@login');
	Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');

	Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
	Route::post('/register', 'AdminAuth\RegisterController@register');
	Route::get('/test', 'AdminController@test');

	Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
	Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
	Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
	Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
}); 
Auth::routes(); 
Route::get('/home', 'HomeController@index')->name('home');
