<?php  
session_start();

// if the request to purchse the book from the buyer is to be deleted by the buyer himself
if(isset($_GET['delete']))
	{
		include_once 'dbh-inc.php';
		$bookid=$_GET['bookid'];
		$status="on display";
		$buyer="";
	
		$sql="UPDATE book SET status='$status' , buyer='$buyer' WHERE bookid='$bookid' ";
		mysqli_query($conn ,$sql);
		header("Location: ../myPurchase.php");
		exit();
	}


// if the request to purchse the book from the buyer is to be rejected
	// if(isset($_POST['reject']))
	// {
	// 	include_once 'dbh-inc.php';
	// 	$bookid=$_SESSION['bookid'];
	// 	$status="on display";
	
	// 	$sql="UPDATE book SET status='$status' WHERE bookid='$bookid'";
	// 	mysqli_query($conn ,$sql);
	// 	header("Location: ../mySales.php");
	// 	exit();
	// }

?>