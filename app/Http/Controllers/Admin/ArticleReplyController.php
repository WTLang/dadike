<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\Article_reply;
use DB;

/*
|--------------------------------------------------------------------------
|           大迪克控制器->文章回复控制器 ArticleController
|--------------------------------------------------------------------------
 */
class ArticleReplyController extends Controller
{
    /**
     * 载入审核回复视图
     * @return $data
     */
    public function index(Request $request)
    {
        /* 页面显示条数 */
        $count = $request->input('count',5);
        /* 接收搜索信息 */
        $search = $request->input('search','');
        /* 文章回复数据 */
        $acr_data = Article_reply::where('acr_content','like','%'.$search.'%')->orderBy('acr_time','desc')->paginate($count);
        return view('admin.article_reply.index',[
            'acr_data'=>$acr_data,
            'request'=>$request->all()
        ]);
    }

    /**
     * 删除数据.
     * @return bool
     */
    public function destroy($id)
    {
        /* 删除该id的数据 */
        $res = Article_reply::destroy($id);
        /* 判断 */
        if ($res) {
            return back()->with('acr_delete_yes','删除成功');
        }else{
            return back()->with('acr_delete_no','删除失败');
        }
    }
}
