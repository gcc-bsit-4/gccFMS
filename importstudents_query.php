<?php
include 'conn.php';
 if(isset($_POST["import_student"])){
    
    $filename=$_FILES["file"]["tmp_name"];    
     if($_FILES["file"]["size"] > 0)
     {
        $file = fopen($filename, "r");
          while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
           {
             $sql = "INSERT INTO `student`(`id`, `stud_id`, `dept_id`, `s_lname`, `s_fname`, `s_mname`, `gender`, `yrlvl`, `address`, `position`, `payment`)
                   values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."','".$getData[5]."','".$getData[6]."','".$getData[7]."','".$getData[8]."','".$getData[9]."','".$getData[10]."')";
                   // $result = mysqli_query($con, $sql);
        if($conn->query($sql))
        {
          $password = password_hash($getData[0],PASSWORD_DEFAULT);
          $sql2 = "INSERT INTO `user`(`user_id`,`fname`, `lname`, `username`, `password`, `user_type`) VALUES ('".$getData[0]."','".$getData[4]."','".$getData[3]."','".$getData[0]."','".$password."','Student')";
          $conn->query($sql2);
          echo "<script type=\"text/javascript\">
            alert(\"CSV File has been successfully Imported.\");
            window.location = \"student.php\"
          </script>";
        }
        else {
           
          echo "<script type=\"text/javascript\">
              alert(\"Invalid File:Please Upload CSV File.\");
              window.location = \"student.php\"
              </script>";  
        }
           }
      
           fclose($file);  
     }
  }   
 ?>