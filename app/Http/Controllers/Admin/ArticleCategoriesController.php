<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\ArticleCategories;
use DB;

class ArticleCategoriesController extends Controller
{


    /**
     * 静态分类方法
     *
     * @titile 大迪克
     */
    public static function getdata()
    {
        
        /* 查出表中的顶级分类 */
        $ac_data = DB::table("article_categories_manage")->where('acm_pid',0)->get();

        /* 顶级分类遍历 */
        /* 给顶级分类下面添加一个one键存放一级分类的路径,查所有顶级分类下的一级分类 */
        foreach ($ac_data as $key => $val) 
        {
           $ac_data[$key]->one = DB::table("article_categories_manage")->where('acm_pid',$val->acm_id)->get();

           /* 添加一级标识 */
            $n1 = substr_count($val->acm_path,',');
            $val->acm_name = str_repeat('|--->',$n1).$val->acm_name;

            /* 一级分类遍历 */
            /* 给一级分类下面添加一个two键存放二级分类的路径,查所有一级分类下的二级分类 */
            // dd($ac_data);
           foreach($ac_data[$key]->one as $keyt => $valt)
           {
                $ac_data[$key]->one['two'] = DB::table("article_categories_manage")->where('acm_pid',$valt->acm_id)->get();

                /* 添加二级标识 */
                // $n2 = substr_count($ac_data[$key]->one[$key]->acm_path,',');
                $valt->acm_name = str_repeat('|--->',1).$valt->acm_name;
           }
        }

        return $ac_data;
    }

    /**
     * 文章分类 --首页
     *
     * @titile 大迪克
     */
    public function index()
    {
        $data = self::getdata();
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

        $data = self::getdata();
        return view('admin.article_categories_manage.create',['mca_id'=>$mca_id,'data'=>$data]);
    }

    /**
     * 文章分类 --处理
     *
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
            return redirect('admin/acm')->with('sort_success');
        }else{
            return back()->with('sort_error');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_id = $id;
        $edit_data = DB::table('article_categories_manage')->where('acm_id',$edit_id)->get();
        $edit_acm_name = $edit_data[0]->acm_name;
        return view('admin.article_categories_manage.edit',['edit_acm_name'=>$edit_acm_name,'edit_id'=>$edit_id]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        dump($id);
        $update_data = $request->except(['_token','_method']);
        dump($update_data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
