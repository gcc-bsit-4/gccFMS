<?php 
    session_start();

    if($_SESSION['user_type'] == "Admin"){
      header('location: dashboard.php');
    }else if($_SESSION['user_type'] == "Student"){
      header('location: student_panel.php');
    }else if($_SESSION['user_type'] == "Dean"){
      header('location: student.php');
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
            <h3 class="tile-title">List Of Students</h3>
             <div class="left" style="float: right; font-weight: bold;">
              
              <input class="form-control" type="text" placeholder="Search" id="search">
            </div>
            <br>
            <br>
            <hr>
            <?php 
                include 'modals/addpayment_treasurer.php';
             ?>
            <div style="overflow-x:auto;">
            <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr style="background-color: #009688; color:white;">
                    <th>ID number</th>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Year Level</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="student_list">
                    <?php 
                        include 'conn.php';
                        $id = $_SESSION['user'];
                        $dept_id = $_SESSION['dept_id'];

                        $sql = "SELECT * FROM `student` INNER JOIN department  WHERE department.dept_id = '$dept_id' AND student.dept_id = '$dept_id'";
                        $result = $conn->query($sql);
                        if($result-> num_rows > 0){
                            while($row = $result-> fetch_assoc()){
                              echo "<tr><td>".$row["id"]."</td><td>".$row["s_fname"]." ".$row["s_mname"].". ".$row["s_lname"]."</td><td>".$row["dept_code"]."</td>"."<td>".$row["yrlvl"]."</td>";
                              echo "<td>
                                <button type='button' class='btn btn-primary payment'id=".$row["id"] ."><i class='fa fa-money'></i></button>
                                <button type='button' class='btn btn-success history'id=".$row["id"] ."><i class='fa fa-clock-o'></i></button></td></tr>";
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
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/plugins/pace.min.js"></script>
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
    $.ajax({
      url:"student_session.php",
      method:"post",
      data:{id:id},
      success:function(data){ 
        window.location.href = "student_payment.php";
      }
    });
  });

$("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    var $tblRows = $("#students_list > tbody > tr");
    $("#student_list tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
    </script> 
  </body>
</html>