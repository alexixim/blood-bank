<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::controller('auth', 'AuthController');

Route::get('/', function(){
	return Redirect::to('donor');
});

Route::group(['before' => 'auth'], function(){
	Route::controller('donor', 'DonorController');
	Route::resource('donor', 'DonorController');

	Route::resource('donation', 'DonationController');
	Route::resource('product', 'ProductController');
	Route::resource('location', 'LocationController');

	Route::controller('notification', 'NotificationController');
	Route::resource('notification', 'NotificationController');
});

/**
 * Subscribe custom event classes
 */

$donationsEventHandler = new DonationsEventHandler;

Event::subscribe($donationsEventHandler);























