<?php  
include 'conn.php';
if(isset($_POST['add_payment']) AND !isset($_POST['update'])){
		$new_amount = 0;
		$id = filter_input(INPUT_POST, 'id');
		$msc_id = filter_input(INPUT_POST, 'msc_id');
		$bal = filter_input(INPUT_POST, 'bal');
		$payment = filter_input(INPUT_POST, 'payment_st');
		$curr_payment = 0;
		$newbal = $bal-$payment;
		$sql1 = "SELECT * FROM `student` WHERE `id`='$id'";
		$result = $conn->query($sql1);
		if($result-> num_rows > 0){
			$row = $result-> fetch_assoc();
			$curr_payment = $row['payment'];
		}
		$new_payment = $curr_payment + $payment;
		$sql1 = "UPDATE `student` SET `payment`='$new_payment' WHERE `id`='$id'";
		$sql2 = "INSERT INTO `payment_history`(`dept_id`, `st_id`, `user_id`, `amount`) VALUES ('$dept_id','$id','$user_id','$payment')";
		if($conn->query($sql1) && $conn->query($sql2)){
			echo "<script>
					alert('Transaction Complete');
			</script>";
		}else{
			echo "<script>
					alert('Transaction Fail');
			</script>";
		}
		$sql = "SELECT * FROM `payments` WHERE `st_id`='$id' AND msc_id = '$msc_id'";
		$result = $conn->query($sql);
		if($result-> num_rows > 0){
		   $row = $result-> fetch_assoc();
		   $paid_amount = $row['amount'];
		   $new_amount = $paid_amount+$payment;
			$sql_update= "UPDATE `payments` SET `amount`='$new_amount' WHERE `st_id`='$id' AND msc_id = '$msc_id'";
			$conn->query($sql_update);
		}else{
			$sql_insert = "INSERT INTO `payments`(`st_id`, `msc_id`, `amount`) VALUES ('$id','$msc_id','$payment')";
			$conn->query($sql_insert);
		}
	}
$conn->close();
?>
