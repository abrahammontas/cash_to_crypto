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

Route::get('/buy-bitcoins', function () {
    return view('buy.index', ["ourbitcoinprice" => 1000]);
});

Route::get('/how-to', function () {
    return view('help.index');
});

Route::get('/contact-us', function () {
    return view('contact.index');
});

Route::get('/blog', function () {
    return view('blog.index');
});

Route::get('/faq', function () {
    return view('faq.index');
});
Route::auth();
