 <?php 
  include 'addstudent_query.php';
?>
<style type="text/css">
  #student label{
    font-weight: bold;
    color:#009688;
  }
</style>
<div class="modal fade" id="backup">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header" style="background-color: #009688; color:white;">
        <center>
          <h4><i class="fa fa-form"></i> New Student Form</h4>
        </center>
        <button type="button" class="close" data-dismiss = "modal" style="outline: none;">&times;</button>
      </div>
      <form action="student.php" method="post">
      <div class="modal-body" id="student" style="position: center;">
        <div style="width: 48%;float: left;">
               <div class="form-group">
                  <label class="control-label">ID Number:</label>
                  <input class="form-control" type="number" name="idnum" required="">
                </div>
                <div class="form-group">
                  <label class="control-label">Firstname:</label>
                  <input class="form-control" type="text" name="fname" required="">
                </div>
                <div class="form-group">
                  <label class="control-label">Surname:</label>
                  <input class="form-control" type="text" name="sname" required="">
                </div>
                <div class="form-group">
                  <label class="control-label">Middle Initial:</label>
                  <input class="form-control" type="text" name="mname" required="">
                </div>
          </div>
          <div style="float: left; width: 48%; margin-left: 20px;">
                <div class="form-group">
                  <label class="control-label">Gender</label>
                  <select class="form-control" name="gender" required="">
                    <option>Male</option>
                    <option>Female</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="control-label">Course</label>
                  <select class="form-control" name="course" required="" readonly>
                    <?php 
                        include 'conn.php';
                        $id = $_SESSION['user'];
                        $dept = $_SESSION['dept_id'];
                        $dept_id = '';
                        $sql1 = "SELECT * FROM department WHERE dept_id = '$dept'";
                        $result = $conn->query($sql1);
                        if($result-> num_rows > 0){
                            while($row = $result-> fetch_assoc()){
                                 $course = $row['dept_id'];
                                     $dept_id = $row['dept_id'];
                                     echo '<option>'.$row['dept_code'].'</option>';
                            }
                        }
                        echo '<input value='.$dept_id.' name="dept_id" style="display:none;"></input>';
                     ?>
                  </select>
                </div>
                <div class="form-group">
                  <label class="control-label">Year Level</label>
                  <select class="form-control" name="yrlvl" required="">
                    <option>1st</option>
                    <option>2nd</option>
                    <option>3rd</option>
                    <option>4th</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="control-label">Address:</label>
                  <textarea class="form-control"  name="address" required=""></textarea>
                </div>
            </div>
      </div>
      <div class="modal-footer" style="clear: both;">
        
          <button class="btn btn-success" type="submit" name="add_student" ><i class="fa fa-check"></i>Save</button>
          <button class="btn btn-danger" type="button" data-dismiss = "modal"><i class="fa fa-times"></i>Close</button>
        
        </form>
      </div>
      </div>
    </div>
  </div>