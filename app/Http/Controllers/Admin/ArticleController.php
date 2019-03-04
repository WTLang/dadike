<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;  //文章分类表

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        echo '文章浏览首页';
    }

    /**
     * 文章添加->视图
     * @return 文章数据
     */
    public function create()
    {
        /* 获取文章分类的一级分类导入到视图中 */
        $acm_data = DB::table('article_categories_manage')
                   ->where('acm_path','like','%,%')
                   ->get();
        return view('admin.article_manage.create',['acm_data'=>$acm_data]);
    }

    /**
     * 文章添加->处理
     * @request  接受文章添加的所有内容
     * @return   添加完成的结果
     */
    public function store(Request $request)
    {
        /* 文章内容验证 */
        // $this->validate($request,[
        //         'am_title' => 'required',
        //         'am_author' => 'required',
        //         'am_create_time' => 'required',
        //         'am_img' => 'required',
        //         'am_content' => 'required',
        // ],[
        //         'am_title.required' => '用户名未填写',
        //         'am_author.required' => '作者未填写',
        //         'am_create_time.required' => '发表时间未填写',
        //         'am_img.required' => '封面图为上传',
        //         'am_content.required' => '文章内容需要填写',
        // ]);
        /* 创建上传对象 */
        $img_file = $request->file('am_img');
        $img_res = $img_file->store('Backstage_images');
        dd($img_res);
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
        // dd($id);
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
