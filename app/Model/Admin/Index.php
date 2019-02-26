<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Model\Admin\Index;
class Index extends Model
{
    //
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'web';

    //
    /**
     * 与模型关联的主键
     *
     * @var string
     */
    protected $primaryKey = 'web_id';

    /**
     * 该模型是否被自动维护时间戳
     *
     * @var bool
     */
    public $timestamps = false;

    // protected $fillable = ['需要的键_1','需要的键_2'....]  只取需要的键值
    
    // protected $guarded = ['不需要的键_1','不需要的键_2'....]去掉不需要的键值(什么都不填就是取全部的值)
    
    /**
     * 不可被批量赋值的属性
     *
     * @var array
     */
    protected $guarded = ['web_id'];
}