@extends('layouts.admin.main')

@section('content')

    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-1 font-weight-bold " style="color:black ; font-weight:bold" >ข้อมูลหมวดหมู่</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive-sm">

                    <!-- จำกัดหน้าแสดงข้อมูล -->
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-10">
                                <div class="dataTables_length" id="dataTable_length">
                                    <a href="{{ url('/category/create') }}" class="btn btn-info btn-sm" title="Add New category" style="color:black ; font-weight:bold" >
                                        <i class="fa fa-plus" aria-hidden="true"></i> เพิ่มรายการหมวดหมู่
                                    </a>
                                </div>
                            </div>

                            <!-- ค้นหา -->
                            <div class="col-sm-12 col-md-2">
                                <form method="GET" action="{{ url('/category') }}" accept-charset="UTF-8"
                                    class="form-inline my-2 my-lg-0 float-right" role="search">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control" name="search"
                                            placeholder="Search..." value="{{ request('search') }}">
                                        <span class="input-group-append">
                                            <button class="btn btn-info" type="submit">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table" style="color:black ; font-weight:bold" >
                            <thead>
                                <tr>                             
                                    <th>ไอดีหมวดหมู่</th>
                                    <th>ประเภท</th>
                                    <th>ชื่อหมวดหมู่</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $item)
                                    <tr>
                                        <td>{{ $item->category_id }}</td>
                                        @if ($item->type == 'รายรับ')
                                            <td type='number' style="color:blue">{{ $item->type }}</td>
                                        @else
                                            <td type='number' style="color:red">{{ $item->type }}</td>
                                        @endif
                                        <td>{{ $item->topic }}</td>
                                        <td>
                                            <a href="{{ url('/category/' . $item->category_id . '/edit') }}"
                                                title="Edit Crud"><button class="btn btn-primary btn-sm"><i
                                                        class="fa fa-pencil-square-o"
                                                        aria-hidden="true"></i>แก้ไขข้อมูล</button></a>
                                            <form method="POST" action="{{ url('/category' . '/' . $item->category_id) }}"
                                                accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Crud"
                                                    onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                                        class="fa fa-trash-o" aria-hidden="true"></i>ลบข้อมูล</button>
                                            </form>


                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-4">{{ $category->links() }}</div>
                        <div class="pagination-wrapper"> {!! $category->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
