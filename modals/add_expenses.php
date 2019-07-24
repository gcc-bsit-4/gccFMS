
<?php 
  include 'conn.php';
  // session_start();

    if(isset($_SESSION['user'])){
      $username = $_SESSION['user'];
    }else{
      header('location: index.php');
    }
                        $id = $_SESSION['user'];
                        $dept_id = $_SESSION['dept_id'];
                        $course = '';
                        $sql1 = "SELECT * FROM `department` WHERE dept_id = '$dept_id'";
                        $result = $conn->query($sql1);
                        if($result-> num_rows > 0){
                            while($row = $result-> fetch_assoc()){
                                $course = $row['dept_id'];
                                
                            }
                        }
  include 'addexpense_query.php';
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
          <h4><i class="fa fa-form"></i> New Expenses Form</h4>
        </center>
        <button type="button" class="close" data-dismiss = "modal" style="outline: none;">&times;</button>
      </div>
      <form action="expenses.php" method="post">
      <div class="modal-body" id="student" style="position: center;">

                <div class="form-group">
                  <label class="control-label">Description:</label>
                  <input class="form-control" type="text" name="misc_des" required="">
                </div>
               <div class="form-group">
                  <label class="control-label">Amount:</label>
                  <input class="form-control" type="number" name="misc_amount" required="">
                </div>
      </div>
      <div class="modal-footer">
        
          <button class="btn btn-success" type="submit" name="add_exp" ><i class="fa fa-check"></i>Save</button>
        <button class="btn btn-danger" type="button" data-dismiss = "modal"><i class="fa fa-times"></i>Close</button>
        </form>
      </div>
      </div>
    </div>
  </div>