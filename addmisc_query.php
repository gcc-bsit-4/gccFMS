<?php  
include 'conn.php';
if(isset($_POST['add_misc'])){
$id = 1000;
$newbal = '';
$sql = "SELECT * FROM `miscellaneous`";
$result = $conn->query($sql);
  if($result-> num_rows > 0){
      while($row = $result-> fetch_assoc()){
      	$id++;
      }
  }
		$misc = filter_input(INPUT_POST, 'misc_des');
		$amount = filter_input(INPUT_POST, 'misc_amount');
		$sql1 = "INSERT INTO `miscellaneous`(`msc_id`, `description`, `amount`, `dept_id`) VALUES ('$id','$misc','$amount','$course')";
		
		if($conn->query($sql1)){
			echo "<script>
					alert('Miscellaneous has been Successfuly Added!');
			</script>";
		}else{
			echo "<script>
					alert('Fail to Add this Miscellaneous');
			</script>";
		}
}
$conn->close();
?>
