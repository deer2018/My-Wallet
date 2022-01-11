@extends('layouts.user.main')

@section('content')

    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-1 font-weight-bold text-success">ข้อมูลอาสาสมัคร</h6>
            </div>

            <div class="card-body">
               
                    {{-- <div class="col-sm-3 col-md-1 mb-4"> --}}
                        <a href="{{ url('/transaction/create') }}" class="btn btn-success btn-sm"
                            title="Add New Transaction">
                            <i class="fa fa-plus" aria-hidden="true"></i> เพิ่มรายการ
                        </a>
                    {{-- </div> --}}
                    {{-- ประเภท
                    <div class="col-sm-3 col-md-1 mb-4">
                        <div class="dataTables_length" id="category_type">
                        <label><select name="dataTable_length" aria-controls="dataTable" class="custom-select form-control" value="{{request('category_type')}}">
                            <option value="type_all">-- ทั้งหมด --</option>
                            <option value="volunteer">รายรับ</option>
                            <option value="medic">รายจ่าย</option>
                            </select></label> 
                        </div>
                    </div>
                    หมวดหมู่
                    <div class="col-sm-3 col-md-1 mb-4">
                        <div class="dataTables_length" id="category_type">
                        <label><select name="dataTable_length" aria-controls="dataTable" class="custom-select form-control" value="{{request('category_type')}}">
                            <option value="type_all">-- ทั้งหมด --</option>
                            <option value="volunteer">รายรับ</option>
                            <option value="medic">รายจ่าย</option>
                            </select></label> 
                        </div>
                    </div> --}}

                    <!-- ค้นหา -->
                    {{-- <div class="col-sm-3 col-md-12 mb-4"> --}}
                        <form method="GET" action="{{ url('/transaction') }}" accept-charset="UTF-8"
                            class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">

                                <input class="form-control form-control" name="search" id="search"
                                    value="{{ request('search') }}" />
                                <span class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                    {{-- </div> --}}

              

                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">


                    <div class="table-responsive-sm">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                            role="grid" aria-describedby="dataTable_info" style="width: 100%;">

                        <?php $sum_income = 0.00 ?>
                        <?php $sum_expense = 0.00 ?>
                        <?php $total = 0.00 ?>                                 
                            <table class="table dataTable">
                                <thead>
                                    <tr>
                                        <th>วันที่-เวลา</th>
                                        <th>หมวดหมู่</th>
                                        <th>หมายเหตุ</th>
                                        <th>จำนวนเงิน</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                @foreach ($transaction as $item)
                                    <tbody>
                                        <td>{{ $item->created_at->toDateString()}}</td>
                                        <td>{{ $item->category_type }}</td>
                                        <td>{{ $item->comment }}</td>
                                        @if($item->category_type == 'รายรับ')
                                            <td type='number' style="color:blue">{{ $item->income }}</td>  
                                        @else
                                            <td type='number' style="color:red">-{{ $item->expense }}</td>
                                        @endif
                                        <td>
                                            <a href="{{ url('/transaction/' . $item->id . '/edit') }}"
                                                title="Edit Crud"><button class="btn btn-primary btn-sm"><i
                                                        class="fas fa-edit"></i></button></a>
                                            <form method="POST" action="{{ url('/transaction' . '/' . $item->id) }}"
                                                accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Crud"
                                                    onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                                        class="fas fa-trash" aria-hidden="true"></i></button>
                                            </form>
                                            {{-- <a href="{{ url('/medic_volunteer/' . $item->id) }}"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>ข้อมูลอาสาสมัคร</button></a>

                                @if (!empty($item->advice2))
                                    <a href="{{ url('/medic_pdf/' . $item->id) }}"><button class="btn btn-success btn-sm" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>ปริ้น PDF</button></a>
                                @endif --}}
                                        </td>

                                    </tbody>
                                    <?php $sum_income += $item->income ?>          
                                    <?php $sum_expense += $item->expense ?>
                                    <?php $total = $sum_income - $sum_expense ?>
                                @endforeach
                            </table>
                            <hr>

                            <div class="table " style="text-align: center">รวม : 
                            @if($total >= 0)
                                <a style="color:blue">{{$total}}</a>  
                            @else
                                <a style="color:red">{{$total}}</a>
                            @endif
                            </div>
                    </div>
                    <div class="mt-4">{{ $transaction->links() }}</div>
                    <div class="pagination-wrapper"> {!! $transaction->appends(['search' => Request::get('search')])->render() !!} </div>
                </div>
            </div>
        </div>
    </div>

@endsection
