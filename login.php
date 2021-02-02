
<div><?php include_once 'header.php' ?></div>

	
	<div class="container" style="padding-top: 100px;">
		<div class="row justify-content-center form-jar" style="height: 500px;">	
			<div class="col-md-8" >
				<h3 class="header">Login here</h3>
				<p class="header-info" >Log into your account you have created already!</p>
				<form method="post" class="form-container"  name="myForm" onsubmit="return errorDisplay()" action="includes/login-inc.php">

					<?php
						$fullUrl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
					?>
					
					<div class="form-group">
						<label for="emailAddress" class="form-text">Email Address:</label>	
						<input type="text" name="email" class="form-control"  placeholder="Enter your email" autocomplete="off">	
						<span id="emailError" class="displayError"></span>	
					</div>

					<div class="form-group">
						<label for="passWord" class="form-text">Password:</label>
							<input type="password" name="pass" class="form-control"  placeholder="Enter Password" autocomplete="off">
							<span id="passError" class="displayError"></span>
					</div>
					<?php 
						$fullUrl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
						if(strpos($fullUrl, "login=error") == true){
							print "<p class='displayError'>! Your email or password is incorrect</p>";
						}
						if(strpos($fullUrl, "login=pwdisfalse") == true){
							print "<p class='displayError'>! Your email or password is incorrect</p>";
						}

						if(strpos($fullUrl, "pwdChanged") == true){
									print "<p class='displayError'>! Your password has been changed</p>";
								}
					?>
					<button type="submit" class="btn btn-success" name="submit">Login</button>
				</form>
			</div>
			
			
		</div>
		
	</div>
	
<div class="sticky-bottom">
	<?php include_once 'footer.php'; ?>
</div>

<script src="js/login.js"></script>