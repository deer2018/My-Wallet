<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category_02;

class CategoryController extends Controller
{
        // ดึงข้อมูลหมดวหมู่รายรับ
        public function getCategoryIncome()    
        {
            $transaction = Category_02::Where('type', '=', 'รายรับ')
            ->get();
            return $transaction;
        }
          // ดึงข้อมูลหมดวหมู่รายจ่าย
        public function getCategoryExpense()    
        {
            $transaction = Category_02::Where('type', '=', 'รายจ่าย')
            ->get();
            return $transaction;
        }
          // ดึงข้อมูลหมดวหมู่ทั้งหมด
        public function getCategory()    
        {
            $transaction = Category_02::get();
            
            return $transaction;
        }

}
