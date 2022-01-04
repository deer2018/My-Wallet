@extends('layouts.user.main')

@section('content')

<div class="container-fluid">
 <div class="card shadow mb-4">
      <div class="card-header py-3"><h6 class="m-1 font-weight-bold text-primary">ข้อมูลอาสาสมัคร</h6></div>
                        
  <div class="card-body">
    <a href="{{ url('/transaction/income') }}" class="btn btn-primary btn-sm" title="Add New Income">
        <i class="fa fa-plus" aria-hidden="true"></i> เพิ่มรายรับ
    </a>
    <a href="{{ url('/transaction/expense') }}" class="btn btn-danger btn-sm" title="Add New Expense">
        <i class="fa fa-minus" aria-hidden="true"></i> เพิ่มรายจ่าย
    </a>

    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <!-- ค้นหา -->
            {{-- <div class="col-sm-12 col-md-12">
                        <form method="GET" action="{{ url('/medic_volunteer') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                               
                                <input class="form-control form-control" name="search" id="search" value="{{ request('search') }}" />
                                <span class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
            </div> --}}
  

  


            <div class="table-responsive-sm">
            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
            
                <table class="table dataTable">
                <thead>
                    <tr>
                    <th>วันที่-เวลา</th>
                    <th>หมวดหมู่</th>
                    <th>กระเป๋าเงิน</th>
                    <th>หมายเหตุ</th>
                    <th>จำนวนเงิน</th>
                    <th></th>
                    </tr>
                </thead>
                @foreach($tran as $item)
                    <tbody>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->topic}}</td>
                    <td>{{ $item->wallet}}</td>
                    <td>{{ $item->comment}}</td>
                    <td>{{ $item->income }}</td>
                    <td>
                        @if(!isset($item->income))
                          <a href="{{ url('/transaction/' . $item->id . '/edit_income') }}" title="Edit Crud"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>แก้ไขข้อมูล</button></a>
                        @else
                        <a href="{{ url('/transaction/' . $item->id . '/edit_expense') }}" title="Edit Crud"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>แก้ไขข้อมูล</button></a>
                        @endif
                        <form method="POST" action="{{ url('/transaction' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Crud" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i>ลบข้อมูล</button>
                        </form>
                        {{-- <a href="{{ url('/medic_volunteer/' . $item->id) }}"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>ข้อมูลอาสาสมัคร</button></a>

                        @if(!empty($item->advice2))
                            <a href="{{ url('/medic_pdf/' . $item->id) }}"><button class="btn btn-success btn-sm" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>ปริ้น PDF</button></a>
                        @endif     --}}
                    </td>
                    
                    </tbody>
                @endforeach
                </table>
             
            </div>
    </div>
  </div>
 </div>
</div>


@endsection



                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                    