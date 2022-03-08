@extends('layouts.user.main')

@section('content')
    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header h4 text-danger">รายจ่ายเดือน {{ $monthName }} ปี {{ $yearName }} </div>
            <div class="card-body">
                <a href="{{ url()->previous() }}" title="Back"><button class="btn btn-warning btn-sm"><i
                            class="fa fa-arrow-left" aria-hidden="true"></i> กลับ</button></a>
                <br />
                <br />
                <form method="GET" action="{{ url('/report_sup/' .$select_year. '/apr_expense') }}" accept-charset="UTF-8">
                    <div class="row ">

                        &nbsp;&nbsp;&nbsp;&nbsp;หมวดหมู่&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="dataTables_length">

                            <label><select id="category_topic" name="category_topic" class="form-control">
                                    <option value="{{ request('category_topic') }}">-- ทั้งหมด --</option>
                                </select></label>

                        </div>

                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="dataTables_length">
                            <button class="btn btn-danger" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>

                    </div>

                </form>
                @if (isset($select))
                    รายการ {{ $select }}
                @else
                    รายการ ทั้งหมด
                @endif

                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">


                    <div class="table-responsive-sm">
                        <table class="table table-bordered dataTable font-weight-bold" id="dataTable" width="100%" cellspacing="0"
                            role="grid" aria-describedby="dataTable_info" style="width: 100%;">


                            <?php $sum_expense = 0.0; ?>

                            <thead>
                                <tr>
                                    <th>วัน-เดือน-ปี</th>
                                    <th>ประเภท</th>
                                    <th>หมวดหมู่</th>
                                    <th>หมายเหตุ</th>
                                    <th>จำนวนเงิน(บาท)</th>

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
                                        <td type='number' style="color:red">{{ $item->expense }}</td>
                                    @endif


                                </tbody>

                                <?php $sum_expense += $item->expense; ?>

                            @endforeach
                        </table>

                        <div class="table font-weight-bold" style="text-align: right ; padding-right:10%">รวม :
                            <a style="color:red">{{ number_format($sum_expense, 2, '.', ',') }}</a>&nbsp;&nbsp;บาท
                        </div>
                    </div>
                    <div class="mt-4">{{ $transaction->links() }}</div>
                </div>

            </div>

             <!-- หมวดหมู่รายจ่าย -->
             <div class="col-xl-12 col-md-6 mb-4 ">
                <div class="card ">
                    {{-- <a href="{{ url('/chart') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                        class="fa fa-arrow-left" aria-hidden="true"></i> ไป</button></a> --}}
                    <div class="card-header py-2 ">
                        <h5 class="m-1 font-weight-bold text-gray-800">รายจ่ายรวมของเดือนนี้ <a style="color:red">{{ number_format($expense_total, 2, '.', ',') }}</a> บาท</h5>
                    
                    </div>
                    @if(isset($select))
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                {{-- <div class="h4 font-weight-bold text-gray-800">รายจ่ายตามหมวดหมู่ทั้งหมด</div><hr> --}}
                                <div class="row">
                                    <div class="col-xl-4 col-md-6 mb-3 ">
                                        @foreach ($expense_cate as $item)
                                            <div class=" font-weight-bold text-gray-800">
                                                {{ $item->topic }} <br>
                                            </div>
                                        @endforeach
                                    </div>
                                
                                    <div class="col-xl-4 col-md-6 mb-3 ">
                                        @foreach ($expense_cate as $item)
                                            <div class=" font-weight-bold text-danger">
                                                <a class=" mb-1 font-weight-bold text-dark text-uppercase">คิดเป็น : </a>
                                                    {{ number_format($item->total_expense/$expense_total * 100 , 2, '.', ',') }} 
                                                <a class=" mb-1 font-weight-bold text-dark text-uppercase"> % ของรายจ่ายทั้งหมดในเดือนนี้ </a><br>
                                            </div>
                                        @endforeach
                                    </div>
                                    {{-- <div class="mt-4">{{ $transaction->links() }}</div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                {{-- <div class="h4 font-weight-bold text-gray-800">รายจ่ายตามหมวดหมู่ทั้งหมด</div><hr> --}}
                                <div class="row">
                                    <div class="col-xl-4 col-md-6 mb-3 ">
                                        @foreach ($expense_cate as $item)
                                            <div class=" font-weight-bold text-gray-800">
                                                {{ $item->topic }} <br>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="col-xl-4 col-md-6 mb-3 ">
                                        @foreach ($expense_cate as $item)
                                            <div class=" font-weight-bold text-gray-800">
                                                <a class=" mb-1 font-weight-bold text-danger text-uppercase">
                                                    {{ number_format($item->total_expense, 2, '.', ',') }}</a> บาท<br>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="col-xl-4 col-md-6 mb-3 ">
                                        @foreach ($expense_cate as $item)
                                            <div class=" font-weight-bold text-danger">
                                                <a class=" mb-1 font-weight-bold text-dark text-uppercase">คิดเป็น : </a>
                                                    {{ number_format($item->total_expense/$expense_total * 100 , 2, '.', ',') }} 
                                                <a class=" mb-1 font-weight-bold text-dark text-uppercase"> % ของรายจ่ายทั้งหมดในเดือนนี้ </a><br>
                                            </div>
                                        @endforeach
                                    </div>
                                    {{-- <div class="mt-4">{{ $transaction->links() }}</div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                </div>
            </div>
        </div>

    </div>
@endsection

<script>
    // เริ่มทำงานเมื่อโหลดหน้าจอ
    document.addEventListener('DOMContentLoaded', (event) => {
        console.log("START");
        showTopic();
    });


    // ดึงข้อมูลหมวดหมู่ผ่าน Dropdown 
    function showTopic() {
        //PARAMETERS
        fetch("{{ url('/') }}/api/category_expense")
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
</script>