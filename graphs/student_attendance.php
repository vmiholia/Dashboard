<?php
require_once("../session.php");
require_once("../class.user.php");
$auth_user = new USER();
$username = $_SESSION['username'];
$stmt = $auth_user->runQuery("SELECT * FROM mdl_user WHERE username=:username");
$stmt->execute(array(":username"=>$username));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
include("queries.php");

?>
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
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
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
  <style type="text/css">
  #chart-container {
    position: relative;
    height:auto;
  }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.min.js"></script>
  <script src="../chart.js"></script>
  <script>
  $(document).ready(function(){
    var today = new Date();
    var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();

if(dd<10) {
  dd = '0'+dd
} 

if(mm<10) {
  mm = '0'+mm
} 

today = yyyy + '-' + mm + '-' + dd;
$.ajax({
  url: "class_daily_attendance.php?classes=All&dates="+today,
  method: "GET",
  success: function(data) {
    var max__Present_count = [];
    var max__absent_count = [];
    var max__Late_count = [];
    var max__Excuse_count = [];
    var classs = [];
    var obj = JSON.parse(data);
    for(var i in obj) {
      max__Present_count.push(obj[i].sum__Present);
      max__absent_count.push(obj[i].sum__Absent);
      max__Late_count.push(obj[i].sum__Late);
      max__Excuse_count.push(obj[i].sum__Excuse);
      classs.push(obj[i].classs);
    }
    var ctx= document.getElementById('mycanvas');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: classs,
          datasets: [
            {
              label: 'Present count',
              data: max__Present_count,
              backgroundColor:'#34bf49',
              borderColor:'#34bf49',

              borderWidth: 1
            },
            {
              label: 'absent count',
              data: max__absent_count,
              backgroundColor:'#ff4c4c',
              borderColor:'#ff4c4c',
              borderWidth: 1
            },
            {
              label: 'Late count',
              data: max__Late_count,
              backgroundColor:'#ffc168',
              borderColor:'#ffc168',
              borderWidth: 1
            },
            {
              label: 'Excuse count',
              data: max__Excuse_count,
              backgroundColor:'#b8b5b5',
              borderColor:'#b8b5b5',
              borderWidth: 1
            }]
      },
      options: {
        maintainAspectRatio: false,
        legend: {
          display: true,
          labels: {
            fontColor: 'rgb(255, 99, 132)'
          }
        },
        scales: {
          yAxes: [{
            ticks: {
              mincount:20,
              beginAtZero:true
            },
            stacked:true
          }],
          xAxes: [{
            ticks: {
              beginAtZero:true
            },
            stacked:true
          }]
        }
      }
    });
},
error: function(data) {
      // /console.log(data);
    }
  });
});
</script>      
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
                  <li class="treeview">
                    <a href="#">
                      <i class="fa fa-edit"></i> <span>Fees</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">

                      <li><a href="../reports.php"><i class="fa fa-circle-o"></i> Student</a></li>

                    </ul>
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
              <!-- Content Header (Page header) -->
              <section class="content-header">
                <h1> Student Attendance</h1>

              </section>

              <!-- Main content -->
              <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                  <div class="col-md-12">
                    <div class="box" style="height:500px;">
                      <div class="box-header with-border">
                        <h3 class="box-title">Class Attendance</h3>
                      </div>
                      <!-- /.box-header --> 
                      <div class="box-body">
                        <div class="row">
                          <div class="col-lg-3">
                            <label for="dates">Date </label>
                            <strong><?php 
                            $date=date("Y-m-d");
                            echo "<input onchange='updateChart()' class='form-control' type='date' id = 'dates' value='".$date."' max='".$date."'></input>";?></strong>
                          </div>
                          <div class="col-lg-3">
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
                          </div>
                          <div class="col-lg-3">
                            <label for="status">Status</label>
                            <select onchange="updateChart3()"class="form-control" id="status">
                              <option value="All">All</option>
                              <option value="P">Present</option>
                              <option value="A">Absent</option>
                              <option value="L">Late</option>
                              <option value="E">Excused</option>
                              
                            </select>
                          </div>
                        </div>
                        <div class="row">
                          <div id="chart-container" style="height:240px;">
                            <canvas id="mycanvas"></canvas>
                          </div>
                          <!-- /.row -->
                        </div>
                      </div>
                      <!-- ./box-body -->

                      <!-- /.box-footer -->
                    </div>
                    <!-- /.box -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->

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
                            <th>Adm.No</th>
                            <th>Name</th>
                            <th>Class</th>
                            <th>Father's Name</th>
                            <th>Contact</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody id="tbody">
                          <?php
                          foreach ($userRow4 as $key) {
                            echo '
                            <tr>
                            <td>'.$key["Admission_No"].'</td>
                            <td>'.$key["firstname"].'</td>
                            <td>'.$key["classs"].'</td>
                            <td>'.$key["Fathers_name"].'</td>
                            <td>'.$key["Contact_No"].'</td>';
                            
                            if($key['Status']=='P')
                            {
                              echo '<td>Present</td>';
                            }
                            else if ($key['Status']=='L')
                            {
                              echo '<td>Late</td>';

                            } 
                            else if ($key['Status']=='E')
                            {
                              echo '<td>Excused</td>';

                            } 
                            else if ($key['Status']=='A')
                            {
                              echo '<td>Absent</td>';

                            } 

                            echo '</tr>';
                          }
                          ?>
                        </tfoot>
                      </table>
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->

                </div>
              </div>

              <!-- /.col -->
              <!-- /.row -->
            </section>
            <!-- /.content -->
          </div>
          <!-- /.content-wrapper -->

          <footer class="main-footer">
            <div class="pull-right hidden-xs">
              <b>Version</b> 2.4.0
            </div>
            <strong><a href="https://comezo.in">COMEZO</a>.</strong> All rights
            reserved.
          </footer>

          <!-- Control Sidebar -->
          <aside class="control-sidebar control-sidebar-dark">
            <!-- Create the tabs -->
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
              <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
              <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
              <!-- Home tab content -->
              <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                  <li>
                    <a href="javascript:void(0)">
                      <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                      <div class="menu-info">
                        <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                        <p>Will be 23 on April 24th</p>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0)">
                      <i class="menu-icon fa fa-user bg-yellow"></i>

                      <div class="menu-info">
                        <h4 class="control-sidebar-subheading">Frodo Updated His Profile</  h4>

                          <p>New phone +1(800)555-1234</p>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                        <div class="menu-info">
                          <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                          <p>nora@example.com</p>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-file-code-o bg-green"></i>

                        <div class="menu-info">
                          <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                          <p>Execution time 5 seconds</p>
                        </div>
                      </a>
                    </li>
                  </ul>
                  <!-- /.control-sidebar-menu -->

                  <h3 class="control-sidebar-heading">Tasks Progress</h3>
                  <ul class="control-sidebar-menu">
                    <li>
                      <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                          Custom Template Design
                          <span class="label label-danger pull-right">70%</span>
                        </h4>

                        <div class="progress progress-xxs">
                          <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                          Update Resume
                          <span class="label label-success pull-right">95%</span>
                        </h4>

                        <div class="progress progress-xxs">
                          <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                          Laravel Integration
                          <span class="label label-warning pull-right">50%</span>
                        </h4>

                        <div class="progress progress-xxs">
                          <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                          Back End Framework
                          <span class="label label-primary pull-right">68%</span>
                        </h4>

                        <div class="progress progress-xxs">
                          <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                        </div>
                      </a>
                    </li>
                  </ul>
                  <!-- /.control-sidebar-menu -->

                </div>
                <!-- /.tab-pane -->

                <!-- Settings tab content -->
                <div class="tab-pane" id="control-sidebar-settings-tab">
                  <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                      <label class="control-sidebar-subheading">
                        Report panel usage
                        <input type="checkbox" class="pull-right" checked>
                      </label>

                      <p>
                        Some information about this general settings option
                      </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                      <label class="control-sidebar-subheading">
                        Allow mail redirect
                        <input type="checkbox" class="pull-right" checked>
                      </label>

                      <p>
                        Other sets of options are available
                      </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                      <label class="control-sidebar-subheading">
                        Expose author name in posts
                        <input type="checkbox" class="pull-right" checked>
                      </label>

                      <p>
                        Allow the user to show his name in blog posts
                      </p>
                    </div>
                    <!-- /.form-group -->

                    <h3 class="control-sidebar-heading">Chat Settings</h3>

                    <div class="form-group">
                      <label class="control-sidebar-subheading">
                        Show me as online
                        <input type="checkbox" class="pull-right" checked>
                      </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                      <label class="control-sidebar-subheading">
                        Turn off notifications
                        <input type="checkbox" class="pull-right">
                      </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                      <label class="control-sidebar-subheading">
                        Delete chat history
                        <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                      </label>
                    </div>
                    <!-- /.form-group -->
                  </form>
                </div>
                <!-- /.tab-pane -->
              </div>
            </aside>
            <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="../bower_components/raphael/raphael.min.js"></script>
