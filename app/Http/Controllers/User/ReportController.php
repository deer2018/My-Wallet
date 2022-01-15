<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Transaction_02;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
   
    public function index()
    {
        $user_id = Auth::id();

        $income = DB::table('transaction_02')
        ->where(array('user_id' => $user_id))
        ->sum('income');

        $expense = DB::table('transaction_02')
        ->where(array('user_id' => $user_id))
        ->sum('expense');


        //คำนวนรายรับ ประจำเดือน -จากเดือนปัจจุบัน
        $monthly_income = DB::table("transaction_02")
            ->where(array('user_id' => $user_id))
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('income');
        //คำนวนรายจ่าย ประจำเดือน -จากเดือนปัจจุบัน
        $monthly_expense = DB::table("transaction_02")
            ->where(array('user_id' => $user_id))
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('expense');

        //คำนวนรายรับ ประจำปี -จากปีปัจจุบัน
        $annual_income = DB::table("transaction_02")
            ->where(array('user_id' => $user_id))
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('income');
        //คำนวนรายจ่าย ประจำปี -จากปีปัจจุบัน
        $annual_expense = DB::table("transaction_02")
            ->where(array('user_id' => $user_id))
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('expense');
        
        // $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
        //     ->where('transaction_02.user_id' ,'=', $user_id)  
        //     ->select('transaction_02.*', 'category_02.topic')
        //     ->latest(); 
        
        $transaction = Transaction_02::latest();   
        
        return view('user.user_report.report',compact('income','expense','monthly_income','monthly_expense','annual_income','annual_expense','transaction'));
    }

    public function donutChart()
    {
        $user_id = Auth::id();

        $donut_topic = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id' ,'=', $user_id)  
                ->select('transaction_02.*', 'category_02.topic')
                ->select('topic', DB::raw("COUNT('id') as count"))
                ->groupBy('topic')
                ->get();

        return view('user.user_report.chart', compact('donut_topic'));
    }

    // public function chart()
    // {
    //     $user_id = Auth::id();
    //     $year = ['2015','2016','2017','2018','2019','2020'];

    //     $expense = [];
    //     foreach ($year as $key => $value) {
    //         $expense[] = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
    //         ->where('transaction_02.user_id' ,'=', $user_id)  
    //         ->select('transaction_02.*', 'category_02.topic')
    //         ->where(\DB::rawraw("COUNT('id') as count"),$value)->count();
    //     }

    // 	return view('user.user_report.report',compact('year'))->with('year',json_encode($year,JSON_NUMERIC_CHECK))->with('expense',json_encode($expense,JSON_NUMERIC_CHECK));
    // }

   
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

  
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
