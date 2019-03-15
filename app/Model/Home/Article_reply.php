<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class Article_reply extends Model
{
	/**
     * 与模型关联的数据表
     * @var string
     */
    protected $table = 'article_reply';

    /**
     * 与模型关联的主键
     * @var string
     */
    protected $primaryKey = 'acr_id';

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
