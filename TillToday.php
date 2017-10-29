<?php
$username = "root"; 
  $password = "root";   
  $host = "localhost";
  $database="billdb";

  $date= date('Y-m-d H:i:s');

  $server = mysql_connect($host, $username, $password) or die(mysql_error());
  $connection = mysql_select_db($database, $server) or die(mysql_error()); 

$dat=date("d/m/Y");
      $count=0;
      $tp=0;
      $tr=0;
      $ta=0;
      $query = "select * from tenant LEFT JOIN room ON tenant.room_id = room.room_id";
      $result = mysql_query($query);
      while($row = mysql_fetch_array($result))
      {  
        $tenant_id=$row['tenant_id'];
        $user_query1 = mysql_query("SELECT sum(fine) as summ FROM payment_record WHERE payment_record.tenant_id = '".$row['tenant_id']."' group by tenant_id")or die(mysql_error());
        $row2 = mysql_fetch_array($user_query1);
        if(mysql_num_rows($user_query1)>0)
        {
          $fine=$row2['summ'];
        }
        else $fine=0;
        
        $n3=0;
        $count++;
        $transporation=$row['transportation_fees'];
        $totaldiscount=$row['dis_id']+$row['dis_id2']+$row['dis_id3'];
        $total=$row["rental"]+$row["rental1"]+$row["rental2"]+$row["rental3"];
        $jan2=$total-$row['Feb']-$totaldiscount+$transporation;
        $jan4=$row['annual_fees']+$total-$row['Apr']-$totaldiscount+$transporation;
        $jan6=$total-$row['Jun']-$totaldiscount+$transporation;
        $jan8=$total-$row['Aug']-$totaldiscount+$transporation;
        $jan10=$total-$row['Oct']-$totaldiscount+$transporation;
        $jan12=$total-$row['Dece']-$totaldiscount+$transporation;
        $total1=$row['Feb']+$row['Apr']+$row['Jun']+$row['Aug']+$row['Oct']+$row['Dece']+$fine;
        $tp=$tp+$total1;

        $totaldue=$jan12+$jan2+$jan4+$jan6+$jan8+$jan10;
        $tr=$tr+$totaldue;
}
        $ta=$tr+$tp;
        $user_query2 = mysql_query("SELECT sum(Amount) as summ FROM payment_record WHERE payment_record.payment_mode ='1'")or die(mysql_error());
        $row3 = mysql_fetch_array($user_query2);
        $user_query3 = mysql_query("SELECT sum(Amount) as summ FROM payment_record WHERE payment_record.payment_mode ='2'")or die(mysql_error());
        $row4 = mysql_fetch_array($user_query3);
        $user_query4 = mysql_query("SELECT sum(Amount) as summ FROM payment_record WHERE payment_record.payment_mode ='3'")or die(mysql_error());
        $row5 = mysql_fetch_array($user_query4);
        $user_query5 = mysql_query("SELECT sum(Amount) as summ FROM payment_record WHERE payment_record.payment_mode ='4'")or die(mysql_error());
        $row6 = mysql_fetch_array($user_query5);
        $user_query6 = mysql_query("SELECT sum(Amount) as summ FROM payment_record WHERE payment_record.payment_mode ='5'")or die(mysql_error());
        $row7 = mysql_fetch_array($user_query6);
        $user_query6 = mysql_query("SELECT sum(Amount) as summ FROM payment_record WHERE payment_record.payment_mode ='6'")or die(mysql_error());
        $row8 = mysql_fetch_array($user_query6);
?>
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

  <button class="btn btn-info">Cash : Rs.<?php echo $row3['summ'];?></button>
  <button class="btn btn-info">cheque : Rs.<?php echo $row4['summ'];?></button>
  <button class="btn btn-info">Demand Draft : Rs.<?php echo $row5['summ'];?></button>
  <button class="btn btn-info">Debit/Credit Card : Rs.<?php $row6['summ'];?></button>
  <button class="btn btn-info">Paytm : Rs. <?php echo $row7['summ'];?></button>
  <button class="btn btn-info">NEFT : Rs.<?php echo $row8['summ']; ?></button>
  <br>
  <button class="btn btn-warning">Total : <?php echo $ta;?></button>
  <button class="btn btn-success">Received : <?php echo $tp;?></button>
  <button class="btn btn-danger">Remaining : <?php echo $tr;?></button>
  <br><br>
  <div class="pull-right">
  	<form method="post" action="export2.php">
  		<input type="submit" name="export" class="btn btn-warning" value="Download CSV" />
  	</form>
  </div>
  <?php
  

  echo "<h3>Till Today</h3>";?>
  <table id="example1" class="table table-bordered table-striped">
  	<thead><tr>
  		<th>S.no</th>
  		<th>Adm.No</th>
  		<th>Name</th>
  		<th>Class</th>
  		<th>Apr-May</th>
  		<th>Jun-Jul</th>
  		<th>Aug-Sep</th>
  		<th>Oct-Nov</th>
  		<th>Dec-Jan</th>
  		<th>Feb-Mar</th>
  		<th>Total Due</th>
  		<th>Total Paid</th></tr>

  	</thead>
  	<tbody>
  		<?php 
            $result = mysql_query($query);
            $count=1;
      while($row = mysql_fetch_array($result))
{
  			echo "
  			<tr><td scope='row'>$count</td>
  			<td>".$row['tenant_id']."</td>
  			<td>".$row['fname']." ".$row['lname']."</td>
  			<td>".$row['room_name']."</td>
  			<td>$jan4</td>
  			<td>$jan6</td>
  			<td>$jan8</td>
  			<td>$jan10</td>
  			<td>$jan12</td>
  			<td>$jan2</td>
  			<td>$totaldue</td>
  			<td>$total1</td></tr>
  			";

            $count=$count+1;


  		}
  		echo "</tfoot>
  		</table>";
  		mysql_close($server);

  		?>
  		<script src="bower_components/jquery/dist/jquery.min.js"></script>
  		<!-- jQuery UI 1.11.4 -->
  		<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
  		<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  		<script>
  		$.widget.bridge('uibutton', $.ui.button);
  		</script>
  		<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  		<!-- Morris.js charts -->
  		<script src="bower_components/raphael/raphael.min.js"></script>
  		<script src="bower_components/morris.js/morris.min.js"></script>
  		<!-- Sparkline -->
  		<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  		<!-- jvectormap -->
  		<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  		<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  		<!-- jQuery Knob Chart -->
  		<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
  		<!-- Bootstrap 3.3.7 -->
  		<!-- Morris.js charts -->
  		<!-- Sparkline -->
  		<!-- jvectormap -->
  		<!-- jQuery Knob Chart -->
  		<!-- daterangepicker -->
  		<script src="bower_components/moment/min/moment.min.js"></script>
  		<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  		<!-- datepicker -->
  		<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  		<!-- Bootstrap WYSIHTML5 -->
  		<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  		<!-- Slimscroll -->
  		<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  		<!-- FastClick -->
  		<script src="bower_components/fastclick/lib/fastclick.js"></script>
  		<!-- AdminLTE App -->
  		<script src="dist/js/adminlte.min.js"></script>
  		<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  		<script src="dist/js/pages/dashboard.js"></script>
  		<!-- AdminLTE for demo purposes -->
  		<script src="dist/js/demo.js"></script>
  		<script>
  		$(function () {
  			$('#example1').DataTable()
  			$('#example2').DataTable({
  				'paging'      : true,
  				'lengthChange': false,
  				'searching'   : false,
  				'ordering'    : true,
  				'info'        : true,
  				'autoWidth'   : false
  			})
  		})
  		</script>