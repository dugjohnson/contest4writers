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


$router->group(['namespace' => 'Dugjohnson\Administration'], function () use ($router) {
    $router->get('coordinators', 'AdminController@index');
    $router->get('administrators', 'AdminController@index');
    $router->get('administrators/download/{CSVType?}', 'AdminController@returnCSV');
    $router->get('coordinators/entries', 'AdminController@entries');
    $router->get('coordinators/judges', 'AdminController@judgesList');
    $router->get('coordinators/scoresheets/{action?}', 'AdminController@scoresheetsList');
    $router->get('api/v1/scoresheets', 'AdminController@jsonDownload');
    $router->post('api/v1/scoresheets', 'AdminController@jsonUpload');
    $router->get('coordinators/reports/scoresummary', 'AdminController@scoresheetSummary');
});


$router->group(['namespace' => 'Contest\Http\Controllers'], function () use ($router) {

    $router->get('/', 'WelcomeController@index');
    $router->get('home', 'WelcomeController@index');
    $router->get('coordinators/judges/{id}', 'JudgeController@coordinatorShow');
    $router->get('coordinators/judges/{id}/edit', 'JudgeController@coordinatorEdit');

    $router->get('coordinators/entries/{id}', 'EntryController@coordinatorShow');
    $router->get('coordinators/entries/{id}/edit', 'EntryController@coordinatorEdit');
    $router->get('coordinators/entries/{id}/upload', 'EntryController@coordinatorUpload');
    $router->get('coordinators/users/{id}', 'UserController@coordinatorShow');

    $router->get('entries/create/pub', 'EntryController@createPub');
    $router->get('entries/create/unpub', 'EntryController@createUnpub');
    $router->post('entries/create/pub', 'EntryController@storePub');
    $router->post('entries/create/unpub', 'EntryController@storeUnpub');
    $router->get('entries/{id}/upload', 'EntryController@getUpload');
    $router->post('entries/{id}/upload', 'EntryController@postUpload');

    $router->get('scoresheets/batch', 'ScoresheetController@getBatch');
    $router->post('scoresheets/batch', 'ScoresheetController@postBatch');
    $router->get('scoresheets/extra', 'ScoresheetController@getExtra');
    $router->post('scoresheets/extra', 'ScoresheetController@postExtra');
    $router->get('scoresheets/{id}/upload', 'ScoresheetController@getUpload');
    $router->get('scoresheets/{id}/reopen', 'ScoresheetController@reopen');
    $router->post('scoresheets/{id}/upload', 'ScoresheetController@postUpload');
    $router->put('scoresheets/{id}/upload', 'ScoresheetController@postUpload');
    $router->get('scoresheets/{judgeID}/assigned', 'ScoresheetController@assignedTo');
    $router->get('scoresheets/judge/{judgeID}/comparison', 'ScoresheetController@comparison');

    $router->get('closeout', 'CloseoutController@index');
    $router->get('closeout/email/{type}', 'CloseoutController@email');
    $router->get('closeout/email/{type}/go', 'CloseoutController@emailGo');

    $router->get('users/{id}/delete', 'UserController@destroy');

    $router->get('/paypal/payment/{entry}/precheck', [
        'as' => 'paypal.payment.precheck',
        'uses' => 'PayPalController@precheck'
    ]);
    $router->get('/paypal/payment/{entry}/completed', [
        'as' => 'paypal.payment.completed',
        'uses' => 'PayPalController@completed'
    ]);
    $router->get('/paypal/payment/{entry}/cancelled', [
        'as' => 'paypal.payment.cancelled',
        'uses' => 'PayPalController@cancelled',
    ]);
    $router->get('/paypal/payment/{entry}/{kodmember?}', [
        'as' => 'paypal.payment.kodcheck',
        'uses' => 'PayPalController@kodcheck'
    ]);
//    $router->post('/paypal/payment/{entry}', [
//        'as' => 'paypal.payment',
//        'uses' => 'PayPalController@checkout',
//    ]);

    $router->resource('judges', 'JudgeController');
    $router->resource('entries', 'EntryController');
    $router->resource('users', 'UserController');
    $router->resource('reports', 'ReportsController');
    $router->resource('scoresheets', 'ScoresheetController');
    Auth::routes();
    $router->get('logout', 'Auth\LoginController@logout');
});

