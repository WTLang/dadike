<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

/*
|--------------------------------------------------------------------------
|           大迪克控制器->前台->文章分类排列 控制器
|--------------------------------------------------------------------------
 */
class ArticleCategoriesController extends Controller
{
    /**
     * 一级分类
     * @return $data
     */
    public function index(Request $request,$id,$acm_name,$macm_name)
    {
        $amc_id = $id;
        /* 判断显示多条还是全部 */
        if(isset($request->num)){
            $am_data = DB::table('article_manage')->where('am_acm_id',$id)->get();
        }else{
            $am_data = DB::table('article_manage')->where('am_acm_id',$id)->limit(6)->get();
        }
        /* 引入数据 */
    	return view('home.article_manage.index',[
    		'acm_name'=>$acm_name,
    		'macm_name'=>$macm_name,
    		'am_data'=>$am_data,
            'amc_id'=>$amc_id
    	]);
    }

}
