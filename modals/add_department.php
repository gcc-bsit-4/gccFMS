<?php 
  include 'adddept_query.php';
?>
<style type="text/css">
  #student label{
    font-weight: bold;
    color:#009688;
  }
</style>
<div class="modal fade" id="backup">
  <div class="modal-dialog md">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #009688; color:white;">
        <center>
          <h4><i class="fa fa-form"></i> New Department Form</h4>
        </center>
        <button type="button" class="close" data-dismiss = "modal" style="outline: none;">&times;</button>
      </div>
      <form action="departments.php" method="post">
      <div class="modal-body" id="student" style="position: center;">
                <div class="form-group">
                  <label class="control-label">Department Code:</label>
                  <input class="form-control" type="text" name="dept_code" required="">
                </div>
                <div class="form-group">
                  <label class="control-label">Department Name:</label>
                  <input class="form-control" type="text" name="dept_name" required="">
                </div>
      </div>
      <div class="modal-footer" style="clear: both;">
        
          <button class="btn btn-success" type="submit" name="add_dept" ><i class="fa fa-check"></i>Save</button>
          <button class="btn btn-danger" type="button" data-dismiss = "modal"><i class="fa fa-times"></i>Close</button>
        
        </form>
      </div>
      </div>
    </div>
  </div>