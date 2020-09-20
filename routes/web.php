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

    //Sermons

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

    //Fellowships
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

    //Prayer Request

    Route::get('/all-prayer-requests',[
        'uses'=>'PrayerRequestController@index','as'=>'prayer.requests'
    ]);

    Route::get('/reviewed-requests',[
        'uses'=>'PrayerRequestController@getReviewedRequests','as'=>'reviewed.requests'
    ]);

    //News
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

    //Donations
    Route::get('donation-type',[
        'uses'=>'DonationController@donationType','as'=>'donation.type'
    ]);

    Route::get('/donation-types',[
        'uses'=>'DonationController@allDonationTypes', 'as'=>'donation.types'
    ]);

    Route::get('/donation_type/{id}',[
        'uses'=>'DonationController@singleDonationType', 'as'=>'single.donation_type'
    ]);

    Route::post('/update-donation-type/{id}',[
        'uses'=>'DonationController@updateDonationType', 'as'=>'update.donation-type'
    ]);

    Route::post('/add-donation-type',[
        'uses'=>'DonationController@addDonationType','as'=>'post.donation-type'
    ]);

    Route::get('/add-donation',[
        'uses'=>'DonationController@index', 'as'=>'add.donation'
    ]);

    Route::post('/post-donation',[
        'as'=>'post.donation','uses'=>'DonationController@postDonation'
    ]);

    Route::get('/donations',[
       'as'=>'donations','uses'=>'DonationController@allDonations'
    ]);

    Route::get('/donation/{id}',[
        'as'=>'single.donation','uses'=>'DonationController@singleDonation'
    ]);

    Route::post('/update-donation/{id}',[
        'as'=>'update.donation', 'uses'=>'DonationController@updateDonation'
    ]);

    //bulletin

    Route::get('/bulletin',[
        'as'=>'add.bulletin', 'uses'=>'BulletinController@index'
    ]);

    Route::post('/post-bulletin',[
        'as'=>'post.bulletin', 'uses'=>'BulletinController@addBulletin'
    ]);

    Route::get('/bulletins',[
        'as'=>'all.bulletins', 'uses'=>'BulletinController@allBulletins'
    ]);

    Route::get('/single-bulletin/{id}',[
        'as'=>'single.bulletin', 'uses'=>'BulletinController@singleBulletin'
    ]);

    Route::post('/bulletin-update/{id}',[
        'as'=>'update.singleBulletin', 'uses'=>'BulletinController@updateBulletin'
    ]);


});

