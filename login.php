<?php 
	
	include 'conn.php';


	if(isset($_POST['login'])){ // Admin
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sql = "SELECT * FROM admin WHERE username = '$username'";
		$query = $conn->query($sql);
		if($query->num_rows > 0){
			$row = $query->fetch_assoc();
		if(password_verify($password,$row['password'])){
			$_SESSION['user'] = $row['username'];
			$_SESSION['user_type'] = 'Admin';
			header('location: dashboard.php');
		}else{
			echo "<script>
					alert('Invalid Account!');
			</script>";
		}
		}else{
			echo "<script>
					alert('Invalid Account!');
			</script>";

		}

	}else if(isset($_POST['login1'])){ // Student
		$idnum = $_POST['idnum'];
		$password =  $_POST['password'];
		$sql = "SELECT * FROM user WHERE username = '$idnum'  AND (user_type = 'Student' OR user_type = 'Dean' OR user_type = 'Treasurer')";
		$query = $conn->query($sql);
		if($query->num_rows > 0){
			$row = $query->fetch_assoc();
		if(password_verify($password,$row['password'])){
			$_SESSION['user_type'] = $row['user_type'];
			if($row['user_type'] == "Dean"){
				$id = $row['user_id'];
				$_SESSION['user'] = $row['user_id'];
				$sql = "SELECT * FROM prog_head WHERE id = '$id'";
				$query = $conn->query($sql);
				if($query->num_rows > 0){
					$row = $query->fetch_assoc();
					$_SESSION['dept_id'] = $row['dept_id'];
				}
				header('location: proghead_dashboard.php');

			}else if($row['user_type'] == "Student" || $row['user_type'] == "Treasurer"){
				$id = $row['user_id'];
				$_SESSION['user'] = $row['user_id'];
				$sql = "SELECT * FROM student WHERE id = '$id'";
				$query = $conn->query($sql);
				if($query->num_rows > 0){
					$row = $query->fetch_assoc();
					$_SESSION['dept_id'] = $row['dept_id'];
				}
				header('location: student_panel.php');
			}
		}else{
			echo "<script>
					alert('Invalid Account!');
			</script>";
		}
		}else{
			echo "<script>
					alert('Invalid Account!');
			</script>";

		}
	}
	
 ?>