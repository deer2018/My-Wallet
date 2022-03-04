<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Transaction_02;

class FacultyController extends Controller
{

    public function faculty_01(Request $request)
    {
        $perPage = 30;
        
        // รับค่าปีจาก request
        $select_year = $request->get('selectYear');

        //ปีปัจจุบัน
        $yearCheck = Carbon::now()->format('Y');

        //รวมปีจาก รายการธุรกรรม
        $group_year = Transaction_02::select(DB::raw('YEAR(created_at) year'))
            ->groupBy('year')
            ->orderBy('year', 'desc')
            ->get();

        if (!empty($select_year)) {

            // รายจ่ายตามหมวดหมู่ของผู้ใช้
            $expense_cate = DB::table('transaction_02')
            ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
            ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
            ->select('transaction_02.*', 'category_02.topic', 'users.faculty', DB::raw('sum(expense) as total_expense'))
            ->groupBy('topic')
            ->where('transaction_02.category_type', '=', 'รายจ่าย')
            ->where('users.faculty', '=', 'ครุศาสตร์')
            ->whereYear('transaction_02.created_at', '=', $select_year)
            ->get();

            //ผลรวมรายจ่ายตามเดือนและปีที่เลือก
            $expense_total = DB::table("transaction_02")
            ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
            ->select('transaction_02.*', 'users.faculty',)
            ->where('users.faculty', '=', 'ครุศาสตร์')
            ->whereYear('transaction_02.created_at', '=', $select_year)
            ->sum('expense');

            // รายรับตามหมวดหมู่ของผู้ใช้
            $income_cate = DB::table('transaction_02')
                ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
                ->select('transaction_02.*', 'category_02.topic', 'users.faculty', DB::raw('sum(income) as total_income'))
                ->groupBy('topic')
                ->where('transaction_02.category_type', '=', 'รายรับ')
                ->where('users.faculty', '=', 'ครุศาสตร์')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->get();

            //ผลรวมรายรับตามเดือนและปีที่เลือก
            $income_total = DB::table("transaction_02")
                ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
                ->select('transaction_02.*', 'users.faculty',)
                ->where('users.faculty', '=', 'ครุศาสตร์')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->sum('income');
        } else {

            // รายจ่ายตามหมวดหมู่ของผู้ใช้
            $expense_cate = DB::table('transaction_02')
                ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
                ->select('transaction_02.*', 'category_02.topic', 'users.faculty', DB::raw('sum(expense) as total_expense'))
                ->groupBy('topic')
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->where('users.faculty', '=', 'ครุศาสตร์')
                ->whereYear('transaction_02.created_at', '=', $yearCheck)
                ->get();

            //ผลรวมรายจ่ายตามเดือนและปีที่เลือก
            $expense_total = DB::table("transaction_02")
                ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
                ->select('transaction_02.*', 'users.faculty',)
                ->where('users.faculty', '=', 'ครุศาสตร์')
                ->whereYear('transaction_02.created_at', '=', $yearCheck)
                ->sum('expense');


            // รายรับตามหมวดหมู่ของผู้ใช้
            $income_cate = DB::table('transaction_02')
                ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
                ->select('transaction_02.*', 'category_02.topic', 'users.faculty', DB::raw('sum(income) as total_income'))
                ->groupBy('topic')
                ->where('transaction_02.category_type', '=', 'รายรับ')
                ->where('users.faculty', '=', 'ครุศาสตร์')
                ->whereYear('transaction_02.created_at', '=', $yearCheck)
                ->get();

            //ผลรวมรายรับตามเดือนและปีที่เลือก
            $income_total = DB::table("transaction_02")
                ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
                ->select('transaction_02.*', 'users.faculty',)
                ->where('users.faculty', '=', 'ครุศาสตร์')
                ->whereYear('transaction_02.created_at', '=', $yearCheck)
                ->sum('income');
        }


        return view(
            'admin.faculty.report_faculty_01',
            compact(
                'expense_cate',
                'expense_total',
                'income_cate',
                'income_total',
                'group_year',
                'select_year',

            )
        );
    }

