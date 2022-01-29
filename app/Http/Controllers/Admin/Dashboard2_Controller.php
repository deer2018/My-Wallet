<?php

namespace App\Http\Controllers\Admin;

use App\Dashboard2;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class Dashboard2_Controller extends Controller
{
   
    public function index()
    {
         //ผลรวมรายรับทั้งหมด
         $income = DB::table('transaction_02')
         ->sum('income');
        //ผลรวมรายจ่ายทั้งหมด
         $expense = DB::table('transaction_02')
         ->sum('expense');



        return view('admin.dashboard2',compact('income','expense'));
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
