<?php 
	session_start(); 
    include_once 'includes/dbh-inc.php'; 
?>

<!-- Include Header -->
<div><?php include_once 'browseHeader.php'; ?></div>

	<div class="container " style="padding-top: 100px;">
		<div >

			<div class=" justify-content-center">
				<h2 class="header">Feedbacks for Me</h2>
				<p class="header-info">The following are the feedbacks received from other users.</p>
			</div>

	 		<!-- Start here -->
	 		<div class="card-deck">
	 	
	 		<!-- Php code -->
			 <?php
				include_once 'includes/dbh-inc.php';
				$user=$_SESSION['u_email'];

				$sql="SELECT * FROM feedbacks WHERE sellerfeed='$user'";  //Select all feedbacks from database where the logged email received feedbacks from the buyer . so logged in email 
																			//acts as seller
				$result=mysqli_query($conn, $sql);
				$resultCheck=mysqli_num_rows($result);
				if($resultCheck > 0 )
				{
					while ($row= mysqli_fetch_assoc($result))
					{  
			?>
	 		<!-- Loop Starts-->
			 	<div class=" column ">
			 		<div class="card">			 			
			 			<div class="card-body">
			 				<p class="title"><b>Buyer: </b><?php print $row['buyerfeed']; ?></p>
								<p class="title"><b>Feed Title: </b><?php print $row['feedtitle']; ?></p>
								<p class="title"><b>Feedback : </b><?php print $row['feeds']; ?></p>								
						</div>

						<div class="card-footer">
							<form method="get" action="includes/deleteFeedback-inc.php" onsubmit="return deleteFeedback()">
				    			<input type="hidden" name="feedbackid" value="<?php print $row['feedbackid']; ?>"/>
				        		 <button class="btn btn-danger" type="submit" name="delete">Delete</button>
				         	</form>					
						</div>
			 		</div> 			 		
				 </div> <!-- End of column -->
				 <?php	
					} 
				} 
				else{
					?>
				 	<h3 class="caption col-md-9">There are no feedbacks for you.</h3>
			<?php } ?>
	
			
	 </div>
	 <!-- End of card deck -->

	 </div>
</div>


<div class="sticky-bottom"><?php include_once 'footer.php'; ?></div>



<!-- Javascript -->
<script type="text/javascript">
	function deleteFeedback()
	{
		var retVal = confirm("Are you sure you want to delete this feedback?");
        if( retVal == true ) {
            return true;
         } else {                
            return false;
         }
	}
</script>

