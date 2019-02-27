<?php
/*
|--------------------------------------------------------------------------
| 								后台模块路由
|--------------------------------------------------------------------------
 */

/* 仪表盘路由 */
Route::prefix('admin')->group(function ()
{
	Route::get('index', 'Admin\IndexController@index');

	Route::get('count', 'Admin\IndexController@count');
});

/* 用户模块路由 */
Route::resource('admin/user','Admin\UserController');


/* 文章分类模块路由 */
Route::resource('acm','Admin\ArticleCategoriesController');

/* 文章添加模块路由 */
Route::resource('am','Admin\ArticleController');


/*
|--------------------------------------------------------------------------
| 								前台模块路由
|--------------------------------------------------------------------------
 */