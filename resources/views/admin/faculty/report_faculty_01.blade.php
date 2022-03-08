@extends('layouts.admin.main')

@section('content')
    <div class="container-fluid">

        <div class="card ">
            <div class="card-header py-2">
                <h4 class="m-1 font-weight-bold text-gray-800">คณะครุศาสตร์</h4>
                <hr>
                <form method="GET" action="{{ url('/faculty01') }}" accept-charset="UTF-8" class="row ">
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
                                    <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">

                                        <table class="table dataTable">
                                          <thead>
                                            <tr>
                                              <th>#</th>
                                              <th>ชื่อในเว็บ</th>
                                              <th>อีเมล</th>                                        
                                              <th></th>
                                            </tr>
                                          </thead>
                                          @foreach($users as $item)
                                            <tbody>
                                                <td>{{ $loop->iteration }}</td>
                                                <td> {{ $item->name  }}</td>
                                                <td> {{ $item->email  }}</td>  
                                                @if(!empty($select_year))               
                                                    <td><a href="{{ url('/faculty_show/' . $item->id .'/'. $select_year .'/01')  }}" title="รายละเอียด"><button 
                                                        class="btn btn-primary btn-sm"><i class="fas fa-edit" aria-hidden="true"></i></button></a>                                           
                                                    </td>
                                                @else
                                                    <td><a href="{{ url('/faculty_show/' . $item->id .'/'. $yearCheck .'/01')  }}" title="รายละเอียด"><button 
                                                        class="btn btn-primary btn-sm"><i class="fas fa-edit" aria-hidden="true"></i></button></a>                                           
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
                                    <div class="row">
                                      
                                        <div class="col-xl-3 col-md-6 mb-4 ">
                                            @foreach ($expense_cate as $item)
                                            <hr>
                                                <div class="h5 font-weight-bold text-gray-800">
                                                    {{ $item->topic }} <br>
                                                </div>
                                            @endforeach
                                            <hr>
                                            <div class="h5 font-weight-bold text-gray-800">
                                                รวม <br>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6 mb-4 ">
                                            @foreach ($expense_cate as $item)
                                            <hr>
                                                <div class="h5 font-weight-bold text-gray-800">
                                                    <a class="h5 mb-1 font-weight-bold text-danger text-uppercase">
                                                        {{ number_format($item->total_expense, 2, '.', ',') }}</a> บาท<br>
                                                </div>
                                            @endforeach
                                            <hr>
                                            <div class="h5 font-weight-bold text-gray-800">
                                              <a class="h5 mb-1 font-weight-bold text-danger text-uppercase">  {{$expense_total}} </a>บาท<br>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6 mb-3 ">
                                            @foreach ($expense_cate as $item)
                                            <hr>
                                                <div class="h5 font-weight-bold text-danger">
                                                    <a class="h5 mb-1 font-weight-bold text-dark text-uppercase">คิดเป็น : </a>
                                                        {{ number_format($item->total_expense/$expense_total * 100 , 2, '.', ',') }} 
                                                    <a class="h5 mb-1 font-weight-bold text-dark text-uppercase"> % ของยอดรวม </a><br>
                                                </div>
                                            @endforeach
                                            <hr>
                                        </div>

                                    </div>

                                    <div class="panel-body" align="center">
                                        <div id="pie_chart" style="width:750px; height:550px;"></div>   
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
                                    <div class="row">
                                      
                                        <div class="col-xl-3 col-md-6 mb-4 ">
                                            @foreach ($income_cate as $item)
                                            <hr>
                                                <div class="h5 font-weight-bold text-gray-800">
                                                    {{ $item->topic }} <br>
                                                </div>
                                            @endforeach
                                            <hr>
                                            <div class="h5 font-weight-bold text-gray-800">
                                                รวม <br>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6 mb-4 ">
                                            @foreach ($income_cate as $item)
                                            <hr>
                                                <div class="h5 font-weight-bold text-gray-800">
                                                    <a class="h5 mb-1 font-weight-bold text-primary text-uppercase">
                                                        {{ number_format($item->total_income, 2, '.', ',') }}</a> บาท<br>
                                                </div>
                                            @endforeach
                                            <hr>
                                            <div class="h5 font-weight-bold text-gray-800">
                                              <a class="h5 mb-1 font-weight-bold text-primary text-uppercase">  {{$income_total}} </a>บาท<br>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6 mb-3 ">
                                            @foreach ($income_cate as $item)
                                            <hr>
                                                <div class="h5 font-weight-bold text-primary">
                                                    <a class="h5 mb-1 font-weight-bold text-dark text-uppercase">คิดเป็น : </a>
                                                        {{ number_format($item->total_income/$income_total * 100 , 2, '.', ',') }} 
                                                    <a class="h5 mb-1 font-weight-bold text-dark text-uppercase"> % ของยอดรวม </a><br>
                                                </div>
                                            @endforeach
                                            <hr>
                                        </div>

                                    </div>
                                    {{-- <h5 class="mb-1 font-weight-bold text-danger text-uppercase ">{{ $expense }}<a
                                    class="h4 mb-1 font-weight-bold text-dark text-uppercase "> บาท</a></h5> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
       
    </div></div>
    </div>
@endsection

<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var topic =  <?php echo json_encode($expense_cate); ?>;
        var options = {
            stackLabels: {
                enabled: true,
                verticalAlign: 'bottom',
                crop: false,
                overflow: 'none',
                y: -275
            },
            chart: {
                renderTo: 'pie_chart',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'เปอร์เซ็นตามหมวดหมู่'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y:,.2f}</b>',
                percentageDecimals: 1
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
                            return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
                        }
                    }
                }
            },
            series: [{
                type:'pie',
                name:'รายจ่าย',
            }]
        }
        myarray = [];
        $.each(topic, function(index, val) {
            myarray[index] = [val.topic, val.total_expense];
        });
        options.series[0].data = myarray;
        chart = new Highcharts.Chart(options);
        
    });
</script>
