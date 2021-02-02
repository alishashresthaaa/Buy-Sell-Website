
<?php 


	if (isset($_GET['feedbackid'])) {
		include_once 'dbh-inc.php';

		$id= $_GET['feedbackid'];
		$sql="DELETE  FROM feedbacks WHERE feedbackid='$id'";
		mysqli_query($conn ,$sql);
		header("Location: ../myFeedback.php");
		exit();

}

	

	

 ?>


