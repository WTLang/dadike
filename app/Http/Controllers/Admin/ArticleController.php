<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\ArticleManage;
use DB;
use Storage;

/*
|--------------------------------------------------------------------------
|           大迪克控制器->文章管理控制器 ArticleController
|--------------------------------------------------------------------------
 */
class ArticleController extends Controller
{
    /**
     * 后台文章浏览首页
     * @return $data
     */
    public function index(Request $request)
    {
        /* 页面显示条数 */
        $count = $request->input('count',5);
        /* 接收搜索信息 */
        $search = $request->input('search','');
        /* 模糊搜索 */
        $data = ArticleManage::where('am_title','like','%'.$search.'%')->paginate($count);
        // dd($data);
         return view('admin.article_manage.index',['data'=>$data,'request'=>$request->all()]);
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
        $this->validate($request,[
                'am_title' => 'required',
                'am_author' => 'required',
                'am_create_time' => 'required',
                'am_img' => 'required',
                'am_content' => 'required',
        ],[
                'am_title.required' => '标题未填写',
                'am_author.required' => '作者未填写',
                'am_create_time.required' => '发表时间未填写',
                'am_img.required' => '封面图未上传',
                'am_content.required' => '文章内容需要填写',
        ]);
        /* 剔除不需要的参数 */
        $am_data = $request->except(['_token']);
        /* 创建上传对象 */
        $img_file = $request->file('am_img');
        /* 将图片放入指定的文件夹 */
        $img_path = $img_file->store('Backstage_images');
        /* 重新组合数据 */
        $am_data['am_img'] = $img_path;

        $am_datas = new ArticleManage;
        $am_datas->am_title = $am_data['am_title'];
        $am_datas->am_author = $am_data['am_author'];
        $am_datas->am_create_time = $am_data['am_create_time'];
        $am_datas->am_img = $am_data['am_img'];
        $am_datas->am_acm_id = $am_data['am_acm_id'];
        $am_datas->am_content = $am_data['am_content'];

        /* 判断 */
        if ($am_datas->save()) {
            return redirect('admin/am')->with('article_manage_success','添加成功');
        }else{
            return back()->with('article_manage_error','添加失败');
        }
    }

    /**
     * 文章发布于关闭->执行判断
     * @return bool
     */
    public function show($id)
    {
        /* 查找该id的信息 */
        $data = DB::table('article_manage')->where('am_id',$id)->get();
        /* 更改信息的状态 */
        $new_status = $data[0]->am_status == 1 ? 0:1;
        $am_data = ArticleManage::find($id);
        $am_data->am_status = $new_status;
        $res = $am_data->update();
        /* 判断 */
        if ($res) {
            return redirect('admin/am');
        }else{
            return back();
        }
    }

    /**
     * 文章管理->修改页
     * @return $data数据加载到修改页
     */
    public function edit($id)
    {
        //
        /* 获取文章分类的一级分类导入到视图中 */
        $acm_sort = DB::table('article_categories_manage')
                   ->where('acm_path','like','%,%')
                   ->get();

        /* 获取该id的在文章表里面的所有信息 */
        $am_data = DB::table('article_manage')
                   ->where('am_id',$id)
                   ->get();
        $edit_data = $am_data[0];
        return view('admin.article_manage.edit',['acm_sort'=>$acm_sort,'edit_data'=>$edit_data]);
    }

    /**
     * 文章管理->执行修改
     * @return bool
     */
    public function update(Request $request, $id)
    {
        /* 文章内容验证是否未空 */
        $this->validate($request,[
                'am_title' => 'required',
                'am_author' => 'required',
                'am_create_time' => 'required',
                'am_acm_id' => 'required',
                'am_content' => 'required',
        ],[
                'am_title.required' => '标题为空',
                'am_author.required' => '作者为空',
                'am_create_time.required' => '更新时间为空',
                'am_acm_id.required' => '分类为空',
                'am_content.required' => '文章内容需要为空',
        ]);
        /* 检查是否有文件上传 */
        $new_file = $request->file('new_am_img');
        /* 获取要修改的数据 */
        $old_data = DB::table('article_manage')->where('am_id',$id)->get();
        /* 获取旧图的信息 */
        $old_img_path = $old_data[0]->am_img;
        if ($new_file) {
            /* 把新图放入文件夹中 */
            $new_file_path = $new_file->store('Backstage_images');
            $am_data = ArticleManage::find($id);
            $am_data->am_title = $request->input('am_title');
            $am_data->am_author = $request->input('am_author');
            $am_data->am_create_time = $request->input('am_create_time');
            $am_data->am_img = $new_file_path;
            $am_data->am_acm_id = $request->input('am_acm_id');
            $am_data->am_content = $request->input('am_content');
            $am_res = $am_data->update();
            /* 判断 */
            if ($am_res) {
                /* 删除原图 */
                $old_img_delete = Storage::disk('local');
                $old_img_delete->delete($old_img_path);
                return redirect('admin/am')->with('article_update_success','修改成功');
            }else{
                return back()->with('article_update_error','修改失败');
            }
        }else{
            $am_data = ArticleManage::find($id);
            $am_data->am_title = $request->input('am_title');
            $am_data->am_author = $request->input('am_author');
            $am_data->am_create_time = $request->input('am_create_time');
            $am_data->am_img = $old_img_path;
            $am_data->am_acm_id = $request->input('am_acm_id');
            $am_data->am_content = $request->input('am_content');
            $am_res = $am_data->update();
            /* 判断 */
            if ($am_res) {
                return redirect('admin/am');
            }else{
                return back()->with('article_update_error','修改失败');
            }
        }
    }

    /**
     * 文章管理->删除
     * @return bool
     */
    public function destroy($id)
    {
        //
        /* 获取要删除的该id的所有信息 */
        $res = ArticleManage::destroy($id);
        /* 判断 */
        if ($res) {
            return redirect('admin/am')->with('article_delete_success','删除成功');
        }else{
            return back()->with('article_delete_error','删除失败');
        }
    }
}
