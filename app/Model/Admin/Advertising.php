<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

/*
|--------------------------------------------------------------------------
|           大迪克控制器->广告Model Advertising
|--------------------------------------------------------------------------
 */

class Advertising extends Model
{
    /**
     * 与模型关联的数据表
     * @var string
     */
    public $table = "advertising_management";

    /**
     * 与模型关联的主键
     * @var string
     */
    protected $primaryKey = 'ad_id';

    /**
     * 该模型是否被自动维护时间戳
     */
    public $timestamps = false;

    /**
     * 不可被批量赋值的属性
     * @var array
     */
    protected $guarded = [];
}
