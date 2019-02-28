<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    protected $primaryKey = 'uid';

    public $timestamps = true;

    protected $guarded = [];

    public function infos(){
    	return $this->hasOne('App\Model\Admin\Userinfo','uid');
    }
}
