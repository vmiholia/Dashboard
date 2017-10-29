<?php
mysql_select_db('billdb',mysql_connect('localhost','root','root'))or die(mysql_error());
?>

<?php  
//export.php  
$count=0;
$output = '';
if(isset($_POST["export"]))
{
	
 $query = "select * from tenant
								LEFT JOIN room ON tenant.room_id = room.room_id
								where tenant.Stat = '2'
								  ";
 $result = mysql_query($query);
 
 if(mysql_num_rows($result) > 0)
 {
  $output .= 'Serial No.,Date,Admission Number,Student Name,Class,Tution Fee,Development Fee,Smart Lab,Due,Total';

  while($row = mysql_fetch_array($result))
  {
	  $n1=date("d-m-Y");
	$count++;
	$total=$row["rental"]+$row["rental1"]+$row["rental2"];
   $output .= "\n".$count.','.$n1.','.$row["tenant_id"].','.$row["fname"].' '.$row["mname"].' '.$row["lname"].','.$row["room_name"].','.$row["rental"].','.$row["rental1"].','.$row["rental2"].','.$row["due"].','.$total;
                       

  }
   header('Content-Type: text/csv');
  header('Content-Disposition: attachment; filename=download.csv');
 echo $output;
 }
}
?>