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

class Admin_UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:แอดมิน');
    }

  
    public function index(Request $request)
    {
        $perPage = 10;
        $keyword = $request->get('search'); 
        // $type = $request->get('dataTable_length');
        switch(Auth::user()->role)
        {
                case "แอดมิน" : 
                    if (!empty($keyword)) {
                        $users = User::Where('name', 'LIKE' , "%$keyword%")
                            ->orWhere('email', 'LIKE' , "%$keyword%")
                            ->orWhere('faculty', 'LIKE' , "%$keyword%")
                            ->Where('role','=', "ผู้ใช้ทั่วไป")
                            ->latest()->paginate($perPage);
                    } else {
                        $users = User::where('role','=', "ผู้ใช้ทั่วไป")    
                        ->latest()->paginate($perPage);
                    }
                    break;
            default : 
                //means guest
                $users = User::where('id',Auth::id() )->latest()->paginate($perPage);      
        }  
        
        return view('admin.admin_user.admin_user', compact('users'));

    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

   

 
    public function show($id)
    {
        $users = User::findOrFail($id);
        return view('admin.admin_user.admin_show', compact('users'));
    }

    
    public function edit($id)
    {
        $users = User::findOrFail($id);

        return view('admin.admin_user.admin_edit', compact('users'));
    }

   
    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        
        $users = User::findOrFail($id);
        $users->update($requestData);

        return redirect('admin_user')->with('flash_message', 'updated!');
    }

  
    public function destroy($id)
    {
        User::destroy($id);

        return redirect('admin_user')->with('flash_message', 'deleted!');
    }
}
