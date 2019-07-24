<?php 
  include 'importstudents_query.php';
?>
<style type="text/css">
  #student_info label{
    font-weight: bold;
    color:#009688;
  }
</style>
<div class="modal fade" id="import">
  <div class="modal-dialog modal-md ">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #009688; color:white;">
        <center>
          <h4><i class="fa fa-form"></i>  Import Student</h4>
        </center>
        <button type="button" class="close" data-dismiss = "modal" style="outline: none;">&times;</button>
      </div>
      <form action="student.php" method="post" enctype="multipart/form-data">
      <div class="modal-body" id="student_info" > 
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile" required="" name="file">
            <label class="custom-file-label" for="customFile" >Choose file</label>
          </div>
      </div>
      <div class="modal-footer" style="clear: both;">
          <button class="btn btn-success" type="submit" name="import_student" ><i class="fa fa-check"></i>Save</button>
          <button class="btn btn-danger" type="button" data-dismiss = "modal"><i class="fa fa-times"></i>Close</button>
        
        </form>
      </div>
      </div>
    </div>
  </div>
  <script>

</script>