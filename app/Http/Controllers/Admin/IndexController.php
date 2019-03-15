<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Index;
use DB;

/*
|--------------------------------------------------------------------------
|           大迪克控制器->后台控制器 IndexController
|--------------------------------------------------------------------------
 */
class IndexController extends Controller
{
    /**
     * 载入后台首页
     * @include 统计图
     */
    public function index(Request $request)
    {
        $index = Index::find(1);
    	/* 标题 */
    	$title = '大迪克';
        /*统计管理员的总数*/
        $admin_data = DB::table('admin')->count();
        /*统计用户的总数*/
        $users_data = DB::table('users')->count();
        /*统计文章的总数*/
        $acm_data = DB::table('article_manage')->count();
        /*统计广告的总数*/
        $ad_data = DB::table('advertising_management')->count();
        /* 引入--后台首页(本站信息) */
    	return view('admin.index.index',[
            'title'=>$title,
            'index' => $index,
            'admin_data'=>$admin_data,
            'users_data'=>$users_data,
            'acm_data'=>$acm_data,
            'ad_data'=>$ad_data
        ]);
    }

    /**
     * 站前信息
     * @return $data
     */
    public function zhanqian(Request $request)
    {
        /* 去除无用的键 */
        $web_data = $request->except(['_token']);
        $web_bulletin = $web_data['bulletin'];
        /* 直接更新数据 */
        $res = DB::table('web')->where('web_id', 1)->update(['web_bulletin' => $web_bulletin]);
        /* 判断 */
        if ($res) {
            return redirect('admin/index')->with('bulletin_success','发布成功');
        }else{
            return back()->with('bulletin_error','发布失败');
        }
    }

}
