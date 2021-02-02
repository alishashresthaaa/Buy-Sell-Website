<!-- Extract the book information from database with the help of bookid -->
<?php session_start();

	if(isset($_GET['bookid']))
		{
			include_once 'includes/dbh-inc.php';
			$id=$_GET['bookid'];
		}

	$sql="SELECT * FROM book WHERE bookid=$id";
	$result=mysqli_query($conn, $sql);
	$row= mysqli_fetch_assoc($result);
?>


<!-- Include header -->
 <div><?php include_once 'browseHeader.php'; ?></div>



<!-- Include Body -->
<div class="container" style="padding: 100px;">
	<div class="row justify-content-center">	
		<div class="col-md-10" >

			<!-- Name of the book -->
			<h3 class="header">Details:- <?php print $row['bookname']; ?></h3>
				
				<!-- Book Details inside of card -->
			 	<div class="card" >
			 		<!-- Card Header for image -->
			 		<div class="card-header d-flex justify-content-center">
			 			<img class="card-img-top" src= "images/<?php print $row['bookimage']; ?>"  style="width:400px; height: 400px; border:2px solid #000;">
			 		</div>

			 		<!-- Card body For the information -->
			 		<div class="card-body">
			 			<table class="table-borderless title">
			 				<tr>
			 					<td width="25%"><b>Seller Email : </b></td>
			 					<td><?php print $row['useremail']; ?></td>
			 				</tr>
			 				<tr>
			 					<td><b>Bookname : </b></td>
			 					<td><?php print $row['bookname']; ?></td>
			 				</tr>			 				
			 				<tr>
			 					<td><b>Book Author : </b></td>
			 					<td><?php print $row['bookauthor']; ?></td>
			 				</tr>
			 				<tr>
			 					<td><b>Book Publication : </b></td>
			 					<td><?php print $row['bookpub']; ?></td>
			 				</tr>
			 				<tr>
			 					<td><b>Book Price : </b></td>
			 					<td><?php print $row['bookprice']; ?></td>
			 				</tr>
			 				<tr>
			 					<td><b>Book Details : </b></td>
			 					<td><?php print $row['bookdetails']; ?></td>
			 				</tr>
			 			</table>
					</div>


					<!-- Card footer for requesting book to the seller -->
					<div class="card-footer">
						<form action="includes/requestSeller-inc.php" method="get" onsubmit="return requestBook()">
							<input type="hidden" name="useremail" value="<?php print $row['useremail']; ?>"/>
							<input type="hidden" name="bookname" value="<?php print $row['bookname']; ?>"/>
							<input type="hidden" name="bookid" value="<?php print $row['bookid']; ?>"/>
							<button class="button" type="submit" value="submit" name="submit" id="request">Request Book to Seller</button>
								<!-- Create a message if the request is sent -->
								 <?php 
									$fullUrl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
									$bookid=$row['bookid'];
									if(strpos($fullUrl, "bookid=$bookid&RequestSent") == true){
										print "<p class='displayError'>! Your request is sent to the seller</p>";
									}
								?> 
								<p class="displayError" id="requestSent">	</p>
						</form>								
			 		</div>

			 		<!-- card footer for sending the email -->
			 		<!-- <div class="card-footer">
			 			<a href="https://mail.google.com/mail/?view=cm&fs=1&to=<?php print $row['useremail'] ?>&su=Inquiry About <?php print $row['bookname'] ?>" ><button class="button" style="background-color: green;">Send email to the Seller</button></a>
			 		</div> -->


			 		<div class="card-footer">
			 			<form action="userProfile.php" method="get">
			 					<input type="hidden" name="useremail" value="<?php print $row['useremail']; ?>"/>
			 						<button class="button" type="submit" value="submit" name="submit" id="request" style="background-color: blue;">Visit Seller's Profile</button>
			 			</form>
			 		</div>

			 		

					
			 	<!-- End of card -->
			 	</div>




<!-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->




			 	<!-- Card box for for to submit the feedback -->
	<!-- 		 	<div class="card" style="margin-top: 50px;">
			 		<div class="card-body">
			 			<p class="caption">Send your feedback to the seller!!</p>
			 				<form action="includes/givefeedback-inc.php" method="get" onsubmit="return submitFeedback()" >
			 					<div class="form-group">
				   			 		<input type="text" class="form-control" placeholder="FeedBack Title" name="feedtitle" autocomplete="off" required> 
			 			 		</div>
								<div class="form-group">
				 					 <textarea class="form-control" rows="5" name="feedComment" placeholder="--WRITE YOUR FEEDBACK HERE--" required></textarea>
								</div>
									<input type="hidden" name="useremail" value="<?php print $row['useremail']; ?>"/>
									<input type="hidden" name="bookid" value="<?php print $row['bookid']; ?>"/>
								<div class="card-footer">
									<button type="submit" class="button" name="submitfeed" id="feedback">Submit Feedback</button> -->
									<!-- Create a message if the feedback is submitted -->
						<!-- 			<?php 
										$fullUrl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
										$bookid=$row['bookid'];
										if(strpos($fullUrl, "bookid=$bookid&submitFeedback") == true){
											print "<p class='displayError'>! Your feedback is sent to the seller</p>";
										}
									?>
								</div>							
							</form>		
			 			</div>
			 		</div> -->
			 		<!-- End of card for feedback -->



<!-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->




			 	<!-- Card box for for to submit the report to the admin -->
			 	<!-- <div class="card" style="margin-top: 50px;">
			 		<div class="card-body">
			 			<h5 class="caption">Report your problems about this seller!!</h5>
			 			<form action="includes/reportuser-inc.php" method="get" onsubmit="return reportSeller()" >
							<div class="form-group">
								<textarea class="form-control" name="reportreason" placeholder ="--WHY ARE YOU REPORTING??--"  rows="3" required></textarea>
							</div>
								<input type="hidden" name="useremail" value="<?php print $row['useremail']; ?>"/>
								<input type="hidden" name="bookid" value="<?php print $row['bookid']; ?>"/>
							<div class="card-footer">
								<button class="button" style="background-color: red;" type="submit" value="submit" name="submitfeed" id="report">Report User to Admin</button> -->
								<!-- Create a message if the user is reported -->
							<!-- 	<?php 
									$fullUrl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
									$bookid=$row['bookid'];
									if(strpos($fullUrl, "bookid=$bookid&reportUser") == true){
										print "<p class='displayError'>! Your report is sent to the admin</p>";
									}
								?>	 -->
				<!-- 			</div>							
						</form>	
			 		</div>
			 	</div> --><!-- End of card for reporting user --> 	
		 	
			 	</div> <!-- end of col-md-8 -->		
		</div><!-- end of the row -->	
	</div><!-- end of the container -->




<!-- Include footer -->
<div class="sticky-bottom"><?php include_once 'footer.php'; ?></div>




<script type="text/javascript">
	function requestBook(){
	var requestSent= document.getElementById("requestSent");
 	requestSent.textContent="Request Sent to the seller";
 }

</script>


<script src="js/book-details.js"></script>