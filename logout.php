<?php 
session_start(); 

session_destroy();
unset($_SESSION['user']);
unset($_SESSION['dept_id']);
unset($_SESSION['student_id']);
header('location: index.php');
?>