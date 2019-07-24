<?php 
include 'conn.php';
   session_start();
   $dept_id = $_SESSION['dept_id'];
   $id = $_POST['id'];

   $sql = "SELECT * FROM `student` INNER JOIN department  WHERE department.dept_id = '$dept_id' AND id = '$id'";
     $result = $conn->query($sql);
        if($result-> num_rows > 0){
            while($row = $result-> fetch_assoc()){
              $fname = $row['s_fname'];
           echo '<div style="width: 48%;float: left;">
                    <div class="form-group">
                         <label class="control-label">ID Number:</label>
                          <input class="form-control" type="number" name="idnum" required="" readonly value='.$row['id'].'>
                      </div>';
                echo "<div class=form-group>
                         <label class=control-label>Firstname:</label>
                          <input class=form-control type=text name=fname required value='$fname'>
                      </div>";
                echo '<div class="form-group">
                         <label class="control-label">Lastname:</label>
                          <input class="form-control" type="text" name="sname" required="" value='.$row['s_lname'].'>
                      </div>';
                echo '<div class="form-group">
                         <label class="control-label">Middle Name:</label>
                          <input class="form-control" type="text" name="mname" required="" value='.$row['s_mname'].'>
                      </div>';
                echo "</div>";

                echo '<div style="float: left; width: 48%; margin-left: 20px;">';
                      
                echo '<div class="form-group">
                         <label class="control-label">Course:</label>
                          <input class="form-control" type="text" name="mname" required="" disabled value='.$row['dept_code'].' >
                      </div>';

                echo '<div class="form-group">
                         <label class="control-label">Gender</label>
                          <select class="form-control" name="yrlvl" required="">
                            <option>'.$row['yrlvl'].'</option>
                            <option>1st</option>
                            <option>2nd</option>
                            <option>3rd</option>
                            <option>4th</option>
                          </select>
                      </div>';
                echo '<div class="form-group">
                         <label class="control-label">Password:</label>
                          <input class="form-control" type="password" name="password" required="" value="">
                      </div>';
                echo '<div class="form-group">
                         <label class="control-label">Confrim Password</label>
                          <input class="form-control" type="password" name="password1" required="" value="">
                      </div>';
                echo "</div>";

                echo "</div>";
            }
        }

 ?>