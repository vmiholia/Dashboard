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
    url: "student_performance_query.php?classes=All&student=All",
    method: "GET",
    success: function(data) {
      var half_yearly = [];var half_yearly2 = [];
      var PT1 = [];var PT12 = [];
      var PT2 = [];var PT22 = [];
      var PT3 = [];var PT32 = [];
      var PT4 = [];var PT42 = [];
      var English=[];var English2=[];
      var Maths=[];var Maths2=[];
      var Hindi=[];var Hindi2=[];
      var EVS=[];var EVS2=[];
      var GK=[];var GK2=[];
      var SS=[];var SS2=[];
      var Science=[];var Science2=[];
      var term_name=[];
      var obj = JSON.parse(data);
      for(var i in obj) 
      {
        if(obj[i].avg__Marks!=null){
          obj[i].avg__finalgrade=parseFloat(obj[i].avg__finalgrade).toFixed(2);
          obj[i].avg__Marks=parseFloat(obj[i].avg__Marks).toFixed(2);

          if(obj[i].Term=="PT 1"){
            if(obj[i].Subject=="English")
            {
              term_name.push(obj[i].Term);
              English.push(obj[i].avg__Marks);
              English2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="EVS")
            {
              EVS2.push(obj[i].Term);
              term_name.push(obj[i].Term);
              EVS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="GK")
            {
              term_name.push(obj[i].Term);
              GK.push(obj[i].avg__Marks);
              GK2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Hindi")
            {
              term_name.push(obj[i].Term);
              Hindi.push(obj[i].avg__Marks);
              Hindi2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Maths")
            {
              term_name.push(obj[i].Term);
              Maths.push(obj[i].avg__Marks);
              Maths2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Social Science")
            {
              term_name.push(obj[i].Term);
              SS.push(obj[i].avg__Marks);
              SS2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Science")
            {
              term_name.push(obj[i].Term);
              Science.push(obj[i].avg__Marks);
              Science2.push(obj[i].Term);
            }
          }
          else if(obj[i].Term=="PT 2"){

            if(obj[i].Subject=="English")
            {
              term_name.push(obj[i].Term);
              English.push(obj[i].avg__Marks);
              English2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="EVS")
            {
              EVS2.push(obj[i].Term);
              term_name.push(obj[i].Term);
              EVS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="GK")
            {
              term_name.push(obj[i].Term);
              GK.push(obj[i].avg__Marks);
              GK2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Hindi")
            {
              term_name.push(obj[i].Term);
              Hindi.push(obj[i].avg__Marks);
              Hindi2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Maths")
            {
              term_name.push(obj[i].Term);
              Maths.push(obj[i].avg__Marks);
              Maths2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Social Science")
            {
              term_name.push(obj[i].Term);
              SS.push(obj[i].avg__Marks);
              SS2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Science")
            {
              term_name.push(obj[i].Term);
              Science.push(obj[i].avg__Marks);
              Science2.push(obj[i].Term);
            }
          }
          else if(obj[i].Term=="PT 3"){

            if(obj[i].Subject=="English")
            {
              term_name.push(obj[i].Term);
              English.push(obj[i].avg__Marks);
              English2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="EVS")
            {
              EVS2.push(obj[i].Term);
              term_name.push(obj[i].Term);
              EVS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="GK")
            {
              term_name.push(obj[i].Term);
              GK.push(obj[i].avg__Marks);
              GK2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Hindi")
            {
              term_name.push(obj[i].Term);
              Hindi.push(obj[i].avg__Marks);
              Hindi2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Maths")
            {
              term_name.push(obj[i].Term);
              Maths.push(obj[i].avg__Marks);
              Maths2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Social Science")
            {
              term_name.push(obj[i].Term);
              SS.push(obj[i].avg__Marks);
              SS2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Science")
            {
              term_name.push(obj[i].Term);
              Science.push(obj[i].avg__Marks);
              Science2.push(obj[i].Term);
            }
          }
          else if(obj[i].Term=="PT 4"){

            if(obj[i].Subject=="English")
            {
              term_name.push(obj[i].Term);
              English.push(obj[i].avg__Marks);
              English2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="EVS")
            {
              EVS2.push(obj[i].Term);
              term_name.push(obj[i].Term);
              EVS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="GK")
            {
              term_name.push(obj[i].Term);
              GK.push(obj[i].avg__Marks);
              GK2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Hindi")
            {
              term_name.push(obj[i].Term);
              Hindi.push(obj[i].avg__Marks);
              Hindi2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Maths")
            {
              term_name.push(obj[i].Term);
              Maths.push(obj[i].avg__Marks);
              Maths2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Social Science")
            {
              term_name.push(obj[i].Term);
              SS.push(obj[i].avg__Marks);
              SS2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Science")
            {
              term_name.push(obj[i].Term);
              Science.push(obj[i].avg__Marks);
              Science2.push(obj[i].Term);
            }
          }
          else if(obj[i].Term=="NS 1"){

            if(obj[i].Subject=="English")
            {
              term_name.push(obj[i].Term);
              English.push(obj[i].avg__Marks);
              English2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="EVS")
            {
              EVS2.push(obj[i].Term);
              term_name.push(obj[i].Term);
              EVS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="GK")
            {
              term_name.push(obj[i].Term);
              GK.push(obj[i].avg__Marks);
              GK2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Hindi")
            {
              term_name.push(obj[i].Term);
              Hindi.push(obj[i].avg__Marks);
              Hindi2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Maths")
            {
              term_name.push(obj[i].Term);
              Maths.push(obj[i].avg__Marks);
              Maths2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Social Science")
            {
              term_name.push(obj[i].Term);
              SS.push(obj[i].avg__Marks);
              SS2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Science")
            {
              term_name.push(obj[i].Term);
              Science.push(obj[i].avg__Marks);
              Science2.push(obj[i].Term);
            }
          }
          else if(obj[i].Term=="SEA 1"){

            if(obj[i].Subject=="English")
            {
              term_name.push(obj[i].Term);
              English.push(obj[i].avg__Marks);
              English2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="EVS")
            {
              EVS2.push(obj[i].Term);
              term_name.push(obj[i].Term);
              EVS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="GK")
            {
              term_name.push(obj[i].Term);
              GK.push(obj[i].avg__Marks);
              GK2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Hindi")
            {
              term_name.push(obj[i].Term);
              Hindi.push(obj[i].avg__Marks);
              Hindi2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Maths")
            {
              term_name.push(obj[i].Term);
              Maths.push(obj[i].avg__Marks);
              Maths2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Social Science")
            {
              term_name.push(obj[i].Term);
              SS.push(obj[i].avg__Marks);
              SS2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Science")
            {
              term_name.push(obj[i].Term);
              Science.push(obj[i].avg__Marks);
              Science2.push(obj[i].Term);
            }
          }
          else if(obj[i].Term=="Half Yearly"){

            if(obj[i].Subject=="English")
            {
              term_name.push(obj[i].Term);
              English.push(obj[i].avg__Marks);
              English2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="EVS")
            {
              EVS2.push(obj[i].Term);
              term_name.push(obj[i].Term);
              EVS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="GK")
            {
              term_name.push(obj[i].Term);
              GK.push(obj[i].avg__Marks);
              GK2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Hindi")
            {
              term_name.push(obj[i].Term);
              Hindi.push(obj[i].avg__Marks);
              Hindi2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Maths")
            {
              term_name.push(obj[i].Term);
              Maths.push(obj[i].avg__Marks);
              Maths2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Social Science")
            {
              term_name.push(obj[i].Term);
              SS.push(obj[i].avg__Marks);
              SS2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Science")
            {
              term_name.push(obj[i].Term);
              Science.push(obj[i].avg__Marks);
              Science2.push(obj[i].Term);
            }
          }
        }
      }
var uniqueNames = [];
$.each(term_name, function(i, el){
    if($.inArray(el, uniqueNames) === -1) uniqueNames.push(el);
}); 
      var ctx= document.getElementById('mycanvas').getContext("2d");
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: uniqueNames,
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
          maintainAspectRatio:true,
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero:true
              }
            }],
            xAxes :[{
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
              <div class="pull-left image">
           <img src="../dist/img/lfps_logo.png" class="img-circle" alt="User Image">

              </div>
              <div class="pull-left info">
                <p><?php echo $userRow['firstname']." ".$userRow['lastname'];?></p>
              </div>
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
                      <li><a href="../attendance/student_attendance.php"><i class="fa fa-circle-o"></i> Student</a></li>
                      <li><a href="student_attendance.php"><i class="fa fa-circle-o"></i> Overall</a></li>

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
                <h1> Student Performance</h1>
              </section>
              <section class="content">

                <div class="row">
                  <div class="col-lg-8">
                    <h4>Subject Wise Average Marks</h4>
                    <div class="chart tab-pane active" id="chart-container">
                      <canvas id="mycanvas"></canvas>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <h4>Select Filter</h4>
                    
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

                  <label for="student">Student</label>
                  <select onchange="updateChart2()"class="form-control" id="student">
                    <option value="All">All</option>
                  </select>



                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                 <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Student's Information</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Subject</th>
                          <th>Term Name</th>
                          <th>Average Mrks</th>
                        </tr>
                      </thead>
                      <tbody id="tbody">
                        <?php
                        include("queries.php");
                        foreach ($userRow5 as $key) {
                          echo '
                          <tr>
                          <td>'.$key["Student_Name"].'</td>
                          <td>'.$key["Subject"].'</td>
                          <td>'.$key["term_name"].'</td>
                          <td>'.$key["avg__finalgrade"].'</td>
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
  <script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

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

  <script type="text/javascript">
  var currentChart;
  function updateChart() {
   if(currentChart){currentChart.destroy();}
   $('#mycanvas').replaceWith('<canvas id="mycanvas"></canvas>');
   var sid=[];
   var Student_Name=[];
   var classes = $("#classes").val();
   var student = $("#student").val();
   var select = $('#student').empty();
   $.get('filterscript1.php', {classes: classes}, function(data) {
    var obj = JSON.parse(data);
    $('<option value="All">All</option>').appendTo(select);

    for(var i in obj) {
     $('<option>' + obj[i].Student_Name + '</option>').appendTo(select);
   }
 });

   $.ajax({
    url: "student_performance_query.php?classes="+classes+"&student="+student,
    method: "GET",
    success: function(data) {
      var half_yearly = [];var half_yearly2 = [];
      var PT1 = [];var PT12 = [];
      var PT2 = [];var PT22 = [];
      var PT3 = [];var PT32 = [];
      var PT4 = [];var PT42 = [];
      var English=[];var English2=[];
      var Maths=[];var Maths2=[];
      var Hindi=[];var Hindi2=[];
      var EVS=[];var EVS2=[];
      var GK=[];var GK2=[];
      var SS=[];var SS2=[];
      var Science=[];var Science2=[];
      var term_name=[];
      var obj = JSON.parse(data);
      for(var i in obj) 
      {
        if(obj[i].avg__Marks!=null){
          obj[i].avg__Marks=parseFloat(obj[i].avg__Marks).toFixed(2);

          if(obj[i].Term=="PT 1"){
            if(obj[i].Subject=="English")
            {
              term_name.push(obj[i].Term);
              English.push(obj[i].avg__Marks);
              English2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="EVS")
            {
              EVS2.push(obj[i].Term);
              term_name.push(obj[i].Term);
              EVS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="GK")
            {
              term_name.push(obj[i].Term);
              GK.push(obj[i].avg__Marks);
              GK2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Hindi")
            {
              term_name.push(obj[i].Term);
              Hindi.push(obj[i].avg__Marks);
              Hindi2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Maths")
            {
              term_name.push(obj[i].Term);
              Maths.push(obj[i].avg__Marks);
              Maths2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Social Science")
            {
              term_name.push(obj[i].Term);
              SS.push(obj[i].avg__Marks);
              SS2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Science")
            {
              term_name.push(obj[i].Term);
              Science.push(obj[i].avg__Marks);
              Science2.push(obj[i].Term);
            }
          }
          else if(obj[i].Term=="PT 2"){

            if(obj[i].Subject=="English")
            {
              term_name.push(obj[i].Term);
              English.push(obj[i].avg__Marks);
              English2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="EVS")
            {
              EVS2.push(obj[i].Term);
              term_name.push(obj[i].Term);
              EVS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="GK")
            {
              term_name.push(obj[i].Term);
              GK.push(obj[i].avg__Marks);
              GK2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Hindi")
            {
              term_name.push(obj[i].Term);
              Hindi.push(obj[i].avg__Marks);
              Hindi2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Maths")
            {
              term_name.push(obj[i].Term);
              Maths.push(obj[i].avg__Marks);
              Maths2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Social Science")
            {
              term_name.push(obj[i].Term);
              SS.push(obj[i].avg__Marks);
              SS2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Science")
            {
              term_name.push(obj[i].Term);
              Science.push(obj[i].avg__Marks);
              Science2.push(obj[i].Term);
            }
          }
          else if(obj[i].Term=="PT 3"){

            if(obj[i].Subject=="English")
            {
              term_name.push(obj[i].Term);
              English.push(obj[i].avg__Marks);
              English2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="EVS")
            {
              EVS2.push(obj[i].Term);
              term_name.push(obj[i].Term);
              EVS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="GK")
            {
              term_name.push(obj[i].Term);
              GK.push(obj[i].avg__Marks);
              GK2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Hindi")
            {
              term_name.push(obj[i].Term);
              Hindi.push(obj[i].avg__Marks);
              Hindi2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Maths")
            {
              term_name.push(obj[i].Term);
              Maths.push(obj[i].avg__Marks);
              Maths2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Social Science")
            {
              term_name.push(obj[i].Term);
              SS.push(obj[i].avg__Marks);
              SS2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Science")
            {
              term_name.push(obj[i].Term);
              Science.push(obj[i].avg__Marks);
              Science2.push(obj[i].Term);
            }
          }
          else if(obj[i].Term=="PT 4"){

            if(obj[i].Subject=="English")
            {
              term_name.push(obj[i].Term);
              English.push(obj[i].avg__Marks);
              English2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="EVS")
            {
              EVS2.push(obj[i].Term);
              term_name.push(obj[i].Term);
              EVS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="GK")
            {
              term_name.push(obj[i].Term);
              GK.push(obj[i].avg__Marks);
              GK2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Hindi")
            {
              term_name.push(obj[i].Term);
              Hindi.push(obj[i].avg__Marks);
              Hindi2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Maths")
            {
              term_name.push(obj[i].Term);
              Maths.push(obj[i].avg__Marks);
              Maths2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Social Science")
            {
              term_name.push(obj[i].Term);
              SS.push(obj[i].avg__Marks);
              SS2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Science")
            {
              term_name.push(obj[i].Term);
              Science.push(obj[i].avg__Marks);
              Science2.push(obj[i].Term);
            }
          }
          else if(obj[i].Term=="NS 1"){

            if(obj[i].Subject=="English")
            {
              term_name.push(obj[i].Term);
              English.push(obj[i].avg__Marks);
              English2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="EVS")
            {
              EVS2.push(obj[i].Term);
              term_name.push(obj[i].Term);
              EVS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="GK")
            {
              term_name.push(obj[i].Term);
              GK.push(obj[i].avg__Marks);
              GK2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Hindi")
            {
              term_name.push(obj[i].Term);
              Hindi.push(obj[i].avg__Marks);
              Hindi2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Maths")
            {
              term_name.push(obj[i].Term);
              Maths.push(obj[i].avg__Marks);
              Maths2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Social Science")
            {
              term_name.push(obj[i].Term);
              SS.push(obj[i].avg__Marks);
              SS2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Science")
            {
              term_name.push(obj[i].Term);
              Science.push(obj[i].avg__Marks);
              Science2.push(obj[i].Term);
            }
          }
          else if(obj[i].Term=="SEA 1"){

            if(obj[i].Subject=="English")
            {
              term_name.push(obj[i].Term);
              English.push(obj[i].avg__Marks);
              English2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="EVS")
            {
              EVS2.push(obj[i].Term);
              term_name.push(obj[i].Term);
              EVS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="GK")
            {
              term_name.push(obj[i].Term);
              GK.push(obj[i].avg__Marks);
              GK2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Hindi")
            {
              term_name.push(obj[i].Term);
              Hindi.push(obj[i].avg__Marks);
              Hindi2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Maths")
            {
              term_name.push(obj[i].Term);
              Maths.push(obj[i].avg__Marks);
              Maths2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Social Science")
            {
              term_name.push(obj[i].Term);
              SS.push(obj[i].avg__Marks);
              SS2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Science")
            {
              term_name.push(obj[i].Term);
              Science.push(obj[i].avg__Marks);
              Science2.push(obj[i].Term);
            }
          }
          else if(obj[i].Term=="Half Yearly"){

            if(obj[i].Subject=="English")
            {
              term_name.push(obj[i].Term);
              English.push(obj[i].avg__Marks);
              English2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="EVS")
            {
              EVS2.push(obj[i].Term);
              term_name.push(obj[i].Term);
              EVS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="GK")
            {
              term_name.push(obj[i].Term);
              GK.push(obj[i].avg__Marks);
              GK2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Hindi")
            {
              term_name.push(obj[i].Term);
              Hindi.push(obj[i].avg__Marks);
              Hindi2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Maths")
            {
              term_name.push(obj[i].Term);
              Maths.push(obj[i].avg__Marks);
              Maths2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Social Science")
            {
              term_name.push(obj[i].Term);
              SS.push(obj[i].avg__Marks);
              SS2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Science")
            {
              term_name.push(obj[i].Term);
              Science.push(obj[i].avg__Marks);
              Science2.push(obj[i].Term);
            }
          }
        }
      }
var uniqueNames = [];
$.each(term_name, function(i, el){
    if($.inArray(el, uniqueNames) === -1) uniqueNames.push(el);
}); 
      var ctx= document.getElementById('mycanvas').getContext("2d");
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: uniqueNames,
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
          maintainAspectRatio:true,
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero:true
              }
            }],
            xAxes :[{
              barPercentage: 1
            }]            
          }
        }

      });
},   
error: function(data) {
}
});
$.ajax({
    url: "student_performance_table_query.php?classes="+classes+"&student="+student,
    method: "GET",
    success: function(data) {
      console.log(data);
      var obj = JSON.parse(data);
        var table = document.getElementById("example1");
        var table2 = document.getElementById("tbody");      
        table2.innerHTML = "";
      for(var i in obj) {
        var tr = document.createElement('tr');   
        var td1 = document.createElement('td');
        var td2 = document.createElement('td');
        var td3 = document.createElement('td');
        var td4 = document.createElement('td');
        var text1 = document.createTextNode(obj[i].Student_Name);
        var text2 = document.createTextNode(obj[i].Subject);
        var text3 = document.createTextNode(obj[i].term_name);
          obj[i].avg__Marks=parseFloat(obj[i].avg__Marks).toFixed(2);

        var text4 = document.createTextNode(obj[i].avg__finalgrade);
        td1.appendChild(text1);
        td2.appendChild(text2);
        td3.appendChild(text3);
        td4.appendChild(text4);
        tr.appendChild(td1);
        tr.appendChild(td2);
        tr.appendChild(td3);
        tr.appendChild(td4);
        table2.appendChild(tr);
        /*var row = table.insertRow(1);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        
        cell1.innerHTML = obj[i].Student_Name;
        cell2.innerHTML = obj[i].Subject;
        cell3.innerHTML = obj[i].term_name;
        cell4.innerHTML = obj[i].avg__finalgrade;
        */
      }
    },
    error: function(data) {
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
         $.ajax({
          url: "student_performance_query.php?classes="+classes+"&student="+student,
          method: "GET",
          success: function(data) {
      var half_yearly = [];var half_yearly2 = [];
      var PT1 = [];var PT12 = [];
      var PT2 = [];var PT22 = [];
      var PT3 = [];var PT32 = [];
      var PT4 = [];var PT42 = [];
      var English=[];var English2=[];
      var Maths=[];var Maths2=[];
      var Hindi=[];var Hindi2=[];
      var EVS=[];var EVS2=[];
      var GK=[];var GK2=[];
      var SS=[];var SS2=[];
      var Science=[];var Science=[];
      var term_name=[];
      var obj = JSON.parse(data);
      for(var i in obj) 
      {
        if(obj[i].avg__Marks!=null){
          obj[i].avg__Marks=parseFloat(obj[i].avg__Marks).toFixed(2);

          if(obj[i].Term=="PT 1"){
            if(obj[i].Subject=="English")
            {
              term_name.push(obj[i].Term);
              English.push(obj[i].avg__Marks);
              English2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="EVS")
            {
              EVS2.push(obj[i].Term);
              term_name.push(obj[i].Term);
              EVS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="GK")
            {
              term_name.push(obj[i].Term);
              GK.push(obj[i].avg__Marks);
              GK2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Hindi")
            {
              term_name.push(obj[i].Term);
              Hindi.push(obj[i].avg__Marks);
              Hindi2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Maths")
            {
              term_name.push(obj[i].Term);
              Maths.push(obj[i].avg__Marks);
              Maths2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Social Science")
            {
              term_name.push(obj[i].Term);
              SS.push(obj[i].avg__Marks);
              SS2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Science")
            {
              term_name.push(obj[i].Term);
              Science.push(obj[i].avg__Marks);
              Science2.push(obj[i].Term);
            }
          }
          else if(obj[i].Term=="PT 2"){

            if(obj[i].Subject=="English")
            {
              term_name.push(obj[i].Term);
              English.push(obj[i].avg__Marks);
              English2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="EVS")
            {
              EVS2.push(obj[i].Term);
              term_name.push(obj[i].Term);
              EVS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="GK")
            {
              term_name.push(obj[i].Term);
              GK.push(obj[i].avg__Marks);
              GK2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Hindi")
            {
              term_name.push(obj[i].Term);
              Hindi.push(obj[i].avg__Marks);
              Hindi2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Maths")
            {
              term_name.push(obj[i].Term);
              Maths.push(obj[i].avg__Marks);
              Maths2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Social Science")
            {
              term_name.push(obj[i].Term);
              SS.push(obj[i].avg__Marks);
              SS2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Science")
            {
              term_name.push(obj[i].Term);
              Science.push(obj[i].avg__Marks);
              Science2.push(obj[i].Term);
            }
          }
          else if(obj[i].Term=="PT 3"){

            if(obj[i].Subject=="English")
            {
              term_name.push(obj[i].Term);
              English.push(obj[i].avg__Marks);
              English2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="EVS")
            {
              EVS2.push(obj[i].Term);
              term_name.push(obj[i].Term);
              EVS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="GK")
            {
              term_name.push(obj[i].Term);
              GK.push(obj[i].avg__Marks);
              GK2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Hindi")
            {
              term_name.push(obj[i].Term);
              Hindi.push(obj[i].avg__Marks);
              Hindi2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Maths")
            {
              term_name.push(obj[i].Term);
              Maths.push(obj[i].avg__Marks);
              Maths2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Social Science")
            {
              term_name.push(obj[i].Term);
              SS.push(obj[i].avg__Marks);
              SS2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Science")
            {
              term_name.push(obj[i].Term);
              Science.push(obj[i].avg__Marks);
              Science2.push(obj[i].Term);
            }
          }
          else if(obj[i].Term=="PT 4"){

            if(obj[i].Subject=="English")
            {
              term_name.push(obj[i].Term);
              English.push(obj[i].avg__Marks);
              English2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="EVS")
            {
              EVS2.push(obj[i].Term);
              term_name.push(obj[i].Term);
              EVS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="GK")
            {
              term_name.push(obj[i].Term);
              GK.push(obj[i].avg__Marks);
              GK2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Hindi")
            {
              term_name.push(obj[i].Term);
              Hindi.push(obj[i].avg__Marks);
              Hindi2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Maths")
            {
              term_name.push(obj[i].Term);
              Maths.push(obj[i].avg__Marks);
              Maths2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Social Science")
            {
              term_name.push(obj[i].Term);
              SS.push(obj[i].avg__Marks);
              SS2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Science")
            {
              term_name.push(obj[i].Term);
              Science.push(obj[i].avg__Marks);
              Science2.push(obj[i].Term);
            }
          }
          else if(obj[i].Term=="NS 1"){

            if(obj[i].Subject=="English")
            {
              term_name.push(obj[i].Term);
              English.push(obj[i].avg__Marks);
              English2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="EVS")
            {
              EVS2.push(obj[i].Term);
              term_name.push(obj[i].Term);
              EVS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="GK")
            {
              term_name.push(obj[i].Term);
              GK.push(obj[i].avg__Marks);
              GK2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Hindi")
            {
              term_name.push(obj[i].Term);
              Hindi.push(obj[i].avg__Marks);
              Hindi2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Maths")
            {
              term_name.push(obj[i].Term);
              Maths.push(obj[i].avg__Marks);
              Maths2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Social Science")
            {
              term_name.push(obj[i].Term);
              SS.push(obj[i].avg__Marks);
              SS2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Science")
            {
              term_name.push(obj[i].Term);
              Science.push(obj[i].avg__Marks);
              Science2.push(obj[i].Term);
            }
          }
          else if(obj[i].Term=="SEA 1"){

            if(obj[i].Subject=="English")
            {
              term_name.push(obj[i].Term);
              English.push(obj[i].avg__Marks);
              English2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="EVS")
            {
              EVS2.push(obj[i].Term);
              term_name.push(obj[i].Term);
              EVS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="GK")
            {
              term_name.push(obj[i].Term);
              GK.push(obj[i].avg__Marks);
              GK2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Hindi")
            {
              term_name.push(obj[i].Term);
              Hindi.push(obj[i].avg__Marks);
              Hindi2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Maths")
            {
              term_name.push(obj[i].Term);
              Maths.push(obj[i].avg__Marks);
              Maths2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Social Science")
            {
              term_name.push(obj[i].Term);
              SS.push(obj[i].avg__Marks);
              SS2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Science")
            {
              term_name.push(obj[i].Term);
              Science.push(obj[i].avg__Marks);
              Science2.push(obj[i].Term);
            }
          }
          else if(obj[i].Term=="Half Yearly"){

            if(obj[i].Subject=="English")
            {
              term_name.push(obj[i].Term);
              English.push(obj[i].avg__Marks);
              English2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="EVS")
            {
              EVS2.push(obj[i].Term);
              term_name.push(obj[i].Term);
              EVS.push(obj[i].avg__Marks);
            }
            else if(obj[i].Subject=="GK")
            {
              term_name.push(obj[i].Term);
              GK.push(obj[i].avg__Marks);
              GK2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Hindi")
            {
              term_name.push(obj[i].Term);
              Hindi.push(obj[i].avg__Marks);
              Hindi2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Maths")
            {
              term_name.push(obj[i].Term);
              Maths.push(obj[i].avg__Marks);
              Maths2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Social Science")
            {
              term_name.push(obj[i].Term);
              SS.push(obj[i].avg__Marks);
              SS2.push(obj[i].Term);
            }
            else if(obj[i].Subject=="Science")
            {
              term_name.push(obj[i].Term);
              Science.push(obj[i].avg__Marks);
              Science2.push(obj[i].Term);
            }
          }
        }
      }
var uniqueNames = [];
$.each(term_name, function(i, el){
    if($.inArray(el, uniqueNames) === -1) uniqueNames.push(el);
}); 
      var ctx= document.getElementById('mycanvas').getContext("2d");
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: uniqueNames,
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
          maintainAspectRatio:true,
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero:true
              }
            }],
            xAxes :[{
              barPercentage: 1
            }]            
          }
        }

      });
},  
error: function(data) {
}
});
$.ajax({
    url: "student_performance_table_query.php?classes="+classes+"&student="+student,
    method: "GET",
    success: function(data) {
      console.log(data);
      var obj = JSON.parse(data);
        var table = document.getElementById("example1");
        var table2 = document.getElementById("tbody");      
        table2.innerHTML = "";
      for(var i in obj) {
        var tr = document.createElement('tr');   
        var td1 = document.createElement('td');
        var td2 = document.createElement('td');
        var td3 = document.createElement('td');
        var td4 = document.createElement('td');
        var text1 = document.createTextNode(obj[i].Student_Name);
        var text2 = document.createTextNode(obj[i].Subject);
        var text3 = document.createTextNode(obj[i].term_name);
          obj[i].avg__Marks=parseFloat(obj[i].avg__Marks).toFixed(2);

        var text4 = document.createTextNode(obj[i].avg__finalgrade);
        td1.appendChild(text1);
        td2.appendChild(text2);
        td3.appendChild(text3);
        td4.appendChild(text4);
        tr.appendChild(td1);
        tr.appendChild(td2);
        tr.appendChild(td3);
        tr.appendChild(td4);
        table2.appendChild(tr);
        /*var row = table.insertRow(1);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        
        cell1.innerHTML = obj[i].Student_Name;
        cell2.innerHTML = obj[i].Subject;
        cell3.innerHTML = obj[i].term_name;
        cell4.innerHTML = obj[i].avg__finalgrade;
        */
      }
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
