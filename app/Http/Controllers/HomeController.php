<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  
    public function __construct()
    {
        $this->middleware('auth');
    }

   
    public function index()
    {
        if(Auth::user()->role == "แอดมิน"){
            return redirect("dashboard2");
    }else if(Auth::user()->role == "ผู้ใช้ทั่วไป"){
            return redirect("transaction");
    }
    return view("login");
    
    }
}
