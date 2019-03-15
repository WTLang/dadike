<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

/*
|--------------------------------------------------------------------------
|           大迪克控制器->数据库 用户模型
|--------------------------------------------------------------------------
 */
class Admin extends Model
{
	/**
     * 与模型关联的数据表
     * @var string
     */
    protected $table = 'admin';

    /**
     * 与模型关联的主键
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * 该模型是否被自动维护时间戳
     */
    public $timestamps = true;

    /**
     * 不可被批量赋值的属性
     * @var array
     */
    protected $guarded = [];

}
