<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use Carbon\Carbon;
use App\Transaction_02;

class Faculty_PerController extends Controller
{
    public function faculty_show_01($id, $select_year)
    {
        $user_id = User::findOrFail($id);

        // รายจ่ายตามหมวดหมู่ของผู้ใช้
        $expense_cate = DB::table('transaction_02')
            ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
            ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
            ->select('transaction_02.*', 'category_02.topic', 'users.id','users.name','users.faculty', DB::raw('sum(expense) as total_expense'))
            ->groupBy('topic')
            ->where(array('transaction_02.user_id' => $user_id->id))
            ->where('transaction_02.category_type', '=', 'รายจ่าย')
            ->where('users.faculty', '=', 'ครุศาสตร์')
            ->whereYear('transaction_02.created_at', '=', $select_year)
            ->get();

        //ผลรวมรายจ่ายตามเดือนและปีที่เลือก
        $expense_total = DB::table("transaction_02")
            ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
            ->select('transaction_02.*', 'users.id','users.name','users.faculty',)
            ->where(array('transaction_02.user_id' => $user_id->id))
            ->where('users.faculty', '=', 'ครุศาสตร์')
            ->whereYear('transaction_02.created_at', '=', $select_year)
            ->sum('expense');

        // รายรับตามหมวดหมู่ของผู้ใช้
        $income_cate = DB::table('transaction_02')
            ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
            ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
            ->select('transaction_02.*', 'category_02.topic','users.id','users.name','users.faculty', DB::raw('sum(income) as total_income'))
            ->groupBy('topic')
            ->where(array('transaction_02.user_id' => $user_id->id))
            ->where('transaction_02.category_type', '=', 'รายรับ')
            ->where('users.faculty', '=', 'ครุศาสตร์')
            ->whereYear('transaction_02.created_at', '=', $select_year)
            ->get();

        //ผลรวมรายรับตามเดือนและปีที่เลือก
        $income_total = DB::table("transaction_02")
            ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
            ->select('transaction_02.*', 'users.id','users.name','users.faculty',)
            ->where(array('transaction_02.user_id' => $user_id->id))
            ->where('users.faculty', '=', 'ครุศาสตร์')
            ->whereYear('transaction_02.created_at', '=', $select_year)
            ->sum('income');
        
        

        return view(
                'admin.faculty.faculty_per.faculty_show_01',
                compact(
                    'expense_cate',
                    'expense_total',
                    'income_cate',
                    'income_total',
                    'select_year',
                    'user_id',
    
                )
            );
    }

    public function faculty_show_02($id, $select_year)
    {
        $user_id = User::findOrFail($id);

        // รายจ่ายตามหมวดหมู่ของผู้ใช้
        $expense_cate = DB::table('transaction_02')
            ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
            ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
            ->select('transaction_02.*', 'category_02.topic', 'users.id','users.name','users.faculty', DB::raw('sum(expense) as total_expense'))
            ->groupBy('topic')
            ->where(array('transaction_02.user_id' => $user_id->id))
            ->where('transaction_02.category_type', '=', 'รายจ่าย')
            ->where('users.faculty', '=', 'วิทยาการจัดการ')
            ->whereYear('transaction_02.created_at', '=', $select_year)
            ->get();

        //ผลรวมรายจ่ายตามเดือนและปีที่เลือก
        $expense_total = DB::table("transaction_02")
            ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
            ->select('transaction_02.*', 'users.id','users.name','users.faculty',)
            ->where(array('transaction_02.user_id' => $user_id->id))
            ->where('users.faculty', '=', 'วิทยาการจัดการ')
            ->whereYear('transaction_02.created_at', '=', $select_year)
            ->sum('expense');

        // รายรับตามหมวดหมู่ของผู้ใช้
        $income_cate = DB::table('transaction_02')
            ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
            ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
            ->select('transaction_02.*', 'category_02.topic','users.id','users.name','users.faculty', DB::raw('sum(income) as total_income'))
            ->groupBy('topic')
            ->where(array('transaction_02.user_id' => $user_id->id))
            ->where('transaction_02.category_type', '=', 'รายรับ')
            ->where('users.faculty', '=', 'วิทยาการจัดการ')
            ->whereYear('transaction_02.created_at', '=', $select_year)
            ->get();

        //ผลรวมรายรับตามเดือนและปีที่เลือก
        $income_total = DB::table("transaction_02")
            ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
            ->select('transaction_02.*', 'users.id','users.name','users.faculty',)
            ->where(array('transaction_02.user_id' => $user_id->id))
            ->where('users.faculty', '=', 'วิทยาการจัดการ')
            ->whereYear('transaction_02.created_at', '=', $select_year)
            ->sum('income');

        return view(
                'admin.faculty.faculty_per.faculty_show_02',
                compact(
                    'expense_cate',
                    'expense_total',
                    'income_cate',
                    'income_total',
                    'select_year',
                    'user_id',
                )
            );
    }

