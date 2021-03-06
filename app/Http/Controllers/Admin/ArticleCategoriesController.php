<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\ArticleCategories;
use DB;

/*
|--------------------------------------------------------------------------
|           大迪克控制器->文章分类控制器 ArticleCategoriesController
|--------------------------------------------------------------------------
 */
class ArticleCategoriesController extends Controller
{
    /**
     * 静态分类方法
     * @titile 大迪克
     */
    public static function getdata()
    {
        /* 获取数据 */
        $ac_data = ArticleCategories::select('*',DB::raw("concat(acm_path,',',acm_id) as paths"))->orderBy('paths','asc')->get();
        foreach ($ac_data as $k => $v) {
            /* 计算符号的个数 */
            $n = substr_count($v->acm_path,',');
            /* 编排分类的等级 */
            $ac_data[$k]->acm_name = str_repeat('|--->',$n).$v->acm_name;
        }

        return $ac_data;
    }

    /**
     * 文章分类 --首页
     * @titile 大迪克
     */
    public function index()
    {
        /* 调用静态数据 */
        $data = self::getdata();
        // dd($data->limit(5));
        return view('admin.article_categories_manage.index',['data'=>$data]);
    }

    /**
     * 文章分类 --添加
     *
     * @titile 大迪克
     * @$id      无值默认给0
     */
    public function create($id = 0)
    {   
        /* 接收$id的值 */
        $mca_id = $id;
        /* 调用静态数据 */
        $data = self::getdata();
        return view('admin.article_categories_manage.create',['mca_id'=>$mca_id,'data'=>$data]);
    }

    /**
     * 文章分类 --处理
     * @data  接收文章添加页的内容
     * @return 返回 bool
     */
    public function store(Request $request)
    {
        //接收添加分类页的值
        $data = $request->all();
        if ($data['acm_name'] ==null ) {
            return back()->with('sort_error','添加失败');
        }
        // 一. 构建--分类路径
            if($data['acm_pid'] == 0){
                /* 顶级分类路径 */
                $data['acm_path'] = 0;

            }else{
                /* 先获取父级id */
                $parent_data = ArticleCategories::find($data['acm_pid']);  
                /* 子级分类路径 */
                $data['acm_path'] = $parent_data->acm_path.','.$parent_data->acm_id;
            }

        /* 赋值给$data */
        $ArticleCategories = new ArticleCategories;
        $ArticleCategories->acm_name =  $data['acm_name'];
        $ArticleCategories->acm_pid  =  $data['acm_pid'];
        $ArticleCategories->acm_path =  $data['acm_path'];

        /* 执行添加$data数据 */
        if($ArticleCategories->save()){
            return redirect('admin/acm')->with('sort_success','添加成功');
        }else{
            return back()->with('sort_error');
        }

    }

    /**
     * 修改文章分类名页
     */
    public function edit($id)
    {
        /* 接受文章分类的id */
        $edit_id = $id;
        /* 查找文章分类的名字 */
        $edit_data = DB::table('article_categories_manage')->where('acm_id',$edit_id)->get();
        $edit_acm_name = $edit_data[0]->acm_name;
        /* 把文章分类的id和名字压入页面 */
        return view('admin.article_categories_manage.edit',['edit_acm_name'=>$edit_acm_name,'edit_id'=>$edit_id]);
        
    }

    /**
     * 执行修改的分类名
     * @return bool
     */
    public function update(Request $request, $id)
    {
        if($request['acm_name']){
            /* 查询该ID没修改之前的acm_name的名称 */
            $update_get = DB::table('article_categories_manage')->where('acm_id',$id)->get();
            $update_name = $update_get[0]->acm_name;
            /* 判断修改的名称是否跟之前的一样 */
            if($update_name == $request['acm_name']){
                return back()->with('acm_updata_error_02','值不能重复');
                }else{
                /* 剔除数据中不需要的信息 */
                $update_data = $request->except(['_token','_method']);
                $update_res = DB::table('article_categories_manage')
                            ->where('acm_id',$id)
                            ->update($update_data);
                /* 判断修改 */
                if ($update_res){
                    return redirect('admin/acm')->with('acm_updata_success','修改成功');
                }
            }
        }else{
            return redirect('admin/acm/18/edit')->with('acm_updata_error_01','内容不能为空');
        }

    }

    /**
     * 分类和子分类删除
     * @return bool
     */
    public function destroy($id)
    {
        /* 检查当前分类下是否有子分类 */
        $child_data = ArticleCategories::where('acm_pid',$id)->first();
        if ($child_data) {
            return back()->with('sonsort_error','当前分类有子分类.无法删除');
        }
        /* 执行删除 */
        if(ArticleCategories::destroy($id)){
            return redirect('admin/acm')->with('sonsort_success','删除成功');
        }else{
            return back()->with('sort_error','删除失败');
        }
    }
}
