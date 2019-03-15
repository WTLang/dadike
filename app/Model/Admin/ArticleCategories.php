<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

/*
|--------------------------------------------------------------------------
|           大迪克数据库库->文章分类管理表 article_categories_manage
|--------------------------------------------------------------------------
 */

class ArticleCategories extends Model
{
    /**
     * 与模型关联的数据表
     * @var string
     */
    protected $table = 'article_categories_manage';

    /**
     * 与模型关联的主键
     * @var string
     */
    protected $primaryKey = 'acm_id';

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
