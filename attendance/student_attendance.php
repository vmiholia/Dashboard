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
  width: 640px;
  height:auto;

}
#chart-container2 {
  width: 640px;
  height:auto;

}

</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.js'></script>

<script>
</script>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LITTLE FLOWER| Dashboard</title>
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
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  
    <link href="bootstrap.css" rel="stylesheet" /> 
    <script type="text/javascript" src="bootstrap.min.js"></script> 
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js"></script>
    <style>
  .calender-map {
      font: 10px sans-serif;
      shape-rendering: crispEdges;
    }
    .day {
      stroke: #666;
    }
    .month {
      fill: none;
      stroke: #000;
      stroke-width: 2px;
    }
    .RdYlGn .q0-11{fill:rgb(165,0,38)}
    .RdYlGn .q1-{fill:rgb(215,48,39)}
    .RdYlGn .q2-11{fill:rgb(244,109,67)}
    .RdYlGn .q3-11{fill:rgb(253,174,97)}
    .RdYlGn .q4-11{fill:rgb(254,224,139)}
    .RdYlGn .q5-11{fill:rgb(255,255,191)}
    .RdYlGn .q6-11{fill:rgb(217,239,139)}
    .RdYlGn .q7-11{fill:rgb(166,217,106)}
    .RdYlGn .q8-11{fill:rgb(102,189,99)}
    .RdYlGn .q9-11{fill:rgb(26,152,80)}
    .RdYlGn .q10-11{fill:rgb(0,104,55)}
    </style>

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
                      <li><a href="../graphs/overall_performance.php"><i class="fa fa-circle-o"></i> Teacher</a></li>
                      <li><a href="../graphs/student_performance.php"><i class="fa fa-circle-o"></i> Student</a></li>
                      <li><a href="../graphs/subject_performance.php"><i class="fa fa-circle-o"></i> Subject</a></li>

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
                      <li><a href="../graphs/student_attendance.php"><i class="fa fa-circle-o"></i> Overall</a></li>
                      <li><a href="student_attendance.php"><i class="fa fa-circle-o"></i> Student</a></li>

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
                <h1> Attendance</h1>
              </section>
              <section class="content">

                <div class="row">
                  <div class="col-lg-12">
                    <h4>Individual Attendance</h4>
                   
                    <div class="calender-map"></div>
                        <script type="text/javascript" src="calendermap.js"></script>
                  </div>
                  <div class="col-lg-4">
                    <h4><b>Select Filter<b></h4>
                    
                    <label for="classes">Class</label>
                    <select onchange="updateChart()"class="form-control" id="classes">
                     <option></option> <?php 
                          include("../graphs/queries.php");
                          foreach ($userRow6 as $key) {
                          echo '<option>'.$key["Class"].'</option>';
                      }
                      ?>
                    </select>
                    
                    <label for="student">Student</label>
                    <select onchange="updateChart2()"class="form-control" id="student">
                      <option></option>
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
        <script type="text/javascript">
      var currentChart;
      function updateChart() {
       if(currentChart){currentChart.destroy();}
       $('.calender-map').replaceWith('<div class="calender-map"></div>');
       var select = $('#student').empty();
       var classes = $("#classes").val();
       var student = $("#student").val();
       $.get('../graphs/filterscript1.php', {classes: classes}, function(data) {
          var obj = JSON.parse(data);
          for(var i in obj) {
           $('<option value="' + obj[i].id + '">' + obj[i].Student_Name + '</option>').appendTo(select);
          }
       });
         
       
}
      /* $('#classes').on('change', updateChart)
       updateChart();
       $('#subject').on('change', updateChart)
       updateChart();
       $('#student').on('change', updateChart)
       updateChart();*/
       </script>
       <script type="text/javascript">
       var currentChart;
       function updateChart2() {
         if(currentChart){currentChart.destroy();}
         $('#mycanvas').replaceWith('<canvas id="mycanvas"></canvas>');

         var classes = $("#classes").val();
         var student = $("#student").val();
         var width = 900,
    height = 105,
    cellSize = 12; // cell size
    week_days = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat']
    month = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec']
  
var day = d3.time.format("%w"),
    week = d3.time.format("%U"),
    percent = d3.format(".1%"),
  format = d3.time.format("%Y%m%d");
  parseDate = d3.time.format("%Y%m%d").parse;
var color = d3.scale.quantize().range(["#2ECC71","#E74C3C","#F4D03F","#E67E22"]).domain([1,4])
    
var svg = d3.select(".calender-map").selectAll("svg")
    .data(d3.range(2017, 2018))
  .enter().append("svg")
    .attr("width", '100%')
    .attr("data-height", '0.5678')
    .attr("viewBox",'0 0 900 105')
    .attr("class", "RdYlGn")
  .append("g")
    .attr("transform", "translate(" + ((width - cellSize * 53) / 2) + "," + (height - cellSize * 7 - 1) + ")");

svg.append("text")
    .attr("transform", "translate(-38," + cellSize * 3.5 + ")rotate(-90)")
    .style("text-anchor", "middle")
    .text(function(d) { return d; });
 
for (var i=0; i<7; i++)
{    
svg.append("text")
    .attr("transform", "translate(-5," + cellSize*(i+1) + ")")
    .style("text-anchor", "end")
    .attr("dy", "-.25em")
    .text(function(d) { return week_days[i]; }); 
 }

var rect = svg.selectAll(".day")
    .data(function(d) { return d3.time.days(new Date(d, 0, 1), new Date(d + 1, 0, 1)); })
  .enter()
  .append("rect")
    .attr("class", "day")
    .attr("width", cellSize)
    .attr("height", cellSize)
    .attr("x", function(d) { return week(d) * cellSize; })
    .attr("y", function(d) { return day(d) * cellSize; })
    .attr("fill",'#fff')
    .datum(format);

var legend = svg.selectAll(".legend")
      .data(month)
    .enter().append("g")
      .attr("class", "legend")
      .attr("transform", function(d, i) { return "translate(" + (((i+1) * 50)+8) + ",0)"; });

legend.append("text")
   .attr("class", function(d,i){ return month[i] })
   .style("text-anchor", "end")
   .attr("dy", "-.25em")
   .text(function(d,i){ return month[i] });
   
svg.selectAll(".month")
    .data(function(d) { return d3.time.months(new Date(d, 0, 1), new Date(d + 1, 0, 1)); })
  .enter().append("path")
    .attr("class", "month")
    .attr("id", function(d,i){ return month[i] })
    .attr("d", monthPath);
                  
d3.json("q10.php?classes="+classes+"&student="+student, function(error, csv) {

  csv.forEach(function(d) {
    d.attendance_value = JSON.parse(d.attendance_value);
  });
 var attendance_value_Max = d3.max(csv, function(d) { return d.attendance_value; });
 
  var data = d3.nest()
    .key(function(d) { return d.Date.replace("-","").replace("-",""); })
    .rollup(function(d) { return  d[0].attendance_value; })
    .map(csv);
  rect.filter(function(d) { return d in data; })
    .attr("fill", function(d) { return color(data[d]); })
    .attr("data-title", function(d) {
      if(data[d]==1){ var value="Present";} 
      if(data[d]==2){ var value="Absent";} 
      if(data[d]==3){ var value="Leave";} 
      if(data[d]==4){ var value="Excused";} 
      var dd=d.substr(6,2)+'-'+d.substr(4,2)+'-'+d.substr(0,4) ; 
      return "Date : "+ (dd)+ "  "+ value;
    });   
  $("rect").tooltip({container: 'body', html: true, placement:'top'}); 
});

function numberWithCommas(x) {
    x = x.toString();
    var pattern = /(-?\d+)(\d{3})/;
    while (pattern.test(x))
        x = x.replace(pattern, "$1,$2");
    return x;
}

function monthPath(t0) {
  var t1 = new Date(t0.getFullYear(), t0.getMonth() + 1, 0),
      d0 = +day(t0), w0 = +week(t0),
      d1 = +day(t1), w1 = +week(t1);
  return "M" + (w0 + 1) * cellSize + "," + d0 * cellSize
      + "H" + w0 * cellSize + "V" + 7 * cellSize
      + "H" + w1 * cellSize + "V" + (d1 + 1) * cellSize
      + "H" + (w1 + 1) * cellSize + "V" + 0
      + "H" + (w0 + 1) * cellSize + "Z";
}

}

</script>
     </body>
     </html>
