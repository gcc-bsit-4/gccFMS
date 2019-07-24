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
          <h1><i class="fa fa-money"></i> Payments</h1>
          
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-money fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Payments</a></li>
        </ul>
      </div>
      
      <div class="row">
        <div class="" style="width: 100%;">
          <div class="tile">
            <div style="overflow-x:auto;">
            <?php 
                include 'modals/add_payment.php';
             ?>
           <?php 
           include 'conn.php';
           $id = $_SESSION['student_id'];
           $dept_id = $_SESSION['dept_id'];
            $course = "";
            $total = 0;
            $payment = 0;
            $balance = 0;
            $sql = "SELECT * FROM `student` INNER JOIN department  WHERE department.dept_id = '$dept_id' AND id = '$id'";
            $result = $conn->query($sql);
            if($result-> num_rows > 0){
                while($row = $result-> fetch_assoc()){
                      $payment = $row['payment'];
                        echo '<input class="form-control" type="number" name="id" required="" style="font-weight:bold; font-size:17px; display:none;" value='.$row['id'].'>';
                        echo '
                            <table class="table table-hover table-borderless" id="sampleTable" style= "border-bottom:1px solid black;">
                           <thead>
                              <tr style="background-color: #009688; color:white; text-align: center;">
                                <th colspan="4">PERSONAL INFORMATION</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                  <td style="font-size:17px;"><label style="font-weight:bold;color:">ID #: </label>&nbsp;&nbsp;&nbsp;'.$row['id'].'<br>
                                        <label style="font-weight:bold;color:">Firstname: </label>&nbsp;&nbsp;&nbsp;'.$row['s_fname'].'<br>
                                        <label style="font-weight:bold;color:">Lastname: </label>&nbsp;&nbsp;&nbsp;'.$row['s_lname'].'<br>
                                        <label style="font-weight:bold;color:">MI: </label>&nbsp;&nbsp;&nbsp;'.$row['s_mname'].'<br></td>
                                  <td></td>
                                  <td style="font-size:18px;"><label style="font-weight:bold;color:">Gender: </label>&nbsp;&nbsp;&nbsp;'.$row['gender'].'<br>    <label style="font-weight:bold;color:">Course: </label>&nbsp;&nbsp;&nbsp;'.$row['dept_code'].'<br>
                                        <label style="font-weight:bold;color:">Year Level: </label>&nbsp;&nbsp;&nbsp;'.$row['yrlvl'].'<br></td><td></td>
                              </tr>

                            </tbody>';
                    }
                }
                       echo ' <thead >
                                      <tr style="background-color: #009688; color:white;">
                                        <th colspan>DESCRIPTION</th>
                                        <th colspan>AMOUNT</th>
                                        <th colspan>STATUS</th>
                                        <th colspan>PAYMENT</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                   ';
     $sql = "SELECT * FROM `miscellaneous` WHERE dept_id = '$dept_id'";
     $result = $conn->query($sql);
        if($result-> num_rows > 0){
            while($row = $result-> fetch_assoc()){
                $total = $total + $row['amount'];
                $msc_id = $row['msc_id'];
      echo '
              
                  <tr>
                      <td style="font-size:17px;"><label style="font-weight:bold;color:">'.$row['description'].'</label></td> 
                      <td style="font-size:17px;"><label style="font-weight:bold;color:">'.$row['amount'].'.00</label></td>
                  
               ';
               $sql1 = "SELECT * FROM `payments` WHERE msc_id = '$msc_id' AND st_id = '$id'";
               $result1 = $conn->query($sql1);
               $row1 = $result1-> fetch_assoc();
                if($result1-> num_rows > 0){
                  
                   if($row1['amount']==$row['amount']){
                     echo '<td style="font-size:17px;"><label style="font-weight:bold;color:green;">Paid</label></td> ';
                     echo "<td><button type='button' class='btn btn-success payment'id=".$row["msc_id"] ." disabled><i class='fa fa-money'></i></button></td>";
                   }else{
                      echo '<td style="font-size:17px;"><label style="font-weight:bold;color:red;">Unpaid</label></td> ';
                      echo "<td><button type='button' class='btn btn-success payment'id=".$row["msc_id"] ."><i class='fa fa-money'></i></button></td>";
                   }
                }else{
                     echo '<td style="font-size:17px;"><label style="font-weight:bold;color:red;">Unpaid</label></td> ';
                     echo "<td><button type='button' class='btn btn-success payment'id=".$row["msc_id"] ."><i class='fa fa-money'></i></button></td>";
                  
                   
                }
                echo "</tr>";
        }
    }
    $final_bal = $total-$payment;
        echo ' <tr style="border-top:1px solid black;">
                      <td style="font-size:17px;"><label style="font-weight:bold;color:">TOTAL</label></td> 
                      
                      <td style="font-size:17px;"><label style="font-weight:bold;color:">'.$total.'.00</label></td>
                      <td></td><td></td>
                   </tr>
                   <tr>
                      <td style="font-size:17px;"><label style="font-weight:bold;color:">PAID AMOUNT</label></td> 
                      
                      <td style="font-size:17px;"><label style="font-weight:bold;color:">'.$payment.'.00</label></td>
                   </tr>
                   <tr>
                      <td style="font-size:17px;"><label style="font-weight:bold;color:">CURRENT BALANCE</label></td> 
                      
                      <td style="font-size:17px;"><label style="font-weight:bold;color:">'.$final_bal.'.00</label></td>
                      <td></td><td></td>
                   </tr>
        </tbody >
            </table>';
            ?>
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
  $(document).ready(function(){

    $('.payment').click(function(){
    var id = $(this).attr("id");
    $('#payment_form').modal("show");
    $.ajax({
      url:"view_payments.php",
      method:"post",
      data:{id:id},
      success:function(data){
        $('#payment').html(data);
        
      }
    });
  });
});
    </script> 
  </body>
</html> 