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
       
        $perPage = 10;
        $keyword = $request->get('search');

        if (!empty($keyword)) {
            $transaction = Transaction::Where('category_type', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
            // $users = User::join('_q1_4', 'users.id', '=', '_q1_4.user_id')
            // ->leftJoin('diagnosis', 'users.id', '=', 'diagnosis.user_id')
            // ->where('role', "อาสาสมัคร")
            // ->where('name', 'LIKE' , "%$keyword%")
            // ->select('users.*', '_q1_4.group', 'diagnosis.advice')
            // ->latest()->paginate($perPage);
        } else {
            $transaction = Transaction::orderby('id', 'desc')->paginate($perPage); 
        }
         
        return view('user.user_tran.tran_index', compact('transaction'));
    }
    
    public function create()
    {
        return view('user.user_tran.tran_create');
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

    
    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);

        return view('user.user_tran.tran_edit', compact('transaction'));
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
