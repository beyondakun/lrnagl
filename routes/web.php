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

Route::get('/', function () {
    return view('welcome');
});


Route::get('api/signup', 'UserController@signup');
Route::get('api/login', 'UserController@login');
Route::get('api/logout', 'UserController@logout');

//测试用路由
Route::get('api/islogged',function (\Illuminate\Http\Request $request) {
    if (session('user_name') == $request->get('user_name'))
        return 'logged';
    else
        return 'not logged';
});