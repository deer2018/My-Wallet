<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction_02 extends Model
{
    protected $table = 'transaction_02';

    protected $primaryKey = 'id';

    protected $fillable = ['category_id', 'category_type','income','expense', 'comment', 'user_id'];

    // public function category_02(){
    //     return $this->hasMany('App\Category_02','category_id')->selectRaw('category_02.*,sum(expense) as total')->groupBy('topic');
    //  }

}
