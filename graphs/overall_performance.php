<?php
require_once("../session.php");
require_once("../class.user.php");
$auth_user = new USER();
$username = $_SESSION['username'];
$stmt = $auth_user->runQuery("SELECT * FROM mdl_user WHERE username=:username");
$stmt->execute(array(":username"=>$username));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
?>


<?php

function sheet()
{

$output .='
<table class="table" bordered="1">
<tr>
<th>col1</th>
<th>col2</th>
<th>col3</th>
</tr>
';

$output .='</table>';
header("Content-Type: application/xls");
header("Content-Disposition: attachment, filename=greencard.xls");
echo $output;

}

?>


<style type="text/css">
#chart-container {
  position: relative;
  height:auto;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.js'></script>
<script src="chart.js"></script>

<script>
$(document).ready(function(){
  $.ajax({
    url: "overall_performance_query.php",
    method: "GET",
    success: function(data) {
      var half_yearly = [];var half_yearly2 = [];
      var PT1 = [];var PT12 = [];
      var PT_1 = [];var PT_12 = [];
      var PT2 = [];var PT22 = [];
      var PT_2 = [];var PT_22 = [];
      var SEA1 = [];var SEA12 = [];
      var SEA_1 = [];var SEA_12 = [];
      var NS1 = [];var NS12 = [];
      var NS_1 = [];var NS_12 = [];
      var PT_1G = [];var PT_1G2 = [];
      var PT_1L = [];var PT_1L2 = [];
      var PT_2G = [];var PT_2G2 = [];
      var PT_2L = [];var PT_2L2 = [];
      var PT_3G = [];var PT_3G2 = [];
      var PT_3L = [];var PT_3L2 = [];
      var PT_4G = [];var PT_4G2 = [];
      var PT_4L = [];var PT_4L2 = [];
      var PT_3 = [];var PT_32 = [];
      var PT_4 = [];var PT_42 = [];
      var avg__finalgrade=[];
      var Class=[];
      var obj = JSON.parse(data);
      var class_list=['1 A','1 B','1 C','2 A','2 B','2 C','3 A','3 B','3 C','4 A','4 B','4 C','5 A','5 B','5 C','6 A','6 B','6 C','7 A','7 B','7 C','8 A','8 B','8 C'];
      for(var i in obj) 
      {
        
          obj[i].avg__finalgrade=parseFloat(obj[i].avg__finalgrade).toFixed(2);
          Class.push(obj[i].Class);
          if(obj[i].Class=="1 A")
          {
            if(obj[i].Term=="PT 1")
            {
              PT_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 2")
            {
              PT_2.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 3")
            { 
              PT_3.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 4")
            {           
              PT_4.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="NS 1")
            { 
              NS_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="SEA 1")
            {          
              SEA1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="Half Yearly")
            {
              half_yearly.push(obj[i].avg__finalgrade);
            }
          }
          else if(obj[i].Class=="1 B")
          {
            if(PT_1[0]==undefined){ PT_1.push(0);}
            if(PT_2[0]==undefined){ PT_2.push(0);}
            if(PT_3[0]==undefined){ PT_3.push(0);}
            if(PT_4[0]==undefined){ PT_4.push(0);}
            if(NS_1[0]==undefined){ NS_1.push(0);}
            if(SEA1[0]==undefined){ SEA1.push(0);}
            if(half_yearly[0]==undefined){ half_yearly.push(0);}
            if(obj[i].Term=="PT 1")
            {
              PT_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 2")
            {
              PT_2.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 3")
            { 
              PT_3.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 4")
            {           
              PT_4.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="NS 1")
            { 
              NS_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="SEA 1")
            {          
              SEA1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="Half Yearly")
            {
              half_yearly.push(obj[i].avg__finalgrade);
            }
          }
          else if(obj[i].Class=="1 C")
          {
            if(PT_1[1]==undefined){ PT_1.push(0);}
            if(PT_2[1]==undefined){ PT_2.push(0);}
            if(PT_3[1]==undefined){ PT_3.push(0);}
            if(PT_4[1]==undefined){ PT_4.push(0);}
            if(NS_1[1]==undefined){ NS_1.push(0);}
            if(SEA1[1]==undefined){ SEA1.push(0);}
            if(half_yearly[1]==undefined){ half_yearly.push(0);}
            if(obj[i].Term=="PT 1")
            {
              PT_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 2")
            {
              PT_2.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 3")
            { 
              PT_3.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 4")
            {           
              PT_4.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="NS 1")
            { 
              NS_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="SEA 1")
            {          
              SEA1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="Half Yearly")
            {
              half_yearly.push(obj[i].avg__finalgrade);
            }
          }
          else if(obj[i].Class=="2 A")
          {
            if(PT_1[2]==undefined){ PT_1.push(0);}
            if(PT_2[2]==undefined){ PT_2.push(0);}
            if(PT_3[2]==undefined){ PT_3.push(0);}
            if(PT_4[2]==undefined){ PT_4.push(0);}
            if(NS_1[2]==undefined){ NS_1.push(0);}
            if(SEA1[2]==undefined){ SEA1.push(0);}
            if(half_yearly[2]==undefined){ half_yearly.push(0);}
            if(obj[i].Term=="PT 1")
            {
              PT_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 2")
            {
              PT_2.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 3")
            { 
              PT_3.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 4")
            {           
              PT_4.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="NS 1")
            { 
              NS_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="SEA 1")
            {          
              SEA1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="Half Yearly")
            {
              half_yearly.push(obj[i].avg__finalgrade);
            }
          }
          else if(obj[i].Class=="2 B")
          {
            if(PT_1[3]==undefined){ PT_1.push(0);}
            if(PT_2[3]==undefined){ PT_2.push(0);}
            if(PT_3[3]==undefined){ PT_3.push(0);}
            if(PT_4[3]==undefined){ PT_4.push(0);}
            if(NS_1[3]==undefined){ NS_1.push(0);}
            if(SEA1[3]==undefined){ SEA1.push(0);}
            if(half_yearly[3]==undefined){ half_yearly.push(0);}
            if(obj[i].Term=="PT 1")
            {
              PT_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 2")
            {
              PT_2.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 3")
            { 
              PT_3.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 4")
            {           
              PT_4.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="NS 1")
            { 
              NS_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="SEA 1")
            {          
              SEA1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="Half Yearly")
            {
              half_yearly.push(obj[i].avg__finalgrade);
            }
          }
          else if(obj[i].Class=="2 C")
          {
            if(PT_1[4]==undefined){ PT_1.push(0);}
            if(PT_2[4]==undefined){ PT_2.push(0);}
            if(PT_3[4]==undefined){ PT_3.push(0);}
            if(PT_4[4]==undefined){ PT_4.push(0);}
            if(NS_1[4]==undefined){ NS_1.push(0);}
            if(SEA1[4]==undefined){ SEA1.push(0);}
            if(half_yearly[4]==undefined){ half_yearly.push(0);}
            if(obj[i].Term=="PT 1")
            {
              PT_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 2")
            {
              PT_2.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 3")
            { 
              PT_3.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 4")
            {           
              PT_4.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="NS 1")
            { 
              NS_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="SEA 1")
            {          
              SEA1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="Half Yearly")
            {
              half_yearly.push(obj[i].avg__finalgrade);
            }
          }
          else if(obj[i].Class=="3 A")
          {
            if(PT_1[5]==undefined){ PT_1.push(0);}
            if(PT_2[5]==undefined){ PT_2.push(0);}
            if(PT_3[5]==undefined){ PT_3.push(0);}
            if(PT_4[5]==undefined){ PT_4.push(0);}
            if(NS_1[5]==undefined){ NS_1.push(0);}
            if(SEA1[5]==undefined){ SEA1.push(0);}
            if(half_yearly[5]==undefined){ half_yearly.push(0);}
            if(obj[i].Term=="PT 1")
            {
              PT_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 2")
            {
              PT_2.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 3")
            { 
              PT_3.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 4")
            {           
              PT_4.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="NS 1")
            { 
              NS_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="SEA 1")
            {          
              SEA1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="Half Yearly")
            {
              half_yearly.push(obj[i].avg__finalgrade);
            }
          }
          else if(obj[i].Class=="3 B")
          {
            if(PT_1[6]==undefined){ PT_1.push(0);}
            if(PT_2[6]==undefined){ PT_2.push(0);}
            if(PT_3[6]==undefined){ PT_3.push(0);}
            if(PT_4[6]==undefined){ PT_4.push(0);}
            if(NS_1[6]==undefined){ NS_1.push(0);}
            if(SEA1[6]==undefined){ SEA1.push(0);}
            if(half_yearly[6]==undefined){ half_yearly.push(0);}
            if(obj[i].Term=="PT 1")
            {
              PT_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 2")
            {
              PT_2.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 3")
            { 
              PT_3.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 4")
            {           
              PT_4.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="NS 1")
            { 
              NS_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="SEA 1")
            {          
              SEA1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="Half Yearly")
            {
              half_yearly.push(obj[i].avg__finalgrade);
            }
          }
          else if(obj[i].Class=="3 C")
          {
            if(PT_1[7]==undefined){ PT_1.push(0);}
            if(PT_2[7]==undefined){ PT_2.push(0);}
            if(PT_3[7]==undefined){ PT_3.push(0);}
            if(PT_4[7]==undefined){ PT_4.push(0);}
            if(NS_1[7]==undefined){ NS_1.push(0);}
            if(SEA1[7]==undefined){ SEA1.push(0);}
            if(half_yearly[7]==undefined){ half_yearly.push(0);}
            if(obj[i].Term=="PT 1")
            {
              PT_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 2")
            {
              PT_2.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 3")
            { 
              PT_3.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 4")
            {           
              PT_4.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="NS 1")
            { 
              NS_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="SEA 1")
            {          
              SEA1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="Half Yearly")
            {
              half_yearly.push(obj[i].avg__finalgrade);
            }
          }
          else if(obj[i].Class=="4 A")
          {
            if(PT_1[8]==undefined){ PT_1.push(0);}
            if(PT_2[8]==undefined){ PT_2.push(0);}
            if(PT_3[8]==undefined){ PT_3.push(0);}
            if(PT_4[8]==undefined){ PT_4.push(0);}
            if(NS_1[8]==undefined){ NS_1.push(0);}
            if(SEA1[8]==undefined){ SEA1.push(0);}
            if(half_yearly[8]==undefined){ half_yearly.push(0);}
            if(obj[i].Term=="PT 1")
            {
              PT_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 2")
            {
              PT_2.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 3")
            { 
              PT_3.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 4")
            {           
              PT_4.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="NS 1")
            { 
              NS_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="SEA 1")
            {          
              SEA1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="Half Yearly")
            {
              half_yearly.push(obj[i].avg__finalgrade);
            }
          }
          else if(obj[i].Class=="4 B")
          {
            if(PT_1[9]==undefined){ PT_1.push(0);}
            if(PT_2[9]==undefined){ PT_2.push(0);}
            if(PT_3[9]==undefined){ PT_3.push(0);}
            if(PT_4[9]==undefined){ PT_4.push(0);}
            if(NS_1[9]==undefined){ NS_1.push(0);}
            if(SEA1[9]==undefined){ SEA1.push(0);}
            if(half_yearly[9]==undefined){ half_yearly.push(0);}
            if(obj[i].Term=="PT 1")
            {
              PT_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 2")
            {
              PT_2.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 3")
            { 
              PT_3.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 4")
            {           
              PT_4.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="NS 1")
            { 
              NS_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="SEA 1")
            {          
              SEA1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="Half Yearly")
            {
              half_yearly.push(obj[i].avg__finalgrade);
            }
          }
          else if(obj[i].Class=="4 C")
          {
            if(PT_1[10]==undefined){ PT_1.push(0);}
            if(PT_2[10]==undefined){ PT_2.push(0);}
            if(PT_3[10]==undefined){ PT_3.push(0);}
            if(PT_4[10]==undefined){ PT_4.push(0);}
            if(NS_1[10]==undefined){ NS_1.push(0);}
            if(SEA1[10]==undefined){ SEA1.push(0);}
            if(half_yearly[10]==undefined){ half_yearly.push(0);}
            if(obj[i].Term=="PT 1")
            {
              PT_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 2")
            {
              PT_2.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 3")
            { 
              PT_3.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 4")
            {           
              PT_4.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="NS 1")
            { 
              NS_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="SEA 1")
            {          
              SEA1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="Half Yearly")
            {
              half_yearly.push(obj[i].avg__finalgrade);
            }
          }
          else if(obj[i].Class=="5 A")
          {
            if(PT_1[11]==undefined){ PT_1.push(0);}
            if(PT_2[11]==undefined){ PT_2.push(0);}
            if(PT_3[11]==undefined){ PT_3.push(0);}
            if(PT_4[11]==undefined){ PT_4.push(0);}
            if(NS_1[11]==undefined){ NS_1.push(0);}
            if(SEA1[11]==undefined){ SEA1.push(0);}
            if(half_yearly[11]==undefined){ half_yearly.push(0);}
            if(obj[i].Term=="PT 1")
            {
              PT_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 2")
            {
              PT_2.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 3")
            { 
              PT_3.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 4")
            {           
              PT_4.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="NS 1")
            { 
              NS_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="SEA 1")
            {          
              SEA1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="Half Yearly")
            {
              half_yearly.push(obj[i].avg__finalgrade);
            }
          }        
          else if(obj[i].Class=="5 B")
          {
            if(PT_1[12]==undefined){ PT_1.push(0);}
            if(PT_2[12]==undefined){ PT_2.push(0);}
            if(PT_3[12]==undefined){ PT_3.push(0);}
            if(PT_4[12]==undefined){ PT_4.push(0);}
            if(NS_1[12]==undefined){ NS_1.push(0);}
            if(SEA1[12]==undefined){ SEA1.push(0);}
            if(half_yearly[12]==undefined){ half_yearly.push(0);}
            if(obj[i].Term=="PT 1")
            {
              PT_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 2")
            {
              PT_2.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 3")
            { 
              PT_3.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 4")
            {           
              PT_4.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="NS 1")
            { 
              NS_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="SEA 1")
            {          
              SEA1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="Half Yearly")
            {
              half_yearly.push(obj[i].avg__finalgrade);
            }
          }
          else if(obj[i].Class=="5 C")
          {
            if(PT_1[13]==undefined){ PT_1.push(0);}
            if(PT_2[13]==undefined){ PT_2.push(0);}
            if(PT_3[13]==undefined){ PT_3.push(0);}
            if(PT_4[13]==undefined){ PT_4.push(0);}
            if(NS_1[13]==undefined){ NS_1.push(0);}
            if(SEA1[13]==undefined){ SEA1.push(0);}
            if(half_yearly[13]==undefined){ half_yearly.push(0);}
            if(obj[i].Term=="PT 1")
            {
              PT_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 2")
            {
              PT_2.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 3")
            { 
              PT_3.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 4")
            {           
              PT_4.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="NS 1")
            { 
              NS_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="SEA 1")
            {          
              SEA1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="Half Yearly")
            {
              half_yearly.push(obj[i].avg__finalgrade);
            }
          }
          else if(obj[i].Class=="6 A")
          {
            if(PT_1[14]==undefined){ PT_1.push(0);}
            if(PT_2[14]==undefined){ PT_2.push(0);}
            if(PT_3[14]==undefined){ PT_3.push(0);}
            if(PT_4[14]==undefined){ PT_4.push(0);}
            if(NS_1[14]==undefined){ NS_1.push(0);}
            if(SEA1[14]==undefined){ SEA1.push(0);}
            if(half_yearly[14]==undefined){ half_yearly.push(0);}
            if(obj[i].Term=="PT 1")
            {
              PT_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 2")
            {
              PT_2.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 3")
            { 
              PT_3.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 4")
            {           
              PT_4.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="NS 1")
            { 
              NS_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="SEA 1")
            {          
              SEA1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="Half Yearly")
            {
              half_yearly.push(obj[i].avg__finalgrade);
            }
          }
          else if(obj[i].Class=="6 B")
          {
            if(PT_1[15]==undefined){ PT_1.push(0);}
            if(PT_2[15]==undefined){ PT_2.push(0);}
            if(PT_3[15]==undefined){ PT_3.push(0);}
            if(PT_4[15]==undefined){ PT_4.push(0);}
            if(NS_1[15]==undefined){ NS_1.push(0);}
            if(SEA1[15]==undefined){ SEA1.push(0);}
            if(half_yearly[15]==undefined){ half_yearly.push(0);}
            if(obj[i].Term=="PT 1")
            {
              PT_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 2")
            {
              PT_2.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 3")
            { 
              PT_3.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 4")
            {           
              PT_4.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="NS 1")
            { 
              NS_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="SEA 1")
            {          
              SEA1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="Half Yearly")
            {
              half_yearly.push(obj[i].avg__finalgrade);
            }
          }
          else if(obj[i].Class=="6 C")
          {
            if(PT_1[16]==undefined){ PT_1.push(0);}
            if(PT_2[16]==undefined){ PT_2.push(0);}
            if(PT_3[16]==undefined){ PT_3.push(0);}
            if(PT_4[16]==undefined){ PT_4.push(0);}
            if(NS_1[16]==undefined){ NS_1.push(0);}
            if(SEA1[16]==undefined){ SEA1.push(0);}
            if(half_yearly[16]==undefined){ half_yearly.push(0);}
            if(obj[i].Term=="PT 1")
            {
              PT_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 2")
            {
              PT_2.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 3")
            { 
              PT_3.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 4")
            {           
              PT_4.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="NS 1")
            { 
              NS_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="SEA 1")
            {          
              SEA1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="Half Yearly")
            {
              half_yearly.push(obj[i].avg__finalgrade);
            }
          }
          else if(obj[i].Class=="7 A")
          {
            if(PT_1[17]==undefined){ PT_1.push(0);}
            if(PT_2[17]==undefined){ PT_2.push(0);}
            if(PT_3[17]==undefined){ PT_3.push(0);}
            if(PT_4[17]==undefined){ PT_4.push(0);}
            if(NS_1[17]==undefined){ NS_1.push(0);}
            if(SEA1[17]==undefined){ SEA1.push(0);}
            if(half_yearly[17]==undefined){ half_yearly.push(0);}
            if(obj[i].Term=="PT 1")
            {
              PT_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 2")
            {
              PT_2.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 3")
            { 
              PT_3.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 4")
            {           
              PT_4.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="NS 1")
            { 
              NS_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="SEA 1")
            {          
              SEA1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="Half Yearly")
            {
              half_yearly.push(obj[i].avg__finalgrade);
            }
          }
          else if(obj[i].Class=="7 B")
          {
            if(PT_1[18]==undefined){ PT_1.push(0);}
            if(PT_2[18]==undefined){ PT_2.push(0);}
            if(PT_3[18]==undefined){ PT_3.push(0);}
            if(PT_4[18]==undefined){ PT_4.push(0);}
            if(NS_1[18]==undefined){ NS_1.push(0);}
            if(SEA1[18]==undefined){ SEA1.push(0);}
            if(half_yearly[18]==undefined){ half_yearly.push(0);}
            if(obj[i].Term=="PT 1")
            {
              PT_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 2")
            {
              PT_2.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 3")
            { 
              PT_3.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 4")
            {           
              PT_4.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="NS 1")
            { 
              NS_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="SEA 1")
            {          
              SEA1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="Half Yearly")
            {
              half_yearly.push(obj[i].avg__finalgrade);
            }
          }
          else if(obj[i].Class=="7 C")
          {
            if(PT_1[19]==undefined){ PT_1.push(0);}
            if(PT_2[19]==undefined){ PT_2.push(0);}
            if(PT_3[19]==undefined){ PT_3.push(0);}
            if(PT_4[19]==undefined){ PT_4.push(0);}
            if(NS_1[19]==undefined){ NS_1.push(0);}
            if(SEA1[19]==undefined){ SEA1.push(0);}
            if(half_yearly[19]==undefined){ half_yearly.push(0);}
            if(obj[i].Term=="PT 1")
            {
              PT_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 2")
            {
              PT_2.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 3")
            { 
              PT_3.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 4")
            {           
              PT_4.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="NS 1")
            { 
              NS_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="SEA 1")
            {          
              SEA1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="Half Yearly")
            {
              half_yearly.push(obj[i].avg__finalgrade);
            }
          }
          else if(obj[i].Class=="8 A")
          {
            if(PT_1[20]==undefined){ PT_1.push(0);}
            if(PT_2[20]==undefined){ PT_2.push(0);}
            if(PT_3[20]==undefined){ PT_3.push(0);}
            if(PT_4[20]==undefined){ PT_4.push(0);}
            if(NS_1[20]==undefined){ NS_1.push(0);}
            if(SEA1[20]==undefined){ SEA1.push(0);}
            if(half_yearly[20]==undefined){ half_yearly.push(0);}
            if(obj[i].Term=="PT 1")
            {
              PT_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 2")
            {
              PT_2.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 3")
            { 
              PT_3.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 4")
            {           
              PT_4.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="NS 1")
            { 
              NS_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="SEA 1")
            {          
              SEA1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="Half Yearly")
            {
              half_yearly.push(obj[i].avg__finalgrade);
            }
          }
          else if(obj[i].Class=="8 B")
          {

            if(PT_1[21]==undefined){ PT_1.push(0);}
            if(PT_2[21]==undefined){ PT_2.push(0);}
            if(PT_3[21]==undefined){ PT_3.push(0);}
            if(PT_4[21]==undefined){ PT_4.push(0);}
            if(NS_1[21]==undefined){ NS_1.push(0);}
            if(SEA1[21]==undefined){ SEA1.push(0);}
            if(half_yearly[21]==undefined){ half_yearly.push(0);}
            if(obj[i].Term=="PT 1")
            {
              PT_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 2")
            {
              PT_2.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 3")
            { 
              PT_3.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 4")
            {           
              PT_4.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="NS 1")
            { 
              NS_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="SEA 1")
            {          
              SEA1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="Half Yearly")
            {
              half_yearly.push(obj[i].avg__finalgrade);
            }
          }
          else if(obj[i].Class=="8 C")
          {
            if(PT_1[22]==undefined){ PT_1.push(0);}
            if(PT_2[22]==undefined){ PT_2.push(0);}
            if(PT_3[22]==undefined){ PT_3.push(0);}
            if(PT_4[22]==undefined){ PT_4.push(0);}
            if(NS_1[22]==undefined){ NS_1.push(0);}
            if(SEA1[22]==undefined){ SEA1.push(0);}
            if(half_yearly[22]==undefined){ half_yearly.push(0);}
            if(obj[i].Term=="PT 1")
            {
              PT_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 2")
            {
              PT_2.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 3")
            { 
              PT_3.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="PT 4")
            {           
              PT_4.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="NS 1")
            { 
              NS_1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="SEA 1")
            {          
              SEA1.push(obj[i].avg__finalgrade);
            }
            else if(obj[i].Term=="Half Yearly")
            {
              half_yearly.push(obj[i].avg__finalgrade);
            }
          }
          
        
      }
      var uniqueNames = [];
$.each(Class, function(i, el){
    if($.inArray(el, uniqueNames) === -1) uniqueNames.push(el);
});  
      var ctx= document.getElementById('mycanvas').getContext("2d");
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: class_list,
          datasets: [
          {
            label: 'PT 1',
            data: PT_1,
            backgroundColor: 'rgba(250, 4, 0, 1)',
            borderColor: 'rgba(250, 4, 0, 1)', 
          },
          {
            label: 'PT 2',
            data: PT_2,
            backgroundColor: 'rgba(0, 4, 255, 1)',
            borderColor: 'rgba(0, 4, 255, 1)',
            
          },
          {
            label: 'PT 3',
            data: PT_3,
            backgroundColor: 'rgba(255, 0, 255, 1)',
            borderColor: 'rgba(255, 0, 255, 1)',
            
          },
          {
            label: 'PT 4',
            data: PT_4,
            backgroundColor: 'rgba(131, 154, 31, 1)',
            borderColor: 'rgba(131, 154,31, 1)',
            
          },
          {
            label:'NS 1',
            data: NS_1,
            backgroundColor:'rgba(255, 85, 0, 1)',
            borderColor:'rgba(255, 85, 0, 1)',
            
          },
          {
            label: 'SEA 1',
            data: SEA1,
            backgroundColor: 'rgba(66, 73, 73, 1)',
            borderColor: 'rgba(66, 73, 73, 1)',
            
          },
          {
            label: 'Half Yearly',
            data: half_yearly,
            backgroundColor: 'rgba(241, 196, 15, 1)',
            borderColor: 'rgba(241, 196, 15, 1)',
            
          },
          ]
        },
        options: {
    scales: {
         xAxes: [{
        
            barPercentage: 1.1
        }],
        yAxes: [{
            type: "linear",
            display: true,
            position: "left",
            id: "y-axis-1",
        }]
    }
}

      });
},  
error: function(data) {
}
});
$.ajax({
  url: "overall_performance_query2.php",
  method: "GET",
  success: function(data) {
          console.log(data);

    var English=[];var English2=[null];
    var Maths=[];var Maths2=[null];
    var Hindi=[];var Hindi2=[];
    var EVS=[];var EVS2=[null];
    var GK=[];var GK2=[];
    var SS=[];
    var Science=[];
    var Subject=[];
    var Class=[];
    var obj = JSON.parse(data);
      var class_list=['1 A','1 B','1 C','2 A','2 B','2 C','3 A','3 B','3 C','4 A','4 B','4 C','5 A','5 B','5 C','6 A','6 B','6 C','7 A','7 B','7 C','8 A','8 B','8 C'];

    for(var i in obj) 
    {  
          obj[i].avg__Marks=parseFloat(obj[i].avg__Marks).toFixed(2);
          Class.push(obj[i].Class);
          if(obj[i].Class=="1 A")
          {
            if(obj[i].Subject=="English")
            {
              English.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="EVS")
            {
              EVS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="GK")
            {
              GK.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="Hindi")
            {
              Hindi.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="Maths")
            {
              Maths.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="Social Science")
            {
              SS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="Science")
            {
              Science.push(obj[i].avg__Marks);
            }
          }
          else if(obj[i].Class=="1 B")
          {
            if(Hindi[0]==undefined){ Hindi.push(0);}
            if(English[0]==undefined){ English.push(0);}
            if(Maths[0]==undefined){ Maths.push(0);}
            if(EVS[0]==undefined){ EVS.push(0);}
            if(GK[0]==undefined){ GK.push(0);}
            if(SS[0]==undefined){ SS.push(0);}
            if(Science[0]==undefined){ Science.push(0);}
            if(obj[i].Subject=="English")
            {
              English.push(obj[i].avg__Marks);            
            }
            else if(obj[i].Subject=="EVS")
            {             
              EVS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="GK")
            {
              
              GK.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Hindi")
            {
              
              Hindi.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Maths")
            {
              
              Maths.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Social Science")
            {
              
              SS.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Science")
            {
              
              Science.push(obj[i].avg__Marks);
              
            }
          }
          else if(obj[i].Class=="1 C")
          {
            if(Hindi[1]==undefined){ Hindi.push(0);}
            if(English[1]==undefined){ English.push(0);}
            if(Maths[1]==undefined){ Maths.push(0);}
            if(EVS[1]==undefined){ EVS.push(0);}
            if(GK[1]==undefined){ GK.push(0);}
            if(SS[1]==undefined){ SS.push(0);}
            if(Science[1]==undefined){ Science.push(0);}
            if(obj[i].Subject=="English")
            {
              
              English.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="EVS")
            {
              
              
              EVS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="GK")
            {
              
              GK.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Hindi")
            {
              
              Hindi.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Maths")
            {
              
              Maths.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Social Science")
            {
              
              SS.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Science")
            {
              
              Science.push(obj[i].avg__Marks);
              
            }
          }
          else if(obj[i].Class=="2 A")
          {
            if(Hindi[2]==undefined){ Hindi.push(0);}
            if(English[2]==undefined){ English.push(0);}
            if(Maths[2]==undefined){ Maths.push(0);}
            if(EVS[2]==undefined){ EVS.push(0);}
            if(GK[2]==undefined){ GK.push(0);}
            if(SS[2]==undefined){ SS.push(0);}
            if(Science[2]==undefined){ Science.push(0);}
            if(obj[i].Subject=="English")
            {
              
              English.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="EVS")
            {
              
              
              EVS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="GK")
            {
              
              GK.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Hindi")
            {
              
              Hindi.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Maths")
            {
              
              Maths.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Social Science")
            {
              
              SS.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Science")
            {
              
              Science.push(obj[i].avg__Marks);
              
            }
          }
          else if(obj[i].Class=="2 B")
          {
            if(Hindi[3]==undefined){ Hindi.push(0);}
            if(English[3]==undefined){ English.push(0);}
            if(Maths[3]==undefined){ Maths.push(0);}
            if(EVS[3]==undefined){ EVS.push(0);}
            if(GK[3]==undefined){ GK.push(0);}
            if(SS[3]==undefined){ SS.push(0);}
            if(Science[3]==undefined){ Science.push(0);}

            if(obj[i].Subject=="English")
            {
              
              English.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="EVS")
            {
              
              
              EVS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="GK")
            {
              
              GK.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Hindi")
            {
              
              Hindi.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Maths")
            {
              
              Maths.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Social Science")
            {
              
              SS.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Science")
            {
              
              Science.push(obj[i].avg__Marks);
              
            }
          }
          else if(obj[i].Class=="2 C")
          {
            if(Hindi[4]==undefined){ Hindi.push(0);}
            if(English[4]==undefined){ English.push(0);}
            if(Maths[4]==undefined){ Maths.push(0);}
            if(EVS[4]==undefined){ EVS.push(0);}
            if(GK[4]==undefined){ GK.push(0);}
            if(SS[4]==undefined){ SS.push(0);}
            if(Science[4]==undefined){ Science.push(0);}
            if(obj[i].Subject=="English")
            {
              
              English.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="EVS")
            {
              
              
              EVS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="GK")
            {
              
              GK.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Hindi")
            {
              
              Hindi.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Maths")
            {
              
              Maths.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Social Science")
            {
              
              SS.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Science")
            {
              
              Science.push(obj[i].avg__Marks);
              
            }
          }
          else if(obj[i].Class=="3 A")
          {
            if(Hindi[5]==undefined){ Hindi.push(0);}
            if(English[5]==undefined){ English.push(0);}
            if(Maths[5]==undefined){ Maths.push(0);}
            if(EVS[5]==undefined){ EVS.push(0);}
            if(GK[5]==undefined){ GK.push(0);}
            if(SS[5]==undefined){ SS.push(0);}
            if(Science[5]==undefined){ Science.push(0);}
            if(obj[i].Subject=="English")
            {
              
              English.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="EVS")
            {
              
              
              EVS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="GK")
            {
              
              GK.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Hindi")
            {
              
              Hindi.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Maths")
            {
              
              Maths.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Social Science")
            {
              
              SS.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Science")
            {
              
              Science.push(obj[i].avg__Marks);
              
            }
          }
          else if(obj[i].Class=="3 B")
          {
            if(Hindi[6]==undefined){ Hindi.push(0);}
            if(English[6]==undefined){ English.push(0);}
            if(Maths[6]==undefined){ Maths.push(0);}
            if(EVS[6]==undefined){ EVS.push(0);}
            if(GK[6]==undefined){ GK.push(0);}
            if(SS[6]==undefined){ SS.push(0);}
            if(Science[6]==undefined){ Science.push(0);}
            if(obj[i].Subject=="English")
            {
              
              English.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="EVS")
            {
              
              
              EVS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="GK")
            {
              
              GK.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Hindi")
            {
              
              Hindi.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Maths")
            {
              
              Maths.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Social Science")
            {
              
              SS.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Science")
            {
              
              Science.push(obj[i].avg__Marks);
              
            }
          }
          else if(obj[i].Class=="3 C")
          {
            if(Hindi[7]==undefined){ Hindi.push(0);}
            if(English[7]==undefined){ English.push(0);}
            if(Maths[7]==undefined){ Maths.push(0);}
            if(EVS[7]==undefined){ EVS.push(0);}
            if(GK[7]==undefined){ GK.push(0);}
            if(SS[7]==undefined){ SS.push(0);}
            if(Science[7]==undefined){ Science.push(0);}
            if(obj[i].Subject=="English")
            {
              
              English.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="EVS")
            {
              
              
              EVS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="GK")
            {
              
              GK.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Hindi")
            {
              
              Hindi.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Maths")
            {
              
              Maths.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Social Science")
            {
              
              SS.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Science")
            {
              
              Science.push(obj[i].avg__Marks);
              
            }
          }
          else if(obj[i].Class=="4 A")
          {
            if(Hindi[8]==undefined){ Hindi.push(0);}
            if(English[8]==undefined){ English.push(0);}
            if(Maths[8]==undefined){ Maths.push(0);}
            if(EVS[8]==undefined){ EVS.push(0);}
            if(GK[8]==undefined){ GK.push(0);}
            if(SS[8]==undefined){ SS.push(0);}
            if(Science[8]==undefined){ Science.push(0);}
            if(obj[i].Subject=="English")
            {
              
              English.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="EVS")
            {
              
              
              EVS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="GK")
            {
              
              GK.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Hindi")
            {
              
              Hindi.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Maths")
            {
              
              Maths.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Social Science")
            {
              
              SS.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Science")
            {
              
              Science.push(obj[i].avg__Marks);
              
            }
          }
          else if(obj[i].Class=="4 B")
          {
            if(Hindi[9]==undefined){ Hindi.push(0);}
            if(English[9]==undefined){ English.push(0);}
            if(Maths[9]==undefined){ Maths.push(0);}
            if(EVS[9]==undefined){ EVS.push(0);}
            if(GK[9]==undefined){ GK.push(0);}
            if(SS[9]==undefined){ SS.push(0);}
            if(Science[9]==undefined){ Science.push(0);}
            if(obj[i].Subject=="English")
            {
              
              English.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="EVS")
            {
              
              
              EVS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="GK")
            {
              
              GK.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Hindi")
            {
              
              Hindi.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Maths")
            {
              
              Maths.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Social Science")
            {
              
              SS.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Science")
            {
              
              Science.push(obj[i].avg__Marks);
              
            }
          }
          else if(obj[i].Class=="4 C")
          {
            if(Hindi[10]==undefined){ Hindi.push(0);}
            if(English[10]==undefined){ English.push(0);}
            if(Maths[10]==undefined){ Maths.push(0);}
            if(EVS[10]==undefined){ EVS.push(0);}
            if(GK[10]==undefined){ GK.push(0);}
            if(SS[10]==undefined){ SS.push(0);}
            if(Science[10]==undefined){ Science.push(0);}
            if(obj[i].Subject=="English")
            {
              
              English.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="EVS")
            {
              
              
              EVS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="GK")
            {
              
              GK.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Hindi")
            {
              
              Hindi.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Maths")
            {
              
              Maths.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Social Science")
            {
              
              SS.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Science")
            {
              
              Science.push(obj[i].avg__Marks);
              
            }
          }
          else if(obj[i].Class=="5 A")
          {
            if(Hindi[11]==undefined){ Hindi.push(0);}
            if(English[11]==undefined){ English.push(0);}
            if(Maths[11]==undefined){ Maths.push(0);}
            if(EVS[11]==undefined){ EVS.push(0);}
            if(GK[11]==undefined){ GK.push(0);}
            if(SS[11]==undefined){ SS.push(0);}
            if(Science[11]==undefined){ Science.push(0);}
            if(obj[i].Subject=="English")
            {
              
              English.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="EVS")
            {
              
              
              EVS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="GK")
            {
              
              GK.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Hindi")
            {
              
              Hindi.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Maths")
            {
              
              Maths.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Social Science")
            {
              
              SS.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Science")
            {
              
              Science.push(obj[i].avg__Marks);
              
            }
          }        
          else if(obj[i].Class=="5 B")
          {
            if(Hindi[12]==undefined){ Hindi.push(0);}
            if(English[12]==undefined){ English.push(0);}
            if(Maths[12]==undefined){ Maths.push(0);}
            if(EVS[12]==undefined){ EVS.push(0);}
            if(GK[12]==undefined){ GK.push(0);}
            if(SS[12]==undefined){ SS.push(0);}
            if(Science[12]==undefined){ Science.push(0);}
            if(obj[i].Subject=="English")
            {
              
              English.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="EVS")
            {
              
              
              EVS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="GK")
            {
              
              GK.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Hindi")
            {
              
              Hindi.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Maths")
            {
              
              Maths.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Social Science")
            {
              
              SS.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Science")
            {
              
              Science.push(obj[i].avg__Marks);
              
            }
          }
          else if(obj[i].Class=="5 C")
          {
            if(Hindi[13]==undefined){ Hindi.push(0);}
            if(English[13]==undefined){ English.push(0);}
            if(Maths[13]==undefined){ Maths.push(0);}
            if(EVS[13]==undefined){ EVS.push(0);}
            if(GK[13]==undefined){ GK.push(0);}
            if(SS[13]==undefined){ SS.push(0);}
            if(Science[13]==undefined){ Science.push(0);}
            if(obj[i].Subject=="English")
            {
              
              English.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="EVS")
            {
              
              
              EVS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="GK")
            {
              
              GK.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Hindi")
            {
              
              Hindi.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Maths")
            {
              
              Maths.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Social Science")
            {
              SS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="Science")
            {
              Science.push(obj[i].avg__Marks);
            }
          }
          else if(obj[i].Class=="6 A")
          {
            if(Hindi[14]==undefined){ Hindi.push(0);}
            if(English[14]==undefined){ English.push(0);}
            if(Maths[14]==undefined){ Maths.push(0);}
            if(EVS[14]==undefined){ EVS.push(0);}
            if(GK[14]==undefined){ GK.push(0);}
            if(SS[14]==undefined){ SS.push(0);}
            if(Science[14]==undefined){ Science.push(0);}
            if(obj[i].Subject=="English")
            {
              
              English.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="EVS")
            {
              
              
              EVS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="GK")
            {
              
              GK.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Hindi")
            {
              
              Hindi.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Maths")
            {
              
              Maths.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Social Science")
            {
              
              SS.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Science")
            {
              
              Science.push(obj[i].avg__Marks);
              
            }
          }        
          else if(obj[i].Class=="6 B")
          {
            if(Hindi[15]==undefined){ Hindi.push(0);}
            if(English[15]==undefined){ English.push(0);}
            if(Maths[15]==undefined){ Maths.push(0);}
            if(EVS[15]==undefined){ EVS.push(0);}
            if(GK[15]==undefined){ GK.push(0);}
            if(SS[15]==undefined){ SS.push(0);}
            if(Science[15]==undefined){ Science.push(0);}
            if(obj[i].Subject=="English")
            {
              
              English.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="EVS")
            {
              
              
              EVS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="GK")
            {
              
              GK.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Hindi")
            {
              
              Hindi.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Maths")
            {
              
              Maths.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Social Science")
            {
              
              SS.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Science")
            {
              
              Science.push(obj[i].avg__Marks);
              
            }
          }
          else if(obj[i].Class=="6 C")
          {
            if(Hindi[16]==undefined){ Hindi.push(0);}
            if(English[16]==undefined){ English.push(0);}
            if(Maths[16]==undefined){ Maths.push(0);}
            if(EVS[16]==undefined){ EVS.push(0);}
            if(GK[16]==undefined){ GK.push(0);}
            if(SS[16]==undefined){ SS.push(0);}
            if(Science[16]==undefined){ Science.push(0);}
            if(obj[i].Subject=="English")
            {
              
              English.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="EVS")
            {
              
              
              EVS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="GK")
            {
              
              GK.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Hindi")
            {
              
              Hindi.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Maths")
            {
              
              Maths.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Social Science")
            {
              SS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="Science")
            {
              Science.push(obj[i].avg__Marks);
            }
          }
          else if(obj[i].Class=="7 A")
          {
            if(Hindi[17]==undefined){ Hindi.push(0);}
            if(English[17]==undefined){ English.push(0);}
            if(Maths[17]==undefined){ Maths.push(0);}
            if(EVS[17]==undefined){ EVS.push(0);}
            if(GK[17]==undefined){ GK.push(0);}
            if(SS[17]==undefined){ SS.push(0);}
            if(Science[17]==undefined){ Science.push(0);}
            if(obj[i].Subject=="English")
            {
              
              English.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="EVS")
            {
              
              
              EVS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="GK")
            {
              
              GK.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Hindi")
            {
              
              Hindi.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Maths")
            {
              
              Maths.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Social Science")
            {
              
              SS.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Science")
            {
              
              Science.push(obj[i].avg__Marks);
              
            }
          }        
          else if(obj[i].Class=="7 B")
          {
            if(Hindi[18]==undefined){ Hindi.push(0);}
            if(English[18]==undefined){ English.push(0);}
            if(Maths[18]==undefined){ Maths.push(0);}
            if(EVS[18]==undefined){ EVS.push(0);}
            if(GK[18]==undefined){ GK.push(0);}
            if(SS[18]==undefined){ SS.push(0);}
            if(Science[18]==undefined){ Science.push(0);}
            if(obj[i].Subject=="English")
            {
              
              English.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="EVS")
            {
              
              
              EVS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="GK")
            {
              
              GK.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Hindi")
            {
              
              Hindi.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Maths")
            {
              
              Maths.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Social Science")
            {
              
              SS.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Science")
            {
              
              Science.push(obj[i].avg__Marks);
              
            }
          }
          else if(obj[i].Class=="7 C")
          {
            if(Hindi[19]==undefined){ Hindi.push(0);}
            if(English[19]==undefined){ English.push(0);}
            if(Maths[19]==undefined){ Maths.push(0);}
            if(EVS[19]==undefined){ EVS.push(0);}
            if(GK[19]==undefined){ GK.push(0);}
            if(SS[19]==undefined){ SS.push(0);}
            if(Science[19]==undefined){ Science.push(0);}
            if(obj[i].Subject=="English")
            {
              
              English.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="EVS")
            {
              
              
              EVS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="GK")
            {
              
              GK.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Hindi")
            {
              
              Hindi.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Maths")
            {
              
              Maths.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Social Science")
            {
              SS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="Science")
            {
              Science.push(obj[i].avg__Marks);
            }
          }
          else if(obj[i].Class=="8 A")
          {
            if(Hindi[20]==undefined){ Hindi.push(0);}
            if(English[20]==undefined){ English.push(0);}
            if(Maths[20]==undefined){ Maths.push(0);}
            if(EVS[20]==undefined){ EVS.push(0);}
            if(GK[20]==undefined){ GK.push(0);}
            if(SS[20]==undefined){ SS.push(0);}
            if(Science[20]==undefined){ Science.push(0);}
            if(obj[i].Subject=="English")
            {
              
              English.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="EVS")
            {
              
              
              EVS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="GK")
            {
              
              GK.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Hindi")
            {
              
              Hindi.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Maths")
            {
              
              Maths.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Social Science")
            {
              
              SS.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Science")
            {
              
              Science.push(obj[i].avg__Marks);
              
            }
          }        
          else if(obj[i].Class=="8 B")
          {
            if(Hindi[21]==undefined){ Hindi.push(0);}
            if(English[21]==undefined){ English.push(0);}
            if(Maths[21]==undefined){ Maths.push(0);}
            if(EVS[21]==undefined){ EVS.push(0);}
            if(GK[21]==undefined){ GK.push(0);}
            if(SS[21]==undefined){ SS.push(0);}
            if(Science[21]==undefined){ Science.push(0);}
            if(obj[i].Subject=="English")
            {
              
              English.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="EVS")
            {
              
              
              EVS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="GK")
            {
              
              GK.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Hindi")
            {
              
              Hindi.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Maths")
            {
              
              Maths.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Social Science")
            {
              
              SS.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Science")
            {
              
              Science.push(obj[i].avg__Marks);
              
            }
          }
          else if(obj[i].Class=="8 C")
          {
            if(Hindi[22]==undefined){ Hindi.push(0);}
            if(English[22]==undefined){ English.push(0);}
            if(Maths[22]==undefined){ Maths.push(0);}
            if(EVS[22]==undefined){ EVS.push(0);}
            if(GK[22]==undefined){ GK.push(0);}
            if(SS[22]==undefined){ SS.push(0);}
            if(Science[22]==undefined){ Science.push(0);}
            if(obj[i].Subject=="English")
            {
              English.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="EVS")
            {
              EVS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="GK")
            {
              GK.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="Hindi")
            {

              Hindi.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Maths")
            {
              
              Maths.push(obj[i].avg__Marks);
              
            }
            else if(obj[i].Subject=="Social Science")
            {
              SS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="Science")
            {
              Science.push(obj[i].avg__Marks);
            }
          }
        
      }
      var uniqueNames = [];
$.each(Class, function(i, el){
    if($.inArray(el, uniqueNames) === -1) uniqueNames.push(el);
});  
       
    var ctx= document.getElementById('mycanvas2').getContext("2d");
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: class_list,
          datasets: [
          {
            label: 'English',
            data: English,
            backgroundColor: 'rgba(91, 144, 191, 1)',
            borderColor: 'rgba(91, 144, 191, 1)',
            borderWidth: 0.1
          },
          {
            label: 'GK',
            data: GK,
            backgroundColor: 'rgba(91, 254, 91, 1)',
            borderColor: 'rgba(91, 254, 91, 1)',
            borderWidth: 0.1
          },
          {
            label: 'EVS',
            data: EVS,
            backgroundColor: 'rgba(231, 54, 231, 1)',
            borderColor: 'rgba(231, 54,231, 1)',
            borderWidth: 0.1
          },
          {
            label: 'Hindi',
            data: Hindi,
            backgroundColor: 'rgba(131, 154, 31, 1)',
            borderColor: 'rgba(131, 154,31, 1)',
            borderWidth: 0.1
          },
          {
            label:'Maths',
            data: Maths,
            backgroundColor:'rgba(141, 44, 191, 1)',
            borderColor:'rgba(141, 44,191, 1)',
            borderWidth: 0.1
          },
          {
            label: 'Social Science',
            data: SS,
            backgroundColor: 'rgba(66, 73, 73, 1)',
            borderColor: 'rgba(66, 73, 73, 1)',
            borderWidth: 0.1
          },
          {
            label: 'Science',
            data: Science,
            backgroundColor: 'rgba(241, 196, 15, 1)',
            borderColor: 'rgba(241, 196, 15, 1)',
            borderWidth: 0.1
          },
          ]
        },
      options: {
        responsive:true,
        maintainAspectRatio:true,
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero:true
            }
          }]            
        }
      }

    });
},  
error: function(data) {
}
});

});

</script>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LITTLE FLOWER | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">

      <!-- Logo -->
      <a href="../admin.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>LITTLE FLOWER</b></span>
      </a>

      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->

            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="hidden-xs"><?php echo $userRow['firstname']." ".$userRow['lastname'];?></span>
              </a>

            </div>

          </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
          <!-- sidebar: style can be found in sidebar.less -->
          <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
              
            </div>

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
              <li class="active treeview menu-open">
                <a href="#">
                  <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">

                  <li class="treeview">
                    <a href="#">
                      <i class="fa fa-edit"></i> <span>Performace</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="overall_performance.php"><i class="fa fa-circle-o"></i> Overall</a></li>
                      <li><a href="student_performance.php"><i class="fa fa-circle-o"></i> Student</a></li>
                      <li><a href="subject_performance.php"><i class="fa fa-circle-o"></i> Subject</a></li>

                    </ul>
                  </li>
                  <li class="treeview">
                    <a href="#">
                      <i class="fa fa-edit"></i> <span>Attendance</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="student_attendance.php"><i class="fa fa-circle-o"></i> Overall</a></li>
                      <li><a href="../attendance/student_attendance.php"><i class="fa fa-circle-o"></i> Student</a></li>

                    </ul>
                  </li>
                  <li>
            <a href="../reports.php">Fees</a>  
        </li>
                  <li class="treeview">
                    <a href="#">
                      <i class="fa fa-edit"></i> <span>Library</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="#"><i class="fa fa-circle-o"></i> Teacher</a></li>
                      <li><a href="#"><i class="fa fa-circle-o"></i> Student</a></li>

                    </ul>
                  </li>

                </ul>
              </section>
              <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">

              <section class="content-header">
                <h1> Overall Performance</h1>
              </section>

              <section class="content-header pull-right">
                <h1> Greencard Download</h1>
                <div class="lg-lg-3 lg-md-3 lg-sm-3">
                  <form action="greencard.php" method="post">
                  <label for="classes">Select Class</label>
                    <select class="form-control" name="classes">
                     <?php 
                     include("queries.php");
                     foreach ($userRow1s as $key) {
                      if($key["Class"]!='')
                      echo '<option>'.$key["Class"].'</option>';
                    }
                    ?>
                  </select>
                  <br>
                  <input type="submit" value="Download"></input>
                </form>
                </div>
              </section>

 <section class="content-header pull-right">
                <h1>Single Marksheet Download</h1>

                <div class="lg-lg-3 lg-md-3 lg-sm-3">
                  <form action="../pdf/routed.php" method="post">
                  <label for="classes">Enter Admission No.</label><br>
                    <input type="number" name="adm">
                  <br><br>
                  <input type="submit" value="Download"></input>
                </form>
                </div>
              </section>

              <section class="content-header pull-right">
                <h1> Marksheet Download</h1>
                <div class="lg-lg-3 lg-md-3 lg-sm-3">
                  <form action="../pdf/route.php" method="post">
                  <label for="classes">Select Class</label>
                    <select class="form-control" name="classes">
                    <option>All Classes</option>
                     <?php 
                     include("queries.php");
                     foreach ($userRow6 as $key) {
                      echo '<option>'.$key["Class"].'</option>';
                    }
                    ?>
                  </select>
                  <br>
                  <input type="submit" value="Download"></input>
                </form>
                </div>
              </section>

              <section class="content">

                <div class="row">
                  <div class="col-lg-10">
                    <h4>Overall Class Performance</h4>
                    <div id="chart-container">
                    <canvas id="mycanvas"></canvas>
                    </div>
                  </div>
                  
                </div>
                <div class="row">
                  <div class="col-lg-10">
                    <h4>Subject Wise Comparison</h4>
                    <div id="chart-container">
                    <canvas id="mycanvas2"></canvas>
                    </div>
                  </div>
                  
                </div>
                
              </div>
            </div>
          </div>
        </div>
        <!-- ./wrapper -->

        <!-- jQuery 3 -->
        <script src="../bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="../bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="../dist/js/adminlte.min.js"></script>
        <!-- Sparkline -->
        <script src="../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
        <!-- jvectormap  -->
        <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <!-- SlimScroll -->
        <script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <!-- ChartJS -->
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <!-- AdminLTE for demo purposes -->
        <script src="../dist/js/demo.js"></script>



      </body>
      </html>
