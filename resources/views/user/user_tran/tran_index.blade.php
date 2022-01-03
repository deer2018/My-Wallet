@extends('layouts.medic.main')

@section('content')

<div class="container-fluid">
 <div class="card shadow mb-4">
      <div class="card-header py-3"><h6 class="m-1 font-weight-bold text-primary">ข้อมูลอาสาสมัคร</h6></div>
                        
  <div class="card-body">


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
                    <th>ลำดับ</th>
                    <th>ชื่อ</th>
                    <th>นามสกุล</th>
                    <th>กลุ่มอาสาสมัคร</th>
                    <th>สถานะ</th>
                    <th>ตรวจสอบและวินิจฉัย+จ่ายยา</th>
                    </tr>
                </thead>
                @foreach($users as $item)
                    <tbody>
                    <td>{{ $loop->iteration }}</td>
                    <td> {{ $item->username }}</td>
                    <td> {{ $item->surname }}</td>
                    <td class="text-primary"> {{ $item->group }}</td>
                    <td class="text-danger">
                        <?php if (!empty($item['advice2'])) {
                        echo "<font color='#10BD27'>ตรวจสอบครั้งที่ 2 แล้ว</font>";} 
                            else if(!empty($item['advice'])) {
                        echo "<font color='#fd7e14'>ตรวจสอบครั้งที่ 1 แล้ว</font>";}
                            else {
                        echo  $item['status'] ;}
                        ?>
                        </td>
                    <td>
                        <a href="{{ url('/medic_volunteer_sub/' . $item->id) }}"><button class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>ประเมินอาการ</button></a>
                        <a href="{{ url('/medic_volunteer/' . $item->id) }}"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>ข้อมูลอาสาสมัคร</button></a>

                        @if(!empty($item->advice2))
                            <a href="{{ url('/medic_pdf/' . $item->id) }}"><button class="btn btn-success btn-sm" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>ปริ้น PDF</button></a>
                        @endif    
                    </td>
                    
                    </tbody>
                @endforeach
                </table>
              <div class="mt-4">{{ $users->appends(['search' => request('search')])->links() }}</div>
            </div>
    </div>
  </div>
 </div>
</div>


@endsection



                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                    