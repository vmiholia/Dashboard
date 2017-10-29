<?php
require_once("../session.php");
require_once("../class.user.php");
$auth_user = new USER();
$username = $_SESSION['username'];
$stmt = $auth_user->runQuery("SELECT * FROM mdl_user WHERE username=:username");
$stmt->execute(array(":username"=>$username));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
?>
<style type="text/css">
#chart-container {
  position: relative;
  height:auto;
}
#chart-container2 {
  position: relative;
  height:auto;
}
</style>

</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.js'></script>
<script src="chart.js"></script>

<script>
$(document).ready(function(){
  $.ajax({
    url: "subject_performance_query.php?classes=All&subject=All",
    method: "GET",
    success: function(data) {
      var avg__finalgrades = [];
      var itemnames = [];
      var obj = JSON.parse(data);
      for(var i in obj) {
          obj[i].avg__Marks=parseFloat(obj[i].avg__Marks).toFixed(2);

        avg__finalgrades.push(obj[i].avg__Marks);
        itemnames.push(obj[i].Term);
      }
      var ctx= document.getElementById('mycanvas').getContext("2d");
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: itemnames,
          datasets: [{
            label: 'Marks ',
            data: avg__finalgrades,
            backgroundColor: 'rgba(91, 144, 191, 1)',
            borderColor:'rgba(91, 144, 191, 1)',
            borderWidth: 1
          }]
        },
        options: {
          responsive:true,
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


$.ajax({
    url: "subject_performance_query3.php?classes=All&subject=All",
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
      var ctx= document.getElementById('mycanvas3').getContext("2d");
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: class_list,
          datasets: [
          {
            label: 'PT 1',
            data: PT_1,
            backgroundColor: 'rgba(91, 144, 191, 1)',
            borderColor: 'rgba(91, 144, 191, 1)',
            borderWidth: 0.1
          },
          {
            label: 'PT 2',
            data: PT_2,
            backgroundColor: 'rgba(91, 254, 91, 1)',
            borderColor: 'rgba(91, 254, 91, 1)',
            borderWidth: 0.1
          },
          {
            label: 'PT 3',
            data: PT_3,
            backgroundColor: 'rgba(231, 54, 231, 1)',
            borderColor: 'rgba(231, 54,231, 1)',
            borderWidth: 0.1
          },
          {
            label: 'PT 4',
            data: PT_4,
            backgroundColor: 'rgba(131, 154, 31, 1)',
            borderColor: 'rgba(131, 154,31, 1)',
            borderWidth: 0.1
          },
          {
            label:'NS 1',
            data: NS_1,
            backgroundColor:'rgba(141, 44, 191, 1)',
            borderColor:'rgba(141, 44,191, 1)',
            borderWidth: 0.1
          },
          {
            label: 'SEA 1',
            data: SEA1,
            backgroundColor: 'rgba(66, 73, 73, 1)',
            borderColor: 'rgba(66, 73, 73, 1)',
            borderWidth: 0.1
          },
          {
            label: 'Half Yearly',
            data: half_yearly,
            backgroundColor: 'rgba(241, 196, 15, 1)',
            borderColor: 'rgba(241, 196, 15, 1)',
            borderWidth: 0.1
          },
          ]
        },
        options: {
          responsive:true,
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero:true
              }
            }],
             xAxes: [{
            barPercentage: 1
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
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

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
                <h1> Subject Performance</h1>
              </section>
              <section class="content">

                <div class="row">
                  <div class="col-lg-8">
                    <h4>Subject Performance</h4>
                    <div id="chart-container">
                      <canvas id="mycanvas"></canvas>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <h4><b>Select Filter<b></h4>
                    
                    <label for="classes">Class</label>
                    <select onchange="updateChart()"class="form-control" id="classes">
                     <option>All</option>
                     <?php 
                     include("queries.php");
                     foreach ($userRow6 as $key) {
                      echo '<option>'.$key["Class"].'</option>';
                    }
                    ?>
                  </select>

                  <label for="subject">Subject</label>
                  <select onchange="updateChart2()"class="form-control" id="subject">
                    <option value="All">All</option>
                    <option value="English">English</option>
                    <option value="Maths">Maths</option>
                    <option value="Science">Science</option>
                    <option value="Social Science">Social Science</option>
                    <option value="GK">GK</option>
                    <option value="EVS">EVS</option>
                    <option value="Hindi">Hindi</option>                  </select>



                  </div>
                </div>
                <div class="row">
                <div class="col-lg-12">
                 <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Student's Information</h3>
                  </div>
                  <br><br>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Name</th>
                          
                          <th>Average Mrks</th>
                        </tr>
                      </thead>
                      <tbody id="tbody">
                        <?php
                        include("queries.php");
                        foreach ($userRow8 as $key) {
                          echo '
                          <tr>
                          <td>'.$key["Student_Name"].'</td>
                          
                          <td>'.$key["avg__Marks"].'</td>
                          </tr>';
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->

              </div>
            </div>
                <div class="row">
                  <div class="col-lg-8">
                    <h4>Subject Performance</h4>
                    <div id="chart-container">
                      <canvas id="mycanvas3"></canvas>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <h4><b>Select Filter<b></h4>
                    
                    <label for="classes3">Class</label>
                    <select onchange="updateChart5()"class="form-control" id="classes3">
                     <option>All</option>
                     <?php 
                     include("queries.php");
                     foreach ($userRow6 as $key) {
                      echo '<option>'.$key["Class"].'</option>';
                    }
                    ?>
                  </select>

                  <label for="subject3">Subject</label>
                  <select onchange="updateChart6()"class="form-control" id="subject3">
                    <option value="All">All</option>
                    <option value="English">English</option>
                    <option value="Maths">Maths</option>
                    <option value="Science">Science</option>
                    <option value="Social Science">Social Science</option>
                    <option value="GK">GK</option>
                    <option value="EVS">EVS</option>
                    <option value="Hindi">Hindi</option>

                  </select>



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
      <script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <!-- ChartJS -->
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <!-- AdminLTE for demo purposes -->
        <script src="../dist/js/demo.js"></script>
        <script type="text/javascript">
        var currentChart;
  function updateChart() {
   if(currentChart){currentChart.destroy();}
   $('#mycanvas').replaceWith('<canvas id="mycanvas"></canvas>');
   var classes = $("#classes").val();
   var subject = $("#subject").val();
   var select = $('#subject').empty();
   $.get('filterscript2.php', {classes: classes}, function(data) {
    var obj = JSON.parse(data);
    $('<option value="All">All</option>').appendTo(select);

    for(var i in obj) {
     $('<option>' + obj[i].Subject + '</option>').appendTo(select);
   }
 });

   $.ajax({
    url: "subject_performance_query.php?classes="+classes+"&subject="+subject,
    method: "GET",
    success: function(data) {
      var avg__finalgrades = [];
      var itemnames = [];
      var obj = JSON.parse(data);
      for(var i in obj) {
        avg__finalgrades.push(obj[i].avg__Marks);
        itemnames.push(obj[i].Term);
      }
      var ctx= document.getElementById('mycanvas').getContext("2d");
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: itemnames,
          datasets: [{
            label: 'Marks ',
            data: avg__finalgrades,
            backgroundColor: 'rgba(91, 144, 191, 1)',
            borderColor:'rgba(91, 144, 191, 1)',
            borderWidth: 1
          }]
        },
        options: {
          responsive:true,
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero:true
              }
            }]            
          }
        }

      });
            // myChart.data.datasets=avg__finalgrades;
            // myChart.data.labels=itemnames;
            // myChart.update();

          },

          error: function(data) {
          }
        });
$.ajax({
    url: "subject_performance_query2.php?classes="+classes+"&subject="+subject,
    method: "GET",
    success: function(data) {
      var table = document.getElementById("example1");
      var table2 = document.getElementById("tbody");
      table2.innerHTML = "";
      var obj = JSON.parse(data);
      for(var i in obj) {
        
        var tr = document.createElement('tr');   
        var td1 = document.createElement('td');
        var td2 = document.createElement('td');
        
        var text1 = document.createTextNode(obj[i].Student_Name);
          obj[i].avg__Marks=parseFloat(obj[i].avg__Marks).toFixed(2);

        var text2 = document.createTextNode(obj[i].avg__Marks);
        td1.appendChild(text1);
        td2.appendChild(text2);
       
        tr.appendChild(td1);
        tr.appendChild(td2);
       
        table2.appendChild(tr);
      }
    },
    error: function(data) {
    }
  });
}
        </script>
