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
    /**
     * 与模型关联的数据表
     * @var string
     */
    public $table ="friend_link";


    /**
     * 与模型关联的主键
     * @var string
     */
    protected $primaryKey = 'flk_id';

    
}



