<?php  
session_start();

// if the request to purchse the book from the buyer is to be accepted
if(isset($_GET['accept']))
	{
		include_once 'dbh-inc.php';
		$bookid=$_GET['bookid'];
		$seller=$_GET['useremail'];
		$buyer=$_GET['buyer'];
		$book=$_GET['bookname'];
		$status="sold";
	
		$sql="UPDATE book SET status='$status' WHERE bookid='$bookid'";
		mysqli_query($conn ,$sql);
		$to=$buyer;
		$subject= "Request Accepted";
		$message= "Your buy resquest for book $bookname was accepted by $seller. Please visit the site and contact the seller for further action.";
		$headers= "From: buyandsellbyalisha@gmail.com". "\r\n";
		$headers .= "MIME-Version: 1.0". "\r\n";
		$headers .= "Content-type:text/html;charset-UTF-8". "\r\n";
		mail($to, $subject, $message, $headers);
		header("Location: ../mySales.php");
		exit();
	}


// if the request to purchse the book from the buyer is to be rejected
	if(isset($_GET['reject']))
	{
		include_once 'dbh-inc.php';
		$bookid=$_GET['bookid'];
		$status="on display";
		$seller=$_GET['useremail'];
		$buyer=$_GET['buyer'];
		$book=$_GET['bookname'];
	
		$sql="UPDATE book SET status='$status' , buyer=NULL WHERE bookid='$bookid'";
		mysqli_query($conn ,$sql);
		$to=$buyer;
		$subject= "Request Rejected";
		$message= "Your buy resquest for book $bookname was rejected by $seller. Please visit the site and seasrch for other seller with similar books.";
		$headers= "From: buyandsellbyalisha@gmail.com". "\r\n";
		$headers .= "MIME-Version: 1.0". "\r\n";
		$headers .= "Content-type:text/html;charset-UTF-8". "\r\n";
		mail($to, $subject, $message, $headers);
		header("Location: ../mySales.php");
		exit();
	}

?>