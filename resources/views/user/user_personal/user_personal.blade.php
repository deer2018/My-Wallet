@extends('layouts.user.main')

@section('content')
<div class="card">
    <div class="card-header py-3">
        <h6 class="m-1 font-weight-bold text-success">ประวัติส่วนตัว</h6>
    </div>
    <br>
    <div class="container bootstrap snippets bootdey">
        <div class="panel-body inf-content">
            <div class="row">
                <div class="col-md-6">

                    <div class="table-responsive">
                        <table class="table table-user-information">
                            <tbody>
                                <tr>
                                    <td>
                                        <strong>
                                            <span class="glyphicon glyphicon-asterisk text-primary"></span>
                                            เลขไอดี
                                        </strong>
                                    </td>
                                    <td class="text-primary">
                                        {{ $data->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>
                                            <span class="glyphicon glyphicon-user  text-primary"></span>
                                            ชื่อ
                                        </strong>
                                    </td>
                                    <td class="text-primary">
                                        {{ $data->mastername }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>
                                            <span class="glyphicon glyphicon-cloud text-primary"></span>
                                            นามสกุล
                                        </strong>
                                    </td>
                                    <td class="text-primary">
                                        {{ $data->surname }}
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <strong>
                                            <span class="glyphicon glyphicon-bookmark text-primary"></span>
                                            ชื่อที่แสดงบนเว็บไซต์
                                        </strong>
                                    </td>
                                    <td class="text-primary">
                                        {{ $data->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>
                                            <span class="glyphicon glyphicon-envelope text-primary"></span>
                                            อีเมล
                                        </strong>
                                    </td>
                                    <td class="text-primary">
                                        {{ $data->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>
                                            <span class="glyphicon glyphicon-user  text-primary"></span>
                                            อายุ
                                        </strong>
                                    </td>
                                    <td class="text-primary">
                                        {{ $data->age }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>
                                            <span class="glyphicon glyphicon-eye-open text-primary"></span>
                                            เพศ
                                        </strong>
                                    </td>
                                    <td class="text-primary">
                                        {{ $data->sex }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>
                                            <span class="glyphicon glyphicon-eye-open text-primary"></span>
                                            เบอร์โทรศัพท์
                                        </strong>
                                    </td>
                                    <td class="text-primary">
                                        {{ $data->phone }}
                                    </td>
                                </tr>
                             
                            </tbody>
                        </table>
                        <tr>
                            <div style="text-align: center">
                                <a href="{{ url('/user_personal/' . $data->id . '/edit') }}" title="Edit Crud"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>แก้ไขข้อมูล</button></a>
                            </div><br>
                        </tr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection