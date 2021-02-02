<!-- Include header -->
 <div><?php include_once 'browseHeader.php'; ?></div>

 	<?php 
 		session_start();
 		if(isset($_GET['useremail']))
 		{
 			include_once 'includes/dbh-inc.php';
 			$useremail=$_GET['useremail'];
 		}
 		$sql="SELECT * FROM users WHERE email='$useremail'";
		$result=mysqli_query($conn, $sql);
		$row= mysqli_fetch_assoc($result);
 	 ?>

 		<div class="container" style="padding: 100px 100px 20px 100px 	;">		
		<div class="row justify-content-center">
			<div class="col-md-8" >
				<p class="caption">This is your seller's profile.</p>	
				<!-- Card for the user profile -->
				<div class="card">
					<!-- User information -->
					<div class="card-body">
						<table class="borderless title">
							<tr>
								<td width="40%"><b>First Name: </b></td>
								<td><?php print $row['fname']; ?></td>
							</tr>
							<tr>
								<td><b>Last Name: </b></td>
								<td><?php print  $row['lname']; ?></td>
							</tr>
							<tr>
								<td><b>Email: </b></td>
								<td><?php print $row['email']; ?></td>
							</tr>
						</table>
					</div> <!-- End of card-body -->
 				 </div> <!-- End of card -->


 				 <!-- Card box for for to submit the feedback -->
			 	<div class="card" style="margin-top: 50px;">
			 		<div class="card-body">
			 			<p class="caption">Send your feedback to the seller!!</p>
			 				<form action="includes/givefeedback-inc.php" method="get" onsubmit="return submitFeedback()" >
			 					<div class="form-group">
				   			 		<input type="text" class="form-control" placeholder="FeedBack Title" name="feedtitle" autocomplete="off" required> 
			 			 		</div>
								<div class="form-group">
				 					 <textarea class="form-control" rows="5" name="feedComment" placeholder="--WRITE YOUR FEEDBACK HERE--" required></textarea>
								</div>
									<input type="hidden" name="useremail" value="<?php print $row['email']; ?>"/>
								<div class="card-footer">
									<button type="submit" class="button" name="submitfeed" id="feedback">Submit Feedback</button>
									<!-- Create a message if the feedback is submitted -->
									<?php 
										$fullUrl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
										$useremail=$row['email'];
										if(strpos($fullUrl, "useremail=$useremail&submitFeedback") == true){
											print "<p class='displayError'>! Your feedback is sent to the seller</p>";
										}
									?>
								</div>							
							</form>		
			 			</div>
			 		</div>
			 		<!-- End of card for feedback -->


			 		<!-- Card box for for to submit the report to the admin -->
			 	<div class="card" style="margin-top: 50px;">
			 		<div class="card-body">
			 			<h5 class="caption">Report your problems about this seller!!</h5>
			 			<form action="includes/reportuser-inc.php" method="get" onsubmit="return reportSeller()" >
							<div class="form-group">
								<textarea class="form-control" name="reportreason" placeholder ="--WHY ARE YOU REPORTING??--"  rows="3" required></textarea>
							</div>
								<input type="hidden" name="useremail" value="<?php print $row['email']; ?>"/>
								<input type="hidden" name="bookid" value="<?php print $row['bookid']; ?>"/>
							<div class="card-footer">
								<button class="button" style="background-color: red;" type="submit" value="submit" name="submitfeed" id="report">Report User to Admin</button>
								<!-- Create a message if the user is reported -->
								<?php 
									$fullUrl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
									$useremail=$row['email'];
									if(strpos($fullUrl, "useremail=$useremail&reportUser") == true){
										print "<p class='displayError'>! Your report is sent to the admin</p>";
									}
								?>	
							</div>							
						</form>	
			 		</div>
			 	</div><!-- End of card for reporting user --> 
			 </div> <!-- End of col-md-8 -->
 		</div> <!-- End of row -->
 	</div> <!-- End of container --> 

 			
 <!-- Include footer -->
<div class="sticky-bottom"><?php include_once 'footer.php'; ?></div>