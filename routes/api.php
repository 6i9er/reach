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
Route::prefix('v1/')->group(function () {
    Route::get('users/{page?}', 'UserController@index');
    Route::get('get-user/{id?}', 'UserController@getUser');
    Route::get('cron', 'UserController@cron');
});

//Route::get('/test', 'UserController@index');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
