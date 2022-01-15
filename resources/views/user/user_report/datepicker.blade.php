<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script type="text/javascript" src="bootstrap-datepicker.th.js" charset="UTF-8"></script>
</head>
<body>
    <div class="alert alert-error" id="alert">
        <strong>Oh snap!</strong>
    </div>
    <table class="table">
        <thead>
            <tr>
              <th>
                  Start date
                  <a href="#" class="btn small" id="date-start" data-date-format="yyyy-mm-dd" data-date="2012-02-20">Change</a>
              </th>
              <th>
                  End date
                  <a href="#" class="btn small" id="date-end" data-date-format="yyyy-mm-dd" data-date="2012-02-25">Change</a>
              </th>
            </tr>
        </thead>
        <tbody>
            <tr>
              <td id="date-start-display">2012-02-20</td>
              <td id="date-end-display">2012-02-25</td>
            </tr>
        </tbody>
    </table>
    
   
</body>
</html>


<script>
    var startDate = new Date(2012,1,20);
var endDate = new Date(2012,1,25);
$('#date-start')
    .datepicker()
    .on('changeDate', function(ev){
        if (ev.date.valueOf() > endDate.valueOf()){
            $('#alert').show().find('strong').text('The start date must be before the end date.');
        } else {
            $('#alert').hide();
            startDate = new Date(ev.date);
            $('#date-start-display').text($('#date-start').data('date'));
        }
        $('#date-start').datepicker('hide');
    });
$('#date-end')
    .datepicker()
    .on('changeDate', function(ev){
        if (ev.date.valueOf() < startDate.valueOf()){
            $('#alert').show().find('strong').text('The end date must be after the start date.');
        } else {
            $('#alert').hide();
            endDate = new Date(ev.date);
            $('#date-end-display').text($('#date-end').data('date'));
        }
        $('#date-end').datepicker('hide');
    });
</script>