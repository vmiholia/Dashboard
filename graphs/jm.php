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
    url: "overall_performance_query.php?classes=Nursery A",
    method: "GET",
    success: function(data) {
      var avg__finalgrades = [];
      var itemnames = [];
      var term_name = [];
      var obj = JSON.parse(data);
      for(var i in obj) {
        avg__finalgrades.push(obj[i].avg__finalgrade);
        itemnames.push(obj[i].Class.concat("-").concat(obj[i].term_name));
        
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
},  
error: function(data) {
}
});
$.ajax({
  url: "overall_performance_query2.php?classes=Nursery A",
  method: "GET",
  success: function(data) {
    console.log(data);
    var avg__finalgrades = [];
    var itemnames = [];
    var obj = JSON.parse(data);
    for(var i in obj) {
      avg__finalgrades.push(obj[i].avg__finalgrade);
      itemnames.push(obj[i].Class.concat("-").concat(obj[i].Subject));
    }
    var ctx= document.getElementById('mycanvas2').getContext("2d");
    var myChart2 = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: itemnames,
        datasets: [{
          label: itemnames,
          data: avg__finalgrades,
          backgroundColor: [
          'rgba(223, 45, 36, 1)',
          'rgba(223, 45, 36, 1)',
          'rgba(223, 45, 36, 1)',
          'rgba(223, 45, 36, 1)',
          'rgba(223, 45, 36, 1)',
          'rgba(223, 45, 36, 1)',
          'rgba(223, 45, 36, 1)',
          'rgba(223, 45, 36, 1)',
          'rgba(223, 45, 36, 1)',
          'rgba(223, 45, 36, 1)',

          ],
          borderColor: [
          'rgba(223, 45, 36, 1)',
          'rgba(223, 45, 36, 1)',
          'rgba(223, 45, 36, 1)',
          'rgba(223, 45, 36, 1)',
          'rgba(223, 45, 36, 1)',
          'rgba(223, 45, 36, 1)',
          'rgba(223, 45, 36, 1)',
          'rgba(223, 45, 36, 1)',
          'rgba(223, 45, 36, 1)',
          'rgba(223, 45, 36, 1)',
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
                <h1> Overall Performance</h1>
              </section>
              <section class="content">

                <div class="row">
                  <div class="col-lg-8">
                    <h4>Overall Class Performance</h4>
                    <div id="chart-container">
                      <canvas id="mycanvas"></canvas>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <h4>Select Filter</h4>
                    
                    <label for="classes">Class</label>
                    <select onchange="updateChart()"class="form-control" id="classes">
                      <option>Nursery A</option>
                      <?php 
                      include("queries.php");
                      foreach ($userRow6 as $key) {
                        echo '<option>'.$key["Class"].'</option>';
                      }
                      ?>
                    </select>
                    



                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-8">
                    <h4>Subject Wise Comparison</h4>
                    <div id="chart-container">
                      <canvas id="mycanvas2"></canvas>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <h4>Select Filter</h4>
                    
                    <label for="classes2">Class</label>
                    <select onchange="updateChart2()"class="form-control" id="classes2">
                      <option>Nursery A</option>
                      <?php 
                      include("queries.php");
                      foreach ($userRow6 as $key) {
                        echo '<option>'.$key["Class"].'</option>';
                      }
                      ?>
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


         $.ajax({
          url: "overall_performance_query.php?classes="+classes,
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
            var term_name=[];
            var obj = JSON.parse(data);
            var newDataset = {
              label: "Vendas",
              backgroundColor: 'rgba(99, 255, 132, 0.2)',
              borderColor: 'rgba(99, 255, 132, 1)',
              borderWidth: 1,
              data: [10, 20, 30, 40, 50, 60, 70],
            }
            var data1 = {
              labels: [""],
              datasets: [{
                label: "",
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255,99,132,1)',
                borderWidth: 1,
                data:[]
              }]
            };
            var ctx = $("#mycanvas").get(0).getContext("2d");
            console.log(ctx);
            var myBarChart = new Chart(ctx, {
              type: "bar",
              data: data1,
            });
            for(var i in obj) 
            {
              if(obj[i].avg__finalgrade!=null)
              {
                term_name.push(obj[i].term_name);
                var newDataset = {
                  label: obj[i].term_name,
                  backgroundColor: 'rgba(99, 255, 132, 0.2)',
                  borderColor: 'rgba(99, 255, 132, 1)',
                  borderWidth: 1,
                  data: obj[i].avg__finalgrade
                }
                data1.datasets.push(newDataset);
                data1.labels.push(obj[i].term_name);
              }
            }
            console.log(data1);
            
            myBarChart.update();

            /*var ctx= document.getElementById('mycanvas').getContext("2d");
            var myChart = new Chart(ctx, {
              type: 'bar',
              data: data1,              
              options: {
                spanGaps: true,
                responsive:true,
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

            });*/
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
         $('#mycanvas2').replaceWith('<canvas id="mycanvas2"></canvas>');
         var classes = $("#classes2").val();
         $.ajax({
          url: "overall_performance_query2.php?classes="+classes,
          method: "GET",
          success: function(data) {
            console.log(data);
            var English=[];var English2=[];
            var Maths=[];var Maths2=[];
            var Hindi=[];var Hindi2=[];
            var EVS=[];var EVS2=[];
            var GK=[];var GK2=[];
            var Subject=[];
            var obj = JSON.parse(data);
            for(var i in obj) 
            {
              if(obj[i].avg__finalgrade!=null)
                if(obj[i].term_name=="English")
                {

                  English.push(obj[i].avg__finalgrade);
                  Subject.push(obj[i].Subject);
                  EVS.push(null);
                  GK.push(null);
                  Hindi.push(null);
                  Maths.push(null);

                }
                else if(obj[i].term_name=="EVS")
                {
                  Subject.push(obj[i].Subject);

                  EVS.push(obj[i].avg__finalgrade);
                  English.push(null);
                  GK.push(null);
                  Hindi.push(null);
                  Maths.push(null);
                }
                else if(obj[i].term_name=="GK")
                {

                  GK.push(obj[i].avg__finalgrade);
                  EVS.push(null);
                  English.push(null);
                  Hindi.push(null);
                  Maths.push(null);
                  Subject.push(obj[i].Subject);

                }
                else if(obj[i].term_name=="Hindi")
                {

                  Hindi.push(obj[i].avg__finalgrade);
                  EVS.push(null);
                  GK.push(null);
                  English.push(null);
                  Maths.push(null);
                  Subject.push(obj[i].Subject);
                }
                else if(obj[i].term_name=="Maths")
                {

                  Maths.push(obj[i].avg__finalgrade);
                  Subject.push(obj[i].Subject);
                  EVS.push(null);
                  GK.push(null);
                  Hindi.push(null);
                  English.push(null);
                }




              } 
              var ctx= document.getElementById('mycanvas2').getContext("2d");
              var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                  labels: Subject,
                  datasets: [
                  {
                    label: 'English',
                    data: English,
                    backgroundColor: 'rgba(91, 144, 191, 1)',
                    borderColor: 'rgba(91, 144, 191, 1)',
                    borderWidth: 1
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
                    backgroundColor: 'rgba(141, 44, 191, 1)',
                    borderColor:'rgba(141, 44,191, 1)',
                    borderWidth: 0.1
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
}
      /* $('#classes').on('change', updateChart)
       updateChart();
       $('#subject').on('change', updateChart)
       updateChart();
       $('#student').on('change', updateChart)
       updateChart();*/
       </script>

     </body>
     </html>
