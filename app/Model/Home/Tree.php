<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

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

    protected $guarded = [];
}
