<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * 载入后台首页
     * @include 统计图
     */
    public function index()
    {
    	/**
    	 * 网站标题
    	 * @titile 大迪克
    	 */
    	$title = '大迪克';
    	return view('admin.index.index',['title'=>$title]);
    }

}
