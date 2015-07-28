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

/*
 * Predict page routes -----------------------------------------------------
 *
 */

    Route::get('/','HomeController@index');
    Route::get('predict','HomeController@index');
    
    Route::post('predictions','PredictionController@store');
/* -----------------------------------------------------------------------*/

/*
 * Miscellaneous pages routes -----------------------------------------------------
 *
 */

    Route::get('badges','BadgeController@index');
    Route::get('standings','UserController@index');
    Route::get('faq','PagesController@faq');
    Route::get('rules','PagesController@rules');
    Route::get('settings','UserController@getSetting');

/* -----------------------------------------------------------------------*/

/*
 * Profile page routes -----------------------------------------------------
 *
 */

    Route::get('users/{username}','UserController@show');
    Route::get('users/{username}/gameweek/{gwid}','UserController@show');
    Route::get('users/{username}/badges','User\BadgeController@index');

/* -----------------------------------------------------------------------*/



    //Authentication routes
        Route::get('login', 'Auth\AuthController@getLogin');
        Route::post('login', 'Auth\AuthController@postLogin');
        Route::get('login/{provider?}','Auth\AuthController@login');

        Route::get('logout', 'Auth\AuthController@getLogout');

    // For Users with incomplete registration
        Route::get('complete','UserController@getComplete');
        Route::post('complete','UserController@postComplete');