    public function faculty_02(Request $request)
    {
        $perPage = 30;
        
        // รับค่าปีจาก request
        $select_year = $request->get('selectYear');

        //ปีปัจจุบัน
        $yearCheck = Carbon::now()->format('Y');

        //รวมปีจาก รายการธุรกรรม
        $group_year = Transaction_02::select(DB::raw('YEAR(created_at) year'))
            ->groupBy('year')
            ->orderBy('year', 'desc')
            ->get();

        if (!empty($select_year)) {

            // รายจ่ายตามหมวดหมู่ของผู้ใช้
            $expense_cate = DB::table('transaction_02')
            ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
            ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
            ->select('transaction_02.*', 'category_02.topic', 'users.faculty', DB::raw('sum(expense) as total_expense'))
            ->groupBy('topic')
            ->where('transaction_02.category_type', '=', 'รายจ่าย')
            ->where('users.faculty', '=', 'วิทยาการจัดการ')
            ->whereYear('transaction_02.created_at', '=', $select_year)
            ->get();

            //ผลรวมรายจ่ายตามเดือนและปีที่เลือก
            $expense_total = DB::table("transaction_02")
            ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
            ->select('transaction_02.*', 'users.faculty',)
            ->where('users.faculty', '=', 'วิทยาการจัดการ')
            ->whereYear('transaction_02.created_at', '=', $select_year)
            ->sum('expense');

            // รายรับตามหมวดหมู่ของผู้ใช้
            $income_cate = DB::table('transaction_02')
                ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
                ->select('transaction_02.*', 'category_02.topic', 'users.faculty', DB::raw('sum(income) as total_income'))
                ->groupBy('topic')
                ->where('transaction_02.category_type', '=', 'รายรับ')
                ->where('users.faculty', '=', 'วิทยาการจัดการ')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->get();

            //ผลรวมรายรับตามเดือนและปีที่เลือก
            $income_total = DB::table("transaction_02")
                ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
                ->select('transaction_02.*', 'users.faculty',)
                ->where('users.faculty', '=', 'วิทยาการจัดการ')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->sum('income');
        } else {

            // รายจ่ายตามหมวดหมู่ของผู้ใช้
            $expense_cate = DB::table('transaction_02')
                ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
                ->select('transaction_02.*', 'category_02.topic', 'users.faculty', DB::raw('sum(expense) as total_expense'))
                ->groupBy('topic')
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->where('users.faculty', '=', 'วิทยาการจัดการ')
                ->whereYear('transaction_02.created_at', '=', $yearCheck)
                ->get();

            //ผลรวมรายจ่ายตามเดือนและปีที่เลือก
            $expense_total = DB::table("transaction_02")
                ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
                ->select('transaction_02.*', 'users.faculty',)
                ->where('users.faculty', '=', 'วิทยาการจัดการ')
                ->whereYear('transaction_02.created_at', '=', $yearCheck)
                ->sum('expense');


            // รายรับตามหมวดหมู่ของผู้ใช้
            $income_cate = DB::table('transaction_02')
                ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
                ->select('transaction_02.*', 'category_02.topic', 'users.faculty', DB::raw('sum(income) as total_income'))
                ->groupBy('topic')
                ->where('transaction_02.category_type', '=', 'รายรับ')
                ->where('users.faculty', '=', 'วิทยาการจัดการ')
                ->whereYear('transaction_02.created_at', '=', $yearCheck)
                ->get();

            //ผลรวมรายรับตามเดือนและปีที่เลือก
            $income_total = DB::table("transaction_02")
                ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
                ->select('transaction_02.*', 'users.faculty',)
                ->where('users.faculty', '=', 'วิทยาการจัดการ')
                ->whereYear('transaction_02.created_at', '=', $yearCheck)
                ->sum('income');
        }


        return view(
            'admin.faculty.report_faculty_02',
            compact(
                'expense_cate',
                'expense_total',
                'income_cate',
                'income_total',
                'group_year',
                'select_year',

            )
        );
    }

