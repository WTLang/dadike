<?php
/*
|--------------------------------------------------------------------------
| 后台模块
|--------------------------------------------------------------------------
 */


//中间件:需要登录后才能进入的后台
Route::group(['middleware' => 'Alogin'],function(){
	//路由组,后台首页
	Route::prefix('admin')->group(function ()
	{
		Route::get('index', 'Admin\IndexController@index');

		Route::get('count', 'Admin\IndexController@count');
	});

	//后台用户管理页
	Route::resource('admin/user','Admin\UserController');
	Route::get('admin/logout','Admin\LoginController@logout');
});
//后台登录
Route::resource('admin/login','Admin\LoginController');
Route::get('admin/login','Admin\LoginController@index')->name('Alogin');


/*
|--------------------------------------------------------------------------
| 用户模块
|--------------------------------------------------------------------------
 */

//前台首页
Route::resource('/','Home\IndexController');
//前台登录页面
Route::get('/login', 'Home\IndexController@login')->name('login');
//前台执行登录
Route::post('/dologin', 'Home\IndexController@dologin');


//中间件:需要登录后才能进入的页面
Route::group(['middleware' => 'login'],function(){
	//前台个人信息更新
	Route::post('/personal/update', 'Home\PersonalController@update');
	//前台注册检测用户名是否与数据库重复
	Route::get('/namecheck', 'Home\IndexController@namecheck');
	//前台登出
	Route::get('/logout', 'Home\IndexController@logout');
	//前台个人中心
	Route::resource('/personal', 'Home\PersonalController')->middleware('login');
	//前台发送验证码类
	Route::get('/send', 'Home\IndexController@send');
	//前台检测验证码是否正确
	Route::get('/check', 'Home\IndexController@check');
	//前台检测用户名是否与数据库重复
	Route::get('/namecheck', 'Home\IndexController@namecheck');

});

