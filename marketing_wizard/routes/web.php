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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/',['as'=>'home','uses'=>'UserAuthController@getLogin']);

//User Registration Route List
Route::get('/user-login', ['as'=>'userlogin', 'uses'=>'UserAuthController@getLogin']);
Route::post('/user-login', ['as'=>'user_login', 'uses'=>'UserAuthController@postLogin']);

Route::get('/user-logout', ['as'=>'user-logout', 'uses' => 'UserAuthController@logout']);

//Password Change
Route::get('/password_change', ['as' => 'password_form', 'uses' => 'PasswordChangeController@getChangePassword']);
Route::post('/password_change', ['as' => 'password_form', 'uses' => 'PasswordChangeController@postChangePassword']);

Route::get('/latest_videos', ['as' => 'latest_videos', 'uses' => 'VideosController@getVideos']);

Route::get('/my_videos', ['as' => 'my_videos', 'uses' => 'VideosController@getMyVideos']);
Route::get('/my_purchases', ['as' => 'my_purchases', 'uses' => 'VideosController@my_purchases']);
/* Delete videos */
Route::post('/my_videos/delete/{id}', ['as' => 'my_videos', 'uses' => 'VideosController@deleteMyVideos']);

/* user Forget Password */
Route::get('/user-forget-password',['as'=>'user-forget-password','uses'=>'HomeController@getForgetPassword']);
Route::get('/user-password-reset/{token}',['as'=>'user-password-reset','uses'=>'HomeController@resetForgetPassword']);
Route::post('/user-forget-password-submit',['as'=>'user-forget-password-submit','uses'=>'HomeController@submitForgetPassword']);
Route::post('/user-reset-password-submit',['as'=>'user-reset-password-submit','uses'=>'HomeController@ResetSubmitPassword']);

Route::get('/settings', ['as'=>'settings', 'uses'=>'UserAuthController@getProfile']);

Route::post('/update_user_info', ['as'=>'update_user_info', 'uses'=>'UserAuthController@update_user_info']);
Route::post('/update_user_password', ['as'=>'update_user_password', 'uses'=>'UserAuthController@update_user_password']);
Route::get('/create_videos', ['as' => 'create_videos', 'uses' => 'VideosController@createVideos']);

/* Admin */
/*Route::get('/admin',function(){
	return view('admin.login');
});*/
Route::get('/admin',['as'=>'admin_home','uses'=>'AdminController@getLogin']);
Route::get('/admin/login', ['as'=>'adminlogin', 'uses'=>'AdminController@getLogin']);
Route::post('/admin/login', ['as'=>'admin_login', 'uses'=>'AdminController@postLogin']);
Route::get('/admin/dashboard', ['as' => 'admin_dashboard', 'uses' => 'AdminDashboardController@dashboard']);
Route::get('admin-logout', ['as'=>'admin-logout', 'uses' => 'AdminController@logout']);
Route::get('/admin/createcustomer', ['as'=>'admin_create_customer', 'uses'=>'CustomerController@create']);
Route::post('/admin/createcustomer', ['as'=>'admin_add_customer', 'uses'=>'CustomerController@add']);


Route::get('/admin/viewcustomer', ['as'=>'admin_view_customer', 'uses'=>'CustomerController@view']);
Route::post('/admin/typeupdate', ['as' => 'typeupdate', 'uses' => 'CustomerController@typeUpdate']);
Route::get('/admin/editcustomer/{id}', ['as' => 'admin_edit_customer', 'uses' => 'CustomerController@edit']);//admin_update_customer
Route::post('/admin/updatecustomer/{id}', ['as' => 'admin_update_customer', 'uses' => 'CustomerController@update']);
Route::post('/admin/deletecustomer/{id}', ['as' => 'admin_delete_customer', 'uses' => 'CustomerController@delete']);

Route::get('/admin/setting', ['as' => 'admin_setting', 'uses' => 'AdminDashboardController@setting']);
Route::post('update_admin_password', ['as'=>'update_admin_password', 'uses'=>'AdminController@update_admin_password']);
Route::post('update_admin_email', ['as'=>'update_admin_email', 'uses'=>'AdminController@update_admin_email']);
Route::post('/admin/suspendcustomer/{id}', ['as' => 'admin_suspend_customer', 'uses' => 'CustomerController@suspend']);



//Route::get('/admin/viewcustomer/{id}', ['as' => 'admin_edit_customer', 'uses' => 'CustomerController@edit']);

/*Route::get('resetPassword/{token}', ['as' => 'resetPassword', function($token)
{
   return View::make('resetPassword')->with('token', $token); 
}]);*/
/*Route::get('admin/login', 'AdminAuth\AuthController@showLoginForm');
Route::post('admin/login', 'AdminAuth\AuthController@login');
Route::group(['middleware'=>['admin']],function(){
	Route::get('/admin','AdminController@index');
	Route::get('/admin/logout','AdminAuth\AuthController@logout');
});*/