    public function faculty_show_03($id, $select_year)
    {
        $user_id = User::findOrFail($id);

        // รายจ่ายตามหมวดหมู่ของผู้ใช้
        $expense_cate = DB::table('transaction_02')
            ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
            ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
            ->select('transaction_02.*', 'category_02.topic', 'users.id','users.name','users.faculty', DB::raw('sum(expense) as total_expense'))
            ->groupBy('topic')
            ->where(array('transaction_02.user_id' => $user_id->id))
            ->where('transaction_02.category_type', '=', 'รายจ่าย')
            ->where('users.faculty', '=', 'วิทยาศาสตร์และเทคโนโลยี')
            ->whereYear('transaction_02.created_at', '=', $select_year)
            ->get();

        //ผลรวมรายจ่ายตามเดือนและปีที่เลือก
        $expense_total = DB::table("transaction_02")
            ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
            ->select('transaction_02.*', 'users.id','users.name','users.faculty',)
            ->where(array('transaction_02.user_id' => $user_id->id))
            ->where('users.faculty', '=', 'วิทยาศาสตร์และเทคโนโลยี')
            ->whereYear('transaction_02.created_at', '=', $select_year)
            ->sum('expense');

        // รายรับตามหมวดหมู่ของผู้ใช้
        $income_cate = DB::table('transaction_02')
            ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
            ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
            ->select('transaction_02.*', 'category_02.topic','users.id','users.name','users.faculty', DB::raw('sum(income) as total_income'))
            ->groupBy('topic')
            ->where(array('transaction_02.user_id' => $user_id->id))
            ->where('transaction_02.category_type', '=', 'รายรับ')
            ->where('users.faculty', '=', 'วิทยาศาสตร์และเทคโนโลยี')
            ->whereYear('transaction_02.created_at', '=', $select_year)
            ->get();

        //ผลรวมรายรับตามเดือนและปีที่เลือก
        $income_total = DB::table("transaction_02")
            ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
            ->select('transaction_02.*', 'users.id','users.name','users.faculty',)
            ->where(array('transaction_02.user_id' => $user_id->id))
            ->where('users.faculty', '=', 'วิทยาศาสตร์และเทคโนโลยี')
            ->whereYear('transaction_02.created_at', '=', $select_year)
            ->sum('income');

        return view(
                'admin.faculty.faculty_per.faculty_show_03',
                compact(
                    'expense_cate',
                    'expense_total',
                    'income_cate',
                    'income_total',
                    'select_year',
                    'user_id',
                )
            );
    }

    public function faculty_show_04($id, $select_year)
    {
        $user_id = User::findOrFail($id);

        // รายจ่ายตามหมวดหมู่ของผู้ใช้
        $expense_cate = DB::table('transaction_02')
            ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
            ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
            ->select('transaction_02.*', 'category_02.topic', 'users.id','users.name','users.faculty', DB::raw('sum(expense) as total_expense'))
            ->groupBy('topic')
            ->where(array('transaction_02.user_id' => $user_id->id))
            ->where('transaction_02.category_type', '=', 'รายจ่าย')
            ->where('users.faculty', '=', 'เทคโนโลยีอุตสาหกรรม')
            ->whereYear('transaction_02.created_at', '=', $select_year)
            ->get();

        //ผลรวมรายจ่ายตามเดือนและปีที่เลือก
        $expense_total = DB::table("transaction_02")
            ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
            ->select('transaction_02.*', 'users.id','users.name','users.faculty',)
            ->where(array('transaction_02.user_id' => $user_id->id))
            ->where('users.faculty', '=', 'เทคโนโลยีอุตสาหกรรม')
            ->whereYear('transaction_02.created_at', '=', $select_year)
            ->sum('expense');

        // รายรับตามหมวดหมู่ของผู้ใช้
        $income_cate = DB::table('transaction_02')
            ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
            ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
            ->select('transaction_02.*', 'category_02.topic','users.id','users.name','users.faculty', DB::raw('sum(income) as total_income'))
            ->groupBy('topic')
            ->where(array('transaction_02.user_id' => $user_id->id))
            ->where('transaction_02.category_type', '=', 'รายรับ')
            ->where('users.faculty', '=', 'เทคโนโลยีอุตสาหกรรม')
            ->whereYear('transaction_02.created_at', '=', $select_year)
            ->get();

        //ผลรวมรายรับตามเดือนและปีที่เลือก
        $income_total = DB::table("transaction_02")
            ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
            ->select('transaction_02.*', 'users.id','users.name','users.faculty',)
            ->where(array('transaction_02.user_id' => $user_id->id))
            ->where('users.faculty', '=', 'เทคโนโลยีอุตสาหกรรม')
            ->whereYear('transaction_02.created_at', '=', $select_year)
            ->sum('income');

        return view(
                'admin.faculty.faculty_per.faculty_show_04',
                compact(
                    'expense_cate',
                    'expense_total',
                    'income_cate',
                    'income_total',
                    'select_year',
                    'user_id',
                )
            );
    }

