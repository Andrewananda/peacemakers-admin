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
Route::get('sermons',['uses'=>'ApiController@sermons']);
Route::get('fellowships',['uses'=>'ApiController@fellowships']);
Route::get('news',['uses'=>'ApiController@news']);
Route::post('prayer_request',['uses'=>'ApiController@prayer_request']);
Route::post('contact',['uses'=>'ApiController@contact_us']);
