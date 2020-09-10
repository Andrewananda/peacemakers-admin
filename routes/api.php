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
Route::get('sermons',['uses'=>'SermonController@getSermons']);
Route::get('fellowships',['uses'=>'FellowshipController@getFellowships']);
Route::get('news',['uses'=>'NewsController@getNews']);
Route::post('prayer_request',['uses'=>'PrayerRequestController@postPrayerRequest']);
