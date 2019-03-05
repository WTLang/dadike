<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class User_details extends Model
{
    protected $table = 'users_details';

    protected $primaryKey = 'usds_id';

    public $timestamps = true;

    protected $guarded = [];
}
