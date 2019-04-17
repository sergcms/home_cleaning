<?php

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
   
    Route::get('/personal-info', 'OrderController@personalInfo')->middleware('hadtotalsum')->name('personal-info');
    Route::post('/personal-info', 'OrderController@personalInfo')->middleware('hadtotalsum')->name('personal-info-post');

    Route::get('/home', 'OrderController@home')->middleware('hadtotalsum')->name('your-home');
    Route::post('/home', 'OrderController@home')->middleware('hadtotalsum')->name('your-home-post');

    Route::get('/materials', 'OrderController@materials')->middleware('hadtotalsum')->name('materials');
    Route::post('/materials', 'OrderController@materials')->middleware('hadtotalsum')->name('materials-post');

    Route::get('/extras', 'OrderController@extras')->name('extras');
    Route::post('/extras', 'OrderController@extras')->name('extras-post');

    Route::get('/payment', 'PaymentsController@show')->name('payment');
    Route::post('/payment', 'PaymentsController@save')->name('payment-post');

    Route::post('/fail', 'PaymentsController@fail')->name('payment-fail');

});

// Auth::routes();
