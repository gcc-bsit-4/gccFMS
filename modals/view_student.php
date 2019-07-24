<?php 
  include 'updatestudent_query.php';
?>
<style type="text/css">
  #student_info label{
    font-weight: bold;
    color:#009688;
  }
</style>
<div class="modal fade" id="update_form">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #009688; color:white;">
        <center>
          <h4><i class="fa fa-form"></i>  Student Information</h4>
        </center>
        <button type="button" class="close" data-dismiss = "modal" style="outline: none;">&times;</button>
      </div>
      <form action="student.php" method="post">
      <div class="modal-body" id="student_info" >

      </div>
      <div class="modal-footer" style="clear: both;">
          <button class="btn btn-primary" type="button" name="print" ><i class="fa fa-print"></i>Print</button>
          <button class="btn btn-success" type="submit" name="update_student" ><i class="fa fa-check"></i>Save</button>
          <button class="btn btn-danger" type="button" data-dismiss = "modal"><i class="fa fa-times"></i>Close</button>
        
        </form>
      </div>
      </div>
    </div>
  </div>