<script type="text/javascript">
       var currentChart;
       function updateChart2() {
         if(currentChart){currentChart.destroy();}
         $('#mycanvas').replaceWith('<canvas id="mycanvas"></canvas>');

         var classes = $("#classes").val();
         var subject = $("#subject").val();
         $.ajax({
          url: "subject_performance_query.php?classes="+classes+"&subject="+subject,
          method: "GET",
          success: function(data) {
            var avg__finalgrades = [];
            var itemnames = [];
            var obj = JSON.parse(data);
            for(var i in obj) {
          obj[i].avg__Marks=parseFloat(obj[i].avg__Marks).toFixed(2);

              avg__finalgrades.push(obj[i].avg__Marks);
              itemnames.push(obj[i].Term);
            }
            var ctx= document.getElementById('mycanvas').getContext("2d");
            var myChart3 = new Chart(ctx, {
              type: 'bar',
              data: {
                labels: itemnames,
                datasets: [{
                  label: 'Marks ',
                  backgroundColor: 'rgba(91, 144, 191, 1)',
                  borderColor:'rgba(91, 144, 191, 1)',
                  data: avg__finalgrades,
                  borderWidth: 1
                }]
              },
              options: {
                responsive:true,
                scales: {
                  yAxes: [{
                    ticks: {
                      beginAtZero:true
                    }
                  }],
                  xAxes:[]            
                }
              }

            });
          },  
          error: function(data) {
          }
        });
$.ajax({
    url: "subject_performance_query2.php?classes="+classes+"&subject="+subject,
    method: "GET",
    success: function(data) {
      var table = document.getElementById("example1");
      var table2 = document.getElementById("tbody");
      table2.innerHTML = "";
      var obj = JSON.parse(data);
      for(var i in obj) {
        
        var tr = document.createElement('tr');   
        var td1 = document.createElement('td');
        var td2 = document.createElement('td');
        
        var text1 = document.createTextNode(obj[i].Student_Name);
          obj[i].avg__Marks=parseFloat(obj[i].avg__Marks).toFixed(2);

        var text2 = document.createTextNode(obj[i].avg__Marks);
        td1.appendChild(text1);
        td2.appendChild(text2);
       
        tr.appendChild(td1);
        tr.appendChild(td2);
       
        table2.appendChild(tr);
      }
    },
    error: function(data) {
    }
  });
}

