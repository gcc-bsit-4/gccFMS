<?php 
    session_start();

    if($_SESSION['user_type'] == "Admin"){
      header('location: dashboard.php');
    }else if($_SESSION['user_type'] == "Dean"){
      header('location: student.php');
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
          <h1><i class="fa fa-user"></i> Student Panel</h1>
          
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>
      <div class="row">
      </div>
      <div class="row">
        <div class="" style="width: 98%; margin-left: 1%;">
          <div class="tile" >
            <h3 class="tile-title" style="text-align: center;">GINGOOG CITY COLLEGES</h3>
             <hr>
             <div>
              <?php 
                  include 'conn.php';
                  $username = $_SESSION['user'];
                  $dept_id = $_SESSION['dept_id'];
                  $total_payment = 0;
                  $sql = "SELECT * FROM department INNER JOIN `student` WHERE id = '$username' AND department.dept_id = '$dept_id'";
                  $result = $conn->query($sql);
                  if($result-> num_rows > 0){
                            while($row = $result-> fetch_assoc()){
                              echo '<table class="table table-hover table-borderless" id="sampleTable" style= >
                                   <thead>
                                      <tr style="background-color: #009688; color:white; text-align: center;">
                                        <th colspan="2">PERSONAL INFORMATION</th>
                                      </tr>
                              </thead>
                              <tbody>
                              <tr>
                              <td>
                               <h4><label style="color:#009688;">ID #: </label>'. $row['id'].' <label> </label></h4>
                               <h4><label style="color:#009688;">Name: </label> '. $row['s_fname'].' '. $row['s_lname'].'</h4>
                               <h4><label style="color:#009688;">Course: </label> '. $row['dept_code'].'</h4>
                              </td>';
                            $total = 0;
                            $sql = "SELECT * FROM `miscellaneous` WHERE dept_id = '$dept_id'";
                            $result = $conn->query($sql);
                            if($result-> num_rows > 0){
                                while($row1 = $result-> fetch_assoc()){
                                  $total = $total + $row1['amount'];
                                }
                            }
                            $total_payment = $row['payment'];
                            $balance = $total - $row['payment'];
                             echo'
                             <td>
                               <h4><label style="color:#009688;">Year Level: </label> '. $row['yrlvl'].' Year<label> </label></h4>
                               <h4><label style="color:#009688;">Gender: </label> '. $row['gender'].'</h4>
                               
                            </td>
                            </tr>
                             </table>';

                            }
                  } 
                            
               ?>
             
             <?php 
                
             ?>
             </div>
            </div>
          </div>
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Department Fees</h3>
             <div style="overflow-x:auto;">
               <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr style="background-color: #009688; color:white;">
                    <th>Description</th>
                    <th>Amount</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                        include 'conn.php';
                        $id = $_SESSION['user'];
                        $dept_id = $_SESSION['dept_id'];
                        $total = 0;
                        
                        $sql = "SELECT * FROM `miscellaneous` WHERE dept_id = '$dept_id'";
                        $result = $conn->query($sql);
                        if($result-> num_rows > 0){
                            while($row = $result-> fetch_assoc()){
                              $msc_id = $row["msc_id"];
                              $msc_amount = $row['amount'];
                              $total = $total + $row['amount'];
                              echo "<tr><td>".$row["description"]."</td><td>".$row["amount"]."</td>";
                              $sql_paymentstat = "SELECT * FROM `payments` WHERE msc_id = '$msc_id' AND st_id = '$username'";
                              $result2 = $conn->query($sql_paymentstat);
                              if($result2-> num_rows > 0){
                                $row2 = $result2-> fetch_assoc();
                                $pay_amount = $row2['amount'];
                                if($pay_amount>=$msc_amount){
                                  echo '<td style=""><label style="font-weight:bold;color:green;">Paid</label></td></tr>';
                                }else{
                                  echo '<td style=""><label style="font-weight:bold;color:red;">Unpaid</label></td></tr>';
                                }
                              }else{
                                echo '<td style=""><label style="font-weight:bold;color:red;">Unpaid</label></td></tr>';
                              }
                             
                            }
                        }
                        echo "<tr><td style='font-weight:bold; text-align:center;background-color: #009688; color:white;'>"."TOTAL"."</td><td colspan = 2 style='font-weight:bold; text-align:center;background-color: #009688; color:white;'>".$total.".00"."</td></tr>";
                        echo "<tr><td style='font-weight:bold; text-align:center;'>"."PAID AMOUNT"."</td><td colspan = 2 style='font-weight:bold; text-align:center;'>".$total_payment.".00"."</td></tr>";
                        echo "<tr><td style='font-weight:bold; text-align:center;background-color: #009688; color:white;'>"."CURRENT BALANCE"."</td><td colspan = 2 style='font-weight:bold; text-align:center;background-color: #009688; color:white;'>".$balance.".00"."</td></tr>";
                     ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Department Expenses</h3>
             <div style="overflow-x:auto;">
             <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr style="background-color: #009688; color:white;">
                    <th>ID</th>
                    <th>Description</th>
                    <th>Amount</th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                        include 'conn.php';
                        $id = $_SESSION['user'];
                        $dept_id = $_SESSION['dept_id'];
                        $total1 = 0;

                        $sql = "SELECT * FROM `expenses` WHERE dept_id = '$dept_id'";
                        $result = $conn->query($sql);
                        if($result-> num_rows > 0){
                            while($row = $result-> fetch_assoc()){
                              $total1 = $total1 + $row['amount'];
                              echo "<tr><td>".$row["id"]."</td><td>".$row["description"]."</td><td>".$row["amount"]."</td></tr>";
                              
                            }
                        }
                        echo "<tr><td style='font-weight:bold; text-align:center;background-color: #009688; color:white;'>"."TOTAL"."</td><td colspan = 2 style='font-weight:bold; text-align:center;background-color: #009688; color:white;'>".$total1.".00"."</td></tr>";
                     ?>
                </tbody>
              </table>
            </div>
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
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script> -->
  </body>
</html>