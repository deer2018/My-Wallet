@extends('layouts.admin.main')

@section('content')
<div class="container-fluid">
    
        <div class="row">
     
            <!-- รายรับ -->
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h2 font-weight-bold text-gray-800">รายรับทั้งหมด</div>
                                <h4 class="mb-1 font-weight-bold text-primary text-uppercase ">{{$income}}<a class="h4 mb-1 font-weight-bold text-dark text-uppercase "> บาท</a></h4>                                
                            </div>
                        </div>
                    </div>   
                </div>
            </div>

              <!-- รายจ่าย -->
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h2 font-weight-bold text-gray-800">รายจ่ายทั้งหมด</div>
                                <h4 class="mb-1 font-weight-bold text-danger text-uppercase ">{{$expense}}<a class="h4 mb-1 font-weight-bold text-dark text-uppercase "> บาท</a></h4>                                
                            </div>
                        </div>
                    </div>   
                </div>
            </div>

        </div>   
        <hr>

        <div class="row">
                <!-- หมวดหมู่ -->
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">หมวดหมู่รายรับ
                                    {{-- <a href="{{ url('/chart') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                        class="fa fa-arrow-left" aria-hidden="true"></i> ไป</button></a>              --}}
                                </div>
                            </div>
                        </div>   
                    </div>
                </div>
                <!-- หมวดหมู่ -->
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">หมวดหมู่รายจ่าย
                                    {{-- <a href="{{ url('/chart') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                        class="fa fa-arrow-left" aria-hidden="true"></i> ไป</button></a>              --}}
                                </div>
                            </div>
                        </div>   
                    </div>
                </div>

           
                <div class="table-responsive">
                  
                    {{-- <div class="pagination-wrapper"> {!! $crud->appends(['search' => Request::get('search')])->render() !!} </div> --}}
                </div>
            
              
        </div>
            
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