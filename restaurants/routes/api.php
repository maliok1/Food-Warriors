<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/users', 'Api\UserApiController@index');

Route::post('/users/{user}', 'Api\UserApiController@update');

Route::get('/users/{user}', 'Api\UserApiController@show');

Route::post('users/delete/{user}', 'Api\UserApiController@delete');