<script src="../bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../bower_components/moment/min/moment.min.js"></script>
<script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>



<script type="text/javascript">
var currentChart;
function updateChart() {
 if(currentChart){currentChart.destroy();}
 $('#mycanvas').replaceWith('<canvas id="mycanvas"></canvas>');
 var sid=[];
 var classes = $("#classes").val();
 var dates = $("#dates").val();
 var status = $("#status").val();

 $.ajax({
  url: "class_daily_attendance.php?classes="+classes+"&dates="+dates+"&status="+status,
  method: "GET",
  success: function(data) {
    var max__Present_count = [];
    var max__absent_count = [];
    var max__Late_count = [];
    var max__Excuse_count = [];
    var classs = [];
    var obj = JSON.parse(data);
    for(var i in obj) {
      max__Present_count.push(obj[i].sum__Present);
      max__absent_count.push(obj[i].sum__Absent);
      max__Late_count.push(obj[i].sum__Late);
      max__Excuse_count.push(obj[i].sum__Excuse);
      classs.push(obj[i].classs);
    }
    var ctx= document.getElementById('mycanvas');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: classs,
        datasets: [
        {
                        label: 'Present count',
              data: max__Present_count,
              backgroundColor:'#34bf49',
              borderColor:'#34bf49',

              borderWidth: 1
            },
            {
              label: 'absent count',
              data: max__absent_count,
              backgroundColor:'#ff4c4c',
              borderColor:'#ff4c4c',
              borderWidth: 1
            },
            {
              label: 'Late count',
              data: max__Late_count,
              backgroundColor:'#ffc168',
              borderColor:'#ffc168',
              borderWidth: 1
            },
            {
              label: 'Excuse count',
              data: max__Excuse_count,
              backgroundColor:'#b8b5b5',
              borderColor:'#b8b5b5',
              borderWidth: 1
            }]
      },
      options: {
        maintainAspectRatio: false,
        legend: {
          display: true,
          labels: {
            fontColor: 'rgb(255, 99, 132)'
          }
        },
        scales: {
          yAxes: [{
            ticks: {
              mincount:20,
              beginAtZero:true
            },
            stacked:true
          }],
          xAxes: [{
            ticks: {
              beginAtZero:true
            },
            stacked:true
          }]
        }
      }
    });
},
error: function(data) {
}
});
$.ajax({

  url: "student_attendance_query.php?classes="+classes+"&dates="+dates+"&status="+status,
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
     var td5 = document.createElement('td');
     var td6 = document.createElement('td');
     var text1 = document.createTextNode(obj[i].Admission_No);
     var text2 = document.createTextNode(obj[i].firstname);
     var text3 = document.createTextNode(obj[i].class);
     var text4 = document.createTextNode(obj[i].Fathers_name);
     var text5 = document.createTextNode(obj[i].Contact_No);
     var text6 = document.createTextNode(obj[i].Status);
     td1.appendChild(text1);
     td2.appendChild(text2);
     td3.appendChild(text3);
     td4.appendChild(text4);
     td5.appendChild(text5);
     td6.appendChild(text6);
     tr.appendChild(td1);
     tr.appendChild(td2);
     tr.appendChild(td3);
     tr.appendChild(td4);
     tr.appendChild(td5);
     tr.appendChild(td6);
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
function updateChart3() {

 var classes = $("#classes").val();
 var dates = $("#dates").val();
 var status = $("#status").val();

 $.ajax({
  url: "student_attendance_query.php?classes="+classes+"&dates="+dates+"&status="+status,
  method: "GET",
  success: function(data) {     
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
     var td5 = document.createElement('td');
     var td6 = document.createElement('td');
     var text1 = document.createTextNode(obj[i].Admission_No);
     var text2 = document.createTextNode(obj[i].firstname);
     var text3 = document.createTextNode(obj[i].class);
     var text4 = document.createTextNode(obj[i].Fathers_name);
     var text5 = document.createTextNode(obj[i].Contact_No);
     var text6 = document.createTextNode(obj[i].Status);
     td1.appendChild(text1);
     td2.appendChild(text2);
     td3.appendChild(text3);
     td4.appendChild(text4);
     td5.appendChild(text5);
     td6.appendChild(text6);
     tr.appendChild(td1);
     tr.appendChild(td2);
     tr.appendChild(td3);
     tr.appendChild(td4);
     tr.appendChild(td5);
     tr.appendChild(td6);
     table2.appendChild(tr);
     
     
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
