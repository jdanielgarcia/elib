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

Auth::routes();

if (Auth::check()) {
	# code...
	Route::get('/', 'HomeController@index');
}
else{
	Route::get('/', 'HomeController@index');	
}

Route::get('/home', 'HomeController@index');

Route::get('about', 'PageController@about');
Route::get('membership', 'PageController@membership');
Route::get('sitelinks', 'PageController@sitelinks');
Route::get('userprofile', 'PageController@userprofile');
Route::get('contact', 'PageController@contact');

Route::get('/logout', 'Auth\LoginController@logout');


Route::resource('sitenews', 'SitenewsController');

// Route::group(['middleware' => ['web']], function(){
// 	Route::resource('blog')
// })