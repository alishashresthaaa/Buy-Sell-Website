<div><?php include_once 'header.php' ?></div>

	<div class="container" style="padding-top: 100px;">
		<div class="row justify-content-center form-jar" style="height:350px;">
			<div class="col-md-8">
				<h3 class="header">Login here</h3>
				<p class="header-info" >A code has been sent your email address. Please write that number down to verify yourself.</p>
				<form method="post" name="myForm" action="includes/verify-inc.php">
 					<div class="form-group" >
 						<label for="verificationNum" class="form-text">Verification Code:</label>
						<input type="text" class="form-control" name="vkey" placeholder="Enter your Verification Number" autocomplete="off" required>			
					<?php 
						$fullUrl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
						if(strpos($fullUrl, "verify=fail") == true){
							print "<p class='displayError'>! Verification Key is invalid</p>";
						}	
					 ?>
					 </div>
					<button type="submit" class="btn btn-success" name="submit">Verify</button>					
				</form>
			</div>
		</div>
	</div>

	

	

<div><?php include_once 'footer.php' ?></div>