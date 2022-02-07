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

        $date = Carbon::now();

        $thai_months = [
            1 => 'มกราคม',
            2 => 'กุมภาพันธ์',
            3 => 'มีนาคม',
            4 => 'เมษายน',
            5 => 'พฤศภาคม',
            6 => 'มิถุนายน',
            7 => 'กรกฎาคม',
            8 => 'สิงหาคม',
            9 => 'กันยายน',
            10 => 'ตุลาคม',
            11 => 'พฤศจิกายน',
            12 => 'ธันวาคม',
        ];

        // แปลงเลขเดือนเป็นชื่อเดือน
        $monthName = $thai_months[$date->month];
        // แปลงปีค.ศ. เป็น พ.ศ.
        $yearName = $date->format('Y') + 543;

        //คำนวนรายรับทั้งหมด
        $income = DB::table('transaction_02')
            ->where(array('user_id' => $user_id))
            ->sum('income');
        //คำนวนรายจ่ายทั้งหมด
        $expense = DB::table('transaction_02')
            ->where(array('user_id' => $user_id))
            ->sum('expense');

        //คำนวนรายรับ-จ่าย เดือนมกราคม จากปีปัจจุบัน 
        $jan_income = DB::table("transaction_02")
            ->where(array('user_id' => $user_id))
            ->whereMonth('created_at', '=', '01')
            ->whereYear('created_at', Carbon::parse($date)->year)
            ->sum('income');
        
        $jan_expense = DB::table("transaction_02")
            ->where(array('user_id' => $user_id))
            ->whereMonth('created_at', '=', '01')
            ->whereYear('created_at', Carbon::parse($date)->year)
            ->sum('expense');
        $jan_total = $jan_income - $jan_expense;


        $feb_income = DB::table("transaction_02")
            ->where(array('user_id' => $user_id))
            ->whereMonth('created_at', '=', '02')
            ->whereYear('created_at', Carbon::parse($date)->year)
            ->sum('income');
        
        $feb_expense = DB::table("transaction_02")
            ->where(array('user_id' => $user_id))
            ->whereMonth('created_at', '=', '0032')
            ->whereYear('created_at', Carbon::parse($date)->year)
            ->sum('expense');
        $feb_total = $jan_income - $jan_expense;

        $mar_income = DB::table("transaction_02")
            ->where(array('user_id' => $user_id))
            ->whereMonth('created_at', '=', '03')
            ->whereYear('created_at', Carbon::parse($date)->year)
            ->sum('income');
        
        $mar_expense = DB::table("transaction_02")
            ->where(array('user_id' => $user_id))
            ->whereMonth('created_at', '=', '03')
            ->whereYear('created_at', Carbon::parse($date)->year)
            ->sum('expense');
        $mar_total = $mar_income - $mar_expense;

        $apr_income = DB::table("transaction_02")
            ->where(array('user_id' => $user_id))
            ->whereMonth('created_at', '=', '04')
            ->whereYear('created_at', Carbon::parse($date)->year)
            ->sum('income');
        
        $apr_expense = DB::table("transaction_02")
            ->where(array('user_id' => $user_id))
            ->whereMonth('created_at', '=', '04')
            ->whereYear('created_at', Carbon::parse($date)->year)
            ->sum('expense');
        $apr_total = $apr_income - $apr_expense;

        $may_income = DB::table("transaction_02")
            ->where(array('user_id' => $user_id))
            ->whereMonth('created_at', '=', '05')
            ->whereYear('created_at', Carbon::parse($date)->year)
            ->sum('income');
        
        $may_expense = DB::table("transaction_02")
            ->where(array('user_id' => $user_id))
            ->whereMonth('created_at', '=', '05')
            ->whereYear('created_at', Carbon::parse($date)->year)
            ->sum('expense');
        $may_total = $may_income - $may_expense;

        $jun_income = DB::table("transaction_02")
            ->where(array('user_id' => $user_id))
            ->whereMonth('created_at', '=', '06')
            ->whereYear('created_at', Carbon::parse($date)->year)
            ->sum('income');
        
        $jun_expense = DB::table("transaction_02")
            ->where(array('user_id' => $user_id))
            ->whereMonth('created_at', '=', '06')
            ->whereYear('created_at', Carbon::parse($date)->year)
            ->sum('expense');
        $jun_total = $jun_income - $jun_expense;

        $jul_income = DB::table("transaction_02")
            ->where(array('user_id' => $user_id))
            ->whereMonth('created_at', '=', '07')
            ->whereYear('created_at', Carbon::parse($date)->year)
            ->sum('income');
        
        $jul_expense = DB::table("transaction_02")
            ->where(array('user_id' => $user_id))
            ->whereMonth('created_at', '=', '07')
            ->whereYear('created_at', Carbon::parse($date)->year)
            ->sum('expense');
        $jul_total = $jul_income - $jul_expense;

        $aug_income = DB::table("transaction_02")
            ->where(array('user_id' => $user_id))
            ->whereMonth('created_at', '=', '08')
            ->whereYear('created_at', Carbon::parse($date)->year)
            ->sum('income');
        
        $aug_expense = DB::table("transaction_02")
            ->where(array('user_id' => $user_id))
            ->whereMonth('created_at', '=', '08')
            ->whereYear('created_at', Carbon::parse($date)->year)
            ->sum('expense');
        $aug_total = $aug_income - $aug_expense;

        $sep_income = DB::table("transaction_02")
            ->where(array('user_id' => $user_id))
            ->whereMonth('created_at', '=', '09')
            ->whereYear('created_at', Carbon::parse($date)->year)
            ->sum('income');
        
        $sep_expense = DB::table("transaction_02")
            ->where(array('user_id' => $user_id))
            ->whereMonth('created_at', '=', '09')
            ->whereYear('created_at', Carbon::parse($date)->year)
            ->sum('expense');
        $sep_total = $sep_income - $sep_expense;

        $oct_income = DB::table("transaction_02")
            ->where(array('user_id' => $user_id))
            ->whereMonth('created_at', '=', '10')
            ->whereYear('created_at', Carbon::parse($date)->year)
            ->sum('income');
        
        $oct_expense = DB::table("transaction_02")
            ->where(array('user_id' => $user_id))
            ->whereMonth('created_at', '=', '10')
            ->whereYear('created_at', Carbon::parse($date)->year)
            ->sum('expense');
        $oct_total = $oct_income - $oct_expense;

        $nov_income = DB::table("transaction_02")
            ->where(array('user_id' => $user_id))
            ->whereMonth('created_at', '=', '11')
            ->whereYear('created_at', Carbon::parse($date)->year)
            ->sum('income');
        
        $nov_expense = DB::table("transaction_02")
            ->where(array('user_id' => $user_id))
            ->whereMonth('created_at', '=', '11')
            ->whereYear('created_at', Carbon::parse($date)->year)
            ->sum('expense');
        $nov_total = $nov_income - $nov_expense;

        $dec_income = DB::table("transaction_02")
            ->where(array('user_id' => $user_id))
            ->whereMonth('created_at', '=', '12')
            ->whereYear('created_at', Carbon::parse($date)->year)
            ->sum('income');
        
        $dec_expense = DB::table("transaction_02")
            ->where(array('user_id' => $user_id))
            ->whereMonth('created_at', '=', '12')
            ->whereYear('created_at', Carbon::parse($date)->year)
            ->sum('expense');
        $dec_total = $dec_income - $dec_expense;








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
        //     ->where('transaction_02.user_id', '=', $user_id)
        //     ->where('category_type', '=', 'รายจ่าย')
        //     ->select('topic')
        //     ->groupBy('topic')
        //     ->get();


        $group = DB::table('transaction_02')
            ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
            ->select('transaction_02.*','category_02.topic', DB::raw('sum(expense) as total'))
            ->groupBy('topic')
            ->where('transaction_02.user_id', '=', $user_id)
            ->where('transaction_02.category_type', '=', 'รายจ่าย')
            ->get();

        return view(
            'user.user_report.report',
            compact(
                'income',
                'expense',
                'monthly_income',
                'monthly_expense',
                'annual_income',
                'annual_expense',
                'group',
                'yearName',
                'monthName',
                'thai_months',
                'jan_income',
                'jan_expense',
                'jan_total',

                'feb_income',
                'feb_expense',
                'feb_total',

                'mar_income',
                'mar_expense',
                'mar_total',

                'apr_income',
                'apr_expense',
                'apr_total',

                'may_income',
                'may_expense',
                'may_total',

                'jun_income',
                'jun_expense',
                'jun_total',

                'jul_income',
                'jul_expense',
                'jul_total',

                'aug_income',
                'aug_expense',
                'aug_total',

                'sep_income',
                'sep_expense',
                'sep_total',

                'oct_income',
                'oct_expense',
                'oct_total',

                'nov_income',
                'nov_expense',
                'nov_total',

                'dec_income',
                'dec_expense',
                'dec_total',
            )
        );
    }




    public function donutChart()
    {
        $user_id = Auth::id();

        $donut_topic = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
            ->where('transaction_02.user_id', '=', $user_id)
            // ->select('transaction_02.*', 'category_02.topic')
            ->select('topic', DB::raw("COUNT('expense') as count"))
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
