<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'WelcomeController@index');
Route::get('home', 'WelcomeController@index');
Route::get('coordinators', 'AdminController@index');
Route::get('administrators', 'AdminController@index');
Route::get('administrators/download/{CSVType?}', 'AdminController@returnCSV');
//todo: Need to make the below read the action and translate to method
Route::get('coordinators/entries', 'AdminController@entries');
Route::get('coordinators/judges', 'AdminController@judgesList');
Route::get('coordinators/scoresheets/{action?}', 'AdminController@scoresheetsList');
Route::get('api/v1/scoresheets','AdminController@jsonDownload');
Route::post('api/v1/scoresheets','AdminController@jsonUpload');
Route::get('coordinators/reports/scoresummary', 'AdminController@scoresheetSummary');

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
Route::get('scoresheets/extra', 'ScoresheetController@getExtra');
Route::post('scoresheets/extra', 'ScoresheetController@postExtra');
Route::get('scoresheets/{id}/upload', 'ScoresheetController@getUpload');
Route::post('scoresheets/{id}/upload', 'ScoresheetController@postUpload');
Route::put('scoresheets/{id}/upload', 'ScoresheetController@postUpload');
Route::get('scoresheets/{judgeID}/assigned', 'ScoresheetController@assignedTo');
Route::get('scoresheets/judge/{judgeID}/comparison', 'ScoresheetController@comparison');

Route::get('closeout', 'CloseoutController@index');
Route::get('closeout/email/{type}', 'CloseoutController@email');
Route::get('closeout/email/{type}/go', 'CloseoutController@emailGo');

Route::get('users/{id}/delete', 'UserController@destroy');

Route::resource('judges', 'JudgeController');
Route::resource('entries', 'EntryController');
Route::resource('users', 'UserController');
Route::resource('reports', 'ReportsController');
Route::resource('scoresheets', 'ScoresheetController');
Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');

