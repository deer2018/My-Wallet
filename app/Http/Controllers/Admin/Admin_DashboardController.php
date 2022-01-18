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

class Admin_DashboardController extends Controller
{
    public function index()
    {
        $income = DB::table('transaction_02')
        ->sum('income');

        $expense = DB::table('transaction_02')
        ->sum('expense');

        $category_income = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
            ->where('category_type' ,'=', 'รายรับ')   
            ->select( DB::raw("sum('income') as total_income") ,'topic')
            ->groupBy('topic')
            ->get();

        $category_expense = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
            ->where('category_type' ,'=', 'รายจ่าย')   
            ->select( DB::raw("sum('expense') as total_expense") ,'topic')
            ->groupBy('topic')
            ->get();

       
        return view('admin.dashboard',compact('income','expense','category_income','category_expense'));
    }
}
