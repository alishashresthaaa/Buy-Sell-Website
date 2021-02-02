<?php 
	session_start();
	include_once 'dbh-inc.php';
	$email=$_SESSION['u_email'];
	$sql="DELETE  FROM users WHERE email='$email'";
	mysqli_query($conn ,$sql);
	header("Location:../index.php");
	exit();


 ?>