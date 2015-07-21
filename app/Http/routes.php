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

Route::get('badges','BadgeController@index');
Route::get('standing','UserController@index');
Route::get('faq','PagesController@faq');
Route::get('rules','PagesController@rules');
Route::get('settings','UserController@getSetting');

Route::get('users/{username}','UserController@show');


    //Authentication routes
        Route::get('login', 'Auth\AuthController@getLogin');
        Route::post('login', 'Auth\AuthController@postLogin');
        Route::get('login/{provider?}','Auth\AuthController@login');

        Route::get('logout', 'Auth\AuthController@getLogout');

    // For Users with incomplete registration
        Route::get('complete','UserController@getComplete');
        Route::post('complete','UserController@postComplete');





