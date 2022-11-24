<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    {{-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> --}}

    {{-- /**เรียกใช้ jquery**/ --}}
    <script type="text/javascript" src="jquery.js"></script>

    {{-- เรียกใช้ datepicker --}}
    <!-- <link href="assets/bootstrap-datepicker-thai/css/datepicker.css" rel="stylesheet">

   
    <script type="text/javascript">
        $(function() {
            $('#date-start').datetimepicker({
                locale: 'th',
                format: 'L'

            });
        });
    </script> -->
</head>

<body>

    @extends('layouts.user.main')

    @section('content')

        <div class="container-fluid" >
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-1 font-weight-bold " style="color:black ; font-weight:bold">ข้อมูลรายรับ-รายจ่าย</h6>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <a href="{{ url('/transaction/create') }}" class="btn btn-success btn-sm"
                            title="Add New Transaction" style="color:black ; font-weight:bold">
                            <i class="fa fa-plus" aria-hidden="true"></i> เพิ่มรายการ
                        </a>

                        <a href="{{ url('/transaction/detail') }}" class="btn btn-success btn-sm"
                        title="Add New Transaction" style="color:black ; font-weight:bold">
                        <i class="fa fa-plus" aria-hidden="true"></i> คำร้องขอเพิ่มหมวดหมู่
                        </a>
                    </div>

                    <form method="GET" action="{{ url('/transaction') }}" accept-charset="UTF-8">
                        <div class="row">

                            <div class="form-group">
                                <input class="form-control" type="date" name="date-start" id="date-start"
                                    value="{{ request('date-start') }}" pattern="\d{1,2}/\d{1,2}/\d{4}" />
                            </div>
                            &nbsp;ไปถึง&nbsp;
                            <div class="form-group">
                                <input class="form-control" type="date" name="date-end" id="date-end"
                                    value="{{ request('date-end') }}" pattern="\d{1,2}/\d{1,2}/\d{4}" />
                            </div>
                     
                            &nbsp;ค้นหา&nbsp;
                            <div class="form-group">

                                <input class="form-control form-control" name="search" id="search"
                                    value="{{ $keyword }}" placeholder="Search..." />

                            </div>
                            &nbsp;
                            <div class="dataTables_length">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                            &nbsp;&nbsp;
                            <div class="dataTables_length">
                            <a href="{{ url('/transaction') }}" type="submit" class="btn btn-danger "
                                            ><i class="fa fa-trash"></i></a>
                            </div>

                        </div>
                    </form>
                



                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">


                        <div class="table-responsive-sm">
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                                role="grid" aria-describedby="dataTable_info" style="width: 100%;">

                                <?php $sum_income = 0.0; ?>
                                <?php $sum_expense = 0.0; ?>
                                <?php $total = 0.0; ?>
                                <table class="table dataTable" style="color:black ; font-weight:bold">
                                    <thead>
                                        <tr>
                                            <th>วัน-เดือน-ปี</th>
                                            <th>ประเภท</th>
                                            <th>หมวดหมู่</th>
                                            <th>หมายเหตุ</th>
                                            <th>จำนวนเงิน</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    @foreach ($transaction as $item)
                                        <tbody>
                                            {{-- toDateString() แสดงแค่วันที่ --}}
                                            <td>{{ $item->created_at->thaidate() }}</td>
                                            <td>{{ $item->category_type }}</td>
                                            <td>{{ $item->topic }}</td>
                                            <td>{{ $item->comment }}</td>
                                            @if ($item->category_type == 'รายรับ')
                                                <td type='number' style="color:blue">&nbsp;&nbsp;{{ $item->income }}</td>
                                            @else
                                                <td type='number' style="color:red">-{{ $item->expense }}</td>
                                            @endif
                                            <td>
                                                @if ($item->category_type == 'รายรับ')
                                                    <a href="{{ url('/transaction/' . $item->id . '/edit_inc') }}"
                                                        title="แก้ไขรายการ"><button class="btn btn-primary btn-sm"><i
                                                                class="fas fa-edit"></i></button></a>
                                                @else
                                                    <a href="{{ url('/transaction/' . $item->id . '/edit_exp') }}"
                                                        title="แก้ไขรายการ"><button class="btn btn-primary btn-sm"><i
                                                                class="fas fa-edit"></i></button></a>
                                                @endif
                                                <form method="POST" action="{{ url('/transaction' . '/' . $item->id) }}"
                                                    accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="ลบรายการ"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                                            class="fas fa-trash" aria-hidden="true"></i></button>
                                                </form>
                                           
                                            </td>

                                        </tbody>
                                        <?php $sum_income += $item->income; ?>
                                        <?php $sum_expense += $item->expense; ?>
                                        <?php $total = $sum_income - $sum_expense; ?>
                                    @endforeach
                                </table>
                                <hr>

                              
                        </div>
                        <div class="mt-4">{{ $transaction->links() }}</div>
                        {{-- <div class="pagination-wrapper"> {!! $transaction->appends(['search' => Request::get('search')])->render() !!} </div> --}}
                    </div>
                </div>
            </div>
        </div>

    @endsection

</body>

</html>

<script>
    // $('.datepicker').datepicker();

    // เริ่มทำงานเมื่อโหลดหน้าจอ
    document.addEventListener('DOMContentLoaded', (event) => {
        console.log("START");
        showTopic();
    });

    document.getElementById('category_type').addEventListener("change", function(e) {
        if (e.target.value === 'รายรับ') {
            document.getElementById('รายรับ').selected = true;
        } else {
            document.getElementById('รายจ่าย').selected = true;
        }
    });

    // ดึงข้อมูลหมวดหมู่ผ่าน Dropdown 
    function showTopic() {
        //PARAMETERS
        fetch("{{ url('/') }}/api/category")
            .then(response => response.json())
            .then(result => {
                console.log(result);
                //UPDATE SELECT OPTION
                let category_topic = document.querySelector("#category_topic");
                category_topic.innerHTML = '<option value="" >-- ทั้งหมด --</option>';
                for (let item of result) {
                    let option = document.createElement("option");
                    option.text = item.topic;
                    option.value = item.topic;
                    category_topic.appendChild(option);
                }
            });
    }


    // var startDate = new Date(2012, 1, 20);
    // var endDate = new Date(2012, 1, 25);
    // $('#date-start')
    //     .datepicker()
    //     .on('changeDate', function(ev) {
    //         if (ev.date.valueOf() > endDate.valueOf()) {
    //             $('#alert').show().find('strong').text('The start date must be before the end date.');
    //         } else {
    //             $('#alert').hide();
    //             startDate = new Date(ev.date);
    //             $('#date-start-display').text($('#date-start').data('date'));
    //         }
    //         $('#date-start').datepicker('hide');
    //     });
    // $('#date-end')
    //     .datepicker()
    //     .on('changeDate', function(ev) {
    //         if (ev.date.valueOf() < startDate.valueOf()) {
    //             $('#alert').show().find('strong').text('The end date must be after the start date.');
    //         } else {
    //             $('#alert').hide();
    //             endDate = new Date(ev.date);
    //             $('#date-end-display').text($('#date-end').data('date'));
    //         }
    //         $('#date-end').datepicker('hide');
    //     });
</script>
