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
								
								  ";
 $result = mysql_query($query);
 
 if(mysql_num_rows($result) > 0)
 {
  $output .= 'S.No,Admission Number,Student Name,Class,Apr-May,Jun-Jul,Aug-Sep,Oct-Nov,Dec-Jan,Feb-Mar,Total Due,Total Paid';
   
  while($row = mysql_fetch_array($result))
  {
	  
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
	$total1=$row['Feb']+$row['Apr']+$row['Jun']+$row['Aug']+$row['Oct']+$row['Dece'];
	$totaldue=$jan12+$jan2+$jan4+$jan6+$jan8+$jan10;

	
   $output .="\n".$count.','.$row['tenant_id'].','.$row["fname"].' '.$row["mname"].' '.$row["lname"].','.$row['room_name'].','.$jan4.','.$jan6.','.$jan8.','.$jan10.','.$jan12.','.$jan2.','.$totaldue.','.$total1;
   
  }
  header('Content-Type: application/csv');
  header('Content-Disposition: attachment; filename=download.csv');
  echo $output;
 }
}
?>