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
Route::get('/',['as'=>'home','uses'=>'UserAuthController@getLogin']);

//User Registration Route List
Route::get('user-login', ['as'=>'userlogin', 'uses'=>'UserAuthController@getLogin']);
Route::post('user-login', ['as'=>'user_login', 'uses'=>'UserAuthController@postLogin']);

Route::get('user-logout', ['as'=>'user-logout', 'uses' => 'UserAuthController@logout']);

//Password Change
Route::get('password_change', ['as' => 'password_form', 'uses' => 'PasswordChangeController@getChangePassword']);
Route::post('password_change', ['as' => 'password_form', 'uses' => 'PasswordChangeController@postChangePassword']);

Route::get('latest_videos', ['as' => 'latest_videos', 'uses' => 'VideosController@getVideos']);

Route::get('my_videos', ['as' => 'my_videos', 'uses' => 'VideosController@getMyVideos']);
Route::get('my_purchases', ['as' => 'my_purchases', 'uses' => 'VideosController@my_purchases']);
/* Delete videos */
Route::post('my_videos/delete/{id}', ['as' => 'my_videos', 'uses' => 'VideosController@deleteMyVideos']);

/* user Forget Password */
Route::get('user-forget-password',['as'=>'user-forget-password','uses'=>'HomeController@getForgetPassword']);
Route::get('user-password-reset/{token}',['as'=>'user-password-reset','uses'=>'HomeController@resetForgetPassword']);
Route::post('user-forget-password-submit',['as'=>'user-forget-password-submit','uses'=>'HomeController@submitForgetPassword']);
Route::post('user-reset-password-submit',['as'=>'user-reset-password-submit','uses'=>'HomeController@ResetSubmitPassword']);

Route::get('settings', ['as'=>'settings', 'uses'=>'UserAuthController@getProfile']);

Route::post('update_user_info', ['as'=>'update_user_info', 'uses'=>'UserAuthController@update_user_info']);
Route::post('update_user_password', ['as'=>'update_user_password', 'uses'=>'UserAuthController@update_user_password']);