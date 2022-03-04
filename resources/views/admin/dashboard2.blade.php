@extends('layouts.admin.main')

@section('content')
    <div class="container-fluid">

        <div class="row">

            {{-- จำนวนผู้ใช้ในเว็บ --}}
            <div class="col-xl-12 col-md-6 mb-4">
                <div class="card  shadow h-100 ">
                    <div class="card-header py-2">
                        <h4 class="m-1 font-weight-bold text-gray-800">จำนวนผู้ใช้เว็บไซต์ทั้งหมด {{ $user_amount }} คน
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <h5 class="mb-1 font-weight-bold text-success text-uppercase ">
                                    <a class="h5 mb-1 font-weight-bold text-dark text-uppercase ">คณะครุศาสตร์
                                    </a> &nbsp;&nbsp;{{ $b_ed }}
                                    <a class="h4 mb-1 font-weight-bold text-dark text-uppercase "> &nbsp;&nbsp;คน</a>
                                </h5>
                                <a href="{{ url('/faculty01') }}" title="Edit Crud"><button
                                        class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                            aria-hidden="true"></i>รายละเอียด</button></a>
                                <hr>
                                <h5 class="mb-1 font-weight-bold text-success text-uppercase ">
                                    <a class="h5 mb-1 font-weight-bold text-dark text-uppercase ">คณะวิทยาการจัดการ
                                    </a> &nbsp;&nbsp;{{ $management }}
                                    <a class="h4 mb-1 font-weight-bold text-dark text-uppercase "> &nbsp;&nbsp;คน</a>
                                </h5>
                                <a href="{{ url('/faculty02') }}" title="Edit Crud"><button
                                        class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                            aria-hidden="true"></i>รายละเอียด</button></a>
                                <hr>
                                <h5 class="mb-1 font-weight-bold text-success text-uppercase ">
                                    <a class="h5 mb-1 font-weight-bold text-dark text-uppercase ">คณะวิทยาศาสตร์และเทคโนโลยี
                                    </a> &nbsp;&nbsp;{{ $scitech }}
                                    <a class="h4 mb-1 font-weight-bold text-dark text-uppercase "> &nbsp;&nbsp;คน</a>
                                </h5>
                                <a href="{{ url('/faculty03') }}" title="Edit Crud"><button
                                        class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                            aria-hidden="true"></i>รายละเอียด</button></a>
                                <hr>
                                <h5 class="mb-1 font-weight-bold text-success text-uppercase ">
                                    <a class="h5 mb-1 font-weight-bold text-dark text-uppercase ">คณะเทคโนโลยีอุตสาหกรรม
                                    </a> &nbsp;&nbsp;{{ $industrial }}
                                    <a class="h4 mb-1 font-weight-bold text-dark text-uppercase "> &nbsp;&nbsp;คน</a>
                                </h5>
                                <a href="{{ url('/faculty04') }}" title="Edit Crud"><button
                                    class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                        aria-hidden="true"></i>รายละเอียด</button></a>
                                <hr>
                                <h5 class="mb-1 font-weight-bold text-success text-uppercase ">
                                    <a class="h5 mb-1 font-weight-bold text-dark text-uppercase ">คณะเทคโนโลยีการเกษตร
                                    </a> &nbsp;&nbsp;{{ $agricultural }}
                                    <a class="h4 mb-1 font-weight-bold text-dark text-uppercase "> &nbsp;&nbsp;คน</a>
                                </h5>
                                <a href="{{ url('/faculty05') }}" title="Edit Crud"><button
                                        class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                            aria-hidden="true"></i>รายละเอียด</button></a>
                                <hr>
                                <h5 class="mb-1 font-weight-bold text-success text-uppercase ">
                                    <a class="h5 mb-1 font-weight-bold text-dark text-uppercase ">คณะมนุษยศาสตร์และสังคมศาสตร์
                                    </a> &nbsp;&nbsp;{{ $humanities }}
                                    <a class="h4 mb-1 font-weight-bold text-dark text-uppercase "> &nbsp;&nbsp;คน</a>
                                </h5>
                                <a href="{{ url('/faculty06') }}" title="Edit Crud"><button
                                        class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                            aria-hidden="true"></i>รายละเอียด</button></a>
                                <hr>
                                <h5 class="mb-1 font-weight-bold text-success text-uppercase ">
                                    <a class="h5 mb-1 font-weight-bold text-dark text-uppercase ">คณะสาธารณสุขศาสตร์
                                    </a> &nbsp;&nbsp;{{ $public_h }}
                                    <a class="h4 mb-1 font-weight-bold text-dark text-uppercase "> &nbsp;&nbsp;คน</a>
                                </h5>
                                <a href="{{ url('/faculty07') }}" title="Edit Crud"><button
                                        class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                            aria-hidden="true"></i>รายละเอียด</button></a>
                                <hr>
                                <h5 class="mb-1 font-weight-bold text-success text-uppercase ">
                                    <a class="h5 mb-1 font-weight-bold text-dark text-uppercase ">ไม่มีข้อมูลคณะ
                                    </a> &nbsp;&nbsp;{{ $no_faculty }}
                                    <a class="h4 mb-1 font-weight-bold text-dark text-uppercase "> &nbsp;&nbsp;คน</a>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <hr>

        {{-- <div class="row">


             รายรับ 
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 ">
                    <div class="card-header py-2">
                        <h4 class="m-1 font-weight-bold text-gray-800">รายรับทั้งหมด</h4>
                    </div>
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                               
                                <h5 class="mb-1 font-weight-bold text-primary text-uppercase ">{{ $income }}<a
                                        class="h5 mb-1 font-weight-bold text-dark text-uppercase "> บาท</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

             รายจ่าย 
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 ">
                    <div class="card-header py-2">
                        <h4 class="m-1 font-weight-bold text-gray-800">รายจ่ายทั้งหมด</h4>
                    </div>
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                           
                                <h5 class="mb-1 font-weight-bold text-danger text-uppercase ">{{ $expense }}<a
                                        class="h4 mb-1 font-weight-bold text-dark text-uppercase "> บาท</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div> --}}

        {{-- <div class="row">


       
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 ">
                    <div class="card-header py-2">
                        <h4 class="m-1 font-weight-bold text-gray-800">รายรับตามหมวดหมู่ทั้งหมด</h4>
                    </div>
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="row">
                                    <div class="col-xl-5 col-md-6 mb-4 ">
                                        @foreach ($income_cate as $item)
                                            <div class="h5 font-weight-bold text-gray-800">
                                                {{ $item->topic }} <br>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="col-xl-5 col-md-6 mb-4 ">
                                        @foreach ($income_cate as $item)
                                            <div class="h5 font-weight-bold text-gray-800">
                                                <a class="h5 mb-1 font-weight-bold text-primary text-uppercase">
                                                    {{ number_format($item->total_income, 2, '.', ',') }}</a> บาท<br>
                                            </div>
                                        @endforeach
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 ">
                    <div class="card-header py-2">
                        <h4 class="m-1 font-weight-bold text-gray-800">รายจ่ายตามหมวดหมู่ทั้งหมด</h4>
                    </div>
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="row">
                                    <div class="col-xl-5 col-md-6 mb-4 ">
                                        @foreach ($expense_cate as $item)
                                            <div class="h5 font-weight-bold text-gray-800">
                                                {{ $item->topic }} <br>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="col-xl-5 col-md-6 mb-4 ">
                                        @foreach ($expense_cate as $item)
                                            <div class="h5 font-weight-bold text-gray-800">
                                                <a class="h5 mb-1 font-weight-bold text-danger text-uppercase">
                                                    {{ number_format($item->total_expense, 2, '.', ',') }}</a> บาท<br>
                                            </div>
                                        @endforeach
                                    </div>
                                   
                                </div>
                                <h5 class="mb-1 font-weight-bold text-danger text-uppercase ">{{ $expense }}<a
                                    class="h4 mb-1 font-weight-bold text-dark text-uppercase "> บาท</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div> --}}




    </div>
@endsection

{{-- pie --}}
<script>
    var ctxP = document.getElementById("pieChart").getContext('2d');
    var myPieChart = new Chart(ctxP, {
        type: 'pie',
        data: {
            labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
            datasets: [{
                data: [300, 50, 100, 40, 120],
                backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
                hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
            }]
        },
        options: {
            responsive: true
        }
    });


    $("#datepicker").datepicker({
        format: "mm-yyyy",
        startView: "months",
        minViewMode: "months"
    });
</script>
