
<div><?php include_once 'header.php' ?></div>

	
	<div class="container" style="padding-top: 100px;">
		<div class="row justify-content-center form-jar" style="height: 700px;">	
			<div class="col-md-8" >
				<h3 class="header">Register for your account here</h3>
				<p class="header-info" >Here, you create a new account for buying and selling the books.</p>
				<form method="post" class="form-container"  name="myForm" onsubmit="return errorDisplay()" action="includes/register-inc.php">

					<?php
						$fullUrl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
					?>
					
					
					<div class="form-group">
						<label for="firstName" class="form-text">First Name:</label>	
						<input type="text" name="fname" class="form-control"  placeholder="Enter First Name" autocomplete="off">	
						<span id="fnameError" class="displayError"></span>	
					</div>


					<div class="form-group">
						<label for="lastName" class="form-text">Last Name:</label>
							<input type="text" name="lname" class="form-control"  placeholder="Enter Last Name" autocomplete="off">
							<span id="lnameError" class="displayError"></span>
					</div>


					<div class="form-group">
						<label for="emailAdd" class="form-text">Email:</label>
							<input type="text" name="email" class="form-control"  placeholder="Enter Email address" autocomplete="off">
							<span id="emailError" class="displayError"></span>
							<?php	
								if(strpos($fullUrl, "register=EmailTaken") == true){
									print "<span class='displayError'>! Email already taken</span>";
								}	
							?>
					</div>

					<div class="form-group">
						<label for="passWord" class="form-text">Password:</label>
							<input type="password" name="pass" class="form-control"  placeholder="Enter Password" autocomplete="off">
							<span id="passError" class="displayError"></span>
					</div>

					<div class="form-group">
						<label for="rePass" class="form-text">Re-Passsword:</label>
							<input type="password" name="rpass" class="form-control"  placeholder="Re-Enter Password" autocomplete="off">
							<span id="rpassError" class="displayError"></span>
					</div>

					<button type="submit" class="btn btn-success" name="submit">Register</button>
				</form>
			</div>
			
			
		</div>
		
	</div>
	
<div class="sticky-bottom">
	<?php include_once 'footer.php'; ?>
</div>


<!-- Javascript -->


<script src="js/register.js"></script>