<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use App\Model\Home\Article_reply;
/*
|--------------------------------------------------------------------------
|           大迪克控制器->前台->文章内容 控制器
|--------------------------------------------------------------------------
 */
class ArticleContentController extends Controller
{
    /**
     * 把数据载入视图
     * @return $data
     */
    public function index(Request $request,$id)
    {
    	/* 文章内容表 */
    	$am_data = DB::table('article_manage')->where('am_id',$id)->get();
    	/* 文章的一级分类信息 */
    	$acm_data = DB::table('article_categories_manage')->where('acm_id',$am_data[0]->am_acm_id)->get();
    	/* 顶级分类的信息 */
    	$acm_datas = DB::table('article_categories_manage')->where('acm_id',$acm_data[0]->acm_pid)->get();
        /* 回复数据 */
        $acr_data = DB::table('article_reply')->where('acr_am_id',$am_data[0]->am_id)->orderBy('acr_id','desc')->get();
        /* 统计回复 */
        $acr_count =DB::table('article_reply')->where('acr_am_id',$am_data[0]->am_id)->count();
        /* 判断是否有数据 */
        if (!isset($acr_data[0])) {
            $acr_data = 0;
        }
        /* 引入数据到视图 */
    	return view('home.articlecontent.index',[
    		'am_data'=>$am_data,
    		'acm_data'=>$acm_data,
    		'acm_datas'=>$acm_datas,
            'acr_data'=>$acr_data,
            'acr_count'=>$acr_count
    	]);
    }

    /**
     * 添加回复到数据
     * @return bool
     */
    public function create(Request $request)
    {
        /*把数据添加的数据库*/ 
        $acr_data = new Article_reply;
        $acr_data->acr_uid = $request->acr_uid;
        $acr_data->acr_name = $request->acr_name;
        $acr_data->acr_am_id = $request->acr_am_id;
        $acr_data->acr_content = $request->acr_content;
        $acr_data->acr_time  =  date('Y-m-d',time());
        /* 执行添加 */
        if ($acr_data->save()) {
            return back()->with('acr_data_yes','回复成功,返回查看');
        }else{
            return back()->with('acr_data_no','回复失败,请重试');
        }
    }

    /**
     * 用户自己删除评论
     * @return bool
     */
    public function delete($acr_id)
    {
       $res = Article_reply::destroy($acr_id);
       /* 执行删除 */
       if ($res) {
            return back()->with('acr_delete_yes','删除成功');
        }else{
            return back()->with('acr_delete_no','删除失败,请重试');
        }
    }

    /**
     * 首页搜索页
     */
    public function search(Request $request)
    {
        /* 数据的搜索内容 */
        $search = $request->search_content;
        /* 模糊搜索 */
        $data = DB::table('article_manage')->where('am_title','like','%'.$search.'%')->orderBy('am_create_time','desc')->get();
        return view('home.article_manage.search',[
            'search'=>$search,
            'data'=>$data
        ]);
    }
}