    public function faculty_03(Request $request)
    {
        $perPage = 30;
        
        // รับค่าปีจาก request
        $select_year = $request->get('selectYear');

        //ปีปัจจุบัน
        $yearCheck = Carbon::now()->format('Y');

        //รวมปีจาก รายการธุรกรรม
        $group_year = Transaction_02::select(DB::raw('YEAR(created_at) year'))
            ->groupBy('year')
            ->orderBy('year', 'desc')
            ->get();

        if (!empty($select_year)) {

            // รายจ่ายตามหมวดหมู่ของผู้ใช้
            $expense_cate = DB::table('transaction_02')
            ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
            ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
            ->select('transaction_02.*', 'category_02.topic', 'users.faculty', DB::raw('sum(expense) as total_expense'))
            ->groupBy('topic')
            ->where('transaction_02.category_type', '=', 'รายจ่าย')
            ->where('users.faculty', '=', 'วิทยาศาสตร์และเทคโนโลยี')
            ->whereYear('transaction_02.created_at', '=', $select_year)
            ->get();

            //ผลรวมรายจ่ายตามเดือนและปีที่เลือก
            $expense_total = DB::table("transaction_02")
            ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
            ->select('transaction_02.*', 'users.faculty',)
            ->where('users.faculty', '=', 'วิทยาศาสตร์และเทคโนโลยี')
            ->whereYear('transaction_02.created_at', '=', $select_year)
            ->sum('expense');

            // รายรับตามหมวดหมู่ของผู้ใช้
            $income_cate = DB::table('transaction_02')
                ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
                ->select('transaction_02.*', 'category_02.topic', 'users.faculty', DB::raw('sum(income) as total_income'))
                ->groupBy('topic')
                ->where('transaction_02.category_type', '=', 'รายรับ')
                ->where('users.faculty', '=', 'วิทยาศาสตร์และเทคโนโลยี')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->get();

            //ผลรวมรายรับตามเดือนและปีที่เลือก
            $income_total = DB::table("transaction_02")
                ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
                ->select('transaction_02.*', 'users.faculty',)
                ->where('users.faculty', '=', 'วิทยาศาสตร์และเทคโนโลยี')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->sum('income');
        } else {

            // รายจ่ายตามหมวดหมู่ของผู้ใช้
            $expense_cate = DB::table('transaction_02')
                ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
                ->select('transaction_02.*', 'category_02.topic', 'users.faculty', DB::raw('sum(expense) as total_expense'))
                ->groupBy('topic')
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->where('users.faculty', '=', 'วิทยาศาสตร์และเทคโนโลยี')
                ->whereYear('transaction_02.created_at', '=', $yearCheck)
                ->get();

            //ผลรวมรายจ่ายตามเดือนและปีที่เลือก
            $expense_total = DB::table("transaction_02")
                ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
                ->select('transaction_02.*', 'users.faculty',)
                ->where('users.faculty', '=', 'วิทยาศาสตร์และเทคโนโลยี')
                ->whereYear('transaction_02.created_at', '=', $yearCheck)
                ->sum('expense');


            // รายรับตามหมวดหมู่ของผู้ใช้
            $income_cate = DB::table('transaction_02')
                ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
                ->select('transaction_02.*', 'category_02.topic', 'users.faculty', DB::raw('sum(income) as total_income'))
                ->groupBy('topic')
                ->where('transaction_02.category_type', '=', 'รายรับ')
                ->where('users.faculty', '=', 'วิทยาศาสตร์และเทคโนโลยี')
                ->whereYear('transaction_02.created_at', '=', $yearCheck)
                ->get();

            //ผลรวมรายรับตามเดือนและปีที่เลือก
            $income_total = DB::table("transaction_02")
                ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
                ->select('transaction_02.*', 'users.faculty',)
                ->where('users.faculty', '=', 'วิทยาศาสตร์และเทคโนโลยี')
                ->whereYear('transaction_02.created_at', '=', $yearCheck)
                ->sum('income');
        }


        return view(
            'admin.faculty.report_faculty_03',
            compact(
                'expense_cate',
                'expense_total',
                'income_cate',
                'income_total',
                'group_year',
                'select_year',

            )
        );
    }

