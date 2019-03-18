<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class NodesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $nodes_data = DB::table('nodes')->get();
        $roles_data = DB::table('roles')->get();
        return view('admin.power.admin',['nodes_data'=>$nodes_data,'roles_data'=>$roles_data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.power.rolesadd');
    }

    /**
     * 添加角色表
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->except(['_token']);
        $res = DB::table('roles')->insert($data);
        if ($res) {
            return redirect('admin/nodes')->with('asuccess','添加成功');
        }else{
            return back()->with('aerror','添加失败');
        }
    }

    public function insert(Request $request){
        $data = $request->except(['_token']);
        //将控制器名拼接一下和变成小写
        $data['cname'] = strtolower($data['cname']).'controller';
        $data['aname'] = strtolower($data['aname']);
        $res = DB::table('nodes')->insert($data);
        if ($res) {
            return redirect('admin/nodes')->with('asuccess','添加成功');
        }else{
            return back()->with('aerror','添加失败');
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
        //获取当前角色的名称
        $role = DB::table('roles')->where('id',$id)->first();
        //获取所有的权限节点
        $nodes_data = DB::table('nodes')->get();
        //获取当前角色的权限节点id
        $role_nodes_data = DB::table('roles_nodes')->where('rid',$id)->select('nid')->get();
        $role_nodes_data_nid = [];
        foreach ($role_nodes_data as $key => $value) {
            $role_nodes_data_nid[] = $value->nid;
        }
        return view('admin.power.edit',['role'=>$role,'nodes_data'=>$nodes_data,'role_nodes_data_nid'=>$role_nodes_data_nid]);
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
        //接受传过来的权限节点
        $nids = $request->input('nids');
        //删除原来对应的角色
        DB::table('roles_nodes')->where('rid',$id)->delete();

        foreach ($nids as $key => $nid) {
            $temp = [
                'rid' => $id,
                'nid' => $nid
            ];
            DB::table('roles_nodes')->insert($temp);
        }
        return redirect('admin/nodes')->with('esuccess','修改成功');
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

    public function nodeadd(){
        return view('admin.power.nodeadd');
    }

}
