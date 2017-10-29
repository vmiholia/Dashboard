<?php
mysql_select_db('billdb',mysql_connect('localhost','root','root'))or die(mysql_error());
?>

<?php  
$data=date("d/m/Y");



//export.php  
$count=0;
if(isset($_POST["export"]))
{
	
	
	$output="";
	
	$output.='ReceiptNo,Date,Admission Number,Student Name,Father Name,Class,Total Fees,Fine,Total Amount Paid,Payment mode,Reference No,Month'."\n";
	$qrr=mysql_query("SELECT * from payment_record LEFT JOIN paym_info ON payment_record.payment_mode = paym_info.mode_id where `Date` = '$data'");
	if(mysql_num_rows($qrr) > 0)
	{
		while($row2 = mysql_fetch_array($qrr)){
			$a=$row2['tenant_id'];
			$fine=$row2['fine'];
			$query = "select * from tenant
			LEFT JOIN room ON tenant.room_id = room.room_id
			LEFT JOIN paym_info ON tenant.paym_mode = paym_info.mode_id
			where tenant.daat = '$data' and tenant.tenant_id='$a'
			";
			$result = mysql_query($query);
			if(mysql_num_rows($result) > 0)
			{
				while($row = mysql_fetch_array($result))
				{					
					
					$f=$row['fname'];
					$l=$row['lname'];
					$n=$row['nname'];
					$r=$row['room_name'];
					$Transportation=$row['transportation_fees'];
					$annual=$row['annual_fees'];
					$totaldiscount=$row['dis_id']+$row['dis_id2']+$row['dis_id3'];
					if($row2['month']=="Apr")
					$totalfees=$row["rental"]+$row["rental1"]+$row["rental2"]+$row["rental3"]+$Transportation+$annual-$totaldiscount;
					else{
					$totalfees=$row["rental"]+$row["rental1"]+$row["rental2"]+$row["rental3"]+$Transportation-$totaldiscount;						
					}
					$n2=$row["rental"]+$row["rental1"]+$row["rental2"]+$row["rental3"]-$row["amtpaid"];
					$count++;
				}
				$n1=$row2["timestamp"];
				$mydatetime = $n1;
				$datetimearray = explode(" ", $mydatetime);
				$date = $datetimearray[0];
				$time = $datetimearray[1];
				$reformatted_date = date('d-m-Y',strtotime($date));
				$reformatted_time = date('H:i:s',strtotime($time));
				$payment_mode=$row2['paym_mode'];
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
				$output .= "LFYV/".$row2['transaction_id'].','.$row2['Date'].','.$a.','.$f.' '.$l.','.$n.','.$r.','.$totalfees.','.$fine.','.($row2["Amount"]+$fine).','.$payment_mode.','.$rr.','.$mm."\n";

			}
			header('Content-Type: text/csv');
			header('Content-Disposition: attachment; filename=download.csv');
			echo $output;
		}
		else {

			header('Content-Type: text/csv');
			header('Content-Disposition: attachment; filename=download.csv');
			echo $output;
			echo "No Transactions...";
		}
	}

?>