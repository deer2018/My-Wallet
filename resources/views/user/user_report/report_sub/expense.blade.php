@extends('layouts.user.main')

@section('content')
    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header h4 text-danger">รายจ่ายเดือน {{$monthName}} ปี {{$yearName}}  </div>
            <div class="card-body">
                <a href="{{ url('/report_user') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                            class="fa fa-arrow-left" aria-hidden="true"></i> กลับ</button></a>
                <br />
                <br />

                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">


                    <div class="table-responsive-sm">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid"
                            aria-describedby="dataTable_info" style="width: 100%;">


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