</script>


<script type="text/javascript">
        var currentChart;
  function updateChart5() {
   if(currentChart){currentChart.destroy();}
   $('#mycanvas3').replaceWith('<canvas id="mycanvas3"></canvas>');
   var classes = $("#classes3").val();
   var subject = $("#subject3").val();
   var select = $('#subject3').empty();
   $.get('filterscript2.php', {classes: classes}, function(data) {
    var obj = JSON.parse(data);
    $('<option value="All">All</option>').appendTo(select);
    if(obj==null)
    {
      console.log("hello");
    }
    for(var i in obj) {
     $('<option>' + obj[i].Subject + '</option>').appendTo(select);
   }
 });

   $.ajax({
    url: "subject_performance_query3.php?classes="+classes+"&subject="+subject,
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
      for(var i in obj) 
      {
        if(obj[i].avg__finalgrade!=null)
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
      }
      var uniqueNames = [];
$.each(Class, function(i, el){
    if($.inArray(el, uniqueNames) === -1) uniqueNames.push(el);
});  
      var ctx= document.getElementById('mycanvas3').getContext("2d");
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: uniqueNames,
          datasets: [
          {
            label: 'PT 1',
            data: PT_1,
            backgroundColor: 'rgba(91, 144, 191, 1)',
            borderColor: 'rgba(91, 144, 191, 1)',
            borderWidth: 0.1
          },
          {
            label: 'PT 2',
            data: PT_2,
            backgroundColor: 'rgba(91, 254, 91, 1)',
            borderColor: 'rgba(91, 254, 91, 1)',
            borderWidth: 0.1
          },
          {
            label: 'PT 3',
            data: PT_3,
            backgroundColor: 'rgba(231, 54, 231, 1)',
            borderColor: 'rgba(231, 54,231, 1)',
            borderWidth: 0.1
          },
          {
            label: 'PT 4',
            data: PT_4,
            backgroundColor: 'rgba(131, 154, 31, 1)',
            borderColor: 'rgba(131, 154,31, 1)',
            borderWidth: 0.1
          },
          {
            label:'NS 1',
            data: NS_1,
            backgroundColor:'rgba(141, 44, 191, 1)',
            borderColor:'rgba(141, 44,191, 1)',
            borderWidth: 0.1
          },
          {
            label: 'SEA 1',
            data: SEA1,
            backgroundColor: 'rgba(66, 73, 73, 1)',
            borderColor: 'rgba(66, 73, 73, 1)',
            borderWidth: 0.1
          },
          {
            label: 'Half Yearly',
            data: half_yearly,
            backgroundColor: 'rgba(241, 196, 15, 1)',
            borderColor: 'rgba(241, 196, 15, 1)',
            borderWidth: 0.1
          },
          ]
        },
        options: {
          responsive:true,
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

}
        </script>
<script type="text/javascript">
       var currentChart;
       function updateChart6() {
         if(currentChart){currentChart.destroy();}
         $('#mycanvas3').replaceWith('<canvas id="mycanvas3"></canvas>');

         var classes = $("#classes3").val();
         var subject = $("#subject3").val();
         $.ajax({
    url: "subject_performance_query3.php?classes="+classes+"&subject="+subject,
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
        if(obj[i].avg__finalgrade!=null)
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
      }
      var uniqueNames = [];
$.each(Class, function(i, el){
    if($.inArray(el, uniqueNames) === -1) uniqueNames.push(el);
});  
      var ctx= document.getElementById('mycanvas3').getContext("2d");
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: uniqueNames,
          datasets: [
          {
            label: 'PT 1',
            data: PT_1,
            backgroundColor: 'rgba(91, 144, 191, 1)',
            borderColor: 'rgba(91, 144, 191, 1)',
            borderWidth: 0.1
          },
          {
            label: 'PT 2',
            data: PT_2,
            backgroundColor: 'rgba(91, 254, 91, 1)',
            borderColor: 'rgba(91, 254, 91, 1)',
            borderWidth: 0.1
          },
          {
            label: 'PT 3',
            data: PT_3,
            backgroundColor: 'rgba(231, 54, 231, 1)',
            borderColor: 'rgba(231, 54,231, 1)',
            borderWidth: 0.1
          },
          {
            label: 'PT 4',
            data: PT_4,
            backgroundColor: 'rgba(131, 154, 31, 1)',
            borderColor: 'rgba(131, 154,31, 1)',
            borderWidth: 0.1
          },
          {
            label:'NS 1',
            data: NS_1,
            backgroundColor:'rgba(141, 44, 191, 1)',
            borderColor:'rgba(141, 44,191, 1)',
            borderWidth: 0.1
          },
          {
            label: 'SEA 1',
            data: SEA1,
            backgroundColor: 'rgba(66, 73, 73, 1)',
            borderColor: 'rgba(66, 73, 73, 1)',
            borderWidth: 0.1
          },
          {
            label: 'Half Yearly',
            data: half_yearly,
            backgroundColor: 'rgba(241, 196, 15, 1)',
            borderColor: 'rgba(241, 196, 15, 1)',
            borderWidth: 0.1
          },
          ]
        },
        options: {
          responsive:true,
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero:true
              }
            }],
             xAxes: [{
            barPercentage: 1
        }]           
          }
        }

      });
},  
error: function(data) {
}
});

}

</script>


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
</body>
</html>
