<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Transaction_02;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use App\User;
use Illuminate\Http\Request;

class Admin_User_ReportController extends Controller
{
    public function report($id)
    {
       
        $user_id = User::findOrFail($id);
      

        $income = DB::table('transaction_02')
        ->where(array('user_id' => $user_id->id))
        ->sum('income');

        $expense = DB::table('transaction_02')
        ->where(array('user_id' => $user_id->id))
        ->sum('expense');


        //คำนวนรายรับ ประจำเดือน -จากเดือนปัจจุบัน
        $monthly_income = DB::table("transaction_02")
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('income');
        //คำนวนรายจ่าย ประจำเดือน -จากเดือนปัจจุบัน
        $monthly_expense = DB::table("transaction_02")
            ->where(array('user_id' => $user_id->id))
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('expense');

        //คำนวนรายรับ ประจำปี -จากปีปัจจุบัน
        $annual_income = DB::table("transaction_02")
            ->where(array('user_id' => $user_id->id))
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('income');
        //คำนวนรายจ่าย ประจำปี -จากปีปัจจุบัน
        $annual_expense = DB::table("transaction_02")
            ->where(array('user_id' => $user_id->id))
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('expense');
        
        $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
            ->where('transaction_02.user_id' ,'=', $user_id->id )
            ->where('category_type' ,'=', 'รายจ่าย')   
            ->select( 'topic')
            ->groupBy('topic')
            ->get();

        $group = DB::table('transaction_02')
        // ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
        ->select('category_id' , DB::raw('sum(expense) as total'))
        ->groupBy('category_id')
        ->where('user_id' ,'=', $user_id->id )
        ->where('category_type' ,'=', 'รายจ่าย')
        ->get();
    
        // $transaction = Transaction_02::latest();   
        
        return view('admin.admin_user.admin_user_report',compact('income','expense','monthly_income','monthly_expense','annual_income','annual_expense','transaction','user_id','group'));
    }
}
