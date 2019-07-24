<?php 
include 'conn.php';
	 $id = $_POST['id'];

                        
	 $sql = "SELECT * FROM `student` WHERE id = '$id'";
     $result = $conn->query($sql);
        if($result-> num_rows > 0){
            while($row = $result-> fetch_assoc()){
            	$fname = $row['s_fname'];
              $dept_id = $row['dept_id'];
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

                echo '<div style="float: left; width: 48%; margin-left: 20px;">
                			<div class="form-group">
                 				 <label class="control-label">Gender</label>
                  				<select class="form-control" name="gender" required="">
                  					<option>'.$row['gender'].'</option>
                   				 	<option>Male</option>
                    				<option>Female</option>
                  				</select>
               			 	</div>';
                       $course = "";
                        $sql2 = "SELECT * FROM department WHERE dept_id = '$dept_id'";
                        $result1 = $conn->query($sql2);
                        if($result1-> num_rows > 0){
                            while($row1 = $result1-> fetch_assoc()){
                                $course = $row1['dept_code'];
                            }
                        }
               	echo '<div class="form-group">
                 				 <label class="control-label">Course:</label>
                  				<input class="form-control" type="text" name="mname" required="" disabled value='.$course.' >
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
                  		<label class="control-label">Address:</label>
                  			<textarea class="form-control"  name="address" required="">'.$row['address'].'</textarea>
                	 </div>';
               	echo "</div>";
            }
        }

 ?>