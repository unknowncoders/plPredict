<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','HomeController@index');
Route::get('predict','HomeController@index');


    //Authentication routes
        Route::get('login', 'Auth\AuthController@getLogin');
        Route::post('login', 'Auth\AuthController@postLogin');
        Route::get('login/{provider?}','Auth\AuthController@login');

    // For Users with incomplete registration
        Route::get('complete','UserController@getComplete');
        Route::post('complete','UserController@postComplete');

Route::get('logout', 'Auth\AuthController@getLogout');




