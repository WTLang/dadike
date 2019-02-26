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
Route::resource('admin/user','Admin\UserController');
