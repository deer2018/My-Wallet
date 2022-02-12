<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transaction_02;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Report_incomeController extends Controller
{

    public function jan_income(Request $request,$select_year)
    {
        $user_id = Auth::id();
        $perPage = 50;
        $date = Carbon::now();
        $select = $request->get('category_topic');
        

        // แปลงเลขเดือนเป็นชื่อเดือน
        $monthName = 'มกราคม';
        // แปลงปีค.ศ. เป็น พ.ศ.
        $yearName = $select_year + 543;


        if (!empty($select)) {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายรับ')
                ->select('transaction_02.*', 'category_02.topic')
                ->where('category_02.topic', '=', $select)
                ->whereMonth('transaction_02.created_at', '=', '01')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);
        } else {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายรับ')
                ->select('transaction_02.*', 'category_02.topic')
                ->whereMonth('transaction_02.created_at', '=', '01')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);
        }


        return view('user.user_report.report_sub.income.01_income', compact('transaction', 'monthName', 'yearName', 'select','select_year'));
    }

    public function feb_income(Request $request,$select_year)
    {
        $user_id = Auth::id();
        $perPage = 50;
        $date = Carbon::now();
        $select = $request->get('category_topic');

        // แปลงเลขเดือนเป็นชื่อเดือน
        $monthName = 'กุมภาพันธ์';
        // แปลงปีค.ศ. เป็น พ.ศ.
        $yearName = $select_year + 543;

        if (!empty($select)) {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายรับ')
                ->select('transaction_02.*', 'category_02.topic')
                ->where('category_02.topic', '=', $select)
                ->whereMonth('transaction_02.created_at', '=', '02')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);
        } else {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายรับ')
                ->select('transaction_02.*', 'category_02.topic')
                ->whereMonth('transaction_02.created_at', '=', '02')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);
        }
        return view('user.user_report.report_sub.income.02_income', compact('transaction', 'monthName', 'yearName', 'select','select_year'));
    }

    public function mar_income(Request $request,$select_year)
    {
        $user_id = Auth::id();
        $perPage = 50;
        $date = Carbon::now();
        $select = $request->get('category_topic');

        // แปลงเลขเดือนเป็นชื่อเดือน
        $monthName = 'มีนาคม';
        // แปลงปีค.ศ. เป็น พ.ศ.
        $yearName = $select_year + 543;

        if (!empty($select)) {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายรับ')
                ->select('transaction_02.*', 'category_02.topic')
                ->where('category_02.topic', '=', $select)
                ->whereMonth('transaction_02.created_at', '=', '03')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);
        } else {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายรับ')
                ->select('transaction_02.*', 'category_02.topic')
                ->whereMonth('transaction_02.created_at', '=', '03')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);
        }

        return view('user.user_report.report_sub.income.03_income', compact('transaction', 'monthName', 'yearName', 'select','select_year'));
    }

    public function apr_income(Request $request,$select_year)
    {
        $user_id = Auth::id();
        $perPage = 50;
        $date = Carbon::now();
        $select = $request->get('category_topic');

        // แปลงเลขเดือนเป็นชื่อเดือน
        $monthName = 'เมษายน';
        // แปลงปีค.ศ. เป็น พ.ศ.
        $yearName = $select_year + 543;

        if (!empty($select)) {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายรับ')
                ->select('transaction_02.*', 'category_02.topic')
                ->where('category_02.topic', '=', $select)
                ->whereMonth('transaction_02.created_at', '=', '04')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);
        } else {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายรับ')
                ->select('transaction_02.*', 'category_02.topic')
                ->whereMonth('transaction_02.created_at', '=', '04')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);
        }

        return view('user.user_report.report_sub.income.04_income', compact('transaction', 'monthName', 'yearName', 'select','select_year'));
    }

    public function may_income(Request $request,$select_year)
    {
        $user_id = Auth::id();
        $perPage = 50;
        $date = Carbon::now();
        $select = $request->get('category_topic');

        // แปลงเลขเดือนเป็นชื่อเดือน
        $monthName = 'พฤษภาคม';
        // แปลงปีค.ศ. เป็น พ.ศ.
        $yearName = $select_year + 543;

        if (!empty($select)) {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายรับ')
                ->select('transaction_02.*', 'category_02.topic')
                ->where('category_02.topic', '=', $select)
                ->whereMonth('transaction_02.created_at', '=', '05')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);
        } else {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายรับ')
                ->select('transaction_02.*', 'category_02.topic')
                ->whereMonth('transaction_02.created_at', '=', '05')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);
        }

        return view('user.user_report.report_sub.income.05_income', compact('transaction', 'monthName', 'yearName', 'select','select_year'));
    }

    public function jun_income(Request $request,$select_year)
    {
        $user_id = Auth::id();
        $perPage = 50;
        $date = Carbon::now();
        $select = $request->get('category_topic');
        // แปลงเลขเดือนเป็นชื่อเดือน
        $monthName = 'มิถุนายน';
        // แปลงปีค.ศ. เป็น พ.ศ.
        $yearName = $select_year + 543;

        if (!empty($select)) {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายรับ')
                ->select('transaction_02.*', 'category_02.topic')
                ->where('category_02.topic', '=', $select)
                ->whereMonth('transaction_02.created_at', '=', '06')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);
        } else {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายรับ')
                ->select('transaction_02.*', 'category_02.topic')
                ->whereMonth('transaction_02.created_at', '=', '06')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);
        }

        return view('user.user_report.report_sub.income.06_income', compact('transaction', 'monthName', 'yearName', 'select','select_year'));
    }

    public function jul_income(Request $request,$select_year)
    {
        $user_id = Auth::id();
        $perPage = 50;
        $date = Carbon::now();
        $select = $request->get('category_topic');
        // แปลงเลขเดือนเป็นชื่อเดือน
        $monthName = 'กรกฎาคม';
        // แปลงปีค.ศ. เป็น พ.ศ.
        $yearName = $select_year + 543;

        if (!empty($select)) {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายรับ')
                ->select('transaction_02.*', 'category_02.topic')
                ->where('category_02.topic', '=', $select)
                ->whereMonth('transaction_02.created_at', '=', '07')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);
        } else {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายรับ')
                ->select('transaction_02.*', 'category_02.topic')
                ->whereMonth('transaction_02.created_at', '=', '07')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);
        }

        return view('user.user_report.report_sub.income.07_income', compact('transaction', 'monthName', 'yearName'));
    }

    public function aug_income(Request $request,$select_year)
    {
        $user_id = Auth::id();
        $perPage = 50;
        $date = Carbon::now();
        $select = $request->get('category_topic');
        // แปลงเลขเดือนเป็นชื่อเดือน
        $monthName = 'สิงหาคม';
        // แปลงปีค.ศ. เป็น พ.ศ.
        $yearName = $select_year + 543;

        if (!empty($select)) {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายรับ')
                ->select('transaction_02.*', 'category_02.topic')
                ->where('category_02.topic', '=', $select)
                ->whereMonth('transaction_02.created_at', '=', '08')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);
        } else {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายรับ')
                ->select('transaction_02.*', 'category_02.topic')
                ->whereMonth('transaction_02.created_at', '=', '08')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);
        }

        return view('user.user_report.report_sub.income.08_income', compact('transaction', 'monthName', 'yearName', 'select','select_year'));
    }

    public function sep_income(Request $request,$select_year)
    {
        $user_id = Auth::id();
        $perPage = 50;
        $date = Carbon::now();
        $select = $request->get('category_topic');
        // แปลงเลขเดือนเป็นชื่อเดือน
        $monthName = 'กันยายน';
        // แปลงปีค.ศ. เป็น พ.ศ.
        $yearName = $select_year + 543;

        if (!empty($select)) {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายรับ')
                ->select('transaction_02.*', 'category_02.topic')
                ->where('category_02.topic', '=', $select)
                ->whereMonth('transaction_02.created_at', '=', '09')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);
        } else {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายรับ')
                ->select('transaction_02.*', 'category_02.topic')
                ->whereMonth('transaction_02.created_at', '=', '09')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);
        }

        return view('user.user_report.report_sub.income.09_income', compact('transaction', 'monthName', 'yearName', 'select','select_year'));
    }

    public function oct_income(Request $request,$select_year)
    {
        $user_id = Auth::id();
        $perPage = 50;
        $date = Carbon::now();
        $select = $request->get('category_topic');
        // แปลงเลขเดือนเป็นชื่อเดือน
        $monthName = 'ตุลาคม';
        // แปลงปีค.ศ. เป็น พ.ศ.
        $yearName = $select_year + 543;

        if (!empty($select)) {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายรับ')
                ->select('transaction_02.*', 'category_02.topic')
                ->where('category_02.topic', '=', $select)
                ->whereMonth('transaction_02.created_at', '=', '10')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);
        } else {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายรับ')
                ->select('transaction_02.*', 'category_02.topic')
                ->whereMonth('transaction_02.created_at', '=', '10')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);
        }

        return view('user.user_report.report_sub.income.10_income', compact('transaction', 'monthName', 'yearName', 'select','select_year'));
    }

    public function nov_income(Request $request,$select_year)
    {
        $user_id = Auth::id();
        $perPage = 50;
        $date = Carbon::now();
        $select = $request->get('category_topic');
        // แปลงเลขเดือนเป็นชื่อเดือน
        $monthName = 'พฤศจิกายน';
        // แปลงปีค.ศ. เป็น พ.ศ.
        $yearName = $select_year + 543;

        if (!empty($select)) {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายรับ')
                ->select('transaction_02.*', 'category_02.topic')
                ->where('category_02.topic', '=', $select)
                ->whereMonth('transaction_02.created_at', '=', '11')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);
        } else {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายรับ')
                ->select('transaction_02.*', 'category_02.topic')
                ->whereMonth('transaction_02.created_at', '=', '11')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);
        }

        return view('user.user_report.report_sub.income.11_income', compact('transaction', 'monthName', 'yearName', 'select','select_year'));
    }

    public function dec_income(Request $request,$select_year)
    {
        $user_id = Auth::id();
        $perPage = 50;
        $date = Carbon::now();
        $select = $request->get('category_topic');
        // แปลงเลขเดือนเป็นชื่อเดือน
        $monthName = 'ธันวาคม';
        // แปลงปีค.ศ. เป็น พ.ศ.
        $yearName = $select_year + 543;

        if (!empty($select)) {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายรับ')
                ->select('transaction_02.*', 'category_02.topic')
                ->where('category_02.topic', '=', $select)
                ->whereMonth('transaction_02.created_at', '=', '12')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);
        } else {
            $transaction = Transaction_02::join('category_02', 'transaction_02.category_id', '=', 'category_02.category_id')
                ->where('transaction_02.user_id', '=', $user_id)
                ->where('transaction_02.category_type', '=', 'รายรับ')
                ->select('transaction_02.*', 'category_02.topic')
                ->whereMonth('transaction_02.created_at', '=', '12')
                ->whereYear('transaction_02.created_at', '=', $select_year)
                ->orderBy('transaction_02.created_at', 'desc')->paginate($perPage);
        }

        return view('user.user_report.report_sub.income.12_income', compact('transaction', 'monthName', 'yearName', 'select','select_year'));
    }
}
