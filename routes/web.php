<?php

use Illuminate\Http\Request;
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

Route::get('/', 'OrderController@welcome')->name('welcome');
Route::post('/', 'OrderController@welcome')->name('welcome-post');

Route::group(['prefix' => '/order'], function () {
   
    Route::get('/personal-info', 'OrderController@personalInfo')->middleware(['checksession', 'checkstatuspaymet'])->name('personal-info');
    Route::post('/personal-info', 'OrderController@personalInfo')->middleware(['checksession', 'checkstatuspaymet'])->name('personal-info-post');

    Route::get('/home', 'OrderController@home')->middleware(['checksession', 'checkorderid', 'checkstatuspaymet'])->name('your-home');
    Route::post('/home', 'OrderController@home')->middleware(['checksession', 'checkorderid', 'checkstatuspaymet'])->name('your-home-post');

    Route::get('/materials', 'OrderController@materials')->middleware(['checksession', 'checkorderid', 'checkstatuspaymet'])->name('materials');
    Route::post('/materials', 'OrderController@materials')->middleware(['checksession', 'checkorderid', 'checkstatuspaymet'])->name('materials-post');

    Route::get('/extras', 'OrderController@extras')->middleware(['checksession', 'checkorderid', 'checkstatuspaymet'])->name('extras');
    Route::post('/calc-extras', 'OrderController@calculationExtras')->middleware(['checksession', 'checkorderid', 'checkstatuspaymet']);
    Route::post('/extras', 'OrderController@extras')->middleware(['checksession', 'checkorderid', 'checkstatuspaymet'])->name('extras-post');

    Route::get('/payment', 'PaymentController@show')->middleware(['checksession', 'checkorderid'])->name('payment');
    Route::post('/payment', 'PaymentController@charge')->middleware(['checksession', 'checkorderid', 'checkstripetoken'])->name('payment-post');

});
