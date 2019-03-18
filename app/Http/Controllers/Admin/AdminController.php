<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Admin;
use DB;
use Hash;
/*
|--------------------------------------------------------------------------
|           大迪克控制器->后台->管理员 控制器
|--------------------------------------------------------------------------
 */
class AdminController extends Controller
{
    /**
     * 首页的方法
     *
     * @return view
     */
    public function index(Request $request)
    {
        //分页
        $count = $request->input('count',5);
        $search = $request->input('search','');
        //搜索用户名
        $admindata = Admin::where('admin_name','like','%'. $search.'%')->paginate($count);

        // 加载视图
        return view('admin.admin.index',['admindata'=>$admindata,'request'=>$request->all()]);
    }

    /**
     * 添加管理员的方法
     *
     * @return view
     */
    public function create()
    {
        $data = DB::table('roles')->get();
        return view('admin.admin.create',['data'=>$data]);
    }

    /**
     * 注册管理员,填入数据库
     *
     * @return view
     */
    public function store(Request $request)
    {
        //表单输入判断
        $this->validate($request ,[
            'admin_name' => 'required|regex:/^[a-zA-Z]{1}[\w]{5,16}$/',
            'admin_password' => 'required|regex:/^[\w]{6,18}$/',
            'readmin_password'=>'required|same:admin_password',
            'admin_email' => 'required|email',
            'identify' => 'regex:/^[1-9]$/'
        ],[
            'admin_name.required'=>'管理员名名必填',
            'admin_name.regex'=>'输入正确的用户名,6-16位,不以数字开头',
            'admin_password.required'=>'密码必填',
            'admin_password.regex'=>'输入正确的密码,6-18位,不以数字开头',
            'readmin_password.required'=>'请输入重复密码',
            'readmin_password.same'=>'重复密码必须和密码输入一致',
            'admin_email.required'=>'电子邮箱必填',
            'admin_email.regex'=>'输入正确的邮箱',
            'identify.regex' => '请选择权限',
        ]);
        $data = $request->except(['_token','readmin_password']);
        //密码加密
        $data['admin_password'] = Hash::make($data['admin_password']);
        //存入数据库
        $res = Admin::create($data);
        if ($res) {
            $temp = ['aid'=>$res->id,'rid'=>$data['identify']];
            $res1 = DB::table('users_roles')->insert($temp);
            if ($res1) {
                return redirect('/admin/admin')->with('success','添加成功');
            }
        }else{
            return back()->with('aerror','添加失败');
        }
    }

    /**
     * 修改管理员页面
     *
     * @param  int  $id
     * @return view
     */
    public function edit($id)
    {
        $data = $admindata = Admin::where('id',$id)->get();
        return view('admin.admin.edit',['data'=>$data]);
    }

     /**
     * 修改管理员密码页面
     *
     * @param  int  $id
     * @return \view
     */
    public function editpass($id){
        $data = $admindata = Admin::where('id',$id)->get();
        return view('admin.admin.editpass',['id'=>$id,'data'=>$data]);
    }
     /**
     * 修改密码的逻辑
     *
     * @param  int  $id
     * @return view
     */
    public function updatepass(Request $request,$id){
        $this->validate($request ,[
            'admin_password' => 'required|regex:/^[\w]{6,18}$/',
            'readmin_password' => 'required|same:admin_password',
        ],[
            'admin_password.required' => '密码必填',
            'admin_password.regex'=>'输入正确的密码,6-18位,不含空格',
            'readmin_password.required'=>'重复密码必填',
            'readmin_password.same'=>'重复密码必须和密码输入一致',
        ]);
        $data['admin_password'] = Hash::make($request->get('admin_password'));
        $res = Admin::where('id',$id)->update(['admin_password'=>$data['admin_password']]);
        if ($res) {
            return redirect('/admin/admin')->with('success','添加成功');
        }else{
            return back()->with('eerror','失败');
        }
    }
    /**
     * 更新管理员的信息
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \view
     */
    public function update(Request $request, $id)
    {
        $this->validate($request ,[
            'admin_name' => 'required|regex:/^[a-zA-Z]{1}[\w]{5,16}$/',
            'admin_email' => 'required|email',
        ],[
            'admin_name.required'=>'管理员名名必填',
            'admin_name.regex'=>'输入正确的用户名,6-16位,不以数字开头',
            'admin_email.required'=>'电子邮箱必填',
            'admin_email.regex'=>'输入正确的邮箱',
        ]);
        
        $data = $request->except(['_token','_method']);
        $res = Admin::where('id',$id)->update(['admin_name'=>$data['admin_name'],'admin_email'=>$data['admin_email']]);
        if ($res) {
            return redirect('/admin/admin')->with('success','添加成功');
        }
    }
     /**
     *  显示修改权限的页面
     *
     * @param  int  $id
     * @return \views
     */
    public function role($id){
    	//获取用户
    	$admin = Admin::find($id);
    	//获取当前用户的角色id
    	$users_roles = DB::table('users_roles')->where('aid',$id)->select('rid')->get();
    	$user_role_data_rids = [];
    	foreach ($users_roles as $v) {
    		$rid = $v->rid;
    		$user_role_data_rids[] = $rid;
    	}
    	//获取所有的角色
    	$role_data = DB::table('roles')->get();
    	return view('admin.admin.role',['role_data'=>$role_data,'admin'=>$admin,'user_role_data_rids'=>$user_role_data_rids]);
    }
     /**
     * 修改管理员权限的逻辑
     *
     * @param  int  $id
     * @return \view
     */
    public function updatarole(Request $request,$aid){
    	//获取角色id
    	$rids = $request->input('rids');
    	//删除原来的角色
    	DB::table('users_roles')->where('aid',$aid)->delete();
    	foreach ($rids as $rid) {
    		$temp = [
    			'aid' => $aid,
    			'rid' => $rid
    		];
    		DB::table('users_roles')->insert($temp);
    	}
        $res = Admin::where('id',$aid)->update(['identify'=>$rids[0]]);
    	return redirect('/admin/admin')->with('success','添加成功');
    }
     /**
     * 删除管理员逻辑
     *
     * @param  int  $id
     * @return view
     */
    public function del($id){
        $res = Admin::where('id',$id)->delete();
        if ($res) {
            return redirect('/admin/admin')->with('success','添加成功');
        }else{
            return back()->with('eerror','失败');
        }
    }

}
