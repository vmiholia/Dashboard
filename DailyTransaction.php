
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="report.js"></script>

  <br><br>
<div class="pull-right">
	<form method="post" action="export1.php">
		<input type="submit" name="export"  class="btn btn-warning" value="Download CSV" />
	</form>
</div>

<?php 
mysql_select_db('billdb',mysql_connect('localhost','root','root'))or die(mysql_error());
echo "<h3>Daily Transactions</h3>";?>

<span class="counter pull-right"></span>
<table class="table table-hover table-bordered results" id="searchtable">
	<thead><tr>
		<th>Receipt No.</th>
		<th>Time</th>
		<th>Adm.No</th>
		<th>Name</th>
		<th>Father Name</th>
		<th>Class</th>
		<th>Total Fees</th>
		<th>Fine</th>
		<th>Total Amount Paid</th>
		<th>Payment Mode</th>
		<th>Reference No.</th>
		<th>Month</th></tr>
		
	</thead>
	<tbody>
		<?php 
		$data=date("d/m/Y");
		$qry="SELECT * from payment_record where `Date` = '$data'";
		$qrr=mysql_query($qry);
		if(mysql_num_rows($qrr) > 0)
		{
			while($row2 = mysql_fetch_array($qrr)) {
				$a=$row2['tenant_id'];
				$fine=$row2['fine'];
				$query = "select * from tenant where tenant.tenant_id='$a'";
				$result = mysql_query($query);
				if(mysql_num_rows($result) > 0)
				{
					while($row = mysql_fetch_array($result))
					{					
						$room_id=$row['room_id'];
						$user_query12 = mysql_query("SELECT * FROM room WHERE room.room_id = '$room_id'")or die(mysql_error());
						$abcd = mysql_fetch_array($user_query12);
						$f=$row['fname'];
						$l=$row['lname'];
						$n=$row['nname'];
						$r=$row['room_name'];
						$annual=$row['annual_fees'];
						$totaldiscount=$row["dis_id"]+$row["dis_id2"]+$row["dis_id3"];
						$Transportation=$row['transportation_fees'];
						if($row2['month']=='Apr'){
							$totalfees=$abcd["rental"]+$abcd["rental1"]+$abcd["rental2"]+$abcd["rental3"]+$Transportation+$annual-$totaldiscount;
						}else{
							$totalfees=$abcd["rental"]+$abcd["rental1"]+$abcd["rental2"]+$abcd["rental3"]+$Transportation+$annual-$totaldiscount;
						}							
						$n2=$abcd["rental"]+$abcd["rental1"]+$abcd["rental2"]+$abcd["rental3"]-$row["amtpaid"];
					}
					$n1=$row2["timestamp"];
					$mydatetime = $n1;
					$datetimearray = explode(" ", $mydatetime);
					$date = $datetimearray[0];
					$time = $datetimearray[1];
					$reformatted_date = date('d-m-Y',strtotime($date));
					$reformatted_time = date('H:i:s',strtotime($time));


					$rr=$row2["tnr_id"];
					if($row2['month']=='Jan'){
						$month_name=['Jan'];
					}
					elseif($row2['month']=='Feb')
					{
						$month_name='Feb';
						$mm="Feb-Mar";
					}
					elseif($row2['month']=='Mar')
					{
						$month_name='Mar';
					}
					elseif($row2['month']=='Apr')
					{
						$month_name='Apr';
						$mm="Apr-May";
					}
					elseif($row2['month']=='May')
					{
						$month_name='May';
					}
					elseif($row2['month']=='Jun')
					{
						$month_name='Jun';
						$mm="Jun-Jul";
					}
					elseif($row2['month']=='Jul')
					{
						$month_name='Jul';
					}

					elseif($row2['month']=='Aug')
					{
						$month_name='Aug';
						$mm="Aug-Sep";
					}
					elseif($row2['month']=='Sep')
					{
						$month_name='Sep';

					}
					elseif($row2['month']=='Oct')
					{
						$month_name='Oct';
						$mm="Oct-Nov";
					}
					elseif($row2['month']=='Nov')
					{
						$month_name='Nov';
					}						
					elseif($row2['month']=='Dece')
					{
						$month_name='Dece';
						$mm="Dec-Jan";
					}

				}
				$user_query22 = mysql_query("SELECT * FROM paym_info WHERE mode_id = '".$row2['payment_mode']."'")or die(mysql_error());
				$abcd2 = mysql_fetch_array($user_query22);
				$payment_mode=$abcd2['paym_mode'];
				echo "<tr>
				<td scope='row'>LFYV/$row2[transaction_id]</td>
				<td>".$row2['Date']."</td>
				<td>$a</td>
				<td>".$f." ".$l."</td>
				<td>$n</td>
				<td>$r</td>
				<td>$totalfees</td>
				<td>$fine</td>
				<td>".($row2["Amount"]+$row2['fine'])."</td>
				<td>$payment_mode</td>
				<td>$rr</td>
				<td>$mm</td></tr>
				";
			}
		}

		?>	</tbody>
	</table>
