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

Route::get('/', function () {
    return view('welcome');
});

Route::get('homepage','HomepageController@index')->name('homepage.show');

Route::get('captcha/{tmp}','CodeController@captcha');

Route::group(['prefix' => 'user','namespace' => 'User'],function (){
    Route::get('login','UserController@login');
    Route::get('register','UserController@register');
    Route::post('check_login','UserController@checkLogin');
    Route::post('check_register','UserController@checkRegister');
});