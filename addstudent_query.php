<?php  
include 'conn.php';
if(isset($_POST['add_student']) AND !isset($_POST['update'])){
		$id = filter_input(INPUT_POST, 'idnum');
		$sname = filter_input(INPUT_POST, 'sname');
		$fname = filter_input(INPUT_POST, 'fname');
		$mname = filter_input(INPUT_POST, 'mname');
		$add = filter_input(INPUT_POST, 'address');
		$gen = filter_input(INPUT_POST, 'gender');
		$yrlvl = filter_input(INPUT_POST, 'yrlvl');
		$dept_id = filter_input(INPUT_POST, 'dept_id');
		$password = password_hash($id,PASSWORD_DEFAULT);

		$sql1 = "INSERT INTO `student`(`id`, `dept_id`,`s_lname`, `s_fname`, `s_mname`, `gender`,  `yrlvl`, `address`, `position`) VALUES ('$id','$dept_id','$sname','$fname','$mname','$gen','$yrlvl','$add','')";
		$sql2 = "INSERT INTO `user`(`user_id`,`fname`, `lname`, `username`, `password`, `user_type`) VALUES ('$id','$fname','$sname','$id','$password','Student')";
		if($conn->query($sql1) && $conn->query($sql2)){
			echo "<script>
					alert('Student has been Successfuly Added!');
			</script>";
		}else{
			echo "<script>
					alert('Fail to Add this student');
			</script>";
		}
	}
$conn->close();
?>
