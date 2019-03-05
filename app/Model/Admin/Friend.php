<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;


/*
|--------------------------------------------------------------------------
|           大迪克控制器->友情链接Model Friend
|--------------------------------------------------------------------------
 */
class Friend extends Model
{
    //
    /*定义的表
    定义的主键
    是否开启时间轴
    需要取出的数据或者去掉不要的数据*/
    public $table ="friend_link";


    /**
     * 与模型关联的主键
     *
     * @var string
     */
    protected $primaryKey = 'flk_id';

    
}



