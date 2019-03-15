<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Friend;
use App\Http\Requests\FriendStoreRequest;
use DB;
/*
|--------------------------------------------------------------------------
|           大迪克控制器->友情链接控制器 FriendController
|--------------------------------------------------------------------------
 */

class FriendController extends Controller
{
    /**
     * 友情链接->首页.
     * @return 加载视图
     */
    public function index(Request $request)
    {
        /* 页面显示条数 */
        $count = $request->input('count',7);
        /* 接收搜索信息 */
        $search = $request->input('search','');
        /* 模糊搜索 */
        $data = Friend::where('flk_name','like','%'.$search.'%')->paginate($count);
        /*加载视图*/
         return view('admin.friend.index',['data'=>$data,'request'=>$request->all()]);
    }

    /**
     * @return 加载视图.
     */
    public function create()
    {
        return view('admin.friend.friend_add');
    }

    /**
     * 添加数据库
     * @return bool
     */
    public function store(FriendStoreRequest $request)
    {
        /* 处理接收的数据 */
        $data = $request->except(['_token']);
        $friends = new Friend;
        $friends->flk_name = $data['flk_name'];
        $friends->flk_image = $data['flk_image'];
        $friends->flk_url = $data['flk_url'];
        $friends->flk_email = $data['flk_email'];
        $friends->flk_depict = $data['flk_depict'];
        $friends->flk_status = $data['flk_status'];
        /* 执行添加 */
        $res = $friends->save();
        /* 判断添加 */
        if($res)
        {
            return redirect('admin/friend')->with('success','添加成功');
        }else
        {
            return back()->with('error','添加失败');
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
        
    }

    /**
     * 修改主表->接收数据
     * @return 加载视图
     */
    public function edit($flk_id)
    {
        /* 接收id，查找该id的所有数据 */
        $friend = DB::table('friend_link')->where('flk_id',$flk_id)->get();
        /* 把数据遍历到视图中 */
        return view('admin.friend.friend_edit',['friend'=>$friend[0]]);
        
    }

    /**
     * 修改主表->执行修改
     * @return bool
     */
    public function update(FriendStoreRequest $request, $flk_id)
    {
        $friend = Friend::find($flk_id);
        $friend->flk_name = $request->input('flk_name','');
        $friend->flk_image = $request->input('flk_image','');
        $friend->flk_url = $request->input('flk_url','');
        $friend->flk_email = $request->input('flk_email','');
        $friend->flk_depict = $request->input('flk_depict','');
        $friend->flk_status = $request->input('flk_status','');
        /* 执行修改 */
        $res = $friend->update();
        /* 判断修改 */
        if($res){
            return redirect('admin/friend?')->with('success','修改成功');
        }else{
            DB::rollBack();
            return back()->with('error','修改失败');
        }

    }

    /**
     * 执行删除
     * @return bool
     */
    public function destroy($flk_id)
    {
        /* 删除该id的数据 */
        $res = DB::table('friend_link')->where('flk_id',$flk_id)->delete();
        /* 判断删除 */
        if($res){
           return redirect($_SERVER['HTTP_REFERER'])->with('success','删除成功'); 
       }else{
        return redirect($_SERVER['HTTP_REFERER'])->with('error','删除失败');
       }
    }
    
}
