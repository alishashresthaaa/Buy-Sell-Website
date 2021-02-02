<?php 

	
	session_start();
	if(isset($_POST['update']))
	{
		include_once 'dbh-inc.php';

		$oldPwd=mysqli_real_escape_string($conn,$_POST['pass']);
		$newPwd=mysqli_real_escape_string($conn,$_POST['newPwd']);
		$reNewPwd=mysqli_real_escape_string($conn,$_POST['rePwd']);
		$email=$_SESSION['u_email'];

		// Check if the old password iscorrect
		$sql="SELECT * FROM users WHERE email= '$email'";
		$result=mysqli_query($conn, $sql);
		$resultCheck=mysqli_num_rows($result);
		if($resultCheck<1)
		{
			header("Location: ../profile.php?profile=error");
			exit();
		}
		else
		{
			if ($row= mysqli_fetch_assoc($result)) 
			{
				//Dehashing the password
				$hashedPwdCheck= password_verify($oldPwd, $row['pass']);
				if($hashedPwdCheck == false)
				{
					header("Location: ../profile.php?pwdError");
					exit();			
				}		
				else
				{
					$hashedPwd=password_hash($newPwd,PASSWORD_DEFAULT);
					$sql="UPDATE users SET pass='$hashedPwd' WHERE email='$email'";
					$result=mysqli_query($conn,$sql);
					header("Location: ../login.php?pwdChanged");
					exit();
				 }
					

			}
					
		}
		
	}
	else{
		header("Location: ../profile.php?profile=error2");
			exit();
	}

 ?>