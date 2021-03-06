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
        Route::post('setInfo','SettingController@setInformation');
        Route::post('setHousehold','SettingController@setHousehold');
    });


    Route::get('/', function () {
        return view('user/login');
    });

    Route::group(['prefix' => 'user','namespace' => 'User'],function (){
        Route::get('homepage','HomepageController@index');
        Route::get('appointment','AppointmentController@index');
        Route::post('select','AppointmentController@select');
        Route::post('submit','AppointmentController@submit');
        Route::get('query/{set?}','QueryController@index');
        Route::get('personal','PersonalController@index');
        Route::get('setting','SettingController@index');
        Route::get('logout','LogoutController@index');
    });

    Route::group(['prefix' => 'worker','namespace' => 'Worker'],function (){
        Route::get('homepage','HomepageController@index');
        Route::get('appointment','AppointmentController@index');
        Route::post('select','AppointmentController@select');
        Route::post('submit','AppointmentController@submit');
        Route::get('query','QueryController@index');
        Route::get('personal','PersonalController@index');
        Route::get('setting','SettingController@index');
        Route::get('logout','LogoutController@index');
        Route::post('setHousehold','SettingController@setHousehold');
    });
});

Route::group(['prefix' => 'user','namespace' => 'User'],function (){
    Route::post('check_login','UserController@checkLogin');
    Route::post('check_register','UserController@checkRegister');
    Route::get('register','UserController@register');
    Route::get('logout','UserController@logout');
});


Route::get('captcha/{tmp}','CodeController@captcha');
