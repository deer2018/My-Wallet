<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction_02 extends Model
{
    protected $table = 'transaction_02';

    protected $primaryKey = 'id';

    protected $fillable = ['category_id', 'category_type','income','expense', 'comment', 'user_id'];

}
