<?php 
    include 'conn.php';
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
            <h3 class="tile-title">List Of Students</h3>
           <div style="overflow-x:auto;">
          <form class="form-inline">
            <select class="form-control" name="slcted_yrlvl">
              <option>--All Year Level--</option>
              <option>1st</option>
              <option>2nd</option>
              <option>3rd</option>
              <option>4th</option>
            </select>&nbsp;&nbsp;&nbsp;
            <select class="form-control" name="slcted_paystat">
              <option>--Payment Status--</option>
              <option>Paid</option>
              <option>Unpaid</option>
            </select>&nbsp;&nbsp;&nbsp;
            <select class="form-control" name="slcted_msc">
              <option>--All Miscellaneous--</option>
              <?php 
                   $dept_id = $_SESSION['dept_id'];
                   $sql = "SELECT * FROM  `miscellaneous` WHERE dept_id = '$dept_id'";
                        $result = $conn->query($sql);
                        if($result-> num_rows > 0){
                            while($row = $result-> fetch_assoc()){
                              $desc = $row["description"];
                              echo "<option>$desc</option>";
                            }
                        }
               ?>
            </select>&nbsp;&nbsp;&nbsp;
            </form>
            <div style="float: right;">
              <input class="form-control" type="text" placeholder="Search" id="search" onkeyup ="myFunction()" >
            </div>
          </div>
            <hr>
            <?php 
                include 'modals/add_payment.php';
             ?>
            <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr style="background-color: #009688; color:white;">
                    <th>ID number</th>
                    <th>Name</th>
                    <th>Year Level</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                        include 'conn.php';
                        $id = $_SESSION['user'];
                        $course = '';
                        $sql1 = "SELECT * FROM `prog_head` WHERE id = '$id'";
                        $result = $conn->query($sql1);
                        if($result-> num_rows > 0){
                            while($row = $result-> fetch_assoc()){
                                $course = $row['dept_id'];
                            }
                        }

                        $sql = "SELECT * FROM department INNER JOIN `student` ON department.dept_id = student.dept_id";
                        $result = $conn->query($sql);
                        if($result-> num_rows > 0){
                            while($row = $result-> fetch_assoc()){
                              if($row["dept_id"] == $course){
                                $id = $row['id'];
                              echo "<tr><td>".$row["id"]."</td><td>".$row["s_fname"]." ".$row["s_mname"].". ".$row["s_lname"]."</td><td>".$row["yrlvl"]."</td>";
                              echo "<td>
                                <button type='submit' class='btn btn-primary payment'id=".$row["id"] ."><i class='fa fa-money'></i></button>
                                <button type='button' class='btn btn-success history'id=".$row["id"] ."><i class='fa fa-clock-o'></i></button>
                               <input value='$id' name='st_id' style= 'display:none;'></input>
                               </td></tr>";
                              }
                            }
                        }
                     ?>
                </tbody>
              </table>
            
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
    $.ajax({
      url:"student_session.php",
      method:"post",
      data:{id:id},
      success:function(data){ 
        window.location.href = "student_payment.php";
      }
    });
  });
});
    </script> 
  </body>
</html>