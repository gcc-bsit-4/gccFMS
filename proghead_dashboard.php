<?php 
    session_start();

    if($_SESSION['user_type'] == "Admin"){
      header('location: dashboard.php');
    }else if($_SESSION['user_type'] == "Student"){
      header('location: student_panel.php');
    }else if($_SESSION['user_type'] == "Teacher"){
      header('location: student_panel.php');
    }
 ?>
<!DOCTYPE html>
<html lang="en">
  <?php 
      include 'header.php';
   ?>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <?php 
        include 'menu.php';
     ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
          
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>

      <?php 
                  include 'conn.php';
                  $dept_id = $_SESSION['dept_id'];
                  $total_student = 0;
                  $total_payment = 0;
                  $total_treasurer = 0;
                  $total_expenses = 0;
                  $total_misc = 0;
                  $sql = "SELECT * FROM student WHERE dept_id = '$dept_id'";
                   $result = $conn->query($sql);
                        if($result-> num_rows > 0){
                            while($row = $result-> fetch_assoc()){
                              if($row['position'] == 'Treasurer'){
                                $total_treasurer++;
                              }
                              $total_student++;
                              $total_payment = $total_payment+$row['payment'];
                            }
                          }
                  $sql = "SELECT * FROM expenses WHERE dept_id = '$dept_id'";
                   $result = $conn->query($sql);
                        if($result-> num_rows > 0){
                            while($row = $result-> fetch_assoc()){
                              $total_expenses = $total_expenses+$row['amount'];
                            }
                          }

                  $sql = "SELECT * FROM miscellaneous WHERE dept_id = '$dept_id'";
                   $result = $conn->query($sql);
                        if($result-> num_rows > 0){
                            while($row = $result-> fetch_assoc()){
                              $total_misc = $total_misc+$row['amount'];
                            }
                          }
               ?>

      <div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><a href="student.php" style="text-decoration: none;"><i class="icon fa fa-users fa-3x"></i></a>
            <div class="info">
              <h4>Students</h4>
              <p><b><?php echo $total_student; ?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><a href="student.php" style="text-decoration: none;"><i class="icon fa fa-user fa-3x"></i></a>
            <div class="info">
              <h4>Treasurer</h4>
              <p><b><?php echo $total_treasurer; ?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><a href="expenses.php" style="text-decoration: none;"><i class="icon fa fa-money fa-3x"></i></a>
            <div class="info">
              <h4>Expenses</h4>
              <p><b><?php echo $total_expenses; ?>.00</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><a href="miscellaneous.php" style="text-decoration: none;"><i class="icon fa fa-file fa-3x"></i></a>
            <div class="info">
              <h4>Miscellaneous</h4>
              <p><b><?php echo $total_misc; ?>.00</b></p>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="" style="width: 100%;">
          <div class="tile">
            <h3 class="tile-title">Payment Transaction Today</h3>
            <button class="btn btn-primary print" type="button"><i class="fa fa-print"> </i> Print</button>
            <div class="left" style="float: right; font-weight: bold;">
              
              <input class="form-control" type="text" placeholder="Search" id="search">
            </div>
            <br>
            <hr>
            <div style="overflow-x:auto;">
            <table class="table table-hover table-bordered" >
                <thead>
                  <tr style="background-color: #009688; color:white;">
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Amount</th>
                    <th>User</th>
                    <th>Date And Time</th>
                  </tr>
                </thead>
                <tbody id="pay_history">
                    <?php 
                        include 'conn.php';
                        $dept_id = $_SESSION['dept_id'];
                        $sql = "SELECT * FROM payment_history WHERE dept_id = '$dept_id'";
                        $result = $conn->query($sql);
                        if($result-> num_rows > 0){
                          while($row = $result-> fetch_assoc()){
                            $st_id = $row['st_id'];
                            $user_id = $row['user_id'];
                            $sql = "SELECT * FROM `student` WHERE id = '$st_id'";
                            $result1 = $conn->query($sql);
                             if($result1-> num_rows > 0){
                              $row1 = $result1-> fetch_assoc();
                              echo "<tr><td>".$row["st_id"]."</td>"."<td>".$row1["s_lname"]." ".$row1["s_fname"]." ".$row1["s_mname"]."."."</td>"."</td>"."<td>".$row["amount"].".00"."</td>";
                              
                            }
                             $sql = "SELECT * FROM `user` WHERE user_id = '$user_id'";
                             $result1 = $conn->query($sql);
                             if($result1-> num_rows > 0){
                              $row2 = $result1-> fetch_assoc();
                              echo "<td>".$row2["fname"]." ".$row2["lname"]."</td><td>".$row["date_time"]."</td></tr>";
                              
                            }
                          }
                        }
                     ?>
                </tbody>
              </table>
           </div>
          </div>
        </div>
      </div>
      
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="js/plugins/chart.js"></script>
    <!-- <script type="text/javascript">
      var data = {
      	labels: ["January", "February", "March", "April", "May"],
      	datasets: [
      		{
      			label: "My First dataset",
      			fillColor: "rgba(220,220,220,0.2)",
      			strokeColor: "rgba(220,220,220,1)",
      			pointColor: "rgba(220,220,220,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(220,220,220,1)",
      			data: [65, 59, 80, 81, 56]
      		},
      		{
      			label: "My Second dataset",
      			fillColor: "rgba(151,187,205,0.2)",
      			strokeColor: "rgba(151,187,205,1)",
      			pointColor: "rgba(151,187,205,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(151,187,205,1)",
      			data: [28, 48, 40, 19, 86]
      		}
      	]
      };
      var pdata = [
      	{
      		value: 300,
      		color: "#46BFBD",
      		highlight: "#5AD3D1",
      		label: "Complete"
      	},
      	{
      		value: 50,
      		color:"#F7464A",
      		highlight: "#FF5A5E",
      		label: "In-Progress"
      	}
      ]
      
      var ctxl = $("#lineChartDemo").get(0).getContext("2d");
      var lineChart = new Chart(ctxl).Line(data);
      
      var ctxp = $("#pieChartDemo").get(0).getContext("2d");
      var pieChart = new Chart(ctxp).Pie(pdata);
    </script>
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>
<script>
$(document).ready(function(){
 
$("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    var $tblRows = $("#pay_history > tbody > tr");
  if(value != ''){
    $("#pay_history tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  }else{
    $tblRows.show();
  }
  });
 });
</script>
  </body>
</html>