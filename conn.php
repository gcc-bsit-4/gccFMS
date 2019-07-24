<?php 
	$conn = new mysqli('localhost','root','','gccis');

	if($conn->connect_error){
		die('Connection failed: '.$conn->connect_error);
	}
	$timezone = 'Asia/Manila';
	date_default_timezone_get($timezone);
	
 ?>