    public function faculty_show_05($id, $select_year)
    {
        $user_id = User::findOrFail($id);

        // รายจ่ายตามหมวดหมู่ของผู้ใช้
        $expense_cate = DB::table('transaction_02')
            ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
            ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
            ->select('transaction_02.*', 'category_02.topic', 'users.id','users.name','users.faculty', DB::raw('sum(expense) as total_expense'))
            ->groupBy('topic')
            ->where(array('transaction_02.user_id' => $user_id->id))
            ->where('transaction_02.category_type', '=', 'รายจ่าย')
            ->where('users.faculty', '=', 'เทคโนโลยีการเกษตร')
            ->whereYear('transaction_02.created_at', '=', $select_year)
            ->get();

        //ผลรวมรายจ่ายตามเดือนและปีที่เลือก
        $expense_total = DB::table("transaction_02")
            ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
            ->select('transaction_02.*', 'users.id','users.name','users.faculty',)
            ->where(array('transaction_02.user_id' => $user_id->id))
            ->where('users.faculty', '=', 'เทคโนโลยีการเกษตร')
            ->whereYear('transaction_02.created_at', '=', $select_year)
            ->sum('expense');

        // รายรับตามหมวดหมู่ของผู้ใช้
        $income_cate = DB::table('transaction_02')
            ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
            ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
            ->select('transaction_02.*', 'category_02.topic','users.id','users.name','users.faculty', DB::raw('sum(income) as total_income'))
            ->groupBy('topic')
            ->where(array('transaction_02.user_id' => $user_id->id))
            ->where('transaction_02.category_type', '=', 'รายรับ')
            ->where('users.faculty', '=', 'เทคโนโลยีการเกษตร')
            ->whereYear('transaction_02.created_at', '=', $select_year)
            ->get();

        //ผลรวมรายรับตามเดือนและปีที่เลือก
        $income_total = DB::table("transaction_02")
            ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
            ->select('transaction_02.*', 'users.id','users.name','users.faculty',)
            ->where(array('transaction_02.user_id' => $user_id->id))
            ->where('users.faculty', '=', 'เทคโนโลยีการเกษตร')
            ->whereYear('transaction_02.created_at', '=', $select_year)
            ->sum('income');

        return view(
                'admin.faculty.faculty_per.faculty_show_05',
                compact(
                    'expense_cate',
                    'expense_total',
                    'income_cate',
                    'income_total',
                    'select_year',
                    'user_id',
                )
            );
    }

