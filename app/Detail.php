<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $table = 'detail_user';

    protected $primaryKey = 'id';

    protected $fillable = ['detail', 'user_id',];
}
