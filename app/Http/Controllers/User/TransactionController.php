<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Transaction;
use App\Transaction_02;
use App\Category_02;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $user_id = Auth::id();

        $perPage = 10;
        $keyword = $request->get('search');

        //ค้นหา ด้วยหมวดหมู่(topic) หรือ ประเภท(category_type)
        if (!empty($keyword)) {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id' ,'=', $user_id)  
                ->select('transaction_02.*', 'category_02.topic')
                ->where('category_type', 'LIKE', "%$keyword%")
                ->orWhere('topic', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
            ->where('transaction_02.user_id' ,'=', $user_id)  
            ->select('transaction_02.*', 'category_02.topic')
            ->latest()->paginate($perPage); 
        }
         
        return view('user.user_tran.tran_index', compact('transaction'));
    }
    
    public function create()
    {
        // $category = Category_02::select('topic')
        // ->get();

        return view('user.user_tran.tran_create' ,compact('category'));
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

    
    public function edit($id)
    {
        $transaction = Transaction_02::findOrFail($id);

        return view('user.user_tran.tran_edit', compact('transaction'));
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
