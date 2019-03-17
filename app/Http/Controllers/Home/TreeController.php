<?php

namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\Tree;
use App\Model\Home\User_details;
use DB;
use SESSION;
/*
|--------------------------------------------------------------------------
|           大迪克控制器->树洞控制器 TreeController
|--------------------------------------------------------------------------
 */
class TreeController extends Controller
{
    /**
     *
     * @return 加载视图
     */
    public function index(Request $request)
    {
        
        /*连接树洞表*/
        $tree_data = Tree::orderBy('trd_id','desc')->paginate(5);
        // dump($tree_data[0]);   

        /*加载视图*/
        return view('home.tree.tree_add',['tree_data'=>$tree_data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * 发表树洞
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
                'trd_content' => 'required',
        ],[
                'trd_content.required'=>'内容不能为空!!!',
        ]);

        /*接收树洞内容信息*/
        $new_content = $request->all();

        /*获取当前session*/
        $data_user = $request->session()->all();

        /*拼接用户表字段*/
        $data_details = User_details::where('uid',$data_user['uid'])->get();

        /* 添加数据 */
        $tree = new Tree;
        $tree->trd_content = $new_content['trd_content'];
        $tree->trd_good = $new_content['trd_good'];
        $tree->trd_bad = $new_content['trd_bad'];
        $tree->uid = $data_user['uid'];
        $tree->us_name = $data_user['us_name'];
        $tree->usds_head = $data_details[0]['usds_head'];
        $tree->usds_id = $data_details[0]['usds_id'];
        if ($tree->save()) {
           return redirect('/tree')->with('success','添加成功');
        }else{
           return back()->with('error','添加失败');
        }
    }

    /**
     * 查看我的发表
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        /*获取当前session*/
        $data_user = $request->session()->all();
        $uid = $data_user['uid'];
        /*连接树洞表*/
        $tree_data = Tree::where('uid',$uid)->orderBy('trd_id','desc')->paginate(5);
        /*加载视图*/
        return view('home.tree.tree_presonal',['tree_data'=>$tree_data]);
    }

    /**
     * 树洞点赞
     * @return \Illuminate\Http\Response
     */
    public function zan($id,$goods)
    {
        /*判断用户*/
        if(session()->has('uid')){
            /*是用户就获取用户id*/
           $res['uid'] = session('uid');
        }else{
            /*不是就获取本地ip地址*/
             $res['uid'] = $_SERVER['REMOTE_ADDR'];
        }
        $res['trd_id'] = $id;
        /*查询like表有没有记录*/
        $list = Db::table('like')->where($res)->get();
        /*判断是否点赞*/
        if(isset($list[0])){
            /*点过就返回1*/
            return 1;
        }else{
            /*查找点赞表状态为1的用户*/
            $res['trd_status'] = 1;
            $list_trd = Db::table('like')->insert($res);
            /*点赞表状态为1则到树洞表点赞字段加1*/
            if($list_trd){
                Db::select("update tree_dong set  trd_good = trd_good + 1 where trd_id = ".$id);
                $trd_goods['trd_good'] = DB::select("select trd_good from tree_dong where trd_id = ".$id);
            }
            return $trd_goods;
        }
    }

    /**
     * 树洞踩赞
     * @return \Illuminate\Http\Response
     */
    public function cai($id,$bad)
    {
        /*判断用户*/
        if(session()->has('uid')){
            /*是用户就获取用户id*/
            $res['uid'] = session('uid');
        }else{
             /*不是就获取本地ip地址*/
            $res['uid'] = $_SERVER['REMOTE_ADDR'];
        }
        $res['trd_id'] = $id;
        /*查询like表有没有记录*/
        $list = Db::table('like')->where($res)->get();
        /*判断是否点赞*/
        if(isset($list[0])){
            /*点过就返回1*/
            return 1;
        }else{
            /*查找点赞表状态为0的用户*/
            $res['trd_status'] = 0;
            $list_trd = Db::table('like')->insert($res);
            /*点赞表状态为0则到树洞表踩赞字段加1*/
            if($list_trd){
                Db::select("update tree_dong set  trd_bad = trd_bad + 1 where trd_id = ".$id);
                $trd_bad['trd_bad'] = DB::select("select trd_bad from tree_dong where trd_id = ".$id);
            }
            return $trd_bad;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($trd_id)
    {
        /* 删除该id的数据 */
        $res = DB::table('tree_dong')->where('trd_id',$trd_id)->delete();
        if($res){
            return back()->with('success','删除成功');
        }else{
            return back();
        }
    }
}
