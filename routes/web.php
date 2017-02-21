<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Welcome page
Route::resource('/', 'HomeController@index');

// User
Auth::routes();
Route::get('user/activation/{token}', 'Auth\LoginController@activateUser')->name('user.activate');

// Home page
Route::resource('/el-nour', 'PostController');

// Sort pages
Route::get('/category/{article}', 'SortController@article');
Route::get('/publisher/{user}', 'SortController@user');
Route::get('/viewers', 'SortController@viewers');
Route::get('/likes', 'SortController@likes');
Route::get('/popular', 'SortController@popular');



// Only users can do this POST
Route::group(['middleware' => 'auth'], function () 
{
	// LIke/Dislike POST
	Route::post('/like/{post}', 'LikeController@storeLike');
	Route::post('/dislike/{post}', 'LikeController@storeDisLike');
});








