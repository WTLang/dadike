<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class User_details extends Model
{
	/**
     * 与模型关联的数据表
     * @var string
     */
    protected $table = 'users_details';

    /**
     * 与模型关联的主键
     * @var string
     */
    protected $primaryKey = 'usds_id';

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
