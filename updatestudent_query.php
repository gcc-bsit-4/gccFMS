<?php  
include 'conn.php';
if(isset($_POST['update_student'])){
		$id = filter_input(INPUT_POST, 'idnum');
		$sname = filter_input(INPUT_POST, 'sname');
		$fname = filter_input(INPUT_POST, 'fname');
		$mname = filter_input(INPUT_POST, 'mname');
		$add = filter_input(INPUT_POST, 'address');
		$gen = filter_input(INPUT_POST, 'gender');
		$yrlvl = filter_input(INPUT_POST, 'yrlvl');
		$course = filter_input(INPUT_POST, 'course');
		

		$sql1 = "UPDATE `student` SET `s_fname`='$fname',`s_mname`='$mname',`s_lname`='$sname',`gender`='$gen',`yrlvl`='$yrlvl',`address`='$add' WHERE `id`='$id'";
		if($conn->query($sql1)){
			echo "<script>
					alert('Student has been Successfuly Updated!');
			</script>";
		}else{
			echo "<script>
					alert('Fail to Update this student');
			</script>";
		}
	}
$conn->close();
?>
