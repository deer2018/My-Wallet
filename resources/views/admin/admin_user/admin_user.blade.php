@extends('layouts.admin.main')

@section('content')

<div class="container-fluid">

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-1 font-weight-bold text-success">ข้อมูลสมาชิก</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive-sm">

        <!-- จำกัดหน้าแสดงข้อมูล -->
        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
          <div class="row">
            <div class="col-sm-12 col-md-10">
              <div class="dataTables_length" id="dataTable_length">
                <!-- <label>Show <select name="dataTable_length" aria-controls="dataTable" class="custom-select  form-control " value= "{{request('dataTable_length')}}">
                    <option value="guest">-- เลือกประเภทผู้ใช้ --</option>
                    <option value="volunteer">อาสาสมัคร</option>
                    <option value="medic">หมอ</option>
                    <option value="admin">แอดมิน</option>
                  </select> entries</label> -->
              </div>
            </div>

            <!-- ค้นหา -->
            <div class="col-sm-12 col-md-2">
              <form method="GET" action="{{ url('/admin_user') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                <div class="input-group">
                  <input type="text" class="form-control form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                  <span class="input-group-append">
                    <button class="btn btn-success" type="submit">
                      <i class="fa fa-search"></i>
                    </button>
                  </span>
                </div>
              </form>
            </div>
          </div>
        </div>

        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">

          <table class="table dataTable">
            <thead>
              <tr>
                <th>#</th>
                <th>ชื่อในเว็บ</th>
                <th>อีเมล</th>
                <th>คณะ</th>
                <th></th>
              </tr>
            </thead>
            @foreach($users as $item)
            <tbody>
              <td>{{ $loop->iteration }}</td>
              <td> {{ $item->name  }}</td>
              <td> {{ $item->email  }}</td>
              <td> {{ $item->faculty  }}</td>
              <td><a href="{{ url('/admin_user/' . $item->id) }}" title="ประวัติส่วนตัว"><button class="btn btn-primary btn-sm"><i class="fas fa-edit" aria-hidden="true"></i></button></a>
                {{-- <a href="{{ url('/admin_user_report/' . $item->id ) }}" title="Report"><button class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>สรุปรายรับ-จ่าย</button></a> --}}
                <form method="POST" action="{{ url('/admin_user' . '/' . $item->id) }}"
                  accept-charset="UTF-8" style="display:inline">
                  {{ method_field('DELETE') }}
                  {{ csrf_field() }}
                  <button type="submit" class="btn btn-danger btn-sm" title="ลบรายการ"
                      onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                          class="fas fa-trash" aria-hidden="true"></i></button>
              </form>
                </td>
            </tbody>
            @endforeach
          </table>
          <div class="mt-4">{{ $users->links() }}</div>
          {{-- <div class="pagination-wrapper"> {!! $users->appends(['search' => Request::get('search')])->render() !!} </div> --}}

      </div>
    </div>
  </div>
</div>

@endsection