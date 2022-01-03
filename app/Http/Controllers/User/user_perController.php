<?php

namespace App\Http\Controllers\API;
namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use App\Tambon;
use Illuminate\Http\Request;

class user_perController extends Controller
{
    
    public function index()
    {
        {
            $id = Auth::id();
            $data = User::findOrFail($id);
    
            return view('/user/user_personal/user_personal', compact('data'));
        }
    }

  
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        $requestData = $request->all();
        
        User::create($requestData);

        return redirect('User')->with('flash_message', 'User added!');
    }

   
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
         if (Auth::id()  == $id){

            $User = User::findOrFail($id);

            return view('user.user_personal.user_edit', compact('User'));

         }else
         return view('404');
        
    }

   
    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        
        $User = User::findOrFail($id);
        $User->update($requestData);

        return redirect('user_personal')->with('flash_message', 'volunteer_per updated!');
    }

    
    public function destroy($id)
    {
        //
    }

    // public function getProvinces()
    // {
    //     $provinces = Tambon::groupBy('province_code')->get();
    //     return $provinces;
    // }
    // public function getAmphoes($province)
    // {
    //     $amphoes = Tambon::where('province',$province)
    //         ->groupBy('amphoe_code')
    //         ->get();
    //     return $amphoes;
    // }
    // public function getTambons($province,$amphoe)
    // {
    //     $tambons = Tambon::where('province',$province)
    //         ->where('amphoe',$amphoe)
    //         ->groupBy('tambon_code')
    //         ->get();
    //     return $tambons;
    // }
    // public function getZipcodes($province,$amphoe,$tambon)
    // {
    //     $zipcodes = Tambon::where('province',$province)
    //         ->where('amphoe',$amphoe)        
    //         ->where('tambon',$tambon)
    //         ->get();
    //     return $zipcodes;
    // }

}
