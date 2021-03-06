<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

/*
|--------------------------------------------------------------------------
|           大迪克数据库库->文章管理表 article_manage
|--------------------------------------------------------------------------
 */
class ArticleManage extends Model
{
    /**
     * 与模型关联的数据表
     * @var string
     */
    protected $table = 'article_manage';

    /**
     * 与模型关联的主键
     * @var string
     */
    protected $primaryKey = 'am_id';

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
