<?php

namespace App\Http\Controllers\Admin;

use App\Dashboard2;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Transaction_02;
use Carbon\Carbon;
use App\User;

class Dashboard2_Controller extends Controller
{

    public function index()
    {
        //นับจำนวนผู้ใช้ทั้งหมด
        $user_amount = User::select('users.id', 'users.faculty')
            ->where('role', '=', 'ผู้ใช้ทั่วไป')
            ->count();

        //นับจำนวนผู้ใช้ คณะครุศาสตร์
        $b_ed = User::select('users.id', 'users.faculty')
            ->where('role', '=', 'ผู้ใช้ทั่วไป')
            ->where('faculty', '=', 'ครุศาสตร์')
            ->count();

        //นับจำนวนผู้ใช้ คณะวิทยาการจัดการ
        $management = User::select('users.id', 'users.faculty')
            ->where('role', '=', 'ผู้ใช้ทั่วไป')
            ->where('faculty', '=', 'วิทยาการจัดการ')
            ->count();

        //นับจำนวนผู้ใช้ คณะวิทยาศาสตร์และเทคโนโลยี
        $scitech = User::select('users.id', 'users.faculty')
            ->where('role', '=', 'ผู้ใช้ทั่วไป')
            ->where('faculty', '=', 'วิทยาศาสตร์และเทคโนโลยี')
            ->count();

        //นับจำนวนผู้ใช้ คณะเทคโนโลยีอุตสาหกรรม
        $industrial = User::select('users.id', 'users.faculty')
            ->where('role', '=', 'ผู้ใช้ทั่วไป')
            ->where('faculty', '=', 'เทคโนโลยีอุตสาหกรรม')
            ->count();

        //นับจำนวนผู้ใช้ คณะเทคโนโลยีการเกษตร
        $agricultural = User::select('users.id', 'users.faculty')
            ->where('role', '=', 'ผู้ใช้ทั่วไป')
            ->where('faculty', '=', 'เทคโนโลยีการเกษตร')
            ->count();

        //นับจำนวนผู้ใช้ คณะมนุษยศาสตร์และสังคมศาสตร์
        $humanities = User::select('users.id', 'users.faculty')
            ->where('role', '=', 'ผู้ใช้ทั่วไป')
            ->where('faculty', '=', 'มนุษยศาสตร์และสังคมศาสตร์')
            ->count();

        //นับจำนวนผู้ใช้ คณะสาธารณสุขศาสตร์
        $public_h = User::select('users.id', 'users.faculty')
            ->where('role', '=', 'ผู้ใช้ทั่วไป')
            ->where('faculty', '=', 'สาธารณสุขศาสตร์')
            ->count();

        $no_faculty = User::select('users.id', 'users.faculty')
            ->where('role', '=', 'ผู้ใช้ทั่วไป')
            ->whereNull('faculty')
            ->count();


        //ผลรวมรายรับทั้งหมด
        $income = DB::table('transaction_02')
            ->sum('income');
        //ผลรวมรายจ่ายทั้งหมด
        $expense = DB::table('transaction_02')
            ->sum('expense');

        // รายรับตามหมวดหมู่ของทุกผู้ใช้
        $income_cate = DB::table('transaction_02')
            ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
            ->select('transaction_02.*', 'category_02.topic', DB::raw('sum(income) as total_income'))
            ->groupBy('topic')
            ->where('transaction_02.category_type', '=', 'รายรับ')
            ->get();

        // รายจ่ายตามหมวดหมู่ของทุกผู้ใช้
        $expense_cate = DB::table('transaction_02')
            ->leftJoin('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
            ->select('transaction_02.*', 'category_02.topic', DB::raw('sum(expense) as total_expense'))
            ->groupBy('topic')
            ->where('transaction_02.category_type', '=', 'รายจ่าย')
            ->get();



        return view(
            'admin.dashboard2',
            compact(
                'income',
                'expense',
                'user_amount',
                'b_ed',
                'management',
                'scitech',
                'industrial',
                'agricultural',
                'humanities',
                'public_h',
                'no_faculty',
                'income_cate',
                'expense_cate',
            )
        );
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Dashboard2 $dashboard2)
    {
        //
    }


    public function edit(Dashboard2 $dashboard2)
    {
        //
    }


    public function update(Request $request, Dashboard2 $dashboard2)
    {
        //
    }


    public function destroy(Dashboard2 $dashboard2)
    {
        //
    }
}
