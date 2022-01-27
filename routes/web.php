<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [
    'as' => 'home',
    'uses' => 'App\Http\Controllers\HomeController@index'
]);

Route::get('/webhook', [
    'as' => 'webhook',
    'uses' => 'App\Http\Controllers\WebhookController@index'
]);

// local test
//Route::get('/telegram/getProducts', [
//    'as' => 'telegram.getProducts',
//    'uses' => 'App\Http\Controllers\TelegramController@getProducts'
//]);

Route::get('/login', [
    'as' => 'login',
    'uses' => 'App\Http\Controllers\Auth\LoginController@showLoginForm'
]);

Route::post('/login', [
    'as' => 'login',
    'uses' => 'App\Http\Controllers\Auth\LoginController@login'
]);

Route::post('/logout', [
    'as' => 'logout',
    'uses' => 'App\Http\Controllers\Auth\LoginController@logout'
]);


//\Illuminate\Support\Facades\Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('/admin', [
        'as' => 'admin',
        'uses' => 'App\Http\Controllers\AdminController@index'
    ]);

    Route::post('/admin', [
        'as' => 'admin.update',
        'uses' => 'App\Http\Controllers\AdminController@update'
    ]);

    Route::get('/import', [
        'as' => 'import',
        'uses' => 'App\Http\Controllers\ImportController@index'
    ]);

    Route::post('/import', [
        'as' => 'file.import',
        'uses' => 'App\Http\Controllers\ImportController@fileImport'
    ]);

});
