<?php

namespace App\Http\Controllers\Admin;

use App\Category_02;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Transaction_02;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    
    public function index(Request $request)
    {
        $perPage = 10;
        $keyword = $request->get('search'); 

        if (!empty($keyword)) {
            $category = Category_02::where('type', 'LIKE', "%$keyword%")
                ->orWhere('topic', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $category = Category_02::latest()->paginate($perPage);
        }

        return view('admin.category.category_index', compact('category'));
    }

  
    public function create()
    {
        return view('admin.category.category_create');
    }

   
    public function store(Request $request)
    {
        $requestData = $request->all();
        // $user_id = Auth::id();
        // $requestData["user_id"] = $user_id;
   
        Category_02::create($requestData);
       
        return redirect('category')->with('flash_message', 'Crud added!');
    }

   
    public function show($id)
    {
        //
    }

  
    public function edit($category_id)
    {
       
        $category = Category_02::findOrFail($category_id);

        return view('admin.category.category_edit', compact('category'));
    }

    
    public function update(Request $request, $category_id)
    {
        $requestData = $request->all();
        
        $category = Category_02::findOrFail($category_id);
        $category->update($requestData);

        return redirect('category')->with('flash_message', 'Crud updated!');
    }

  
    public function destroy($category_id)
    {
        Category_02::destroy($category_id);

        return redirect('category')->with('flash_message', 'Crud deleted!');
    }
}
