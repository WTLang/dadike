<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\ArticleCategories;

class ArticleCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         * 文章分类 --首页
         * @titile 大迪克
         */
        return view('admin.article_categories_manage.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        /**
         * 文章分类 --添加
         * @titile 大迪克
         */
        return view('admin.article_categories_manage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //接收添加分类页的值
        $data = $request->all();

        // 一. 构建--分类路径
            if($data['acm_pid'] == 0){
                /* 顶级分类路径 */
                $data['acm_path'] = 0;

            }else{
                /* 先获取父级id */
                $parent_data = ArticleCategories::find($data['acm_pid']);  
                /* 子级分类路径 */
                $data['acm_path'] = $parent_data.','.$parent_data->acm_id;
            }
        dd($data);

        /* 赋值给$data */
        $ArticleCategories = new ArticleCategories;
        $ArticleCategories->acm_name =  $data['acm_name'];
        $ArticleCategories->acm_pid  =  $data['acm_pid'];
        $ArticleCategories->acm_path =  $data['acm_path'];

        /* 执行添加$data数据 */
        if($ArticleCategories->save()){
            return redirect('')->with('success','添加完成');
        }else{
            return back()->with('error','添加失败');
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
        //
        echo $id;
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
