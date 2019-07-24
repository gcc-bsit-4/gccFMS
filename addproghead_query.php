<?php  
include 'conn.php';
if(isset($_POST['add_proghead'])){
$id = 1001;
$sql = "SELECT * FROM `prog_head`";
$result = $conn->query($sql);
  if($result-> num_rows > 0){
      while($row = $result-> fetch_assoc()){
      	$id++;
      }
  }
		$sname = filter_input(INPUT_POST, 'sname');
		$fname = filter_input(INPUT_POST, 'fname');
		$mname = filter_input(INPUT_POST, 'mname');
		$gen = filter_input(INPUT_POST, 'gender');
		$course = filter_input(INPUT_POST, 'course');
		$pass = filter_input(INPUT_POST, 'password');
		$pass1 = filter_input(INPUT_POST, 'password1');
		$pass2 =  password_hash($pass, PASSWORD_DEFAULT);
		$sql1 = "INSERT INTO `prog_head`(`id`, `fname`, `mname`, `sname`, `gender`, `dept_id`, `timestamp`) VALUES ('$id','$fname','$mname','$sname','$gen','$course','')";
		$sql2 = "INSERT INTO `user`(`user_id`,`fname`, `lname`, `username`, `password`, `user_type`) VALUES ('$id','$fname','$sname','$id','$pass2','Dean')";
		$sql3 = "UPDATE `department` SET `prog_head`='$id' WHERE `dept_id`='$course'";
	if($pass == $pass1){
		if($conn->query($sql1) && $conn->query($sql2) && $conn->query($sql3)){
			echo "<script>
					alert('Program Head has been Successfuly Added!');
			</script>";
		}else{
			echo "<script>
					alert('Fail to Add this Program Head');
			</script>";
		}
	}else{
			echo "<script>
					alert('Password did not match!');
			</script>";
	}
}
$conn->close();
?>
