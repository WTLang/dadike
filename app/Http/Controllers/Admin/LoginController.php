<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Admin;
use Hash;
use DB;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.login.login');
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
        $this->validate($request ,[
            'admin_name' => 'required',
            'admin_password' => 'required',
        ],[
            'admin_name.required' => '管理员名称必填',
            'admin_password.required' => '密码必填' 
        ]);

        $data = $request->except(['_token']);
        //从数据库去出数据
        $res = DB::table('Admin')->where('admin_name', $data['admin_name'])->first();
        if ($res) {
            if (Hash::check($data['admin_password'],$res->admin_password)) {
                //登录成功把用户名写入session
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

    public function logout(Request $request){
        //删除session里的用户
        session()->pull('admin_name');
        return redirect('/admin/login');
    }
}
