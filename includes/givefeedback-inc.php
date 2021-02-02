<?php session_start(); ?>

 
	<?php	
			include_once 'dbh-inc.php';
	if (isset($_GET['submitfeed'])) {


		$buyeremail=$_SESSION['u_email'];
		$useremail=$_GET['useremail'];
		$feedtitle=$_GET['feedtitle'];
	 	$feedComment=$_GET['feedComment'];
	 	$bookid=$_GET['bookid'];
		// print "The person who buys".$buyeremail;
		// print "The person who sells".$selleremail;
		// print "oie baulais";

		// print $feedtitle;
		// print $feedComment;

		 $sql="INSERT INTO feedbacks(sellerfeed, buyerfeed, feedtitle, feeds) VALUES( '$useremail', '$buyeremail', '$feedtitle', '$feedComment')";
		mysqli_query($conn,$sql);
		header("Location:../userProfile.php?useremail=$useremail&submitFeedback");
		exit();
			}
	 
	 		
	

 ?>

