<?php 
mysql_select_db('billdb',mysql_connect('localhost','root','root'))or die(mysql_error());
if(isset($_GET['month']))
{
	$month=$_GET['month'];
}
else 
{
	$month="Apr";
}
$tp=0;
$ta=0;
$tr=0;
$dat=date("d/m/Y");
$count=0;
$query = "SELECT * from tenant
LEFT JOIN room ON tenant.room_id = room.room_id;";
$result = mysql_query($query);

if(mysql_num_rows($result) > 0)
{
	while($row = mysql_fetch_array($result))
	{
		$Transportation=$row['transportation_fees'];
		$annual=$row['annual_fees'];
		$totaldiscount=$row['dis_id']+$row['dis_id2']+$row['dis_id3'];
		$total=$row["rental"]+$row["rental1"]+$row["rental2"]+$Transportation-$totaldiscount;

		$total1=0;
		$due=0;
		$months=array('Apr','Jun','Aug','Oct','Dece','Feb');
		foreach ($months as $value) 
		{
			$due +=$total-$row[$value];
			if($value==$month)
			{
				break;
			}
		} 
		$n1=0;
		$count++;
		$room_name=(string)$row['room_name'];
		$user_query1 = mysql_query("SELECT sum(fine) as summ FROM payment_record WHERE payment_record.tenant_id = '".$row['tenant_id']."' and month='$month' group by month")or die(mysql_error());
		$row2 = mysql_fetch_array($user_query1);

		if(mysql_num_rows($user_query1)>0)
		{
			$fine=$row2['summ'];
		}
		else $fine=0;
		if($month=="Apr")
		{
			$ta=$ta+$total+$annual;
		}
		else
		{
			$ta=$ta+$total;
		}
		$tp=$tp+$row[$month]+$fine;
		$tr=$tr+($due+$annual);
	}
}

$user_query2 = mysql_query("SELECT sum(Amount) as summ FROM payment_record WHERE payment_record.month='$month' and payment_record.payment_mode ='1'")or die(mysql_error());
$row3 = mysql_fetch_array($user_query2);
$user_query3 = mysql_query("SELECT sum(Amount) as summ FROM payment_record WHERE payment_record.month='$month' and payment_record.payment_mode ='2'")or die(mysql_error());
$row4 = mysql_fetch_array($user_query3);
$user_query4 = mysql_query("SELECT sum(Amount) as summ FROM payment_record WHERE payment_record.month='$month' and payment_record.payment_mode ='3'")or die(mysql_error());
$row5 = mysql_fetch_array($user_query4);
$user_query5 = mysql_query("SELECT sum(Amount) as summ FROM payment_record WHERE payment_record.month='$month' and payment_record.payment_mode ='4'")or die(mysql_error());
$row6 = mysql_fetch_array($user_query5);
$user_query6 = mysql_query("SELECT sum(Amount) as summ FROM payment_record WHERE payment_record.month='$month' and payment_record.payment_mode ='5'")or die(mysql_error());
$row7 = mysql_fetch_array($user_query6);
$user_query6 = mysql_query("SELECT sum(Amount) as summ FROM payment_record WHERE payment_record.month='$month' and payment_record.payment_mode ='6'")or die(mysql_error());
$row8 = mysql_fetch_array($user_query6);
?>

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
<?php

