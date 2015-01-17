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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'WelcomeController@index');

Route::get('entries/create/pub','EntryController@createPub');
Route::get('entries/create/unpub','EntryController@createUnpub');
Route::post('entries/create/pub','EntryController@storePub');
Route::post('entries/create/unpub','EntryController@storeUnpub');

Route::resource('judges','JudgeController');
Route::resource('entries','EntryController');
Route::resource('users','UserController');

/*
|--------------------------------------------------------------------------
| Authentication & Password Reset Controllers
|--------------------------------------------------------------------------
|
| These two controllers handle the authentication of the users of your
| application, as well as the functions necessary for resetting the
| passwords for your users. You may modify or remove these files.
|
*/


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
