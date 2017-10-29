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

      var obj = JSON.parse(data);
      for(var i in obj) 
      {
        if(obj[i].term_name=="Half Yearly")
        {
          half_yearly.push(obj[i].avg__finalgrade);
          half_yearly2.push(obj[i].Subject);
        }
        
        else if(obj[i].term_name=="PT1")
        {
          PT1.push(obj[i].avg__finalgrade);
          PT12.push(obj[i].Subject);
        }
        else if(obj[i].term_name=="NS1")
        {
          NS1.push(obj[i].avg__finalgrade);
          NS12.push(obj[i].Subject);
        }
        else if(obj[i].term_name=="NS 1")
        {
          NS_1.push(obj[i].avg__finalgrade);
          NS_12.push(obj[i].Subject);
        }
        else if(obj[i].term_name=="PT 1")
        {
          PT_1.push(obj[i].avg__finalgrade);
          PT_12.push(obj[i].Subject);
        }
        else if(obj[i].term_name=="PT 1 (Grammar)")
        {
          PT_1G.push(obj[i].avg__finalgrade);
          PT_1G2.push(obj[i].Subject);
        }
        else if(obj[i].term_name=="PT 1 (Literature)")
        {
          PT_1L.push(obj[i].avg__finalgrade);
          PT_1L2.push(obj[i].Subject);
        }
        else if(obj[i].term_name=="PT 2")
        {
          PT_2.push(obj[i].avg__finalgrade);
          PT_22.push(obj[i].Subject);
        }
        else if(obj[i].term_name=="PT 2 (Grammar)")
        {
          PT_2G.push(obj[i].avg__finalgrade);
          PT_2G2.push(obj[i].Subject);
        }
        else if(obj[i].term_name=="PT 2 (Literature)")
        {
          PT_2L.push(obj[i].avg__finalgrade);
          PT_2L2.push(obj[i].Subject);
        }
        else if(obj[i].term_name=="PT 3")
        {
          PT_3.push(obj[i].avg__finalgrade);
          PT_32.push(obj[i].Subject);
        }
        else if(obj[i].term_name=="PT 3 (Grammar)")
        {
          PT_3G.push(obj[i].avg__finalgrade);
          PT_3G2.push(obj[i].Subject);
        }
        else if(obj[i].term_name=="PT 3 (Literature)")
        {
          PT_3L.push(obj[i].avg__finalgrade);
          PT_3L2.push(obj[i].Subject);
        }
        else if(obj[i].term_name=="PT 4")
        {
          PT_4.push(obj[i].avg__finalgrade);
          PT_42.push(obj[i].Subject);
        }
        else if(obj[i].term_name=="PT 4 (Grammar)")
        {
          PT_4G.push(obj[i].avg__finalgrade);
          PT_4G2.push(obj[i].Subject);
        }
        else if(obj[i].term_name=="PT 4 (Literature)")
        {
          PT_4L.push(obj[i].avg__finalgrade);
          PT_4L2.push(obj[i].Subject);
        }        
        else if(obj[i].term_name=="PT2")
        {
          PT2.push(obj[i].avg__finalgrade);
          PT22.push(obj[i].Subject);
        }
        else if(obj[i].term_name=="SEA1")
        {
          SEA1.push(obj[i].avg__finalgrade);
          SEA12.push(obj[i].Subject);
        }
        else if(obj[i].term_name=="SEA 1")
        {
          SEA_1.push(obj[i].avg__finalgrade);
          SEA_12.push(obj[i].Subject);
        }
        
      } 
      console.log(PT_1G);
      var ctx= document.getElementById('mycanvas').getContext("2d");
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ["PT 1","PT 1 (Grammar)"],
          datasets: [
          {
            label: PT_12,
            data: PT_1,
            backgroundColor: 'rgba(91, 144, 191, 1)',
            borderColor: 'rgba(91, 144, 191, 1)',
            borderWidth: 1
          },
          {
            label:PT_1G2,
            data: PT_1G,
            backgroundColor: 'rgba(141, 44, 191, 1)',
            borderColor:'rgba(141, 44,191, 1)',
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
            xAxes :[{
              barPercentage: 0.4
            }]            
          }
        }

      });
},  
error: function(data) {
}
});
$.ajax({
  url: "student_performance_query3.php?classes=All&student=All",
  method: "GET",
  success: function(data) {
    var avg__finalgrades = [];
    var itemnames = [];
    var obj = JSON.parse(data);
    for(var i in obj) {
      avg__finalgrades.push(obj[i].avg__finalgrade);
      itemnames.push(obj[i].term_name);
    }
    var ctx= document.getElementById('mycanvas3').getContext("2d");
    var myChart3 = new Chart(ctx, {
      type: 'line',
      data: {
        labels: itemnames,
        datasets: [{
          label: 'Marks ',
          backgroundColor: 'rgba(255,90,95,0.2)',
          data: avg__finalgrades,
          borderColor: 'rgba(255,90,95,1)',
          borderWidth:2
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
});

</script>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
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
        <span class="logo-lg"><b>Admin</b>LTE</span>
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
                <img src="../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
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
                <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
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
                      <li><a href="../attendance/student_attendance.php"><i class="fa fa-circle-o"></i> Overall</a></li>
                      <li><a href="student_attendance.php"><i class="fa fa-circle-o"></i> Student</a></li>

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

                      <li><a href="../report.php"><i class="fa fa-circle-o"></i> Student</a></li>

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

              <section class="content-header">
                <h1> Student Performance</h1>
              </section>
              <section class="content">

                <div class="row">
                  <div class="col-lg-8">
                    <h4>Subject Wise Average Marks</h4>
                    <div id="chart-container">
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
                      <tbody>
                        <?php
                        include("queries.php");
                        foreach ($userRow5 as $key) {
                          echo '
                          <tr>
                          <td>'.$key["firstname"].'</td>
                          <td>'.$key["fullname"].'</td>
                          <td>'.$key["itemname"].'</td>
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
            <div class="row">

              <div class="col-lg-8">
                <h4> Wise Average Marks</h4>
                <div id="chart-container">
                  <canvas id="mycanvas3"></canvas>
                </div>
              </div>
              <div class="col-lg-4">
                <h4>Select Filter</h4>
                <label for="classes2">Class</label>
                <select onchange="updateChart3()"class="form-control" id="classes2">
                 <option>All</option>
                 <?php 
                 include("queries.php");
                 foreach ($userRow6 as $key) {
                  echo '<option>'.$key["Class"].'</option>';
                }
                ?>
              </select>

              <label for="student2">Student</label>
              <select onchange="updateChart4()"class="form-control" id="student2">
                <option value="All">All</option>
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
      var avg__finalgrades = [];
      var itemnames = [];
      var obj = JSON.parse(data);
      for(var i in obj) {
        avg__finalgrades.push(obj[i].avg__finalgrade);
        itemnames.push(obj[i].Subject);
      }
      var ctx= document.getElementById('mycanvas').getContext("2d");
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: itemnames,
          datasets: [{
            label: 'Marks ',
            data: avg__finalgrades,
            backgroundColor: [

            'rgba(91, 144, 191, 1)',
            'rgba(91, 144, 191, 1)',
            'rgba(91, 144, 191, 1)',
            'rgba(91, 144, 191, 1)',
            'rgba(91, 144, 191, 1)',
            'rgba(91, 144, 191, 1)',
            'rgba(91, 144, 191, 1)',           
            'rgba(91, 144, 191, 1)',
            'rgba(91, 144, 191, 1)',
            'rgba(91, 144, 191, 1)',

            'rgba(91, 144, 191, 1)',
            'rgba(91, 144, 191, 1)',
            'rgba(91, 144, 191, 1)',
            'rgba(91, 144, 191, 1)'
            ],
            borderColor: [

            'rgba(91, 144, 191, 1)',
            'rgba(91, 144, 191, 1)',
            'rgba(91, 144, 191, 1)',
            'rgba(91, 144, 191, 1)',
            'rgba(91, 144, 191, 1)',
            'rgba(91, 144, 191, 1)',
            'rgba(91, 144, 191, 1)',           
            'rgba(91, 144, 191, 1)',
            'rgba(91, 144, 191, 1)',
            'rgba(91, 144, 191, 1)',

            'rgba(91, 144, 191, 1)',
            'rgba(91, 144, 191, 1)',
            'rgba(91, 144, 191, 1)',
            'rgba(91, 144, 191, 1)'
            ],
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
            var avg__finalgrades = [];
            var itemnames = [];
            var obj = JSON.parse(data);
            for(var i in obj) {
              avg__finalgrades.push(obj[i].avg__finalgrade);
              itemnames.push(obj[i].Subject);
            }
            var ctx= document.getElementById('mycanvas').getContext("2d");
            var myChart3 = new Chart(ctx, {
              type: 'bar',
              data: {
                labels: itemnames,
                datasets: [{
                  label: 'Marks ',
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
}

</script>
<script type="text/javascript">
var currentChart;
function updateChart3() {
 if(currentChart){currentChart.destroy();}
 $('#mycanvas3').replaceWith('<canvas id="mycanvas3"></canvas>');
 var sid=[];
 var Student_Name=[];
 var classes = $("#classes2").val();
 var student = $("#student2").val();
 var select = $('#student2').empty();
 $.get('filterscript1.php', {classes: classes}, function(data) {
  var obj = JSON.parse(data);
  $('<option value="All">All</option>').appendTo(select);

  for(var i in obj) {
   $('<option>' + obj[i].Student_Name + '</option>').appendTo(select);
 }
});

 $.ajax({
  url: "student_performance_query3.php?classes="+classes+"&student="+student,
  method: "GET",
  success: function(data) {
    var avg__finalgrades = [];
    var itemnames = [];
    var obj = JSON.parse(data);
    for(var i in obj) {
      avg__finalgrades.push(obj[i].avg__finalgrade);
      itemnames.push(obj[i].term_name);
    }
    var ctx= document.getElementById('mycanvas3').getContext("2d");
    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: itemnames,
        datasets: [{
          label: 'Marks ',
          data: avg__finalgrades,
          backgroundColor: 'rgba(255,90,95,0.2)',
          data: avg__finalgrades,
          borderColor: 'rgba(255,90,95,1)',
          borderWidth:2
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
       function updateChart4() {
         if(currentChart){currentChart.destroy();}
         $('#mycanvas3').replaceWith('<canvas id="mycanvas3"></canvas>');

         var classes = $("#classes2").val();
         var student = $("#student2").val();
         $.ajax({
          url: "student_performance_query3.php?classes="+classes+"&student="+student,
          method: "GET",
          success: function(data) {
            var avg__finalgrades = [];
            var itemnames = [];
            var obj = JSON.parse(data);
            for(var i in obj) {
              avg__finalgrades.push(obj[i].avg__finalgrade);
              itemnames.push(obj[i].term_name);
            }
            var ctx= document.getElementById('mycanvas3').getContext("2d");
            var myChart3 = new Chart(ctx, {
              type: 'line',
              data: {
                labels: itemnames,
                datasets: [{
                  label: 'Marks ',
                  data: avg__finalgrades,
                  backgroundColor: 'rgba(255,90,95,0.2)',
                  data: avg__finalgrades,
                  borderColor: 'rgba(255,90,95,1)',
                  borderWidth:2
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