    public function faculty_04(Request $request)
    {
        $perPage = 30;
        
        // รับค่าปีจาก request
        $select_year = $request->get('selectYear');

        //ปีปัจจุบัน
        $yearCheck = Carbon::now()->format('Y');

        //รวมปีจาก รายการธุรกรรม
        $group_year = Transaction_02::select(DB::raw('YEAR(created_at) year'))
            ->groupBy('year')
            ->orderBy('year', 'desc')
            ->get();

        if (!empty($select_year)) {

            // รายจ่ายตามหมวดหมู่ของผู้ใช้
            $expense_cate = DB::table('transaction_02')
            ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
            ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
            ->select('transaction_02.*', 'category_02.topic', 'users.faculty', DB::raw('sum(expense) as total_expense'))
            ->groupBy('topic')
            ->where('transaction_02.category_type', '=', 'รายจ่าย')
            ->where('users.faculty', '=', 'เทคโนโลยีอุตสาหกรรม')
            ->whereYear('transaction_02.created_at', '=', $select_year)
            ->get();

            //ผลรวมรายจ่ายตามเดือนและปีที่เลือก
            $expense_total = DB::table("transaction_02")
            ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
            ->select('transaction_02.*', 'users.faculty',)
            ->where('users.faculty', '=', 'เทคโนโลยีอุตสาหกรรม')
            ->whereYear('transaction_02.created_at', '=', $select_year)
            ->sum('expense');

            // รายรับตามหมวดหมู่ของผู้ใช้
            $income_cate = DB::table('transaction_02')
                ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
                ->select('transaction_02.*', 'category_02.topic', 'users.faculty', DB::raw('sum(income) as total_income'))
                ->groupBy('topic')
                ->where('transaction_02.category_type', '=', 'รายรับ')
                ->where('users.faculty', '=', 'เทคโนโลยีอุตสาหกรรม')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->get();

            //ผลรวมรายรับตามเดือนและปีที่เลือก
            $income_total = DB::table("transaction_02")
                ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
                ->select('transaction_02.*', 'users.faculty',)
                ->where('users.faculty', '=', 'เทคโนโลยีอุตสาหกรรม')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->sum('income');
        } else {

            // รายจ่ายตามหมวดหมู่ของผู้ใช้
            $expense_cate = DB::table('transaction_02')
                ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
                ->select('transaction_02.*', 'category_02.topic', 'users.faculty', DB::raw('sum(expense) as total_expense'))
                ->groupBy('topic')
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->where('users.faculty', '=', 'เทคโนโลยีอุตสาหกรรม')
                ->whereYear('transaction_02.created_at', '=', $yearCheck)
                ->get();

            //ผลรวมรายจ่ายตามเดือนและปีที่เลือก
            $expense_total = DB::table("transaction_02")
                ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
                ->select('transaction_02.*', 'users.faculty',)
                ->where('users.faculty', '=', 'เทคโนโลยีอุตสาหกรรม')
                ->whereYear('transaction_02.created_at', '=', $yearCheck)
                ->sum('expense');


            // รายรับตามหมวดหมู่ของผู้ใช้
            $income_cate = DB::table('transaction_02')
                ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
                ->select('transaction_02.*', 'category_02.topic', 'users.faculty', DB::raw('sum(income) as total_income'))
                ->groupBy('topic')
                ->where('transaction_02.category_type', '=', 'รายรับ')
                ->where('users.faculty', '=', 'เทคโนโลยีอุตสาหกรรม')
                ->whereYear('transaction_02.created_at', '=', $yearCheck)
                ->get();

            //ผลรวมรายรับตามเดือนและปีที่เลือก
            $income_total = DB::table("transaction_02")
                ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
                ->select('transaction_02.*', 'users.faculty',)
                ->where('users.faculty', '=', 'เทคโนโลยีอุตสาหกรรม')
                ->whereYear('transaction_02.created_at', '=', $yearCheck)
                ->sum('income');
        }


        return view(
            'admin.faculty.report_faculty_04',
            compact(
                'expense_cate',
                'expense_total',
                'income_cate',
                'income_total',
                'group_year',
                'select_year',

            )
        );
    }