    public function faculty_show_06($id, $select_year)
    {
        $user_id = User::findOrFail($id);

        // รายจ่ายตามหมวดหมู่ของผู้ใช้
        $expense_cate = DB::table('transaction_02')
            ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
            ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
            ->select('transaction_02.*', 'category_02.topic', 'users.id','users.name','users.faculty', DB::raw('sum(expense) as total_expense'))
            ->groupBy('topic')
            ->where(array('transaction_02.user_id' => $user_id->id))
            ->where('transaction_02.category_type', '=', 'รายจ่าย')
            ->where('users.faculty', '=', 'มนุษยศาสตร์และสังคมศาสตร์')
            ->whereYear('transaction_02.created_at', '=', $select_year)
            ->get();

        //ผลรวมรายจ่ายตามเดือนและปีที่เลือก
        $expense_total = DB::table("transaction_02")
            ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
            ->select('transaction_02.*', 'users.id','users.name','users.faculty',)
            ->where(array('transaction_02.user_id' => $user_id->id))
            ->where('users.faculty', '=', 'มนุษยศาสตร์และสังคมศาสตร์')
            ->whereYear('transaction_02.created_at', '=', $select_year)
            ->sum('expense');

        // รายรับตามหมวดหมู่ของผู้ใช้
        $income_cate = DB::table('transaction_02')
            ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
            ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
            ->select('transaction_02.*', 'category_02.topic','users.id','users.name','users.faculty', DB::raw('sum(income) as total_income'))
            ->groupBy('topic')
            ->where(array('transaction_02.user_id' => $user_id->id))
            ->where('transaction_02.category_type', '=', 'รายรับ')
            ->where('users.faculty', '=', 'มนุษยศาสตร์และสังคมศาสตร์')
            ->whereYear('transaction_02.created_at', '=', $select_year)
            ->get();

        //ผลรวมรายรับตามเดือนและปีที่เลือก
        $income_total = DB::table("transaction_02")
            ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
            ->select('transaction_02.*', 'users.id','users.name','users.faculty',)
            ->where(array('transaction_02.user_id' => $user_id->id))
            ->where('users.faculty', '=', 'มนุษยศาสตร์และสังคมศาสตร์')
            ->whereYear('transaction_02.created_at', '=', $select_year)
            ->sum('income');

        return view(
                'admin.faculty.faculty_per.faculty_show_06',
                compact(
                    'expense_cate',
                    'expense_total',
                    'income_cate',
                    'income_total',
                    'select_year',
                    'user_id',
                )
            );
    }

    public function faculty_show_07($id, $select_year)
    {
        $user_id = User::findOrFail($id);

        // รายจ่ายตามหมวดหมู่ของผู้ใช้
        $expense_cate = DB::table('transaction_02')
            ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
            ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
            ->select('transaction_02.*', 'category_02.topic', 'users.id','users.name','users.faculty', DB::raw('sum(expense) as total_expense'))
            ->groupBy('topic')
            ->where(array('transaction_02.user_id' => $user_id->id))
            ->where('transaction_02.category_type', '=', 'รายจ่าย')
            ->where('users.faculty', '=', 'สาธารณสุขศาสตร์')
            ->whereYear('transaction_02.created_at', '=', $select_year)
            ->get();

        //ผลรวมรายจ่ายตามเดือนและปีที่เลือก
        $expense_total = DB::table("transaction_02")
            ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
            ->select('transaction_02.*', 'users.id','users.name','users.faculty',)
            ->where(array('transaction_02.user_id' => $user_id->id))
            ->where('users.faculty', '=', 'สาธารณสุขศาสตร์')
            ->whereYear('transaction_02.created_at', '=', $select_year)
            ->sum('expense');

        // รายรับตามหมวดหมู่ของผู้ใช้
        $income_cate = DB::table('transaction_02')
            ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
            ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
            ->select('transaction_02.*', 'category_02.topic','users.id','users.name','users.faculty', DB::raw('sum(income) as total_income'))
            ->groupBy('topic')
            ->where(array('transaction_02.user_id' => $user_id->id))
            ->where('transaction_02.category_type', '=', 'รายรับ')
            ->where('users.faculty', '=', 'สาธารณสุขศาสตร์')
            ->whereYear('transaction_02.created_at', '=', $select_year)
            ->get();

        //ผลรวมรายรับตามเดือนและปีที่เลือก
        $income_total = DB::table("transaction_02")
            ->leftJoin('users', 'transaction_02.user_id', '=', 'users.id')
            ->select('transaction_02.*', 'users.id','users.name','users.faculty',)
            ->where(array('transaction_02.user_id' => $user_id->id))
            ->where('users.faculty', '=', 'สาธารณสุขศาสตร์')
            ->whereYear('transaction_02.created_at', '=', $select_year)
            ->sum('income');

        return view(
                'admin.faculty.faculty_per.faculty_show_07',
                compact(
                    'expense_cate',
                    'expense_total',
                    'income_cate',
                    'income_total',
                    'select_year',
                    'user_id',
                )
            );
    }
}
