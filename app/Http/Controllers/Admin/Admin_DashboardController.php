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

       
        return view('admin.dashboard',compact('income','expense'));
    }
}
