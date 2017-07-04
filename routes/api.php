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

Route::group(['middleware'=>['auth:api','cors']],function(){

	Route::resource('movie','MovieController');
	Route::resource('actor','ActorController');
	Route::resource('genre','GenreController');
	Route::resource('file','FileController');
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

