<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transaction_02;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Report_expenseController extends Controller
{

    public function jan_expense(Request $request, $select_year)
    {
        $user_id = Auth::id();
        $perPage = 50;
        $date = Carbon::now();
        $select = $request->get('category_topic');

        // แปลงเลขเดือนเป็นชื่อเดือน
        $monthName = 'มกราคม';
        // แปลงปีค.ศ. เป็น พ.ศ.
        $yearName = $select_year + 543;


        if (!empty($select)) {
            //ข้อมูลรายจ่ายเดือน 1 จากปีที่เลือก -> เรียงจากวันที่
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->select('transaction_02.*', 'category_02.topic')
                ->where('category_02.topic', '=', $select)
                ->whereMonth('transaction_02.created_at', '=', '01')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);

            // รายจ่ายตามหมวดหมู่ของผู้ใช้
            $expense_cate = DB::table('transaction_02')
                ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->select('transaction_02.*', 'category_02.topic', DB::raw('sum(expense) as total_expense'))
                ->groupBy('topic')
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('category_02.topic', '=', $select)
                ->whereMonth('transaction_02.created_at', '=', '01')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->get();

            //ผลรวมรายจ่ายตามเดือนและปีที่เลือก
            $expense_total = DB::table("transaction_02")
                ->where(array('user_id' => $user_id))
                ->whereMonth('created_at', '=', '01')
                ->whereYear('created_at', '=', $select_year)
                ->sum('expense');
        } else {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->select('transaction_02.*', 'category_02.topic')
                ->whereMonth('transaction_02.created_at', '=', '01')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);

            // รายจ่ายตามหมวดหมู่ของผู้ใช้
            $expense_cate = DB::table('transaction_02')
                ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->select('transaction_02.*', 'category_02.topic', DB::raw('sum(expense) as total_expense'))
                ->groupBy('topic')
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->where('transaction_02.user_id', '=', $user_id)
                ->whereMonth('transaction_02.created_at', '=', '01')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->get();

            //ผลรวมรายจ่ายตามเดือนและปีที่เลือก
            $expense_total = DB::table("transaction_02")
                ->where(array('user_id' => $user_id))
                ->whereMonth('created_at', '=', '01')
                ->whereYear('created_at', '=', $select_year)
                ->sum('expense');
        }


        return view('user.user_report.report_sub.expense.01_expense', compact('transaction', 'monthName', 'yearName', 'select', 'select_year', 'expense_cate', 'expense_total',));
    }

    public function feb_expense(Request $request, $select_year)
    {
        $user_id = Auth::id();
        $perPage = 50;
        $date = Carbon::now();
        $select = $request->get('category_topic');


        // แปลงเลขเดือนเป็นชื่อเดือน
        $monthName = 'กุมภาพันธ์';
        // แปลงปีค.ศ. เป็น พ.ศ.
        $yearName = $select_year + 543;

        if (!empty($select)) {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->select('transaction_02.*', 'category_02.topic')
                ->where('category_02.topic', '=', $select)
                ->whereMonth('transaction_02.created_at', '=', '02')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);

            // รายจ่ายตามหมวดหมู่ของผู้ใช้
            $expense_cate = DB::table('transaction_02')
                ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->select('transaction_02.*', 'category_02.topic', DB::raw('sum(expense) as total_expense'))
                ->groupBy('topic')
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('category_02.topic', '=', $select)
                ->whereMonth('transaction_02.created_at', '=', '02')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->get();

            //ผลรวมรายจ่ายตามเดือนและปีที่เลือก
            $expense_total = DB::table("transaction_02")
                ->where(array('user_id' => $user_id))
                ->whereMonth('created_at', '=', '02')
                ->whereYear('created_at', '=', $select_year)
                ->sum('expense');
        } else {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->select('transaction_02.*', 'category_02.topic')
                ->whereMonth('transaction_02.created_at', '=', '02')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);

            $expense_cate = DB::table('transaction_02')
                ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->select('transaction_02.*', 'category_02.topic', DB::raw('sum(expense) as total_expense'))
                ->groupBy('topic')
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->where('transaction_02.user_id', '=', $user_id)
                ->whereMonth('transaction_02.created_at', '=', '02')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->get();

            //ผลรวมรายจ่ายตามเดือนและปีที่เลือก
            $expense_total = DB::table("transaction_02")
                ->where(array('user_id' => $user_id))
                ->whereMonth('created_at', '=', '02')
                ->whereYear('created_at', '=', $select_year)
                ->sum('expense');
        }

        return view('user.user_report.report_sub.expense.02_expense', compact('transaction', 'monthName', 'yearName', 'select', 'select_year', 'expense_cate', 'expense_total',));
    }

    public function mar_expense(Request $request, $select_year)
    {
        $user_id = Auth::id();
        $perPage = 50;
        $date = Carbon::now();
        $select = $request->get('category_topic');
        // แปลงเลขเดือนเป็นชื่อเดือน
        $monthName = 'มีนาคม';
        // แปลงปีค.ศ. เป็น พ.ศ.
        $yearName = $select_year + 543;

        if (!empty($select)) {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->select('transaction_02.*', 'category_02.topic')
                ->where('category_02.topic', '=', $select)
                ->whereMonth('transaction_02.created_at', '=', '03')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);

            // รายจ่ายตามหมวดหมู่ของผู้ใช้
            $expense_cate = DB::table('transaction_02')
                ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->select('transaction_02.*', 'category_02.topic', DB::raw('sum(expense) as total_expense'),)
                ->groupBy('topic')
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('category_02.topic', '=', $select)
                ->whereMonth('transaction_02.created_at', '=', '03')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->get();

            //ผลรวมรายจ่ายตามเดือนและปีที่เลือก
            $expense_total = DB::table("transaction_02")
                ->where(array('user_id' => $user_id))
                ->whereMonth('created_at', '=', '03')
                ->whereYear('created_at', '=', $select_year)
                ->sum('expense');
        } else {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->select('transaction_02.*', 'category_02.topic')
                ->whereMonth('transaction_02.created_at', '=', '03')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);

            // รายจ่ายตามหมวดหมู่ของผู้ใช้
            $expense_cate = DB::table('transaction_02')
                ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->select('transaction_02.*', 'category_02.topic', DB::raw('sum(expense) as total_expense'))
                ->groupBy('topic')
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->where('transaction_02.user_id', '=', $user_id)
                ->whereMonth('transaction_02.created_at', '=', '03')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->get();

            //ผลรวมรายจ่ายตามเดือนและปีที่เลือก
            $expense_total = DB::table("transaction_02")
                ->where(array('user_id' => $user_id))
                ->whereMonth('created_at', '=', '03')
                ->whereYear('created_at', '=', $select_year)
                ->sum('expense');
        }

        return view('user.user_report.report_sub.expense.03_expense', compact('transaction', 'monthName', 'yearName', 'select', 'select_year', 'expense_cate', 'expense_total'));
    }

    public function apr_expense(Request $request, $select_year)
    {
        $user_id = Auth::id();
        $perPage = 50;
        $date = Carbon::now();
        $select = $request->get('category_topic');
        // แปลงเลขเดือนเป็นชื่อเดือน
        $monthName = 'เมษายน';
        // แปลงปีค.ศ. เป็น พ.ศ.
        $yearName = $select_year + 543;

        if (!empty($select)) {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->select('transaction_02.*', 'category_02.topic')
                ->where('category_02.topic', '=', $select)
                ->whereMonth('transaction_02.created_at', '=', '04')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);

            // รายจ่ายตามหมวดหมู่ของผู้ใช้
            $expense_cate = DB::table('transaction_02')
                ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->select('transaction_02.*', 'category_02.topic', DB::raw('sum(expense) as total_expense'),)
                ->groupBy('topic')
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('category_02.topic', '=', $select)
                ->whereMonth('transaction_02.created_at', '=', '04')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->get();

            //ผลรวมรายจ่ายตามเดือนและปีที่เลือก
            $expense_total = DB::table("transaction_02")
                ->where(array('user_id' => $user_id))
                ->whereMonth('created_at', '=', '04')
                ->whereYear('created_at', '=', $select_year)
                ->sum('expense');
        } else {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->select('transaction_02.*', 'category_02.topic')
                ->whereMonth('transaction_02.created_at', '=', '04')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);

            // รายจ่ายตามหมวดหมู่ของผู้ใช้
            $expense_cate = DB::table('transaction_02')
                ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->select('transaction_02.*', 'category_02.topic', DB::raw('sum(expense) as total_expense'))
                ->groupBy('topic')
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->where('transaction_02.user_id', '=', $user_id)
                ->whereMonth('transaction_02.created_at', '=', '04')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->get();

            //ผลรวมรายจ่ายตามเดือนและปีที่เลือก
            $expense_total = DB::table("transaction_02")
                ->where(array('user_id' => $user_id))
                ->whereMonth('created_at', '=', '04')
                ->whereYear('created_at', '=', $select_year)
                ->sum('expense');
        }

        return view('user.user_report.report_sub.expense.04_expense', compact('transaction', 'monthName', 'yearName', 'select', 'select_year', 'expense_cate', 'expense_total'));
    }

    public function may_expense(Request $request, $select_year)
    {
        $user_id = Auth::id();
        $perPage = 50;
        $date = Carbon::now();
        $select = $request->get('category_topic');
        // แปลงเลขเดือนเป็นชื่อเดือน
        $monthName = 'พฤษภาคม';
        // แปลงปีค.ศ. เป็น พ.ศ.
        $yearName = $select_year + 543;

        if (!empty($select)) {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->select('transaction_02.*', 'category_02.topic')
                ->where('category_02.topic', '=', $select)
                ->whereMonth('transaction_02.created_at', '=', '05')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);

            // รายจ่ายตามหมวดหมู่ของผู้ใช้
            $expense_cate = DB::table('transaction_02')
                ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->select('transaction_02.*', 'category_02.topic', DB::raw('sum(expense) as total_expense'),)
                ->groupBy('topic')
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('category_02.topic', '=', $select)
                ->whereMonth('transaction_02.created_at', '=', '05')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->get();

            //ผลรวมรายจ่ายตามเดือนและปีที่เลือก
            $expense_total = DB::table("transaction_02")
                ->where(array('user_id' => $user_id))
                ->whereMonth('created_at', '=', '05')
                ->whereYear('created_at', '=', $select_year)
                ->sum('expense');
        } else {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->select('transaction_02.*', 'category_02.topic')
                ->whereMonth('transaction_02.created_at', '=', '05')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);

            // รายจ่ายตามหมวดหมู่ของผู้ใช้
            $expense_cate = DB::table('transaction_02')
                ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->select('transaction_02.*', 'category_02.topic', DB::raw('sum(expense) as total_expense'))
                ->groupBy('topic')
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->where('transaction_02.user_id', '=', $user_id)
                ->whereMonth('transaction_02.created_at', '=', '05')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->get();

            //ผลรวมรายจ่ายตามเดือนและปีที่เลือก
            $expense_total = DB::table("transaction_02")
                ->where(array('user_id' => $user_id))
                ->whereMonth('created_at', '=', '05')
                ->whereYear('created_at', '=', $select_year)
                ->sum('expense');
        }
        return view('user.user_report.report_sub.expense.05_expense', compact('transaction', 'monthName', 'yearName', 'select', 'select_year', 'expense_cate', 'expense_total'));
    }

    public function jun_expense(Request $request, $select_year)
    {
        $user_id = Auth::id();
        $perPage = 50;
        $date = Carbon::now();
        $select = $request->get('category_topic');
        // แปลงเลขเดือนเป็นชื่อเดือน
        $monthName = 'มิถุนายน';
        // แปลงปีค.ศ. เป็น พ.ศ.
        $yearName = $select_year + 543;

        if (!empty($select)) {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->select('transaction_02.*', 'category_02.topic')
                ->where('category_02.topic', '=', $select)
                ->whereMonth('transaction_02.created_at', '=', '06')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);

            // รายจ่ายตามหมวดหมู่ของผู้ใช้
            $expense_cate = DB::table('transaction_02')
                ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->select('transaction_02.*', 'category_02.topic', DB::raw('sum(expense) as total_expense'),)
                ->groupBy('topic')
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('category_02.topic', '=', $select)
                ->whereMonth('transaction_02.created_at', '=', '06')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->get();

            //ผลรวมรายจ่ายตามเดือนและปีที่เลือก
            $expense_total = DB::table("transaction_02")
                ->where(array('user_id' => $user_id))
                ->whereMonth('created_at', '=', '06')
                ->whereYear('created_at', '=', $select_year)
                ->sum('expense');
        } else {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->select('transaction_02.*', 'category_02.topic')
                ->whereMonth('transaction_02.created_at', '=', '06')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);

            // รายจ่ายตามหมวดหมู่ของผู้ใช้
            $expense_cate = DB::table('transaction_02')
                ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->select('transaction_02.*', 'category_02.topic', DB::raw('sum(expense) as total_expense'))
                ->groupBy('topic')
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->where('transaction_02.user_id', '=', $user_id)
                ->whereMonth('transaction_02.created_at', '=', '06')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->get();

            //ผลรวมรายจ่ายตามเดือนและปีที่เลือก
            $expense_total = DB::table("transaction_02")
                ->where(array('user_id' => $user_id))
                ->whereMonth('created_at', '=', '06')
                ->whereYear('created_at', '=', $select_year)
                ->sum('expense');
        }

        return view('user.user_report.report_sub.expense.06_expense', compact('transaction', 'monthName', 'yearName', 'select', 'select_year', 'expense_cate', 'expense_total'));
    }

    public function jul_expense(Request $request, $select_year)
    {
        $user_id = Auth::id();
        $perPage = 50;
        $date = Carbon::now();
        $select = $request->get('category_topic');
        // แปลงเลขเดือนเป็นชื่อเดือน
        $monthName = 'กรกฎาคม';
        // แปลงปีค.ศ. เป็น พ.ศ.
        $yearName = $select_year + 543;

        if (!empty($select)) {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->select('transaction_02.*', 'category_02.topic')
                ->where('category_02.topic', '=', $select)
                ->whereMonth('transaction_02.created_at', '=', '07')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);

            // รายจ่ายตามหมวดหมู่ของผู้ใช้
            $expense_cate = DB::table('transaction_02')
                ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->select('transaction_02.*', 'category_02.topic', DB::raw('sum(expense) as total_expense'),)
                ->groupBy('topic')
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('category_02.topic', '=', $select)
                ->whereMonth('transaction_02.created_at', '=', '07')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->get();

            //ผลรวมรายจ่ายตามเดือนและปีที่เลือก
            $expense_total = DB::table("transaction_02")
                ->where(array('user_id' => $user_id))
                ->whereMonth('created_at', '=', '07')
                ->whereYear('created_at', '=', $select_year)
                ->sum('expense');
        } else {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->select('transaction_02.*', 'category_02.topic')
                ->whereMonth('transaction_02.created_at', '=', '07')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);

            // รายจ่ายตามหมวดหมู่ของผู้ใช้
            $expense_cate = DB::table('transaction_02')
                ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->select('transaction_02.*', 'category_02.topic', DB::raw('sum(expense) as total_expense'))
                ->groupBy('topic')
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->where('transaction_02.user_id', '=', $user_id)
                ->whereMonth('transaction_02.created_at', '=', '07')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->get();

            //ผลรวมรายจ่ายตามเดือนและปีที่เลือก
            $expense_total = DB::table("transaction_02")
                ->where(array('user_id' => $user_id))
                ->whereMonth('created_at', '=', '07')
                ->whereYear('created_at', '=', $select_year)
                ->sum('expense');
        }

        return view('user.user_report.report_sub.expense.07_expense', compact('transaction', 'monthName', 'yearName', 'select', 'select_year', 'expense_cate', 'expense_total'));
    }

    public function aug_expense(Request $request, $select_year)
    {
        $user_id = Auth::id();
        $perPage = 50;
        $date = Carbon::now();
        $select = $request->get('category_topic');
        // แปลงเลขเดือนเป็นชื่อเดือน
        $monthName = 'สิงหาคม';
        // แปลงปีค.ศ. เป็น พ.ศ.
        $yearName = $select_year + 543;

        if (!empty($select)) {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->select('transaction_02.*', 'category_02.topic')
                ->where('category_02.topic', '=', $select)
                ->whereMonth('transaction_02.created_at', '=', '08')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);

            // รายจ่ายตามหมวดหมู่ของผู้ใช้
            $expense_cate = DB::table('transaction_02')
                ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->select('transaction_02.*', 'category_02.topic', DB::raw('sum(expense) as total_expense'),)
                ->groupBy('topic')
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('category_02.topic', '=', $select)
                ->whereMonth('transaction_02.created_at', '=', '08')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->get();

            //ผลรวมรายจ่ายตามเดือนและปีที่เลือก
            $expense_total = DB::table("transaction_02")
                ->where(array('user_id' => $user_id))
                ->whereMonth('created_at', '=', '08')
                ->whereYear('created_at', '=', $select_year)
                ->sum('expense');
        } else {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->select('transaction_02.*', 'category_02.topic')
                ->whereMonth('transaction_02.created_at', '=', '08')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);

            // รายจ่ายตามหมวดหมู่ของผู้ใช้
            $expense_cate = DB::table('transaction_02')
                ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->select('transaction_02.*', 'category_02.topic', DB::raw('sum(expense) as total_expense'))
                ->groupBy('topic')
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->where('transaction_02.user_id', '=', $user_id)
                ->whereMonth('transaction_02.created_at', '=', '08')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->get();

            //ผลรวมรายจ่ายตามเดือนและปีที่เลือก
            $expense_total = DB::table("transaction_02")
                ->where(array('user_id' => $user_id))
                ->whereMonth('created_at', '=', '08')
                ->whereYear('created_at', '=', $select_year)
                ->sum('expense');
        }

        return view('user.user_report.report_sub.expense.08_expense', compact('transaction', 'monthName', 'yearName', 'select', 'select_year', 'expense_cate', 'expense_total'));
    }

    public function sep_expense(Request $request, $select_year)
    {
        $user_id = Auth::id();
        $perPage = 50;
        $date = Carbon::now();
        $select = $request->get('category_topic');
        // แปลงเลขเดือนเป็นชื่อเดือน
        $monthName = 'กันยายน';
        // แปลงปีค.ศ. เป็น พ.ศ.
        $yearName = $select_year + 543;

        if (!empty($select)) {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->select('transaction_02.*', 'category_02.topic')
                ->where('category_02.topic', '=', $select)
                ->whereMonth('transaction_02.created_at', '=', '09')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);

            // รายจ่ายตามหมวดหมู่ของผู้ใช้
            $expense_cate = DB::table('transaction_02')
                ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->select('transaction_02.*', 'category_02.topic', DB::raw('sum(expense) as total_expense'),)
                ->groupBy('topic')
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('category_02.topic', '=', $select)
                ->whereMonth('transaction_02.created_at', '=', '09')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->get();

            //ผลรวมรายจ่ายตามเดือนและปีที่เลือก
            $expense_total = DB::table("transaction_02")
                ->where(array('user_id' => $user_id))
                ->whereMonth('created_at', '=', '09')
                ->whereYear('created_at', '=', $select_year)
                ->sum('expense');
        } else {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->select('transaction_02.*', 'category_02.topic')
                ->whereMonth('transaction_02.created_at', '=', '09')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);

            // รายจ่ายตามหมวดหมู่ของผู้ใช้
            $expense_cate = DB::table('transaction_02')
                ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->select('transaction_02.*', 'category_02.topic', DB::raw('sum(expense) as total_expense'))
                ->groupBy('topic')
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->where('transaction_02.user_id', '=', $user_id)
                ->whereMonth('transaction_02.created_at', '=', '09')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->get();

            //ผลรวมรายจ่ายตามเดือนและปีที่เลือก
            $expense_total = DB::table("transaction_02")
                ->where(array('user_id' => $user_id))
                ->whereMonth('created_at', '=', '09')
                ->whereYear('created_at', '=', $select_year)
                ->sum('expense');
        }

        return view('user.user_report.report_sub.expense.09_expense', compact('transaction', 'monthName', 'yearName', 'select', 'select_year', 'expense_cate', 'expense_total'));
    }

    public function oct_expense(Request $request, $select_year)
    {
        $user_id = Auth::id();
        $perPage = 50;
        $date = Carbon::now();
        $select = $request->get('category_topic');
        // แปลงเลขเดือนเป็นชื่อเดือน
        $monthName = 'ตุลาคม';
        // แปลงปีค.ศ. เป็น พ.ศ.
        $yearName = $select_year + 543;

        if (!empty($select)) {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->select('transaction_02.*', 'category_02.topic')
                ->where('category_02.topic', '=', $select)
                ->whereMonth('transaction_02.created_at', '=', '10')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);

            // รายจ่ายตามหมวดหมู่ของผู้ใช้
            $expense_cate = DB::table('transaction_02')
                ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->select('transaction_02.*', 'category_02.topic', DB::raw('sum(expense) as total_expense'),)
                ->groupBy('topic')
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('category_02.topic', '=', $select)
                ->whereMonth('transaction_02.created_at', '=', '10')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->get();

            //ผลรวมรายจ่ายตามเดือนและปีที่เลือก
            $expense_total = DB::table("transaction_02")
                ->where(array('user_id' => $user_id))
                ->whereMonth('created_at', '=', '10')
                ->whereYear('created_at', '=', $select_year)
                ->sum('expense');
        } else {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->select('transaction_02.*', 'category_02.topic')
                ->whereMonth('transaction_02.created_at', '=', '10')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);

            // รายจ่ายตามหมวดหมู่ของผู้ใช้
            $expense_cate = DB::table('transaction_02')
                ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->select('transaction_02.*', 'category_02.topic', DB::raw('sum(expense) as total_expense'))
                ->groupBy('topic')
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->where('transaction_02.user_id', '=', $user_id)
                ->whereMonth('transaction_02.created_at', '=', '10')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->get();

            //ผลรวมรายจ่ายตามเดือนและปีที่เลือก
            $expense_total = DB::table("transaction_02")
                ->where(array('user_id' => $user_id))
                ->whereMonth('created_at', '=', '10')
                ->whereYear('created_at', '=', $select_year)
                ->sum('expense');
        }

        return view('user.user_report.report_sub.expense.10_expense', compact('transaction', 'monthName', 'yearName', 'select', 'select_year', 'expense_cate', 'expense_total'));
    }

    public function nov_expense(Request $request, $select_year)
    {
        $user_id = Auth::id();
        $perPage = 50;
        $date = Carbon::now();
        $select = $request->get('category_topic');
        // แปลงเลขเดือนเป็นชื่อเดือน
        $monthName = 'พฤศจิกายน';
        // แปลงปีค.ศ. เป็น พ.ศ.
        $yearName = $select_year + 543;

        if (!empty($select)) {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->select('transaction_02.*', 'category_02.topic')
                ->where('category_02.topic', '=', $select)
                ->whereMonth('transaction_02.created_at', '=', '11')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);

            // รายจ่ายตามหมวดหมู่ของผู้ใช้
            $expense_cate = DB::table('transaction_02')
                ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->select('transaction_02.*', 'category_02.topic', DB::raw('sum(expense) as total_expense'),)
                ->groupBy('topic')
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('category_02.topic', '=', $select)
                ->whereMonth('transaction_02.created_at', '=', '11')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->get();

            //ผลรวมรายจ่ายตามเดือนและปีที่เลือก
            $expense_total = DB::table("transaction_02")
                ->where(array('user_id' => $user_id))
                ->whereMonth('created_at', '=', '11')
                ->whereYear('created_at', '=', $select_year)
                ->sum('expense');
        } else {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->select('transaction_02.*', 'category_02.topic')
                ->whereMonth('transaction_02.created_at', '=', '11')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);

            // รายจ่ายตามหมวดหมู่ของผู้ใช้
            $expense_cate = DB::table('transaction_02')
                ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->select('transaction_02.*', 'category_02.topic', DB::raw('sum(expense) as total_expense'))
                ->groupBy('topic')
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->where('transaction_02.user_id', '=', $user_id)
                ->whereMonth('transaction_02.created_at', '=', '11')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->get();

            //ผลรวมรายจ่ายตามเดือนและปีที่เลือก
            $expense_total = DB::table("transaction_02")
                ->where(array('user_id' => $user_id))
                ->whereMonth('created_at', '=', '11')
                ->whereYear('created_at', '=', $select_year)
                ->sum('expense');
        }

        return view('user.user_report.report_sub.expense.11_expense', compact('transaction', 'monthName', 'yearName', 'select', 'select_year', 'expense_cate', 'expense_total'));
    }

    public function dec_expense(Request $request, $select_year)
    {
        $user_id = Auth::id();
        $perPage = 50;
        $date = Carbon::now();
        $select = $request->get('category_topic');
        // แปลงเลขเดือนเป็นชื่อเดือน
        $monthName = 'ธันวาคม';
        // แปลงปีค.ศ. เป็น พ.ศ.
        $yearName = $select_year + 543;

        if (!empty($select)) {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->select('transaction_02.*', 'category_02.topic')
                ->where('category_02.topic', '=', $select)
                ->whereMonth('transaction_02.created_at', '=', '12')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);

            // รายจ่ายตามหมวดหมู่ของผู้ใช้
            $expense_cate = DB::table('transaction_02')
                ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->select('transaction_02.*', 'category_02.topic', DB::raw('sum(expense) as total_expense'),)
                ->groupBy('topic')
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('category_02.topic', '=', $select)
                ->whereMonth('transaction_02.created_at', '=', '12')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->get();

            //ผลรวมรายจ่ายตามเดือนและปีที่เลือก
            $expense_total = DB::table("transaction_02")
                ->where(array('user_id' => $user_id))
                ->whereMonth('created_at', '=', '12')
                ->whereYear('created_at', '=', $select_year)
                ->sum('expense');
        } else {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->select('transaction_02.*', 'category_02.topic')
                ->whereMonth('transaction_02.created_at', '=', '12')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);

            // รายจ่ายตามหมวดหมู่ของผู้ใช้
            $expense_cate = DB::table('transaction_02')
                ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->select('transaction_02.*', 'category_02.topic', DB::raw('sum(expense) as total_expense'))
                ->groupBy('topic')
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->where('transaction_02.user_id', '=', $user_id)
                ->whereMonth('transaction_02.created_at', '=', '12')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->get();

            //ผลรวมรายจ่ายตามเดือนและปีที่เลือก
            $expense_total = DB::table("transaction_02")
                ->where(array('user_id' => $user_id))
                ->whereMonth('created_at', '=', '12')
                ->whereYear('created_at', '=', $select_year)
                ->sum('expense');
        }

        return view('user.user_report.report_sub.expense.12_expense', compact('transaction', 'monthName', 'yearName', 'select', 'select_year', 'expense_cate', 'expense_total'));
    }
}
