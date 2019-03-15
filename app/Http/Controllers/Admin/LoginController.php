<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Admin;
use Hash;
use DB;

/*
|--------------------------------------------------------------------------
|           大迪克控制器->后台登录控制器 LoginController
|--------------------------------------------------------------------------
 */
class LoginController extends Controller
{
    /**
     * 后台登录视图
     */
    public function index(Request $request)
    {
        return view('admin.login.login');
    }

    /**
     * 判断登录
     * @return bool
     */
    public function store(Request $request)
    {
        /* 验证 */
        $this->validate($request ,[
            'admin_name' => 'required',
            'admin_password' => 'required',
        ],[
            'admin_name.required' => '管理员名称必填',
            'admin_password.required' => '密码必填' 
        ]);
        /* 去除无用的键 */
        $data = $request->except(['_token']);
        /* 从数据库去出数据 */
        $res = DB::table('Admin')->where('admin_name', $data['admin_name'])->first();
        if ($res) {
            if (Hash::check($data['admin_password'],$res->admin_password)) {
                /* 登录成功把用户名写入session */
                session(['admin_name' => $res->admin_name]);
                echo "<script>alert('登录成功!');location='/admin/index';</script>";
            }else{
                return redirect()->back()->withInput()->with('msg','密码错误');
            }
        }else{
            return redirect('admin/login')->with('msg','用户不存在');
        }
    }

    /**
     * 退出登录->清空session('admin_name')
     * @return 路由
     */
    public function logout(Request $request){
        //删除session里的用户
        session()->pull('admin_name');
        return redirect('/admin/login');
    }
}
