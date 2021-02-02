

 <?php 
	include_once 'dbh-inc.php';
	session_start();
	if(isset($_GET['submit']))
	{
		$bookname=$_GET['bookname'];
		$useremail=$_GET['useremail'];
		$bookid=$_GET['bookid'];
		$buyer=$_SESSION['u_email'];
		$mydate= date("Y-m-d H:i:s");
		$sql="UPDATE book SET status='pending', buyer='$buyer' , ondate='$mydate'  WHERE bookid='$bookid'";
		$result=mysqli_query($conn,$sql);
		$to=$useremail;
		$subject= "Request to Buy Book";
		$message= "Your book $bookname was requested by $buyer. Please visit the site for further action.";
		$headers= "From: buyandsellbyalisha@gmail.com". "\r\n";
		$headers .= "MIME-Version: 1.0". "\r\n";
		$headers .= "Content-type:text/html;charset-UTF-8". "\r\n";
		mail($to, $subject, $message, $headers);
		header("Location: ../book-details.php?bookid=$bookid&RequestSent");
		exit();
	}

 ?>

