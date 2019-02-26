<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Index;

class IndexController extends Controller
{
    /**
     * 载入后台首页
     * @include 统计图
     */
    public function index()
    {
        $index = Index::find(1);

    	/**
    	 * 本站信息
    	 * @titile 大迪克
    	 */
    	$title = '大迪克';
    	return view('admin.index.index',[
            'title'=>$title,
            'index' => $index
        ]);
    }

    public function count()
    {
        /**
         * 网站标题
         * @titile 大迪克
         */
        $title = '大迪克';
        return view('admin.index.count');
    }

}
