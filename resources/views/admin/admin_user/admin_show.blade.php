@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <div class="row">
          

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Info {{ $users->name }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin_user/') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>ย้อนกลับ</button></a>
                        
                        <br><br>
                        
                            
                           
                            <br></br>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tbody>
                                    <tr><th>เลขลำดับอาสาสมัคร</th><td>{{ $users->id }} </td></tr>
                                    {{-- <tr><th>รหัสนักศึกษา</th><td>{{ $users->student_id }} </td></tr> --}}
                                    <tr><th>ชื่อ</th><td> {{ $users->mastername }} </td></tr>
                                    <tr><th>นามสกุล</th><td> {{ $users->surname }} </td></tr>
                                    <tr><th>เบอร์-มือถือ</th><td> {{ $users->phone }} </td></tr>
                                    <tr><th>อายุ</th><td> {{ $users->age }} </td></tr>
                                    <tr><th>เพศ</th><td> {{ $users->sex }} </td></tr>
                                    <tr><th>คณะ</th><td> {{ $users->faculty }} </td></tr>                                    
                                </tbody>
                                </tbody>
                            </table>
                        </div>
                        <a href="{{ url('/admin_user/' . $users->id . '/edit') }}" title="Edit"><button class="btn btn-info btn-sm"><i class="" aria-hidden="true"></i>แก้ไขข้อมูล</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
