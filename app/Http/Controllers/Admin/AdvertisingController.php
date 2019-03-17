<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Advertising;
use DB;
use Storage;
/*
|--------------------------------------------------------------------------
|           大迪克控制器->广告控制器 AdvertisingController
|--------------------------------------------------------------------------
 */
class AdvertisingController extends Controller
{
    /**
     * 浏览广告
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /* 页面显示条数 */
        $count = $request->input('count',5);
        /* 接收搜索信息 */
        $search = $request->input('search','');
        /* 模糊搜索 */
        $data = Advertising::where('ad_name','like','%'.$search.'%')->paginate($count);
        /*加载视图*/
        return view('admin.advertising.index',['data'=>$data,'request'=>$request->all()]);
    }

    /**
     *  加载视图
     */
    public function create()
    {
        return view('admin.advertising.advertising_add');    
    }

    /**
     * 广告添加
     * @return bool
     */
    public function store(Request $request)
    {
        /*表单验证*/
        $this->validate($request,[
                'ad_name' => 'required',
                'ad_phone' => 'required|regex:/^1{1}[3-9]{1}[\d]{9}$/',
                'ad_people' => 'required',
                'ad_url' => 'required',
                'ad_image'=>'required',
        ],[
                'ad_name.required'=>'广告名称必填',
                'ad_phone.required'=>'联系电话必填',
                'ad_phone.regex'=>'联系电话格式不正确',
                'ad_url.required'=>'广告网址必填',
                'ad_people.required'=>'联系人必填',
                'ad_image.required'=>'广告图片未上传',

        ]);
        /* 设置文件字段名 */
        $img_file = $request->file('ad_image');
        /* 图片上传路径 */
        $img_res = $img_file->store('Backstage_images');
        /* 处理接收的数据 */
        $data = $request->except(['_token']);
        $data['ad_image']=$img_res;
        /* 添加数据 */
        $ad = new Advertising;
        $ad->ad_name = $data['ad_name'];
        $ad->ad_url = $data['ad_url']; 
        $ad->ad_status = $data['ad_status']; 
        $ad->ad_phone = $data['ad_phone']; 
        $ad->ad_people = $data['ad_people']; 
        $ad->ad_image = $data['ad_image'];
        /*执行添加*/
        $res = $ad->save();
        /* 判断添加 */
        if($res){
            return redirect('admin/advertising')->with('ad_success','添加成功');
        }else{
            return back()->with('ad_error','添加失败');
        }  
    }

    /**
     * 更新广告状态
     * @return bool
     */
    public function show($ad_id)
    {
        /*查找接收id的信息*/
        $data = DB::table('advertising_management')->where('ad_id',$ad_id)->get();
        /*改变查找id的状态*/
        $new_status = $data[0]->ad_status == 1 ? 0:1;
        $ad = Advertising::find($ad_id);
        $ad->ad_status = $new_status;
        /*更新数据*/
        $res = $ad->update();
        /*判断*/
        if($res){
            return redirect('admin/advertising');
                 return back();
        }else{
            return back();
        }
    }

    /**
     * 修改主表->接收数据
     * @return 加载视图
     */
    public function edit($ad_id)
    {
        /* 接收id，查找该id的所有数据 */
        $ad = DB::table('advertising_management')->where('ad_id',$ad_id)->get();
        /* 把数据遍历到视图中 */
        return view('admin.advertising.advertising_edit',['advertising'=>$ad[0]]);
    }

    /**
     * 修改主表->执行修改
     * @return bool
     */
    public function update(Request $request, $ad_id)
    {
        $this->validate($request,[
                'ad_name' => 'required',
                'ad_phone' => 'required|regex:/^1{1}[3-9]{1}[\d]{9}$/',
                'ad_people' => 'required',
                'ad_url' => 'required',
        ],[
                'ad_name.required'=>'广告名称必填',
                'ad_phone.required'=>'联系电话必填',
                'ad_phone.regex'=>'联系电话格式不正确',
                'ad_url.required'=>'广告网址必填',
                'ad_people.required'=>'联系人必填',

        ]);

        /* 获取文件对象 */
        $img_file = $request->file('ad_new_image');
        $new_data = DB::table('advertising_management')->where('ad_id',$ad_id)->get();
        $old_img_path= $new_data[0]->ad_image;
        /* 判断上传文件是否发生变化 */
        if ($img_file) {
            $img_res = $img_file->store('Backstage_images');
            /* 更新数据 */
            $ad = Advertising::find($ad_id);
            $ad->ad_name = $request->input('ad_name','');
            $ad->ad_image = $img_res;
            $ad->ad_url = $request->input('ad_url','');
            $ad->ad_people = $request->input('ad_people','');
            $ad->ad_phone = $request->input('ad_phone','');
            $ad->ad_status = $request->input('ad_status','');
            /* 执行修改 */
            $res = $ad->update();
            /* 判断修改 */
            if($res){
                /*判断成功后删除原来图片*/
                $del = Storage::disk('local');
                $ress = $del->delete($old_img_path);
                return redirect('admin/advertising')->with('success','修改成功');
            }else{
                return back()->with('error','修改失败');
            }
        }else{
            $new_data = DB::table('advertising_management')->where('ad_id',$ad_id)->get();
            /* 旧图的路径 */
            $old_img_path= $new_data[0]->ad_image;
            /* 更新数据 */
            $ad = Advertising::find($ad_id);
            $ad->ad_name = $request->input('ad_name','');
            $ad->ad_image = $old_img_path;
            $ad->ad_url = $request->input('ad_url','');
            $ad->ad_people = $request->input('ad_people','');
            $ad->ad_phone = $request->input('ad_phone','');
            $ad->ad_status = $request->input('ad_status','');
            /* 执行修改 */
            $res = $ad->update();
            /* 判断修改 */
            if($res){
                return redirect('admin/advertising')->with('success','修改成功');
            }else{
                return back()->with('error','修改失败');
            }
        }

    }

    /**
     * 执行删除
     * @return bool
     */
    public function destroy($ad_id)
    {
        /* 删除该id的数据 */
        $res = DB::table('advertising_management')->where('ad_id',$ad_id)->delete();
        /* 判断删除 */
        if($res){
           return redirect($_SERVER['HTTP_REFERER'])->with('success','删除成功'); 
       }else{
        return redirect($_SERVER['HTTP_REFERER'])->with('error','删除失败');
       }
    }
}
