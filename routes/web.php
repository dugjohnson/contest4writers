<?php

use Illuminate\Support\Facades\Route;

use Dugjohnson\Administration\AdminController;
use App\Http\Controllers\PayPalController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
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
    Route::get('/dashboard', 'WelcomeController@index')->middleware(['auth'])->name('dashboard');
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
    Route::get('entries/final/{id}/upload', 'FinalController@getUpload');
    Route::post('entries/final/{id}/upload', 'FinalController@postUpload');

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

    Route::get('scoresheets/final/{lookup_code}/edit', 'FinalController@index');
    Route::get('scoresheets/finalist/{lookup_code}/edit', 'FinalController@index');
    Route::put('scoresheets/final/{lookup_code}/edit', 'FinalController@update');
    Route::get('scoresheets/final/{lookup_code}/show', 'FinalController@show');

//    Route::get('scoresheets/final/makesheets', 'FinalController@makesheets');
//    Route::get('scoresheets/final/sendemails', 'FinalController@sendemails');

    Route::get('closeout', 'CloseoutController@index');
    Route::get('closeout/email/{type}', 'CloseoutController@email');
    Route::get('closeout/email/{type}/go', 'CloseoutController@emailGo');

    Route::get('users/{id}/delete', 'UserController@destroy');

    Route::get('process-transaction', [PayPalController::class, 'processTransaction'])->name('processTransaction');
    Route::get('success-transaction', [PayPalController::class, 'successTransaction'])->name('successTransaction');
    Route::get('cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');

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

    Route::resource('judges', JudgeController::class);
    Route::resource('entries', EntryController::class);
    Route::resource('users', UserController::class);
    Route::resource('reports', ReportsController::class);
    Route::resource('scoresheets', ScoresheetController::class);
    Auth::routes();
    Route::get('logout', 'Auth\LoginController@logout');
});

require __DIR__.'/auth.php';
