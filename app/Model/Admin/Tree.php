<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
/*
|--------------------------------------------------------------------------
|           大迪克控制器->树洞管理Model Tree
|--------------------------------------------------------------------------
 */
class Tree extends Model
{
    /*定义的表*/
    public $table = "tree_dong";

    /**
     * 与模型关联的主键
     *
     * @var string
     */
    protected $primaryKey = 'trd_id';

    /**
     * 该模型是否被自动维护时间戳
     */
    public $timestamps = false;

}
