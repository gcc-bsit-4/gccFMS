
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
          <h1><i class="fa fa-user"></i> Student</h1>
          
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-user fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Student</a></li>
        </ul>
      </div>
      
      <div class="row">
        <div class="" style="width: 100%;">
          <div class="tile">
            <h3 class="tile-title">List of Students</h3>
          <div style="overflow-x:auto;">
            <form class="form-inline">
            <button class="btn btn-success backup" type="button"><i class="fa fa-plus"> </i> New </button>&nbsp;&nbsp;
            <button class="btn btn-success import" type="button"><i class="fa fa-file"> </i> Import</button>&nbsp;&nbsp;&nbsp;&nbsp;<br><br><br><br>
            <select class="form-control"  id="slcted_yrlvl" >
              <option>--All Year Level--</option>
              <option>1st</option>
              <option>2nd</option>
              <option>3rd</option>
              <option>4th</option>
            </select>&nbsp;&nbsp;
            </form>
            <div style="float: right;">
              <input class="form-control" type="text" placeholder="Search" id="search" onkeyup ="myFunction()" >
            </div>
          </div>
            <hr>
            <?php 
                include 'modals/add_student.php';
                include 'modals/view_student.php';
                include 'modals/appoint_student.php';
                include 'modals/import_student.php';
            ?>
            <div style="overflow-x:auto;">
            <table class="table table-hover table-bordered" id="students_list" >
                <thead>
                  <tr style="background-color: #009688; color:white;">
                    <th>ID number</th>
                    <th>Name</th>
                    <th>Year Level</th>
                    <th>Position</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="student_list">
                    <?php 
                        include 'conn.php';
                        $id = $_SESSION['user'];
                        $dept_id = $_SESSION['dept_id'];
                        $course = "";
                        $total = 0;
                        $sql = "SELECT * FROM `department` INNER JOIN student  WHERE department.dept_id = '$dept_id'";
                        $result = $conn->query($sql);
                        if($result-> num_rows > 0){
                          while($row = $result-> fetch_assoc()){
                            if($row['dept_id'] == $dept_id){
                                  echo "<tr><td>".$row["id"]."</td><td>".$row["s_fname"]." ".$row["s_mname"].". ".$row["s_lname"]."</td><td>".$row["yrlvl"]."</td>"."<td>".$row["position"]."</td>";
                                  echo "<td>
                                        <button type='button' class='btn btn-primary update_student' id=".$row["id"] ."><i class='fa fa-pencil'></i></button>
                                        <button type='button' class='btn btn-success appoint_student' id=".$row["id"] ."><i class='fa fa-hand-o-up'></i></button>
                                      <button type='button' class='btn btn-danger remove_student' id=".$row["id"] ."><i class='fa fa-trash-o'></i></button></td></tr>"; 
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
  </body>
   
<script>
$(document).ready(function(){
$('.update_student').click(function(){
    var id = $(this).attr("id");
    $('#update_form').modal("show"); 
    $.ajax({
      url:"viewstudent.php",
      method:"post",
      data:{id:id},
      success:function(data){
        $('#student_info').html(data);
      }
    });
  });

$('.appoint_student').click(function(){
    var id = $(this).attr("id");
    $('#appoint_form').modal("show"); 
    $.ajax({
      url:"apoointstudent.php",
      method:"post",
      data:{id:id},
      success:function(data){
        $('#student_appoint').html(data);
      }
    });
  });

  $('.backup').click(function(){
  $('#backup').modal("show");
  });

  $('.import').click(function(){
  $('#import').modal("show");
  });

$("#slcted_yrlvl").on("change", function() {
    var value = $(this).val().toLowerCase();
    var $tblRows = $("#students_list > tbody > tr");
  if(value != '--all year level--'){
    $("#student_list tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  }else if(value == '--all year level--'){
    $tblRows.show();
  }
  });

$("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    var $tblRows = $("#students_list > tbody > tr");
    $("#student_list tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
});

</script>
</html>