    public function faculty_05(Request $request)
    {
        $perPage = 30;
        
        // รับค่าปีจาก request
        $select_year = $request->get('selectYear');

        //ปีปัจจุบัน
        $yearCheck = Carbon::now()->format('Y');

        //รวมปีจาก รายการธุรกรรม
        $group_year = Transaction_02::select(DB::raw('YEAR(created_at) year'))
            ->groupBy('year')
            ->orderBy('year', 'desc')
            ->get();

        if (!empty($select_year)) {

            // รายจ่ายตามหมวดหมู่ของผู้ใช้
            $expense_cate = DB::table('transaction_02')
            ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
            ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
            ->select('transaction_02.*', 'category_02.topic', 'users.faculty', DB::raw('sum(expense) as total_expense'))
            ->groupBy('topic')
            ->where('transaction_02.category_type', '=', 'รายจ่าย')
            ->where('users.faculty', '=', 'เทคโนโลยีการเกษตร')
            ->whereYear('transaction_02.created_at', '=', $select_year)
            ->get();

            //ผลรวมรายจ่ายตามเดือนและปีที่เลือก
            $expense_total = DB::table("transaction_02")
            ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
            ->select('transaction_02.*', 'users.faculty',)
            ->where('users.faculty', '=', 'เทคโนโลยีการเกษตร')
            ->whereYear('transaction_02.created_at', '=', $select_year)
            ->sum('expense');

            // รายรับตามหมวดหมู่ของผู้ใช้
            $income_cate = DB::table('transaction_02')
                ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
                ->select('transaction_02.*', 'category_02.topic', 'users.faculty', DB::raw('sum(income) as total_income'))
                ->groupBy('topic')
                ->where('transaction_02.category_type', '=', 'รายรับ')
                ->where('users.faculty', '=', 'เทคโนโลยีการเกษตร')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->get();

            //ผลรวมรายรับตามเดือนและปีที่เลือก
            $income_total = DB::table("transaction_02")
                ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
                ->select('transaction_02.*', 'users.faculty',)
                ->where('users.faculty', '=', 'เทคโนโลยีการเกษตร')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->sum('income');
        } else {

            // รายจ่ายตามหมวดหมู่ของผู้ใช้
            $expense_cate = DB::table('transaction_02')
                ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
                ->select('transaction_02.*', 'category_02.topic', 'users.faculty', DB::raw('sum(expense) as total_expense'))
                ->groupBy('topic')
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->where('users.faculty', '=', 'เทคโนโลยีการเกษตร')
                ->whereYear('transaction_02.created_at', '=', $yearCheck)
                ->get();

            //ผลรวมรายจ่ายตามเดือนและปีที่เลือก
            $expense_total = DB::table("transaction_02")
                ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
                ->select('transaction_02.*', 'users.faculty',)
                ->where('users.faculty', '=', 'เทคโนโลยีการเกษตร')
                ->whereYear('transaction_02.created_at', '=', $yearCheck)
                ->sum('expense');


            // รายรับตามหมวดหมู่ของผู้ใช้
            $income_cate = DB::table('transaction_02')
                ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
                ->select('transaction_02.*', 'category_02.topic', 'users.faculty', DB::raw('sum(income) as total_income'))
                ->groupBy('topic')
                ->where('transaction_02.category_type', '=', 'รายรับ')
                ->where('users.faculty', '=', 'เทคโนโลยีการเกษตร')
                ->whereYear('transaction_02.created_at', '=', $yearCheck)
                ->get();

            //ผลรวมรายรับตามเดือนและปีที่เลือก
            $income_total = DB::table("transaction_02")
                ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
                ->select('transaction_02.*', 'users.faculty',)
                ->where('users.faculty', '=', 'เทคโนโลยีการเกษตร')
                ->whereYear('transaction_02.created_at', '=', $yearCheck)
                ->sum('income');
        }


        return view(
            'admin.faculty.report_faculty_05',
            compact(
                'expense_cate',
                'expense_total',
                'income_cate',
                'income_total',
                'group_year',
                'select_year',

            )
        );
    }

