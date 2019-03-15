<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\AboutUs;


/*
|--------------------------------------------------------------------------
|           大迪克控制器->前台->联系我们 控制器(收集用户问题)
|--------------------------------------------------------------------------
 */
class AboutUsController extends Controller
{
	/**
	 * 加载前台->联系我们
	 * @return 视图
	 */
    public function index()
    {   
    	return view('home.aboutus.index');
    }

    /**
     * 接受会员发过来的数据
     * @return [type] [description]
     */
    public function store(Request $request)
    {
    	/* 文章内容验证 */
        if (($request->about_name != null)&&($request->about_phone != null)&&($request->about_email != null)&&($request->about_message != null)) {
            $about_data = $request->except(['_token']);
            /* 添加数据 */
            $aboutus = new AboutUs;
            $aboutus->au_name = $request->about_name;
            $aboutus->au_phone = $request->about_phone;
            $aboutus->au_email = $request->about_email;
            $aboutus->au_message = $request->about_message;
            $aboutus->au_status = 1;
            /* 判断 */
            if ($aboutus->save()) {
            return redirect('aboutus')->with('aboutus_success','发送成功,我们会尽快处理您的问题');
            }
        }else{
            return back()->with('aboutus_error','发送失败,有内容为空');
        }
    }
}
