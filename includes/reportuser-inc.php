<?php 
	session_start();
	include_once 'dbh-inc.php';
	if (isset($_GET['submitfeed'])) {
		$mydate= date("Y-m-d H:i:s");
		$useremail= $_GET['useremail'];
		$reporter=$_SESSION['u_email'];
		$report=$_GET['reportreason'];
		$bookid=$_GET['bookid'];
		
		print "$useremail";

		 $sql="INSERT INTO reportuser (culprit, reporter, reportreason, mydate) VALUES ('$useremail', '$reporter', '$report' ,'$mydate')";
		 mysqli_query($conn, $sql);
		 header("Location: ../userProfile.php?useremail=$useremail&reportUser");
		 exit();
	}


 ?>