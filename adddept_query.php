<?php  
include 'conn.php';
if(isset($_POST['add_dept']) AND !isset($_POST['update'])){
$id = 1000;
$sql = "SELECT * FROM `department`";
$result = $conn->query($sql);
  if($result-> num_rows > 0){
      while($row = $result-> fetch_assoc()){
      	$id++;
      }
  }
		$dept_name = filter_input(INPUT_POST, 'dept_name');
		$dept_code = filter_input(INPUT_POST, 'dept_code');

		$sql1 = "INSERT INTO `department`(`dept_id`,`dept_code`, `description`, `prog_head`) VALUES ('$id','$dept_code','$dept_name','')";
		if($conn->query($sql1)){
			echo "<script>
					alert('Department has been Successfuly Added!');
			</script>";
		}else{
			echo "<script>
					alert('Fail to Add this Department');
			</script>";
		}
	}
$conn->close();
?>
