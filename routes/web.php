<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'login'],function (){
    Route::group(['prefix' => 'user','namespace' => 'User'],function (){
        Route::get('login','UserController@login');
        Route::get('user/logout','UserController@logout');
    });

    Route::get('homepage','HomepageController@index')->name('homepage.show');
});

Route::group(['prefix' => 'user','namespace' => 'User'],function (){
    Route::post('check_login','UserController@checkLogin');
    Route::post('check_register','UserController@checkRegister');
    Route::get('user/register','UserController@register');
});

Route::get('/', function () {
    return view('user/login');
});


Route::get('captcha/{tmp}','CodeController@captcha');
