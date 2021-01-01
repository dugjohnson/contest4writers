<?php

use Dugjohnson\Administration\AdminController;
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


Route::group(['namespace' => 'Dugjohnson\Administration'], function () {
    Route::get('coordinators', 'AdminController@index');
    Route::get('administrators', 'AdminController@index');
    Route::get('administrators/download/{CSVType?}', 'AdminController@returnCSV');
    Route::get('coordinators/entries', 'AdminController@entries');
    Route::get('coordinators/judges', 'AdminController@judgesList');
    Route::get('coordinators/scoresheets/{action?}', 'AdminController@scoresheetsList');
    Route::get('api/v1/scoresheets', 'AdminController@jsonDownload');
    Route::post('api/v1/scoresheets', 'AdminController@jsonUpload');
    Route::get('coordinators/reports/scoresummary', 'AdminController@scoresheetSummary');
});


Route::group(['namespace' => 'App\Http\Controllers'], function () {

    Route::get('/', 'WelcomeController@index');
    Route::get('home', 'WelcomeController@index');
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
    Route::get('scoresheets/{id}/reopen', 'ScoresheetController@reopen');
    Route::post('scoresheets/{id}/upload', 'ScoresheetController@postUpload');
    Route::put('scoresheets/{id}/upload', 'ScoresheetController@postUpload');
    Route::get('scoresheets/{judgeID}/assigned', 'ScoresheetController@assignedTo');
    Route::get('scoresheets/judge/{judgeID}/comparison', 'ScoresheetController@comparison');

    Route::get('closeout', 'CloseoutController@index');
    Route::get('closeout/email/{type}', 'CloseoutController@email');
    Route::get('closeout/email/{type}/go', 'CloseoutController@emailGo');

    Route::get('users/{id}/delete', 'UserController@destroy');

    Route::get('/paypal/payment/{entry}/precheck', [
        'as' => 'paypal.payment.precheck',
        'uses' => 'PayPalController@precheck'
    ]);
    Route::get('/paypal/payment/{entry}/completed', [
        'as' => 'paypal.payment.completed',
        'uses' => 'PayPalController@completed'
    ]);
    Route::get('/paypal/payment/{entry}/cancelled', [
        'as' => 'paypal.payment.cancelled',
        'uses' => 'PayPalController@cancelled',
    ]);
    Route::get('/paypal/payment/{entry}/{kodmember?}', [
        'as' => 'paypal.payment.kodcheck',
        'uses' => 'PayPalController@kodcheck'
    ]);
//    Route::post('/paypal/payment/{entry}', [
//        'as' => 'paypal.payment',
//        'uses' => 'PayPalController@checkout',
//    ]);

    Route::resource('judges', 'JudgeController');
    Route::resource('entries', 'EntryController');
    Route::resource('users', 'UserController');
    Route::resource('reports', 'ReportsController');
    Route::resource('scoresheets', 'ScoresheetController');
    Auth::routes();
    Route::get('logout', 'Auth\LoginController@logout');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');