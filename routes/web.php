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

Route::get('/', 'HomeController@index')->name('home');
Auth::routes();
Route::middleware(['auth'])->group(function (){
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/logout',[
        'as'=>'logout','uses'=>'Auth\LoginController@logout'
    ]);

    Route::get('/add-sermon',[
        'uses'=>'SermonController@index', 'as'=>'sermon'
    ]);

    Route::post('/post-sermon',[
        'uses'=>'SermonController@createSermon','as'=>'post.sermon'
    ]);

    Route::get('/all-sermons',[
        'uses'=>'SermonController@allSermons','as'=>'all.sermons'
    ]);

    Route::get('/sermon/{id}',[
        'uses'=>'SermonController@editSermon','as'=>'single.sermon'
    ]);

    Route::get('/fellowship',[
        'uses'=>'FellowshipController@index','as'=>'add.fellowship'
    ]);

    Route::get('/add-fellowship',[
        'uses'=>'FellowshipController@addFellowship','as'=>'post.fellowship'
    ]);
    Route::get('/all-fellowships',[
        'uses'=>'FellowshipController@getFellowships','as'=>'all.fellowships'
    ]);

    Route::get('/day',[
        'uses'=>'SermonController@getDay','as'=>'add.day'
    ]);

    Route::post('/add-day',[
        'uses'=>'SermonController@postDay','as'=>'post.day'
    ]);
    Route::get('/all-prayer-requests',[
        'uses'=>'PrayerRequestController@index','as'=>'prayer.requests'
    ]);

});

