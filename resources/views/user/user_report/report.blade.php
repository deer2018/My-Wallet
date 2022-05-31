@extends('layouts.user.main')

@section('content')
    <div class="container-fluid">

        <div class="row">

            {{-- แสดงค่าเป็นเดือนๆของปีปัจจุบัน --}}
            <div class="col-xl-12 col-md-12 mb-4">
                <div class="card  shadow h-100 ">
                    <div class="card-header py-2">

                        <form method="GET" action="{{ url('/report_user') }}" accept-charset="UTF-8"
                            class="row ">
                            @csrf

                            <div class="dataTables_length">
                                <select name='selectYear' class="form-control">
                                    @foreach ($group_year as $group_year)
                                        <option value="{{ $group_year->year }}"
                                            {{ $group_year->year == $select_year ? 'selected' : '' }}>
                                            รายการปี {{ $group_year->year + 543 }}</option>
                                    @endforeach
                                </select>

                            </div>
                            &nbsp;&nbsp;
                            <div class="dataTables_length">
                                <button class="btn btn-success" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>

                        </form>
                        @if (!isset($select_year))
                        <h4 class="m-1 font-weight-bold text-gray-800 " style="text-align: center">
                            รายงานสรุปค่าใช้จ่ายปี {{ $yearThai }}</h4>
                </div>
                <form method="GET" action="{{ url('/report_sup') }}" accept-charset="UTF-8">
                    <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                        role="grid" aria-describedby="dataTable_info" style="width: 100%;" >
                        <thead>
                            <tr>
                                <th class="h5 mb-1 font-weight-bold text-dark text-uppercase ">เดือน</th>
                                <th class="h5 mb-1 font-weight-bold text-dark text-uppercase ">รายรับ</th>
                                <th class="h5 mb-1 font-weight-bold text-dark text-uppercase ">รายจ่าย</th>
                                <th class="h5 mb-1 font-weight-bold text-dark text-uppercase ">รวม</th>
                            </tr>
                        </thead>

                        <tbody >
                            @if ($monthCheck == '1')
                                <td class="h5 mb-1 font-weight-bold text-dark text-uppercase "><a>มกราคม</a></td>
                            @else
                                <td class="h5 mb-1 font-weight-bold text-dark text-uppercase ">มกราคม</td>
                            @endif
                            <td class="h5 mb-1 font-weight-bold text-primary text-uppercase ">
                                {{ number_format($jan_income, 2, '.', ',') }}
                                <a href="{{ url('/report_sup/' . $yearCheck . '/jan_income') }}"
                                    class="btn btn-sm font-weight-bold" name="jan_income" title="Detail"><i
                                        class="font-weight-bold">more...</i></a>

                            </td>
                            <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                {{ number_format($jan_expense, 2, '.', ',') }}
                                <a href="{{ url('/report_sup/' . $yearCheck . '/jan_expense') }}"
                                    class="btn  btn-sm" title="Detail"><i class="font-weight-bold">more...</i></a>
                            </td>

                            @if ($jan_total >= 0)
                                <td class="h5 mb-1 font-weight-bold text-success text-uppercase ">
                                    &nbsp;{{ number_format($jan_total, 2, '.', ',') }}</td>
                            @else
                                <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                    {{ number_format($jan_total, 2, '.', ',') }}</td>
                            @endif

                        </tbody>

                        <tbody>
                            @if ($monthCheck == '2')
                                <td class="h5 mb-1 font-weight-bold text-dark text-uppercase "><a>กุมภาพันธ์</a></td>
                            @else
                                <td class="h5 mb-1 font-weight-bold text-dark text-uppercase ">กุมภาพันธ์</td>
                            @endif

                            <td class="h5 mb-1 font-weight-bold text-primary text-uppercase ">
                                {{ number_format($feb_income, 2, '.', ',') }}
                                <a href="{{ url('/report_sup/' . $yearCheck . '/feb_income') }}"
                                    class="btn btn-sm" title="Detail">
                                    <i class="font-weight-bold">more...</i>
                                </a>
                            </td>
                            <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                {{ number_format($feb_expense, 2, '.', ',') }}
                                <a href="{{ url('/report_sup/' . $yearCheck . '/feb_expense') }}"
                                    class="btn btn-sm" title="Detail">
                                    <i class="font-weight-bold">more...</i>
                                </a>
                            </td>

                            @if ($feb_total >= 0)
                                <td class="h5 mb-1 font-weight-bold text-success text-uppercase ">
                                    &nbsp;{{ number_format($feb_total, 2, '.', ',') }}</td>
                            @else
                                <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                    {{ number_format($feb_total, 2, '.', ',') }}</td>
                            @endif

                        </tbody>

                        <tbody>
                            @if ($monthCheck == '3')
                                <td class="h5 mb-1 font-weight-bold text-dark text-uppercase "><a>มีนาคม</a></td>
                            @else
                                <td class="h5 mb-1 font-weight-bold text-dark text-uppercase ">มีนาคม</td>
                            @endif

                            <td class="h5 mb-1 font-weight-bold text-primary text-uppercase ">
                                {{ number_format($mar_income, 2, '.', ',') }}
                                <a href="{{ url('/report_sup/' . $yearCheck . '/mar_income') }}"
                                    class="btn btn-sm" title="Detail">
                                    <i class="font-weight-bold">more...</i>
                                </a>
                            </td>
                            <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                {{ number_format($mar_expense, 2, '.', ',') }}
                                <a href="{{ url('/report_sup/' . $yearCheck . '/mar_expense') }}"
                                    class="btn btn-sm" title="Detail">
                                    <i class="font-weight-bold">more...</i>
                                </a>
                            </td>

                            @if ($mar_total >= 0)
                                <td class="h5 mb-1 font-weight-bold text-success text-uppercase ">
                                    &nbsp;{{ number_format($mar_total, 2, '.', ',') }}</td>
                            @else
                                <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                    {{ number_format($mar_total, 2, '.', ',') }}</td>
                            @endif

                        </tbody>

                        <tbody>
                            @if ($monthCheck == '4')
                                <td class="h5 mb-1 font-weight-bold text-dark text-uppercase "><a>เมษายน</a></td>
                            @else
                                <td class="h5 mb-1 font-weight-bold text-dark text-uppercase ">เมษายน</td>
                            @endif

                            <td class="h5 mb-1 font-weight-bold text-primary text-uppercase ">
                                {{ number_format($apr_income, 2, '.', ',') }}
                                <a href="{{ url('/report_sup/' . $yearCheck . '/apr_income') }}"
                                    class="btn  btn-sm" title="Detail">
                                    <i class="font-weight-bold">more...</i>
                                </a>
                            </td>
                            <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                {{ number_format($apr_expense, 2, '.', ',') }}
                                <a href="{{ url('/report_sup/' . $yearCheck . '/apr_expense') }}"
                                    class="btn  btn-sm" title="Detail">
                                    <i class="font-weight-bold">more...</i>
                                </a>
                            </td>

                            @if ($apr_total >= 0)
                                <td class="h5 mb-1 font-weight-bold text-success text-uppercase ">
                                    &nbsp;{{ number_format($apr_total, 2, '.', ',') }}</td>
                            @else
                                <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                    {{ number_format($apr_total, 2, '.', ',') }}</td>
                            @endif

                        </tbody>

                        <tbody>
                            @if ($monthCheck == '5')
                                <td class="h5 mb-1 font-weight-bold text-dark text-uppercase "><a>พฤษภาคม</a></td>
                            @else
                                <td class="h5 mb-1 font-weight-bold text-dark text-uppercase ">พฤษภาคม</td>
                            @endif


                            <td class="h5 mb-1 font-weight-bold text-primary text-uppercase ">
                                {{ number_format($may_income, 2, '.', ',') }}
                                <a href="{{ url('/report_sup/' . $yearCheck . '/may_income') }}"
                                    class="btn  btn-sm" title="Detail">
                                    <i class="font-weight-bold">more...</i>
                                </a>
                            </td>
                            <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                {{ number_format($may_expense, 2, '.', ',') }}
                                <a href="{{ url('/report_sup/' . $yearCheck . '/may_expense') }}"
                                    class="btn  btn-sm" title="Detail">
                                    <i class="font-weight-bold">more...</i>
                                </a>
                            </td>

                            @if ($may_total >= 0)
                                <td class="h5 mb-1 font-weight-bold text-success text-uppercase ">
                                    &nbsp;{{ number_format($may_total, 2, '.', ',') }}</td>
                            @else
                                <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                    {{ number_format($may_total, 2, '.', ',') }}</td>
                            @endif

                        </tbody>

                        <tbody>
                            @if ($monthCheck == '6')
                                <td class="h5 mb-1 font-weight-bold text-dark text-uppercase "><a>มิถุนายน</a></td>
                            @else
                                <td class="h5 mb-1 font-weight-bold text-dark text-uppercase ">มิถุนายน</td>
                            @endif


                            <td class="h5 mb-1 font-weight-bold text-primary text-uppercase ">
                                {{ number_format($jun_income, 2, '.', ',') }}
                                <a href="{{ url('/report_sup/' . $yearCheck . '/jun_income') }}"
                                    class="btn  btn-sm" title="Detail">
                                    <i class="font-weight-bold">more...</i>
                                </a>
                            </td>
                            <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                {{ number_format($jun_expense, 2, '.', ',') }}
                                <a href="{{ url('/report_sup/' . $yearCheck . '/jun_expense') }}"
                                    class="btn  btn-sm" title="Detail">
                                    <i class="font-weight-bold">more...</i>
                                </a>
                            </td>

                            @if ($jun_total >= 0)
                                <td class="h5 mb-1 font-weight-bold text-success text-uppercase ">
                                    &nbsp;{{ number_format($jun_total, 2, '.', ',') }}</td>
                            @else
                                <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                    {{ number_format($jun_total, 2, '.', ',') }}</td>
                            @endif

                        </tbody>

                        <tbody>
                            @if ($monthCheck == '7')
                                <td class="h5 mb-1 font-weight-bold text-dark text-uppercase "><a>กรกฎาคม</a></td>
                            @else
                                <td class="h5 mb-1 font-weight-bold text-dark text-uppercase ">กรกฎาคม</td>
                            @endif


                            <td class="h5 mb-1 font-weight-bold text-primary text-uppercase ">
                                {{ number_format($jul_income, 2, '.', ',') }}
                                <a href="{{ url('/report_sup/' . $yearCheck . '/jul_income') }}"
                                    class="btn  btn-sm" title="Detail">
                                    <i class="font-weight-bold">more...</i>
                                </a>
                            </td>
                            <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                {{ number_format($jul_expense, 2, '.', ',') }}
                                <a href="{{ url('/report_sup/' . $yearCheck . '/jul_expense') }}"
                                    class="btn  btn-sm" title="Detail">
                                    <i class="font-weight-bold">more...</i>
                                </a>
                            </td>

                            @if ($jul_total >= 0)
                                <td class="h5 mb-1 font-weight-bold text-success text-uppercase ">
                                    &nbsp;{{ number_format($jul_total, 2, '.', ',') }}</td>
                            @else
                                <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                    {{ number_format($jul_total, 2, '.', ',') }}</td>
                            @endif

                        </tbody>

                        <tbody>
                            @if ($monthCheck == '8')
                                <td class="h5 mb-1 font-weight-bold text-dark text-uppercase "><a>สิงหาคม</a></td>
                            @else
                                <td class="h5 mb-1 font-weight-bold text-dark text-uppercase ">สิงหาคม</td>
                            @endif


                            <td class="h5 mb-1 font-weight-bold text-primary text-uppercase ">
                                {{ number_format($aug_income, 2, '.', ',') }}
                                <a href="{{ url('/report_sup/' . $yearCheck . '/aug_income') }}"
                                    class="btn  btn-sm" title="Detail">
                                    <i class="font-weight-bold">more...</i>
                                </a>
                            </td>
                            <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                {{ number_format($aug_expense, 2, '.', ',') }}
                                <a href="{{ url('/report_sup/' . $yearCheck . '/aug_expense') }}"
                                    class="btn  btn-sm" title="Detail">
                                    <i class="font-weight-bold">more...</i>
                                </a>
                            </td>

                            @if ($aug_total >= 0)
                                <td class="h5 mb-1 font-weight-bold text-success text-uppercase ">
                                    &nbsp;{{ number_format($aug_total, 2, '.', ',') }}</td>
                            @else
                                <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                    {{ number_format($aug_total, 2, '.', ',') }}</td>
                            @endif

                        </tbody>

                        <tbody>
                            @if ($monthCheck == '9')
                                <td class="h5 mb-1 font-weight-bold text-dark text-uppercase "><a>กันยายน</a></td>
                            @else
                                <td class="h5 mb-1 font-weight-bold text-dark text-uppercase ">กันยายน</td>
                            @endif


                            <td class="h5 mb-1 font-weight-bold text-primary text-uppercase ">
                                {{ number_format($sep_income, 2, '.', ',') }}
                                <a href="{{ url('/report_sup/' . $yearCheck . '/sep_income') }}"
                                    class="btn  btn-sm" title="Detail">
                                    <i class="font-weight-bold">more...</i>
                                </a>
                            </td>
                            <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                {{ number_format($sep_expense, 2, '.', ',') }}
                                <a href="{{ url('/report_sup/' . $yearCheck . '/sep_expense') }}"
                                    class="btn  btn-sm" title="Detail">
                                    <i class="font-weight-bold">more...</i>
                                </a>
                            </td>

                            @if ($sep_total >= 0)
                                <td class="h5 mb-1 font-weight-bold text-success text-uppercase ">
                                    &nbsp;{{ number_format($sep_total, 2, '.', ',') }}</td>
                            @else
                                <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                    {{ number_format($sep_total, 2, '.', ',') }}</td>
                            @endif

                        </tbody>

                        <tbody>
                            @if ($monthCheck == '10')
                                <td class="h5 mb-1 font-weight-bold text-dark text-uppercase "><a>ตุลาคม</a></td>
                            @else
                                <td class="h5 mb-1 font-weight-bold text-dark text-uppercase ">ตุลาคม</td>
                            @endif


                            <td class="h5 mb-1 font-weight-bold text-primary text-uppercase ">
                                {{ number_format($oct_income, 2, '.', ',') }}
                                <a href="{{ url('/report_sup/' . $yearCheck . '/oct_income') }}"
                                    class="btn  btn-sm" title="Detail">
                                    <i class="font-weight-bold">more...</i>
                                </a>
                            </td>
                            <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                {{ number_format($oct_expense, 2, '.', ',') }}
                                <a href="{{ url('/report_sup/' . $yearCheck . '/oct_expense') }}"
                                    class="btn  btn-sm" title="Detail">
                                    <i class="font-weight-bold">more...</i>
                                </a>
                            </td>

                            @if ($oct_total >= 0)
                                <td class="h5 mb-1 font-weight-bold text-success text-uppercase ">
                                    &nbsp;{{ number_format($oct_total, 2, '.', ',') }}</td>
                            @else
                                <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                    {{ number_format($oct_total, 2, '.', ',') }}</td>
                            @endif

                        </tbody>

                        <tbody>
                            @if ($monthCheck == '11')
                                <td class="h5 mb-1 font-weight-bold text-dark text-uppercase "><a>พฤศจิกายน</a></td>
                            @else
                                <td class="h5 mb-1 font-weight-bold text-dark text-uppercase ">พฤศจิกายน</td>
                            @endif


                            <td class="h5 mb-1 font-weight-bold text-primary text-uppercase ">
                                {{ number_format($nov_income, 2, '.', ',') }}
                                <a href="{{ url('/report_sup/' . $yearCheck . '/nov_income') }}"
                                    class="btn  btn-sm" title="Detail">
                                    <i class="font-weight-bold">more...</i>
                                </a>
                            </td>
                            <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                {{ number_format($nov_expense, 2, '.', ',') }}
                                <a href="{{ url('/report_sup/' . $yearCheck . '/nov_expense') }}"
                                    class="btn  btn-sm" title="Detail">
                                    <i class="font-weight-bold">more...</i>
                                </a>
                            </td>

                            @if ($nov_total >= 0)
                                <td class="h5 mb-1 font-weight-bold text-success text-uppercase ">
                                    &nbsp;{{ number_format($nov_total, 2, '.', ',') }}</td>
                            @else
                                <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                    {{ number_format($nov_total, 2, '.', ',') }}</td>
                            @endif
                        </tbody>

                        <tbody>
                            @if ($monthCheck == '12')
                                <td class="h5 mb-1 font-weight-bold text-dark text-uppercase "><a>ธันวาคม</a></td>
                            @else
                                <td class="h5 mb-1 font-weight-bold text-dark text-uppercase ">ธันวาคม</td>
                            @endif


                            <td class="h5 mb-1 font-weight-bold text-primary text-uppercase ">
                                {{ number_format($dec_income, 2, '.', ',') }}
                                <a href="{{ url('/report_sup/' . $yearCheck . '/dec_income') }}"
                                    class="btn  btn-sm" title="Detail">
                                    <i class="font-weight-bold">more...</i>
                                </a>
                            </td>
                            <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                {{ number_format($dec_expense, 2, '.', ',') }}
                                <a href="{{ url('/report_sup/' . $yearCheck . '/dec_expense') }}"
                                    class="btn  btn-sm" title="Detail">
                                    <i class="font-weight-bold">more...</i>
                                </a>
                            </td>

                            @if ($dec_total >= 0)
                                <td class="h5 mb-1 font-weight-bold text-success text-uppercase ">
                                    &nbsp;{{ number_format($dec_total, 2, '.', ',') }}</td>
                            @else
                                <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                    {{ number_format($dec_total, 2, '.', ',') }}</td>
                            @endif

                        </tbody>

                    </table>
                </form>

                <div class="row justify-content-around">

                    <!-- รายรับ -->
                    <div class="col-xl-5 col-md-5 mb-4">
                        <div class="card ">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <h5 class="mb-1 font-weight-bold text-primary text-uppercase ">
                                            <a class="h5 mb-1 font-weight-bold text-dark text-uppercase ">รวมรายรับปี
                                                {{ $yearCheck + 543 }} :</a>
                                            {{ number_format($annual_income, 2, '.', ',') }}
                                            <a class="h5 mb-1 font-weight-bold text-dark text-uppercase "> บาท</a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- รายจ่าย -->
                    <div class="col-xl-5 col-md-5 mb-4">
                        <div class="card ">

                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <h5 class="mb-1 font-weight-bold text-danger text-uppercase ">
                                            <a class="h5 mb-1 font-weight-bold text-dark text-uppercase ">รวมรายจ่ายปี
                                                {{ $yearCheck + 543}}  :</a>
                                            {{ number_format($annual_expense, 2, '.', ',') }}
                                            <a class="h5 mb-1 font-weight-bold text-dark text-uppercase "> บาท</a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

              

                </div>
            </div>

        </div>
                        @else
                            <h4 class="m-1 font-weight-bold text-gray-800 " style="text-align: center">
                                รายงานสรุปค่าใช้จ่ายปี {{ $yearName }}</h4>
                    </div>
                    <form method="GET" action="{{ url('/report_sup') }}" accept-charset="UTF-8">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                            role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead >
                                <tr>
                                    <th class="h5 mb-1 font-weight-bold text-dark text-uppercase ">เดือน</th>
                                    <th class="h5 mb-1 font-weight-bold text-dark text-uppercase ">รายรับ</th>
                                    <th class="h5 mb-1 font-weight-bold text-dark text-uppercase ">รายจ่าย</th>
                                    <th class="h5 mb-1 font-weight-bold text-dark text-uppercase ">รวม</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if ($monthCheck == '1')
                                    <td class="h5 mb-1 font-weight-bold text-dark text-uppercase "><a>มกราคม</a></td>
                                @else
                                    <td class="h5 mb-1 font-weight-bold text-dark text-uppercase ">มกราคม</td>
                                @endif
                                <td class="h5 mb-1 font-weight-bold text-primary text-uppercase ">
                                    {{ number_format($jan_income, 2, '.', ',') }}
                                    <a href="{{ url('/report_sup/' . $select_year . '/jan_income') }}"
                                        class="btn btn-sm font-weight-bold" name="jan_income" title="Detail"><i
                                            class="font-weight-bold">more...</i></a>

                                </td>
                                <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                    {{ number_format($jan_expense, 2, '.', ',') }}
                                    <a href="{{ url('/report_sup/' . $select_year . '/jan_expense') }}"
                                        class="btn  btn-sm" title="Detail"><i class="font-weight-bold">more...</i></a>
                                </td>

                                @if ($jan_total >= 0)
                                    <td class="h5 mb-1 font-weight-bold text-success text-uppercase ">
                                        &nbsp;{{ number_format($jan_total, 2, '.', ',') }}</td>
                                @else
                                    <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                        {{ number_format($jan_total, 2, '.', ',') }}</td>
                                @endif

                            </tbody>

                            <tbody>
                                @if ($monthCheck == '2')
                                    <td class="h5 mb-1 font-weight-bold text-dark text-uppercase "><a>กุมภาพันธ์</a></td>
                                @else
                                    <td class="h5 mb-1 font-weight-bold text-dark text-uppercase ">กุมภาพันธ์</td>
                                @endif

                                <td class="h5 mb-1 font-weight-bold text-primary text-uppercase ">
                                    {{ number_format($feb_income, 2, '.', ',') }}
                                    <a href="{{ url('/report_sup/' . $select_year . '/feb_income') }}"
                                        class="btn btn-sm" title="Detail">
                                        <i class="font-weight-bold">more...</i>
                                    </a>
                                </td>
                                <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                    {{ number_format($feb_expense, 2, '.', ',') }}
                                    <a href="{{ url('/report_sup/' . $select_year . '/feb_expense') }}"
                                        class="btn btn-sm" title="Detail">
                                        <i class="font-weight-bold">more...</i>
                                    </a>
                                </td>

                                @if ($feb_total >= 0)
                                    <td class="h5 mb-1 font-weight-bold text-success text-uppercase ">
                                        &nbsp;{{ number_format($feb_total, 2, '.', ',') }}</td>
                                @else
                                    <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                        {{ number_format($feb_total, 2, '.', ',') }}</td>
                                @endif

                            </tbody>

                            <tbody>
                                @if ($monthCheck == '3')
                                    <td class="h5 mb-1 font-weight-bold text-dark text-uppercase "><a>มีนาคม</a></td>
                                @else
                                    <td class="h5 mb-1 font-weight-bold text-dark text-uppercase ">มีนาคม</td>
                                @endif

                                <td class="h5 mb-1 font-weight-bold text-primary text-uppercase ">
                                    {{ number_format($mar_income, 2, '.', ',') }}
                                    <a href="{{ url('/report_sup/' . $select_year . '/mar_income') }}"
                                        class="btn btn-sm" title="Detail">
                                        <i class="font-weight-bold">more...</i>
                                    </a>
                                </td>
                                <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                    {{ number_format($mar_expense, 2, '.', ',') }}
                                    <a href="{{ url('/report_sup/' . $select_year . '/mar_expense') }}"
                                        class="btn btn-sm" title="Detail">
                                        <i class="font-weight-bold">more...</i>
                                    </a>
                                </td>

                                @if ($mar_total >= 0)
                                    <td class="h5 mb-1 font-weight-bold text-success text-uppercase ">
                                        &nbsp;{{ number_format($mar_total, 2, '.', ',') }}</td>
                                @else
                                    <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                        {{ number_format($mar_total, 2, '.', ',') }}</td>
                                @endif

                            </tbody>

                            <tbody>
                                @if ($monthCheck == '4')
                                    <td class="h5 mb-1 font-weight-bold text-dark text-uppercase "><a>เมษายน</a></td>
                                @else
                                    <td class="h5 mb-1 font-weight-bold text-dark text-uppercase ">เมษายน</td>
                                @endif

                                <td class="h5 mb-1 font-weight-bold text-primary text-uppercase ">
                                    {{ number_format($apr_income, 2, '.', ',') }}
                                    <a href="{{ url('/report_sup/' . $select_year . '/apr_income') }}"
                                        class="btn  btn-sm" title="Detail">
                                        <i class="font-weight-bold">more...</i>
                                    </a>
                                </td>
                                <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                    {{ number_format($apr_expense, 2, '.', ',') }}
                                    <a href="{{ url('/report_sup/' . $select_year . '/apr_expense') }}"
                                        class="btn  btn-sm" title="Detail">
                                        <i class="font-weight-bold">more...</i>
                                    </a>
                                </td>

                                @if ($apr_total >= 0)
                                    <td class="h5 mb-1 font-weight-bold text-success text-uppercase ">
                                        &nbsp;{{ number_format($apr_total, 2, '.', ',') }}</td>
                                @else
                                    <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                        {{ number_format($apr_total, 2, '.', ',') }}</td>
                                @endif

                            </tbody>

                            <tbody>
                                @if ($monthCheck == '5')
                                    <td class="h5 mb-1 font-weight-bold text-dark text-uppercase "><a>พฤษภาคม</a></td>
                                @else
                                    <td class="h5 mb-1 font-weight-bold text-dark text-uppercase ">พฤษภาคม</td>
                                @endif


                                <td class="h5 mb-1 font-weight-bold text-primary text-uppercase ">
                                    {{ number_format($may_income, 2, '.', ',') }}
                                    <a href="{{ url('/report_sup/' . $select_year . '/may_income') }}"
                                        class="btn  btn-sm" title="Detail">
                                        <i class="font-weight-bold">more...</i>
                                    </a>
                                </td>
                                <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                    {{ number_format($may_expense, 2, '.', ',') }}
                                    <a href="{{ url('/report_sup/' . $select_year . '/may_expense') }}"
                                        class="btn  btn-sm" title="Detail">
                                        <i class="font-weight-bold">more...</i>
                                    </a>
                                </td>

                                @if ($may_total >= 0)
                                    <td class="h5 mb-1 font-weight-bold text-success text-uppercase ">
                                        &nbsp;{{ number_format($may_total, 2, '.', ',') }}</td>
                                @else
                                    <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                        {{ number_format($may_total, 2, '.', ',') }}</td>
                                @endif

                            </tbody>

                            <tbody>
                                @if ($monthCheck == '6')
                                    <td class="h5 mb-1 font-weight-bold text-dark text-uppercase "><a>มิถุนายน</a></td>
                                @else
                                    <td class="h5 mb-1 font-weight-bold text-dark text-uppercase ">มิถุนายน</td>
                                @endif


                                <td class="h5 mb-1 font-weight-bold text-primary text-uppercase ">
                                    {{ number_format($jun_income, 2, '.', ',') }}
                                    <a href="{{ url('/report_sup/' . $select_year . '/jun_income') }}"
                                        class="btn  btn-sm" title="Detail">
                                        <i class="font-weight-bold">more...</i>
                                    </a>
                                </td>
                                <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                    {{ number_format($jun_expense, 2, '.', ',') }}
                                    <a href="{{ url('/report_sup/' . $select_year . '/jun_expense') }}"
                                        class="btn  btn-sm" title="Detail">
                                        <i class="font-weight-bold">more...</i>
                                    </a>
                                </td>

                                @if ($jun_total >= 0)
                                    <td class="h5 mb-1 font-weight-bold text-success text-uppercase ">
                                        &nbsp;{{ number_format($jun_total, 2, '.', ',') }}</td>
                                @else
                                    <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                        {{ number_format($jun_total, 2, '.', ',') }}</td>
                                @endif

                            </tbody>

                            <tbody>
                                @if ($monthCheck == '7')
                                    <td class="h5 mb-1 font-weight-bold text-dark text-uppercase "><a>กรกฎาคม</a></td>
                                @else
                                    <td class="h5 mb-1 font-weight-bold text-dark text-uppercase ">กรกฎาคม</td>
                                @endif


                                <td class="h5 mb-1 font-weight-bold text-primary text-uppercase ">
                                    {{ number_format($jul_income, 2, '.', ',') }}
                                    <a href="{{ url('/report_sup/' . $select_year . '/jul_income') }}"
                                        class="btn  btn-sm" title="Detail">
                                        <i class="font-weight-bold">more...</i>
                                    </a>
                                </td>
                                <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                    {{ number_format($jul_expense, 2, '.', ',') }}
                                    <a href="{{ url('/report_sup/' . $select_year . '/jul_expense') }}"
                                        class="btn  btn-sm" title="Detail">
                                        <i class="font-weight-bold">more...</i>
                                    </a>
                                </td>

                                @if ($jul_total >= 0)
                                    <td class="h5 mb-1 font-weight-bold text-success text-uppercase ">
                                        &nbsp;{{ number_format($jul_total, 2, '.', ',') }}</td>
                                @else
                                    <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                        {{ number_format($jul_total, 2, '.', ',') }}</td>
                                @endif

                            </tbody>

                            <tbody>
                                @if ($monthCheck == '8')
                                    <td class="h5 mb-1 font-weight-bold text-dark text-uppercase "><a>สิงหาคม</a></td>
                                @else
                                    <td class="h5 mb-1 font-weight-bold text-dark text-uppercase ">สิงหาคม</td>
                                @endif


                                <td class="h5 mb-1 font-weight-bold text-primary text-uppercase ">
                                    {{ number_format($aug_income, 2, '.', ',') }}
                                    <a href="{{ url('/report_sup/' . $select_year . '/aug_income') }}"
                                        class="btn  btn-sm" title="Detail">
                                        <i class="font-weight-bold">more...</i>
                                    </a>
                                </td>
                                <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                    {{ number_format($aug_expense, 2, '.', ',') }}
                                    <a href="{{ url('/report_sup/' . $select_year . '/aug_expense') }}"
                                        class="btn  btn-sm" title="Detail">
                                        <i class="font-weight-bold">more...</i>
                                    </a>
                                </td>

                                @if ($aug_total >= 0)
                                    <td class="h5 mb-1 font-weight-bold text-success text-uppercase ">
                                        &nbsp;{{ number_format($aug_total, 2, '.', ',') }}</td>
                                @else
                                    <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                        {{ number_format($aug_total, 2, '.', ',') }}</td>
                                @endif

                            </tbody>

                            <tbody>
                                @if ($monthCheck == '9')
                                    <td class="h5 mb-1 font-weight-bold text-dark text-uppercase "><a>กันยายน</a></td>
                                @else
                                    <td class="h5 mb-1 font-weight-bold text-dark text-uppercase ">กันยายน</td>
                                @endif


                                <td class="h5 mb-1 font-weight-bold text-primary text-uppercase ">
                                    {{ number_format($sep_income, 2, '.', ',') }}
                                    <a href="{{ url('/report_sup/' . $select_year . '/sep_income') }}"
                                        class="btn  btn-sm" title="Detail">
                                        <i class="font-weight-bold">more...</i>
                                    </a>
                                </td>
                                <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                    {{ number_format($sep_expense, 2, '.', ',') }}
                                    <a href="{{ url('/report_sup/' . $select_year . '/sep_expense') }}"
                                        class="btn  btn-sm" title="Detail">
                                        <i class="font-weight-bold">more...</i>
                                    </a>
                                </td>

                                @if ($sep_total >= 0)
                                    <td class="h5 mb-1 font-weight-bold text-success text-uppercase ">
                                        &nbsp;{{ number_format($sep_total, 2, '.', ',') }}</td>
                                @else
                                    <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                        {{ number_format($sep_total, 2, '.', ',') }}</td>
                                @endif

                            </tbody>

                            <tbody>
                                @if ($monthCheck == '10')
                                    <td class="h5 mb-1 font-weight-bold text-dark text-uppercase "><a>ตุลาคม</a></td>
                                @else
                                    <td class="h5 mb-1 font-weight-bold text-dark text-uppercase ">ตุลาคม</td>
                                @endif


                                <td class="h5 mb-1 font-weight-bold text-primary text-uppercase ">
                                    {{ number_format($oct_income, 2, '.', ',') }}
                                    <a href="{{ url('/report_sup/' . $select_year . '/oct_income') }}"
                                        class="btn  btn-sm" title="Detail">
                                        <i class="font-weight-bold">more...</i>
                                    </a>
                                </td>
                                <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                    {{ number_format($oct_expense, 2, '.', ',') }}
                                    <a href="{{ url('/report_sup/' . $select_year . '/oct_expense') }}"
                                        class="btn  btn-sm" title="Detail">
                                        <i class="font-weight-bold">more...</i>
                                    </a>
                                </td>

                                @if ($oct_total >= 0)
                                    <td class="h5 mb-1 font-weight-bold text-success text-uppercase ">
                                        &nbsp;{{ number_format($oct_total, 2, '.', ',') }}</td>
                                @else
                                    <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                        {{ number_format($oct_total, 2, '.', ',') }}</td>
                                @endif

                            </tbody>

                            <tbody>
                                @if ($monthCheck == '11')
                                    <td class="h5 mb-1 font-weight-bold text-dark text-uppercase "><a>พฤศจิกายน</a></td>
                                @else
                                    <td class="h5 mb-1 font-weight-bold text-dark text-uppercase ">พฤศจิกายน</td>
                                @endif


                                <td class="h5 mb-1 font-weight-bold text-primary text-uppercase ">
                                    {{ number_format($nov_income, 2, '.', ',') }}
                                    <a href="{{ url('/report_sup/' . $select_year . '/nov_income') }}"
                                        class="btn  btn-sm" title="Detail">
                                        <i class="font-weight-bold">more...</i>
                                    </a>
                                </td>
                                <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                    {{ number_format($nov_expense, 2, '.', ',') }}
                                    <a href="{{ url('/report_sup/' . $select_year . '/nov_expense') }}"
                                        class="btn  btn-sm" title="Detail">
                                        <i class="font-weight-bold">more...</i>
                                    </a>
                                </td>

                                @if ($nov_total >= 0)
                                    <td class="h5 mb-1 font-weight-bold text-success text-uppercase ">
                                        &nbsp;{{ number_format($nov_total, 2, '.', ',') }}</td>
                                @else
                                    <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                        {{ number_format($nov_total, 2, '.', ',') }}</td>
                                @endif
                            </tbody>

                            <tbody>
                                @if ($monthCheck == '12')
                                    <td class="h5 mb-1 font-weight-bold text-dark text-uppercase "><a>ธันวาคม</a></td>
                                @else
                                    <td class="h5 mb-1 font-weight-bold text-dark text-uppercase ">ธันวาคม</td>
                                @endif


                                <td class="h5 mb-1 font-weight-bold text-primary text-uppercase ">
                                    {{ number_format($dec_income, 2, '.', ',') }}
                                    <a href="{{ url('/report_sup/' . $select_year . '/dec_income') }}"
                                        class="btn  btn-sm" title="Detail">
                                        <i class="font-weight-bold">more...</i>
                                    </a>
                                </td>
                                <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                    {{ number_format($dec_expense, 2, '.', ',') }}
                                    <a href="{{ url('/report_sup/' . $select_year . '/dec_expense') }}"
                                        class="btn  btn-sm" title="Detail">
                                        <i class="font-weight-bold">more...</i>
                                    </a>
                                </td>

                                @if ($dec_total >= 0)
                                    <td class="h5 mb-1 font-weight-bold text-success text-uppercase ">
                                        &nbsp;{{ number_format($dec_total, 2, '.', ',') }}</td>
                                @else
                                    <td class="h5 mb-1 font-weight-bold text-danger text-uppercase ">
                                        {{ number_format($dec_total, 2, '.', ',') }}</td>
                                @endif

                            </tbody>

                        </table>
                    </form>

                    <div class="row justify-content-around">

                        <!-- รายรับ -->
                        <div class="col-xl-5 col-md-5 mb-4">
                            <div class="card ">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <h5 class="mb-1 font-weight-bold text-primary text-uppercase ">
                                                <a class="h5 mb-1 font-weight-bold text-dark text-uppercase ">รวมรายรับปี
                                                    {{ $yearName }} :</a>
                                                {{ number_format($annual_income, 2, '.', ',') }}
                                                <a class="h5 mb-1 font-weight-bold text-dark text-uppercase "> บาท</a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- รายจ่าย -->
                        <div class="col-xl-5 col-md-5 mb-4">
                            <div class="card ">

                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <h5 class="mb-1 font-weight-bold text-danger text-uppercase ">
                                                <a class="h5 mb-1 font-weight-bold text-dark text-uppercase ">รวมรายจ่ายปี
                                                    {{ $yearName }} :</a>
                                                {{ number_format($annual_expense, 2, '.', ',') }}
                                                <a class="h5 mb-1 font-weight-bold text-dark text-uppercase "> บาท</a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                  

                    </div>
                </div>

            </div>
            @endif
        </div>



        {{-- <div class="row ">
            <!-- หมวดหมู่ -->
            <div class="col-xl-12 col-md-6 mb-4 ">
                <div class="card border-left-success shadow h-100 ">
                    
                    <div class="card-header py-2">
                        <h4 class="m-1 font-weight-bold text-gray-800">สรุปรายจ่ายแยกตามหมวดหมู่</h4>
                    </div>
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="row">
                                    <div class="col-xl-5 col-md-6 mb-4 ">
                                        @foreach ($group as $item)
                                            <div class="h5 font-weight-bold text-gray-800">
                                                {{ $item->topic }} <br>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="col-xl-5 col-md-6 mb-4 ">
                                        @foreach ($group as $item)
                                            <div class="h5 font-weight-bold text-gray-800">
                                                <a class="h5 mb-1 font-weight-bold text-danger text-uppercase">
                                                    {{ number_format($item->total, 2, '.', ',') }}</a> บาท<br>
                                            </div>
                                        @endforeach
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div> --}}

        <!-- Donut Chart -->
        {{-- <div class="col-xl-4 col-lg-5">
                        //     <div class="card shadow mb-4">
                        //         <!-- Card Header - Dropdown -->
                        //         <div class="card-header py-3">
                        //             <h6 class="m-0 font-weight-bold text-primary">Donut Chart</h6>
                        //         </div>
                        //         <!-- Card Body -->
                        //         <div class="card-body">
                        //             <div>
                        //                 <canvas id="pieChart" style="max-width: 500px;"></canvas>
                        //             </div>
                        //             <hr>
                        //             Styling for the donut chart can be found in the
                        //             <code>/js/demo/chart-pie-demo.js</code> file.
                        //         </div>
                        //     </div>
                        // </div> --}}
    </div>
@endsection

{{-- pie --}}
<script>
    var ctxP = document.getElementById("pieChart").getContext('2d');
    var myPieChart = new Chart(ctxP, {
        type: 'pie',
        data: {
            labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
            datasets: [{
                data: [300, 50, 100, 40, 120],
                backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
                hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
            }]
        },
        options: {
            responsive: true
        }
    });
</script>
