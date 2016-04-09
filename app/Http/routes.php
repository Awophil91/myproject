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

Route::group(['middleware' => ['web']], function () {

    /**
     * Show Task Dashboard
     */
    //url: http://localhost:{port}
    Route::get('/','TaskController@getIndex');
    //url: http://localhost:{port}/task
    Route::get('task','TaskController@getIndex');

    Route::controller('task', 'TaskController');
});
