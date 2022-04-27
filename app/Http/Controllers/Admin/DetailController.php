<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Transaction_02;
use App\Detail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{
    public function index()
    {
 
            $detail = Detail::latest()->paginate(20);
     

        return view('admin.detail.detail_index', compact('detail'));
    }

}
