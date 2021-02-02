<?php 
	session_start(); 
	include_once 'includes/dbh-inc.php'; 
?>

<!-- Include Hedaer -->
<div><?php include_once 'browseHeader.php'; ?></div>


	<div class="container" style="padding-top: 100px;">
		<div class="browse-container" >	
				 <!-- <h3 class="caption text-center" style="padding-bottom: 20px;">Search for the books you want to buy !</h3>
			
				<input type="text" id="filterName" class="form-control mt-5 " placeholder="Search for books..."> -->

	 			<!-- Start here of card -->
	 			<div class="card-deck">
	 	
	 			<!-- Php code to create a loop where the books are displayed -->
 				<?php
					$email=$_SESSION['u_email'];
					$sql="SELECT * FROM book WHERE useremail <> '$email' AND status='on display' ORDER by bookid DESC;";   //The useremail should not be equal to logged in email
					$result=mysqli_query($conn,$sql);
					$resultCheck=mysqli_num_rows($result);
					if($resultCheck > 0 ) //If there exists some data
					{
						while ($row= mysqli_fetch_assoc($result))
						{  
				?>

					<!-- Create a card for each bookid -->
					 <div class=" column mt-5">
			 			<div class="card">
			 				<form method="get" action="book-details.php?bookid=<?php print $row['bookid']; ?>">	
			 					<!-- Card header for the image -->
			 					<div class="card-header">
			 						<div><img class="card-img-top" src= "images/<?php print $row['bookimage']; ?>"  style="width:100%; height: 400px;"></div>
			 					</div>			 			

			 					<!-- Card body for the additional information -->
			 					<div class="card-body" style="height: 200px;">
			 						<p class="title searchResult"><b id="searchResult">Bookname : </b><?php print $row['bookname']; ?></p>
									<p class="title" ><b>Book Author : </b><?php print $row['bookauthor']; ?></p>
									<p class="title"><b>Book Price : </b><?php print $row['bookprice']; ?></p>
									<input type="hidden" name="bookid" value="<?php print $row['bookid']; ?>"/>
									<input type="hidden" name="useremail" value="<?php print $row['useremail']; ?>"/>
								</div>

								<!-- Card footer for view details -->
								<div class="card-footer">
									<button class="button" type="submit" name="submit" value="View Details" style="margin-top: 5px;">View Details</button>	 	
								</div>

			 				</form>
			 			</div>	<!-- End of card	 -->	 			 		
				 	</div> <!-- End of column -->
			<?php	
			 			}
			 		}
			 		else{
			?>	
						<h3 class="caption">There are no books.</h3>
			<?php         }   ?>

				 </div> <!-- End of card deck -->
		 </div> <!-- End of browse container -->
	</div> <!-- End of container -->


<script type="text/javascript">
	var filter=document.getElementById('filterName');
	filter.addEventListener('keyup', filterBooks);

	var cards=document.getElementsByClassName('card-body');
	function filterBooks(){
	Array.from(cards).forEach(function(card){
		var names=document.getElementsById('searchResult');
		console.log(names.innerText);
	});
}


</script>
<!-- Include footer -->
<div class="sticky-bottom"><?php include_once 'footer.php'; ?></div>

