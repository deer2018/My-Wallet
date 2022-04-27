@extends('layouts.admin.main')

@section('content')

    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-1 font-weight-bold text-info">ข้อมูลหมวดหมู่</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive-sm">

                    <!-- จำกัดหน้าแสดงข้อมูล -->
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-10">
                               
                            </div>

                        </div>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>                             
                                    <th>คำร้อง</th>
                                    <th>ไอดีผู้ใช้</th>
                                  
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detail as $item)
                                    <tr>
                                        <td>{{ $item->detail }}</td>
                                        <td>{{ $item->user_id }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                  
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
