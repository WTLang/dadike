<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\User;    
use App\Model\Home\User_details;
use DB;
use SESSION;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $uid = session()->get('uid');
        $userdata = User::with('infos')->where('uid', $uid)->first();
        // dd($userdata);
        // dump($res->uname);//这是选择主表的
        // dump($res['infos']->qq);//这是选辅表的
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except(['_token','code','reus_password']);
        //组合数组来存进数据库
        $data['uid'] = $request->session()->get('uid');
        //获取上传的文件
        $img_file = $request->file('usds_head');
        //将该文件设置为
        if ($img_file) {
            $img_res = $img_file->store('Reception_images');
            $data['usds_head'] = $img_res;
        }
        // dd($data);
        $res = User_details::create($data);
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
        dump(123);
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

    public function addinfo(Request $request)
    {
        dump($request->all());
    }
}