    public function faculty_06(Request $request)
    {
        $perPage = 30;
        
        // รับค่าปีจาก request
        $select_year = $request->get('selectYear');

        //ปีปัจจุบัน
        $yearCheck = Carbon::now()->format('Y');

        //รวมปีจาก รายการธุรกรรม
        $group_year = Transaction_02::select(DB::raw('YEAR(created_at) year'))
            ->groupBy('year')
            ->orderBy('year', 'desc')
            ->get();

        if (!empty($select_year)) {

            // รายจ่ายตามหมวดหมู่ของผู้ใช้
            $expense_cate = DB::table('transaction_02')
            ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
            ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
            ->select('transaction_02.*', 'category_02.topic', 'users.faculty', DB::raw('sum(expense) as total_expense'))
            ->groupBy('topic')
            ->where('transaction_02.category_type', '=', 'รายจ่าย')
            ->where('users.faculty', '=', 'มนุษยศาสตร์และสังคมศาสตร์')
            ->whereYear('transaction_02.created_at', '=', $select_year)
            ->get();

            //ผลรวมรายจ่ายตามเดือนและปีที่เลือก
            $expense_total = DB::table("transaction_02")
            ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
            ->select('transaction_02.*', 'users.faculty',)
            ->where('users.faculty', '=', 'มนุษยศาสตร์และสังคมศาสตร์')
            ->whereYear('transaction_02.created_at', '=', $select_year)
            ->sum('expense');

            // รายรับตามหมวดหมู่ของผู้ใช้
            $income_cate = DB::table('transaction_02')
                ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
                ->select('transaction_02.*', 'category_02.topic', 'users.faculty', DB::raw('sum(income) as total_income'))
                ->groupBy('topic')
                ->where('transaction_02.category_type', '=', 'รายรับ')
                ->where('users.faculty', '=', 'มนุษยศาสตร์และสังคมศาสตร์')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->get();

            //ผลรวมรายรับตามเดือนและปีที่เลือก
            $income_total = DB::table("transaction_02")
                ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
                ->select('transaction_02.*', 'users.faculty',)
                ->where('users.faculty', '=', 'มนุษยศาสตร์และสังคมศาสตร์')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->sum('income');
        } else {

            // รายจ่ายตามหมวดหมู่ของผู้ใช้
            $expense_cate = DB::table('transaction_02')
                ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
                ->select('transaction_02.*', 'category_02.topic', 'users.faculty', DB::raw('sum(expense) as total_expense'))
                ->groupBy('topic')
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->where('users.faculty', '=', 'มนุษยศาสตร์และสังคมศาสตร์')
                ->whereYear('transaction_02.created_at', '=', $yearCheck)
                ->get();

            //ผลรวมรายจ่ายตามเดือนและปีที่เลือก
            $expense_total = DB::table("transaction_02")
                ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
                ->select('transaction_02.*', 'users.faculty',)
                ->where('users.faculty', '=', 'มนุษยศาสตร์และสังคมศาสตร์')
                ->whereYear('transaction_02.created_at', '=', $yearCheck)
                ->sum('expense');


            // รายรับตามหมวดหมู่ของผู้ใช้
            $income_cate = DB::table('transaction_02')
                ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
                ->select('transaction_02.*', 'category_02.topic', 'users.faculty', DB::raw('sum(income) as total_income'))
                ->groupBy('topic')
                ->where('transaction_02.category_type', '=', 'รายรับ')
                ->where('users.faculty', '=', 'มนุษยศาสตร์และสังคมศาสตร์')
                ->whereYear('transaction_02.created_at', '=', $yearCheck)
                ->get();

            //ผลรวมรายรับตามเดือนและปีที่เลือก
            $income_total = DB::table("transaction_02")
                ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
                ->select('transaction_02.*', 'users.faculty',)
                ->where('users.faculty', '=', 'มนุษยศาสตร์และสังคมศาสตร์')
                ->whereYear('transaction_02.created_at', '=', $yearCheck)
                ->sum('income');
        }


        return view(
            'admin.faculty.report_faculty_06',
            compact(
                'expense_cate',
                'expense_total',
                'income_cate',
                'income_total',
                'group_year',
                'select_year',

            )
        );
    }

