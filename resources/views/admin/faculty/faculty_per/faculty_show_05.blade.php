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
                                            <div class="row">
                                              
                                                <div class="col-xl-3 col-md-6 mb-4 ">
                                                    @foreach ($expense_cate as $item)
                                                    <hr>
                                                        <div class="h6 font-weight-bold text-gray-800">
                                                            {{ $item->topic }} <br>
                                                        </div>
                                                    @endforeach
                                                    <hr>
                                                    <div class="h6 font-weight-bold text-gray-800">
                                                        รวม <br>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6 mb-4 ">
                                                    @foreach ($expense_cate as $item)
                                                    <hr>
                                                        <div class="h6 font-weight-bold text-gray-800">
                                                            <a class="h6 mb-1 font-weight-bold text-danger text-uppercase">
                                                                {{ number_format($item->total_expense, 2, '.', ',') }}</a> บาท<br>
                                                        </div>
                                                    @endforeach
                                                    <hr>
                                                    <div class="h6 font-weight-bold text-gray-800">
                                                      <a class="h6 mb-1 font-weight-bold text-danger text-uppercase">  {{$expense_total}} </a>บาท<br>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6 mb-3 ">
                                                    @foreach ($expense_cate as $item)
                                                    <hr>
                                                        <div class="h6 font-weight-bold text-danger">
                                                            <a class="h6 mb-1 font-weight-bold text-dark text-uppercase">คิดเป็น : </a>
                                                                {{ number_format($item->total_expense/$expense_total * 100 , 2, '.', ',') }} 
                                                            <a class="h6 mb-1 font-weight-bold text-dark text-uppercase"> % ของยอดรวม </a><br>
                                                        </div>
                                                    @endforeach
                                                    <hr>
                                                </div>
        
                                            </div>
        
                                            {{-- <div class="panel-body" align="center">
                                                <div id="pie_chart" style="width:150px; height:100px;"></div>   
                                            </div> --}}
        
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
                                            <div class="row">
                                              
                                                <div class="col-xl-3 col-md-6 mb-4 ">
                                                    @foreach ($income_cate as $item)
                                                    <hr>
                                                        <div class="h6 font-weight-bold text-gray-800">
                                                            {{ $item->topic }} <br>
                                                        </div>
                                                    @endforeach
                                                    <hr>
                                                    <div class="h6 font-weight-bold text-gray-800">
                                                        รวม <br>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6 mb-4 ">
                                                    @foreach ($income_cate as $item)
                                                    <hr>
                                                        <div class="h6 font-weight-bold text-gray-800">
                                                            <a class="h6 mb-1 font-weight-bold text-primary text-uppercase">
                                                                {{ number_format($item->total_income, 2, '.', ',') }}</a> บาท<br>
                                                        </div>
                                                    @endforeach
                                                    <hr>
                                                    <div class="h6 font-weight-bold text-gray-800">
                                                      <a class="h6 mb-1 font-weight-bold text-primary text-uppercase">  {{$income_total}} </a>บาท<br>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6 mb-3 ">
                                                    @foreach ($income_cate as $item)
                                                    <hr>
                                                        <div class="h6 font-weight-bold text-primary">
                                                            <a class="h6 mb-1 font-weight-bold text-dark text-uppercase">คิดเป็น : </a>
                                                                {{ number_format($item->total_income/$income_total * 100 , 2, '.', ',') }} 
                                                            <a class="h6 mb-1 font-weight-bold text-dark text-uppercase"> % ของยอดรวม </a><br>
                                                        </div>
                                                    @endforeach
                                                    <hr>
                                                </div>
        
                                            </div>
                                            {{-- <h6 class="mb-1 font-weight-bold text-danger text-uppercase ">{{ $expense }}<a
                                            class="h5 mb-1 font-weight-bold text-dark text-uppercase "> บาท</a></h6> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           
        
    </div>
@endsection
