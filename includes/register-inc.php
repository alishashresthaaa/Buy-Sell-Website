<?php 
 require_once('../PHPMailer/PHPMailerAutoload.php');


if (isset($_POST['submit']))
{
	
	include_once 'dbh-inc.php';

	$fname=mysqli_real_escape_string($conn,$_POST['fname']);
	$lname=mysqli_real_escape_string($conn,$_POST['lname']);
	$email=mysqli_real_escape_string($conn,$_POST['email']);
	$pass=mysqli_real_escape_string($conn,$_POST['pass']);
	$rpass=mysqli_real_escape_string($conn,$_POST['rpass']);



		$sql="SELECT email FROM users WHERE email='$email'";
		$result=mysqli_query($conn,$sql);
		$resultCheck=mysqli_num_rows($result);
		if($resultCheck>0)
			{
					header("Location: ../register.php?register=EmailTaken");
					exit();
			}
			else{
				$vkey=md5(time().$email);
				$vkey=substr($vkey, 0,5);
				$vkey=strtoupper($vkey);

					$hashedPwd=password_hash($pass,PASSWORD_DEFAULT);
					$sql="INSERT INTO users (fname, lname, email, pass, vkey) VALUES ('$fname', '$lname', '$email',	'$hashedPwd', '$vkey')";
					if(mysqli_query($conn, $sql))
					{
						// $to=$email;
						// $subject= "Email Verification";
						// $message= "Register your account using this key: $vkey";
						// $headers= "From: buyandsellbyalisha@gmail.com". "\r\n";
						// $headers .= "MIME-Version: 1.0". "\r\n";
						// $headers .= "Content-type:text/html;charset-UTF-8". "\r\n";
						// mail($to, $subject, $message, $headers);

						$mail = new PHPMailer();
						$mail->isSMTP();
						$mail->SMTPAuth = true;
						$mail->SMTPSecure = 'ssl';
						$mail->Host = 'smtp.gmail.com';
						$mail->Port = '465';
						$mail->isHTML();
						$mail->Username = 'buyandsellbyalisha@gmail.com';
						$mail->Password = 'IgnoranceIsBliss';
						$mail->SetFrom('BuyandSell.org');
						$mail->Subject = 'Email Verification';
						$mail->Body = "Register your account using this key: $vkey";
						$mail->AddAddress($email);
						$mail->Send();

					}
					header("Location: ../verify.php");
					exit();			
				}			
}
	else{
		header("Location: ../verify.php");
		exit();
	}



?>

