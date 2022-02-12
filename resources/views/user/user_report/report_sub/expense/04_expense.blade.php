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
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                            role="grid" aria-describedby="dataTable_info" style="width: 100%;">


                            <?php $sum_expense = 0.0; ?>

                            <thead>
                                <tr>
                                    <th>วัน-เดือน-ปี</th>
                                    <th>ประเภท</th>
                                    <th>หมวดหมู่</th>
                                    <th>หมายเหตุ</th>
                                    <th>จำนวนเงิน</th>

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

                        <div class="table " style="text-align: right ; padding-right:10%">รวม :
                            <a style="color:red">{{ number_format($sum_expense, 2, '.', ',') }}</a>
                        </div>
                    </div>
                    <div class="mt-4">{{ $transaction->links() }}</div>
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