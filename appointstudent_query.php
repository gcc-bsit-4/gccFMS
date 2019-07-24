<?php  
include 'conn.php';
if(isset($_POST['appoint_student'])){
		$id = filter_input(INPUT_POST, 'idnum');
		$pass1 = filter_input(INPUT_POST, 'password');
		$pass2 = filter_input(INPUT_POST, 'password1');
		$pass3 =  password_hash($pass1, PASSWORD_DEFAULT);
		$sql1 = "UPDATE `student` SET `position`='Treasurer' WHERE `id`='$id'";
		$sql2 = "UPDATE `user` SET `user_type`='Treasurer',`password`='$pass3' WHERE `username`='$id'";
	if($pass1 == $pass2){
		if($conn->query($sql1) &&  $conn->query($sql2)){
			echo "<script>
					alert('Student has been Successfuly Appointed into treasurer');
			</script>";
		}else{
			echo "<script>
					alert('Fail to Appoint this student');
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
