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
Route::get('coordinators', 'AdminController@index');
Route::get('administrators', 'AdminController@index');
Route::get('administrators/download', 'AdminController@returnCSV');
//todo: Need to make the below read the action and translate to method
Route::get('coordinators/entries', 'AdminController@entries');
Route::get('coordinators/judges', 'AdminController@judgesList');
Route::get('coordinators/scoresheets', 'AdminController@scoresheetsList');
Route::get('api/v1/scoresheets','AdminController@jsonDownload');
Route::post('api/v1/scoresheets','AdminController@jsonUpload');

Route::get('coordinators/judges/{id}', 'JudgeController@coordinatorShow');
Route::get('coordinators/judges/{id}/edit', 'JudgeController@coordinatorEdit');
Route::get('coordinators/entries/{id}', 'EntryController@coordinatorShow');
Route::get('coordinators/entries/{id}/edit', 'EntryController@coordinatorEdit');
Route::get('coordinators/entries/{id}/upload', 'EntryController@coordinatorUpload');
Route::get('coordinators/users/{id}', 'UserController@coordinatorShow');

Route::get('entries/create/pub', 'EntryController@createPub');
Route::get('entries/create/unpub', 'EntryController@createUnpub');
Route::post('entries/create/pub', 'EntryController@storePub');
Route::post('entries/create/unpub', 'EntryController@storeUnpub');
Route::get('entries/{id}/upload', 'EntryController@getUpload');
Route::post('entries/{id}/upload', 'EntryController@postUpload');

Route::get('scoresheets/batch', 'ScoresheetController@getBatch');
Route::post('scoresheets/batch', 'ScoresheetController@postBatch');
Route::get('scoresheets/{id}/upload', 'ScoresheetController@getUpload');
Route::post('scoresheets/{id}/upload', 'ScoresheetController@postUpload');
Route::put('scoresheets/{id}/upload', 'ScoresheetController@postUpload');

Route::get('users/{id}/delete', 'UserController@destroy');

Route::resource('judges', 'JudgeController');
Route::resource('entries', 'EntryController');
Route::resource('users', 'UserController');
Route::resource('reports', 'ReportsController');
Route::resource('scoresheets', 'ScoresheetController');

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
