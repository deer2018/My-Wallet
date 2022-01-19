@extends('layouts.user.main')

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
                                {{-- <div class="h3 font-weight-bold text-gray-800">รายรับทั้งหมด</div> --}}
                                <h5 class="mb-1 font-weight-bold text-primary text-uppercase ">{{number_format($income, 2, '.', ',')}}<a class="h5 mb-1 font-weight-bold text-dark text-uppercase "> บาท</a></h5>                                
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
                                {{-- <div class="h3 font-weight-bold text-gray-800">รายจ่ายทั้งหมด</div> --}}
                                <h5 class="mb-1 font-weight-bold text-danger text-uppercase ">{{number_format($expense, 2, '.', ',')}}<a class="h5 mb-1 font-weight-bold text-dark text-uppercase "> บาท</a></h5>                                
                            </div>
                        </div>
                    </div>   
                </div>
            </div>

        </div>   
        <hr>

        <div class="row">

                <!-- ประจำปี -->
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 ">
                        <div class="card-header py-2">
                            <h4 class="m-1 font-weight-bold text-gray-800">รายงาน ประจำเดือนปัจจุบัน</h4>
                        </div>
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    {{-- <div class="h4 font-weight-bold text-gray-800">รายงาน ประจำเดือนปัจจุบัน</div> --}}
                                    <h5 class="mb-1 font-weight-bold text-primary text-uppercase "><a class="h5 mb-1 font-weight-bold text-dark text-uppercase ">รายรับ </a> {{number_format($monthly_income, 2, '.', ',')}}<a class="h4 mb-1 font-weight-bold text-dark text-uppercase "> บาท</a></h5>
                                    <h5 class="mb-1 font-weight-bold text-danger text-uppercase "><a class="h5 mb-1 font-weight-bold text-dark text-uppercase ">รายจ่าย </a> {{number_format($monthly_expense, 2, '.', ',')}}<a class="h4 mb-1 font-weight-bold text-dark text-uppercase "> บาท</a></h5>                                
                                </div>
                            </div>
                        </div>   
                    </div>
                </div>

                 <!-- ประจำปี -->
                 <div class="col-xl-6 col-md-6 mb-4"> 
                    <div class="card border-left-success shadow h-100 ">
                        <div class="card-header py-2">
                            <h4 class="m-1 font-weight-bold text-gray-800">รายงาน ประจำปีปัจจุบัน</h4>
                        </div>
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    {{-- <div class="h4 font-weight-bold text-gray-800">รายงาน ประจำปีปัจจุบัน</div> --}}
                                    <h5 class="mb-1 font-weight-bold text-primary text-uppercase "><a class="h5 mb-1 font-weight-bold text-dark text-uppercase ">รายรับ </a>{{number_format($annual_income, 2, '.', ',')}} <a class="h4 mb-1 font-weight-bold text-dark text-uppercase "> บาท</a></h5>
                                    <h5 class="mb-1 font-weight-bold text-danger text-uppercase "><a class="h5 mb-1 font-weight-bold text-dark text-uppercase ">รายจ่าย </a>{{number_format($annual_expense, 2, '.', ',')}}<a class="h4 mb-1 font-weight-bold text-dark text-uppercase "> บาท</a></h5>                                
                                </div>
                            </div>
                        </div>   
                    </div>
                </div>

        </div>

        <hr>

        <div class="row ">
                <!-- หมวดหมู่ -->
                <div class="col-xl-6 col-md-6 mb-4 ">
                    <div class="card border-left-success shadow h-100 ">
                        {{-- <a href="{{ url('/chart') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                            class="fa fa-arrow-left" aria-hidden="true"></i> ไป</button></a>   --}}
                            <div class="card-header py-2">
                                <h4 class="m-1 font-weight-bold text-gray-800">รายจ่ายตามหมวดหมู่</h4>
                            </div>
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="row">
                                        <div class="col-xl-5 col-md-6 mb-4 ">  
                                            @foreach ($transaction as $item)
                                            <div  class="h5 font-weight-bold text-gray-800">
                                             {{ $item->topic }}  <br> 
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="col-xl-5 col-md-6 mb-4 ">                                             
                                            @foreach ($group as $item)
                                                <div  class="h5 font-weight-bold text-gray-800">
                                            <a class="h5 mb-1 font-weight-bold text-danger text-uppercase"> {{number_format($item->total, 2, '.', ',')}}</a> บาท<br>
                                                </div>
                                            @endforeach
                                        </div>
                                    {{-- <div class="mt-4">{{ $transaction->links() }}</div>            --}}
                                    </div>
                                </div>
                            </div>
                        </div>   
                    </div>
                </div>

           
               
       
              
        </div>
            
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