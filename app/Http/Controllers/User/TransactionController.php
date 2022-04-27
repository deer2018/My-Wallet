<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Transaction;
use App\Transaction_02;
use App\User;
use App\Category_02;
use App\Detail;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $user_id = Auth::id();

        $sum_income = 0;
        $sum_expense = 0;

        $perPage = 10;
        $keyword = $request->get('search');

        // รับค่าจากปุ่มเสริจ
        $startDate = $request->get('date-start');
        $endDate = $request->get('date-end');
        $type = $request->get('category_type');
        $topic = $request->get('category_topic');
        
        //ค้นหาด้วยปุ่ม Search
        if (!empty( $keyword )) {
            {
                // ถ้าระยะเวลา และ ปุ่มเสริจ ไม่ใช่ค่าว่าง ให้แสดง
                if (!empty($startDate && $endDate )){
                    $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                    ->where('transaction_02.user_id' ,'=', $user_id)  
                    ->select('transaction_02.*', 'category_02.topic')
                    ->whereBetween('transaction_02.created_at', [$startDate." 00:00:00", $endDate." 23:59:59"])
                    ->where('category_type', 'LIKE', "%$keyword%")
                    ->orWhere('category_02.topic', 'LIKE', "%$keyword%")
                    ->where('transaction_02.user_id' ,'=', $user_id) 
                    ->orderBy('created_at','desc')->paginate($perPage);

                    // $sum_income += $transaction['income'];
                    // $sum_expense += $transaction['expense'];
                    // $transaction_total = $sum_income - $sum_expense;
                }
                else {
                    // ถ้าระยะเวลาเริ่มต้นและสิ้นสุด เป็นค่าว่าง แต่ปุ่มเสริจ ไม่ใช่ค่าว่าง ให้แสดง
                    if(empty($startDate && $endDate )){
                        $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                        ->where('transaction_02.user_id' ,'=', $user_id)  
                        ->select('transaction_02.*', 'category_02.topic')
                        ->where('category_type', 'LIKE', "%$keyword%")
                        ->orWhere('topic', 'LIKE', "%$keyword%")
                        ->where('transaction_02.user_id' ,'=', $user_id)  
                        ->orderBy('created_at','desc')->paginate($perPage);

                        // $sum_income += $transaction['income'];
                        // $sum_expense += $transaction['expense'];
                        // $transaction_total = $sum_income - $sum_expense;
                    }
                    else{
                        // วันเริ่มต้นไม่เป็นค่าว่าง ให้แสดง
                        if(!empty($startDate)){
                            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                            ->select('transaction_02.*', 'category_02.topic')
                            ->where('transaction_02.created_at', '>=', $startDate)
                            ->where('category_type', 'LIKE', "%$keyword%")
                            ->orWhere('topic', 'LIKE', "%$keyword%")
                            ->where('transaction_02.user_id' ,'=', $user_id)  
                            ->orderBy('created_at','desc')->paginate($perPage);
                        }// วันเริ่มต้นเป็นค่าว่าง ให้แสดง
                        elseif(!empty($endDate)){
                            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                            ->select('transaction_02.*', 'category_02.topic')
                            ->where('transaction_02.user_id' ,'=', $user_id)  
                            ->where('category_type', 'LIKE', "%$keyword%")
                            ->orWhere('topic', 'LIKE', "%$keyword%")
                            ->where('transaction_02.created_at', '<=', $endDate." 23:59:59")
                            ->orderBy('created_at','desc')->paginate($perPage);
                        }
                    } 
                }
            }           
         //ค้นหาด้วยระยะเวลา ประเภท และหมวดหมู่
        } elseif (!empty($startDate || $endDate )) {
            {   
                // วันเริ่มต้น และ วันสิ้นสุด ไม่ใช่ค่าว่าง
                if(!empty($startDate && $endDate )){
                    $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                    ->select('transaction_02.*', 'category_02.topic')
                    ->whereBetween('transaction_02.created_at', [$startDate." 00:00:00",  $endDate." 23:59:59"])
                    ->where('transaction_02.user_id' ,'=', $user_id)  
                    ->orderBy('created_at','desc')->paginate($perPage);
                }else{
                    if(!empty($startDate)){
                        $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                        ->select('transaction_02.*', 'category_02.topic')
                        ->where('transaction_02.created_at', '>=', $startDate)
                        ->where('transaction_02.user_id' ,'=', $user_id)  
                        ->orderBy('created_at','desc')->paginate($perPage);
                    }else{
                        $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                        ->select('transaction_02.*', 'category_02.topic')
                        ->where('transaction_02.created_at', '<=', $endDate." 23:59:59")
                        ->where('transaction_02.user_id' ,'=', $user_id)  
                        ->orderBy('created_at','desc')->paginate($perPage);
                    }
                }  
            }

        } else {
            // หน้าแสดงข้อมูลทั้งหมดแบบไม่ค้นหา
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
            ->where('transaction_02.user_id' ,'=', $user_id)  
            ->select('transaction_02.*', 'category_02.topic')
            ->orderBy('created_at','desc')->paginate($perPage); 

       
        }
         
        return view('user.user_tran.tran_index', compact('transaction','topic','startDate','endDate','type','keyword'));
    }

    
    public function create()
    {
        // $category = Category_02::select('topic')
        // ->get();

        return view('user.user_tran.tran_create' );
    }

    public function store_detail(Request $request)
    {
        $requestData = $request->all();
        $user_id = Auth::id();
        $requestData["user_id"] = $user_id;
        
        Detail::create($requestData);

        return view('user.user_tran.tran_detail' );
    }
    
    public function detail(Request $request)
    {

        return view('user.user_tran.tran_detail' );
    }
    
  
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        $user_id = Auth::id();
        $requestData["user_id"] = $user_id;
        // $requestData["user_id"] = Auth::id();
        
        Transaction_02::create($requestData);
       
        return redirect('transaction')->with('flash_message', 'Crud added!');
    }

    public function show($id)
    {
        $transaction = Transaction_02::findOrFail($id);

        return view('crud.show', compact('crud'));
    }

    
    public function edit_inc($id)
    {
        $transaction = Transaction_02::findOrFail($id);

        return view('user.user_tran.tran_edit_income', compact('transaction'));
    }

    public function edit_exp($id)
    {
        $transaction = Transaction_02::findOrFail($id);

        return view('user.user_tran.tran_edit_expense', compact('transaction'));
    }

    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $transaction = Transaction_02::findOrFail($id);
        $transaction->update($requestData);

        return redirect('transaction')->with('flash_message', 'Crud updated!');
    }

    public function destroy($id)
    {
        Transaction_02::destroy($id);

        return redirect('transaction')->with('flash_message', 'Crud deleted!');
    }
}
