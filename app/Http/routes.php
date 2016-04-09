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
Route::group(['middleware' => 'start'], function(){

Route::get('/','UserController@index');
Route::post('/','UserController@store');

});

Route::group(['middleware' => 'login'], function(){

Route::get('items', 'ItemController@index');
Route::get('items/{type}', 'ItemController@show');
Route::get('card', 'CardController@index');
Route::get('card/cash_out', 'CardController@buy');
Route::get('basket/add/{id}', 'BasketController@add');
Route::get('basket/delete/{id}', 'BasketController@delete');
Route::get('logout', 'LogoutController@index');

});