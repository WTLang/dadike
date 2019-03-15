<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\User;    
use App\Model\Home\User_details;
use DB;
use SESSION;

/*
|--------------------------------------------------------------------------
|           大迪克控制器->前台->个人中心
|--------------------------------------------------------------------------
 */
class PersonalController extends Controller
{
    /**
     * 加载个人中心视图
     * @return $data
     */
    public function index(Request $request)
    {
        /* 获取用户的uid */
        $uid = session()->get('uid');
        /* 查找该id的数据 */
        $userdata = User::with('infos')->where('uid', $uid)->first();
        /* 数据加载 */
        return view('home.center.center',['userdata'=>$userdata,'request'=>$request->all()]);

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
     * 修改个人信息
     * @return bool
     */
    public function store(Request $request)
    {
        /* 去除不需要的值 */
        $data = $request->except(['_token','code','reus_password']);
        /* 组合数组来存进数据库 */
        $data['uid'] = $request->session()->get('uid');
        /* 获取上传的文件 */
        $img_file = $request->file('usds_head');
        /* 将该图片路径 */
        if ($img_file) {
            $img_res = $img_file->store('Reception_images');
            $data['usds_head'] = $img_res;
        }else{
            $data['usds_head'] = "";
        }
        $res = User_details::create($data);
        /* 判断 */
        if ($res) {
            return redirect('/personal')->with('psuccess','个人信息修改成功');
        }else{
            return back()->with('perror','个人信息修改失败');
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
        /* 获取用户uid */
        $uid = $request->session()->get('uid');
        /* 获取数据库里旧头像的路径 */
        $usds_old_head = DB::select('select usds_head from users_details where uid = ?', [$uid]);
        /* 取头像的值 */
        $usds_old_head_file = $usds_old_head[0]->usds_head;
        /* 拼接一下 */
        $usds_old_head_dir = 'all_uploads/'.$usds_old_head[0]->usds_head;
        /* 接受数据 */
        $data = $request->except(['_token','_method']);
        /* 获取上传的文件 */
        $img_file = $request->file('usds_head');
        /* 如果有上传文件,获取该文件 */
        if ($img_file) {
            $img_res = $img_file->store('Reception_images');
            $data['usds_head'] = $img_res;
        }else{
            $data['usds_head'] = $usds_old_head_file;
        }
        /* 更新数据 */
        $res = User_details::where('uid', $uid)->update([
            'usds_true_name' => $data['usds_true_name'],
            'usds_head' => $data['usds_head'],
            'usds_addr' => $data['usds_addr'],
            'usds_describe' => $data['usds_describe']
        ]);
        /* 判断是否旧头像不为空而且获取到新头像并且上传成功 */
        if (!empty($usds_old_head_file) && $img_file && $res) {
            /* 删除旧头像的图片 */
            unlink($usds_old_head_dir);
            return redirect('/personal')->with('psuccess','个人信息修改成功');
        }
        /* 判断 */
        if($res){
            return redirect('/personal')->with('psuccess','个人信息修改成功');
        }else{
            return back()->with('perror','个人信息修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
