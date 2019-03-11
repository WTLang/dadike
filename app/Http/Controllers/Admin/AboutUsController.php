<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\AboutUs;
use DB;

/*
|--------------------------------------------------------------------------
|           大迪克控制器->后台->联系我们 控制器(处理用户问题)
|--------------------------------------------------------------------------
 */
class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about_data = AboutUs::all();
        // dd($about_data);
        return view('admin.aboutus.index',['about_data'=>$about_data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * 回复页面
     * @return data
     */
    public function edit($id)
    {
        /* 找出该id的所有信息 */
        $au_data = DB::table('about_us')->where('au_id',$id)->get();
        /* 把数据载入视图 */
        return view('admin.aboutus.edit',['au_data'=>$au_data]);
    }

    /**
     * 数据更新
     * @return bool
     */
    public function update(Request $request, $id)
    {
        if ($request->up_message == null) {
            return back()->with('aboutus_edit_error','内容不能为空');
        }else{
            $au_datas =AboutUs::find($id);
            $au_datas->au_status = 0;
            $au_datas->au_solve = $request->up_message;
            if ($au_datas->update()) {
                return redirect('admin/aboutus')->with('aboutus_edit_success','又解决一个问题了');
            }
        }
    }

    /**
     * 删除垃圾信息
     * @return boll
     */
    public function destroy($id)
    {
       $res = AboutUs::destroy($id);
       /* 判断 */
        if ($res) {
            return redirect('admin/aboutus')->with('aboutus_success','删除成功');
        }else{
            return back()->with('aboutus_error','删除失败');
        }
        
    }
}
