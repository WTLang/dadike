<?php
/*
|--------------------------------------------------------------------------
| 								后台模块路由=Admin
|--------------------------------------------------------------------------
 */

/* 中间件:需要登录后才能进入的后台 */
Route::group(['middleware' => 'Alogin'],function(){
	//路由组,后台首页
	Route::prefix('admin')->group(function ()
	{
		Route::get('index', 'Admin\IndexController@index');

		Route::get('count', 'Admin\IndexController@count');
	});

});
/* 后台登录 */
Route::resource('admin/login','Admin\LoginController');
Route::get('admin/login','Admin\LoginController@index')->name('Alogin');

/* Admin->后台用户管理页 */
Route::resource('admin/user','Admin\UserController');
Route::get('admin/logout','Admin\LoginController@logout');

/* Admin->文章分类模块路由 */
Route::resource('admin/acm','Admin\ArticleCategoriesController');
Route::get('admin/acm/create/{id}', 'Admin\ArticleCategoriesController@create');//添加子分类

/* Admin->文章添加路由 */
Route::resource('admin/am','Admin\ArticleController');

/* Admin->友情连接路由 */
Route::resource('admin/friend','Admin\FriendController');

/* Admin->广告管理路由 */
Route::resource('admin/advertising','Admin\AdvertisingController');

/* Admin->联系我们管理路由 */
Route::resource('admin/aboutus','Admin\AboutUsController');

/* Admin->树洞管理路由*/
Route::resource('admin/tree','Admin\TreeController');

/*
|--------------------------------------------------------------------------
| 								前台模块路由=Home
|--------------------------------------------------------------------------
*/

/* Home->首页路由 */
Route::resource('/','Home\IndexController');

/* Home->判断登录路由 */
Route::post('/dologin', 'Home\IndexController@dologin');

/* Home->发送验证码路由 */
Route::get('/send', 'Home\IndexController@send');

/* Home->检测验证码是否正确 */
Route::get('/check', 'Home\IndexController@check');

/* Home->检测用户名是否与数据库重复 */
Route::get('/namecheck', 'Home\IndexController@namecheck');

Route::get('/aboutus', 'Home\AboutUsController@index');
/* Home->关于我们->信息写入数据库 */
Route::post('/aboutus/store', 'Home\AboutUsController@store');

/*前台登录页面*/
Route::get('/login', 'Home\IndexController@login')->name('login');

/*中间件:需要登录后才能进入的页面*/
Route::group(['middleware' => 'login'],function(){
	//前台个人信息更新
	Route::post('/personal/update', 'Home\PersonalController@update');
	//前台登出
	Route::get('/logout', 'Home\IndexController@logout');
	//前台个人中心
	Route::resource('/personal', 'Home\PersonalController')->middleware('login');

});

