<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

/*
|--------------------------------------------------------------------------
|                             大迪克库->网站管理表 web
|--------------------------------------------------------------------------
 */

class Index extends Model
{
    /**
     * 与模型关联的数据表
     * @var string
     */
    protected $table = 'web';

    /**
     * 与模型关联的主键
     * @var string
     */
    protected $primaryKey = 'web_id';

    /**
     * 该模型是否被自动维护时间戳
     * @var bool
     */
    public $timestamps = false;

    /**
     * 不可被批量赋值的属性
     * @var array
     */
    protected $guarded = ['web_id'];
}
