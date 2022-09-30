<!DOCTYPE html>
<html>
 <head>
  <title></title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
 </head>
 <body>
  <br />
  <div class="container box">
   <h3 align="center">Date Range Report</h3><br />
   <div class="panel panel-default">
    <div class="panel-heading">
     <div class="row">
      <div class="col-md-5"> <b><span id="total_records"></span></b></div>
      <div class="col-md-5">
       <div class="input-group input-daterange">
           <input type="text" name="from_date" id="from_date" readonly class="form-control" />
           <div class="input-group-addon">to</div>
           <input type="text"  name="to_date" id="to_date" readonly class="form-control" />
       </div>
      </div>
      <div class="col-md-2">
       <button type="button" name="filter" id="filter" class="btn btn-info btn-sm">Filter</button>
       <button type="button" name="refresh" id="refresh" class="btn btn-warning btn-sm">Refresh</button>
      </div>
     </div>
    </div>
    <div class="panel-body">
     <div class="table-responsive">
      <table class="table table-striped table-bordered">
       <thead>
        <tr>
        <th width="35%">Quantity</th>
         <th width="50%">Date</th>
         <th width="15%">User Type</th>
         <th width="15%">Amount</th>
        </tr>
       </thead>
       <tbody>
       
       </tbody>
      </table>
      {{ csrf_field() }}
    </div>
     <div id="sum"></div>
     <div id="sumsale"></div>
     <div id="lose"></div>
     <div id="profit"></div>

    </div>
   </div>
  </div>
 </body>
</html>
<script>
$(document).ready(function(){

 var date = new Date();

 $('.input-daterange').datepicker({
  todayBtn: 'linked',
  format: 'yyyy-mm-dd',
  autoclose: true
 });

 var _token = $('input[name="_token"]').val();

 fetch_data();

 function fetch_data(from_date = '', to_date = '')
 {
  $.ajax({
   url:"{{ route('daterange.fetch_data') }}",
   method:"POST",
   data:{from_date:from_date, to_date:to_date, _token:_token},
   dataType:"json",
   success:function(data)
   {
    var output = '';
    $('#total_records').text(data.length);
    // alert(data.data.length);
    for(var count = 0; count < data.data.length; count++)
    {
        var data1=data.data[count].quantity;
        var data2=data.data[count].date;
        var data3=data.data[count].type;
        var data4=data.data[count].amount;
        // console.log(data.data[count].date);
     output += '<tr>';
     output += '<td>' + data1 + '</td>';
     output += '<td>' + data2 + '</td>';
     output += '<td>' + data3 + '</td>';
     output += '<td>' + data4 + '</td></tr>';
    
}
    // console.log(output);
    $('tbody').html(output);
    $('#sum').html('<p>purchase = ' + data.sum + '</p>');
    $('#sumsale').html('<p>Sale = ' + data.sumsale + '</p>');
    $sale= data.sumsale - data.sum;
    if($sale < 0){
        $('#lose').html('<p> lose ' + $sale + '</p>');
    }
    else{
        $('#profit').html('<p> profit '+ $sale + '</p>');
    }
   }
  })
 }

 $('#filter').click(function(){
  var from_date = $('#from_date').val();
  var to_date = $('#to_date').val();
  if(from_date != '' &&  to_date != '')
  {
   fetch_data(from_date, to_date);
  }
  else
  {
   alert('Both Date is required');
  }
 });

 $('#refresh').click(function(){
  $('#from_date').val('');
  $('#to_date').val('');
  fetch_data();
 });


});
</script>

