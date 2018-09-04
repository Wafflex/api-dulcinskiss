<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Products routes 
Route::get('/products','productsController@index');
Route::get('/products/{id}','productsController@show');
Route::post('/products','productsController@store');


//Materials routes
Route::get('/materials','materialsController@index');

//Auth routes
Route::post('/login','usersController@login');
Route::post('/register','usersController@register');