if(isset($_GET['month']))
{
	$month=$_GET['month'];
	if($month=='Feb')
	{
		echo '<div class="pull-right">
		<form method="post" action="emon2.php">
		<input type="submit" name="export" class="btn btn-warning" value="Download CSV" />
		</form>
		</div>';
		$mm="Feb-Mar";
	}
	elseif($month=='Apr')
	{
		echo '<div class="pull-right">
		<form method="post" action="emon4.php">
		<input type="submit" name="export" class="btn btn-warning" value="Download CSV" />
		</form>
		</div>';
		$mm="Apr-May";
	}
	
	elseif($month=='Jun')
	{
		echo '<div class="pull-right">
		<form method="post" action="emon6.php">
		<input type="submit" name="export" class="btn btn-warning" value="Download CSV" />
		</form>
		</div>';
		$mm="Jun-Jul";
	}
	elseif($month=='Aug')
	{
		echo '<div class="pull-right">
		<form method="post" action="emon8.php">
		<input type="submit" name="export" class="btn btn-warning" value="Download CSV" />
		</form>
		</div>';
		$mm="Aug-Sep";
	}
	elseif($month=='Oct')
	{
		echo '<div class="pull-right">
		<form method="post" action="emon10.php">
		<input type="submit" name="export" class="btn btn-warning" value="Download CSV" />
		</form>
		</div>';
		$mm="Oct-Nov";
	}
	elseif($month=='Dece')
	{
		echo '<div class="pull-right">
		<form method="post" action="emon12.php">
		<input type="submit" name="export" class="btn btn-warning" value="Download CSV" />
		</form>
		</div>';
		$mm="Dec-Jan";
	}
}
echo "<h3>$mm</h3>";
?>

<span class="counter pull-right"></span>
<table class="table table-hover table-bordered results" id="searchtable">
	<thead><tr>
		<th>S.no</th>
		<th>Adm.No</th>
		<th>Name</th>
		<th>Class</th>
		<?php if($month=="Apr"){echo '<th>Annual Fees</th>';} ?>
		<th>Tution Fee</th>
		<th>Dev.fee</th>
		<th>Smart Lab</th>
		<th>Transportation</th>
		<th>Net Fees</th>
		<th>Fine Paid</th>
		<th>Total Paid</th>
		<th>Total Due</th></tr>
		
	</thead>
	<tbody>
		<?php 
		$dat=date("d/m/Y");
		$count=0;
		$query = "SELECT * from tenant
		LEFT JOIN room ON tenant.room_id = room.room_id;";
		$result = mysql_query($query);

		if(mysql_num_rows($result) > 0)
		{
			while($row = mysql_fetch_array($result))
			{
				$Transportation=$row['transportation_fees'];
				$annual=$row['annual_fees'];
				$totaldiscount=$row['dis_id']+$row['dis_id2']+$row['dis_id3'];
				$total=$row["rental"]+$row["rental1"]+$row["rental2"]+$Transportation-$totaldiscount;

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
				$room_name=(string)$row['room_name'];
				$user_query1 = mysql_query("SELECT sum(fine) as summ FROM payment_record WHERE payment_record.tenant_id = '".$row['tenant_id']."' and month='$month' group by month")or die(mysql_error());
				$row2 = mysql_fetch_array($user_query1);

				if(mysql_num_rows($user_query1)>0)
				{
					$fine=$row2['summ'];
				}
				else $fine=0;




				echo "<tr>
				<td scope='row'>$count</td>
				<td>".$row['tenant_id']."</td>
				<td>".$row['fname']." ".$row['lname']."</td>
				<td>".$row['room_name']."</td>";
				if($month=="Apr"){echo '<td>'.$annual.'</td>';}
				echo "<td>".$row['rental']."</td>
				<td>".$row['rental1']."</td>
				<td>".$row['rental2']."</td>
				<td>$Transportation</td>";
				if($month=="Apr"){echo '<td>'.($total+$annual).'</td>';}
				else echo "<td>$total</td>";

				echo "<td>".$fine."</td>
				<td>".($row[$month]+$fine)."</td>
				<td>".($due+$annual)."</td>
				</tr>";

			}
		}

		?>
		<script>
function showHint(str) {
	console.log("ded");
    var searchTerm = $(".search").val();
    var searchTerm = str;
    var listItem = $('.results tbody').children('tr');
    var searchSplit = searchTerm.replace(/ /g, "'):containsi('")
    
  $.extend($.expr[':'], {'containsi': function(elem, i, match, array){
        return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
    }
  });
    
  $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
    $(this).attr('visible','false');
  });

  $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e){
    $(this).attr('visible','true');
  });

  var jobCount = $('.results tbody tr[visible="true"]').length;
    $('.counter').text(jobCount + ' item');

  if(jobCount == '0') {$('.no-result').show();}
    else {$('.no-result').hide();}
}
</script>