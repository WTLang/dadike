<?php
/*
|--------------------------------------------------------------------------
| 								后台模块路由=Admin
|--------------------------------------------------------------------------
 */

/* 中间件:需要登录后才能进入的后台 */
Route::group(['middleware' => ['Alogin','rbac']],function(){
	//路由组,后台首页
	Route::prefix('admin')->group(function ()
	{
		Route::get('index', 'Admin\IndexController@index');
		Route::post('zhanqian', 'Admin\IndexController@zhanqian');
	});
	/* Admin->后台管理员管理页 */
	Route::resource('admin/admin','Admin\AdminController');
	Route::get('admin/admin/role/{id}','Admin\AdminController@role');
	Route::post('admin/admin/updatarole/{aid}','Admin\AdminController@updatarole');
	Route::get('admin/admin/edit/{id}','Admin\AdminController@edit');
	Route::get('admin/admin/editpass/{id}','Admin\AdminController@editpass');
	Route::post('/admin/admin/updatepass/{id}','Admin\AdminController@updatepass');
	Route::get('/admin/admin/del/{id}','Admin\AdminController@del');

	/* Admin->管理员权限管理路由*/
	Route::resource('admin/nodes','Admin\NodesController');
	Route::get('admin/node/nodeadd','Admin\NodesController@nodeadd');
	Route::post('admin/node/insert','Admin\NodesController@insert');

	/* Admin->后台用户管理页 */
	Route::resource('admin/user','Admin\UserController');
	Route::get('/admin/user/ban/{uid}','Admin\UserController@ban');
	Route::get('/admin/user/res/{uid}','Admin\UserController@res');
	Route::get('/admin/user/del/{uid}','Admin\UserController@del');


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

	/* Admin->树洞管理路由 */
	Route::resource('admin/tree','Admin\TreeController');

	/* Admin->文章回复管理路由 */
	Route::resource('admin/reply','Admin\ArticleReplyController');
});

/* Admin->管理员登出 */
Route::get('admin/logout','Admin\LoginController@logout')->middleware('Alogin');
/* Admin->权限不足的显示的页面 */
Route::get('/403',function(){
	return view('admin.power.403');
});

/* Admin->后台登录 */
Route::resource('admin/login','Admin\LoginController');
Route::get('admin/login','Admin\LoginController@index')->name('Alogin');

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

/* Home->树洞页面 */
	Route::get('/tree/index','Home\TreeController@index');

/* Home->树洞点赞 */
	Route::get('/tree/zan/{id}/{goods}','Home\TreeController@zan');
	
/* Home->树洞踩赞 */
	Route::get('/tree/cai/{id}/{bad}','Home\TreeController@cai');

Route::group(['middleware' => 'login'],function(){
	/* 前台个人信息更新 */
	Route::post('/personal/update', 'Home\PersonalController@update');
	/* 前台登出 */
	Route::get('/logout', 'Home\IndexController@logout');
	/* 前台个人中心 */
	Route::resource('/personal', 'Home\PersonalController')->middleware('login');
	/*文章回复*/
	Route::post('articlecontent/create', 'Home\ArticleContentController@create');
	/* 树洞发表 */
	Route::post('/tree','Home\TreeController@store');
	/* 前台树洞 */
	Route::resource('/tree','Home\TreeController');
	/* 我的发表 */
	Route::post('/tree/show','Home\TreeController@show');
});

/* 文章分类路由组 */
Route::prefix('acm')->group(function ()
	{
		Route::get('{id}/{acm_name}/{macm_name}', 'Home\ArticleCategoriesController@index');
		Route::post('{id}/{acm_name}/{macm_name}', 'Home\ArticleCategoriesController@index');
	});

/* 文章内容路由组 */
Route::prefix('articlecontent')->group(function ()
	{
		Route::get('{id}', 'Home\ArticleContentController@index');
		Route::get('articlecontent/del/{acr_id}', 'Home\ArticleContentController@delete'); 
		Route::post('search', 'Home\ArticleContentController@search'); 
	});
