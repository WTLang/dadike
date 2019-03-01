<?php
/*
|--------------------------------------------------------------------------
| 								后台模块路由=Admin
|--------------------------------------------------------------------------
 */

/* Admin->仪表盘路由组 */
Route::prefix('admin')->group(function ()
{
	Route::get('index', 'Admin\IndexController@index');

	Route::get('count', 'Admin\IndexController@count');
});

/* Admin->用户模块路由 */
Route::resource('admin/user','Admin\UserController');

/* Admin->文章分类模块路由 */
Route::resource('admin/acm','Admin\ArticleCategoriesController');
Route::get('admin/acm/create/{id}', 'Admin\ArticleCategoriesController@create');//添加子分类

/* Admin->文章添加路由 */
Route::resource('admin/am','Admin\ArticleController');


/*
|--------------------------------------------------------------------------
| 								前台模块路由=Home
|--------------------------------------------------------------------------
*/

/* Home->首页路由 */
Route::resource('/','Home\IndexController');


/* Home->登录页路由 */
Route::get('/login', 'Home\IndexController@login'); 

/* Home->判断登录路由 */
Route::post('/dologin', 'Home\IndexController@dologin');

/* Home->发送验证码路由 */
Route::get('/send', 'Home\IndexController@send');

