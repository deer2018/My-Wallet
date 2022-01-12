<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category_02;

class CategoryController extends Controller
{
        public function getCategoryIncome()    
        {
            $transaction = Category_02::Where('type', '=', 'รายรับ')
            ->get();
            return $transaction;
        }

        public function getCategoryExpense()    
        {
            $transaction = Category_02::Where('type', '=', 'รายจ่าย')
            ->get();
            return $transaction;
        }
}
