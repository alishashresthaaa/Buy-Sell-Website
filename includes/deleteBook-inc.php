<?php session_start(); ?>

<?php 


	if (isset($_GET['bookid'])) {
		include_once 'dbh-inc.php';

		$id= $_GET['bookid'];
		$sql="DELETE  FROM book WHERE bookid=$id";
		// print $id;
		mysqli_query($conn ,$sql);
		header("Location: ../list.php");
		exit();

}

	

	

 ?>