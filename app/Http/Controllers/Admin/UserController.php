<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\User;
use DB;
/*
|--------------------------------------------------------------------------
|           大迪克控制器->后台->用户管理
|--------------------------------------------------------------------------
 */
class UserController extends Controller
{
     /**
     * 显示用户页面
     *
     * @param  int  $id
     * @return view
     */
    public function index(Request $request)
    {
        //分页
        $count = $request->input('count',5);
        $search = $request->input('search','');
        //搜索用户名
        $userdata = User::where('us_name','like','%'. $search.'%')->paginate($count);

        // 加载视图
        return view('admin.user.index',['userdata'=>$userdata,'request'=>$request->all()]);
    }
     /**
     * 封禁用户
     *
     * @param  int  $id
     * @return view
     */
    public function ban($id){
        $res = User::where('uid',$id)->update(['identify'=>1]);
        if ($res) {
            return redirect('/admin/user')->with('success','操作成功');
        }else{
            return back()->with('aerror','添加失败');
        }

    }
    /**
     * 解禁用户
     *
     * @param  int  $id
     * @return view
     */
    public function res($id){
        $res = User::where('uid',$id)->update(['identify'=>0]);
        if ($res) {
            return redirect('/admin/user')->with('success','操作成功');
        }else{
            return back()->with('aerror','添加失败');
        }
    }
    /**
     * 删除用户
     *
     * @param  int  $id
     * @return view
     */
    public function del($id){
        $res = User::where('uid',$id)->delete();
        if ($res) {
            return redirect('/admin/user')->with('success','操作成功');
        }else{
            return back()->with('aerror','添加失败');
        }
    }
}
