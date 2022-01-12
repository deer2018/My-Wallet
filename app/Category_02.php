<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category_02 extends Model
{
    protected $table = 'category_02';

    protected $primaryKey = 'category_id';

    protected $fillable = ['type', 'topic', 'user_id'];
}
