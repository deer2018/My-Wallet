<!DOCTYPE html>
<html>
<head>
    <title>เว็บบันทึกข้อมูรายรับ-รายจ่าย</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <style type="text/css">
        .box{
            width:800px;
            margin:0 auto;
        }
    </style>
</head>
<body>
    <div id="highchart"></div>
    <script src="http://code.highcharts.com/highcharts.js"></script>
    <script src="http://code.highcharts.com/modules/exporting.js"></script>
    <script type="text/javascript">
      $(function () { 
            var topic = {{ json_encode($topic) }};
            var total_expense = {{ json_encode($total_expense) }};
            $('#highchart').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Yearly Website Ratio'
                },
                xAxis: {
                    categories: ['2016','2017','2018', '2019']
                },
                yAxis: {
                    title: {
                        text: 'Rate'
                    }
                },
                series: [{
                    name: 'Topic',
                    data: topic
                }, {
                    name: 'Total',
                    data: total_expense
                }]
            });
        });
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>การใช้งาน Highcharts JS With PHP MySQL</title>
 
    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <h1>Hello, world! ข้อมูลทดสอบ</h1>
 
        <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        
        <table class="table" id="datatable">
            <thead>
                <tr>
                    <th></th>
                    <th>ประชากรหญิง</th>
                    <th>ประชากรชาย</th>
                </tr>
            </thead>
            @foreach($expense_cate as $item)
            <tbody>
              <td>{{ $loop->iteration }}</td>
              <td> {{ $item->topic  }}</td>
              <td> {{ $item->total_expense  }}</td>
         
             
            </tbody>
            @endforeach
        </table>
 
        
    <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    
    <script>
    
    $(function () {
                
        $('#container').highcharts({
            data: {
                //กำหนดให้ ตรงกับ id ของ table ที่จะแสดงข้อมูล
                table: 'datatable'
            },
            chart: {
                type: 'column'
            },
            title: {
                text: 'ข้อมูลจำนวนประชากร ของ แต่ละ จังหวัดประเทศใน ไทย'
            },
            yAxis: {
                allowDecimals: false,
                title: {
                    text: 'Units'
                }
            },
            
            tooltip: {
                formatter: function () {
                    return '<b>' + this.series.name + '</b><br/>' +
                        this.point.y; + ' ' + this.point.name.toLowerCase();
                }
            }
        });
    });
    
    </script>
    
  </body>
</html>