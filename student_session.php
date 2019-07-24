<?php 
include 'conn.php';
session_start();
$st_id = $_POST['id'];
$_SESSION['student_id'] = $st_id;
header('location: student_payment.php');
?>