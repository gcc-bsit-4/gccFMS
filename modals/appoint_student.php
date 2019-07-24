<?php 
  include 'appointstudent_query.php';
?>
<style type="text/css">
  #student_info label{
    font-weight: bold;
    color:#009688;
  }
</style>
<div class="modal fade" id="appoint_form">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #009688; color:white;">
        <center>
          <h4><i class="fa fa-form"></i>  Appoint Student</h4>
        </center>
        <button type="button" class="close" data-dismiss = "modal" style="outline: none;">&times;</button>
      </div>
      <form action="student.php" method="post">
      <div class="modal-body" id="student_appoint" >

      </div>
      <div class="modal-footer" style="clear: both;">
          <button class="btn btn-success" type="submit" name="appoint_student" ><i class="fa fa-check"></i>Save</button>
          <button class="btn btn-danger" type="button" data-dismiss = "modal"><i class="fa fa-times"></i>Close</button>
        
        </form>
      </div>
      </div>
    </div>
  </div>