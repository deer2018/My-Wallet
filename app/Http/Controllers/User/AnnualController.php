<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transaction_02;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AnnualController extends Controller
{
  
    public function jan_income(Request $request)
    { 
        $user_id = Auth::id();
        $perPage = 50;
        $date = Carbon::now();

    
         // แปลงเลขเดือนเป็นชื่อเดือน
         $monthName = 'มกราคม';
         // แปลงปีค.ศ. เป็น พ.ศ.
         $yearName = $date->format('Y') + 543;

       
        $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
        ->where('transaction_02.user_id' ,'=', $user_id)
        ->where('transaction_02.category_type' ,'=', 'รายรับ')
        ->select('transaction_02.*', 'category_02.topic')
        ->whereMonth('transaction_02.created_at', '=', '01')
        ->whereYear('transaction_02.created_at', Carbon::parse($date)->year)
        ->orderBy('created_at','desc')->paginate($perPage);      
        

        return view('user.user_report.report_sub.income', compact('transaction','monthName','yearName'));
    }

    public function jan_expense()
    {
        $user_id = Auth::id();
        $perPage = 50;
        $date = Carbon::now();

         // แปลงเลขเดือนเป็นชื่อเดือน
         $monthName = 'มกราคม';
         // แปลงปีค.ศ. เป็น พ.ศ.
         $yearName = $date->format('Y') + 543;

        $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
        ->where('transaction_02.user_id' ,'=', $user_id)
        ->where('transaction_02.category_type' ,'=', 'รายจ่าย')
        ->select('transaction_02.*', 'category_02.topic')
        ->whereMonth('transaction_02.created_at', '=', '01')
        ->whereYear('transaction_02.created_at', Carbon::parse($date)->year)
        ->orderBy('transaction_02.created_at','desc')->paginate($perPage); 
        
        return view('user.user_report.report_sub.expense', compact('transaction','monthName','yearName'));
    }
    
}