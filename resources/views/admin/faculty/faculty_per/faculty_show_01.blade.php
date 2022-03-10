@extends('layouts.admin.main')

@section('content')
    <div class="container-fluid">
     
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-1 font-weight-bold text-gray-800">ข้อมูล {{$user_id->name}} ปี {{$select_year + 543}} คณะ {{$user_id->faculty}}</h5> 
                    </div>
                    <div class="card-body">

                        <a href="{{ url()->previous() }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>ย้อนกลับ</button></a>
                        
                        <br><br>
                                                                
                        <div class="col-xl-12 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 ">
                                <div class="card-header py-2">
                                    <h5 class="m-1 font-weight-bold text-gray-800">รายจ่ายตามหมวดหมู่ทั้งหมด</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <table class="table table-bordered dataTable" id="dataTable" width="100%"
                                            cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                            style="width: 100%;">

                                            <table class="table dataTable">
                                                <thead class="h5 mb-1 font-weight-bold text-dark text-uppercase">
                                                    <tr>
                                                        <th>ลำดับ</th>
                                                        <th>ชื่อหมวดหมู่</th>
                                                        <th>จำนวน(บาท)</th>
                                                        <th>เปอร์เซ็นจากยอดรวม</th>
                                                    </tr>
                                                </thead>
                                                @foreach ($expense_cate as $item)
                                                    <tbody class="h5 mb-1 font-weight-bold text-dark text-uppercase">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td> {{ $item->topic }}</td>
                                                        <td> {{ number_format($item->total_expense, 2, '.', ',') }}</td>
                                                        <td>
                                                            {{ number_format(($item->total_expense / $expense_total) * 100, 2, '.', ',') }}
                                                            <a class="h5 mb-1 font-weight-bold text-dark text-uppercase"> %
                                                            </a>
                                                        </td>
                                                    </tbody>
                                                @endforeach
                                                <tr class="h5 mb-1 font-weight-bold text-dark text-uppercase">
                                                    <th></th>
                                                    <th>รวม
                                                    <td>{{ $expense_total }}</td>
                                                    </th>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <div class="col-xl-12 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 ">
                                <div class="card-header py-2">
                                    <h5 class="m-1 font-weight-bold text-gray-800">รายรับตามหมวดหมู่ทั้งหมด</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <table class="table table-bordered dataTable" id="dataTable" width="100%"
                                            cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                            style="width: 100%;">

                                            <table class="table dataTable">
                                                <thead class="h5 mb-1 font-weight-bold text-dark text-uppercase">
                                                    <tr>
                                                        <th>ลำดับ</th>
                                                        <th>ชื่อหมวดหมู่</th>
                                                        <th>จำนวน(บาท)</th>
                                                        <th>เปอร์เซ็นจากยอดรวม</th>
                                                    </tr>
                                                </thead>
                                                @foreach ($income_cate as $item)
                                                    <tbody class="h5 mb-1 font-weight-bold text-dark text-uppercase">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td> {{ $item->topic }}</td>
                                                        <td> {{ number_format($item->total_income, 2, '.', ',') }}</td>
                                                        <td>
                                                            {{ number_format(($item->total_income / $income_total) * 100, 2, '.', ',') }}
                                                            <a class="h5 mb-1 font-weight-bold text-dark text-uppercase"> %
                                                            </a>
                                                        </td>
                                                    </tbody>
                                                @endforeach
                                                <tr class="h5 mb-1 font-weight-bold text-dark text-uppercase">
                                                    <th></th>
                                                    <th>รวม
                                                    <td>{{ $income_total }}</td>
                                                    </th>
                                                </tr>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           
        
    </div>
@endsection
