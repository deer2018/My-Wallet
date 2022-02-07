@extends('layouts.user.main')

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
                                {{-- <div class="h3 font-weight-bold text-gray-800">รายรับทั้งหมด</div> --}}
                                <h5 class="mb-1 font-weight-bold text-primary text-uppercase ">
                                    {{ number_format($income, 2, '.', ',') }}<a
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
                                {{-- <div class="h3 font-weight-bold text-gray-800">รายจ่ายทั้งหมด</div> --}}
                                <h5 class="mb-1 font-weight-bold text-danger text-uppercase ">
                                    {{ number_format($expense, 2, '.', ',') }}<a
                                        class="h5 mb-1 font-weight-bold text-dark text-uppercase "> บาท</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <hr>

        <div class="row">

            <!-- ประจำปี -->
            {{-- <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 ">
                        <div class="card-header py-2">
                            <h4 class="m-1 font-weight-bold text-gray-800">รายงาน ประจำเดือนปัจจุบัน</h4>
                        </div>
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                 
                                    <h5 class="mb-1 font-weight-bold text-primary text-uppercase "><a class="h5 mb-1 font-weight-bold text-dark text-uppercase ">รายรับ </a> {{number_format($monthly_income, 2, '.', ',')}}<a class="h4 mb-1 font-weight-bold text-dark text-uppercase "> บาท</a></h5>
                                    <h5 class="mb-1 font-weight-bold text-danger text-uppercase "><a class="h5 mb-1 font-weight-bold text-dark text-uppercase ">รายจ่าย </a> {{number_format($monthly_expense, 2, '.', ',')}}<a class="h4 mb-1 font-weight-bold text-dark text-uppercase "> บาท</a></h5>                                
                                </div>
                            </div>
                        </div>   
                    </div>
                </div> --}}

            <!-- ประจำปี -->
            {{-- <div class="col-xl-6 col-md-6 mb-4"> 
                    <div class="card border-left-success shadow h-100 ">
                        <div class="card-header py-2">
                            <h4 class="m-1 font-weight-bold text-gray-800">รายงาน ประจำปีปัจจุบัน</h4>
                        </div>
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                              
                                    <h5 class="mb-1 font-weight-bold text-primary text-uppercase "><a class="h5 mb-1 font-weight-bold text-dark text-uppercase ">รายรับ </a>{{number_format($annual_income, 2, '.', ',')}} <a class="h4 mb-1 font-weight-bold text-dark text-uppercase "> บาท</a></h5>
                                    <h5 class="mb-1 font-weight-bold text-danger text-uppercase "><a class="h5 mb-1 font-weight-bold text-dark text-uppercase ">รายจ่าย </a>{{number_format($annual_expense, 2, '.', ',')}}<a class="h4 mb-1 font-weight-bold text-dark text-uppercase "> บาท</a></h5>                                
                                </div>
                            </div>
                        </div>   
                    </div>
                </div> --}}
            {{-- แสดงค่าเป็นเดือนๆของปีปัจจุบัน --}}
            <div class="col-xl-12 col-md-12 mb-4">
                <div class="card border-left-success shadow h-100 ">
                    <div class="card-header py-2">
                        <h4 class="m-1 font-weight-bold text-gray-800 " style="text-align: center">รายงานสรุปค่าใช้จ่ายปี
                            {{ $yearName }}</h4>
                    </div>
                    <form method="GET" action="{{ url('/report_sup') }}" accept-charset="UTF-8">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                            role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th class="h5 mb-1 font-weight-bold text-dark text-uppercase ">เดือน</th>
                                    <th class="h5 mb-1 font-weight-bold text-dark text-uppercase ">รายรับ</th>
                                    <th class="h5 mb-1 font-weight-bold text-dark text-uppercase ">รายจ่าย</th>
                                    <th class="h5 mb-1 font-weight-bold text-dark text-uppercase ">รวม</th>
                                </tr>
                            </thead>
                            {{-- @foreach ($thai_months as $item) --}}
                            <tbody>
                                <td class="h5 mb-1 font-weight-bold text-dark text-uppercase ">มกราคม</td>
                                <td class="h5 mb-1 font-weight-bold text-primary text-uppercase ">
                                    {{ number_format($jan_income, 2, '.', ',') }}
                                    <a href="{{ url('/report_sup'.'/jan_income') }}" class="btn btn-primary btn-sm" title="Detail">                       
                                        {{-- <input type="text" id="search" name="search" value="income_jan"d-none> --}}
                                        รายละเอียด
                                    </a>
                                </td>
                                <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                    {{ number_format($jan_expense, 2, '.', ',') }}
                                    <a href="{{ url('/report_sup'.'/jan_expense') }}" class="btn btn-danger btn-sm"
                                        title="Detail">รายละเอียด</a>
                                </td>

                                @if ($jan_total >= 0)
                                    <td class="h5 mb-1 font-weight-bold text-success text-uppercase ">
                                        &nbsp;{{ number_format($jan_total, 2, '.', ',') }}</td>
                                @else
                                    <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                        {{ number_format($jan_total, 2, '.', ',') }}</td>
                                @endif

                            </tbody>
                            {{-- <div class="form-group">
                            <a href="{{ url('/transaction/create') }}" class="btn btn-success btn-sm"
                                title="Add New Transaction">
                                <i class="fa fa-plus" aria-hidden="true"></i> เพิ่มรายการ
                            </a>
                        </div> --}}
                            <tbody>
                                <td class="h5 mb-1 font-weight-bold text-dark text-uppercase ">กุมภาพันธ์</td>
                                <td class="h5 mb-1 font-weight-bold text-primary text-uppercase ">
                                    {{ number_format($feb_income, 2, '.', ',') }}</td>
                                <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                    {{ number_format($feb_expense, 2, '.', ',') }}</td>

                                @if ($monthly_expense >= 0)
                                    <td class="h5 mb-1 font-weight-bold text-success text-uppercase ">
                                        &nbsp;{{ number_format($feb_income, 2, '.', ',') }}</td>
                                @else
                                    <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                        {{ number_format($feb_expense, 2, '.', ',') }}</td>
                                @endif

                            </tbody>

                            <tbody>
                                <td class="h5 mb-1 font-weight-bold text-dark text-uppercase ">มีนาคม</td>
                                <td class="h5 mb-1 font-weight-bold text-primary text-uppercase ">
                                    {{ number_format($mar_income, 2, '.', ',') }}</td>
                                <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                    {{ number_format($mar_expense, 2, '.', ',') }}</td>

                                @if ($monthly_expense >= 0)
                                    <td class="h5 mb-1 font-weight-bold text-success text-uppercase ">
                                        &nbsp;{{ number_format($mar_income, 2, '.', ',') }}</td>
                                @else
                                    <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                        {{ number_format($mar_expense, 2, '.', ',') }}</td>
                                @endif

                            </tbody>

                            <tbody>
                                <td class="h5 mb-1 font-weight-bold text-dark text-uppercase ">เมษายน</td>
                                <td class="h5 mb-1 font-weight-bold text-primary text-uppercase ">
                                    {{ number_format($apr_income, 2, '.', ',') }}</td>
                                <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                    {{ number_format($apr_expense, 2, '.', ',') }}</td>

                                @if ($monthly_expense >= 0)
                                    <td class="h5 mb-1 font-weight-bold text-success text-uppercase ">
                                        &nbsp;{{ number_format($apr_income, 2, '.', ',') }}</td>
                                @else
                                    <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                        {{ number_format($apr_expense, 2, '.', ',') }}</td>
                                @endif

                            </tbody>

                            <tbody>
                                <td class="h5 mb-1 font-weight-bold text-dark text-uppercase ">พฤษภาคม</td>
                                <td class="h5 mb-1 font-weight-bold text-primary text-uppercase ">
                                    {{ number_format($may_income, 2, '.', ',') }}</td>
                                <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                    {{ number_format($may_expense, 2, '.', ',') }}</td>

                                @if ($monthly_expense >= 0)
                                    <td class="h5 mb-1 font-weight-bold text-success text-uppercase ">
                                        &nbsp;{{ number_format($may_income, 2, '.', ',') }}</td>
                                @else
                                    <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                        {{ number_format($may_expense, 2, '.', ',') }}</td>
                                @endif

                            </tbody>

                            <tbody>
                                <td class="h5 mb-1 font-weight-bold text-dark text-uppercase ">มิถุนายน</td>
                                <td class="h5 mb-1 font-weight-bold text-primary text-uppercase ">
                                    {{ number_format($jun_income, 2, '.', ',') }}</td>
                                <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                    {{ number_format($jun_expense, 2, '.', ',') }}</td>

                                @if ($monthly_expense >= 0)
                                    <td class="h5 mb-1 font-weight-bold text-success text-uppercase ">
                                        &nbsp;{{ number_format($jun_income, 2, '.', ',') }}</td>
                                @else
                                    <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                        {{ number_format($jun_expense, 2, '.', ',') }}</td>
                                @endif

                            </tbody>

                            <tbody>
                                <td class="h5 mb-1 font-weight-bold text-dark text-uppercase ">กรกฎาคม</td>
                                <td class="h5 mb-1 font-weight-bold text-primary text-uppercase ">
                                    {{ number_format($jul_income, 2, '.', ',') }}</td>
                                <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                    {{ number_format($jul_expense, 2, '.', ',') }}</td>

                                @if ($monthly_expense >= 0)
                                    <td class="h5 mb-1 font-weight-bold text-success text-uppercase ">
                                        &nbsp;{{ number_format($jul_income, 2, '.', ',') }}</td>
                                @else
                                    <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                        {{ number_format($jul_expense, 2, '.', ',') }}</td>
                                @endif

                            </tbody>

                            <tbody>
                                <td class="h5 mb-1 font-weight-bold text-dark text-uppercase ">สิงหาคม</td>
                                <td class="h5 mb-1 font-weight-bold text-primary text-uppercase ">
                                    {{ number_format($aug_income, 2, '.', ',') }}</td>
                                <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                    {{ number_format($aug_expense, 2, '.', ',') }}</td>

                                @if ($monthly_expense >= 0)
                                    <td class="h5 mb-1 font-weight-bold text-success text-uppercase ">
                                        &nbsp;{{ number_format($aug_income, 2, '.', ',') }}</td>
                                @else
                                    <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                        {{ number_format($aug_expense, 2, '.', ',') }}</td>
                                @endif

                            </tbody>

                            <tbody>
                                <td class="h5 mb-1 font-weight-bold text-dark text-uppercase ">กันยายน</td>
                                <td class="h5 mb-1 font-weight-bold text-primary text-uppercase ">
                                    {{ number_format($sep_income, 2, '.', ',') }}</td>
                                <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                    {{ number_format($sep_expense, 2, '.', ',') }}</td>

                                @if ($monthly_expense >= 0)
                                    <td class="h5 mb-1 font-weight-bold text-success text-uppercase ">
                                        &nbsp;{{ number_format($sep_income, 2, '.', ',') }}</td>
                                @else
                                    <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                        {{ number_format($sep_expense, 2, '.', ',') }}</td>
                                @endif

                            </tbody>

                            <tbody>
                                <td class="h5 mb-1 font-weight-bold text-dark text-uppercase ">ตุลาคม</td>
                                <td class="h5 mb-1 font-weight-bold text-primary text-uppercase ">
                                    {{ number_format($oct_income, 2, '.', ',') }}</td>
                                <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                    {{ number_format($oct_expense, 2, '.', ',') }}</td>

                                @if ($monthly_expense >= 0)
                                    <td class="h5 mb-1 font-weight-bold text-success text-uppercase ">
                                        &nbsp;{{ number_format($oct_income, 2, '.', ',') }}</td>
                                @else
                                    <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                        {{ number_format($oct_expense, 2, '.', ',') }}</td>
                                @endif

                            </tbody>

                            <tbody>
                                <td class="h5 mb-1 font-weight-bold text-dark text-uppercase ">พฤศจิกายน</td>
                                <td class="h5 mb-1 font-weight-bold text-primary text-uppercase ">
                                    {{ number_format($nov_income, 2, '.', ',') }}</td>
                                <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                    {{ number_format($nov_expense, 2, '.', ',') }}</td>

                                @if ($monthly_expense >= 0)
                                    <td class="h5 mb-1 font-weight-bold text-success text-uppercase ">
                                        &nbsp;{{ number_format($nov_income, 2, '.', ',') }}</td>
                                @else
                                    <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                        {{ number_format($nov_expense, 2, '.', ',') }}</td>
                                @endif

                            </tbody>

                            <tbody>
                                <td class="h5 mb-1 font-weight-bold text-dark text-uppercase ">ธันวาคม</td>
                                <td class="h5 mb-1 font-weight-bold text-primary text-uppercase ">
                                    {{ number_format($dec_income, 2, '.', ',') }}</td>
                                <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                    {{ number_format($dec_expense, 2, '.', ',') }}</td>

                                @if ($monthly_expense >= 0)
                                    <td class="h5 mb-1 font-weight-bold text-success text-uppercase ">
                                        &nbsp;{{ number_format($dec_income, 2, '.', ',') }}</td>
                                @else
                                    <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                        {{ number_format($dec_expense, 2, '.', ',') }}</td>
                                @endif

                            </tbody>

                        </table>
                    </form>
                    
                </div>
            </div>

        </div>

        <hr>

        {{-- <div class="row ">
            <!-- หมวดหมู่ -->
            <div class="col-xl-12 col-md-6 mb-4 ">
                <div class="card border-left-success shadow h-100 ">
                    
                    <div class="card-header py-2">
                        <h4 class="m-1 font-weight-bold text-gray-800">สรุปรายจ่ายแยกตามหมวดหมู่</h4>
                    </div>
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="row">
                                    <div class="col-xl-5 col-md-6 mb-4 ">
                                        @foreach ($group as $item)
                                            <div class="h5 font-weight-bold text-gray-800">
                                                {{ $item->topic }} <br>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="col-xl-5 col-md-6 mb-4 ">
                                        @foreach ($group as $item)
                                            <div class="h5 font-weight-bold text-gray-800">
                                                <a class="h5 mb-1 font-weight-bold text-danger text-uppercase">
                                                    {{ number_format($item->total, 2, '.', ',') }}</a> บาท<br>
                                            </div>
                                        @endforeach
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div> --}}

        <!-- Donut Chart -->
        {{-- <div class="col-xl-4 col-lg-5">
                        //     <div class="card shadow mb-4">
                        //         <!-- Card Header - Dropdown -->
                        //         <div class="card-header py-3">
                        //             <h6 class="m-0 font-weight-bold text-primary">Donut Chart</h6>
                        //         </div>
                        //         <!-- Card Body -->
                        //         <div class="card-body">
                        //             <div>
                        //                 <canvas id="pieChart" style="max-width: 500px;"></canvas>
                        //             </div>
                        //             <hr>
                        //             Styling for the donut chart can be found in the
                        //             <code>/js/demo/chart-pie-demo.js</code> file.
                        //         </div>
                        //     </div>
                        // </div> --}}
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
</script>
