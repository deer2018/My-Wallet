<!DOCTYPE html>
<html>
<head>
    
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
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">รายจ่ายแยกตามหมวดหมู่</h3>
                    </div>
                    <div class="panel-body" align="center">
                        <div id="pie_chart" style="width:750px; height:450px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="http://code.highcharts.com/highcharts.js"></script>
    <script src="http://code.highcharts.com/modules/exporting.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var topic =  <?php echo json_encode($donut_topic); ?>;
            var options = {
                chart: {
                    renderTo: 'pie_chart',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                },
                title: {
                    text: 'เปอร์เซ็นตามหมวดหมู่'
                },
                 tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage}%</b>',
                    percentageDecimals: 1
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                            dataLabels: {
                            enabled: true,
                            color: '#000000',
                            connectorColor: '#000000',
                            formatter: function() {
                                return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
                            }
                        }
                    }
                },
                series: [{
                    type:'pie',
                    name:'รายจ่าย'
                }]
            }
            myarray = [];
            $.each(topic, function(index, val) {
                myarray[index] = [val.topic, val.count];
            });
            options.series[0].data = myarray;
            chart = new Highcharts.Chart(options);
            
        });
    </script>
</body>
</html>