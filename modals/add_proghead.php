<?php 
  include 'addproghead_query.php';
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
          <h4><i class="fa fa-form"></i> New Program Head Form</h4>
        </center>
        <button type="button" class="close" data-dismiss = "modal" style="outline: none;">&times;</button>
      </div>
      <form action="program_heads.php" method="post">
      <div class="modal-body" id="student" style="position: center;">
        <div style="width: 48%;float: left;">
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
                <div class="form-group">
                  <label class="control-label">Gender</label>
                  <select class="form-control" name="gender" required="">
                    <option>Male</option>
                    <option>Female</option>
                  </select>
                </div>
          </div>
          <div style="float: left; width: 48%; margin-left: 20px;">
                
                <div class="form-group">
                  <label class="control-label">Course</label>
                  <select class="form-control" name="course" required="">
                    <?php 
                        include 'conn.php';
                        $sql = "SELECT * FROM `department` WHERE prog_head = ''";
                        $result = $conn->query($sql);
                        if($result-> num_rows > 0){
                            while($row = $result-> fetch_assoc()){

                              echo '<option value='.$row['dept_id'].'>'.$row['dept_code'].'</option>';
                            }
                        }
                        
                     ?>
                  </select>
                </div>
                <div class="form-group">
                  <label class="control-label">Password</label>
                  <input class="form-control" type="password" name="password" required="">
                </div>
                <div class="form-group">
                  <label class="control-label">Confirm Passwowrd</label>
                  <input class="form-control" type="password" name="password1" required="">
                </div>
            </div>
      </div>
      <div class="modal-footer" style="clear: both;">
        
          <button class="btn btn-success" type="submit" name="add_proghead" ><i class="fa fa-check"></i>Save</button>
          <button class="btn btn-danger" type="button" data-dismiss = "modal"><i class="fa fa-times"></i>Close</button>
        
        </form>
      </div>
      </div>
    </div>
  </div>