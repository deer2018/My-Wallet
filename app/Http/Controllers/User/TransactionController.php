<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Transaction;
use App\Category;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
       
        $perPage = 25;
        $id = Auth::id();
        $tran = Transaction::latest()->paginate($perPage);
       

        return view('user.user_tran.tran_index', compact('tran'));
    }
    
    public function income()
    {
        return view('user.user_tran.tran_create_income');
    }

    public function expense()
    {
        return view('user.user_tran.tran_create_expense');
    }

  
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        $user_id = Auth::id();
        $requestData["user_id"] = $user_id;
        $requestData["user_id"] = Auth::id();
        
        Transaction::create($requestData);
       

        return redirect('transaction')->with('flash_message', 'Crud added!');
    }

  
    public function show($id)
    {
        $crud = Transaction::findOrFail($id);

        return view('crud.show', compact('crud'));
    }

    
    public function edit_income($id)
    {
        $income = Transaction::findOrFail($id);

        return view('user.user_tran.tran_edit_income', compact('income'));
    }

    public function edit_expense($id)
    {
        $transaction = Transaction::findOrFail($id);

        return view('user.user_tran.tran_edit_expense', compact('transaction'));
    }

   
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $transaction = Transaction::findOrFail($id);
        $transaction->update($requestData);

        return redirect('transaction')->with('flash_message', 'Crud updated!');
    }

    public function destroy($id)
    {
        Transaction::destroy($id);

        return redirect('transaction')->with('flash_message', 'Crud deleted!');
    }
}
