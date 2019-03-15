<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	/**
     * 与模型关联的数据表
     * @var string
     */
    protected $table = 'users';

    /**
     * 与模型关联的主键
     * @var string
     */
    protected $primaryKey = 'uid';

    /**
     * 该模型是否被自动维护时间戳
     */
    public $timestamps = true;

    /**
     * 不可被批量赋值的属性
     * @var array
     */
    protected $guarded = [];

    /**
     * 链表数据
     * @var array
     */
    public function infos(){
    	return $this->hasOne('App\Model\Home\User_details','uid','uid');
    }
}
