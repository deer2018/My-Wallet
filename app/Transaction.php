<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    protected $primaryKey = 'id';

    protected $fillable = ['status', 'category_id', 'category_type','value', 'comment', 'user_id'];

}
