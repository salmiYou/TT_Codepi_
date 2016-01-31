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

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('/', 'ConcertController@index'); // index
Route::post('/{page}', 'ConcertController@getPage'); //pagination
Route::post('/', 'ConcertController@filter'); // filtering
Route::get('/concert/{concert}', 'ConcertController@concert'); // concert page

Route::get('admin', 'Admin@index'); // index
Route::Post('admin/delete/{concert}', 'Admin@destroy');
Route::get('admin/edit/{concert}', 'Admin@edit');


// http://dev-node/laravel/codepi_tt/resources/assets/images/logo_codepi.png
//http://dev-node/laravel/codepi_tt/public/resources/assets/images/logo_codepi.png
