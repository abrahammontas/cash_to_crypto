<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home.index');
});

Route::get('/atm-locations', ['as' => 'atm-locations', function(){
   return view('atms.index');
}]);

//Route::get('/how-to', ['as' => 'howto', function () {
//    return view('help.index');
//}]);
//
//Route::get('/contact-us', ['as' => 'contacts', function () {
//    return view('contact.index');
//}]);
//
//Route::get('/blog', ['as' => 'blog', function () {
//    return view('blog.index');
//}]);
//
//Route::get('/faq', ['as' => 'faq', function () {
//    return view('faq.index');
//}]);

Route::auth();

Route::group(['middleware' => ['auth', 'banned']], function () {
	//Route::group(['middleware' => 'photo'], function () {
		Route::get('buy-bitcoins', ['as' => 'buy', 'uses' => 'OrderController@index']);
		Route::post('buy-bitcoins', ['as' => 'buy', 'uses' => 'OrderController@order']);
	//});
	Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'UserController@index']);
    Route::get('current-order', ['as' => 'current-order', 'uses' => 'UserController@currentOrder']);
	Route::get('locations', ['as' => 'locations', 'uses' => 'UserController@locations']);
	Route::get('profile', ['as' => 'profile', 'uses' => 'UserController@profile']);
	Route::post('receipt', ['as' => 'receipt', 'uses' => 'OrderController@uploadReceipt']);
	Route::post('profile', ['as' => 'profile', 'uses' => 'UserController@profileUpdate']);
	Route::delete('wallet', ['as' => 'wallet.delete', 'uses' => 'UserController@walletDelete']);
	Route::post('wallet', ['as' => 'wallet.create', 'uses' => 'UserController@walletCreate']);
	Route::post('selfie', ['as' => 'selfie', 'uses' => 'OrderController@uploadSelfie']);
	Route::post('both', ['as' => 'both', 'uses' => 'OrderController@uploadImages']);
	Route::post('order/cancel/{hash}', ['as' => 'order.cancel', 'uses' => 'OrderController@cancel']);
});

Route::group(['middleware' => ['auth', 'admin'], 'as' => 'admin.', 'prefix' => 'admin'], function () {
	Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'AdminController@index']);
	Route::get('banks', ['as' => 'banks', 'uses' => 'AdminController@banks']);
	Route::get('orders/{type}', ['as' => 'orders', 'uses' => 'AdminController@orders'])->where('type', 'all|completed|pending|issue');
	Route::delete('bank/{id}', ['as' => 'bank.delete', 'uses' => 'AdminController@bankDelete']);
	Route::put('bank/{id}', ['as' => 'bank.update', 'uses' => 'AdminController@bankUpdate']);
	Route::post('bank', ['as' => 'bank.create', 'uses' => 'AdminController@bankCreate']);
	Route::post('orders/status', ['as' => 'orders.status', 'uses' => 'AdminController@ordersStatus']);
	Route::get('users', ['as' => 'users', 'uses' => 'AdminController@users']);
	Route::post('ban/{id}', ['as' => 'users.ban', 'uses' => 'AdminController@ban']);
	Route::post('unban/{id}', ['as' => 'users.unban', 'uses' => 'AdminController@unban']);
	Route::delete('order/{id}', ['as' => 'order.delete', 'uses' => 'AdminController@orderDelete']);
	Route::put('order/{id}', ['as' => 'order.update', 'uses' => 'AdminController@orderUpdate']);
	Route::get('settings', ['as' => 'settings', 'uses' => 'AdminController@settings']);
	Route::post('settings', ['as' => 'settings', 'uses' => 'AdminController@settings']);
	Route::put('limits/{id}', ['as' => 'users.limits', 'uses' => 'AdminController@limits']);
	Route::get('profile/{id}', ['as' => 'users.profile', 'uses' => 'AdminController@profile']);
	Route::get('orders', ['as' => 'orders.ajax', 'uses' => 'AdminController@getOrders']);
	Route::put('profile/{id}', ['as' => 'user.update', 'uses' => 'AdminController@userUpdate']);
});

Route::get('/survey', ['as' => 'survey', function() {
	return view('survey.index');
}]);

Route::post('survey', ['as' => 'survey.save', 'uses' => 'SurveyController@save']);

Route::get('activation/{token}', ['as' => 'activation', 'uses' => 'Auth\AuthController@userActivation']);
Route::get('/contact', ['as' => 'contact', function() {
    return view('contact.index');
}]);
Route::post('contact', ['as' => 'contact', 'uses' => 'UserController@contact']);

