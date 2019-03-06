<?php

/**
 * 仪表盘模块
 * Route::prefix = 路由组
 */
Route::prefix('admin')->group(function ()
{
	Route::get('index', 'Admin\IndexController@index');

	Route::get('count', 'Admin\IndexController@count');
});

/*
|--------------------------------------------------------------------------
| 用户模块
|--------------------------------------------------------------------------
 */

//首页
Route::resource('/','Home\IndexController');
//用户管理
Route::resource('admin/user','Admin\UserController');
//登录页面
Route::get('/login', 'Home\IndexController@login');
//执行登录
Route::post('/dologin', 'Home\IndexController@dologin');
//发送验证码类
Route::get('/send', 'Home\IndexController@send');
//检测验证码是否正确
Route::get('/check', 'Home\IndexController@check');
//检测用户名是否与数据库重复
Route::get('/namecheck', 'Home\IndexController@namecheck');
//登出
Route::get('/logout', 'Home\IndexController@logout');
//个人中心
Route::resource('/personal', 'Home\PersonalController');
Route::post('/personal/update', 'Home\PersonalController@update');


