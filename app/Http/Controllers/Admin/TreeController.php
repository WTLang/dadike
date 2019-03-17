<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\Tree;
use DB;
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
         /* 页面显示条数 */
        $count = $request->input('count',7);

         /* 接收搜索信息 */
        $search = $request->input('search','');

        /* 模糊搜索 */
        $tree_data = Tree::where('us_name','like','%'.$search.'%')->orderBy('trd_id','desc')->paginate($count);

        /*加载视图*/
        return view('admin.tree.index',['tree_data'=>$tree_data,'request'=>$request->all()]);
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
        //
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
     * 删除树洞
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($trd_id)
    {
        /* 删除该id的数据 */
        $res = DB::table('tree_dong')->where('trd_id',$trd_id)->delete();
        if($res){
            return back();
        }else{
            return back();
        }
    }
}
