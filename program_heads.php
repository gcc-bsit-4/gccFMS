
<?php 
    session_start();

    if($_SESSION['user_type'] == "Dean"){
      header('location: student.php');
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
          <h1><i class="fa fa-group"></i> Program</h1>
          
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-group fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Program Heads</a></li>
        </ul>
      </div>
      
      <div class="row">
        <div class="" style="width: 100%;">
          <div class="tile">
            <h3 class="tile-title">List of Program Heads</h3>
            
            <button class="btn btn-success backup" type="button"><i class="fa fa-plus"> </i> New</button>
            <div class="left" style="float: right; font-weight: bold;">
              
              <input class="form-control" type="text" placeholder="Search">
            </div>
            <hr>
            <?php 
                include 'modals/add_proghead.php';
            ?>
            <div style="overflow-x:auto;">
            <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr style="background-color: #009688; color:white;">
                    <th>Account ID</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                        include 'conn.php';
                        $sql = "SELECT * FROM `prog_head` INNER JOIN department ON prog_head.dept_id = department.dept_id";
                        $result = $conn->query($sql);
                        if($result-> num_rows > 0){
                            while($row = $result-> fetch_assoc()){
                              echo "<tr><td>".$row["id"]."</td><td>".$row["fname"]." ".$row["mname"].". ".$row["sname"]."</td><td>".$row["dept_code"]."</td>";
                              echo "<td>
                                <button type='button' class='btn btn-primary update_data'id=".$row["id"] ."><i class='fa fa-pencil'></i></button>
                               
                                <button type='button' class='btn btn-danger remove'id=".$row["id"] ."><i class='fa fa-trash-o'></i></button></td></tr>";
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
   
<script>
$(document).ready(function(){
  $('.backup').click(function(){
  $('#backup').modal("show");
  });
 });
</script>
</html>