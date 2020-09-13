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

    Route::get('/reviewed-requests',[
        'uses'=>'PrayerRequestController@getReviewedRequests','as'=>'reviewed.requests'
    ]);

    Route::get('/add-news',[
       'uses'=>'NewsController@index','as'=>'add.news'
    ]);

    Route::post('post-news',[
        'uses'=>'NewsController@addNews','as'=>'post.news'
    ]);

    Route::get('all-news',[
        'uses'=>'NewsController@allNews','as'=>'all.news'
    ]);

    Route::get('single-news/{id}',[
        'uses'=>'NewsController@singleNews','as'=>'single.news'
    ]);
    Route::post('update-news/{id}',[
        'uses'=>'NewsController@updateNews','as'=>'update.news'
    ]);


});

