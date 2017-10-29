<?php
mysql_select_db('billdb',mysql_connect('localhost','root','root'))or die(mysql_error());
?>

<?php  
$dat=date("d/m/Y");
//export.php  
$count=0;
$output = '';
if(isset($_POST["export"]))
{
	
 $query = "select * from tenant
								LEFT JOIN room ON tenant.room_id = room.room_id
								LEFT JOIN paym_info ON tenant.paym_mode = paym_info.mode_id
								where tenant.status_jan !='0' 
								  ";
 $result = mysql_query($query);
 
 if(mysql_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr> 
						<th>Time</th>
						<th>Date</th>
						<th>Admission Number</th>
						<th>Student Name</th>
							<th>Class </th>
							<th>Tution Fee</th>
							 <th>Development Fee</th>
							  <th>Smart Lab</th>
							   <th>Due</th>
							   <th>Total</th>
							   <th>Mode of Payment</th>
                         
                         
						
						
						
                    </tr>
  ';
  while($row = mysql_fetch_array($result))
  {
	    $n1=$row["timeStamp"];
	  $mydatetime = $n1;
$datetimearray = explode(" ", $mydatetime);
$date = $datetimearray[0];
$time = $datetimearray[1];
$reformatted_date = date('d-m-Y',strtotime($date));
$reformatted_time = date('H:i:s',strtotime($time));
	$count++;
	$total=$row["rental"]-$row["Jan"];
   $output .= '
    <tr>  				<td>'.$reformatted_time.'</td>	
						<td>'.$reformatted_date.'</td>
						<td>'.$row["tenant_id"].'</td>
                        <td>'.$row["fname"].' '.$row["mname"].' '.$row["lname"].'</td>
						<td>'.$row["room_name"].'</td> 						
                         <td>'.$row["rental"].'</td>
						 <td>'.$row["rental1"].'</td>
						 <td>'.$row["rental2"].'</td>
						 
						 <td>'.$total.'</td>
						<td>'.$row["Jan"].'</td>
						<td>'.$row["paym_mode"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
?>