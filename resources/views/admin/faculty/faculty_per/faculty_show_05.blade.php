@extends('layouts.admin.main')

@section('content')
    <div class="container-fluid">
     
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-1 font-weight-bold text-gray-800">ข้อมูลของ <a class="text-primary">{{$user_id->mastername}} {{$user_id->surname}}</a> ปี {{$select_year + 543}} คณะ {{$user_id->faculty}}</h5> 
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
                                                    <td>{{ number_format($expense_total, 2, '.', ',') }}</td>
                                                    </th>
                                                </tr>
                                            </table>

                                            <hr>

                                            <div class="panel-body" align="center">
                                                <div id="expense_chart" style="width:750px; height:450px;">
                                                </div>
                                            </div>
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
                                                    <td>{{ number_format($income_total, 2, '.', ',') }}</td>
                                                    </th>
                                                </tr>
                                            </table>

                                            <hr>

                                            <div class="panel-body" align="center">
                                                <div id="income_chart" style="width:750px; height:450px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           
        
    </div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>

<script type="text/javascript">
    Highcharts.setOptions({
        lang: {
            thousandsSep: ','
        }
    })

    $(document).ready(function() {
        var topic = <?php echo json_encode($expense_cate); ?>;

        var options = {
            stackLabels: {
                enabled: true,
                verticalAlign: 'bottom',
                crop: false,
                overflow: 'none',
                y: -275
            },
            chart: {
                renderTo: 'expense_chart',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'กราฟแสดงรายจ่ายตามหมวดหมู่'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y} บาท</b>',
                percentageDecimals: 2
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',

                    dataLabels: {
                        enabled: true,
                        color: '#000000',
                        connectorColor: '#000000',
                        style: {
                            fontSize: '15px'
                        },


                        formatter: function() {
                            return '<b>' + this.point.name + '</b>: ' + this.percentage.toFixed(2) +
                                ' %';
                        }
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'จำนวน',

            }]
        }
        myarray = [];
        $.each(topic, function(index, val) {
            myarray[index] = [val.topic, Number(val.total_expense)];
        });
        options.series[0].data = myarray;
        chart = new Highcharts.Chart(options);

    });


    $(document).ready(function() {
        var topic = <?php echo json_encode($income_cate); ?>;

        var options = {
            stackLabels: {
                enabled: true,
                verticalAlign: 'bottom',
                crop: false,
                overflow: 'none',
                y: -275
            },
            chart: {
                renderTo: 'income_chart',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'กราฟแสดงรายรับตามหมวดหมู่'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y:,.0f} บาท</b>',
                percentageDecimals: 2
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        color: '#000000',
                        connectorColor: '#000000',
                        style: {
                            fontSize: '15px'
                        },

                        formatter: function() {
                            return '<b>' + this.point.name + '</b>: ' + this.percentage.toFixed(2) +
                                ' %';
                        }
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'จำนวน',

            }]
        }
        myarray = [];
        $.each(topic, function(index, val, ) {
            myarray[index] = [val.topic, Number(val.total_income)];
        });
        options.series[0].data = myarray;
        chart = new Highcharts.Chart(options);

    });
</script>
