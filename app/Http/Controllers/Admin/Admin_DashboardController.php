<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Transaction_02;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Http\Request;

class Admin_DashboardController extends Controller
{
    public function index(Request $request)
    {
            $year = $request->get('year');
            $month = $request->get('month');

        if(empty($year && $month)){
            $inc_my = Transaction_02::sum('income');
        }else{
            if(!empty($month)){
                $inc_my = Transaction_02::whereYear('created_at', '=', $year)
                ->whereMonth('created_at', '=', $month)
                ->sum('income');
            }
            else{
                $inc_my = Transaction_02::whereYear('created_at', '=', $year)
                ->sum('income');
            }
        }




        // if(!empty($month)){
        //     $inc_my = Transaction_02::whereYear('created_at', 'LIKE', $year)
        //     ->whereMonth('created_at', 'LIKE', $month)
        //     ->sum('income');
        // }elseif(!empty($year)){
        //     $inc_my = Transaction_02::whereYear('created_at', '=', $year)
        //     ->sum('income');
        // }
        // elseif(!empty($year && $month)){
        //         $inc_my = Transaction_02::whereYear('created_at', 'LIKE', $month)
        //         ->whereMonth('created_at', 'LIKE', $month)
        //         ->sum('income');
        // }else{
        //     $inc_my = Transaction_02::sum('income');
           
        // }


       //ผลรวมรายรับทั้งหมด
        $income = DB::table('transaction_02')
        ->sum('income');
       //ผลรวมรายจ่ายทั้งหมด
        $expense = DB::table('transaction_02')
        ->sum('expense');
        //รวมกลุ่ม Topic หมวดหมู่รายรับ
        $category_income = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
            ->where('category_type' ,'=', 'รายรับ')   
            ->select( DB::raw("sum('income') as total_income") ,'topic')
            ->groupBy('topic')
            ->get();
          //รวมกลุ่ม Topic หมวดหมู่รายจ่าย
        $category_expense = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
            ->where('category_type' ,'=', 'รายจ่าย')   
            ->select( DB::raw("sum('expense') as total_expense") ,'topic')
            ->groupBy('topic')
            ->get();
        
        $transaction_income = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id') 
            ->where('category_type' ,'=', 'รายรับ')   
            ->select( 'topic')
            ->groupBy('topic')
            ->get();

        $transaction_expense = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id') 
            ->where('category_type' ,'=', 'รายจ่าย')   
            ->select( 'topic')
            ->groupBy('topic')
            ->get();

        $group_income = DB::table('transaction_02')
            // ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
            ->select('category_id' , DB::raw('sum(income) as total_income'))
            ->groupBy('category_id')
            ->where('category_type' ,'=', 'รายรับ')
            ->get();

        $group_expense = DB::table('transaction_02')
            // ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
            ->select('category_id' , DB::raw('sum(expense) as total_expense'))
            ->groupBy('category_id')
            ->where('category_type' ,'=', 'รายจ่าย')
            ->get();

          //คำนวนรายรับ ประจำเดือน -จากเดือนปัจจุบัน
          $monthly_income = DB::table("transaction_02")
          ->whereMonth('created_at', Carbon::now()->month)
          ->whereYear('created_at', Carbon::now()->year)
          ->sum('income');
         //คำนวนรายจ่าย ประจำเดือน -จากเดือนปัจจุบัน
          $monthly_expense = DB::table("transaction_02")
          ->whereMonth('created_at', Carbon::now()->month)
          ->whereYear('created_at', Carbon::now()->year)
          ->sum('expense');


       
        return view('admin.dashboard',compact('income','expense','category_income','category_expense','group_income','group_expense','transaction_income','transaction_expense','year','month','inc_my'));
    }
}
