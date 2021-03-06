<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

/**
 * Show Landing page
 */
//url: http://localhost:{port}
Route::get('/', 'HomeController@index');

//url: http://localhost:{port}/tasks
Route::get('tasks','TaskController@getIndex');
Route::controller('tasks', 'TaskController');


//route to NerdController a resource controller
Route::resource('nerds', 'NerdController');

//scafolded templates using laralib
Route::resource('tweets','TweetController');
Route::resource('products','ProductController');
Route::resource('categories','CategoryController');

Route::get('nerds/{id}/image', 'NerdController@getImage');

//authentication routes
Route::auth();
Route::get('/home', 'HomeController@index');
