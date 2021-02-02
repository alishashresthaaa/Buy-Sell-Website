<?php 
	session_start(); 
	include_once 'includes/dbh-inc.php'; 
?>

<!-- Include Hedaer -->
<div><?php include_once 'adminHeader.php'; ?></div>


	<div class="container " style="padding-top: 100px;">
		<div>	

				<div class=" justify-content-center" style="height:100px; padding-top: 20px;">
					<h3 class="header">USER LIST</h3>
					<p class="header-info">The following are the list of users.</p>
				</div><!-- End of justify-content-center -->



	 			<!-- Start here of card -->
	 			<div class="card-deck">
	 	
	 			<!-- Php code to create a loop where the books are displayed -->
 				<?php
					$sql="SELECT * FROM users WHERE usertype='user'";
					$result=mysqli_query($conn, $sql);
					$resultCheck=mysqli_num_rows($result);
					if($resultCheck > 0 ) //If there exists some data
					{
						while ($row= mysqli_fetch_assoc($result))
						{  
							// $_SESSION['reportedUser']=$row['email'];
				?>

					<!-- Create a card for each bookid -->
					 <div class=" column ">
			 			<div class="card">
			 				<form method="get" action="reportedUser.php?bookid=<?php print $row['id']; ?>">
			 					<!-- Card body for the additional information -->
			 					<div class="card-body" style="height: 200px;">
			 						<p class="title"><b>First Name : </b><?php print $row['fname']; ?></p>
									<p class="title"><b>Last Name : </b><?php print $row['lname']; ?></p>
									<p class="title"><b>Email : </b><?php print $row['email']; ?></p>
									<input type="hidden" name="useremail" value="<?php print $row['email']; ?>"/>

								</div>

								<!-- Card footer for view details -->
								<div class="card-footer">
									<button class="button" type="submit" name="submit" value="View Reports"style="margin-top: 5px;">View Reports</button>	 	
								</div>

			 				</form>
			 			</div>	<!-- End of card	 -->	 			 		
				 	</div> <!-- End of column -->
			<?php	
			 			}
			 		}
			 		else{
			?>	
						<h3 class="caption">There are no users.</h3>
			<?php         }   ?>

				 </div> <!-- End of card deck -->
		 </div> <!-- End of browse container -->
	</div> <!-- End of container -->

<!-- Include footer -->
<div class="sticky-bottom"><?php include_once 'footer.php'; ?></div>

