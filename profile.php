<?php 
	session_start(); 
	include_once 'includes/dbh-inc.php';
		$id=$_SESSION['u_email'];

		$sql="SELECT * FROM users where email= '$id'";
		$result=mysqli_query($conn, $sql);
		while($row=mysqli_fetch_array($result))
		{
			$fname="$row[fname]";
			$lname="$row[lname]";
			$email="$row[email]";
			$usertype="$row[usertype]";
			$createdate="$row[createdate]";

		}
?>



<!-- Include Header -->
<div><?php include_once 'browseHeader.php'; ?></div>

	<div class="container" style="padding: 100px;">		
		<div class="row justify-content-center">
			<div class="col-md-8" >
				<p class="caption">This is your profile information.</p>	
				<!-- Card for the user profile -->
				<div class="card">
					<!-- Header -->
					<div class="card-header">
						<h2 class="header">My profile</h2>	
					</div>

					<!-- User information -->
					<div class="card-body">
						<table class="borderless title">
							<tr>
								<td width="40%"><b>First Name: </b></td>
								<td><?php print "$fname"; ?></td>
							</tr>
							<tr>
								<td><b>Last Name: </b></td>
								<td><?php print "$lname"; ?></td>
							</tr>
							<tr>
								<td><b>Email: </b></td>
								<td><?php print "$email"; ?></td>
							</tr>
							<tr>
								<td><b>User Type: </b></td>
								<td><?php print "$usertype"; ?></td>
							</tr>
							<tr>
								<td><b>Profile Created: </b></td>
								<td><?php print "$createdate"; ?></td>
							</tr>
						</table>
					</div>



					<!-- Footer to change password -->
					<div class="card-footer">
						<?php 
								$fullUrl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
								if(strpos($fullUrl, "pwdError") == true){
									print "<p class='displayError'>! Old Password doesnot match</p>";
								}

								if(strpos($fullUrl, "pwdChanged") == true){
									print "<p class='displayError'>! Your password has been changed</p>";
								}
							?> 
						<button class="button" type="submit" value="submit" name="submit" id="request"  data-toggle="collapse" data-target="#changePwd">Change your password</button>
						<div id="changePwd" class="collapse">

							<!-- Dropdown toggle for change password -->
							<div class="card-body">
							<form method="post" name="myForm" onsubmit="return errorDisplay()" action="includes/changepassword-inc.php" enctype="multipart/form-data">
								<div class="form-group" >
									<label for="pass">Current password :</label>
									<input type="text" class="form-control" name="pass" placeholder="Enter your current password" autocomplete="off" >
									<span id="passError" class="displayError"></span>
								</div>

								<div class="form-group">
									<label for="newPwd">New Password :</label>
									<input type="text" name="newPwd" class="form-control" placeholder="Enter new password" autocomplete="off">
									<span id="npassError" class="displayError"></span>
								</div>	

								<div class="form-group">
									<label for="rePwd">Re-enter password :</label>
									<input type="text" name="rePwd" class="form-control" placeholder="Re-enter new password" autocomplete="off">
									<span id="rpassError" class="displayError"></span>
								</div>
								
								<button type="submit" class="btn btn-success" name="update" onclick="return changePwd()">Change Password</button>
							</form>

							
							</div>							
						</div>
					</div>				


					<!-- Footer to delete profile -->
					<div class="card-footer">
						<a href="includes/deleteprofile-inc.php"><button class="button" style="background-color: red;" type="submit" value="submit" name="submit" id="request" onclick="return deleteProfile()">Delete Your Profile</button></a>
					</div>
				</div>
			</div>
		
		</div>
	</div>



<div><?php include_once 'footer.php'; ?></div>



<!-- Javascript -->
<script src="js/changePassword.js"></script>

<script type="text/javascript">
	function changePwd()
	{
		var retVal = confirm("Do you really want to change your password?");
        if( retVal == true ) {
            return true;
         } else {                
            return false;
         }
	}

	function deleteProfile()
	{
		var retVal = confirm("Do you really want to delete your account?");
        if( retVal == true ) {
            return true;
         } else {                
            return false;
         }
	}
</script>