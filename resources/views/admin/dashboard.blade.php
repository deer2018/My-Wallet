@extends('layouts.admin.main')

@section('content')
    <div class="container-fluid">

        <div class="row">

            <!-- รายรับ -->
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 ">
                    <div class="card-header py-2">
                        <h4 class="m-1 font-weight-bold text-gray-800">รายรับทั้งหมด</h4>
                    </div>
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                {{-- <div class="h3 font-weight-bold text-gray-800">รายรับทั้งหมด</div><hr> --}}
                                <h5 class="mb-1 font-weight-bold text-primary text-uppercase ">{{ $income }}<a
                                        class="h5 mb-1 font-weight-bold text-dark text-uppercase "> บาท</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- รายจ่าย -->
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 ">
                    <div class="card-header py-2">
                        <h4 class="m-1 font-weight-bold text-gray-800">รายจ่ายทั้งหมด</h4>
                    </div>
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                {{-- <div class="h3 font-weight-bold text-gray-800">รายจ่ายทั้งหมด</div><hr> --}}
                                <h5 class="mb-1 font-weight-bold text-danger text-uppercase ">{{ $expense }}<a
                                        class="h4 mb-1 font-weight-bold text-dark text-uppercase "> บาท</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <hr>

        <div class="row ">
            <!-- หมวดหมู่ -->
            <div class="col-xl-6 col-md-6 mb-4 ">
                <div class="card border-left-success shadow h-100 ">
                    {{-- <a href="{{ url('/chart') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                        class="fa fa-arrow-left" aria-hidden="true"></i> ไป</button></a> --}}
                    <div class="card-header py-2">
                        <h4 class="m-1 font-weight-bold text-gray-800">รายรับตามหมวดหมู่ทั้งหมด</h4>
                    </div>
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                {{-- <div class="h4 font-weight-bold text-gray-800">รายรับตามหมวดหมู่ทั้งหมด</div><hr> --}}
                                <div class="row">
                                    <div class="col-xl-5 col-md-6 mb-4 ">
                                        @foreach ($transaction_income as $item)
                                            <div class="h5 font-weight-bold text-gray-800">
                                                {{ $item->topic }} <br>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="col-xl-5 col-md-6 mb-4 ">
                                        @foreach ($group_income as $item)
                                            <div class="h5 font-weight-bold text-gray-800">
                                                <a class="h5 mb-1 font-weight-bold text-primary text-uppercase">
                                                    {{ number_format($item->total_income, 2, '.', ',') }}</a> บาท<br>
                                            </div>
                                        @endforeach
                                    </div>
                                    {{-- <div class="mt-4">{{ $transaction->links() }}</div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- หมวดหมู่รายจ่าย -->
            <div class="col-xl-6 col-md-6 mb-4 ">
                <div class="card border-left-success shadow h-100 ">
                    {{-- <a href="{{ url('/chart') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                        class="fa fa-arrow-left" aria-hidden="true"></i> ไป</button></a> --}}
                    <div class="card-header py-2">
                        <h4 class="m-1 font-weight-bold text-gray-800">รายจ่ายตามหมวดหมู่ทั้งหมด</h4>
                    </div>
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                {{-- <div class="h4 font-weight-bold text-gray-800">รายจ่ายตามหมวดหมู่ทั้งหมด</div><hr> --}}
                                <div class="row">
                                    <div class="col-xl-5 col-md-6 mb-3 ">
                                        @foreach ($transaction_expense as $item)
                                            <div class="h5 font-weight-bold text-gray-800">
                                                {{ $item->topic }} <br>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="col-xl-5 col-md-6 mb-3 ">
                                        @foreach ($group_expense as $item)
                                            <div class="h5 font-weight-bold text-gray-800">
                                                <a class="h5 mb-1 font-weight-bold text-danger text-uppercase">
                                                    {{ number_format($item->total_expense, 2, '.', ',') }}</a> บาท<br>
                                            </div>
                                        @endforeach
                                    </div>
                                    {{-- <div class="mt-4">{{ $transaction->links() }}</div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            {{-- เลือกข้อมูลสรุปรายรับ-จ่ายจากเดือนและปี --}}
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 ">
                    <div class="card-header py-2">
                        <h4 class="m-1 font-weight-bold text-gray-800">รายรับ-รายจ่ายจากเดือนที่เลือก</h4>
                    </div>
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="row ">
                                    <h5 class="m-1 font-weight-bold text-gray-800"> &nbsp;เดือน&nbsp;</h5>
                                    <div class="form-group">
                                        <form method="GET" action="{{ url('/dashboard') }}" accept-charset="UTF-8">
                                        </div>       
                                            <div class="form-group">
                                                <label>
                                                    {{-- <input type="month" class="form-control" name="month" id="month" /> --}}

                                            
                                                     <select id="month" name="month" aria-controls="dataTable"
                                                        class="custom-select form-control" value="">
                                                        <option value="" >-- ทั้งหมด --</option>
                                                        <option id="มกราคม" value="01">มกราคม</option>
                                                        <option id="กุมภาพันธ์" value="02">กุมภาพันธ์</option>
                                                        <option id="มีนาคม" value="03">มีนาคม</option>
                                                        <option id="เมษายน" value="04">เมษายน</option>
                                                        <option id="พฤษภาคม" value="05">พฤษภาคม</option>
                                                        <option id="มิถุนายน" value="06">มิถุนายน</option>
                                                        <option id="กรกฎาคม" value="07">กรกฎาคม</option>
                                                        <option id="สิงหาคม" value="08">สิงหาคม</option>
                                                        <option id="กันยายน" value="09">กันยายน</option>
                                                        <option id="ตุลาคม" value="10">ตุลาคม</option>
                                                        <option id="พฤศจิกายน" value="11">พฤศจิกายน</option>
                                                        <option id="ธันวาคม" value="12">ธันวาคม</option>
                                                    </select>

                                                   

                                                </label>
                                            {{-- </div> --}}
                                    </div>
                                    <h5 class="m-1 font-weight-bold text-gray-800"> &nbsp;ปี&nbsp;</h5>
                                    <div class="form-group">
                                         <input class="form-control" type="number" min="2010" max="2030" step="1"
                                                    name="month_year" id="month_year" value="" />
                                        
                                    </div>
                                    &nbsp; &nbsp;
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                    </form>
                                    
                                </div>
                                เดือน,ปี =
                                @if (isset($month))
                                {{ $month }}
                                @else
                                    ว่าง
                                @endif
                                @if (isset($month_year))
                                {{ $month_year }}
                                @else
                                    ว่าง
                                @endif
                               
                                <hr>
                                <h5 class="mb-1 font-weight-bold text-primary text-uppercase "><a
                                        class="h5 mb-1 font-weight-bold text-dark text-uppercase ">รายรับ </a>
                                    {{ number_format($inc_m, 2, '.', ',') }}<a
                                        class="h4 mb-1 font-weight-bold text-dark text-uppercase "> บาท</a></h5>
                                <h5 class="mb-1 font-weight-bold text-danger text-uppercase "><a
                                        class="h5 mb-1 font-weight-bold text-dark text-uppercase ">รายรับ </a>
                                    {{ number_format($exp_m, 2, '.', ',') }}<a
                                        class="h4 mb-1 font-weight-bold text-dark text-uppercase "> บาท</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
              {{-- เลือกข้อมูลสรุปรายรับ-จ่ายจากเดือนและปี --}}
              <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 ">
                    <div class="card-header py-2">
                        <h4 class="m-1 font-weight-bold text-gray-800">รายรับ-รายจ่ายจากปีที่เลือก</h4>
                    </div>
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="row ">
                                   
                                    <div class="form-group">
                                        <form method="GET" action="{{ url('/dashboard') }}" accept-charset="UTF-8">     
                                    </div>
                                    <h5 class="m-1 font-weight-bold text-gray-800"> &nbsp;ปี&nbsp;</h5>
                                    <div class="form-group">
                                        <input class="form-control" type="number" min="2010" max="2030" step="1"
                                           name="year" id="year" value="" />
                                        {{-- <label><select id="category_topic" name="category_topic" class="form-control">
                                                    <option value="{{ request('category_topic') }}">-- ทั้งหมด --</option>
                                                </select></label> --}}
                                    </div>
                                    &nbsp; &nbsp;
                                        <div class="form-group">
                                            <button class="btn btn-primary" type="submit">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </form>
                                    
                                </div>
                               
                                ปี =
                                @if (isset($year))
                                {{ $year }}
                                @else
                                    ว่าง
                                @endif
                                <hr>
                                <h5 class="mb-1 font-weight-bold text-primary text-uppercase "><a
                                        class="h5 mb-1 font-weight-bold text-dark text-uppercase ">รายรับ </a>
                                    {{ number_format($inc_y, 2, '.', ',') }}<a
                                        class="h4 mb-1 font-weight-bold text-dark text-uppercase "> บาท</a></h5>
                                <h5 class="mb-1 font-weight-bold text-danger text-uppercase "><a
                                        class="h5 mb-1 font-weight-bold text-dark text-uppercase ">รายรับ </a>
                                    {{ number_format($exp_y, 2, '.', ',') }}<a
                                        class="h4 mb-1 font-weight-bold text-dark text-uppercase "> บาท</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




        </div>


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
