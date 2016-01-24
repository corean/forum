<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


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
    Route::get('/', [
        'as' => 'root',
        'uses' => 'WelcomeController@index'
    ]);

    Route::get('home', [
        'as' => 'home',
        'uses' => 'WelcomeController@index'
    ]);

    /* User Registration */
    Route::group(['prefix' => 'auth', 'as' => 'user.'], function () {
        Route::get('register', [
            'as'   => 'create',
            'uses' => 'Auth\AuthController@getRegister'
        ]);
        Route::post('register', [
            'as'   => 'store',
            'uses' => 'Auth\AuthController@postRegister'
        ]);
    });

    /* Session */
    Route::group(['prefix' => 'auth', 'as' => 'session.'], function () {
        Route::get('login', [
            'as'   => 'create',
            'uses' => 'Auth\AuthController@getLogin'
        ]);
        Route::post('login', [
            'as'   => 'store',
            'uses' => 'Auth\AuthController@postLogin'
        ]);
        Route::get('logout', [
            'as'   => 'destroy',
            'uses' => 'Auth\AuthController@getLogout'
        ]);
    });

    /* Password Reminder */
    Route::group(['prefix' => 'password'], function () {
        Route::get('remind', [
            'as'   => 'reminder.create',
            'uses' => 'Auth\PasswordController@getEmail'
        ]);
        Route::post('remind', [
            'as'   => 'reminder.store',
            'uses' => 'Auth\PasswordController@postEmail'
        ]);
        Route::get('reset/{token}', [
            'as'   => 'reset.create',
            'uses' => 'Auth\PasswordController@getReset'
        ]);
        Route::post('reset', [
            'as'   => 'reset.store',
            'uses' => 'Auth\PasswordController@postReset'
        ]);
    });
});
