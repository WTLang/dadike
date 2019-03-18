<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Admin;
use Hash;
use DB;
/*
|--------------------------------------------------------------------------
|           大迪克控制器->后台->登录 控制器
|--------------------------------------------------------------------------
 */
class LoginController extends Controller
{
    /**
     * 登录的页面
     *
     * @return views
     */
    public function index(Request $request)
    {
        return view('admin.login.login');
    }
    /**
     * 登录逻辑
     *
     * @param  \Illuminate\Http\Request  $request
     * @return view
     */
    public function store(Request $request)
    {
        $this->validate($request ,[
            'admin_name' => 'required',
            'admin_password' => 'required',
        ],[
            'admin_name.required' => '管理员名称必填',
            'admin_password.required' => '密码必填' 
        ]);

        $data = $request->except(['_token']);
        //从数据库取去出数据
        $res = DB::table('admin')->where('admin_name', $data['admin_name'])->first();
        if ($res) {
            if (Hash::check($data['admin_password'],$res->admin_password)) {
                //获取权限
                $admin_nodes = DB::select('select n.cname,n.aname from nodes as n,users_roles as ur,roles_nodes as rn where ur.aid = '.$res->id.' and ur.rid = rn.rid and rn.nid = n.id;');
                $arr = [];
                foreach ($admin_nodes as $key => $value) {
                    $arr[$value->cname][] = $value->aname;
                    if ($value->aname == 'creat') {
                        $arr[$value->cname][] = 'store';
                    }
                }
                //首页的权限写进去
                $arr['indexcontroller'][] = 'index';
                //登录成功把用户名写入session
                session(['admin_name' => $res->admin_name]);
                //将权限压入session
                session(['admin_node_type'=>$arr]);
                //将身份传入session
                session(['identify'=>$res->identify]);
                echo "<script>alert('登录成功!');location='/admin/index';</script>";
            }else{
                return redirect()->back()->withInput()->with('msg','密码错误');
            }
        }else{
            return redirect('admin/login')->with('msg','用户不存在');
        }
    }
     /**
     * 管理员退出
     *
     * @param  \Illuminate\Http\Request  $request
     * @return view
     */
    public function logout(Request $request){
        //删除session里的用户
        session()->pull('admin_name');
        session()->pull('admin_node_type');
        
        return redirect('/admin/login');
    }
}
