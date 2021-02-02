
<?php 

	if (isset($_GET['culprit'])) {
		include_once 'dbh-inc.php';

		$user= $_GET['culprit'];
	
		$sql="DELETE  FROM users WHERE email='$user'";
		mysqli_query($conn ,$sql);
		header("Location: ../userList.php");
		exit();

	}

	

 ?>


