@extends('layouts.admin.main')

@section('content')
    <div class="container-fluid">

        <div class="row">

            <!-- รายรับ -->
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 ">
                    <div class="card-header py-2">
                        <h4 class="m-1 font-weight-bold text-gray-800">รายรับทั้งหมด</h4>
                    </div>
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                {{-- <div class="h3 font-weight-bold text-gray-800">รายรับทั้งหมด</div><hr> --}}
                                <h5 class="mb-1 font-weight-bold text-primary text-uppercase ">{{ $income }}<a
                                        class="h5 mb-1 font-weight-bold text-dark text-uppercase "> บาท</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- รายจ่าย -->
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 ">
                    <div class="card-header py-2">
                        <h4 class="m-1 font-weight-bold text-gray-800">รายจ่ายทั้งหมด</h4>
                    </div>
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                {{-- <div class="h3 font-weight-bold text-gray-800">รายจ่ายทั้งหมด</div><hr> --}}
                                <h5 class="mb-1 font-weight-bold text-danger text-uppercase ">{{ $expense }}<a
                                        class="h4 mb-1 font-weight-bold text-dark text-uppercase "> บาท</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <hr>

      

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


    $("#datepicker").datepicker({
        format: "mm-yyyy",
        startView: "months",
        minViewMode: "months"
    });
</script>
