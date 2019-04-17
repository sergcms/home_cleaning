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
   
    Route::get('/personal-info', 'OrderController@personalInfo')->name('personal-info');
    Route::post('/personal-info', 'OrderController@personalInfo')->name('personal-info-post');

    Route::get('/home', 'OrderController@home')->name('your-home');
    Route::post('/home', 'OrderController@home')->name('your-home-post');

    Route::get('/materials', 'OrderController@materials')->name('materials');
    Route::post('/materials', 'OrderController@materials')->name('materials-post');

    Route::get('/extra', 'OrderController@extra')->name('extra');
    Route::post('/extra', 'OrderController@extra')->name('extra-post');

    Route::get('/payment', 'PaymentsController@show')->name('payment');
    Route::post('/payment', 'PaymentsController@save')->name('payment-post');

});

// Auth::routes();
