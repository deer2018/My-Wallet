@extends('layouts.admin.main')

@section('content')
    <div class="container-fluid">

        <div class="card ">
            <div class="card-header py-2">
                <h4 class="m-1 font-weight-bold text-gray-800">คณะเทคโนโลยีการเกษตร</h4>
                <hr>
                <form method="GET" action="{{ url('/faculty05') }}" accept-charset="UTF-8" class="row ">
                    @csrf

                    <div class="dataTables_length">
                        <select name='selectYear' class="form-control">
                            @foreach ($group_year as $group_year)
                                <option value="{{ $group_year->year }}"
                                    {{ $group_year->year == $select_year ? 'selected' : '' }}>
                                    รายการปี {{ $group_year->year + 543 }}</option>
                            @endforeach
                        </select>
                    </div>
                    &nbsp;&nbsp;
                    <div class="dataTables_length">
                        <button class="btn btn-success" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>

                </form>
            </div>
            <div class="card-body">

                <div class="row">

                    <div class="col-xl-12 col-md-6 mb-4">
                        <div class="card  shadow h-100 ">
                            <div class="card-header py-2">
                                <h4 class="m-1 font-weight-bold text-gray-800">รายละเอียดผู้ใช้
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <table class="table table-bordered dataTable" id="dataTable" width="100%"
                                            cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                            style="width: 100%;">

                                            <table class="table dataTable h5 mb-1 font-weight-bold text-dark">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>ชื่อในเว็บ</th>
                                                        <th>อีเมล</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                @foreach ($users as $item)
                                                    <tbody>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td> {{ $item->name }}</td>
                                                        <td> {{ $item->email }}</td>
                                                        @if (!empty($select_year))
                                                            <td><a href="{{ url('/faculty_show/' . $item->id . '/' . $select_year . '/05') }}"
                                                                    title="รายละเอียด"><button
                                                                        class="btn btn-primary btn-sm">รายละเอียด</button></a>
                                                            </td>
                                                        @else
                                                            <td><a href="{{ url('/faculty_show/' . $item->id . '/' . $yearCheck . '/05') }}"
                                                                    title="รายละเอียด"><button
                                                                        class="btn btn-primary btn-sm">รายละเอียด</button></a>
                                                            </td>
                                                        @endif
                                                    </tbody>
                                                @endforeach
                                            </table>
                                            <div class="mt-4">{{ $users->links() }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-12 col-md-6 mb-4">
                        <div class="card border-left-danger shadow h-100 ">
                            <div class="card-header py-2">
                                <h4 class="m-1 font-weight-bold text-gray-800">รายจ่ายตามหมวดหมู่ทั้งหมด</h4>
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
                                <h4 class="m-1 font-weight-bold text-gray-800">รายรับตามหมวดหมู่ทั้งหมด</h4>
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
    </div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        var topic = <?php echo json_encode($expense_chart); ?>;

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
                text: 'จำนวนรายการ รายจ่ายตามหมวดหมู่'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y:,.0f} รายการ</b>',
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
            myarray[index] = [val.topic, val.total];
        });
        options.series[0].data = myarray;
        chart = new Highcharts.Chart(options);

    });


    $(document).ready(function() {
        var topic = <?php echo json_encode($income_chart); ?>;

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
                text: 'จำนวนรายการ รายรับตามหมวดหมู่'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y:,.0f} รายการ</b>',
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
            myarray[index] = [val.topic, val.total];
        });
        options.series[0].data = myarray;
        chart = new Highcharts.Chart(options);

    });
</script>
