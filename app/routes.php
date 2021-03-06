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

	Route::resource('location', 'LocationController');
	//Route::controller('location', 'LocationController');
	
	// Route::resource('donor', 'DonorController');
	Route::resource('donor', 'DonorController', array('except' => array('show')));
	Route::controller('donor', 'DonorController');

	Route::get('donation/mobile', array('as' => 'donation.getMobile', 'uses' => 'DonationController@getMobile'));
	Route::resource('donation', 'DonationController');
	Route::controller('donation', 'DonationController');
	
	//Route::get('user/profile', array('as' => 'profile', 'uses' => 'UserController@showProfile'));

	Route::resource('product', 'ProductController');

	Route::resource('user', 'UserController');

	Route::resource('adjustment', 'AdjustmentController');

	Route::controller('report', 'ReportController');
	Route::controller('download', 'DownloadController');
	Route::resource('ui', 'UiController');

	Route::controller('notification', 'NotificationController');
	Route::resource('notification', 'NotificationController');



});

/**
 * Subscribe custom event classes
 */

$donationsEventHandler = new DonationsEventHandler;
$adjustmentsEventHandler = new AdjustmentsEventHandler; 

Event::subscribe($donationsEventHandler);
Event::subscribe($adjustmentsEventHandler);
