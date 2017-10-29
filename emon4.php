<?php
mysql_select_db('billdb',mysql_connect('localhost','root','root'))or die(mysql_error());
?>

<?php  
$dat=date("d/m/Y");
//export.php  
$count=0;
$month="Apr";
$output = '';
if(isset($_POST["export"]))
{
	
 $query = "select * from tenant
								LEFT JOIN room ON tenant.room_id = room.room_id
								;
								  ";
 $result = mysql_query($query);
 
 if(mysql_num_rows($result) > 0)
 {
  $output .= 'Admission Number,Student Name,Class,Tution Fee,Annual Fees,Development Fee,Smart Lab,Transportation Charges,Total Fess,fine,Paid,Due';

  while($row = mysql_fetch_array($result))
  {
    $Transportation=$row['transportation_fees'];
    $annual=$row['annual_fees'];

    $totaldiscount=$row['dis_id']+$row['dis_id2']+$row['dis_id3'];

    $total=$row["rental"]+$row["rental1"]+$row["rental2"]+$Transportation+$annual-$totaldiscount;
    $total1=0;
    $due=0;
    $months=array('Apr','Jun','Aug','Oct','Dece','Feb');
    foreach ($months as $value) {
     $due +=$total-$row[$value];

     if($value==$month){
      break;
    }
  } 
  $n1=0;
  $count++;
  $user_query1 = mysql_query("SELECT sum(fine) as summ FROM payment_record WHERE payment_record.tenant_id = '".$row['tenant_id']."' and month='$month' group by month")or die(mysql_error());
              $row2 = mysql_fetch_array($user_query1);
          
          if(mysql_num_rows($user_query1)>0)
          {
            $fine=$row2['summ'];
          }
          else $fine=0;
$room_name=(string)$row['room_name'];
  $output .= "\n".$row["tenant_id"].','.$row["fname"].' '.$row["mname"].' '.$row["lname"].','.$room_name.','.$row["rental"].','.$annual.','.$row["rental1"].','.$row["rental2"].','.$Transportation.','.$total.','.$fine.','.($row[$month]+$fine).','.$due;

}
  header('Content-Type: application/csv');
  header('Content-Disposition: attachment; filename=download.csv');
  echo $output;
 }
}
?>