<?php   
                        include 'conn.php';
                        session_start();
                        $yrlvl = $_POST['yrlvl'];
                        $dept_id = $_SESSION['dept_id'];
                        $course = "";
                        $total = 0;
                        if($yrlvl != '--All Year Level--'){
                        $sql = "SELECT * FROM `department` INNER JOIN student  WHERE department.dept_id = '$dept_id' AND student.yrlvl = '$yrlvl'";
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
                      }else{
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
                      }
echo "<script>
$(document).ready(function(){
$('.update_student').click(function(){
    var id = $(this).attr('id');
    $('#update_form').modal('show'); 
    $.ajax({
      url:'viewstudent.php',
      method:'post',
      data:{id:id},
      success:function(data){
        $('#student_info').html(data);
      }
    });
  });

$('.appoint_student').click(function(){
    var id = $(this).attr('id');
    $('#appoint_form').modal('show'); 
    $.ajax({
      url:'apoointstudent.php',
      method:'post',
      data:{id:id},
      success:function(data){
        $('#student_appoint').html(data);
      }
    });
  });

  $('.backup').click(function(){
  $('#backup').modal('show');
  });

$('#slcted_yrlvl').click(function(){
    var yrlvl = $(this).val();
    $.ajax({
      url:'filterstudent_query.php',
      method:'POST',
      data:{yrlvl:yrlvl},
      success:function(data){
        $('#student_list').html(data);
      }
    });
  });
  
  
});
</script>";
                     ?>
