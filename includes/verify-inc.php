<?php 
	
	if(isset($_POST['submit']))
	{
		include_once 'dbh-inc.php';

		$vkey=$_POST['vkey'];
		$sql="SELECT verified, vkey FROM users WHERE verified='0' AND vkey='$vkey' LIMIT 1";
		$result=mysqli_query($conn,$sql);
		$resultCheck=mysqli_num_rows($result);
		if($resultCheck==1)
			{
				$update="UPDATE users SET verified=1 WHERE vkey='$vkey' LIMIT 1";
				if(mysqli_query($conn,$update))
				{
					header('Location: ../login.php?login=verified');
					exit();
				}
			}
		else
		{
			header('Location: ../verify.php?verify=fail');
			exit();
		}

	}



 ?>