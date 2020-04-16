<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('phone')->group(function () {
    Route::get('/list', 'PhoneController@index');
    Route::get('/get', 'PhoneController@get');
    Route::get('/create', 'PhoneController@create');
    Route::get('/update', 'PhoneController@update');
    Route::get('/delete', 'PhoneController@delete');
});