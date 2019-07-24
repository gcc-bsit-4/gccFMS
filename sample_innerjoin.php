<?php 
	include 'conn.php';
	$sql = "SELECT * FROM student INNER JOIN department WHERE id = '2140141'";
	$result = $conn->query($sql);
  if($result-> num_rows > 0){
      while($row = $result-> fetch_assoc()){
      		echo $row['id'].' '.$row['description'];

      }
  }
  $password = password_hash('admin',PASSWORD_DEFAULT);
  echo $password;
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>