    public function faculty_07(Request $request)
    {
        $perPage = 30;
        
        // รับค่าปีจาก request
        $select_year = $request->get('selectYear');

        //ปีปัจจุบัน
        $yearCheck = Carbon::now()->format('Y');

        //รวมปีจาก รายการธุรกรรม
        $group_year = Transaction_02::select(DB::raw('YEAR(created_at) year'))
            ->groupBy('year')
            ->orderBy('year', 'desc')
            ->get();

        if (!empty($select_year)) {

            // รายจ่ายตามหมวดหมู่ของผู้ใช้
            $expense_cate = DB::table('transaction_02')
            ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
            ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
            ->select('transaction_02.*', 'category_02.topic', 'users.faculty', DB::raw('sum(expense) as total_expense'))
            ->groupBy('topic')
            ->where('transaction_02.category_type', '=', 'รายจ่าย')
            ->where('users.faculty', '=', 'สาธารณสุขศาสตร์')
            ->whereYear('transaction_02.created_at', '=', $select_year)
            ->get();

            //ผลรวมรายจ่ายตามเดือนและปีที่เลือก
            $expense_total = DB::table("transaction_02")
            ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
            ->select('transaction_02.*', 'users.faculty',)
            ->where('users.faculty', '=', 'สาธารณสุขศาสตร์')
            ->whereYear('transaction_02.created_at', '=', $select_year)
            ->sum('expense');

            // รายรับตามหมวดหมู่ของผู้ใช้
            $income_cate = DB::table('transaction_02')
                ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
                ->select('transaction_02.*', 'category_02.topic', 'users.faculty', DB::raw('sum(income) as total_income'))
                ->groupBy('topic')
                ->where('transaction_02.category_type', '=', 'รายรับ')
                ->where('users.faculty', '=', 'สาธารณสุขศาสตร์')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->get();

            //ผลรวมรายรับตามเดือนและปีที่เลือก
            $income_total = DB::table("transaction_02")
                ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
                ->select('transaction_02.*', 'users.faculty',)
                ->where('users.faculty', '=', 'สาธารณสุขศาสตร์')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->sum('income');
        } else {

            // รายจ่ายตามหมวดหมู่ของผู้ใช้
            $expense_cate = DB::table('transaction_02')
                ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
                ->select('transaction_02.*', 'category_02.topic', 'users.faculty', DB::raw('sum(expense) as total_expense'))
                ->groupBy('topic')
                ->where('transaction_02.category_type', '=', 'รายจ่าย')
                ->where('users.faculty', '=', 'สาธารณสุขศาสตร์')
                ->whereYear('transaction_02.created_at', '=', $yearCheck)
                ->get();

            //ผลรวมรายจ่ายตามเดือนและปีที่เลือก
            $expense_total = DB::table("transaction_02")
                ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
                ->select('transaction_02.*', 'users.faculty',)
                ->where('users.faculty', '=', 'สาธารณสุขศาสตร์')
                ->whereYear('transaction_02.created_at', '=', $yearCheck)
                ->sum('expense');


            // รายรับตามหมวดหมู่ของผู้ใช้
            $income_cate = DB::table('transaction_02')
                ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
                ->select('transaction_02.*', 'category_02.topic', 'users.faculty', DB::raw('sum(income) as total_income'))
                ->groupBy('topic')
                ->where('transaction_02.category_type', '=', 'รายรับ')
                ->where('users.faculty', '=', 'สาธารณสุขศาสตร์')
                ->whereYear('transaction_02.created_at', '=', $yearCheck)
                ->get();

            //ผลรวมรายรับตามเดือนและปีที่เลือก
            $income_total = DB::table("transaction_02")
                ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
                ->select('transaction_02.*', 'users.faculty',)
                ->where('users.faculty', '=', 'สาธารณสุขศาสตร์')
                ->whereYear('transaction_02.created_at', '=', $yearCheck)
                ->sum('income');
        }


        return view(
            'admin.faculty.report_faculty_07',
            compact(
                'expense_cate',
                'expense_total',
                'income_cate',
                'income_total',
                'group_year',
                'select_year',

            )
        );
    }


    
}
