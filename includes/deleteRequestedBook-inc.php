
<?php 


	if (isset($_GET['requestid'])) {
		include_once 'dbh-inc.php';

		$id= $_GET['requestid'];
		$sql="DELETE  FROM request WHERE requestid='$id'";
		mysqli_query($conn ,$sql);
		header("Location: ../seeThoseRequest.php");
		exit();

}

	

	

 ?>


